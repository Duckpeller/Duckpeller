<?php
namespace Duckpeller\Shell;
use \Exception;

class FinishCreator extends AbstractCreator
{
    public function build()
    {
        $this->view->setTemplate("Finish");
        return $this->view->get();
    }
}
