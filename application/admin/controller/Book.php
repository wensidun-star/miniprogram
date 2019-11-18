<?php
namespace  app\admin\controller;

use think\Controller;
use think\Db;
header('Access-Control-Allow-Origin: *');

class Book extends Controller{
    public function getbooklist(){
        $book = Db::name("book")->select();
        echo json_encode($book);
        //return json($activity);
    }
    public function addbook(){
        $data = $this->request->post();
        $res = Db::name("book")->insert($data);
        echo json_encode($data);
    }
    public function deletebook(){
        $data = $this->request->post();
        $res = Db::name("book")->delete($data);
        echo json_encode($res);
    }
    public function editbook(){
        $data = $this->request->post();
        $res = Db::name("book")->update($data);
        echo json_encode($res);
    }
}