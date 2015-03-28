<?php
use \Duckpeller\Adapter\Hipchat;

class HipchatTest extends PHPUnit_Framework_TestCase
{
    public function test()
    {
        $handler = new Hipchat([
            "API_TOKEN"     => "12345678",
            "USER_NAME"     => "duckpeller",
            "END_POINT"     => "http://endpoint/hoge",
            "ROOM_ID"       => "1234"
        ]);
        $this->assertEquals("cat /tmp/jenkins_message_normal | hipchat-notify -t 12345678 -r 1234 -f duckpeller -c \$COLOR",$handler->get());
    }
}
