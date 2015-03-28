<?php
namespace Duckpeller\Adapter;
class Hipchat extends AbstractAdapter
{
    public function get()
    {
        return "cat /tmp/jenkins_message_normal | hipchat-notify -t {$this->arg->api_token} -r {$this->arg->room_id} -f {$this->arg->user_name} -c \$COLOR";
    }
}
