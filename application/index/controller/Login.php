<?php
namespace app\index\controller;
use think\Controller;
use app\index\model;
use think\Request;
use think\Session;
use app\index\validate;

class Login extends Controller
{
  public function login()
  {
    return $this->fetch('login');
  }

  public function login_jump(Request $request)
  {dump($request->param());
    $validate= new validate\User();
    $result=$validate->scene('login_1')->check($request->param());
    if(! $result)
    {
      $this->error($validate->getError());
    }
    elseif(! $user=model\User::get(['Name'=>$request->param('name'),]))
    {
      $this->error('用户不存在！');
    }
    elseif($request->param('passwd') != $user->Passwd)
    {
      $this->error('密码错误！');
    }
    else
    {
    Session::set('name',$request->param('name'));
    $this->redirect('/xfca');
    }
  }

  public function reg()
  {
    return $this->fetch('reg');
  }

  public function reg_jump(Request $request)
  {
    if(model\User::get($request->param('email')))
    {
      $this->error('该邮箱已注册！');
    }
    elseif(model\User::get(['Name'=>$request->param('name'),]))
    {
      $this->error('该用户名已注册！');
    }
    else
    {
      $user = new model\User([
        'Name'=>$request->param('name'),
        'Email'=>$request->param('email'),
        'Passwd'=>$request->param('passwd')
      ]);
      $user->save();
      $shell=EXTEND_PATH.'shell/creat_user.sh '.ROOT_PATH.' '.$request->param('name');
      //dump($shell);
      exec($shell);
      $this->success('注册成功！','/xfca/login');
    }
  }

  public function logout()
  {
    Session::delete('name');
    $this->redirect('/xfca');
  }
}
