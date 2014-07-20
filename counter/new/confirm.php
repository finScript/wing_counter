<?php include('../../info.php'); session_start(); ?>

<?php
	
	if(!isset($_SESSION['user'], $_GET['eaters'], $_GET['session_name'])) die();
	
	$db = new mysqli(_host, _user, _pass, _dbname);
	$eaters = explode(',', $_GET['eaters']);
	
	//print_r($eaters);
	
?>

<?php
	
	if(isset($_GET['confirmed'])) {
		
		$sessionkey = md5(time());
		
		for($i = 0; $i < count($eaters); $i++) {
			
			$rec = 0;
			$res = $db->query("SELECT * FROM users WHERE uid = '" . $eaters[$i] . "'");
			if($res->num_rows)
				$rec = $res->fetch_object()->wing_record;
			else
				$rec = 0;
			
			$sql = "INSERT INTO eaters(uid, wing_eaten, wing_record, sessionkey) VALUES ('" . $eaters[$i] . "', 0, $rec, '$sessionkey')";
			$db->query($sql);
			
		}
		
		$sql = "INSERT INTO sessions(name, sessionkey) VALUES ('" . $_GET['name'] . "', '$sessionkey')";
		$db->query($sql);
		
		header("location: ../?key=" . $sessionkey);
		die();
		
	}
	
?>

<html>
	
	<head>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<script type="text/javascript" src="confirm.js"></script>
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
		<form action="confirm.php" method="get">
		<div class="u_options">
			
			
				<input type="hidden" name="confirmed" value="yes" />
				<input type="hidden" name="session_name" value="<?php echo $_GET['session_name']; ?>" />
				<input type="hidden" name="eaters" value="<?php echo $_GET['eaters']; ?>" />
				<input type="submit" value="Confirm and Start" />
				<input type="submit" onclick="event.preventDefault();cancelSession();" value="Cancel" style="margin-top: 30px;" />
			
			
		</div>
		</form>
	</body>
	
</html>


















