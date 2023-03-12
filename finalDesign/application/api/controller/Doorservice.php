<?php

namespace app\api\controller;

use app\api\model\Doorservice as ModelDoorservice;
use think\Controller;
use think\Request;
// class News 
// {
//     public function index(){
//         echo 'sadsad';
//     }
// }


class Doorservice extends Controller
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
    public function index()
    {
        //
        $res = ['code'=>200,'msg'=>'success','data'=>'index'];
        return json($res);
    }
    public function addService()
    {
        $param = Request::instance()->param();
        $serviceId =$this->randString();
        $storeId = $param['storeId'];
        $userName = $param['userName'];
        $phoneNum = $param['phoneNum'];
        $petName = $param['petName'];
        $address = $param['address'];
        $petAge = $param['petAge'];
        $petType = $param['petType'];
        $petVarieties = $param['petVarieties'];
        $details = $param['details'];
        $userOrderName = $param['userOrderName'];
        $doorServiceModel = new ModelDoorservice();
        $res = $doorServiceModel->addService($storeId,$serviceId,$userName,$phoneNum,$petName,$address,$petAge,$petType,$petVarieties,$details,$userOrderName);
        return json($res);
    }
    public function getFinishList(){
        $params = Request::instance()->param();
        $storeManagerName = $params['storeManagerName'];
        $doorServiceModel = new ModelDoorservice();
        $res = $doorServiceModel->getFinishList($storeManagerName);
        return json($res);
    }
    public function getUnfinishList(){
        $params = Request::instance()->param();
        $storeManagerName = $params['storeManagerName'];
        $doorServiceModel = new ModelDoorservice();
        $res = $doorServiceModel->getUnfinishList($storeManagerName);
        return json($res);
    }
    public function getFinishDetail(){
        $params = Request::instance()->param();
        $doorServiceId = $params['doorServiceId'];
        $doorServiceModel = new ModelDoorservice();
        $res = $doorServiceModel->getFinishDetail($doorServiceId);
        return json($res);
    }
    public function finishService(){
        $request = Request::instance();

        $visitingServiceId = $request->post('visitingServiceId');
        $doorServiceModel = new ModelDoorservice();
        $res = $doorServiceModel->finishService($visitingServiceId);
        return json($res);
    }
    public function getUserAllForOrder(){
        $request = Request::instance();

        $userName = $request->post('userName');
        $doorServiceModel = new ModelDoorservice();
        $res = $doorServiceModel->getUserAllForOrder($userName);
        return json($res);
    }
    public function getStoreAllForOrder(){
        $request = Request::instance();

        $storeName = $request->post('storeName');
        $doorServiceModel = new ModelDoorservice();
        $res = $doorServiceModel->getStoreAllForOrder($storeName);
        return json($res);
    }
    public function getAllForOrder(){
        $request = Request::instance();

        $doorServiceModel = new ModelDoorservice();
        $res = $doorServiceModel->getAllForOrder();
        return json($res);
    }
    public function getSelectOrder(){
        $request = Request::instance();

        $visitingServiceId = $request->post('visitingServiceId');
        $doorServiceModel = new ModelDoorservice();
        $res = $doorServiceModel->getSelectOrder($visitingServiceId);
        return json($res);
    }
    public function updateDoorService()
    {
        $param = Request::instance()->param();
        // $serviceId =$this->randString();
        // var_dump($param['petType']);
        $serviceId = $param['visitingServiceId'];
        $storeId = $param['store_manager_name'];
        $userName = $param['user_name'];
        $phoneNum = $param['user_phone'];
        $petName = $param['pet_name'];
        $address = $param['address'];
        $petAge = $param['pet_age'];
        $petType = $param['petType'][0];
        $petVarieties = $param['petType'][1];
        $details = $param['service_details'];
        $userOrderName = $param['userOrderName'];//TODO
        $doorServiceModel = new ModelDoorservice();
        $res = $doorServiceModel->updateDoorService($storeId,$serviceId,$userName,$phoneNum,$petName,$address,$petAge,$petType,$petVarieties,$details
        ,$userOrderName
    );

        // $serviceId,$userName,$phoneNum,$petName,$petAge,$petType,$details
        //
        return json($res);
    }
}
