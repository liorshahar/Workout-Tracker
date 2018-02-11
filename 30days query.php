<?php
	include('includes/db.php');
	
	session_start();	
    if(!isset($_SESSION["user_id"]))
        header('Location: ' . URL . '../login.php');
	
	$currentdate=date("Y-m-d");		

	$lastMonth = date('Y-m-d', strtotime('-30 days'));
		
	$query  = "SELECT * FROM  tbl_users_218_indices WHERE trainee_id = '"
		. $_SESSION["trainee_id"]
		. "' and date <= '" .$currentdate
		. "' and date >= '" . $lastMonth ."'";	
	
	
    $result = mysqli_query($connection, $query);
    if(!$result) { 
        die("DB query failed.");
    }
	
	//loop through the returned data
	$data = array();
	
	while($row =mysqli_fetch_assoc($result))
	{
	    $data[] = $row;
	}
	
	echo json_encode($data);
	
	//release returned data
	mysqli_free_result($result);
	
	//close DB connection
	mysqli_close($connection);
	
	
?>