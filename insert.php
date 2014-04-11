<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Insert a new user into Mysql</title>
</head>

<body>
<?php
	//使用本地数据库
	//$con = mysql_connect("localhost","root","");     
	//使用网络数据库
	$con = mysql_connect("59.188.244.39","a0402232708","16261866");
	if (!$con)
  	{
 		 die('Could not connect: ' . mysql_error());
  	}

 	//选择本地数据库
	//mysql_select_db("userinfo", $con);
	//选择网络数据库
	mysql_select_db("a0402232708", $con);

	$sql="INSERT INTO user (name, password)
	VALUES
	('$_POST[name_new]','$_POST[pwd_new]')";

	if (!mysql_query($sql,$con))
  	{
  	die('Error: ' . mysql_error());
  	}
	else
	{
		$url = "http://towordsfuture.pthk1.yusukj.com/";
		echo "<script language='javascript' type='text/javascript'>";
		echo "alert('注册成功，点击确定跳转到主页尝试登录');";
		echo "window.location.href='$url'";
		echo "</script>";
	}

	mysql_close($con)
?>
</body>
</html>