<?php
namespace app\api\model;

use think\Model;

class Pet extends Model{
  
  public function addPets($petId,$details,$src,$manageDays,$petAge,$petName,$petType,$manageOrderId,$storeManagerName,$phoneNum,$nickname,$userName){
    
    $insertData = [
      'manage_order_id'=>$manageOrderId,
      'pet_id'=>$petId,
      'pet_avatur'=>$src,
      'pet_age'=>$petAge,
      'pet_name'=>$petName,
      'user_name'=>$userName,
      'phone_num'=>$phoneNum,
      'status'=>0,
      'pet_type'=>$petType[0],
      'pet_varieties'=>$petType[1],
      'manage_days'=>$manageDays,
      'store_manager_name'=>$storeManagerName,
      'nickname'=>$nickname,
    ];
    $data = $this->insert($insertData);
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => '下单成功'];
    }
    else {
        return ['code' => 404, 'msg' => 'fail', 'data' => '下单失败'];
    }
  }
  public function getPetList($storeManagerName){
    $selectData = [
      'store_manager_name'=>$storeManagerName,
      'status'=>0
    ];
    $data = $this->where($selectData)->select();
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => $data];
    }else {
      return ['code' => 404, 'msg' => 'fail', 'data' => '服务器繁忙，请稍后再试'];
    }
  }
  public function getPetArriveList($storeManagerName){
    $selectData = [
      'store_manager_name'=>$storeManagerName,
      'status'=>1
    ];
    $data = $this->where($selectData)->select();
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => $data];
    }else {
      return ['code' => 404, 'msg' => 'fail', 'data' => '服务器繁忙，请稍后再试'];
    }
  }
  public function getPetLeaveList($storeManagerName){
    $selectData = [
      'store_manager_name'=>$storeManagerName,
      'status'=>2
    ];
    $data = $this->where($selectData)->select();
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => $data];
    }else {
      return ['code' => 404, 'msg' => 'fail', 'data' => '服务器繁忙，请稍后再试'];
    }
  }
  public function changeLeave($petId,$leaveTime){
    $selectData = [
      'pet_id'=>$petId,
    ];
    $updateData = [
      'status'=>2,
      'leave_time'=>$leaveTime
    ];
    $data = $this->where($selectData)->update($updateData);
    if ($data) {
      return true;
    }else {
      return false;
    }
  }
  public function changeArrive($petId,$arriveTime){
    $selectData = [
      'pet_id'=>$petId,
      
    ];
    $updateData = [
      'status'=>1,
      'arrive_time'=>$arriveTime
    ];
    $data = $this->where($selectData)->update($updateData);
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => '操作成功'];
    }else {
      return ['code' => 404, 'msg' => 'fail', 'data' => '服务器繁忙，请稍后再试'];
    }
  }
  
}