<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Deliccio</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style1.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
</head>

<body>
    <div class="wrap">
        <header>
            <nav>
                <div class="menu-icon">
                    <i class="fa fa-bars fa-2x"></i>
                </div>
                <div class="logo">
                    <img src="images/logo.png" class="img-responsive">
                </div>
                <div class="menu">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <?php 
                            if(!isset($_SESSION['isLogin'])){
                                echo"<li id='nav_signup'><a href='#'' data-toggle='modal' data-target='#signup_modal'>Sign Up</a></li>
                                <li id='nav_login'><a href='#'' data-toggle='modal' data-target='#login_modal'>Login</a></li>";
                            }else{
                                echo"<li id='nav_logout'><a href='logout.php'>Logout</a></li>";
                            }
                        ?>

                    </ul>
                </div>
            </nav>
            <div class="panel panel-default" id="search_area">
                <div classs="panel-body">
                    <form action="restaurant_list.php" method="get">
                        <h3 class="text-center">Find the best Restaurants, Cafes & Cuisine here!..</h3>
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-university"></i></span>
                            <select class="form-control" id="city" name="city" required>
                                <option value="0" selected>Select City</option>
                                <option value="7">Chennai</option>
                                <option value="4">Bangalore</option>
                                <option value="1">Hyderabad</option>
                            </select>
                        </div>
                        <br>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-utensils"></i></span>
                            <input type="text" name="search_hotel" id="search_hotel" class="form-control" placeholder="Search Restaurant.." required>
                        </div>
                        <br>
                        <br>
                        <button type="submit" name="btn" class="btn btn-primary btn-block">Search!</button>
                    </form>
                </div>
            </div>
        </header><br><br>
        <div class="container">
            <section class="welcome section">
                <div class="row">
                    <div class="col-lg-5 col-sm-6 col-xs-12">
                        <div class="welcome-box text-center">
                            <h1 style="color:#c0392b;">Welcome To Deliccio!</h1>
                            <b><p>Food is the ingredient that binds us together</p></b><br>
                            <h4 style="text-align: justify;line-height: 38px;">
                                Deliccio is the one point destination for all foodies. One can find best restaurants, cafes and cuisines all over the world. A heavenly meal is the which excites man.Having such an heavenly meal refreshes soul and deliccio offer this. People who love to eat are always the best people. Add user reviews and help other foodies to choose best restaurant in the city!
                            </h4>
                            <button class="text-center  btn btn-danger btn-lg">Have Fun!</button>
                        </div>
                    </div>
                    <div class="col-lg-7 col-sm-6 col-xs-12">
                        <img src="images/welcome-img1.jpg" alt="Welcome" class="img-responsive img-center">
                    </div>
                </div>
            </section>
            <div class="food-menu-grid row text-center">
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="hover-content">
                        <img src="images/menu9.jpg" alt="chinese" class="img-responsive ">
                        <div class="overlay">
                            <h4 class="text-uppercase">Chinese</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="hover-content">
                        <img src="images/menu7.jpg" alt="Indian" class="img-responsive ">
                        <div class="overlay">
                            <h4 class="text-uppercase">Indian</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="hover-content">
                        <img src="images/menu6.jpg" alt="italian" class="img-responsive ">
                        <div class="overlay">
                            <h4 class="text-uppercase">Italian</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="hover-content">
                        <img src="images/menu8.jpg" alt="continental" class="img-responsive ">
                        <div class="overlay">
                            <h4 class="text-uppercase">Continental</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="hover-content">
                        <img src="images/menu3.jpg" alt="thai" class="img-responsive ">
                        <div class="overlay">
                            <h4 class="text-uppercase">Thai</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="hover-content">
                        <img src="images/menu4.jpg" alt="sushi" class="img-responsive ">
                        <div class="overlay">
                            <h4 class="text-uppercase">Sushi</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="hover-content">
                        <img src="images/menu5.jpg" alt="Pizza" class="img-responsive ">
                        <div class="overlay">
                            <h4 class="text-uppercase">Pizza &amp; Burgers</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="hover-content">
                        <img src="images/menu1.jpg" alt="Veggies" class="img-responsive ">
                        <div class="overlay">
                            <h4 class="text-uppercase">Pure Veggies</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="hover-content">
                        <img src="images/menu2.jpg" alt="tiffins &amp; breakfast" class="img-responsive ">
                        <div class="overlay">
                            <h4 class="text-uppercase">Tiffins &amp; Breakfast</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="container-fluid">
            <ul class="list-unstyled list-inline text-center">
                <li>
                    <a href="#" class="btn btn-danger">
                                    <i class="fab fa-twitter"></i>
                                </a>
                </li>
                <li>
                    <a href="#" class="btn btn-danger">
                                    <i class="fab fa-facebook"></i>
                                </a>
                </li>
                <li>
                    <a href="#" class="btn btn-danger">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                </li>
                <li>
                    <a href="#" class="btn btn-danger">
                                    <i class="fab fa-skype"></i>
                                </a>
                </li>
                <li>
                    <a href="#" class="btn btn-danger">
                                    <i class="fab fa-pinterest"></i>
                                </a>
                </li>
            </ul>
            <center><b><p>© Deliccio 2018</p></b></center>
            <center><b><p>Handcrafted by Sandeep Kumar</p></b></center>
        </footer>
    </div>

    <div class="modal fade" id="login_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center">Login to Deliccio</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="well">
                                <form id="login_form" method="POST" action="/login/">
                                    <div class="form-group">
                                        <label for="mobno" class="control-label">Mobile No:</label>
                                        <input type="text" class="form-control" id="mobno" name="mobno" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="pass" class="control-label">Password:</label>
                                        <input type="password" class="form-control" id="pass" name="pass" required>
                                    </div>
                                    <div id="login_error" class="alert alert-danger">Invalid Login Credentials!</div>
                                    <div class="checkbox">
                                        <label>
                                      <input type="checkbox" name="remember" id="remember"> Remember login
                                  </label>
                                    </div>
                                    <button type="button" id="login_btn" class="btn btn-success btn-block">Login</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <p class="lead">Register now for <span class="text-success">FREE</span></p>
                            <ul class="list-unstyled" style="line-height: 2">
                                <li><span class="fa fa-check text-success"></span>&nbsp;Catch best Restaurants</li>
                                <li><span class="fa fa-check text-success"></span>&nbsp;Brisk breakfast</li>
                                <li><span class="fa fa-check text-success"></span>&nbsp;Yummy lunch</li>
                                <li><span class="fa fa-check text-success"></span>&nbsp;Heavenly dinner</li>
                                <li><span class="fa fa-check text-success"></span>&nbsp;All in one site!</li>
                            </ul>
                            <p><a href="#" class="btn btn-info btn-block" data-dismiss="modal" data-toggle="modal" data-target="#signup_modal">Yes please, register now!</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="signup_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text-center">Register at Deliccio</h4>
                </div>
                <div class="modal-body">
                    <div class="well">
                        <form id="signup_form" class="form-horizontal" method="POST" action="">
                            <div class="form-group">
                                <label for="password" class="control-label col-sm-2">Mobile No:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="mobile" name="mobile" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username" class="control-label col-sm-2">Username:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="control-label col-sm-2">Password:</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="cpassword" class="control-label col-sm-2">Confirm Password:</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="cpassword" name="cpassword" required>
                                </div>
                            </div>
                            <div id="signup_success" class="alert alert-success"></div>
                            <div id="signup_error" class="alert alert-danger"></div>
                            <button type="button" id="signup_btn" class="btn btn-success">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="login.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#signup_success,#signup_error,#login_error").hide();
            $(".menu-icon").on("click", function() {
                $("nav ul").toggleClass("showing");
            });
            $(window).on("scroll", function() {
                if ($(window).scrollTop()) {
                    $('nav').addClass('nav_red');
                } else {
                    $('nav').removeClass('nav_red');
                }
            })
        });
      
    </script>

</body>

</html>