<?php

namespace app\api\controller;

use app\api\model\Goods;
use app\api\model\Stores;
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

// $GLOBALS


class Store extends Controller
{
    public $img1 = '';
  //随机生成id
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
        $storeModel = new Stores();
        $res = $storeModel->displayStore();
        return json($res);
    }
    public function search()
    {
        $params = Request::instance()->param();
        $storeName = $params['searchInput'];//接收用户在前端输入的参数
        $storeModel = new Stores();//实例化Model
        $res = $storeModel->search($storeName);//调用该Model的方法并传参
        return json($res);//接收Model返回的数据
    }
    public function addStore()
    {
        // $request = Request::instance();
        // $file = $request->file('storeFace');
        // if ($file) {
        //     $info = $file->move('static\image\store','');
        //     $fileName = $info->getFilename();
            
        // }



        $params = Request::instance()->param();

        $storeId = $this->randString();
        $img = $params['pngName'];
        // return $img;
        
        $pngName = 'static\image\store\\'.$img;
        // $this->name = $params['pngName'];
        $storeName = $params['storeName'];
        $dayCharge = $params['dayCharge'];
        $userName = $params['userName'];
        $storeDetails = $params['storeDetails'];
        
        $storeModel = new Stores();
        $res = $storeModel->addStore($storeId,$storeName,$storeDetails,$userName,$pngName,$dayCharge);
        $userModel = new Users();
        $data = $userModel->setIsFirst($userName);
        
        //
        // $res = ['code'=>200,'msg'=>'success','data'=>'index'];
        return json($res);
    }
   
    public function saveImg(){
        $request = Request::instance();
        $file = request()->file('storeFace');
        if ($file) {
            $info = $file->move('static/image/store','');
            if ($info) {
                $name = $info->getFilename();
            }
        }
        
    }

    public function checkUserName(){
        $params = Request::instance()->param();
        $userName = $params['userName'];
        // $pngName = $params['pngName'];
        $pngName = $this->img1;
        return $pngName;
        $storeModel = new Stores();
        $src = 'static/image/store/'.$pngName;
        var_dump($src);
        var_dump($userName);
        $res = $storeModel->updateImg($userName,$src);
        return json($res);

    }
    public function checkStatus(){
        $request = Request::instance();
        $userName = $request->post('userName');
        $storeModel = new Stores();
        $res = $storeModel->checkStatus($userName);
        return json($res);
    }
    public function getStoresDetail(){
        $params = Request::instance()->param();
        $storeManagerName = $params['storeManagerName'];
        $storeModel = new Stores();
        $res = $storeModel->getStoresDetail($storeManagerName);
        return json($res);
    }
    public function storeCheck(){
        $storeModel = new Stores();
        $res = $storeModel->storeCheck();
        return json($res);
    }
    public function agreeStore(){
        $params = Request::instance()->param();
        $userName = $params['userName'];
        $userModel = new Stores();
        $res = $userModel->agreeStore($userName);
        return json($res);
      }
      public function refuseStore(){
        $params = Request::instance()->param();
        $userName = $params['userName'];
        $userModel = new Stores();
        $res = $userModel->refuseStore($userName);
        $usersModel = new Users();
        $changeIsFirst = $usersModel->changeIsFirst($userName);
        return json($res);
      }
}
