<?php

namespace app\api\controller;

use app\api\controller\Order as ControllerOrder;
use app\api\model\Goods;
use app\api\model\Order as ModelOrder;
use app\api\model\Orders;
use app\api\model\Pet;
use app\api\model\Saled;
use app\api\model\Stores;
use app\api\model\Users;
// use app\api\model\Order;
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


class Order extends Controller
{
    private $name = '';
    //随机生成id
    function randString()
    {

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
    public function addDetail()
    {
        $saledManageId = $this->randString();
        $params = Request::instance()->param();
        $saledOrderId = $params['saledOrderId'];
        $detail = $params['detail'];
        $userOrderName = $params['userOrderName'];
        $storeManagerName = $params['storeManagerName'];
        $orderModel = new Saled();
        $res = $orderModel->addDetail($saledManageId, $saledOrderId, $detail, $userOrderName, $storeManagerName);
        return json($res);
    }
    public function buyNow()
    {
        $orderId = $this->randString();
        $params = Request::instance()->param();
        $goodsId = $params['goodsId'];
        $goodsName = $params['goodsName'];
        $goodsPrice = $params['goodsPrice'];
        $userName = $params['userName'];
        $storeManagerName = $params['storeManagerName'];
        $address = $params['address'];
        $phoneNum = $params['phoneNum'];
        $orderModel = new Orders();
        $res = $orderModel->buyNow($orderId, $goodsId, $goodsName, $goodsPrice, $userName, $storeManagerName, $address,$phoneNum);
        return json($res);
    }
    public function getUserOrder()
    {
        $params = Request::instance()->param();
        $userName = $params['userName'];
        $orderModel = new Orders();
        $res = $orderModel->getUserOrder($userName);
        return json($res);
    }
    public function changeOrderstatus()
    {
        $params = Request::instance()->param();
        $orderId = $params['orderId'];
        $orderModel = new Orders();
        $res = $orderModel->changeOrderstatus($orderId);
        return json($res);
    }

    public function changeAddress()
    {
        $params = Request::instance()->param();
        $orderId = $params['orderId'];
        $address = $params['address'];
        $phoneNum = $params['phoneNum'];
        $orderModel = new Orders();
        $res = $orderModel->changeAddress($orderId, $address,$phoneNum);
        return json($res);
    }
    public function getStoreOrder()
    {
        $params = Request::instance()->param();
        $storeName = $params['storeName'];
        $orderModel = new Orders();
        $res = $orderModel->getStoreOrder($storeName);
        return json($res);
    }
    public function changeStoreOrderStatus()
    {
        $params = Request::instance()->param();
        $orderId = $params['orderId'];
        $orderModel = new Orders();
        $res = $orderModel->changeStoreOrderStatus($orderId);
        return json($res);
    }  
    public function cancelOrder()
    {
        $params = Request::instance()->param();
        $orderId = $params['orderId'];
        $orderModel = new Orders();
        $res = $orderModel->cancelOrder($orderId);
        return json($res);
    }
public function getAllOrder()
    {
        $orderModel = new Orders();
        $res = $orderModel->getAllOrder();
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

    
}
