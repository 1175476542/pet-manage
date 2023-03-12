<?php

namespace app\api\controller;

use app\api\model\Users;
use think\Controller;
use think\Request;
// class News 
// {
//     public function index(){
//         echo 'sadsad';
//     }
// }


class Register extends Controller
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
        $request = Request::instance();
        $userId =$this->randString();
        $userName = $request->post('userName');
        $password = $request->post('password');
        $identity = $request->post('identity');
        $phoneNum = $request->post('phoneNum');
        // $userName = $request->post('userName');
        // $password = $request->post('password');
        // $identity = $request->post('identity');
        // $phoneNum = $request->post('phoneNum');
        $userModel = new Users();
        $res = $userModel->register($userId,$userName,$password,$identity,$phoneNum);
        
        //
        // $res = ['code'=>200,'msg'=>'success','data'=>'index'];
        return json($res);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
        $res = ['code'=>200,'msg'=>'success','data'=>'create'];
        return json($res);
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
        $res = ['code'=>200,'msg'=>'success','data'=>'save'];
        return json($res);
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
        $res = ['code'=>200,'msg'=>'success','data'=>'read'];
        return json($res);
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
        $res = ['code'=>200,'msg'=>'success','data'=>'edit'];
        return json($res);
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
        $res = ['code'=>200,'msg'=>'success','data'=>'update'];
        return json($res);
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
        $res = ['code'=>200,'msg'=>'success','data'=>'delete'];
        return json($res);
    }
}
