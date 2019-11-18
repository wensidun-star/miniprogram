<?php
namespace  app\admin\controller;

use think\Controller;
use think\Db;
header('Access-Control-Allow-Origin: *');

class Collection extends Controller{
    public function getcollectionlist(){
        $collections = Db::name("collection")->alias('c')
        ->join('user u','c.userid = u.userid')
        ->join('book b','c.bookid = b.bookid')
        ->select();
        echo json_encode($collections);
    }
}