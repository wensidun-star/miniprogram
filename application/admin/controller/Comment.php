<?php
namespace  app\admin\controller;

use think\Controller;
use think\Db;
header('Access-Control-Allow-Origin: *');

class Comment extends Controller{
    public function getcommentlist(){
        $comment = Db::name("comment")->alias('c')
        ->join('user u','c.userid = u.userid')
        ->join('book b','c.bookid = b.bookid')
        ->select();
        echo json_encode($comment);
    }
}