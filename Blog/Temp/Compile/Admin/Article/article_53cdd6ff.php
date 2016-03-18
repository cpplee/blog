<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" href="http://localhost/blog/Blog/Admin/View/Public/css/public.css" />
	<script type="text/javascript" src="http://localhost/blog/Blog/Admin/View/Public/js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="http://localhost/blog/Blog/Admin/View/Public/js/public.js"></script>
</head>
<body>
	<table class="table">
		<tr>
			<td class="th" colspan="10">查看博文</td>
		</tr>
		<tr>
			<td class="tdLittle1">AID</td>
			<td>标题</td>
			<td class="tdLittle2">栏目名称</td>
			<td class="tdLtitle3">查看次数</td>
			<td class="tdLtitle4">创作时间</td>
			<td class="tdLtitle7">操作</td>
		</tr>


          <?php
        //初始化
        $hd['list']['n'] = array(
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
            foreach ($article as $n) {
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
                $hd['list'][n]['index']++;
                //第1个值
                $hd['list'][n]['first']=($listId == 0);
                //最后一个值
                $hd['list'][n]['last']= (count($article)-1 <= $listId);
                //总数
                $hd['list'][n]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
		<tr>

			    <?php if($n['istop']==1){ ?>
			<td ><?php echo $n['aid'];?><span style="color:red">[置顶]</span></td>
				<?php }else{ ?>
				<td ><?php echo $n['aid'];?></td>
              <?php } ?>


			<td><?php echo $n['title'];?></td>
			<td><a href="<?php echo U('Article/article',array('cid'=>$n['cid']));?>"><?php echo $n['cname'];?></a></td>
			<td><?php echo $n['click'];?></td>
			<td><?php echo date('Y-m-d',$n['time']);?></td>
			<td>

				    <?php if($n['istop']==0){ ?>
				<a href="<?php echo U('Article/top',array('aid'=>$n['aid'],'w'=>1));?>">[置顶]</a>
                   <?php }else{ ?>
					<a href="<?php echo U('Article/top',array('aid'=>$n['aid'],'w'=>2));?>">[取消置顶]</a>
					<?php } ?>

				<a href="<?php echo U('Article/edit',array('aid'=>$n['aid']));?>">[编辑]</a>
				<a href="<?php echo U('Article/del',array('aid'=>$n['aid']));?>">[删除]</a>
			</td>
		</tr>

  <?php }}?>

	</table>
	<div class="page">
		<?php echo $page;?>
	</div>



</body>
</html>