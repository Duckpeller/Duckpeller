<?php
use \Duckpeller\Adapter\Chatwork;

class ChatworkTest extends PHPUnit_Framework_TestCase
{
    public function test()
    {
        $handler = new Chatwork([
            "API_TOKEN"     => "12345678",
            "USER_NAME"     => "duckpeller",
            "END_POINT"     => "http://endpoint/hoge",
            "ROOM_ID"       => "1234"
        ]);
        $this->assertEquals("cat /tmp/jenkins_message_chatwork | chatwork-notify -t 12345678 -r 1234",$handler->get());
    }
}
