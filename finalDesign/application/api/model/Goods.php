<?php
namespace app\api\model;

use think\Model;

class Goods extends Model{
  public function addGoods($goodsId,$goodsName,$goodsPrice,$goodsType,$goodsDetail,$src,$storeManagerName){
    $insertData = [
      'goods_id'=>$goodsId,
      'goods_name'=>$goodsName,
      'goods_price'=>$goodsPrice,
      'goods_type'=>$goodsType[0],
      'goods_img'=>$src,
      'goods_detail'=>$goodsDetail,
      'store_manager_name'=>$storeManagerName,
      'on_sale'=>0
    ];
    $data = $this->insert($insertData);
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => '添加成功'];
    }else {
    return ['code' => 404, 'msg' => 'fail', 'data' => '服务器繁忙，添加失败'];
    }
  }


  public function displayGoods($storeManagerName){
    $selectData = [
      'store_manager_name'=>$storeManagerName
    ];
    $data = $this->where($selectData)->select();
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => $data];
    }else {
      return ['code' => 404, 'msg' => 'fail', 'data' => '查询为空'];
    }
  }
  public function getFoodsList(){
    $selectData = [
      'goods_type'=>'食物',
      'on_sale'=>1
    ];
    $data = $this->where($selectData)->select();
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => $data];
    }
    else {
        return ['code' => 404, 'msg' => 'fail', 'data' => '查询为空'];
    }
  }
  public function getClothesList(){
    $selectData = [
      'goods_type'=>'衣物',
      'on_sale'=>1
    ];
    $data = $this->where($selectData)->select();
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => $data];
    }
    else {
        return ['code' => 404, 'msg' => 'fail', 'data' => '查询为空'];
    }
  }
  public function getProductsList(){
    $selectData = [
      'goods_type'=>'洗护用品',
      'on_sale'=>1
    ];
    $data = $this->where($selectData)->select();
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => $data];
    }
    else {
        return ['code' => 404, 'msg' => 'fail', 'data' => '查询为空'];
    }
  }
  public function getFoodsDetail($userName,$goodsId){
    $selectData = [
      'goods_id'=>$goodsId
    ];
    $data = $this->where($selectData)->find();
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => $data];
    }
    else {
        return ['code' => 404, 'msg' => 'fail', 'data' => '查询为空'];
    }
  }
  public function getDetail($goodsId){
    $selectData = [
      'goods_id'=>$goodsId
    ];
    $data = $this->where($selectData)->find();
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => $data];
    }
    else {
        return ['code' => 404, 'msg' => 'fail', 'data' => '查询为空'];
    }
  }
  public function delGoods($goodsId){
    $selectData = [
      'goods_id'=>$goodsId
    ];
    $data = $this->where($selectData)->delete();
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => '删除成功'];
    }
    else {
        return ['code' => 404, 'msg' => 'fail', 'data' => '删除失败'];
    }
  }
  public function getGoods($goodsId){
    $selectData = [
      'goods_id'=>$goodsId
    ];
    $data = $this->where($selectData)->find();
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => $data];
    }
    else {
        return ['code' => 404, 'msg' => 'fail', 'data' => '查询为空'];
    }
  }
  public function down($goodsId){
    $updateData = [
      'on_sale'=>0
    ];
    $data = $this->where('goods_id',$goodsId)->update($updateData);
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => '操作成功'];
    }
    else {
        return ['code' => 404, 'msg' => 'fail', 'data' => '操作失败'];
    }
  }
  public function up($goodsId){
    $updateData = [
      'on_sale'=>1
    ];
    $data = $this->where('goods_id',$goodsId)->update($updateData);
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => '操作成功'];
    }
    else {
        return ['code' => 404, 'msg' => 'fail', 'data' => '操作失败'];
    }
  }
}