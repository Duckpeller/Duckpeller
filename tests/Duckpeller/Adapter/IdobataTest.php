<?php
use \Duckpeller\Adapter\Idobata;

class IdobataTest extends PHPUnit_Framework_TestCase
{
    public function test()
    {
        $handler = new Idobata([
            "API_TOKEN"     => "12345678",
            "USER_NAME"     => "duckpeller",
            "END_POINT"     => "http://endpoint/hoge",
            "ROOM_ID"       => "1234"
        ]);
        $this->assertEquals("cat /tmp/jenkins_message_normal | idobata-notify -t 12345678",$handler->get());
    }
}
