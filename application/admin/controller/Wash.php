<?php
namespace  app\admin\controller;

use think\Controller;
use think\Db;
header('Access-Control-Allow-Origin: *');

class Wash extends Controller{
    public function getwashlist(){
        $wash = Db::name("wash")->alias('w')
        ->join('user u','w.userid = u.userid')
        ->select();
        echo json_encode($wash);
        //return json($activity);
    }
    public function delwash(){
        $data = $this->request->post();
        $res = Db::name("wash")->delete($data);
        echo json_encode($res);
    }
}