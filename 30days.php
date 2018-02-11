<?php

	include 'includes/db.php';

	include "includes/config.php";

	session_start();	
    if(!isset($_SESSION["user_id"]))
        header('Location: ' . URL . '../login.php');
        
    $query  = "SELECT * FROM tbl_users_218_trainee WHERE user_name='"
    	. $_SESSION["user_id"] 
    	."'"; 

    $result = mysqli_query($connection , $query);
    $row = mysqli_fetch_array($result);
	
	if(is_array($row)) {
   		$_SESSION["trainee_id"] = $row['id'];
	}
	
?>



<!DOCTYPE html>
 
<html>
 
	<head>
		<title>Workout Tracker</title>
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" href="includes/style.css">
		<script src="includes/jquery-3.2.1.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.3/css/mdb.min.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
		<script src="includes/script.js"></script>
		
		<script src="includes/Chart.min.js"></script>
		<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>		
	</head>
	
	<body>
    
	    <div id="wrapper">
	    
	        <header>
	        	<a href="index.html"><span class="logo1">Workout Tracker</span></a>
				<article>
					IT DOSEN`T GET EASIER YOU JUST GET BETTER
				</article>  
	        </header>
	
	        <nav id="nav">
	        	<ul>
	        		<li><a href="index.html">DASHBOARD</a></li>
	        		<li><a href="#">WORKOUT</a></li>
	        		<li><a href="login.html">LOGIN</a></li>
	        		<li>
	        			<div class="search-container">
	        				<input type="text" placeholder="Search.." name="search">
	        				<button type="submit"><i class="fa fa-search"></i></button>
	        			</div>
	        		</li>
	        	</ul>
	        </nav>
	      	<nav id="navmobile">
	      		<ul>
	      			<li>
	      				<button data-toggle="collapse" data-target="#collapse">
	      					<span class="navbar-toggler-icon"></span>
	      				</button>
	      			</li>
	      		
	      			<div id="collapse">
	      				<ul id="collapse-ul">
	      					<li><a href-"#">Profile</a></li>
	      					<li><a href-"#">Inbox</a></li>
	      					<li><a href-"#">My Plan</a></li>
	      					<li><a href-"#">Workouts</a></li>
	      					<li><a href-"#">Settings</a></li>
	      					<li><a href-"#">Log out</a></li>
	      				</ul>
	      			</div>
	        		<li><a href="#">Workouts</a></li>
	        		<li><a href="index.html">My Plan</a></li>
	      		</ul>
	      	</nav>
	
	        <main>
				<h1>Training Progress</h1>
				<section id="options">									
					<button class="btn btn-primary btn-sm"><a href="update measure.html">Update Measure</a></button>
					<button class="btn btn-warning btn-sm"><a href="#">Tracking Measure</a></button>
					<button class="btn btn-primary btn-sm"><a href="trainee_prog_sug.php">Change Workout</a></button>
				</section>
				<form id="rangeselect" action="" method="get">
					<button type="submit" id="7daysbutton" class="btn btn-success btn-sm">Last 7 Days</button>
					<button type="submit" id="monthbutton" class="btn btn-success btn-sm">Last Month</button>
					<section>
						<label>From:</label>
						<label>To:</label><br>
						<input type="date" value="" id="fromdate" name="from">					
						<input type="date" value="" id="todate" name="to">
						<button type="submit" id="rangebutton" class="btn btn-info btn-sm">Show</button>
					</section>						    										
				</form>

				<article id="chart-container">
						<!---- here goes the graph -->
										
				</article>
				
	        </main>
	
	        <footer>
				<section>
					<ul>
						<li><a href="#">Workout Tracker</a></li>
						<li><a href="#">contact | </a></li> 
						<li><a href="#">Temp Of use</a></li>
					</ul>
				</section>
				<section>
					<ul>
						<li><a href="#"></a></li>
						<li><a href="#"></a></li>
						<li><a href="#"></a></li>
						<li><a href="#"></a></li>
					</ul>
				</section>
	        </footer>
	        
	    </div>
	    <script>
		    $("document").ready(function() {		//invoke function
					init();	
					show30daysGraph();		
			});
		</script>
		
		<script>			
			$("button").click(function(e){
		    	var idClicked = e.target.id;
		    	if (idClicked == '7daysbutton'){
		    		$(location).attr("href", "traineelogin.php");
		    		//showTraineeGraph();	
		    	}
		    	else if (idClicked == 'monthbutton'){
    				//$(location).attr("href", "30days.php");
		    		show30daysGraph();	
		    	}
			});
					   	
		   $("#rangebutton").click(function(){
			   	var from = $('#fromdate').val();
			    var to = $('#todate').val();
		  	});		   				
		</script>
		
	</body>
 
</html>
              
<?php
	//close DB connection	
	mysqli_close($connection);
?>