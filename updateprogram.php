<?php
include('includes/db.php');
include "includes/config.php";

session_start();	
if(!isset($_SESSION["user_id"]))
    header('Location: ' . URL . '../login.php');

$workout =  $_GET['workout'];

$query = "UPDATE tbl_users_218_trainee SET workout ='" 
	. $workout 
	. "'WHERE id='"
	. $_SESSION["trainee_id"]
	. "'";

echo $query;

$result = mysqli_query($connection, $query);
echo $result;


//close DB connection
mysqli_close($connection);
?>