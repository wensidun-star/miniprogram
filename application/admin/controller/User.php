<?php
namespace  app\admin\controller;

use think\Controller;
use think\Db;
header('Access-Control-Allow-Origin: *');

class User extends Controller{
    public function getuserlist(){
        $user = Db::name("user")->select();
        echo json_encode($user);
        //return json($activity);
    }
}