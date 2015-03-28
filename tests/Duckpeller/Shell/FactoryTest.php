<?php
use \Duckpeller\Shell;

class FactoryTest extends PHPUnit_Framework_TestCase
{
    public function testGet()
    {
        $factory = new Shell\Factory;
        $this->assertTrue($factory->get(new TestClass)->build(true));
    }
}

class TestClass extends Shell\AbstractCreator
{
    public function build($boolean)
    {
        return $boolean;
    }
}
