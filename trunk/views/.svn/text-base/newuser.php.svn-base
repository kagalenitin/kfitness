<?php
	session_start();
?>

<html>
<head>
	<!-- This is the date picker javascript n css files-->
	<script type="text/javascript" src="development-bundle/jquery-1.4.4.js"> </script> 
 	<script type="text/javascript" src="development-bundle/ui/jquery.ui.core.js"></script>
	<script type="text/javascript" src="development-bundle/ui/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="development-bundle/ui/jquery.ui.datepicker.js"></script>

	<link rel="stylesheet" href="development-bundle/themes/base/jquery.ui.all.css" type="text/css" media="screen" /> 

	
	<script type="text/javascript">
	  var $nu = jQuery.noConflict();
	  $nu(document).ready(function() {
		$nu("#dob").datepicker({
			minDate: new Date(1960, 1-1, 1),
			dateFormat: "yy-mm-dd",
			changeYear: true,
			yearRange: '1960:2011	'
		});
	  });
	</script>
	 <!-- Validation fields javascript -->
	<script type="text/javascript" src="javascripts/jquery.validate.js"></script>
	<script type="text/javascript">
		 $hp = jQuery.noConflict();
		 $hp(function(){
			$hp.validator.addMethod("phone", function(phone_number, element) {
					phone_number = phone_number.replace(/\s+/g, ""); 
					return this.optional(element) || phone_number.length > 9 &&
					phone_number.match(/^(1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/);
				}, "Please specify a valid phone number");
			$hp.validator.addMethod("gender", function(value, element) {
				return this.optional(element) || (value.indexOf("selectgender") == -1);
			}, "Please select a gender");
			
			$hp("#newuser").validate({
				
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
						email: {
							required: true,
							email: true
						},
						pass: {
							required: true,
							minlength: 6,
							maxlength: 15
						},
						weight:{
							required: true,
							digits: true,
							minlength: 2,
							maxlength: 3
						},
						dob: {
							required: true,
						},
						height: {
							required: true,
							digits: true,
							maxlength: 3
						},
						bisceps: {
							required: true,
							digits: true,
							maxlength: 5
						},
						chest:{
							required: true,
							digits: true,
							maxlength: 4
						},
						gender:{
							gender: true
						},
						address: {
							required: true,
							maxlength: 200
						},
						city: {
							required: true,
							maxlength: 50
						},
						state: {
							required: true,
							maxlength: 50
						},
						zip: {
							required : true,
							digits: true,
							maxlength: 6
						},
						history: {
							maxlength: 500
						},
						phone: {
							required: true,
							phone: true
						}
					},
					messages: {
						firstname: "Please enter your firstname correctly (Atleast 4 char).",
						lastname: "Please enter your lastname correctly (Atleast 2 char).",
						email: "Your email will be used for login credentials. Please enter valid EMail ID.",
						pass: "Password should be 6-15 characters.",
						chest: "Please enter your chest size in inches !",
						weight: "Please enter your weight in kgs !",
						height: "Please enter your height in cms !",
						dob: "Select a correct date of birth !",
						phone: "Please enter a 10-digit valid phone no.",
						address: "Enter a valid address.",
						city: "Enter your city.",
						state: "Enter your state.",
						zip: "Enter a 6 digit valid PIN."
					}
			});
		});
	
	</script>
	
	<!-- This part checks if the email exists using AJAX -->
	
