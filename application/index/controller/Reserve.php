<?php
namespace  app\index\controller;

use think\Controller;
use think\Db;
header('Access-Control-Allow-Origin: *');

class Reserve extends Controller{
    public function addreserve(){
        $data = $this->request->post();
        $userid = Db::table('user')->where('openid',$data["openid"])->value("userid");
        $reserve = [
            "bookid" => $data["bookid"],
            "reversenum" => $data["reversenum"],
            "userid" => $userid
        ];
        
        $res = Db::name("reserve")->insert($reserve);
        echo json_encode($res);
    }
    public function getreserve(){
        $data = $this->request->post();
        $userid = Db::table('user')->where('openid',$data["openid"])->value("userid");
        $res = Db::table('reserve')->alias('r')
        ->join('user u',$userid = 'u.userid')
        ->join('book b','r.bookid = b.bookid')
        ->select();
        echo json_encode($res);
    }
}