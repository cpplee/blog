<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/12
 * Time: 13:37
 */
class ArticleModel extends ViewModel
{


          public $table = 'article';

    public $view = array(
           'article'=> array(
             '_type'=>'inner',

           ),

        'category'=>array(

            '_type'=>'inner',
            '_on'=>'article.cid=category.cid'

        )

    );

}