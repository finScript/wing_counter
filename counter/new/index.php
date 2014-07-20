<?php include('../../info.php'); session_start(); ?>
<?php
	
	if(!isset($_SESSION['user'])) die();
	
?>

<html>
	
	<head>
		
		<link rel="stylesheet" type="stylesheet" href="style.css" />
		
	</head>
	<body>
		
		<div id="top_bar">
				
				<?php
					
					$user;
					$logged;
					
					if(!isset($_SESSION['user'])) {
						$logged = false;
						?>
						&nbsp;
						<div style="float: right">
							<a href="login">Log In</a>
							<a href="register">Register</a>
						</div>
						
						<?php
						
					} else {
						
						$user = $_SESSION['user'];
						$logged = true;
						
						?>
						
						Logged in as <b><?php echo $user; ?></b>
						<div style="float: right;">
							<a href="my">My Settings</a>
							<a href="logout">Log Out</a>
						</div>
						
						<?php
						
					}
					
				?>
				
			</div>
			
			<div id="header">
				New
			</div>
			
			<form action="create.php" method="get">
			
				<div class="u_options">
					
					<label for="eaters">
						Eaters:
					</label>
					<input type="text" name="eaters" id="eaters" style="" />
					
				</div>
				
				<div class="u_options">
					
					<input type="submit" value="Start" id="sub_button" />
					
				</div>
				
			</form>
		
	</body>
	
</html>

















