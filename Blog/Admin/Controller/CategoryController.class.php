<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/11
 * Time: 15:36
 */
class CategoryController extends  CommonController
{



    public function add(){




         if(IS_POST){
             

          $data = array(
              'cname'=>$_POST['cname'],
              'isoff'=>$_POST['isoff'],
               'keywords'=>$_POST['keywords'],
              'description'=>$_POST['description']

          );

             M('category')->add($data);
             $this->success('添加栏目成功');
         }


        $this->display();

    }


    public function index(){


        $db = M('category');
        $count = $db->count();
        $page = new page($count,5,5,2);
        $cate =$db->limit($page->limit())->all();
       // p($cate);
        $this->assign('cate',$cate);

        $this->assign('page',$page->show());
        $this->display();
    }


    public function isoff(){
      $cid = $_GET['cid'];

        $w = $_GET['w'];
        if($w==1){

            M('category')->where(array('cid'=>$cid))->save(array('isoff'=>1));
            $this->success('关闭成功');
        }else{

            M('category')->where(array('cid'=>$cid))->save(array('isoff'=>0));
            $this->success('开启成功');

        }



    }


    public function edit(){


        if(IS_POST){

            $data = array(
                'cname'=>$_POST['cname'],
                'isoff'=>$_POST['isoff'],
                'keywords'=>$_POST['keywords'],
                'description'=>$_POST['description']

            );



            $cid = $_POST['cid'];
            p($cid);
            M('category')->where(array('cid'=>$cid))->save($data);
            $this->success('修改成功');


        }




        $cid = $_GET['cid'];
        $category = M('category')->where(array('cid'=>$cid))->find();
       // p($category);
        $this->assign('category',$category);
        $this->display();



    }


//删除 栏目后，删除文章下面的评论出代码或许会出现问题，in()可能错误 如果出现错误用最原始的sql查询XX in (xx,xx,xx)形式
    public function del(){

        $cid = $_GET['cid'];
       // M('category')->where(array('cid'=>$cid))->delete();

        $aid = M('article')->where(array('cid'=>$cid))->getField('aid');

        if($aid){

            $arr = array();
            foreach($aid as $v){
                $arr[]=$v['aid'];

            }


            M('comment')->in(array('aid'=>$arr))->delete();
            M('article')->where(array('cid'=>$cid))->delete();

        }


    }

}