<?php
	include('includes/db.php');
	
	session_start();	
    if(!isset($_SESSION["user_id"]))
        header('Location: ' . URL . '../login.php');
	
	$currentdate=date("Y-m-d");
	
	$query = "SELECT * FROM tbl_users_218_target_indices WHERE trainee_id = '"
		. $_SESSION["trainee_id"] . "'";
		
	$query1 = "SELECT * FROM tbl_users_218_indices WHERE trainee_id = '"
		. $_SESSION["trainee_id"] 
		. "' and date= '"
		. $currentdate 
		. "'"; 
	
	$result = mysqli_query($connection, $query1);
	//$result1 = mysqli_query($connection, $query1);
	
	$data = array();
    while($row = mysqli_fetch_assoc($result))
    {
        $data[] = $row;
    }
	
	
	// Convert array to json format
	echo json_encode($data);
		
	//release returned data
	//mysqli_free_result($result);
	
	//close DB connection
	mysqli_close($connection);
	
?>
