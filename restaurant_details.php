<?php
include "db.php";
session_start();
if(!isset($_GET['id'])){
  header("location:index.php");
  exit;
}
$res_id=$_GET['id'];
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
</head>

<body>
    <div class="wrapper">
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
    <div id="details_wrapper">

            <div id="details_area">
                <div class="row">
                <div class="well">
                    <div class="row">
                        <div class=col-sm-12 id="res_img">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class=col-sm-12 style="background-color: white;" id="res_heading">

                            </div>
                        </div>
                    </div>
                </div>    
                </div><br>
                <div class="row">
                    <div class="col-sm-4">
                        <div id="side_block">
                            <h2>Delivery Menu</h2>
                            <ul class="list-unstyled">
                                <li>
                                    <h4><span><i class="fas fa-check"></i>&nbsp; </span>Soups</h4>
                                </li>
                                <li>
                                    <h4><span><i class="fas fa-check"></i>&nbsp; </span>Southern Grills: Veg.</h4>
                                </li>
                                <li>
                                    <h4><span><i class="fas fa-check"></i>&nbsp; </span>Southern Grills: Non-Veg.</h4>
                                </li>
                                <li>
                                    <h4><span><i class="fas fa-check"></i>&nbsp; </span>Starters</h4>
                                </li>
                                <li>
                                    <h4><span><i class="fas fa-check"></i>&nbsp; </span>Chinese Starters</h4>
                                </li>
                                <li>
                                    <h4><span><i class="fas fa-check"></i>&nbsp; </span>North Indian Main Course</h4>
                                </li>
                                <li>
                                    <h4><span><i class="fas fa-check"></i>&nbsp; </span>Traditional Telugu Maincourse</h4>
                                </li>
                                <li>
                                    <h4><span><i class="fas fa-check"></i>&nbsp; </span>Indian Breads</h4>
                                </li>
                                <li>
                                    <h4><span><i class="fas fa-check"></i>&nbsp; </span>Rice, Biryani &amp; Pulao</h4>
                                </li>
                                <li>
                                    <h4><span><i class="fas fa-check"></i>&nbsp; </span>Accompaniments</h4>
                                </li>
                                <li>
                                    <h4><span><i class="fas fa-check"></i>&nbsp; </span>Desserts &amp; Beverages</h4>
                                </li>
                            </ul>
            </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="card">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#overview" data-toggle="tab">
                                        <h4>Overview</h4>
                                    </a>
                                </li>
                                <li>
                                    <a href="#reviews" data-toggle="tab">
                                        <h4>Reviews</h4>
                                    </a>
                                </li>
                                <li>
                                    <a href="#gallery" data-toggle="tab">
                                        <h4>Gallery</h4>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="overview"></div>
                                <div class="tab-pane" id="reviews">
                                    <div class="panel panel-body" id="write-review">
                                        <h4>Write a Review</h4>
                                        <form id="review_form">
                                            <input type="hidden" name="uid" class="form-control" id="uid" value="<?php if(isset($_SESSION['user_id'])){echo $_SESSION['user_id'];} else{echo '0';} ?>">
                                            <textarea class="form-control" rows="4" id="feedback" placeholder="Help other foodies by sharing your reviews.."></textarea><br>
                                            <select class="form-control" id="rating" name="rating" style="width:30%;">
                                                <option value="0" selected>Rating</option>
                                                <option value="1">1.0</option>
                                                <option value="1.5">1.5</option>
                                                <option value="2">2.0</option>
                                                <option value="2.5">2.5</option>
                                                <option value="3">3.0</option>
                                                <option value="3.5">3.5</option>
                                                <option value="4">4.0</option>
                                                <option value="4.5">4.5</option>
                                                <option value="5">5.0</option>
                                            </select><br>
                                            <button type="button" class="btn btn-black" id="review_btn">Add Your Review</button><br>
                                            <div class="alert alert-success alert-dismissable" id="review_success">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>  
                                            </div><br>
                                            <div class="alert alert-danger alert-dismissable" id="review_error">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a> 
                                            </div>
                                        </form>
                                    </div>
                                    <div id="review-box">

                                    </div>
                                </div>
                                <div class="tab-pane" id="gallery">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <img src="images/gallery1.jpg" alt="gallery_image" class="img-thumbnail">
                                        </div>
                                        <div class="col-sm-4">
                                            <img src="images/gallery2.jpg" alt="gallery_image" class="img-thumbnail">
                                        </div>
                                        <div class="col-sm-4">
                                            <img src="images/gallery3.jpg" alt="gallery_image" class="img-thumbnail">
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <img src="images/gallery4.jpg" alt="gallery_image" class="img-thumbnail">
                                        </div>
                                        <div class="col-sm-4">
                                            <img src="images/gallery5.jpg" alt="gallery_image" class="img-thumbnail">
                                        </div>
                                        <div class="col-sm-4">
                                            <img src="images/gallery6.jpg" alt="gallery_image" class="img-thumbnail">
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <img src="images/gallery7.jpg" alt="gallery_image" class="img-thumbnail">
                                        </div>
                                        <div class="col-sm-4">
                                            <img src="images/gallery8.jpg" alt="gallery_image" class="img-thumbnail">
                                        </div>
                                        <div class="col-sm-4">
                                            <img src="images/gallery9.jpg" alt="gallery_image" class="img-thumbnail">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div><br>
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

    <script type="text/javascript" src="login.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('nav').addClass('nav_red');
            $("#signup_success,#signup_error,#login_error").hide();
            $('.alert-success,.alert-danger').hide();
            res_id = "<?php echo $res_id ?>";
            var query = "https://developers.zomato.com/api/v2.1/restaurant?res_id=" + res_id;
            $.ajax({
                type: 'GET',
                contentType: "application/json",
                headers: {
                    "user-key": "9faa32cf1e41e5931161689b09ee0969"
                },
                url: query,
                dataType: 'json',
                success: function(response) {
                    $("#res_img").append("<img src='" + response.featured_image + "' alt='restaurant-image' class='img-responsive detail_img'>");
                    $("#res_heading").append("<h2>" + response.name + "</h2><br><strong><h4 style='display:inline-block;'>Location:&nbsp;" + response.location.locality + "</h4><strong><h4>Overall Rating: &nbsp;<span class='badge'>"+response.user_rating.aggregate_rating+"</span><h4>");
                    $("#overview").append("<div class='row'><div class='col-sm-4'><p><strong>Average Cost:</strong></p><p>" + response.average_cost_for_two + "</p></div><div class='col-sm-4'><p><strong>Cuisines:</strong></p><p>" + response.cuisines + "</p></div><div class='col-sm-4'><p><strong>Phone number:</strong></p><p>044 33182535</p></div></div><br><div class='row'><div class='col-sm-4'><p><strong>Table Reservation:</strong></p><p>Facility Avaiable</p></div><div class='col-sm-4'><p><strong>Online Delivery:</strong></p><p>Yes, available</p></div><div class='col-sm-4'><p><strong>Location:</strong></p><p>" + response.location.address + "</p></div></div>");
                },
                error: function(response) {
                    alert("Invalid search!");
                    window.location.href = "index.php";
                }
            });
            $.fn.myfunc();
            

            $("#review_btn").click(function() {
                var uid = $("#uid").val();
                var rating = $("#rating").val();
                if (uid == 0) {
                    $("#login_modal").modal("show");
                } else {
                    var feedback = $("#feedback").val();
                    if(feedback.length==0||rating==0){
                        $("#review_error").empty();
                        $("#review_error").append("<p>Please fill all  the fields!</p>");
                        $("#review_error").show().delay(1000).fadeOut(1500);
                        return false;
                    }
                    $.ajax({
                        type: 'post',
                        url: 'get_feedback.php',
                        data: {
                            'uid': uid,
                            'feedback': feedback,
                            'rating': rating,
                            'res_id': res_id
                        },
                        success: function(response) {
                            console.log(response);
                            if (response == 1) {
                                $("#rating").val("0");
                                $("#feedback").val("");
                                $("#review_success").empty();
                                $("#review_success").append("<p>Review Successfully added!</p>");
                                $("#review_success").show().delay(1000).fadeOut(1500);
                                $("#review-box").empty();
                                $.fn.myfunc();
                            } else {
                                $("#review_error").empty();
                                $("#review_error").append("<p>Error in adding review!</p>");
                                $("#review_error").show().delay(1000).fadeOut(1500);
                            }
                        },
                        error: function(response) {
                            console.log(response);
                        }
                    });
                }
            });

            $(".menu-icon").on("click", function() {
                $("nav ul").toggleClass("showing");
            });
        });
        $.fn.myfunc = function() {
            $.ajax({
                type: 'GET',
                url: 'get_feedback.php',
                data: {
                    'id': res_id
                },
                dataType: "json",
                success: function(response) {
                    if (response.length > 0) {
                        $.each(response, function(i, k) {
                            if(i==0){
                                $("#review-box").append("<div class='review-list' id=review-" + response[i].id + "><h2 class=text-center> User Review's</h2><div class='clearfix'><div class='pull-left'><h5><i class='fa fa-calendar'></i>&nbsp;&nbsp;" + response[i].date + "</h5><strong><h5>" + response[i].username + "</h5></strong><ul class='list-unstyled list-inline rating-star-list' id=rating-" + response[i].id + "></ul></div><img src='images/review-img.png' alt='Image' class='img-responsive pull-right'></div><div class='review-list-content'><h5>" + response[i].feedback + "</h5></div></div></div>");
                            }
                            else{
                                $("#review-box").append("<div class='review-list' id=review-" + response[i].id + "><div class='clearfix'><div class='pull-left'><h5><i class='fa fa-calendar'></i>&nbsp;&nbsp;" + response[i].date + "</h5><h5>" + response[i].username + "</h5><ul class='list-unstyled list-inline rating-star-list' id=rating-" + response[i].id + "></ul></div><img src='images/review-img.png' alt='Image' class='img-responsive pull-right'></div><div class='review-list-content'><h5>" + response[i].feedback + "</h5></div></div></div>");
                            }
                            var rate = response[i].rating;
                            var len = rate / 1,
                                rem = rate % 1;
                            for (var k = 1; k <= len; k++) {
                                $("#rating-" + response[i].id).append("<li><i class='fa fa-star'></i></li>");
                            }
                            if (rem != 0) {
                                $("#rating-" + response[i].id).append("<li><i class='fa fa-star-half'></i></li>");
                                len++;
                            }

                            for (var k = len; k < 5; k++) {
                                $("#rating-" + response[i].id).append("<li><i class='fa fa-star fa-star-o'></i></li>");
                            }
                        });
                    } else {
                        $("#review-box").append("<h3 class='text-center'>Be the first to write review about this restaurant!</h3>");
                    }
                },
                error: function(response) {
                    console.log(response);
                }
            });
        };
    </script>

</body>

</html>