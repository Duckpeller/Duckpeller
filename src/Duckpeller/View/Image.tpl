#!/bin/bash -le
echo -e "\e[32m
#######################################
# DockerStart
#######################################
\e[m"

# change script permission
chmod +x \$WORKSPACE/build.sh && \
chmod +x 777 \$WORKSPACE/step.sh && \
chmod +x 777 \$WORKSPACE/notify.sh && \
chmod +x 777 \$WORKSPACE/link.sh

# set default exitcode
DOCKER_RESULT=0

# include docker link images
source ./link.sh

# run docker
docker run --rm \
    -v \$WORKSPACE:/home/worker/workspace \
    -w /home/worker/workspace \
    \$LINK_1 \$LINK_2 \$LINK_3 \
    -u worker \
    -t {{image}} \
    /bin/bash -l step.sh || DOCKER_RESULT=$?

# remove docker containers
docker rm -f $(docker ps -a -q) > /dev/null 2>&1

# include notify script
source \$WORKSPACE/notify.sh

# crean up scripts
rm -f \$WORKSPACE/step.sh && \
rm -f \$WORKSPACE/notify.sh && \
rm -f \$WORKSPACE/build.sh && \
rm -f \$WORKSPACE/link.sh && \
rm -rf /tmp/jenkins_message*
exit \$DOCKER_RESULT
