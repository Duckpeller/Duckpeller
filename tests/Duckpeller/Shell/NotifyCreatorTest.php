<?php
use \Duckpeller\Shell;
class NotifyCreatorTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->factory = new Shell\Factory;
    }

    public function testGet()
    {
        $shell = file_get_contents(__DIR__."/Example/notify.txt");
        $argument = [
            [
                "service"       => "hipchat",
                "token"         => "12345678",
                "from"          => "duckpeller",
                "endpoint"      => "http://endpoint/hoge",
                "room_id"       => "1234"
            ],
            [
                "service"       => "idobata",
                "token"         => "12345678",
                "from"          => "duckpeller",
                "endpoint"      => "http://endpoint/hoge",
                "room_id"       => "1234"
            ],
            [
                "service"       => "irc",
                "token"         => "12345678",
                "from"          => "duckpeller",
                "endpoint"      => "http://endpoint/hoge",
                "room_id"       => "1234"
            ],
            [
                "service"       => "chatwork",
                "token"         => "12345678",
                "from"          => "duckpeller",
                "endpoint"      => "http://endpoint/hoge",
                "room_id"       => "1234"
            ],
            [
                "service"       => "slack",
                "token"         => "12345678",
                "from"          => "duckpeller",
                "endpoint"      => "http://endpoint/hoge",
                "room_id"       => "1234"
            ],
        ];
        $links = $this->factory->get(new Shell\NotifyCreator)->build($argument);
        $this->assertEquals($shell,$links);
    }
}
