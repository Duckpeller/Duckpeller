<?php
use \Duckpeller\Builder\Shell as Builder;

class ShellTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->view = new Builder;
    }

    /**
     * @expectedException Exception
     * @expectedExceptionMessage Not Valid TemplateFile
     */
    public function testSetTemplateFailedCaseNullArgument()
    {
        $this->view->setTemplate(null);
    }

    /**
     * @expectedException Exception
     * @expectedExceptionMessage TemplateFile Not Exist
     */
    public function testSetTemplateFailedCaseNotExistFileArgument()
    {
        $this->view->setTemplate("hoge");
    }
}
