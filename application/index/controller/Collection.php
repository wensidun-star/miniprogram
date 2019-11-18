<?php
namespace  app\index\controller;

use think\Controller;
use think\Db;
header('Access-Control-Allow-Origin: *');

class Collection extends Controller{
    public function addcollection(){
        $data = $this->request->post();
        $openid = Db::table('user')->where('openid',$data["openid"])->value("userid");
        $collection = [
            "bookid" => $data["bookid"],
            "userid" => $openid
        ];
        $res = Db::name("collection")->insert($collection);
        echo json_encode($res);
    }
    public function ifcollection(){
        $data = $this->request->post();
        $userid = Db::table('user')->where('openid',$data["openid"])->value("userid");
        $bookid = $data["bookid"];
        $res = Db::table('collection')->where('userid',$userid)->where('bookid',$bookid)->find();
        echo json_encode($res);
    }
    public function delcollection(){
        $data = $this->request->post();
        $userid = Db::table('user')->where('openid',$data["openid"])->value("userid");
        $bookid = $data["bookid"];
        $res = Db::table('collection')->where('userid',$userid)->where('bookid',$bookid)->delete();
        echo json_encode($res);
    }
    public function getcollectionList(){
        $data = $this->request->post();
        $userid = Db::table('user')->where('openid',$data["openid"])->value("userid");
        $res = Db::table('collection')->where('userid',$userid)->column("bookid");
        echo json_encode($res);
    }
}