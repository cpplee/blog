<?php
//测试控制器类
class IndexController extends CommonController{





    //动作方法
    public function index(){



        //显示视图
        $this->display();
    }




    public function copy(){


        $this->display();
    }



    public function passwd(){

        if(IS_POST){


            $passwdF = $_POST['passwdF'];
            $passwdS = $_POST['passwdS'];

            if(strlen($passwdF)<6) $this->error('密码不得小于6位');
            if($passwdF != $passwdS) $this->error('两次密码不相同');



            M('admin')->where(array('adid'=>session('adid')))->save(array('passwd'=>md5($passwdF)));
           $this->success('修改成功');
        }

        $this->display();

    }



}
