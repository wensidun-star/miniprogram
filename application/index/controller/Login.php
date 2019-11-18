<?php
namespace  app\index\controller;

use think\Controller;
use think\Db;
header('Access-Control-Allow-Origin: *');

class Login extends Controller{
    public function getuserinfo(){
        $code = $_REQUEST["code"];//获取code
        $appid ="wx42137274487ceec5";
        $secret = "e0264bc8460ea134907a6718166dc25f";
        $url = "https://api.weixin.qq.com/sns/jscode2session?appid=wx42137274487ceec5&secret=e0264bc8460ea134907a6718166dc25f&js_code=$code&grant_type=authorization_code";
        //通过code换取网页授权access_token
        $weixin =  file_get_contents($url);
        $jsondecode = json_decode($weixin); //对JSON格式的字符串进行编码
        $array = get_object_vars($jsondecode);//转换成数组
        $openid = $array['openid'];//输出openid
        return $openid;
    }
    public function adduser(){
        $data = $this->request->post();
        $res = Db::name("user")->insert($data);
        echo json_encode($res);
    }
    public function iflogin(){
        $data = $this->request->post();
        $res = Db::table('user')->where('openid',$data["openid"])->select();
        if($res == []){
            echo 0;
        }else{
            echo 1;
        }
    }
}