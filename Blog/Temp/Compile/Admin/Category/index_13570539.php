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
			<td class="th" colspan="10">查看栏目</td>
		</tr>
		<tr>
			<th>CID</th>
			<th>栏目名称</th>
			<th>状态</th>
			<th>操作</th>
		</tr>

           <?php
        //初始化
        $hd['list']['d'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($cate)) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($cate as $d) {
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
                $hd['list'][d]['last']= (count($cate)-1 <= $listId);
                //总数
                $hd['list'][d]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
		<tr>
			<td><?php echo $d['cid'];?></td>
			<td><a href=""><?php echo $d['cname'];?></a></td>

			    <?php if($d['isoff']==0){ ?>
			<td>开启</td>
			<?php }else{ ?>
			<td>关闭</td>
			<?php } ?>

			<td>
				    <?php if($d['isoff']==0){ ?>
				<a href="<?php echo U('Category/isoff',array('cid'=>$d['cid'],'w'=>1));?>">[关闭]</a>

					<?php }else{ ?>
					<a href="<?php echo U('Category/isoff',array('cid'=>$d['cid']));?>">[开启]</a>
				<?php } ?>

					<a href="<?php echo U('Category/edit',array('cid'=>$d['cid']));?>">[编辑]</a>
				<a href="<?php echo U('Category/del',array('cid'=>$d['cid']));?>" class="del">[删除]</a>
			</td>
		</tr>

   <?php }}?>
	</table>
		<div class="page">
			<?php echo $page;?>
		</div>
</body>
</html>