<?php

namespace app\api\controller;

use app\api\model\Users;
use think\Controller;
use think\Request;
use think\Session;
// class News 
// {
//     public function index(){
//         echo 'sadsad';
//     }
// }
// $post = json_decode(file_get_contents("php://input"), true);
// // 验证用户名
// $username = $post['username'];
// $password = $post['password'];




class Index extends Controller
{
    
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function Login()
    {
        $request = Request::instance();
        $userName = $request->post('userName');
        $password = $request->post('password');
        // return json($userId);
        $userModel = new Users();
        $res = $userModel->index($userName,$password);
       
        session::set('userName',$res['session']);
        
        //
        // $res = ['code'=>200,'msg'=>'success','data'=>'index'];
        return json($res);
    }
    public function storeManagerCheck(){
        $userModel = new Users();
        $res = $userModel->storeManagerCheck();
        return json($res);
    }
    public function managerCheck(){
        $userModel = new Users();
        $res = $userModel->managerCheck();
        return json($res);
    }
    public function agreeStoreManager(){
        $params = Request::instance()->param();
        $userName = $params['userName'];
        $userModel = new Users();
        $res = $userModel->agreeStoreManager($userName);
        return json($res);
      }
      public function refuseStoreManager(){
        $params = Request::instance()->param();
        $userName = $params['userName'];
        $userModel = new Users();
        $res = $userModel->refuseStoreManager($userName);
        return json($res);
      }
      public function changePassword(){
        $params = Request::instance()->param();
        $userName = $params['userName'];
        $password = $params['password'];
        $newPassword = $params['newPassword'];
        $userModel = new Users();
        $res = $userModel->changePassword($userName,$password,$newPassword);
        return json($res);
      } 

      public function agreeManager(){
        $params = Request::instance()->param();
        $userName = $params['userName'];
        $userModel = new Users();
        $res = $userModel->agreeManager($userName);
        return json($res);
      }
      public function refuseManager(){
        $params = Request::instance()->param();
        $userName = $params['userName'];
        $userModel = new Users();
        $res = $userModel->refuseManager($userName);
        return json($res);
      }
}
