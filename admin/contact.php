<?php
session_start();
include '../../core.php';
echo $_SESSION['image'];
ob_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
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
                    <li>
                        <input type="text" class="form-control search" placeholder="Search">
                    </li>
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="img/avatar1_small.jpg">
                            <span class="username"><?php echo $_SESSION['login_user'];?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout" style="right: 0px;">
                            <div class="log-arrow-up"></div>
                            <li><a href="#"><i class=" icon-suitcase"></i>پروفایل</a></li>
                            <li><a href="#"><i class="icon-cog"></i> تنظیمات</a></li>
                            <li><a href="#"><i class="icon-bell-alt"></i> اعلام ها</a></li>
                            <li><a href="logout.php"><i class="icon-key"></i> خروج</a></li>
                        </ul>
                    </li>
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
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                               لیست تماس های اخیر
                         
                            </header>
                            <table class="table table-striped table-advance table-hover">
                                <thead>
                                    <tr>
                                        <th><i class="icon-bullhorn"></i>&nbsp;موضوع پیام</th>
                                        <th class="hidden-phone"><i class="icon-envelope-alt"></i>&nbsp;آدرس ایمیل</th>
                                        <th><i class="icon-file-text-alt"></i>&nbsp;متن پیام</th>
                                        <th>وضعیت پیام</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                 <?php
                                    session_start();
                                    include '../core.php';
                                          $result =mysqli_query($_SESSION['connect'],"SELECT * FROM `contact`");
                                          if (mysqli_num_rows($result) > 0) {
                                           while($row = mysqli_fetch_assoc($result)) {
                                           echo '<tr>
                                                <td><a href="#">'. $row["subject"].' </a></td>
                                                <td class="hidden-phone">'. $row["email"].'</td>
                                                <td>'.$row["text"].' </td>
                                                <td><span class="label label-info label-mini">'. $row["status"].'</span></td>
                                                <td>
                                                   
                                                    <button class="btn btn-success btn-xs ckbutton" id="'.$row['id'].'"><i class="icon-ok"></i></button>
                                                    <button class="btn btn-danger btn-xs delbutton" id="'.$row['id'].'" ><i class="icon-trash "></i></button>
                                                    
                                                </td>
                                            </tr>';
                                           }
                                          }
                                          
                                    
                                    ?>
                                       <!--<tr><td>".$result['first_name']."</td><td>".$result['last_name']."</td><td><button class=\"btn btn-sm btn-danger delete_class\" id=\"".$result['id']."\" >DELETE</button></td></tr>-->
                                    <!--<tr>
                                        <td>
                                            <a href="#">Adimin co
                                      </a>
                                        </td>
                                        <td class="hidden-phone">Lorem Ipsum dorolo</td>
                                        <td>56456.00$ </td>
                                        <td><span class="label label-warning label-mini">Due</span></td>
                                        <td>
                                            <button class="btn btn-success btn-xs"><i class="icon-ok"></i></button>
                                            <button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button>
                                            <button class="btn btn-danger btn-xs"><i class="icon-trash "></i></button>
                                        </td>
                                    </tr>-->
                                    
                                </tbody>
                            </table>
                        </section>
                    </div>
                </div>
                <!-- page end-->
            </section>
        </section>
        <!--main content end-->
    </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="js/common-scripts.js"></script>
    <script type="text/javascript" >
        /*$(function() {

            $(".delbutton").click(function() {
                var del_id = $(this).attr("id");
                //var $ele = $(this).parent().parent();
               // var info = 'id=' + del_id;
                if (confirm("Sure you want to delete this post? This cannot be undone later.")) {
                    $.ajaxSetup({ cache: false });
                    $.ajax({
                        type : "post",
                        data : {'del_id':del_id},
                        cache: false,
                        url : "delete_entry.php", //URL to the delete php script
                        dataType: 'json',
                       success: function(data){
                            if(data=="YES"){
                                //$ele.fadeOut().remove();
                                window.location.reload();
                             }else{
                                    alert("امکان حذف وجود ندارد");
                             }
                         }
                    });
                    
                }
                return false;
            });
        });*/
         var $tr = $(this).attr('parentElement');

        $('.delbutton').click(function(){
            var del_id= $('.delbutton').attr('id');
            $.ajax({
                url:"delete_entry.php?delete_id="+del_id,
                cache:false,
                success:function(result){
                    window.location.reload();
                    $tr.find('td').fadeOut(1000,function(){
                        $tr.remove();
                    });
                }
            });
        });
        $('.ckbutton').click(function(){
            var ck_id= $('.ckbutton').attr('id');
            $.ajax({
                url:"delete_entry.php?check_id="+ck_id,
                cache:false,
                success:function(result){
                    window.location.reload();
                    $tr.find('td').fadeOut(1000,function(){
                       // $tr.remove();
                    });
                }
            });
        });
 </script>
</script>
</body>
</html>


