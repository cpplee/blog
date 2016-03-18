<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/15
 * Time: 20:05
 */
class ArticleModel extends ViewModel
{



    public  $tables='article';


     public $view = array(

         'article'=>array(
           '_type'=>'inner',
         ),
         'category'=>array(
             '_type'=>'inner',
             '_on' =>'article.cid=category.cid'
         )


     );





}