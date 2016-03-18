<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/10
 * Time: 20:44
 */
class LoginController extends Controller
{

    public function index(){

       // print_const();
        $this->display();


    }


    public function code(){



        $code = new code();
        $code->show();
    }



    public function login(){


        if(IS_POST){


          //  p($_POST);

            $code = strtoupper(Q('code'));
          //  p($code);
          //  p($_SESSION);
            if($code != session('code'))
                $this->error('验证码不正确!');


            $username = $_POST['username'];
            $passwd = md5($_POST['passwd']);

            $user = M('admin')->where(array('username'=>$username))->find();

            if(!$user ||$passwd != $user['passwd']) $this->error('用户名或者密码不正确');
     //  p($user);

            $_SESSION['adid']=$user['adid'];
            $_SESSION['username']=$username;
          //  p($_SESSION);
            $this->success('登录成功...正在为您跳转....',__MODULE__.'/');
        }

    }




    public function out(){

        session_unset();
        session_destroy();
        $this->success('退出成功');

    }



}