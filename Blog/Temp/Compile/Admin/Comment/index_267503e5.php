<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" href="http://localhost/blog/Blog/Admin/View/Public/css/public.css" />
	<script type="text/javascript" src="http://localhost/blog/Blog/Admin/View/Public/js/jquery-1.7.2.min.js"></script>
</head>

<body>
	<table class="table">
		<tr>
			<td class="th" colspan="20">评论列表</td>
		</tr>
		<tr class="tableTop">
			<td class="tdLittle1">ID</td>
			<td>评论内容</td>
			<td>评论时间</td>
			<td>评论者</td>
			<td>操作</td>
		</tr>



		        <?php
        //初始化
        $hd['list']['d'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($comment)) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($comment as $d) {
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
                $hd['list'][d]['last']= (count($comment)-1 <= $listId);
                //总数
                $hd['list'][d]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
		<tr>
			<td><?php echo $d['coid'];?></td>
			<td><?php echo $d['content'];?></td>
			<td><?php echo date('Y-m-d',$d['time']);?></td>
			<td><?php echo $d['nickname'];?></td>

			<td>
				<a href="<?php echo U('Comment/del',array('coid'=>$d['coid']));?>" class="del">删除</a>
			</td>
		</tr>

		<?php }}?>

	</table>
	<div class="page">
		<?php echo $page;?>
	</div>

</body>
</html>
