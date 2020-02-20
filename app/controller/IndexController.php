<?php
namespace app\controller;

use core\lib\Controller;
use core\lib\Model;

class IndexController extends Controller {
    public function index()
    {
        $model = new Model();
        $sql = "select * from people";
        $res = $model->query($sql)->fetchAll();
        p($res);
    }


    public function test()
    {
        $this->assign('data','数据内容');
        $this->assign('data1','数据内容1');
        $this->assign('data2','数据内容2');
        $this->assign('data3','数据内容3');
        $this->assign('data4','数据内容4');
        $this->assign('data5','数据内容5');
        $this->assign('data6','数据内容6');
        $this->assign('title','自定义标题');
        $this->display('index');
    }

    public function test2()
    {
        $this->view(
            [
                'title'=>'标题',
                'data1'=>'内容1',
                'data2'=>'内容2',
                'data3'=>'内容3',
                'data4'=>'内容4',
                'data5'=>'内容5',
                'data6'=>'内容6',
            ]
            , 'index');

    }
}
