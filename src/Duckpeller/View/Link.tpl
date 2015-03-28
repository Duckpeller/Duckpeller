docker run -d --name {{name}} {{container}} && \
export LINK_{{increment}}="--link {{name}}:{{name}}"
