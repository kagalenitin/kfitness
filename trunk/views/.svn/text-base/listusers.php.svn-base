<?php
	//echo 'in triner list';
	$objUser = new UserModel();
	if(!isset($_SESSION['trainer'])){
		//This will check if the user session is set or no. if not, it will send to homepage.
		header('location: index.php?c=defaultController');
	}else{
		echo '
			<html>
			<head>';?>
			<script type="text/javascript" src="development-bundle/jquery-1.4.4.js"> </script> 
			<script type="text/javascript" src="development-bundle/ui/jquery.ui.core.js"></script>
			<script type="text/javascript" src="development-bundle/ui/jquery.ui.widget.js"></script>
			<script type="text/javascript" src="development-bundle/ui/jquery.ui.datepicker.js"></script>

			<link rel="stylesheet" href="development-bundle/themes/base/jquery.ui.all.css" type="text/css" media="screen" /> 
			<script type="text/javascript" src="javascripts/jquery.validate.js"></script>
			<script type="text/javascript">
						<!-- AJAX jQuery to load the user's data on select change. -->
							var $lu = jQuery.noConflict(); 
							
							$lu(function(){
								$lu("select#user").change(function(){
									var vl = $lu('#user :selected').val();
									if(vl== "Select User"){
										//$lu('div:last').val("");
										$lu('.contain').empty();
										$lu('.contain').append("User details will be listed here.");
										//$lu('#goal').empty();
									}else{
										//USE AJAX to get the details of the user.
										//$lu('.contain').append(vl);
										$lu.ajax({
											type: "POST",
											url: "index.php?c=trainerController&action=userdata",
											data: "data="+ vl,
											cache: false,
											success: function(msg) {
												//alert(msg);
												if($lu.trim(msg)>0){
													$lu('.contain').empty();
													$lu('.contain').append('User details will be listed here.');
												}else{
													//Msg is there.
													$lu('.contain').empty();
													$lu('.contain').append(msg);
													
												}
											}
										});
									}
									
								});
							});
						</script>
				
				<script type="text/javascript">
				
					var $goal = jQuery.noConflict();
					$goal(function(){
						$goal("select#user").click(function(){
							if($goal('#user :selected').val() == "Select User"){
								//$goal('#goalweight').val('');
								$goal('form').clearForm();
								$goal('.goal').hide();
							}else{
								$goal('form').clearForm();
								$goal('.goal').show();
							}
						});
					});
					
					<!-- To clear the form data -->
					$goal.fn.clearForm = function() {
						  return this.each(function() {
							var type = this.type, tag = this.tagName.toLowerCase();
							if (tag == 'form')
								return $goal(':input',this).clearForm();
							if (type == 'text' || type == 'password' || tag == 'textarea')
								this.value = '';
							else if (type == 'checkbox' || type == 'radio')
								this.checked = false;
							else if (tag == 'select')
								this.selectedIndex = -1;
						});
					};
				</script>
			<?php echo '
				</head>
				<body>
					<div align="center"> <b>List Users </b><br /><br />
						
			';?>
			<?php
					$result = $objUser->listUsers();
					if(mysql_num_rows($result)==0){
						echo 'You don\'t have any users under you.';
					}else{
						echo 'Select User: ';
						echo '<td><select name="user" id="user"><option value="Select User">Select User</option>';
						while($row = mysql_fetch_array($result)){
							echo '<option value='.$row["userid"].'>'.$row["firstname"].' '.$row["lastname"].'</option>';
						}
					}
					
			?>
			<!-- This part of the code is to validate the date fields on the form. -->
			<script type="text/javascript">
				 var $nu = jQuery.noConflict();
				  $nu(function() {
					$nu("#startdate").datepicker({
						minDate: 0,
						dateFormat: "yy-mm-dd",
						changeYear: true
						
					});
					
					$nu("#enddate").datepicker({
						dateFormat: "yy-mm-dd",
						changeYear: true,
						beforeShow: customRange
					});
					function customRange(input){
						var dateMin;
						//alert($nu('#startdate').val());
						if($nu('#startdate').val()==""){
							alert('Please select the start date first.');
							$nu('input#startdate').datepicker("disabled", true);
						}else{
							dateMin = $nu('#startdate').datepicker("getDate");
							//$nu('#startdate').attr("disabled", true);
							return {
								minDate: dateMin
							};
						}
					}
				  });
				  
				  <!-- Validation of fields -->
					var $vld = jQuery.noConflict();
					
					$vld('#usergoal').validate({
						rules:{
							weight:{
								required: true,
								digits: true,
								minlength: 2,
								maxlength: 3
							},
							startdate: {
								required: true,
							},
							enddate: {
								required: true,
							},
							bisceps: {
								required: true,
								digits: true,
								maxlength: 3
							},
							chest:{
								required: true,
								digits: true,
								maxlength: 4
							},
							dietdetails: {
								maxlength: 500
							},
							exdetails: {
								maxlength: 500
							}
						},
						
						messages:{
							weight: "Please specify the weight in kgs you want to achieve",
							bisceps: "
						}
					});
				  
				  
			</script>

			
			<?php echo '</select>
				</div><br /><br /><br />
				<div class="contain" align="center">User details will be listed here.</div>
				
				<div align="center" class="goal" style="display:none">
				<h2> Set User Goal </h2>
						<form method="post" action="index.php" name="usergoal" id="usergoal">
						<table>
							<tr>
								<td>Set Weight (in kgs)</td>
								<td><input type="text" name="goalweight" id="goalweight" maxlength="3" /></td>
							</tr>
							<tr>
								<td>Set Chest (in inches)</td>
								<td><input type="text" name="goalchest" id="goalchest" maxlength="3" /></td>
							</tr>
							<tr>
								<td>Set Bisceps (in inches)</td>
								<td><input type="text" name="goalbisceps" id="goalbisceps" maxlength="3" /></td>
							</tr>
							<tr>
								<td>Start Date(YYYY-MM-DD)</td>
								<td><input type="text" name="startdate" id="startdate" class="date-pick" readonly="readonly"/></td>
							</tr>
							<tr>
								<td>End Date(YYYY-MM-DD)</td>
								<td><input type="text" name="enddate" id="enddate" class="date-pick" readonly="readonly" /></td>
							</tr>
							<tr>
								<td>Diet Details</td>
								<td><textarea id="dietdetails" rows="9" cols="50">Enter Diet Details!</textarea></td>
							</tr>
							<tr>
								<td>Exercise Details</td>
								<td><textarea id="exdetails" rows="9" cols="50">Enter Exercise Details!</textarea></td>
							</tr>
							<tr>
								<td><input type="submit" value="Set User Goal" name="setusergoal" id="setusergoal" /></td>
							</tr>
						</table>
						
					</form>
				</div>
				</body>
				</html>';
	}
?>