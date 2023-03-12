<?php
namespace app\api\model;

use think\Model;

class Carts extends Model{
  public function addToCarts($goodsId,$userName){
    $insertData = [
      'cart_goods'=>$goodsId,
      'user_name'=>$userName,
    ];
   
    $isCreate = $this->where('user_name',$userName)->find();
    if ($isCreate) {
      $originData =$this->where('user_name',$userName)->field('cart_goods')->find();
      // var_dump(json_encode($originData['cart_goods']));
      $originData = json_encode($originData['cart_goods']);
      $originData = json_decode($originData);
      // var_dump($originData);
       $updateData = [
      'cart_goods'=>$originData.','.$goodsId,
    ];
      $data = $this->where('user_name',$userName)->update($updateData);
    }else {
      $data = $this->insert($insertData);
    }
    
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => '加入成功'];
    }else {
    return ['code' => 404, 'msg' => 'fail', 'data' => '服务器繁忙，加入失败'];
    }
  }

}