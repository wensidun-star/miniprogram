<?php
namespace  app\admin\controller;

use think\Controller;
use think\Db;
header('Access-Control-Allow-Origin: *');

class Reserve extends Controller{
    public function getreservelist(){
        $reserve = Db::name("reserve")->alias('r')
        ->join('user u','r.userid = u.userid')
        ->join('book b','r.bookid = b.bookid')
        ->select();
        echo json_encode($reserve);
    }
}