<?php
namespace  app\index\controller;

use think\Controller;
use think\Db;
header('Access-Control-Allow-Origin: *');

class User extends Controller{
    public function getuser(){
        $data = $this->request->post();
        $user = Db::table('user')->where('openid',$data["openid"])->select();
        echo json_encode($user);
    }
    public function getcommentuser(){
        $data = $this->request->post();
        $user = Db::table('user')->where('userid',$data["userid"])->select();
        echo json_encode($user);
    }
}