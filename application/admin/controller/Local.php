<?php
namespace  app\admin\controller;

use think\Controller;
use think\Db;
header('Access-Control-Allow-Origin: *');

class Local extends Controller{
    public function getlocallist(){
        $local = Db::name("local")->alias('l')
        ->join('user u','l.userid = u.userid')
        ->select();
        echo json_encode($local);
    }
}