<?php
use \Duckpeller\Shell;
class FinishCreatorTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->factory = new Shell\Factory;
    }

    public function testGet()
    {
        $shell = file_get_contents(__DIR__."/Example/finish.txt");
        $this->assertEquals($shell,$this->factory->get(new Shell\FinishCreator)->build());
    }
}
