<html>
<head>
<script type="text/javascript" src="javascripts/jquery-1.4.4.js"></script>
<script type="text/javascript" src="javascripts/jquery.validate.js"></script>
<script type="text/javascript">
	$hp = jQuery.noConflict();
	
	$hp(function(){
	
		$hp("#newtrainer").validate({
			
			//set the rules for the field names
				rules: {
					firstname:{
						required: true,
						minlength: 4,
						maxlength: 50
					},
					lastname: {
						required: true,
						minlength: 2,
						maxlength: 50
					},
					username: {
						required: true,
						minlength: 5,
						maxlength: 15
					},
					pass: {
						required: true,
						minlength: 6,
						maxlength: 15
					}
				},
				messages: {
					firstname: "Please enter your firstname correctly (Atleast 4 char).",
					lastname: "Please enter your lastname correctly (Atleast 2 char).",
					username: "Username length must be between 5-15 characters",
					pass: "Password should be 6-15 characters."
					
				}
			
		});
		
	});
	
</script>
<!-- This script handles the AJAX to check if username is available -->
<script type="text/javascript">
	var $jr = jQuery.noConflict();
	$jr(document).ready(function(){
	//called when focus of username is lost
		$jr("#username").keypress(function (e)
			{
			$jr("#error").hide();
			$jr("#autoSuggestionsList").hide();
			//if the letter is not digit then display error and don't type anything
			if( e.which!=8 && e.which!=0  && (e.which<48 || e.which>57) && (e.which<65 || e.which>90)&& (e.which<97 || e.which>122)){
				//display error message
				$jr("#error").html("No Special Characters.Only number & alphabets").show();
				return false;
			}
		});
	}); 
	function lookup(username) {
		//alert(username.length);
		var $dt="";
		if(username.length <5) {
			//$jr('#suggestions').show();
			//$jr('#autoSuggestionsList').hide();
		} else {
			$jr('#suggestions').hide();
			//$jr.post("index.php?c=homeController&action=ajaxrequest",{page: ""+username+""},
			//function(data){
				//if($jr.trim(data)== 'Username already exists!'){
					//$jr('#username').val("");
				//}
				//$jr('#autoSuggestionsList').html(data).show();
			//});
			var usr = $jr('#username').val();
			$jr.ajax({
				type: "POST",
				url: "index.php?c=homeController&action=ajaxrequest",
				data: "username="+ usr,
				cache: false,
				success: function(msg) {
					//alert(msg);
					if($jr.trim(msg)>0){
						$jr('#username').val("");
						$jr('#autoSuggestionsList').html('Sorry ! Username already taken.').show();
					}else{
						$jr('#autoSuggestionsList').html('Username available').show();
					}
				}
			});
			
		}
		
	}

</script>
</head>
<body>

<div align="center">
	<form method="post" action="index.php" id="newtrainer" name="newtrainer">
		<h2> New Trainer Credentials </h2> 
		<table border="0" cellspacing="0" cellpadding="0">

			<tr>
				<td>Firstname<td>
				<td><input type="text" name="firstname" id="firstname" maxlength="50" /></td>
			</tr>
			<tr>
				<td>Lastname<td>
				<td><input type="text" name="lastname" id="lastname" maxlength="50" /></td>
			</tr>
			<tr>
				<td>Username<td>
				<td><input type="text" name="username" id="username" maxlength="50" onblur="lookup(this.value);" /></td>
			</tr>
			<tr>
				<td>Password<td>
				<td><input type="password" name="pass" id="pass" maxlength="15" /></td>
			</tr>
			<tr>
				<td><input type="submit" value="Login" id="submit" /></td>
				<td><input type="reset" value="Clear" id="clear" /></td>
			</tr>
		</table>
		<input type="hidden" name="c" id="c" value="homeController" />
		<input type="hidden" name="action" id="action" value="createtrainer" />
	</form>
	<div id="suggestions" style="display: none;">Value must be greater than 4 characters</div>
	<div style="display: none;" id="autoSuggestionsList"></div>
	<div style="display: none;" id="error"></div>
	<div>
		<?php 
			if($_REQUEST["val"]==1){
				echo 'Values inserted succesfully';
			}
			if($_REQUEST["fail"] == 1){
				echo 'Sorry ! Your record was not inserted !!';
			}
		?>
	</div>
</div>
</body>
</html>
