<?php
namespace  app\index\controller;

use think\Controller;
use think\Db;
header('Access-Control-Allow-Origin: *');

class Book extends Controller{
    public function getbooklist(){
        $data = $this->request->post();
        $book = Db::table('book')->where('categoryid',$data["categoryid"])->select();
        echo json_encode($book);
    }
    public function getbookinfo(){
        $data = $this->request->post();
        $book = Db::table('book')->where('bookid',$data["bookid"])->select();
        echo json_encode($book);
    }
    public function searchbook(){
        $data = $this->request->post();
        $book = Db::table('book')->where('bookname','like',$data["sv"] . '%')->select();
        echo json_encode($book);
    }
}