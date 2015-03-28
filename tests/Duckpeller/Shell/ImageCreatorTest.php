<?php
use \Duckpeller\Shell;
class ImageCreatorTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->factory = new Shell\Factory;
    }

    public function testGet()
    {
        $shell = file_get_contents(__DIR__."/Example/image.txt");
        $this->assertEquals($shell,$this->factory->get(new Shell\ImageCreator)->build("test/test:latest"));
    }
}
