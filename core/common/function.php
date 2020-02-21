<?php
if (!function_exists('p'))
{
    //数据打印函数
    function p(...$vars)
    {
        foreach ($vars as $var)
        {
            if (is_bool($var))
            {
                var_dump($var);
            }elseif (is_null($var)){
                var_dump($var);
            }else{
                echo "<pre style='position: relative;z-index: 1000;padding: 10px;border-radius: 5px;
                background: #F5F5F5;border: 1px solid #aaa;font-size: 14px;line-height: 18px;
                opacity: 0.9;'>" . print_r($var,true) .
                    "</pre>";
            }
        }

    }
}
if (!function_exists('post'))
{
	/**
	 * @param string $name post传递方式中的键名
	 * @param bool|string $filter 过滤规则
	 * @param bool $default 默认值
	 * @return bool|string
	 */
    function post(string $name, $filter = false, bool $default = false)
    {
        if (isset($_POST[$name]))
        {
            if ($filter)
            {
                switch ($filter){
                    case 'int':
                        if (is_numeric($_POST[$name]))
                        {
                        	return $_POST[$name];
                        }
                        break;

	                default:;
                }

            }

        }else{
            return $_POST[$name];
        }
        return $default;
	}
}

