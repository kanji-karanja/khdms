<!DOCTYPE html>
<html>
<head>
	<title>Login | Kisumu Health</title>
	<link rel="stylesheet" type="text/css" href="../res-site/css/bootstrap.min.css">
	<style type="text/css">
		body{
			background-color: #25003e;
			/*
			background: #e600e6;
background: -webkit-linear-gradient(to right,#330033,#e600e6);
background: -webkit-gradient(linear,left top,right top,from(#330033),to(#e600e6));
background: -webkit-linear-gradient(left,#330033,#e600e6);
background: -o-linear-gradient(left,#330033,#e600e6);
background: linear-gradient(to right,#330033,#e600e6);
*/
		}
		.text-purple{
			color: #25003e;
		}
		.btn-purple{
			background-color: #25003e;
			color: #ffffff;
			padding-left: 20px;
			padding-right: 20px;
		}
	</style>
</head>
<body>
<div class="container">
	<div class="row" style="padding-top: 150px;">
		
	</div>
	<div class="row">
	<div class="col-sm-3 col-lg-4 col-md-3">
	</div>
	<div class="col-sm-5 col-lg-4 col-md-5">
		<center>
		<form class="form" style="background-color: white; padding: 30px;" method="post" action="" onsubmit="return validateForm()">
			<h1 class="text-purple">Kisumu Health</h1>
			<hr>
			<div id="responseXml"></div>
			<div class="form-group">
			<input type="Text" name="username" id="username" placeholder="Username" class="form-control" required="true">
			<div style="float: right;" class="text-danger" id="messageUsername"></div>
			</div>
			<div class="form-group">
			<input type="Password" name="password" id="password" placeholder="Password" class="form-control" required="true">
			<div style="float: right;" class="text-danger" id="messagePass"></div>
			</div>
			<div class="form-group">
			<div id="preloader" style="float:left;"></div>
			<button type="submit" class="btn btn-purple">Login</button>
			</div>
			<br>
			<hr>
			<div class="checkbox">
				<label><input type="checkbox" name=""> Remember me</label>
			</div>
		</form>
		</center>
	</div>
	<div class="col-sm-4 col-lg-4 col-md-4">
	</div>
</div>
</div>
<script type="text/javascript" src="../res-site/js/main.js"></script>
<script type="text/javascript" src="../res-site/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../res-site/js/bootstrap.min.js"></script>
</body>
</html>