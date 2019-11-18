<?php
namespace  app\admin\controller;

use think\Controller;
use think\Db;
header('Access-Control-Allow-Origin: *');

class Order extends Controller{
    public function getorderlist(){
        $order = Db::name("order")->alias('o')
        ->join('user u','o.orderuser = u.userid')
        ->join('book b','o.bookid = b.bookid')
        ->select();
        echo json_encode($order);
    }
}