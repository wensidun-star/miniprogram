<?php
namespace  app\admin\controller;

use think\Controller;
use think\Db;
header('Access-Control-Allow-Origin: *');

class Banner extends Controller{
    public function getbannerlist(){
        $banner = Db::name("banner")->select();
        echo json_encode($banner);
        //return json($activity);
    }
    public function addbanner(){
        $data = $this->request->post();
        $res = Db::name("banner")->insert($data);
        echo json_encode($res);
    }
    public function editbanner(){
        $data = $this->request->post();
        $res = Db::name("banner")->update($data);
        echo json_encode($res);
    }
    public function delbanner(){
        $data = $this->request->post();
        $res = Db::name("banner")->delete($data);
        echo json_encode($res);
    }
}