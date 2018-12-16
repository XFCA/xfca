<?php
namespace app\index\validate;
use think\Validate;

class User extends Validate
{
  protected $rule=[
    'name'=>'require',
    'email'=>'require|email',
    'passwd'=>'require',
  ];
  protected $message=[
    'name.require'=>'用户名必需！',
    'email.require'=>'邮箱必需！',
    'email.email'=>'邮箱格式错误！',
  ];
  protected $scene=[
    'login_1'=>['name','passwd'],
    'login_2'=>['email','passwd'],
    'reg'=>['name','email','passwd'],
  ];
}
