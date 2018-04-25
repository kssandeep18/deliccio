<?php
session_start();
if(isset($_GET['city']) && isset($_GET['search_hotel'])){
  $city=$_GET['city'];
  $search_text=$_GET['search_hotel'];  
}else{
  header("location:index.php");
  exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Deliccio</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/style1.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
     <script type="text/javascript" src="login.js"></script>
</head>

<body>
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
    <div class="container">
        <div id="list_area"></div>
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
                                        <input type="text" class="form-control" id="mobno" name="mobno" autocomplete="off" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="pass" class="control-label">Password:</label>
                                        <input type="password" class="form-control" id="pass" name="pass" autocomplete="off" required>
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
                        <form id="signup_form" class="form-horizontal" method="POST" action="/login/">
                            <div class="form-group">
                                <label for="password" class="control-label col-sm-2">Mobile No:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="mobile" name="mobile" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username" class="control-label col-sm-2">Username:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="username" name="username" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="control-label col-sm-2">Password:</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="password" name="password" autocomplete="off" required>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="cpassword" class="control-label col-sm-2">Confirm Password:</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="cpassword" name="cpassword" autocomplete="off" required>
                                </div>
                            </div>
                            <div id="signup_success" class="alert alert-success">Registration Successfull!</div>
                            <div id="signup_error" class="alert alert-danger">Registration Failed!</div>
                            <button type="button" id="signup_btn" class="btn btn-success">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('nav').addClass('nav_red');
             $("#signup_success,#signup_error,#login_error").hide();
            $(".menu-icon").on("click", function() {
                $("nav ul").toggleClass("showing");
            });
            var city = "<?php echo $city ?>";
            var search_text = "<?php echo $search_text ?>";
            var query = "https://developers.zomato.com/api/v2.1/search?entity_id=" + city + "&entity_type=city&q=" + search_text;
            $.ajax({
                type: 'GET',
                contentType: "application/json",
                headers: {
                    "user-key": "9faa32cf1e41e5931161689b09ee0969"
                },
                url: query,
                dataType: 'json',
                success: function(response) {
                    if (response.restaurants.length > 0) {
                        $.each(response.restaurants, function(i, k) {
                            $("#list_area").append("<div class='row'><div class='col-sm-12'><div class='panel panel-default'><a class='unhighlight' href='restaurant_details.php?id=" + response.restaurants[i].restaurant.R.res_id + "'><div class='panel-heading'><div class='row'><div class='col-xs-6'><img src='" + response.restaurants[i].restaurant.thumb + "'class='img-thumbnail' alt='restaurant_thumbnail' id='list_thumb'></div><div class='col-xs-6'><h2 style='color:#c0392b;'>" + response.restaurants[i].restaurant.name + "</h2></a><h5 style='font-weight:bold;'>" + response.restaurants[i].restaurant.location.locality + "<h5><br><p>" + response.restaurants[i].restaurant.location.address + "</p></div></div></div><div class='panel-body'><div class='row'><div class='col-xs-6'><p>Cusines:</p></div><div class='col-xs-6'><p>" + response.restaurants[i].restaurant.cuisines + "</p></div></div><div class='row'><div class='col-xs-6'><p>Cost for two:</p></div><div class='col-xs-6'><p>₹" + response.restaurants[i].restaurant.average_cost_for_two + "</p></div></div><div class='row'><div class='col-xs-6'><p>Hours:</p></div><div class='col-xs-6'><p>12Noon to 3:30PM, 7PM to 10:30PM (Mon, Tue, Wed.</p></div></div></div></div></div></div>");
                        });
                    } else {
                        $(".panel-group").append("<h2>No Results Found!</h2><br/>");
                    }
                },
                error: function(response) {
                    console.log(response);
                }
            });
        });
    </script>
</body>

</html>