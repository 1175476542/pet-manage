<?php

namespace app\api\controller;

use app\api\model\Carts;
use app\api\model\Goods;
use app\api\model\Stores;
use app\api\model\Users;
use think\Controller;
use think\Request;
use think\Session;
// class News 
// {
//     public function index(){
//         echo 'sadsad';
//     }
// }
// $post = json_decode(file_get_contents("php://input"), true);
// // 验证用户名
// $username = $post['username'];
// $password = $post['password'];

// $GLOBALS


class Cartsc extends Controller
{
    private $name = '';
  //随机生成id
  function randString() {

    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
//    $characters = '0123456789a';
    $randomString = '';
    for ($i = 0; $i < 15; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function addToCarts()
    {
      // $orderId =$this->randString();
      $params = Request::instance()->param();
      $goodsId = $params['goodsId'];
      $userName = $params['userName'];
      $orderModel = new Carts();
      $res = $orderModel->addToCarts($goodsId,$userName);
      return json($res);
    }

}
