<?php
namespace Duckpeller\Adapter;
abstract class AbstractAdapter
{
    protected $arg;
    public function __construct(Array $arguments)
    {
        $arg = new \stdClass;

        $arg->api_token = $arguments["API_TOKEN"];
        $arg->user_name = $arguments["USER_NAME"];
        $arg->room_id   = $arguments["ROOM_ID"];
        $arg->end_point = $arguments["END_POINT"];

        $this->arg = $arg;
    }
    abstract public function get();
}
