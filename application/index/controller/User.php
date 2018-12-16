<?php
namespace app\index\controller;
use app\index\model;
use think\Controller;
use think\Request;
use think\Session;

class User extends Controller
{
  public function user()
  {
    $name=Session::get('name');
    $user=model\User::get(['name'=>$name,]);
    $this->assign('name',$name);
    $this->assign('user',$user);
    return $this->fetch('user');
  }

  public function own(Request $request)
  {
    $this->assign('name',Session::get('name'));
    $ajax=$this->fetch('test');
    return json(['name'=>$ajax]);//json(['name'=>'<h1>2'.$request->param('name').'</h1>']);
  }
}
