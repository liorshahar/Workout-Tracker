<?php
	include('db.php');
	
	/* escape variables for security
	$first_name = mysqli_real_escape_string($connection, $_SESSION["first_name"]);
	$last_name  = mysqli_real_escape_string($connection, $_SESSION["last_name"]);
	//$id  = mysqli_real_escape_string($connection, $_SESSION["id"]);
	$email  = mysqli_real_escape_string($connection, $_SESSION["email"]);
	$phone  = mysqli_real_escape_string($connection, $_SESSION["phone"]);
	$date  = mysqli_real_escape_string($connection, $_SESSION["date"]);
	$user_name  = mysqli_real_escape_string($connection, $_SESSION["user_name"]);
	*/
	
	$bmi  = $_POST['bmi'];
	$blood = $_POST['blood'];
	$weight  = $_POST['weight'];
	$height  = $_POST['height'];
	$fatperc  = $_POST['fatperc'];
	$medical_prob  = $_POST['medical'];
	$goals  = $_POST['goals'];
	$id = $_POST['trainee_id'];
	
	
	$query  = "INSERT into tbl_user_218_users (user_name,password,type) values ('$user_name','12345','trainee')";

    $query2  = "insert into tbl_users_218_trainee_first_indices (bmi,weight,height,fat_perc,blood,medical_prob,goals,trainee_id) 
    	values ('$bmi','$weight','$height','$fatperc','$blood','$medical_prob','$goals','$id')";
	
	$result = mysqli_query($connection, $query);

	$result2 = mysqli_query($connection, $query2);

	
	$_SESSION["trainee_id"] = $id;	
	
	header('Location: http://shenkar.html5-book.co.il/2017-2018/html5/dev_218/trainingsuggestions.php');
	
    
	//close DB connection
	mysqli_close($connection);

?>