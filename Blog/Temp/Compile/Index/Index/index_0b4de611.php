<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>BLOG</title>
	<meta name="keywords" content="BLOG" />
	<meta name="description" content="BLOG" />
	<script type="text/javascript" src="http://localhost:88/blog/Blog/Index/View/Public/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="http://localhost:88/blog/Blog/Index/View/Public/js/index.js"></script>
	<link rel="stylesheet" href="http://localhost:88/blog/Blog/Index/View/Public/css/index.css" />
</head>
<body>
	<!-- 头部 -->
	<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<div id="wrapper"></div>
<div id="top">
    <!-- 头部左侧 -->
    <div id="top_left">
        <p id="logo1"></p>
        <span>BLOG！</span>
    </div>
    <!-- 头部右侧(导航条) -->
    <div id="top_right">
        <ul>
            <li><a href="http://localhost:88/blog">主页</a></li>
            <li><a href="">博文</a></li>
            <li><a href="">了解博主</a></li>
        </ul>
        <p id="bar"></p>
    </div>
</div>
	<!-- 头部结束 -->
	<!-- 发布内容区域 -->
	<div id="arc">
		<!-- 左侧区域 -->
		<div class="arc_left_box">
			<p class="arc_show">BLOG</p>
				<!-- 轮播区域 -->
			<div id="foucs_photo">
				<div class="foucs_photo_l">
					<img src="http://localhost:88/blog/Blog/Index/View/Public/images/.jpg" alt="" />
					<img src="http://localhost:88/blog/Blog/Index/View/Public/images/.jpg" alt="" />
					<img src="http://localhost:88/blog/Blog/Index/View/Public/images/.jpg" alt="" />
					<img src="http://localhost:88/blog/Blog/Index/View/Public/images/.gif" alt="" />
				</div>
		
			</div>
			<!-- 轮播区域结束 -->
			<p class="arc_show">博文</p>
			        <?php
        //初始化
        $hd['list']['d'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($article)) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($article as $d) {
                //开始值
                if ($listId<0) {
                    $listId++;
                    continue;
                }
                //步长
                if($listId!=$listNextId){$listId++;continue;}
                //显示条数
                if($listShowNum>=100)break;
                //第几个值
                $hd['list'][d]['index']++;
                //第1个值
                $hd['list'][d]['first']=($listId == 0);
                //最后一个值
                $hd['list'][d]['last']= (count($article)-1 <= $listId);
                //总数
                $hd['list'][d]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
			<div class="arc_left">
				<div class="arc_left_date">
					<p></p>
					<dl>
						<dd><?php echo date('y',$d['time']);?></dd>
						<dt><?php echo date('m-d',$d['time']);?></dt>
					</dl>
				</div>
				<div class="arc_left_content">
					<a href="<?php echo U('Index/article',array('aid'=>$d['aid']));?>" class="arc_tittle"><?php echo $d['title'];?></a>
					<a href="<?php echo U('Index/article',array('aid'=>$d['aid']));?>"><img src="<?php echo $d['thumb'];?>" alt="缩略图" /></a>
					<div class="arc_des"><?php echo $d['intro'];?></div>
					<a href="<?php echo U('Index/article',array('aid'=>$d['aid']));?>" class="arc_more">阅读全文>></a>
				</div>
			</div>
			<?php }}?>


			<div class="page">
				<?php echo $page;?>
			</div>
		</div>
		<!-- 左侧区域结束 -->
		<!-- 右侧区域 -->
		<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<div class="arc_right_box">
    <!-- 关于后盾网 -->
    <div class="right_little_box">
        <p class="right_tittle">关于BLOG</p>
        <a href=""><img src="http://localhost:88/blog/Blog/Index/View/Public/images/1.jpg" alt="" id="logo_img"/></a>
        <ul class="right_des">
            <li>BLOG</li>
        </ul>
    </div>
    <!-- 关于后盾网 -->





    <!-- 栏目列表 -->
    <div class="right_little_box">
        <p class="right_tittle">栏目列表</p>

        <ul class="right_category">
                    <?php
        //初始化
        $hd['list']['d'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($category)) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($category as $d) {
                //开始值
                if ($listId<0) {
                    $listId++;
                    continue;
                }
                //步长
                if($listId!=$listNextId){$listId++;continue;}
                //显示条数
                if($listShowNum>=100)break;
                //第几个值
                $hd['list'][d]['index']++;
                //第1个值
                $hd['list'][d]['first']=($listId == 0);
                //最后一个值
                $hd['list'][d]['last']= (count($category)-1 <= $listId);
                //总数
                $hd['list'][d]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
            <li><a href=""><?php echo $d['cname'];?></a></li>
            <?php }}?>
        </ul>
    </div>
    <!-- 栏目列表结束 -->
    <!-- 最新文章 -->
    <div class="right_arc_little_box">
        <p class="right_tittle">最新文章</p>
        <div class="hot_arc">
            <div class="arc_js_move">
                <div class="right_roll">
                    <ul class="right_des">

                                <?php
        //初始化
        $hd['list']['d'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($newArticle)) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($newArticle as $d) {
                //开始值
                if ($listId<0) {
                    $listId++;
                    continue;
                }
                //步长
                if($listId!=$listNextId){$listId++;continue;}
                //显示条数
                if($listShowNum>=100)break;
                //第几个值
                $hd['list'][d]['index']++;
                //第1个值
                $hd['list'][d]['first']=($listId == 0);
                //最后一个值
                $hd['list'][d]['last']= (count($newArticle)-1 <= $listId);
                //总数
                $hd['list'][d]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>

                        <li><a href=""><?php echo $d['title'];?></a></li>

                        <?php }}?>


                    </ul>
                </div>


            </div>
        </div>
    </div>
    <!-- 最新文章结束 -->
    <!-- 最新回复 -->
    <div class="right_little_box">
        <p class="right_tittle">最新回复</p>
        <ul class="right_answer">
                    <?php
        //初始化
        $hd['list']['d'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($newComment)) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($newComment as $d) {
                //开始值
                if ($listId<0) {
                    $listId++;
                    continue;
                }
                //步长
                if($listId!=$listNextId){$listId++;continue;}
                //显示条数
                if($listShowNum>=100)break;
                //第几个值
                $hd['list'][d]['index']++;
                //第1个值
                $hd['list'][d]['first']=($listId == 0);
                //最后一个值
                $hd['list'][d]['last']= (count($newComment)-1 <= $listId);
                //总数
                $hd['list'][d]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
            <li><a href=""><?php echo $d['content'];?></a></li>
            <?php }}?>

        </ul>
    </div>
    <!-- 最新回复结束 -->
    <!-- 结果统计 -->
    <div class="right_little_box">
        <p class="right_tittle">站点统计</p>
        <ul class="right_des count_bg">
            <li>文章总数：<span><?php echo $total['article'];?>篇</span></li>
            <li>回复总数：<span><?php echo $total['comment'];?>条</span></li>
            <li>浏览总数：<span><?php echo $total['click'];?>次</span></li>
        </ul>
    </div>
    <!-- 结果统计结束 -->
</div>
		<!-- 右侧区域结束 -->
	</div>
	<!-- 发布内容区域结束 -->
	<!-- 底部foot区域 -->
	<div id="foot_box">
		<div id="foot">
			<p id="foot_l">Copyright © 2013-2013 xiaofan. All rights reserved.</p>
			<p id="foot_r">
			
			</p>
		</div>
	</div>

	</div>
	<!--[if IE 6]>
    <script type="text/javascript" src="./js/iepng.js"></script>
    <script type="text/javascript">
        DD_belatedPNG.fix('#arc .arc_left .arc_left_date p,#arc .arc_left_box #foucs_photo .foucs_photo_l img','background');
    </script>
	<![endif]-->
</body>
</html>
	<!-- 底部foot区域结束 -->
