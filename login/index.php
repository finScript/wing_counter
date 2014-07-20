<?php include('../info.php'); session_start(); ?>
<?php
	
	if(isset($_SESSION['user'])) header("location: ../");
	
?>

<html>
	
	<head>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
		
		<div id="header">Log In</div>
		<?php
			
			if(isset($_GET['error'])) {
				
				?>
				<div id="error">
					<span>The given info is invalid.</span>
				</div>
				<?php
				
			}
			
		?>
		
		<form action="login.php" method="post">
			
			<div class="u_options">
				User ID:
				<input type="text" name="uid" id="uid" />
			</div>
			<div class="u_options">
				Password:
				<input type="password" name="pass" id="pass" />
			</div>
			<div class="u_options">
				<input id="sub_button" type="submit" value="Log In" />
			</div>
			
		</form>
		
	</body>
	
</html>

























