<?php
namespace app\index\controller;
use think\Controller;
use think\Session;


class Login extends Controller
{
    public function login()
    {
        if(request() -> isPost())
        {
            $data = input('post.');
            if(empty($data['us_name'])){

                $this->error('用户名不能为空');
            }

            if(empty($data['us_psw'])){

                $this->error('密码不能为空');
            }

            // 验证用户名
            $res = db('user')->where('us_name', $data['us_name'])->find();
            if($res['us_name'] != ($data['us_name'])){

                $this->error('用户不存在');
            }

            // 验证密码
            if($res['us_psw'] != ($data['us_psw'])){

                $this->error('密码错误');
            }

            Session::set('us_id', $res['id']);
            Session::set('us_name', $res['us_name']);

//            cookie('user_id', $res['id'], 3600);  // 一个小时有效期
//            cookie('user_name', $res['user_name'], 3600);
            // 记录用户登录信息
            $this->success('登陆成功','Songlist/song');
        }
        return view();

    }


}
