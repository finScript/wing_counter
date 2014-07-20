<?php include('../info.php'); session_start(); ?>
<?php
	
	if(!isset($_POST['uid'], $_POST['pass'], $_POST['passrep'])) die();
	else //print_r($_POST);
	
	$uid = $_POST['uid'];
	$pass = $_POST['pass'];
	$passrep = $_POST['passrep'];
	
	if(!$pass == $passrep) {
		
		header("location: index.php?error=pass");
		die();
		
	}
	
	$db = new mysqli(_host, _user, _pass, _dbname);
	
	$sql = "SELECT * FROM users WHERE uid = '$uid'";
	if($res = $db->query($sql)) {
		
		if(!$res->num_rows) {
			
			$pass = password_hash($pass, PASSWORD_DEFAULT);
			$sql = "INSERT INTO users(uid, pass) VALUES ('$uid', '$pass')";
			if($res = $db->query($sql)) {
				
				header("location: ../login");
				die();
				
			}
			
		} else {
			
			header("location: index.php?error=user");
			die();
			
		}
		
	} else {
		
		echo $db->error;
		
	}
	
	
	
?>