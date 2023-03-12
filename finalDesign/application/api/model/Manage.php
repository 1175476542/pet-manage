<?php
namespace app\api\model;

use think\Model;

class Manage extends Model{
  
  public function addOrder($manageOrderId,$storeManagerName,$userOrderName,$now,$price,$userName,$phoneNum,$address,$nickname){
    
    $insertData = [
      'manage_order_id'=>$manageOrderId,
      'store_manager_name'=>$storeManagerName,
      'user_order_name'=>$userOrderName,
      'order_time'=>$now,
      'order_price'=>$price,
      'manage_order_status'=>0,
      'user_name'=>$userName,
      'phone_num'=>$phoneNum,
      'address'=>$address,
      'nickname'=>$nickname,
    ];
    $data = $this->insert($insertData);
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => '下单成功','manageId'=>$manageOrderId];
    }
    else {
        return ['code' => 404, 'msg' => 'fail', 'data' => '下单失败'];
    }
  }
  // public function getOrderIds($storeManagerName){
  //   $selectData = [
  //     'store_manager_name'=>$storeManagerName
  //   ];
  //   $data = $this->field()
  // }
  public function changeOrderStatus($manageOrderId,$leaveTime){
    $selectData = [
      'manage_order_id'=>$manageOrderId,
      
    ];
    $updateData = [
      'manage_order_status'=>1,
      'end_time'=>$leaveTime
    ];
    $res = $this->where($selectData)->update($updateData);
    if ($res) {
      return true;
    }else {
      return false;
    }
  }
  public function getDetail($userName){
    $selectData = [
      'nickname'=>$userName,
    ];
    $data = $this->where($selectData)->select();
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => $data];
    }else {
      return ['code' => 404, 'msg' => 'fail', 'data' => '服务器繁忙，请稍后再试'];
    }
  }
  public function getPriceDetail($manageOrderId){
    $selectData = [
      'manage_order_id'=>$manageOrderId,
    ];
    $data = $this->where($selectData)->find();
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => $data];
    }else {
      return ['code' => 404, 'msg' => 'fail', 'data' => '服务器繁忙，请稍后再试'];
    }
  }
}