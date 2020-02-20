<?php
return array(
    //主数据库配置 写入操作
    'master' => array(
        'type'      => 'MySQL',
        'host'      => '127.0.0.1',
        'user'      => 'root',
        'password'  => 'root',
        'dbname'    => 'frame',
        'port'      => '3306',
    ),
    //从数据库配置 读取操作
    'slave' => array(
        'slave1' => array(
            'type'      => 'MySQL',
            'host'      => '127.0.0.1',
            'user'      => 'root',
            'password'  => 'root',
            'dbname'    => 'frame',
            'port'      => '3306',
        ),
        'slave2' => array(
            'type'      => 'Oracle',
            'host'      => '127.0.0.1',
            'user'      => 'root',
            'password'  => 'root',
            'dbname'    => 'test',
            'port'      => '3306',
        ),
        'slave3' => array(
            'type'      => 'SQLSever',
            'host'      => '127.0.0.1',
            'user'      => 'root',
            'password'  => 'root',
            'dbname'    => 'test',
            'port'      => '3306',
        ),
    ),
);