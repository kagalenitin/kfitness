<?php
	session_start();
	require_once("models/trainermodel.php");
	$objTrainer = new TrainerModel();
	if(!isset($_SESSION['user'])){
		//This will check if the user session is set or no. if not, it will send to homepage.
		header('location: index.php?c=defaultController');
	}else{
		//If user sesion is set, then it will take the user to selecttrainer.php page.
		echo '<html>
			<head>
			<title>Select your trainer </title>';
?>
			<script type="text/javascript" src="development-bundle/jquery-1.4.4.js"> </script> 
			<script type="text/javascript" src="javascripts/jquery.validate.js"></script>
			<script type="text/javascript">
				$hp = jQuery.noConflict();
				$hp(function(){
					$hp.validator.addMethod("trainer", function(value, element) {
					return this.optional(element) || (value.indexOf("selecttrainer") == -1);
					}, "Please select a trainer");
					$hp("#usertrainer").validate({
						rules:{
							trainer:{
								trainer: true
							}
						}
					});
				});
				
			</script>
		
			<?php echo '</head>
			
			<body>
				<div align="center">
					<form method="post action="index.php" id="usertrainer" name="usertrainer">
						<h2>Assign Trainer </h2>
						<table border="0" cellspacing="0" cellpadding="0">';?>
				<?php
							if($_REQUEST["val"] == 1){
								echo '<b>User is assigned the trainer!!</b>';
							}
							if($_REQUEST["fail"] == 1){
								echo '<b>Sorry ! Something went wrong !!</b>';
							}
							
				?>	
				<?php echo'
							<tr>
								<td>Firstname<td>
								<td><input type="text" name="firstname" id="firstname" maxlength="50" readyonly="readonly" value="'?><?php echo $_SESSION['user'][1] ?><?php echo '"/></td>
							</tr>
							<tr>
								<td>Select Trainer<td>';?>
								<?php
									$result = $objTrainer->loadTrainerName();
									if(mysql_num_rows($result)==0){
										echo "No records";
									}else{
										echo '<td><select name="trainer" id="trainer" onchange="showDetails(this.value)"><option value="selecttrainer">Select Trainer</option>';
										while($row = mysql_fetch_array($result)){
											echo '<option value='.$row["trainerid"].'>'.$row["firstname"].' '.$row["lastname"].'</option>';
										}
									}
								?>
								<?php echo '</select>
								
								</td>
							</tr>
							<tr>
								<td><input type="submit" value="Assign Trainer" id="submit" /></td>
							</tr>
						</table>
						<input type="hidden" name="c" id="c" value="userController" />
						<input type="hidden" name="action" id="action" value="assigntrainer" />
					</form>
				</div>
			</body>
			</html>';
	}
?>