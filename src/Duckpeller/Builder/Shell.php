<?php
namespace Duckpeller\Builder;
use \Exception;

class Shell
{
    protected $template;

    public function setTemplate($file)
    {
        if(!isset($file)) {
            throw new Exception("Not Valid TemplateFile");
        }
        if(!is_file(__DIR__."/../View/{$file}.tpl")) {
            throw new Exception("TemplateFile Not Exist");
        }
        $this->template = file_get_contents(__DIR__."/../View/{$file}.tpl");
    }

    public function set($name, $value)
    {
        $this->template = preg_replace("/\{\{\s?{$name}\s?}}/", $value, $this->template);
    }

    public function get()
    {
        return $this->template;
    }

}
