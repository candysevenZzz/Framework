<?php
namespace core\lib;

use Exception;

/**
 * Class Controller
 * @package core\lib
 * 控制器基类
 */
class Controller
{
    public $assigns =array();

    /**
     * 数据分配方法
     * @param $key string 键名
     * @param $value string 值
     */
    public function assign($key, $value)
    {
        $this->assigns[$key] = $value;
    }

    /**
     * 视图加载方法
     * @param $view string 视图名
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function display($view)
    {
        $file = APP.'/view/'.$view.'.html';
        if(is_file($file))
        {
            $loader = new \Twig\Loader\FilesystemLoader( APP.'/view');
            $twig = new \Twig\Environment($loader, [
                'cache' => BASE.'/runtime/templates',
            ]);
            $template = $twig->load($view.'.html');
            $template->display($this->assigns??'');
        }

    }

    /**
     * @param $data array 数据
     * @param $view string 视图名
     * @throws Exception
     */
    public function view($data, $view)
    {
        if (!empty($data))
        {
            if (is_array($data))
            {
                foreach ($data as $k => $v)
                {
                    $this->assigns[$k] = $v;
                }

            }else{
                throw new Exception('The first param need a array');
            }
        }

        $this->display($view);
    }

}
