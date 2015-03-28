<?php
namespace Duckpeller\Shell;
use \Exception;

class ImageCreator extends AbstractCreator
{
    public function build($image) {
        $this->view->setTemplate("Image");
        $this->view->set("image", $image);
        return $this->view->get();
    }
}
