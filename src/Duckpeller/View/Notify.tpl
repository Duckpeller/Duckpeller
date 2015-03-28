#!/bin/bash -le
echo -e "\e[32m
#######################################
# Notification
#######################################
\e[m"

if [ "\$DOCKER_RESULT" -eq "0" ]
then
    LABEL='<span class="label label-success">PASSED</span>'
    COLOR='green'
    SHORT_RESULT='Passed'
else
    LABEL='<span class="label label-important">FAILED</span>'
    COLOR='red'
    SHORT_RESULT='Failed'
fi

COMMIT_ID=\$(git log -1 --pretty='%h')
COMMIT_AUTHER=\$(git log -1 --pretty='%cn')
COMMIT_COMMENT=\$(git log -1 --pretty='%s')
COMMIT_BRANCH=\$(git name-rev --name-only \$COMMIT_ID)
REMOTE_REPOSITORY=\$(git-parser `git config --get remote.origin.url`)

printf \
    "Build \$REMOTE_REPOSITORY<a href="\$JOB_URL">#\$BUILD_NUMBER</a> (\$COMMIT_BRANCH - \$COMMIT_ID): \$LABEL \n\$COMMIT_AUTHER: \$COMMIT_COMMENT" \
    > /tmp/jenkins_message_normal

printf \
    "Build \$SHORT_RESULT \$REMOTE_REPOSITORY #\$BUILD_NUMBER (\$COMMIT_BRANCH - \$COMMIT_ID): \$COMMIT_AUTHER: \$COMMIT_COMMENT" \
    > /tmp/jenkins_message_short

printf \
    "[info][title]Build \$SHORT_RESULT \$REMOTE_REPOSITORY[/title] #\$BUILD_NUMBER (\$COMMIT_BRANCH - \$COMMIT_ID): \$COMMIT_AUTHER: \$COMMIT_COMMENT[/info]" \
    > /tmp/jenkins_message_chatwork
printf \
    "[info][title]Build \$SHORT_RESULT \$REMOTE_REPOSITORY[/title] #\$BUILD_NUMBER (\$COMMIT_BRANCH - \$COMMIT_ID) \n\$COMMIT_AUTHER: \n\$COMMIT_COMMENT[/info]" \
    > /tmp/chatwork_message_log

{{script}}
