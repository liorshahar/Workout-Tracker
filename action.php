<?php
	include('includes/db.php');
	//get data from DB to display
    $query1  = "SELECT * FROM tbl_user_218_users";
    $result = mysqli_query($connection, $query1);
    if(!$result) { 
        die("DB query failed.");
    }

	//if data was sent, save it and display in the list
	if(isset($_POST['name'])){
		// escape variables for security
		$name = mysqli_real_escape_string($connection, $_POST['name']);
		$email = mysqli_real_escape_string($connection, $_POST['email']);
		header('Location: ' . URL . '../newtrainee2.php');

	}
	//release returned data

	mysqli_free_result($result);
	//close DB connection

	mysqli_close($connection);

?>