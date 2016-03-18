<?php
//测试控制器类
class IndexController extends Controller{










    public function index(){
        //显示视图




        $where = "isdel=0 && category.isoff=0";

        $db = K('Article');

        $total = $db->where($where)->count();

        $page = new page($total,5,4,2);


        $this->assign('page',$page->show());

        $article = $db->where($where)->order('istop DESC,time DESC')->limit($page->limit())->all();

       // p($article);
        $this->assign('article',$article);

        $this->right();
        $this->display();


    }


    public function right(){

        //栏目列表
        $category = M('category')->where(array('isoff'=>0))->all();

        $this->assign('category',$category);

        //最新文章

        $where = "isdel=0 && category.isoff=0";
       $articleDb= K('Article');
        $newArticle = $articleDb->where($where)->order('time DESC')->limit(6)->all();

        $this->assign('newArticle',$newArticle);

        $commentDb=K('Comment');
        $newComment = $commentDb->where($where)->field('comment.content')->order('comment.time DESC')->limit(6)->all();
        $this->assign('newComment',$newComment);

        $total = array();

        $total['article']= $articleDb->where($where)->count();
        $total['comment']=$commentDb->where($where)->count();
        $total['click'] = $articleDb->where($where)->sum('click');

        $this->assign('total',$total);



    }


    public function article(){



        $aid = $_GET['aid'];

        $where = array('aid'=>$aid);
        $article = K('Article')->where($where)->find();


        M('article')->inc('click',"aid=$aid",1);

        $this->assign('article',$article);

      //  p($article);
      $db =  M('comment');
        $page = new page($db->where($where)->count(),1,5,2);
        $this->assign('page',$page->show());

        $limit = $page->limit();
        $limitF = substr($limit,0,1);
        $this->assign('limitF',$limitF);

        $comment = $db->where($where)->limit($limit)->select();
     $this->assign('comment',$comment);


       //p($comment);

        $this->right();

        $this->display();
    }


    public function code(){

        $code = new code();
        $code->show();

    }

    public function comment(){



        $code = strtoupper(Q('code'));
     if($code != session('code')) $this->error('验证码不正确');
        $data = array(
            'nickname'=>Q('nickname'),
            'content'=>Q('content'),
            'time'=>time(),
            'aid'=>Q('aid'),


        );


     M('comment')->add($data);

        $this->success('回复成功');
    }

}
