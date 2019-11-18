<?php
namespace  app\index\controller;

use think\Controller;
use think\Db;
header('Access-Control-Allow-Origin: *');

class Local extends Controller{
    public function addlocal(){
        $data = $this->request->post();
        $userid = Db::table('user')->where('openid',$data["openid"])->value("userid");
        $local = [
            "sendname" => $data["sendname"],
            "sendphone" => $data["sendphone"],
            "localname" => $data["localname"],
            "userid" => $userid
        ];
        $local = Db::table('local')->insert($local);
        echo json_encode($local);
    }
    public function getlocallist(){
        $data = $this->request->post();
        $userid = Db::table('user')->where('openid',$data["openid"])->value("userid");
        $local = Db::table('local')->where('userid',$userid)->select();
        echo json_encode($local);
    }
    public function editlocal(){
        $data = $this->request->post();
        $userid = Db::table('user')->where('openid',$data["openid"])->value("userid");
        $local = [
            "localid" => $data["localid"],
            "sendname" => $data["sendname"],
            "sendphone" => $data["sendphone"],
            "localname" => $data["localname"],
            "userid" => $userid
        ];
        $res = Db::name("local")->update($local);
        echo json_encode($res);
    }
    public function getlocal(){
        $data = $this->request->post();
        $local = Db::table('local')->where('localid',$data["localid"])->select();
        echo json_encode($local);
    }
    public function dellocal(){
        $data = $this->request->post();
        $local = Db::table('local')->delete($data);
        echo json_encode($local);
    }
}