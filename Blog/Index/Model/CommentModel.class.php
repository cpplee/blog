<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/15
 * Time: 22:05
 */
class CommentModel extends ViewModel
{

      public $tables = 'comment';
    public $view = array(
        'comment'=>array(

            '_type'=>'inner'
        ),
        'article'=>array(

            '_type'=>'inner',
              '_on' =>'comment.aid=article.aid'

        ),

        'category'=>array(
            '_type'=>'inner',
            '_on'=>'article.cid=category.cid'
        )
    );



}