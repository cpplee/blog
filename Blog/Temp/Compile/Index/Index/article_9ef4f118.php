<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<div class="arc_right_box">
    <!-- 关于后盾网 -->
    <div class="right_little_box">
        <p class="right_tittle">关于后盾网</p>
        <a href=""><img src="http://localhost:88/blog/Blog/Index/View/Public/images/houdunwang.jpg" alt="" id="logo_img"/></a>
        <ul class="right_des">
            <li>北京后盾计算机技术培训有限责任公司是专注于培养中国互联网优秀的程序语言专业人才的专业型培训机构。</li>
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