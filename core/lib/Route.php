<?php
namespace core\lib;
class Route{
    public $controller;
    public $action;
    public function __construct()
    {
        $uri = strtolower($_SERVER['REQUEST_URI']);

        //uri可能为零个，一个或多个index  /,/index,/index/index
        if ($uri && $uri !== '/')
        {
            $path = explode('/',trim($uri,'/'));

            //获取路由，指定对应控制器及方法
            if (isset($path[0]))
            {
                if (strtolower($path[0]) !== 'index.php')
                {
                    $this->controller = $path[0];

                }else{
                    $this->controller = Application::getInstance()->config['route']['controller'];
                }
                unset($path[0]);
            }
            if (isset($path[1]))
            {
                $this->action = $path[1];
                unset($path[1]);
            }else{
                $this->action = Application::getInstance()->config['route']['action'];
            }

            //获取GET请求的路由参数，并存入$_GET数组中
            $count = count($path)+2;
            $i=2;
            while ($i<$count)
            {
                if (isset($path[$i+1]))
                {
                    $_GET[$path[$i]]=$path[$i+1];
                }
                $i = $i + 2;
            }

        }else{
            $this->controller = Application::getInstance()->config['route']['controller'];
            $this->action = Application::getInstance()->config['route']['action'];
        }
    }
}
