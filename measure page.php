<?php
include('includes/db.php');
include('includes/config.php');

session_start();	
if(!isset($_SESSION["user_id"]))
header('Location: ' . URL . '../login.php');

$date = date("Y-m-d");
$fat_perc =  $_GET['percent'];
$distance = $_GET['distance'];
$bmi = $_GET['bmi'];
$calories = $_GET['calories'];
$steps = $_GET['steps'];
$weight = $_GET['weight'];
$trainee_id = $_SESSION['trainee_id'];

$query  = "insert into tbl_users_218_indices (trainee_id,date,weight,fat_perc,distance,bmi,calories,steps) 
values ('$trainee_id','$date','$weight','$fat_perc','$distance','$bmi','$calories','$steps')";

$result = mysqli_query($connection, $query);

if ($result) {
//
}
else{
//
}

?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Measure Page</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="includes/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <link rel="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="includes/jquery-3.2.1.min.js"></script>
        <script src="includes/script.js"></script>
        <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
     
    </head>
    <body>
        <div id="wrapper">
            <header>
                <div id="clearheader">
                    <a href="index.html"><span class="logo1">Workout Tracker</span></a>
                </div>
                <article>
                    IT DOSEN`T GET EASIER YOU JUST GET BETTER
                </article>
                <section id="headeruser">
                    <a href="#">
                        <article class="fa fa-user-circle"></article>
                        <span>
                            <?php
								echo $_SESSION['user_id'];
							?>
                        </span>
                    </a>
                </section> 
            </header>
            <nav class="navbar navbar-toggleable-sm navbar navbar-inverse bg-inverse">
                <button id="humbutton" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggle" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarToggler">
                    <ul class="navbar-nav mr-auto mt-2 " id="desktopnav">
                        <li class="nav-item">
                            <a class="nav-link" href="traineelogin.php">DASHBOARD</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">WORKOUT</a>
                        </li>
                    </ul>
                    <section id="logOut">
                        <a href="logout.php">
                            <article>
                                <?php
									echo ucfirst($_SESSION['user_id'][0]);
								?>
                            </article>
                            <span>log Off</span>
                        </a>
                    </section>
                    <form class="form-inline my-2 my-lg-0" action="#">
                        <input  class="form-control" type="text" placeholder="Search.." name="search">
                        <button class="btn btn-secondarymy-2 my-sm-1 " type="submit"><i class="fa fa-search"></i></button>
                    </form>
                    <ul class="navbar-nav mr-auto mt-2" id="mobilenav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="fa fa-user"></span>
                                Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="fa fa-inbox"></span>
                                Inbox</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">  <span class="fa fa-send"></span>
                                My Plan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">  <span class="fa fa-user"></span>
                                Workout</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">  <span class="fa fa-cog"></span>
                                Settings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">  <span class="fa fa-sign-out"></span>
                                Sign out</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main id="measure">
                <nav id="mobilemainnav">
                    <div>
                        <ul>
                            <li >
                                <a class="nav-link"  href="#">WORKOUT</a>
                            </li>
                            <li >
                                <a class="nav-link mobileselcted" href="traineelogin.php">DASHBOARD</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <section id="breadcrumbs">
                    <ul>
                        <li><a href="traineelogin.php">Dashboard</a></li> >
                        <li><a href="update measure.php">Update Measure</a></li> >
                        <li><a href="measure page.php">Measure Page</a></li> 
                    </ul>                 
                </section>
                <h1>Measure Page</h1>
                <article id="steps">
                    <!---  steps --->
                    <div id="step">
                        <i class="fa fa-user-md"></i>
                       <?php
                    	echo '<label>' . $steps . ' STEPS</label>';
					?>
                    </div>
                </article>
                <article id="indices">
                    <!---  other measures --->
                    <div id="calories">
                        <i class="fa fa-fire"></i>
                               <?php
	                		echo '<label>' . $calories . ' CAL</label>';
						?>
                    </div>
                    <div id="bmi">
                        <i class="fa fa-refresh"></i>
                           <?php
	                		echo '<label>' . $bmi . ' BMI</label>';
						?>
                    </div>
                    <div id="distance">
                        <i class="fa fa-map-marker"></i>
                                <?php
	                		echo '<label>' . $distance . ' KM</label>';
						?>
                    </div>
                    <div id="fat_perc">
                        <i class="fa fa-percent"></i>
                             <?php
	                		echo '<label>' . $fat_perc . ' %</label>';
						?>
                    </div>
                    <div id="weight">
                        <i class="fa fa-text-width"></i>
                              <?php
	                		echo '<label>' . $weight . ' KG</label>';
						?>
                    </div>
                </article>
                <article id="chartContainer">
                    <!---  Graph --->
                    <script>
                         	var trace1;
	                    var trace2;

                       $.getJSON("measure_graph.php",function(data1){
	                       	console.log(data1);
	                       	
	                       	$.each(data1,function(){
	                       		var calInt = parseInt(this.calories) /10;
	                       		var stepInt = parseInt(this.steps) /100;
	                       		if (calInt > 90){
	                       			$("#calories").css("border-color", "#fc4633");
	                       		}
	                       		
	                       		if (stepInt < 12){
	                       			$("#step").css("border-color", "#fc4633");
	                       		}
	                       		
	                       		if (this.weight > 75){
	                       			$("#weight").css("border-color", "#fc4633");
	                       		}
	                       		
	                       		if (this.fat_perc > 19){
	                       			$("#fat_perc").css("border-color", "#fc4633");
	                       		}
	                       		
	                       		if (this.bmi > 20){
	                       			$("#bmi").css("border-color", "#fc4633");
	                       		}
	                       		
	                       		if (this.distance < 3.5){
	                       			$("#distance").css("border-color", "#fc4633");
	                       		}
	                       			                                              		
	                       		trace1= {
									x: ['Calories(x10)','Steps(x100)','Weight(kg)','Fat perc','BMI','Distance(km)'],
									y: [calInt,stepInt,this.weight,this.fat_perc,this.bmi,this.distance],
									name:'current',
									type:'bar'
								};
								trace2 = {
									x: ['Calories(x10)','Steps(x100)','Weight(kg)','Fat perc','BMI','Distance(km)'],
									y: [90,12,75,19,20,3.5],
									name:'target',
									type:'bar'
								};						
			   				});
			   				var data = [trace1,trace2];
							var layout = {barmode: 'stack'};
							Plotly.newPlot('chartContainer',data,layout);
                       });
                
                    </script>
                </article>
            </main>
            <footer class="navbar navbar-toggleable-xl navbar navbar-inverse bg-inverse">
                <section id="contact">
                    <ul >
                        <li class="nav-item"><a href="#">Workout Tracker</a></li>
                        <li class="nav-item"><a href="#">contact | </a></li>
                        <li class="nav-item"><a href="#">Temp Of use</a></li>
                    </ul>
                </section>
                <section id="social">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                    </ul>
                </section>
            </footer>
        </div>
        <!-- jQuery first, then Tether, then Bootstrap JS. -->
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                if ($(window).width() <= 770){	
                    $(".navbar").removeClass("navbar-inverse bg-inverse").addClass("navbar-light bg-faded");
                }
            });

            $(window).resize(function(){
                if ($(window).width() <= 770){	
                    $(".navbar").removeClass("navbar-inverse bg-inverse").addClass("navbar-light bg-faded");
                }
                else if($(window).width() > 770){
                    $(".navbar").removeClass("navbar-light bg-faded").addClass("navbar-inverse bg-inverse");
                }
            });
        </script>
        <script>
            $("document").ready(function() {		//invoke function
                init();
            });
        </script>
        <script>
            var humButtonClicked = false;
            $("#humbutton").click(function(){
                if(humButtonClicked == false){
                    $("#mobilemainnav").css("display" , "none");
                    humButtonClicked = true;
                }
                else{
                    $("#mobilemainnav").show();
                    humButtonClicked = false;
                }
            })
        </script>
    </body>
</html>

<?php
	//close DB connection
	mysqli_close($connection);
?>