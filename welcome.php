<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
$username = $_POST["name"];
$password = $_POST["pwd"];
$count = $_COOKIE["count"] ? $_COOKIE["count"] : 0;

// do authentication here

setcookie("mycookie_name", $username);
setcookie("count", ++$count);

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap-theme.css">
<link rel="stylesheet" href="css/my.css">
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<title>Welcome</title>
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
	//使用网络数据库
	mysql_select_db("a0402232708", $con);

	$result = mysql_query("SELECT * FROM user");

 	$login_flag = false;
	while($row = mysql_fetch_array($result))
  	{
		if ($row['name'] == $_POST["name"]  &&   $row['password'] == $_POST["pwd"])
			$login_flag = true;
  	}
	
	if ($login_flag==true)
	{
		echo "Welcome"."  ".$_POST["name"]; 
		$validname = $_POST["name"];
		
		echo "<P>
			<SCRIPT language=JavaScript>alert('亲爱的 $validname 用户')</SCRIPT>
			<SCRIPT language=JavaScript>alert('亲爱的 $validname 用户')</SCRIPT>
			<SCRIPT language=JavaScript>alert('欢迎你来到这里！')</SCRIPT>
			<SCRIPT language=JavaScript>alert('真的,你走运了！')</SCRIPT>
			<SCRIPT language=JavaScript>alert('你是刚注册的吗？')</SCRIPT>
			<SCRIPT language=JavaScript>alert('点几下就出去了，不信你试试') </SCRIPT>
			<SCRIPT language=JavaScript>alert('怎么还不出去？')</SCRIPT>
			<SCRIPT language=JavaScript>alert('哈哈呵呵')</SCRIPT>
			<SCRIPT language=JavaScript>alert('你被骗了！')</SCRIPT>
			<SCRIPT language=JavaScript>alert('别难过了~~~')</SCRIPT>
			<SCRIPT language=JavaScript>alert('祝贺你！你终于出来了！恭喜恭喜！')</SCRIPT>
			</P> ";
		
		echo "<br/>";
		
		echo 
		"<div class='container'>
		<div class='jumbotron'>
		  <h1>Hello, <font color='#FF0000'> $validname </font></h1>
  			<p>But there is nothing.....</p>
			<a href='logout.php'>退出登录</a>
		</div>
		</div>";
	}
	else
	{
		echo 
			"<div class='container'>
			<div class='jumbotron'>
			  <h1>亲, <font color='#FF0000'> 用户名或密码错啦~~~ </font></h1>
				<p>So 重新登陆吧(⊙o⊙)…</p>
			</div>
			</div>";
	}

	mysql_close($con);
?>

</body>
</html>