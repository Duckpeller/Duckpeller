<?php
namespace Duckpeller\Shell;
use \Exception;

class LinkCreator extends AbstractCreator
{
    CONST NAME = "name";
    CONST CONTAINER = "container";

    public function build($links)
    {
        $script = [];
        if($links) {
            for($i = 0; $i <= count($links); $i++) {
                if(isset($links[$i][self::NAME]) && isset($links[$i][self::CONTAINER])) {
                    $this->view->setTemplate("Link");
                    $this->view->set("increment", $i + 1);
                    $this->view->set("name"     , $links[$i][self::NAME]);
                    $this->view->set("container", $links[$i][self::CONTAINER]);
                    $script[] = $this->view->get();
                }
            }
        }
        return (!empty($script)) ? implode(" && \\\n",$script) : "";
    }
}
