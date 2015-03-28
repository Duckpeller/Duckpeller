<?php
namespace Duckpeller\Shell;
use \Exception;

class StepCreater extends AbstractCreator
{
    CONST NAME = "name";
    CONST CODE = "code";

    public function build($steps)
    {
        if($steps) {
            $count = count($steps);
            $script .= self::createStart($count);
            for($i = 0; $i < $count; ++$i) {
                switch(true) {
                    case !isset($steps[$i][self::CODE]) :
                        $command = self::joinStepScript($steps[$i]);
                        break;
                    case isset($steps[$i][self::CODE]) :
                        $command = self::joinStepScript($steps[$i][self::CODE]);
                        break;
                }
                switch(true) {
                    case !isset($steps[$i][self::NAME]) :
                        $title = "NOTITLE";
                        break;
                    case isset($steps[$i][self::NAME]) :
                        $title = $steps[$i][self::NAME];
                        break;
                }
                $script .= self::createStep($i, $count, $title, $command);
            }
            return $script;
        }
        return "";
    }

    private static function joinStepScript($command) {
        return preg_replace("/\n/"," && \\\n",$command);
    }

    private static function createStep($i, $count, $title, $script)
    {
        $i++;
        $step = sprintf("%d/%d",$i,$count);
        return <<< EOM
echo -e "\e[32m
## Step: $step $title
\e[m"

$script

EOM;
    }
}
