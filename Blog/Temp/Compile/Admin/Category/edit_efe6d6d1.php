<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
		<link rel="stylesheet" href="http://localhost/blog/Blog/Admin/View/Public/css/public.css" />
	<title></title>
</head>
<body>
	<form action="<?php echo U('Category/edit');?>" method="post">
		<table class="table">
			<tr >
				<td class="th" colspan="2">修改栏目</td>
			</tr>
			<tr>
				<td>栏目名称</td>
				<td><input type="text" name="cname" value="<?php echo $category['cname'];?>"/></td>
				   <input type="hidden" name="cid" value="<?php echo $category['cid'];?>"/>
			</tr>
			<tr>
				<td>开启状态</td>
				    <?php if($category['isoff']==0){ ?>
				<td>
					<input type="radio" name="isoff" value="0" checked="checked"/>开启

					<input type="radio" name="isoff" value="1" />关闭
				</td>

					<?php }else{ ?>
					<td>
						<input type="radio" name="isoff" value="0" />开启

						<input type="radio" name="isoff" value="1" checked="checked"/>关闭
					</td>
					<?php } ?>

			</tr>
			<tr>
				<td>关键字</td>
				<td><input type="text" name="keywords" value="<?php echo $category['keywords'];?>"/></td>
			</tr>
			<tr>
				<td>描述</td>
				<td>
					<textarea name="description" id="description" class="textarea" ><?php echo $category['description'];?></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="submit" value="修改" class="input_button"/>
					<input type="reset" class="input_button"/>
				</td>
			</tr>
		</table>
	</form>
</body>
</html>