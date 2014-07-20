<?php include('../info.php'); session_start(); ?>
<?php
	
	if(isset($_SESSION['user'])) header("location: ../");
	
	if(!isset($_POST['uid'], $_POST['pass'])) die();
	
	$uid = $_POST['uid'];
	$pass = $_POST['pass'];
	
	$db = new mysqli(_host, _user, _pass, _dbname);
	
	$sql = "SELECT * FROM users WHERE uid = '$uid'";
	if($res = $db->query($sql)) {
		
		if($res->num_rows) {
			
			$pass_enc = $res->fetch_object()->pass;
			
			if(password_verify($pass, $pass_enc)) {
				
				$_SESSION['user'] = $uid;
				header("location: ..");
				
			} else {
				
				header("location: index.php?error");
				die();
				
			}
			
		} else {
			
			header("location: index.php?error");
			die();
			
		}
		
	} else {
		
		echo $db->error;
		
	}
	
?>