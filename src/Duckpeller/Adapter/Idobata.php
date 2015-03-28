<?php
namespace Duckpeller\Adapter;
class Idobata extends AbstractAdapter
{
    public function get()
    {
        return "cat /tmp/jenkins_message_normal | idobata-notify -t {$this->arg->api_token}";
    }
}
