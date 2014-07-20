<?php include('info.php'); session_start(); ?>
<html>
	
	<head>
		
		<title>Wing Counter</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
		
		<script type="text/javascript" src="main.js"></script>
		
	</head>
	<body>
		
		<div id="wrapper">
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
			
			<div id="header">Wing Counter</div>
			
			<?php
				
				if($logged) {
					
					?>
					
					<div class="u_options" onclick="window.location = 'counter/new'" onmouseover="setColor('a1', 'darkorange');" onmouseout="setColor('a1', 'white');">
						<a href="counter/new" id="a1">New Dining Session</a>
					</div>
					
					<div class="u_options" onclick="window.location = 'counter/continue'" onmouseover="setColor('a2', 'darkorange');" onmouseout="setColor('a2', 'white');">
						<a href="counter/continue" id="a2">Continue Existing Session</a>
					</div>
					
					<div class="u_options" onclick="window.location = 'statistics'" onmouseover="setColor('a3', 'darkorange');" onmouseout="setColor('a3', 'white');">
						<a href="statistics" id="a3">My Statistics</a>
					</div>
					
					<?php
					
				} else {
					
					?>
					<div class="u_options">Please <a href="login">Log In</a> or <a href="register">Register</a> to get started.</div>
					<?php
					
				}
				
			?>
			
		</div>
		
	</body>
	
</html>

