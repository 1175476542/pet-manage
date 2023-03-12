<?php
namespace app\api\model;

use think\Model;

class Saled extends Model{
  
  public function getMySaledList($userName){
    
    $selectData = [
      'user_name'=>$userName,
    ];
    $data = $this->where($selectData)->select();
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => $data];
    }else {
    return ['code' => 404, 'msg' => 'fail', 'data' => '服务器繁忙，请刷新重试'];
    }
  }
  
public function changeSaledStatus($saledManageId){
    
    $selectData = [
      'saled_manage_id'=>$saledManageId,
    ];
    $uploadData = [
      'status'=>2,
    ];
    $data = $this->where($selectData)->update($uploadData);
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => '操作成功'];
    }else {
    return ['code' => 404, 'msg' => 'fail', 'data' => '服务器繁忙，请刷新重试'];
    }
  }
  public function addDetail($saledManageId,$saledOrderId,$detail,$userOrderName,$storeManagerName){
    $insertData = [
      'saled_manage_id'=>$saledManageId,
      'saled_order_id'=>$saledOrderId,
      'detail'=>$detail,
      'user_name'=>$userOrderName,
      'store_manager_name'=>$storeManagerName,
      'status'=>0,
    ];
    $data = $this->insert($insertData);
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => '操作成功'];
    }else {
    return ['code' => 404, 'msg' => 'fail', 'data' => '服务器繁忙，请刷新重试'];
    }
  }
  public function finishSaled($saledManageId){
    
    $selectData = [
      'saled_manage_id'=>$saledManageId,
    ];
    $uploadData = [
      'status'=>1,
    ];
    $data = $this->where($selectData)->update($uploadData);
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => '操作成功'];
    }else {
    return ['code' => 404, 'msg' => 'fail', 'data' => '服务器繁忙，请刷新重试'];
    }
  }
    public function getAllSaledList(){
    
    $data = $this->select();
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => $data];
    }else {
    return ['code' => 404, 'msg' => 'fail', 'data' => '服务器繁忙，请刷新重试'];
    }
  }
}