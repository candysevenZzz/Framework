<?php
namespace core\lib;

class Application
{
    /**
     * @var $base_dir
     * @var $config
     *
     *获取配置文件对象类
     */
    public $base_dir;
    public $config;
    static protected $instance;

    /**
     * @var Config
     */
    public function __construct($base_dir)
    {
        $this->base_dir = $base_dir;
        $this->config = new Config($base_dir.'/configs');

    }

    static public function getInstance($base_dir = BASE)
    {
        if (empty(self::$instance))
        {
            self::$instance = new self($base_dir);
        }
        return self::$instance;
    }

}
