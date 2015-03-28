<?php
namespace Duckpeller\Shell;
use \Exception;
use \Duckpeller\Adapter;

class NotifyCreator extends AbstractCreator
{

    CONST SERVICE   = "service";
    CONST API_TOKEN = "token";
    CONST USER_NAME = "from";
    CONST ROOM_ID   = "room_id";
    CONST END_POINT = "endpoint";

    public function build($steps)
    {
        if(!isset($steps)) { return ""; }
        $script = [];
        foreach($steps as $step) {
            if(isset($step[self::SERVICE])) {
                switch($step[self::SERVICE]) {
                    case "hipchat" :
                        if(!isset($step[self::API_TOKEN])) { break; }
                        if(!isset($step[self::ROOM_ID]))  { break; }

                        $hipchat = new Adapter\Hipchat([
                            "API_TOKEN" => $step[self::API_TOKEN],
                            "USER_NAME" => (isset($step[self::USER_NAME])) ? $step[self::USER_NAME] : "Jenkins",
                            "ROOM_ID"   => $step[self::ROOM_ID],
                            "END_POINT" => "",
                        ]);
                        $script[] = $hipchat->get();
                        break;
                    case "idobata" :
                        if(!isset($step[self::API_TOKEN])) { break; }

                        $idobata = new Adapter\Idobata([
                            "API_TOKEN" => $step[self::API_TOKEN],
                            "USER_NAME" => "Jenkins",
                            "ROOM_ID"   => "",
                            "END_POINT" => "",
                        ]);
                        $script[] = $idobata->get();
                        break;
                    case "irc" :
                        if(!isset($step[self::END_POINT])) { break; }
                        if(!isset($step[self::ROOM_ID]))  { break; }

                        $irc = new Adapter\Irc([
                            "API_TOKEN" => "",
                            "USER_NAME" => (isset($step[self::USER_NAME])) ? $step[self::USER_NAME] : "Jenkins",
                            "ROOM_ID"   => $step[self::ROOM_ID],
                            "END_POINT" => $step[self::END_POINT],
                        ]);
                        $script[] = $irc->get();
                        break;
                    case "chatwork" :
                        if(!isset($step[self::API_TOKEN])) { break; }
                        if(!isset($step[self::ROOM_ID]))  { break; }

                        $chatwork = new Adapter\Chatwork([
                            "API_TOKEN" => $step[self::API_TOKEN],
                            "USER_NAME" => "Jenkins",
                            "ROOM_ID"   => $step[self::ROOM_ID],
                            "END_POINT" => "",
                        ]);
                        $script[] = $chatwork->get();
                        break;
                    default :
                        break;
                }
            }
        }
        $this->view->setTemplate("Notify");
        $this->view->set("script", implode(" && \ \n",$script));
        return $this->view->get();
    }
}
