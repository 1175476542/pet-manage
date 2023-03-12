<?php

namespace app\api\controller;

use app\api\model\Goods;
use app\api\model\Saled;
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


class Saledc extends Controller
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
    public function getMySaledList()
    {
        $params = Request::instance()->param();
        $userName = $params['userName'];
        $orderModel = new Saled();
        $res = $orderModel->getMySaledList($userName);
        return json($res);
    }
    public function addDetail()
    {
        $preId = $storeId = $this->randString();
        $params = Request::instance()->param();
        // $afterId = $params['saledManageId'];
        $saledManageId = $preId.$params['saledManageId'];
        $saledOrderId = $params['saledOrderId'];
        $detail = $params['detail'];
        $userOrderName = $params['userOrderName'];
        $storeManagerName = $params['storeManagerName'];
        $orderModel = new Saled();
        $res = $orderModel->addDetail($saledManageId,$saledOrderId,$detail,$userOrderName,$storeManagerName);
        return json($res);
    }
    public function changeSaledStatus()
    {
        $params = Request::instance()->param();
        $saledManageId = $params['saledManageId'];
        $orderModel = new Saled();
        $res = $orderModel->changeSaledStatus($saledManageId);
        return json($res);
    }
     public function finishSaled()
    {
        $params = Request::instance()->param();
        $saledManageId = $params['saledManageId'];
        $orderModel = new Saled();
        $res = $orderModel->finishSaled($saledManageId);
        return json($res);
    }
    public function getAllSaledList()
    {
        $orderModel = new Saled();
        $res = $orderModel->getAllSaledList();
        return json($res);
    }

    // public function addStore()
    // {
    //     $params = Request::instance()->param();
    //     $storeId = $this->randString();
    //     $storeName = $params['storeName'];
    //     $userName = $params['userName'];
    //     $storeDetails = $params['storeDetails'];
    //     $storeModel = new Stores();
    //     $res = $storeModel->addStore($storeId,$storeName,$storeDetails,$userName);
    //     $userModel = new Users();
    //     $data = $userModel->setIsFirst($userName);
        
    //     //
    //     // $res = ['code'=>200,'msg'=>'success','data'=>'index'];
    //     return json($res);
    // }
   
    // public function dealSaled()
    // {
    //     $saledManageId =$this->randString();
    //     $params = Request::instance()->param();
    //     $saledOrderId = $params['saledOrderId'];
    //     $detail = $params['detail'];
    //     $userOrderName = $params['userOrderName'];
    //     $storeManagerName = $params['storeManagerName'];
    //     $orderModel = new Saled();
    //     $res = $orderModel->addDetail($saledManageId,$saledOrderId,$detail,$userOrderName,$storeManagerName);
    //     return json($res);
    // }
}
