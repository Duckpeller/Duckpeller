<?php
namespace Duckpeller\Adapter;
class Irc extends AbstractAdapter
{
    public function get()
    {
        return "tail -n 1 /tmp/jenkins_message_short | irc-notify -o {$this->arg->end_point} -c {$this->arg->api_token}";
    }
}