<script type="text/javascript">
	var $jr = jQuery.noConflict();
	$jr(document).ready(function(){
	//called when focus of username is lost
		$jr("#email").keypress(function (e)
			{
			$jr("#error").hide();
			$jr("#autoSuggestionsList").hide();
			//if the letter is not digit then display error and don't type anything
			//if( e.which!=8 && e.which!=0  && (e.which<48 || e.which>57) && (e.which<65 || e.which>90)&& (e.which<97 || e.which>122)){
				//display error message
				//$jr("#error").html("No Special Characters.Only number & alphabets").show();
				//return false;
			//}
		});
	}); 
	function lookup(email) {
		//alert(username.length);
		var $dt="";
		if(email.length <5) {
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
			var eml = $jr('#email').val();
			$jr.ajax({
				type: "POST",
				url: "index.php?c=homeController&action=ajaxuser",
				data: "email="+ eml,
				cache: false,
				success: function(msg) {
					//alert(msg);
					if($jr.trim(msg)>0){
						$jr('#email').val("");
						$jr('#autoSuggestionsList').html('Sorry ! Email already registered.').show();
					}else{
						$jr('#autoSuggestionsList').html('Email is available').show();
					}
				}
			});
			
		}
		
	}

</script>
	
	
</head>
<body>
	<div align="center">
	<form method="post" action="index.php" id="newuser" name="newuser">
		<h2> New User Credentials </h2> 
		<div id="suggestions" style="display: none;">Value must be greater than 4 characters</div>
		<div style="display: none;" id="error"></div>
		<div>
		<?php 
			if($_REQUEST["val"]==1){
				echo '<b>User record inserted succesfully. A temporary password is generated and sent to your email ID. Please use your password to login.</b>';
			}
			if($_REQUEST["fail"] == 1){
				echo '<b>Sorry ! User record was not inserted !!</b>';
			}
		?>
		</div>
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
				<td>Password<td>
				<td><input type="password" name="pass" id="pass" maxlength="15" value="******" readonly="readonly"/><div style="color:red">Temporary password is randomly generated</div></td>
			</tr>
			<tr>
				<td>Date of Birth(YYYY-MM-DD)</td>
				<td><input type="text" name="dob" id="dob" class="date-pick" readonly="readonly"/></td>
			</tr>
			<tr>
				<td>Weight (in kgs)<td>
				<td><input type="text" name="weight" id="weight" maxlength="3" /></td>
			</tr>
			<tr>
				<td>Height (in cms)<td>
				<td><input type="text" name="height" id="height" maxlength="3" /></td>
			</tr>
			<tr>
				<td>Bisceps (in inches)<td>
				<td><input type="text" name="bisceps" id="bisceps" maxlength="5" /></td>
			</tr>
			<tr>
				<td>Chest (in inches)<td>
				<td><input type="text" name="chest" id="chest" maxlength="3" /></td>
			</tr>
			<tr>
				<td>Gender<td>
				<td><select name="gender" id="gender">
					<option value="selectgender">Select Gender</option>
					<option value="male">Male</option>
					<option value="female">Female</option></td>
			</tr>
			<tr>
				<td>EMail<td>
				<td><input type="text" name="email" id="email" maxlength="150" onblur="lookup(this.value);"/><div style="display: none; color: red" id="autoSuggestionsList"></div></td>
			</tr>
			<tr>
				<td>Phone<td>
				<td><input type="text" name="phone" id="phone" maxlength="12" /></td>
			</tr>
			<tr>
				<td>Address<td>
				<td><input type="text" name="address" id="address" maxlength="200" /></td>
			</tr>
			<tr>
				<td>City<td>
				<td><input type="text" name="city" id="city" maxlength="50" /></td>
			</tr>
			<tr>
				<td>State<td>
				<td><input type="text" name="state" id="state" maxlength="50" /></td>
			</tr>
			<tr>
				<td>Zip<td>
				<td><input type="text" name="zip" id="zip" maxlength="6" /></td>
			</tr>
			<tr>
				<td>Medical History<td>
				<td><textarea name="history" id="history" rows="9" cols="50" >Medical History, if any.</textarea></td>
			</tr>
			<tr>
				<td><input type="submit" value="Create User" id="submit" /></td>
				<td><input type="reset" value="Clear" id="clear" /></td>
			</tr>
		</table>
		<input type="hidden" name="c" id="c" value="homeController" />
		<input type="hidden" name="action" id="action" value="createuser" />
	</form>
	
</div>
</body>
</html>