<?php
namespace app\index\controller;
use think\Controller;


class Register extends Controller
{
    public function Register()
    {
        if(request() -> isPost())
        {

            $data=input('post.');
            if(db('user')->insert($data))
            {
                $this->success('即将跳转到登录界面','Login/login');
            }else{
                $this->error('fail!');
            }
        }
        return view();
    }


}
