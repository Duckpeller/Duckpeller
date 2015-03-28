<?php
use \Duckpeller\Shell;
class StartCreatorTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->factory = new Shell\Factory;
    }

    public function testGet()
    {
        $shell = file_get_contents(__DIR__."/Example/start.txt");
        $this->assertEquals($shell,$this->factory->get(new Shell\StartCreator)->build(3));
    }
}
