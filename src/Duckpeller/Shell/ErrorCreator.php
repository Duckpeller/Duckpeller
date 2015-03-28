<?php
namespace Duckpeller\Shell;
use \Exception;

class ErrorCreator extends AbstractCreator
{
    public function build($errorMessage)
    {
        $this->view->setTemplate("Error");
        $this->view->set("errorMessage", $errorMessage);
        return $this->view->get();
    }
}
