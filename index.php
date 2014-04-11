<!doctype html>
<html lang="zh-ch">
	<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap-theme.css">
	<link rel="stylesheet" href="css/my.css">
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	<script language="javascript" type="text/javascript">
		function regist()
		{
			$url = "http://127.0.0.1/newLogin/adduser.php";
			window.location.href=$url;
		}
	</script>
	<title>WebAssignment3---Login</title>
	</head>

	<body>
    
    <?php
    if (!$_COOKIE["mycookie_name"]) {
      ?>
	<?php } else { ?>
    	<?php
		echo "<script language='javascript' type='text/javascript'>";
		echo "alert('cookie告诉我你曾经登录过');";
		echo "</script>";
		?>
	<?php } ?>
    
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-md-offset-3  panel panel-default">
          <h1 class="margin-base-vertical">Web Assignment 3</h1>
          <p>这是Web程序设计第三个作业，Apache + PHP + Mysql实现用户登录验证的功能</p>
          <p>作者信息： 12283013  王欢   信息安全（保密技术）</p>
          <p>新用户请注册一个用户，尝试登录，默认登录用户名为webuser 密码为webuser</p>
          <form action="welcome.php" method="post" class="margin-base-vertical">
            <p class="input-group"> <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
              <input type="text" class="form-control input-lg" name="name" placeholder="">
            </p>
            <p class="input-group"> <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
              <input type="password" class="form-control input-lg" name="pwd" placeholder="">
            </p>
            <p class="help-block text-center"><small>Press What You Want</small></p>
            <p class="text-center">
              <button class="btn btn-success btn-lg" type="submit">登录</button>
            </p>
          </form>
          <div align="center">
              <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"> 注册 </button>
              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">注册一个新账户</h4>
                    </div>
                    <div class="modal-body">
                      <form role="form" action="insert.php" method="post">
                        <div class="form-group">
                          <label>用户名</label>
                          <input type="text" class="form-control" name="name_new" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                          <label>密码</label>
                          <input type="password" class="form-control" name="pwd_new" placeholder="Enter Password">
                        </div>
                        <button type="submit" class="btn btn-default" style="alignment-adjust:central">注册</button>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <br/>
          <br/>
          <div align="center">
              <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#showModal"> 显示账户 </button>
              <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title" id="myModalLabel">所有注册过的账户</h4>
                    </div>
                    <div class="modal-body">
                    	仅仅用于测试用，没有哪个网站会直接暴露用户名和密码吧(⊙o⊙)…
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
						echo
						"<table class='table table-hover'>";
						echo
						"<th>用户名</th> <th>密码</th>";
						while($row = mysql_fetch_array($result))
						{
							echo
							"<tr>
								<td>$row[name]</td> <td>$row[password]</td>
							 </tr>";	
						}
						echo "</table>";
						mysql_close($con);
					?>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          
          <!--
          <form action="adduser.php" method="post" class="margin-base-vertical">
            <p class="text-center">
              <button class="btn btn-success btn-lg" type="submit">注册</button>
            </p> 
          </form>
--> 
          
          <!--          
           <p class="text-center">
              <button class="btn btn-success btn-lg" onClick="regist()">注册</button>
            </p> 
            -->
          
          <div class="margin-base-vertical"> <small class="text-muted"><a href="http://bjtuweb-12283013.github.io">我的 Web_Assignment_2 作业</a></small> </div>
          </div>
      </div>
    </div>
    <center>
    <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_5872768'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s22.cnzz.com/stat.php%3Fid%3D5872768%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>
    </center>
</body>
</html>