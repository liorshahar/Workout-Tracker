<?php

	unset($_SESSION['user_id']);
	unset ($_SESSION["trainee_id"]);
	header('Location: login.php');
	
?>
