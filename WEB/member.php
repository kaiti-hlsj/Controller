<?php 
require_once ('config.php'); 
//判断用户权限
if(empty($_SESSION['member'])){
	echo "<script>alert('请进行登陆或注册');location='index.php';</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理面板</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php
//注销操作
if($_GET["tj"]=="destroy"){
session_destroy();
echo "<script>alert('注销成功');location='/';</script>";}
?>
<?php
//开启被控模式操作
if($_GET["CM"]=="n"){
function writefile($fname,$str){
    $fp=fopen($fname,"w");
    fputs($fp,$str);
    fclose($fp);
}
$filename='./cmode.txt';
$str='cmode ok';
writefile($filename,$str);
echo "<script>alert('操作成功');location='member.php';</script>";}
?>
<?php
//关闭被控模式操作
if($_GET["CM"]=="f"){
$filename ='./cmode.txt';
 if( is_file( $filename ) )
 {
  if( unlink($filename) )
  {
   echo '已向服务器发送指令';
  }
  else
  {
   echo '执行失败，权限不够';
  }
 }
 else
 {
  echo '命令无效';
 }
echo "<script>alert('操作成功');location='member.php';</script>";}
?>
<?php
//关机操作
if($_GET["PS"]=="s"){
function writefile($fname,$str){
    $fp=fopen($fname,"w");
    fputs($fp,$str);
    fclose($fp);
}
$filename='./shutdown.txt';
$str='shutdown ok';
writefile($filename,$str);
echo "<script>alert('操作成功');location='member.php';</script>";}
?>
<?php
//重启操作
if($_GET["PS"]=="r"){
function writefile($fname,$str){
    $fp=fopen($fname,"w");
    fputs($fp,$str);
    fclose($fp);
}
$filename='./restartnow.txt';
$str='restart ok';
writefile($filename,$str);
echo "<script>alert('操作成功');location='member.php';</script>";}
?>
<?php
//显示用户
$sql="select * from member where member_user='".$_SESSION['member']."',member_img='".$_POST['member_img']."'";
$rs=mysql_fetch_array(mysql_query($sql));
?>
<?php
if($_SESSION['member'])                 
{?>
<table width="350" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#B3B3B3">
  <tr>
    <td width="327" align="center" bgcolor="#EBEBEB" class="font">控制者控制面板
  </tr>
</table>
<table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="3"></td>
  </tr>
</table>
<?php
$result=mysql_query("select * from member where member_user='".$_SESSION['member']."'"); 
while($rs=mysql_fetch_array($result)){
?>
<table width="350" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#B3B3B3">
  <tr>
    <td bgcolor="#FFFFFF">账号操作</td>
<td bgcolor="#FFFFFF"><img width="30px" height="30px" src="<?php echo htmlspecialchars($rs['member_img']); ?>">&nbsp;&nbsp<?php echo htmlspecialchars($rs['member_user']); ?>&nbsp;&nbsp<a href='admin_index.php'>账户管理</a>&nbsp;&nbsp<a href='?tj=destroy'>注销</a></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">进入被控制模式操作</td>
    <td bgcolor="#FFFFFF"><a href='?CM=n'>启动</a>&nbsp;&nbsp;<a href='?CM=f'>关闭</a></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">重开/关机操作</td>
    <td bgcolor="#FFFFFF"><a href='?PS=r'>重启</a>&nbsp;&nbsp;<a href='?PS=s'>关机</a></td>
  </tr>
</table>

<table width="100" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="3"></td>
  </tr>
</table>
<?php } 
}
?>
<table width="350" height="20" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td align="left" bgcolor="#FFFFFF"></td>
  </tr>
</table>
</body>
</html>