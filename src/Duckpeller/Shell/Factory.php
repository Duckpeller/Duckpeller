<?php
namespace Duckpeller\Shell;

class Factory
{
    public function get(AbstractCreator $creater)
    {
        return $creater;
    }
}
