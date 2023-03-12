<?php
namespace app\api\model;

use think\Model;

class Orders extends Model{
  public function addGoods($goodsId,$goodsName,$goodsPrice,$goodsType,$goodsDetail,$src,$storeManagerName){
    $insertData = [
      'goods_id'=>$goodsId,
      'goods_name'=>$goodsName,
      'goods_price'=>$goodsPrice,
      'goods_type'=>$goodsType,
      'goods_img'=>$src,
      'goods_detail'=>$goodsDetail,
      'store_manager_name'=>$storeManagerName,
    ];
    $data = $this->insert($insertData);
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => '添加成功'];
    }else {
    return ['code' => 404, 'msg' => 'fail', 'data' => '服务器繁忙，添加失败'];
    }
  }
   public function buyNow($orderId,$goodsId,$goodsName,$goodsPrice,$userName,$storeManagerName,$address,$phoneNum){
    $insertData = [
      'order_id'=>$orderId,
      'order_price'=>$goodsPrice,
      'order_detail'=>$goodsId,
      'order_goods_name'=>$goodsName,
      'user_name'=>$userName,
      'store_manager_name'=>$storeManagerName,
      'address'=>$address,
      'status'=>1,
      'phone'=>$phoneNum
    ];
    $data = $this->insert($insertData);
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => '购买成功'];
    }else {
    return ['code' => 404, 'msg' => 'fail', 'data' => '服务器繁忙，购买失败'];
    }
  }

 public function getUserOrder($userName){
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
   public function changeOrderstatus($orderId){
    $selectData = [
      'order_id'=>$orderId,
    ];
    $updateData = [
      'status'=>3,
    ];
    $data = $this->where($selectData)->update($updateData);
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => '操作成功'];
    }else {
    return ['code' => 404, 'msg' => 'fail', 'data' => '服务器繁忙，请刷新重试'];
    }
  }
    public function changeAddress($orderId,$address,$phoneNum){
    $selectData = [
      'order_id'=>$orderId,
    ];
    $updateData = [
      'address'=>$address,
      'phone'=>$phoneNum
    ];
    $data1 = $this->where($selectData)->find();
    $data = $this->where($selectData)->update($updateData);
    if ($data1['address']!=$address||$data1['phone']!=$phoneNum) {
      if ($data) {
        return ['code' => 200, 'msg' => 'success', 'data' => '操作成功'];
      }else {
      return ['code' => 404, 'msg' => 'fail', 'data' => '服务器繁忙请稍后重试'];
      }
    }else {
      return ['code' => 404, 'msg' => 'fail', 'data' => '未修改'];
    }
    
  }
public function getStoreOrder($storeName){
    $selectData = [
      'store_manager_name'=>$storeName,
    ];
    $data = $this->where($selectData)->select();
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => $data];
    }else {
    return ['code' => 404, 'msg' => 'fail', 'data' => '服务器繁忙，请刷新重试'];
    }
  }
public function changeStoreOrderStatus($orderId){
    $selectData = [
      'order_id'=>$orderId,
    ];
    $updateData = [
      'status'=>2,
    ];
    $data = $this->where($selectData)->update($updateData);
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => '操作成功'];
    }else {
    return ['code' => 404, 'msg' => 'fail', 'data' => '服务器繁忙，请刷新重试'];
    }
  }
  public function cancelOrder($orderId){
    $selectData = [
      'order_id'=>$orderId,
    ];
    $data = $this->where($selectData)->delete();
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => '操作成功'];
    }else {
    return ['code' => 404, 'msg' => 'fail', 'data' => '服务器繁忙，请刷新重试'];
    }
  }
public function getAllOrder(){
    $data = $this->select();
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => $data];
    }else {
    return ['code' => 404, 'msg' => 'fail', 'data' => '服务器繁忙，请刷新重试'];
    }
  }
  
}