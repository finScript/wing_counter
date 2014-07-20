<?php include('../info.php'); session_start(); ?>
<?php
	
	if(isset($_SESSION['user'])) header("location: ../");
	
?>
<html>
	
	<head>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
		
		<div id="header">Register</div>
		
		<?php
			
			if(isset($_GET['error'])) {
				
				?>
				<div id="error">
				<?php
				
				if($_GET['error'] == 'user') {
					
					?>
					<span>The given User ID is already in use.</span>
					<?php
					
				} elseif($_GET['error'] == 'pass') {
					
					?>
					<span>The passwords don't match.</span>
					<?php
					
				}
				?>
				</div>
				<?php
			}
			
		?>
		
		<form action="register.php" method="post">
			
			<div class="u_options">
				User ID:
				<input type="text" name="uid" id="uid" />
			</div>
			
			<div class="u_options">
				Password:
				<input type="password" name="pass" id="pass" />
			</div>
			
			<div class="u_options">
				Confirm PW:
				<input type="password" name="passrep" id="passrep" />
			</div>
			
			<div class="u_options">
				<input type="submit" value="Register" />
			</div>
			
		</form>
		
	</body>
	
</html>