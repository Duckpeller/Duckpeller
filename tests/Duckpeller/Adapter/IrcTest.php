<?php
use \Duckpeller\Adapter\Irc;

class IrcTest extends PHPUnit_Framework_TestCase
{
    public function test()
    {
        $handler = new Irc([
            "API_TOKEN"     => "12345678",
            "USER_NAME"     => "duckpeller",
            "END_POINT"     => "http://endpoint/hoge",
            "ROOM_ID"       => "1234"
        ]);
        $this->assertEquals("tail -n 1 /tmp/jenkins_message_short | irc-notify -o http://endpoint/hoge -c 12345678",$handler->get());
    }
}
