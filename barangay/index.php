<?php
	session_start();
	if(!isset($_SESSION['username'])){
		header ('Location: main/index1.php');
	}
?>