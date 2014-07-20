<?php include('../../info.php'); session_start(); ?>
<?php
	
	if(!isset($_SESSION['user'], $_GET['eaters'])) die();
	
	$db = new mysqli(_host, _user, _pass, _dbname);
	$eaters = explode(',', $_GET['eaters']);
	
	
	
?>