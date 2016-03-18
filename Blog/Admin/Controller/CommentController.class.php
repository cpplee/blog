<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/15
 * Time: 15:46
 */
class CommentController extends CommonController
{

    public function index(){



      $db = M('comment');

        $total = $db->count();

        $page = new page($total,1,4,2);




           $comment = $db->limit($page->limit())->all();

        $this->assign('comment',$comment);


        //p($comment);




        $this->assign('page',$page->show());

        $this->display();


    }



     public function del(){

            $coid = $_GET['coid'];

         M('comment')->where(array('coid'=>$coid))->delete();

         $this->success('É¾³ý³É¹¦');






     }










}