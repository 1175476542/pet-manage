<?php
namespace app\index\controller;

class Index
{
    public function index()
    {
        $data = ['name'=>'thinkphp','url'=>'thinkphp.cn','method'=>'GET']; 
        return ['data'=>$data,'code'=>1,'message'=>'操作完成'];    
    }
}
