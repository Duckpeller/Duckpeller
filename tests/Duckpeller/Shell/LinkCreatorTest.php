<?php
use \Duckpeller\Shell;
class LinkCreatorTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->factory = new Shell\Factory;
    }

    public function testGet()
    {
        $shell = file_get_contents(__DIR__."/Example/link.txt");
        $argument = [
            [
                "name"      => "mysql",
                "container" => "mysql/mysql:latest"
            ],
            [
                "name"      => "redis",
                "container" => "redis/redis:latest"
            ]
        ];
        $links = $this->factory->get(new Shell\LinkCreator)->build($argument);
        $this->assertEquals($shell,$links);
    }
}
