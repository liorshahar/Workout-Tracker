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
<html lang="en">

    <head>
        <title>Trainee Login</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="includes/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <link rel="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/5.1.1/bootstrap-social.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>



        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
        <script src="includes/jquery-3.2.1.min.js"></script>
        <script src="includes/script.js"></script>

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
                                echo  $_SESSION['user_id'];
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
                            <a class="nav-link selected" id="selected" href="traineelogin.php">DASHBOARD</a>
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
                            <a class="nav-link" href="myplan.php">  <span class="fa fa-send"></span>
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
            <main>
                <nav id="mobilemainnav">
                    <div>
                        <ul>
                            <li >
                                <a class="nav-link"  href="#">WORKOUT</a>
                            </li>
                            <li >
                                <a class="nav-link mobileselcted" href="myplan.php">MY PLAN</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <h1>Training Progress</h1>
                <section id="options">
                    <a href="update measure.php" class="btn btn-primary" role="button">Update Measure</a>
                    <a href="#" class="btn btn-warning" role="button">Tracking Measure</a>
                    <a href="traineechangeprogram.php" class="btn btn-primary" role="button">Change Workout</a>

                </section>
                <form id="rangeselect" action="#" method="get">
                    <button class="btn btn-success" role="button" id="7daysbutton" type="submit">Last 7 Days </button>
                    <button class="btn btn-success" role="button" id="monthbutton" type="submit">Last Month </button>
                    <section>
                        <h5>Custom range :</h5>
                        <div class="form-group row">
                            <label class="col-2 col-form-label">From: </label>
                            <div class="col-10">
                                <input class="form-control" type="date" value="2017-06-01" name="from">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-2 col-form-label">To:</label>
                            <div class="col-10">
                                <input class="form-control" type="date" value="2017-06-01" name="to">
                            </div>
                        </div>
                        <button class="btn btn-info btn-block">Show</button>
                    </section>						    										
                </form>
                <article id="chart-container">
                    <!---- here goes the graph -->

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
                showTraineeGraph();
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
        <script>			
            $("button").click(function(e){
                var idClicked = e.target.id;
                if (idClicked == '7daysbutton'){
                    showTraineeGraph();	
                }
                else if (idClicked == 'monthbutton'){
                    show30daysGraph();	
                }
            });
        </script>
    </body>
</html>

<?php
//close DB connection	
mysqli_close($connection);
?>










