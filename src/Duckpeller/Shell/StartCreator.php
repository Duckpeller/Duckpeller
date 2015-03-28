<?php
namespace Duckpeller\Shell;
use \Exception;

class StartCreator extends AbstractCreator
{
    public function build($count)
    {
        $this->view->setTemplate("Start");
        $this->view->set("count", $count);
        return $this->view->get();
    }
}
