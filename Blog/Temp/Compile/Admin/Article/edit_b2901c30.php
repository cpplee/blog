<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" href="http://localhost/blog/Blog/Admin/View/Public/css/public.css" />
	<title></title>

</head>
<body>
	<form action="<?php echo U('Article/edit');?>" method="post">
		<table class="table">
			<tr >
				<td class="th" colspan="2">编辑博文</td>
			</tr>
			<tr>
				<td>博文标题</td>
				<td>
					<input type="text" name="title" value="<?php echo $article['title'];?>"/>
					
				</td>
			</tr>
			<tr>
				<td>缩略图</td>
				<td><input type="file" name="thumb"/><img src="<?php echo $article['thumb'];?>" alt=""></td>
			</tr>
			<tr>
				<td>栏目</td>
				<td>
					<select name='cid'>
						<option value="">====选择栏目====</option>
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

                                 <?php if($d['cid']==$article['cid']){ ?>
							<option value="<?php echo $d['cid'];?>" selected="selected"><?php echo $d['cname'];?></option>
                              <?php }else{ ?>
							<option value="<?php echo $d['cid'];?>"><?php echo $d['cname'];?></option>
							<?php } ?>



						<?php }}?>
					</select>
				</td>

			</tr>
			<tr>
				<td>内容</td>
				<td>
					<!--<textarea id="editor_id" name="" style="width:700px;height:300px;"></textarea>-->
					<script id="container" name="content" type="text/plain" style="width:700px;height:300px;"><?php echo $article['content'];?></script>
				</td>
			</tr>
			<tr>
				<td>点击次数</td>
				<td>
					<input type="" name='click' value="<?php echo $article['click'];?>"/>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input  type="hidden"  name="aid" value="<?php echo $article['aid'];?>"/>
					<input type="submit" value="修改" class="input_button"/>
					<input type="reset" class="input_button"/>
				</td>
			</tr>
		</table>
	</form>


	<script type="text/javascript" src="http://localhost/blog/Blog/Admin/View/Public/ueditor.config.js"></script>
	<!-- 编辑器源码文件 -->
	<script type="text/javascript" src="http://localhost/blog/Blog/Admin/View/Public/ueditor.all.js"></script>
	<!-- 实例化编辑器 -->
	<script type="text/javascript">
		var editor = UE.getEditor('container');
	</script>
</body>
</html>