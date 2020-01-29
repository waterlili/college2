<?php
session_start();
include '../core.php';
echo $_SESSION['image'];
if($_SESSION['login_user']==''){
  header('location:your-custom-404.php');}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="niloufar" >
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.html">

    <title>FlatLab - Flat & Responsive Bootstrap Admin Template</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" class="">
      <!--header start-->
      <header class="header white-bg">
            <div class="sidebar-toggle-box">
                <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
            </div>
            <!--logo start-->
            
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <?php include 'alarm-bar.php';?>
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-nav ">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <?php include('topmenu.php');?>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>
      <!--header end-->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
           <?php include ('side-admin.php');?>
          </div>
      </aside>
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
               <!-- page start-->
                <div class="row">
                    <aside class="profile-nav col-lg-3">
                        <section class="panel">
                            <div class="user-heading round">
                                <a href="#">
                                    <img src="img/profile-avatar.jpg" alt="">
                                </a>
																<?php
																
																$tip =mysqli_query($_SESSION['connect'],"SELECT * FROM users WHERE level='1'");
                                  
																	if (mysqli_num_rows($tip) > 0) {
																		
                                        while($row = mysqli_fetch_assoc($tip)) {
																							echo'<h1>'.$row['Name'].' '.$row['Family'].'</h1>
																							<p>'.$row['email'].'</p>';
																?>
                            </div>

                            <ul class="nav nav-pills nav-stacked">
                                <li class="active"><a href="profile.php"><i class="icon-user"></i>پروفایل</a></li>
                                <!--<li><a href="profile-activity.html"><i class="icon-calendar"></i>Recent Activity <span class="label label-danger pull-right r-activity">9</span></a></li>-->
                                <li><a href="profile-edit.php"><i class="icon-edit"></i>ویرایش پروفایل</a></li>
                            </ul>

                        </section>
                    </aside>
										<?php
										  if(isset($_POST['send'])){
												$message =mysqli_query($_SESSION['connect'],"UPDATE users SET message='".$_POST['think']."' WHERE level='1'");
											}
										?>
                    <aside class="profile-info col-lg-9">
                        <section class="panel">
                            <form method="post">
                                <textarea placeholder="به چه می اندیشی؟" rows="2" class="form-control input-lg p-text-area" name="think"></textarea>
                            
                            <footer class="panel-footer">
                                <input type="submit" name="send" value="ارسال" class="btn btn-danger pull-right" />
                               <ul class="nav nav-pills">
                                    <!-- <li>
                                        <a href="#"><i class="icon-map-marker"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon-camera"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class=" icon-film"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon-microphone"></i></a>
                                    </li>-->
                                </ul>
                            </footer>
														</form>
                        </section>
                        <section class="panel">
                            <div class="bio-graph-heading">
                                <?php
																					
																	       echo $row['message'];
																				 
																				}
																	}
																
																?>
                         
                            </div>
                            <div class="panel-body bio-graph-info">
                                <h1>درباره ی من </h1>
                                <div class="row">
																	<?php
																	    $result =mysqli_query($_SESSION['connect'],"SELECT * FROM users");
                                      if (mysqli_num_rows($result) > 0) {
                                        while($row = mysqli_fetch_assoc($result)) {
                                    echo '<div class="bio-row">
                                        <p><span>نام</span>'.$row['Name'].'</p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>نام خانوادگی </span>'.$row['Family'].'</p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>پیشه </span>'.$row['Job'].'</p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>آدرس ایمیل</span>'.$row['email'].'</p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>شماره تلفن </span>'.$row['phone'].'</p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>شماره موبایل </span>'.$row['Mobile'].'</p>
                                    </div>';}
																		};?>
                                    <!--<div class="bio-row">
                                        <p><span>Mobile </span>: (12) 03 4567890</p>
                                    </div>
                                    <div class="bio-row">
                                        <p><span>Phone </span>: 88 (02) 123456</p>
                                    </div>-->
                                </div>
                            </div>
                        </section>
                       
                    </aside>
                </div>

                <!-- page end-->
          </section>
      </section>
      <!--main content end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="js/owl.carousel.js" ></script>
    <script src="js/jquery.customSelect.min.js" ></script>

    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>

  <script>

      //owl carousel

      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>
  
  </body>
</html>
