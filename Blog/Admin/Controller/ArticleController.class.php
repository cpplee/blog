<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/11
 * Time: 19:39
 */
class ArticleController extends CommonController
{


    public function add(){


        if(IS_POST){

           $upload = new upload();
            $info = $upload->upload();
            if($info){

                $thumb = __ROOT__.'/'.$info[0]['path'];


            }
          $intro = mb_substr(strip_tags($_POST['content']),0,100,'UTF-8').'....';

//           p($info);
//            p($thumb);


             $data = array(
                 'title'=>$_POST['title'],
                 'thumb' =>isset($thumb)?$thumb:'',
                 'cid' =>$_POST['cid'],
                 'content'=>$_POST['content'],
                 'intro'=>$intro,
                 'click'=>$_POST['click'],
                 'time'=>time(),


             );
            M('article')->add($data);
            $this->success('发表成功');

        }

        $category = M('category')->field('cid,cname')->select();


        $this->assign('category',$category);


        $this->display();


    }



      public function article(){



          $where = array('isdel'=>0);













          $total = M('article')->where($where)->count();
          $page = new page($total,5,5,2);


          $this->assign('page',$page->show());


          if(isset($_GET['cid'])){
              $cid = $_GET['cid'];
              $where['article.cid']=$cid;
           //   p($where);

          }
          $article = K('Article')->where($where)->order('istop DESC,aid ASC')->limit($page->limit())->all();

        //  p($article);
          $this->assign('article',$article);
          $this->display();

      }



     public function top(){


         $w = $_GET['w'];
         if($w ==1){

             $aid = $_GET['aid'];
             M('article')->where(array('aid'=>$aid))->save(array('istop'=>1));
             $this->success('置顶成功');


         }else{


             $aid = $_GET['aid'];
             M('article')->where(array('aid'=>$aid))->save(array('istop'=>0));
             $this->success('取消置顶成功');



         }




     }




    public function edit(){

if(IS_POST){
    $upload = new upload();
    $info = $upload->upload();
    if($info){

        $thumb = __ROOT__.'/'.$info[0]['path'];


    }
    $intro = mb_substr(strip_tags($_POST['content']),0,100,'UTF-8').'....';

//           p($info);
//            p($thumb);


    $data = array(
        'title'=>$_POST['title'],
        'thumb' =>isset($thumb)?$thumb:'',
        'cid' =>$_POST['cid'],
        'content'=>$_POST['content'],
        'intro'=>$intro,
        'click'=>$_POST['click'],
        'time'=>time(),


    );

    $aid = $_POST['aid'];
    M('article')->where(array('aid'=>$aid))->save($data);
    $this->success('修改成功');



}




        $category = M('category')->select();

        $this->assign('category',$category);

        $aid = $_GET['aid'];
        $article = M('article')->where(array('aid'=>$aid))->find();
        $this->assign('article',$article);
        $this->display();


    }

    //修改到回收站
    public function del(){

        $aid = $_GET['aid'];

        M('article')->where(array('aid'=>$aid))->save(array('isdel'=>1));

        $this->success('删除成功');


    }


    public function recycle(){

         $where = array('isdel'=>1);


        if(isset($_GET['cid'])){
            $cid = $_GET['cid'];
            $where['article.cid']=$cid;
            //   p($where);

        }
        $total = M('article')->where($where)->count();


        $page = new page($total,1,5,2);


        $article = K('article')->where($where)->order('aid ASC')->limit($page->limit())->select();



        $this->assign('article',$article);

      //  p($article);
        $this->assign('page',$page->show());


              $this->display();

    }


    public function recover(){

    $aid = $_GET['aid'];
        M('article')->where(array('aid'=>$aid))->save(array('isdel'=>0));
        $this->success('恢复成功');


    }



    public function true_del(){

        $aid = $_GET['aid'];

        M('article')->where(array('aid'=>$aid))->delete();

        M('comment')->where(array('aid'=>$aid))->delete();


        $this->success('删除成功');
    }


}