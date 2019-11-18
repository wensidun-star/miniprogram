<?php
namespace  app\index\controller;

use think\Controller;
use think\Db;
header('Access-Control-Allow-Origin: *');

class Comment extends Controller{
    public function addcomment(){
        $data = $this->request->post();
        $userid = Db::table('user')->where('openid',$data["openid"])->value("userid");
        $comment = [
            'userid' => $userid,
            'comment' => $data['comment'],
            'rote' => $data['rote'],
            'bookid' => $data['bookid']
        ];
        $res = Db::name("comment")->insert($comment);
        echo json_encode($res);
    }
    public function getcommentlist(){
        $data = $this->request->post();
        $comment = Db::table('comment')->where('bookid',$data["bookid"])->select();
        echo json_encode($comment);
    }
}