<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/12/11
 * Time: 14:10
 */
class CommonController extends Controller
{


      public function __init(){

          if(!isset($_SESSION['adid'])||!isset($_SESSION['username']))
              go('Login/index');

      }

}