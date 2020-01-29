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
                                <li><a href="profile.php"><i class="icon-user"></i>پروفایل</a></li>
                                <!--<li><a href="profile-activity.html"><i class="icon-calendar"></i>Recent Activity <span class="label label-danger pull-right r-activity">9</span></a></li>-->
                                <li class="active"><a href="profile-edit.php"><i class="icon-edit"></i>ویرایش پروفایل</a></li>
                            </ul>

                        </section>
                    </aside>
                    <aside class="profile-info col-lg-9">
                        <section class="panel">
                            <div class="bio-graph-heading">
                             <?php
																					
																	       echo $row['message'];
																				 
																				}
																	}
                                  ?>
                            </div>
                            <?php
                              if($_SERVER["REQUEST_METHOD"] == "POST") {
                                  $name = mysqli_real_escape_string($_SESSION['connect'],$_POST['f-name']);
                                  $lname = mysqli_real_escape_string($_SESSION['connect'],$_POST['l-name']);
                                  $job = mysqli_real_escape_string($_SESSION['connect'],$_POST['job']);
                                  $image = mysqli_real_escape_string($_SESSION['connect'],$_POST['image']);
                                  $email = mysqli_real_escape_string($_SESSION['connect'],$_POST['email']);
                                  $eml = test_input($email);
                                  $phone = mysqli_real_escape_string($_SESSION['connect'],$_POST['phone']);
                                  $mobile = mysqli_real_escape_string($_SESSION['connect'],$_POST['mobile']);
                                  if (!filter_var($eml, FILTER_VALIDATE_EMAIL)) {
                                      $emailErr = "آدرس ایمیل وارد شده اشتباه می باشد.";
                                    }
                              }
                            
                            ?>
                            <div class="panel-body bio-graph-info">
                                <h1>اطلاعات مدیر</h1>
                                <form class="form-horizontal" role="form" action="" method="POST" enctype="multipart/form-data">
                                    <!--<div class="form-group">
                                        <label class="col-lg-2 control-label">About Me</label>
                                        <div class="col-lg-10">
                                            <textarea name="" id="" class="form-control" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>-->
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">نام</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="f-name" name="f-name" placeholder=" ">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">نام خانوادگی</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="l-name" name="l-name" placeholder=" ">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">پیشه</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="job" name="job" placeholder=" ">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                            <label class="col-lg-2 control-label">عکس</label>
                                            <div class="col-lg-6">
                                                <input type="file" class="file-pos" id="image" name="image">
                                            </div>
                                        </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">آدرس ایمیل</label>
                                        <div class="col-lg-6">
                                            <input type="email" class="form-control" id="email" name="email" placeholder=" ">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">شماره تلفن آموزشگاه</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="phone" name="phone" placeholder=" ">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">شماره تلفن همراه</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="mobile" name="mobile" placeholder=" ">
                                        </div>
                                    </div>
                                    <!--<div class="form-group">
                                        <label class="col-lg-2 control-label">Mobile</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="mobile" placeholder=" ">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Website URL</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="url" placeholder="http://www.demowebsite.com ">
                                        </div>
                                    </div>-->

                                    <div class="form-group">
                                        <div class="col-lg-offset-2 col-lg-10">
                                            <button type="submit" class="btn btn-warning" name="edit-pro">ویرایش</button>
                                            <!--<button type="button" class="btn btn-default">Cancel</button>-->
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </section>
                        <section>
                            <div class="panel panel-primary">
                                <div class="panel-heading">تغییر رمز عبور</div>
                                <div class="panel-body">
                                    <form class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">رمز عبور فعلی</label>
                                            <div class="col-lg-6">
                                                <input type="password" class="form-control" id="c-pwd" placeholder=" ">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">رمز جدید</label>
                                            <div class="col-lg-6">
                                                <input type="password" class="form-control" id="n-pwd" placeholder=" ">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">تکرار رمز جدید</label>
                                            <div class="col-lg-6">
                                                <input type="password" class="form-control" id="rt-pwd" placeholder=" ">
                                            </div>
                                        </div>

                                        <!--<div class="form-group">
                                            <label class="col-lg-2 control-label">Change Avatar</label>
                                            <div class="col-lg-6">
                                                <input type="file" class="file-pos" id="exampleInputFile">
                                            </div>
                                        </div>-->

                                        <div class="form-group">
                                            <div class="col-lg-offset-2 col-lg-10">
                                                <button type="submit" class="btn btn-info">ذخیره</button>
                                                <!--<button type="button" class="btn btn-default">Cancel</button>-->
                                            </div>
                                        </div>
                                    </form>
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

  