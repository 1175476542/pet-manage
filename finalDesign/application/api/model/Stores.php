<?php
namespace app\api\model;

use think\Model;
use think\Request;

class Stores extends Model{
  public function displayStore(){
    $selectData = [
      'status'=>1,
    ];
   
    // if ($storeName) {
      $data = $this->where($selectData)->select();
    // }else {
    //  $data = $this->where($selectData)->select();
    // }
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => $data];
    }else {
      return ['code' => 404, 'msg' => 'fail', 'data' => '查询为空'];
    }
  }   
  //  $selectData = [
  //     'status'=>1,
  //     'store_name'=>$storeName
  //   ];
  public function search($storeName){
      $data = $this->where('status',1)->where('store_name|user_name','like','%'.$storeName.'%')->select();//数据库链式查询
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => $data];
    }else {
      return ['code' => 404, 'msg' => 'fail', 'data' => '查询为空'];//查询判断进行返回
    }
  }
  public function addStore($storeId,$storeName,$storeDetails,$userName,$pngName,$dayCharge){
    $insertData = [
      'store_id'=>$storeId,
      'store_name'=>$storeName,
      'store_detail'=>$storeDetails,
      'user_name'=>$userName,
      'store_avatur'=>$pngName,
      'manage_price'=>$dayCharge,
      'status'=>2,
    ];
    $data = $this->insert($insertData);
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => '申请成功,等待审核'];
    }else {
      return ['code' => 404, 'msg' => 'fail', 'data' => '申请失败,请稍后重试'];
    }
  }
  public function checkStatus($userName){
    $data = $this->field('status')->where('user_name',$userName)->find();
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => $data];
    }else {
      return ['code' => 404, 'msg' => 'fail', 'data' => '服务器繁忙,请稍后重试'];
    }
    // return $data;
     
  }
  public function updateImg($userName,$src){
    $updateData = [
      'store_avatur'=>$src
    ];
    $data = $this->where('user_name',$userName)->update($updateData);
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => '路径添加成功'];
    }else {
      return ['code' => 404, 'msg' => 'fail', 'data' => '路径添加失败'];
    }
  }
  public function getStoresDetail(
    $storeManagerName
    ){
    $selectData = [
      'user_name'=>$storeManagerName
    ];
    $data = $this
    ->where($selectData)
    ->find();
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => $data];
    }
    else {
      return ['code' => 404, 'msg' => 'fail', 'data' => '查询失败'];
    }
  }
  public function storeCheck(){
    $selectData = [
      'status'=>'2'
    ];
    $data = $this->where($selectData)->select();
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => $data];
    }else {
      return ['code' => 404, 'msg' => 'fail', 'data' => '查询为空'];
    }
  }
  public function agreeStore($userName){
    $updateData = [
      'status'=>1
    ];
    $selectData = [
      'user_name'=>$userName,
      'status'=>2
    ];
    $data = $this->where($selectData)->update($updateData);
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => '操作成功'];
    }else {
      return ['code' => 404, 'msg' => 'fail', 'data' => '操作失败'];
    }
  }
  public function refuseStore($userName){
    $updateData = [
      'status'=>0
    ];
    $selectData = [
      'user_name'=>$userName,
      'status'=>2
    ];
    $data = $this->where($selectData)->delete();
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => '操作成功'];
    }else {
      return ['code' => 404, 'msg' => 'fail', 'data' => '操作失败'];
    }
  }
  public function findPrice($storeManagerName){
    $findData = [
      'user_name'=>$storeManagerName
    ];
    $data = $this->where($findData)->field('manage_price')->find();
    return $data['manage_price'];
  }
}