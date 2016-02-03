<?php
require_once ('config.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" />
<title>账户管理</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<?php
	//判断用户权限
	if($_SESSION['member'] != "admin"){
	echo "<script>alert('您不是管理员');location='member.php';</script>";
	}
	//分页显示
	$sql="select * from member order by id asc";
	$result=mysql_query($sql);
	$total=mysql_num_rows($result);
	$page=isset($_GET['page'])?intval($_GET['page']):1;  
	$info_num=2; 
	$pagenum=ceil($total/$info_num); 
	If($page>$pagenum || $page == 0){
       Echo "Error : Can Not Found The page .";
       Exit;
	}
	$offset=($page-1)*$info_num; 
	$info=mysql_query("select * from member order by id desc limit $offset,$info_num"); 
?>
<?php
	//删除用户
	if($_GET["tj"]=="del"){
	mysql_query($sql="delete from member where member_user='".$_GET['member']."'");
	echo "<script>alert('删除成功');location='admin_index.php';</script>";
	}
?>
<?php
	//修改用户
	if($_GET["tj"]=="modify"){
	$sql="select * from member where member_user='".$_GET['member']."'";
	$rs=mysql_fetch_array(mysql_query($sql));
	//提交修改
	if($_POST["submit"]){	
	mysql_query($sql="update member set member_name='".$_POST['member_name']."'");
	echo "<script>alert('修改成功');location='admin_index.php';</script>";
	}
?>
</head>
<body>
<form method="post" action="" style="margin-top:3px; margin-bottom:3px;">
<table width="350" height="239" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#B3B3B3">
  <tr>
    <td height="26" colspan="2" align="center" bgcolor="#EBEBEB">修改账户<? echo $user; ?>的信息</td>
    </tr>
  <tr>
    <td width="59" height="26" align="center" bgcolor="#FFFFFF">账号：</td>
    <td width="268" align="left" bgcolor="#FFFFFF"><? echo $rs['member_user'];?></td>
  </tr>
  <tr>
    <td height="27" colspan="2" align="center" bgcolor="#FFFFFF"><input type="reset" name="button" id="button" value="重置" />
      <input type="submit" name="submit" id="submit" value="提交" /></td>
    </tr>
</table>
</form>
<?php } ?>
<table width="350" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#B3B3B3">
  <tr>
    <td align="center" bgcolor="#FFFFFF"><a href='member.php'>返回控制面板</a>&nbsp;&nbsp;<?php echo "共有".$total."个账号";?></td>
  </tr>
</table>
 
<?php while($rs=mysql_fetch_array($info)){ ?>
<table width="350" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#B3B3B3">
  <tr>
    <td colspan="2" bgcolor="#FFFFFF"></td>
  </tr>
  <tr>
    <td width="62" align="center" bgcolor="#FFFFFF">账&nbsp;&nbsp;号:</td>
    <td width="265" bgcolor="#FFFFFF"><?php echo $rs['member_user']; ?></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#FFFFFF">管理操作</td>
    <td bgcolor="#FFFFFF">
	<?php echo "<a href='?tj=del&member=".$rs['member_user']."'>删除</a>" ?>	</td>
  </tr>
</table>
<?php } ?>
	<table width="350" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#B3B3B3">
      <tr>
        <td align="center" bgcolor="#FFFFFF"><?php
	if( $page > 1 )
    {
    	echo "<a href='admin_index.php?page=".($page-1)."'>前一页</a>&nbsp";
	}else{
   	echo "前一页&nbsp&nbsp";
	}
	for($i=1;$i<=$pagenum;$i++){
       $show=($i!=$page)?"<a href='admin_index.php?page=".$i."'>".$i."</a>":"$i";
       Echo $show." ";
	}
	if( $page<$pagenum)
    {
    	echo "<a href='admin_index.php?page=".($page+1)."'>后一页</a>";
	}else
	{
		echo "后一页";
     }
?></td>
</tr>
</table>

<table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="5"></td>
  </tr>
</table>

<table width="350" height="20" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td align="left" bgcolor="#FFFFFF"></td>
  </tr>
</table>
</body>
</html>