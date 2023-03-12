<?php
namespace app\api\model;

use think\Model;

class Doorservice extends Model
{
  public function addService($storeId,$serviceId,$userName,$phoneNum,$petName,$address,$petAge,$petType,$petVarieties,$details,$userOrderName){
    $insertData = [
      'store_manager_name'=>$storeId,
      'visiting_service_id'=>$serviceId,
      'user_name'=>$userName,
      'user_phone'=>$phoneNum,
      'pet_name'=>$petName,
      'address'=>$address,
      'pet_age'=>$petAge,
      'pet_type'=>$petType,
      'pet_varieties'=>$petVarieties,
      'service_details'=>$details,
      'user_order_name'=>$userOrderName,
      'status' =>0,
    ];
    $data = $this->insert($insertData);
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => '申请成功'];
    }else {
      return ['code' => 404, 'msg' => 'fail', 'data' => '申请失败'];
    }
  }
  public function getFinishList($storeManagerName){
    $selectData = [
      'store_manager_name'=>$storeManagerName,
      'status'=>1
    ];
    $data = $this->where($selectData)->select();
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => $data];
    }else {
      return ['code' => 404, 'msg' => 'fail', 'data' => '服务器繁忙'];
    }
  }
  public function getUnfinishList($storeManagerName){
    $selectData = [
      'store_manager_name'=>$storeManagerName,
      'status'=>0
    ];
    $data = $this->where($selectData)->select();
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => $data];
    }else {
      return ['code' => 404, 'msg' => 'fail', 'data' => '服务器繁忙'];
    }
  }
  public function getFinishDetail($doorServiceId){
    $selectData = [
      'visiting_service_id'=>$doorServiceId
    ];
    $data = $this->where($selectData)->select();
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => $data];
    }else {
      return ['code' => 404, 'msg' => 'fail', 'data' => '服务器繁忙'];
    }
  }
  public function finishService($visitingServiceId){
    $selectData = [
      'visiting_service_id'=>$visitingServiceId
    ];
    $updateData = [
      'status' => 1
    ];
    $data = $this->where($selectData)->update($updateData);
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => '操作成功'];
    }else {
      return ['code' => 404, 'msg' => 'fail', 'data' => '服务器繁忙'];
    }
  }
  public function getUserAllForOrder($userName){
    $selectData = [
      'user_order_name'=>$userName,
    ];
    $data = $this->where($selectData)->select();
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => $data];
    }else {
      return ['code' => 404, 'msg' => 'fail', 'data' => '服务器繁忙'];
    }
  }
  public function getStoreAllForOrder($storeName){
    $selectData = [
      'store_manager_name'=>$storeName,
    ];
    $data = $this->where($selectData)->select();
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => $data];
    }else {
      return ['code' => 404, 'msg' => 'fail', 'data' => '服务器繁忙'];
    }
  }
  public function getAllForOrder(){
    $data = $this->select();
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => $data];
    }else {
      return ['code' => 404, 'msg' => 'fail', 'data' => '服务器繁忙'];
    }
  }
  public function getSelectOrder($visitingServiceId){
    $selectData = [
      'visiting_service_id'=>$visitingServiceId,
    ];
    $data = $this->where($selectData)->select();
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => $data];
    }else {
      return ['code' => 404, 'msg' => 'fail', 'data' => '服务器繁忙'];
    }
  }
   public function updateDoorService($storeId,$serviceId,$userName,$phoneNum,$petName,$address,$petAge,$petType,$petVarieties,$details
   ,$userOrderName){
    $selectData = [
      'visiting_service_id'=>$serviceId,
    ];
    $updateData = [
      'user_name'=>$userName,
      'user_phone'=>$phoneNum,
      'pet_name'=>$petName,
      'pet_age'=>$petAge,
      'pet_type'=>$petType,
      'service_details'=>$details,
      'pet_varieties'=>$petVarieties,
      'store_manager_name'=>$storeId,
      'address'=>$address,
      'status'=>0,
    ];
    $data = $this->where($selectData)->update($updateData);
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => '更新成功'];
    }else {
      return ['code' => 404, 'msg' => 'fail', 'data' => '未修改或服务器繁忙'];
    }
  }
}
