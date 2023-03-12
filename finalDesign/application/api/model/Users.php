<?php

namespace app\api\model;

use think\Model;
use think\Session;

class Users extends Model
{
  public function index($userName, $password)
  {
    $map = [
      'user_name' => $userName,
      'password' => $password
    ];
    // return $userId;
    $data = $this->where($map)->find();
    if ($data['status'] == '审核中') {
      $res = ['code' => 404, 'msg' => 'fail', 'data' => '账号审核中，请等待管理员审核','session'=>''];
      return $res;
    }else if ($data['status'] == '审核失败') {
      $res = ['code' => 404, 'msg' => 'fail', 'data' => '账号审核失败，请重新注册或申诉','session'=>''];
      return $res;
    } 
    else {
      session::set('userName', $data['user_name']);
      
      // return $data;
      if ($data) {
        $res = ['code' => 200, 'msg' => 'success', 'data' => $data, 'session' => session::get('userName')];
        return $res;
      } else {
        $res = ['code' => 404, 'msg' => 'fail', 'data' => '用户名或密码错误','session'=>''];
        return $res;
      }
    }
  }
  public function register($userId, $userName, $password, $identity, $phoneNum)
  {
    $insertData = [
      'user_id' => $userId,
      'user_name' => $userName,
      'password' => $password,
      'identity' => $identity,
      'phone_num' => $phoneNum,
      'status' => '审核成功',
      'is_first'=>1,
    ];
    $insertData2 = [
      'user_id' => $userId,
      'user_name' => $userName,
      'password' => $password,
      'identity' => $identity,
      'phone_num' => $phoneNum,
      'status' => '审核中',
      'is_first'=>1,
    ];
    $insertData3 = [
      'user_id' => $userId,
      'user_name' => $userName,
      'password' => $password,
      'identity' => $identity,
      'phone_num' => $phoneNum,
      'status' => '审核中',
      'is_first'=>1,
    ];
    $map = [
      'user_name' => $userName,
    ];
    $isSame = $this->where($map)->find();
    if ($isSame) {
      return ['code' => 404, 'msg' => 'fail', 'data' => '该用户名已被占用'];
    } else {
      if ($identity == '用户') {
        $data = $this->insert($insertData);
        if ($data) {
          return ['code' => 200, 'msg' => 'success', 'data' => '注册成功'];
        } else {
          return ['code' => 404, 'msg' => 'fail', 'data' => '服务器繁忙,注册失败'];
        }
      } else if ($identity == '店长'){
        $data = $this->insert($insertData2);
        if ($data) {
          return ['code' => 200, 'msg' => 'success', 'data' => '注册成功,等待审核'];
        } else {
          return ['code' => 404, 'msg' => 'fail', 'data' => '服务器繁忙,注册失败'];
        }
      }
      else if ($identity == '管理员'){
        $data = $this->insert($insertData3);
        if ($data) {
          return ['code' => 200, 'msg' => 'success', 'data' => '注册成功,等待审核'];
        } else {
          return ['code' => 404, 'msg' => 'fail', 'data' => '服务器繁忙,注册失败'];
        }
      }
    }
  }

  public function setIsFirst($userName){
    $map = [
      'user_name'=>$userName
    ];
    $updateData = [
      'is_first'=>0
    ];
    return $this->where($map)->update($updateData);
  }
  public function storeManagerCheck(){
    $selectData = [
      'identity'=>'店长',
      'status'=>'审核中'
    ];
    $data = $this->where($selectData)->select();
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => $data];
    }else {
      return ['code' => 404, 'msg' => 'fail', 'data' => '查询为空'];
    }
  }
  public function managerCheck(){
    $selectData = [
      'identity'=>'管理员',
      'status'=>'审核中'
    ];
    $data = $this->where($selectData)->select();
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => $data];
    }else {
      return ['code' => 404, 'msg' => 'fail', 'data' => '查询为空'];
    }
  }
  public function agreeStoreManager($userName){
    $updateData = [
      'status'=>'审核成功'
    ];
    $selectData = [
      'user_name'=>$userName
    ];
    $data = $this->where($selectData)->update($updateData);
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => '操作成功'];
    }else {
      return ['code' => 404, 'msg' => 'fail', 'data' => '操作失败'];
    }
  }
  public function refuseStoreManager($userName){
    $updateData = [
      'status'=>'审核失败'
    ];
    $selectData = [
      'user_name'=>$userName
    ];
    $data = $this->where($selectData)->update($updateData);
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => '操作成功'];
    }else {
      return ['code' => 404, 'msg' => 'fail', 'data' => '操作失败'];
    }
  }

  public function agreeManager($userName){
    $updateData = [
      'status'=>'审核成功'
    ];
    $selectData = [
      'user_name'=>$userName
    ];
    $data = $this->where($selectData)->update($updateData);
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => '操作成功'];
    }else {
      return ['code' => 404, 'msg' => 'fail', 'data' => '操作失败'];
    }
  }
  public function refuseManager($userName){
    $updateData = [
      'status'=>'审核失败'
    ];
    $selectData = [
      'user_name'=>$userName
    ];
    $data = $this->where($selectData)->update($updateData);
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => '操作成功'];
    }else {
      return ['code' => 404, 'msg' => 'fail', 'data' => '操作失败'];
    }
  }
  
    public function changePassword($userName,$password,$newPassword){
    $updateData = [
      'password'=>$newPassword
    ];
    $selectData = [
      'user_name'=>$userName
    ];
    $confirm = $this->where($selectData)->find();
    $originPassword = $confirm['password'];
    if ($password == $originPassword) {
      $data = $this->where($selectData)->update($updateData);
    }else{
      return ['code' => 404, 'msg' => 'fail', 'data' => '原密码错误'];
    }
    
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => '修改成功'];
    }else {
      return ['code' => 404, 'msg' => 'fail', 'data' => '修改失败'];
    }
  }
  public function changeIsFirst($userName){
    $updateData = [
      'is_first'=>1
    ];
    $selectData = [
      'user_name'=>$userName
    ];
    $data = $this->where($selectData)->update($updateData);
    if ($data) {
      return ['code' => 200, 'msg' => 'success', 'data' => '操作成功'];
    }else {
      return ['code' => 404, 'msg' => 'fail', 'data' => '操作失败'];
    }
  }
}
