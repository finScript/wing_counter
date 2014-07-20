<?php include('../../info.php'); session_start(); ?>
<?php
	
	if(!isset($_SESSION['user'], $_GET['eaters'], $_GET['session_name'])) die();
	
	$db = new mysqli(_host, _user, _pass, _dbname);
	$eaters = explode(',', $_GET['eaters']);
	
	//print_r($eaters);
	
?>
	
<html>
	
	<head>
		<link rel="stylesheet" type="text/css" href="style.css" />
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
						<a href="../../logout">Log Out</a>
					</div>
					
					<?php
					
				}
				
			?>
			
		</div>
		
		<div id="header">Confirm</div>
		
		<?php
			
			$missing_users = [];
			
			for($i = 0; $i < count($eaters); $i++) {
				
				$sql = "SELECT * FROM users WHERE uid = '" . $eaters[$i] . "'";
				if($db->query($sql)->num_rows) {
					
					?>
					
					<div class="u_options">
						<?php echo $eaters[$i] . " was added successfully."; ?>
					</div>
					
					<?php
					
				} else {
					
					array_push($missing_users, $eaters[$i]);
					?>
					
					<div class="u_options_warning">
						<?php echo $eaters[$i] . " was not found on the registered users list."; ?>
					</div>
					
					<?php
					
				}
				
			}
			
		?>
		
		<div class="u_options">
			
			<input type="submit" onclick="event.preventDefault();startSession();" value="Confirm and Start" />
			
		</div>
		
	</body>
	
</html>


















