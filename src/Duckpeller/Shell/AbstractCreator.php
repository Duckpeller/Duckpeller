<?php
namespace Duckpeller\Shell;
use \Duckpeller\Builder\Shell as Builder;

abstract class AbstractCreator
{
    protected $view;

    public function __construct()
    {
        $this->view = new Builder;
    }
}
