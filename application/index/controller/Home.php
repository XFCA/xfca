<?php
namespace app\index\controller;
use think\Controller;
use app\index\model;
use think\Request;
use think\Session;

class Home extends Controller
{
  public function index()
  {//dump('wangjinhao de web');
    if($user=Session::get('name'))
    {
      $this->assign('name',$user);
    }
    return $this->fetch('home');
  }
}
