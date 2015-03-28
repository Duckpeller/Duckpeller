<?php
namespace Duckpeller\Adapter;
class Chatwork extends AbstractAdapter
{
    public function get()
    {
        return "cat /tmp/jenkins_message_chatwork | chatwork-notify -t {$this->arg->api_token} -r {$this->arg->room_id}";
    }
}
