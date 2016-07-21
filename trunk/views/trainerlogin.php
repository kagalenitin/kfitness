
<html>
<head>

<title>Trainer Login Page </title>
<script type="text/javascript" src="javascripts/jquery-1.4.4.js"></script>
<script type="text/javascript" src="javascripts/jquery.validate.js"></script>
<script type="text/javascript">
	$hp = jQuery.noConflict();
	var $flag = false;
	$hp(function(){
	
		$hp("#tlogin").validate({
			
			//set the rules for the field names
				rules: {
					//debug: true;	
					username: {
						required: true,
						minlength: 5
					},
					pass: {
						required: true,
						minlength: 6
					}
				},
				messages: {
					username: "Username should be 5 characters",
					pass: "Password should be 6-15 characters",
				}
			
		});
		
	});
	
</script>
</head>

<body>
	<div align="center"><h2>Trainer Login Page</h2></div>
	<div align="center">
		<form method="post" action="index.php" id="tlogin" name="tlogin">
			<table>
				<tr>
					<td align="right">Username<td>
					<td><input type="text" name="username" id="username" /></td>
				</tr>
				<tr>
					<td align="right">Password<td>
					<td><input type="password" name="pass" id="pass" /></td>
				</tr>
				<tr>
					<td align="right"><button id="login" type="submit" class="submit">Login ! </button></td>
					<td><button id="clear" type="reset">Clear</button></td>
				</tr>
			</table>
			<div>
				<?php 
					if($_REQUEST["val"]==1){ echo 'Sorry! Your credentials do not match.';}
				?>
			</div>
			<div>
				<a href="index.php?c=homeController&action=adminlogin">Admin Login</a> | <a href="index.php?c=homeController&action=userlogin">User Login</a> | Trainer Login
			</div>
			<input type="hidden" name="c" id="c" value="homeController" />
			<input type="hidden" name="action" id="action" value="tlogin" />
		</form>
	</div>
</body>
</html>