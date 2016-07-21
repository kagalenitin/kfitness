<?php
	session_start();
	if(!isset($_SESSION['user'])){
		//echo 'Not Set';
		header('location: index.php?c=defaultController');
	}
else{
	echo '
		<html>
		<head><title>Edit User Profile</title>
		'?>
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
			yearRange: '1960:2011'
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
			
			$hp("#edituser").validate({
				
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
	
		<?php
		echo '
		</head>
		
		<body>
		<div align="center">
		<form method="post" action="index.php" id="edituser" name="edituser">
			<h2> Edit User Credentials </h2> 
			<div id="suggestions" style="display: none;">Value must be greater than 4 characters</div>
			<div style="display: none;" id="error"></div>
			<div>';
		?>
			<?php 
				if($_REQUEST["success"]==1){
					echo '<b>User record updated succesfully!!</b>';
				}
				if($_REQUEST["fail"] == 1){
					echo '<b>Sorry ! User record was not updated !!</b>';
				}
					
			?>
			<?php
			echo '</div>
			<table border="0" cellspacing="0" cellpadding="0">

				<tr>
					<td>Firstname<td>
					<td><input type="text" name="firstname" id="firstname" maxlength="50" value="'?><?php echo $_SESSION['user'][1] ?><?php echo '"/></td>
				</tr>
				<tr>
					<td>Lastname<td>
					<td><input type="text" name="lastname" id="lastname" maxlength="50" value="'?><?php echo $_SESSION['user'][2] ?><?php echo '"/></td>
				</tr>
				<tr>
					<td>Password<td>
					<td><input type="password" name="pass" id="pass" maxlength="15" value="'?><?php echo $_SESSION['user'][3] ?><?php echo '"/></td>
				</tr>
				<tr>
					<td>Date of Birth(YYYY-MM-DD)<td>
					<td><input type="text" name="dob" id="dob" class="date-pick" value="'?><?php echo $_SESSION['user'][4] ?><?php echo '"/><div id="dobmsg"></div></td>
				</tr>
				<tr>
					<td>Weight (in kgs)<td>
					<td><input type="text" name="weight" id="weight" maxlength="3" value="'?><?php echo $_SESSION['user'][5] ?><?php echo '"/></td>
				</tr>
				<tr>
					<td>Height (in cms)<td>
					<td><input type="text" name="height" id="height" maxlength="3" value="'?><?php echo $_SESSION['user'][6] ?><?php echo '"/></td>
				</tr>
				<tr>
					<td>Bisceps (in inches)<td>
					<td><input type="text" name="bisceps" id="bisceps" maxlength="5" value="'?><?php echo $_SESSION['user'][7] ?><?php echo '"/></td>
				</tr>
				<tr>
					<td>Chest (in inches)<td>
					<td><input type="text" name="chest" id="chest" maxlength="3" value="'?><?php echo $_SESSION['user'][8] ?><?php echo '" /></td>
				</tr>
				<tr>
					<td>Gender<td>
					<td><select name="gender" id="gender">
						<option value="selectgender">Select Gender</option>
						<option value="male"'?>
						<?php 
							if($_SESSION['user'][9]=="male" ){
								echo 'selected=\"selected\"'; 
							} 
						?>
						<?php echo '>Male</option>
						<option value="female"' ?>
						<?php 
							if($_SESSION['user'][9] =="female"){
								echo 'selected=\"selected\"'; 
							} 
						?>
						<?php echo '>Female</option></td>
				</tr>
				<tr>
					<td>EMail<td>
					<td><input type="text" name="email" id="email" maxlength="150" readonly="readonly" value="'?><?php echo $_SESSION['user'][10] ?><?php echo '"/><div> You cannot change your email address.</div></td>
				</tr>
				<tr>
					<td>Phone<td>
					<td><input type="text" name="phone" id="phone" maxlength="12" value="'?><?php echo $_SESSION['user'][11] ?><?php echo '"/></td>
				</tr>
				<tr>
					<td>Address<td>
					<td><input type="text" name="address" id="address" maxlength="200" value="'?><?php echo $_SESSION['user'][12] ?><?php echo '"/></td>
				</tr>
				<tr>
					<td>City<td>
					<td><input type="text" name="city" id="city" maxlength="50" value="'?><?php echo $_SESSION['user'][13] ?><?php echo '"/></td>
				</tr>
				<tr>
					<td>State<td>
					<td><input type="text" name="state" id="state" maxlength="50" value="'?><?php echo $_SESSION['user'][14] ?><?php echo '" /></td>
				</tr>
				<tr>
					<td>Zip<td>
					<td><input type="text" name="zip" id="zip" maxlength="6" value="'?><?php echo $_SESSION['user'][15] ?><?php echo '"/></td>
				</tr>
				<tr>
					<td>Medical History<td>
					<td><textarea name="history" id="history" rows="9" cols="50" >'?><?php echo $_SESSION['user'][16] ?><?php echo'</textarea></td>
				</tr>
				<tr>
					<td><input type="submit" value="Edit & Save User" id="submit" /></td>
					<td><input type="reset" value="Clear" id="clear" /></td>
				</tr>
			</table>
			<input type="hidden" name="c" id="c" value="userController" />
			<input type="hidden" name="action" id="action" value="edituserprofile" />
		</form>
		
	</div>
	</body>';
}
?>