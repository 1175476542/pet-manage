<?php

namespace app\api\controller;

use app\api\model\Goods;
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




class Goodsc extends Controller
{
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
        $param = Request::instance()->param();
        $goodsId =$this->randString();
        // $goodsImg = $request->file('goodsImg');
        $storeManagerName = $param['storeManagerName'];
        $goodsName = $param['goodsName'];
        $pngName = $param['pngName'];
        $src = 'static/image/goods/'.$pngName;
        var_dump($goodsName);
        $goodsPrice = $param['goodsPrice'];
        $goodsType = $param['goodsType'];
        // return $goodsType;
        $goodsDetail = $param['goodsDetail'];
        $storeManagerName = $param['storeManagerName'];
        // return json($userId);
        $userModel = new Goods();
        $res = $userModel->addGoods($goodsId,$goodsName,$goodsPrice,$goodsType,$goodsDetail,$src,$storeManagerName);
       
        
        //
        // $res = ['code'=>200,'msg'=>'success','data'=>'index'];
        return json($res);
    }
    

    public function saveImg(){
        // $request = Request::instance();
        $file = request()->file('goodsFace');
        if ($file) {
            $info = $file->move('static/image/goods','');
            if ($info) {
                $name = $info->getFilename();
            }
        }
        
    }

    public function getGoodsList()
    {
        $params = Request::instance()->param();
        $storeManagerName = $params['storeManagerName'];
        $storeModel = new Goods();
        $res = $storeModel->displayGoods($storeManagerName);
        return json($res);
    }
    //食物列表
    public function getFoodsList(){
        $goodsModel = new Goods();
        $res = $goodsModel->getFoodsList();
        return json($res);

    }
    public function getClothesList(){
        $goodsModel = new Goods();
        $res = $goodsModel->getClothesList();
        return json($res);

    }
    public function getProductsList(){
        $goodsModel = new Goods();
        $res = $goodsModel->getProductsList();
        return json($res);

    }
    public function getFoodsDetail(){
        $params = Request::instance()->param();
        $userName = $params['userName'];
        $goodsId = $params['goodsId'];
        $goodsModel = new Goods();
        $res = $goodsModel->getFoodsDetail($userName,$goodsId);
        return json($res);

    }
    public function getGoods(){
        $params = Request::instance()->param();
        $goodsId = $params['goodsId'];
        $goodsModel = new Goods();
        $res = $goodsModel->getGoods($goodsId);
        return json($res);

    }
    public function down(){
        $params = Request::instance()->param();
        // $onSale = $params['onSale'];
        $goodsId = $params['goodsId'];
        $goodsModel = new Goods();
        $res = $goodsModel->down($goodsId);
        return json($res);
    }
    public function up(){
        $params = Request::instance()->param();
        $goodsId = $params['goodsId'];
        // $onSale = $params['onSale'];
        $goodsModel = new Goods();
        $res = $goodsModel->up($goodsId);
        return json($res);
    }
    public function getDetail(){
        $params = Request::instance()->param();
        $goodsId = $params['goodsId'];
        // $onSale = $params['onSale'];
        $goodsModel = new Goods();
        $res = $goodsModel->getDetail($goodsId);
        return json($res);
    }
    public function delGoods(){
        $params = Request::instance()->param();
        $goodsId = $params['goodsId'];
        // $onSale = $params['onSale'];
        $goodsModel = new Goods();
        $res = $goodsModel->delGoods($goodsId);
        return json($res);
    }
}
