<?php
namespace  app\index\controller;

use think\Controller;
use think\Db;
header('Access-Control-Allow-Origin: *');

class Wash extends Controller{
    public function addwash(){
        $data = $this->request->post();
        $userid = Db::table('user')->where('openid',$data["openid"])->value("userid");
        $wash = [
            'userid' => $userid,
            'washintro' => $data['washintro'],
            'washstate' => $data['washstate']
        ];
        $res = Db::name("wash")->insert($wash);
        echo json_encode($res);
    }
    public function getwashlist(){
        $data = $this->request->post();
        $res = Db::name("wash")->where('washstate',$data["washstate"])->select();
        echo json_encode($res);
    }
}