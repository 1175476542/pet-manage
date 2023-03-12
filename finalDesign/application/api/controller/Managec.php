<?php

namespace app\api\controller;

use app\api\model\Manage;
use app\api\model\Pet;
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




class Managec extends Controller
{
    
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
    private $manageOrderId = '';
    public function index()
    {
        $param = Request::instance()->param();
        $petId =$this->randString();
        // $goodsImg = $request->file('goodsImg');
        // $address = $param['address'];
        $details = $param['details'];
        $pngName = $param['pngName'];
        $phoneNum = $param['phoneNum'];
        $userName = $param['userName'];
        $src = 'static/image/pet/'.$pngName;
        $manageDays = $param['manageDays'];
        $petAge = $param['petAge'];
        $petName = $param['petName'];
        $petType = $param['petType'];
        $manageOrderId =  $param['manageOrderId'];
        $storeManagerName =  $param['storeManagerName'];
        $nickname = $param['userNickname'];

        // return json($userId);
        $petModel = new Pet();
        $res = $petModel->addPets($petId,$details,$src,$manageDays,$petAge,$petName,$petType,$manageOrderId,$storeManagerName,$phoneNum,$nickname,$userName);
       
        
        //
        // $res = ['code'=>200,'msg'=>'success','data'=>'index'];
        return json($res);
    }
    public function addOrder()
    {
        $params = Request::instance()->param();
        $manageOrderId = $this->randString();
        $this->manageOrderId = $manageOrderId;
        $storeManagerName = $params['storeManagerName'];
        $userOrderName = $params['userOrderName'];
        $now = $params['now'];
        $days = $params['days'];
        $userName = $params['userName'];
        $phoneNum = $params['phoneNum'];
        $address = $params['address'];
        $nickname = $params['userNickname'];
        $storeModel = new Stores();
        $singlePrice = $storeModel->findPrice($storeManagerName);
        $price = $days*$singlePrice;
        $manageModel = new Manage();
        $res = $manageModel->addOrder(
            $manageOrderId,$storeManagerName,$userOrderName,$now,$price,$userName,$phoneNum,$address,$nickname
        );
        return json($res);
    }
    public function saveImg(){
        // $request = Request::instance();
        $file = request()->file('petFace');
        if ($file) {
            $info = $file->move('static/image/pet','');
            if ($info) {
                $name = $info->getFilename();
            }
        }
        
    }
    public function getPetList(){
        $params = Request::instance()->param();
        $storeManagerName = $params['storeManagerName'];
        $petModel = new Pet();
        $res = $petModel->getPetList($storeManagerName);
        return json($res);
    }
    public function getPetArriveList(){
        $params = Request::instance()->param();
        $storeManagerName = $params['storeManagerName'];
        $petModel = new Pet();
        $res = $petModel->getPetArriveList($storeManagerName);
        return json($res);
    }
    public function getPetLeaveList(){
        $params = Request::instance()->param();
        $storeManagerName = $params['storeManagerName'];
        $petModel = new Pet();
        $res = $petModel->getPetLeaveList($storeManagerName);
        return json($res);
    }
    public function changeArrive(){
        $params = Request::instance()->param();
        $arriveTime = $params['now'];
        $petId = $params['petId'];
        $petModel = new Pet();
        $res = $petModel->changeArrive($petId,$arriveTime);
        return json($res);
    }
    public function changeLeave(){
        $params = Request::instance()->param();
        $petId = $params['petId'];
        $leaveTime = $params['leaveTime'];
        $manageOrderId = $params['manageOrderId'];
        $petModel = new Pet();
        $res = $petModel->changeLeave($petId,$leaveTime);
        $manageModel = new Manage();
        $data = $manageModel->changeOrderStatus($manageOrderId,$leaveTime);
        if ($res&&$data) {
            return json(['code' => 200, 'msg' => 'success', 'data' => '操作成功']);
        }else {
            return json(['code' => 404, 'msg' => 'fail', 'data' => '服务器繁忙，请稍后再试']);
        }
        
    }
    public function getDetail()
    {
        $params = Request::instance()->param();
        $userName = $params['userName'];
        $orderModel = new Manage();
        $res = $orderModel->getDetail($userName);
        return json($res);
    }
    public function getPriceDetail()
    {
        $params = Request::instance()->param();
        $manageOrderId = $params['manage_order_id'];
        $orderModel = new Manage();
        $res = $orderModel->getPriceDetail($manageOrderId);
        return json($res);
    }
}
