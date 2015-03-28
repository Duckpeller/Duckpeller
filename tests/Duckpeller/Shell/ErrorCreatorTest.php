<?php
use \Duckpeller\Shell;
class ErrorCreatorTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->factory = new Shell\Factory;
    }

    public function testGet()
    {
        $message = file_get_contents(__DIR__."/Example/error.txt");
        //$script  = hex2bin($this->factory->get(new Shell\ErrorCreator)->build("test"));
        $this->assertEquals($message,$this->factory->get(new Shell\ErrorCreator)->build("test"));
    }
}
