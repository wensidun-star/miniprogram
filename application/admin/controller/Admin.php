<?php
namespace  app\admin\controller;

use think\Controller;
use think\Db;
header('Access-Control-Allow-Origin: *');

class Admin extends Controller{
    public function getadminlist(){
        $admin = Db::name("admin")->select();
        echo json_encode($admin);
        //return json($activity);
    }
    public function login(){
        $data = $this->request->post();
        $admin = Db::name("admin")->where("adminname",$data["adminname"])->where("password",$data["password"])->select();
        echo json_encode($admin);
    }
}