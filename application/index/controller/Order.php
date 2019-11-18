<?php
namespace  app\index\controller;

use think\Controller;
use think\Db;
header('Access-Control-Allow-Origin: *');

class Order extends Controller{
    public function addorder(){
        $data = $this->request->post();
        $userid = Db::table('user')->where('openid',$data["openid"])->value("userid");
        $order = [
            'orderuser' => $userid,
            'orderprice' => $data['orderprice'],
            'orderstate' => 0,
            'bookid' => $data['bookid']
        ];
        $res = Db::table('order')->insert($order);
        echo json_encode($res);
    }
    public function getorder(){
        $data = $this->request->post();
        $userid = Db::table('user')->where('openid',$data["openid"])->value("userid");
        $res = Db::table('order')->alias('o')
        ->join('user u',$userid = 'u.userid')
        ->join('book b','o.bookid = b.bookid')
        ->select();
        echo json_encode($res);
    }
    public function editstate(){
        $data = $this->request->post();
        $res = Db::table('order')->update($data);
        echo json_encode($res);
    }
}