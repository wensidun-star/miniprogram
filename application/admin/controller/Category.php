<?php
namespace  app\admin\controller;

use think\Controller;
use think\Db;
header('Access-Control-Allow-Origin: *');

class Category extends Controller{
    public function getcatelist(){
        $bookcate = Db::name("bookcategory")->select();
        echo json_encode($bookcate);
        //return json($activity);
    }
    public function addcategory(){
        $data = $this->request->post();
        $res = Db::name("bookcategory")->insert($data);
        echo json_encode($res);
    }
    public function editcategory(){
        $data = $this->request->post();
        $res = Db::name("bookcategory")->update($data);
        echo json_encode($res);
    }
    public function deletecate(){
        $data = $this->request->post();
        $res = Db::name("bookcategory")->delete($data);
        echo json_encode($res);
    }
}