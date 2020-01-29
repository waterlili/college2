<!DOCTYPE html>
      <script type='text/javascript'>
      var isCtrl = false;
      document.onkeyup=function(e)
      {
          if(e.which == 17)
          isCtrl=false;
      }
      document.onkeydown=function(e)
      {
          if(e.which == 17)
          isCtrl=true;
          if((e.which == 85) || (e.which == 67) && (isCtrl == true))
          {
              return false;
          }
      }
      var isNS = (navigator.appName == "Netscape") ? 1 : 0;
      if(navigator.appName == "Netscape") document.captureEvents(Event.MOUSEDOWN||Event.MOUSEUP);
      function mischandler(){
          return false;
      }
      function mousehandler(e){
          var myevent = (isNS) ? e : event;
          var eventbutton = (isNS) ? myevent.which : myevent.button;
          if((eventbutton==2)||(eventbutton==3)) return false;
      }
      document.oncontextmenu = mischandler;
      document.onmousedown = mousehandler;
      document.onmouseup = mousehandler;
      </script>
<html lang="fa" dir="rtl">
<head>
<meta charset="UTF-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>آموزشگاه هنر</title>

<!-- Google fonts -->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
<!-- font awesome-->
<link rel="stylesheet" href="assets/fontawesome/css/font-awesome.min.css">
<!-- bootstrap -->
<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />

<!-- animate.css -->
<link rel="stylesheet" href="assets/animate/animate.css" />
<link rel="stylesheet" href="assets/animate/set.css" />

<!-- gallery -->
<link rel="stylesheet" href="assets/gallery/blueimp-gallery.min.css">

<!-- favicon -->
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">


<link rel="stylesheet" href="assets/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<div class="topbar animated fadeInLeftBig"></div>

<!-- Header Starts -->
<div class="navbar-wrapper">
      <div class="container">

        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="top-nav">
          <div class="container">
            <div class="navbar-header">
              <!-- Logo Starts -->
              <a class="navbar-brand" href="#home"><!--<img src="images/logo.png" alt="logo">-->لوگوی آموزشگاه</a>
              <!-- #Logo Ends -->


              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

            </div>


            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">
              <ul class="nav navbar-nav navbar-right scroll">
                 <li class="active"><a href="#home">خانه</a></li>
                 <li ><a href="#about">درباره ما</a></li>
                 <li ><a href="#works">نمونه کارها</a></li>
                 <li ><a href="#works">نمونه کارهای استاد</a></li>
                 <li ><a href="#contact">تماس با ما</a></li>
              </ul>
            </div>
            <!-- #Nav Ends -->

          </div>
        </div>

      </div>
    </div>
<!-- #Header Starts -->




<div id="home">
<!-- Slider Starts -->
<div id="myCarousel" class="carousel slide banner-slider animated bounceInDown" data-ride="carousel">     
      <div class="carousel-inner">
        <!-- Item 1 -->
        <?php
            
            $dirname = "admin/slide/";
            $images = array();
            $images = glob($dirname."*.{jpg,png,gif}", GLOB_BRACE);
            $j=0;
            foreach($images as $image) {
                  $j++;
                  
            //echo '<div class="item active"><img src="'.$image.'" /><br /></div>';
            }
            if($images[0]){
              echo '<div class="item active"><img src="'.$image.'" /><br /></div>';    
            }
            for($i=1;$i<=$j;$i++){
               foreach($images as $image) {
                echo '<div class="item"><img src="'.$image.'"  width="1900px" height="900px"/><br /></div>';   
               }    
            }
           
            
           
            
        ?>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon-chevron-left"><i class="fa fa-angle-left"></i></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon-chevron-right"><i class="fa fa-angle-right"></i></span></a>
    </div>
<!-- #Slider Ends -->
</div>









<!-- Cirlce Starts -->
<div id="about"  class="container spacer about">
<h2 class="text-center wowload fadeInUp">درباره ی آموزشگاه</h2>
<?php
session_start();
include 'core.php';
$res =mysqli_query($_SESSION['connect'],"SELECT * FROM `aboutus`");
if (mysqli_num_rows($res) > 0) {
$row = mysqli_fetch_assoc($res);
echo
 '<div class="row">
  <div class="col-sm-6 wowload fadeInLeft">
    <h4><i class="fa fa-pencil" aria-hidden="true"></i> معرفی نامه </h4>
    <p>'.$row['moarefi'].'</p>
    

  </div>
  <div class="col-sm-6 wowload fadeInRight">
  <h4><i class="fa fa-coffee"></i> توضیحات بیشتر</h4>
   <p>'.$row['tozih'].'</p>
  </div>
  </div>';
 
}
 ?>

  <div class="services">
  <h3 class="text-center wowload fadeInUp">لیست دوره ها</h3>
	<ul class="row text-center list-inline  wowload bounceInUp" id="variety">
   		<li id="first-child">
            <span><a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil" aria-hidden="true"></i><b>طراحی</b></a></span>
            <!-- Trigger the modal with a button -->
            <!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>-->
        </li>
            <!-- Modal -->
 

        <li id="second-child">
            <span><a href="#" data-toggle="modal" data-target="#myModal1"><i class="fa fa-paint-brush" aria-hidden="true"></i><b>تکنیک</b></a></span>
        </li>
        <li id="third-child">
            <span><a href="#" data-toggle="modal" data-target="#myModal2"><i class="fa fa-eraser" aria-hidden="true"></i><b>مبانی هنرهای تجسمی</b></a></span>
        </li>
        <li id="forth-child">
            <span><a href="#" data-toggle="modal" data-target="#myModal3"><i class="fa fa-umbrella"></i><b>کودکان</b></a></span>
        </li>        
        <!--<li id="fifth-child">
            <span><i class="fa fa-magic" aria-hidden="true"></i><b>پاستل</b></span>
        </li>-->
  	</ul>
  </div>
</div>
<!-- #Cirlce Ends -->
 <?php
 $goal =mysqli_query($_SESSION['connect'],"SELECT * FROM `courses` WHERE `c-id`='1'");
if (mysqli_num_rows($goal) > 0) {
$rw = mysqli_fetch_assoc($goal);
                       echo '<div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                            
                              <!-- Modal content-->
                             
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" style="float: left;">&times;</button>
                                  <h4 class="modal-title">'.$rw['c-topic'].'</h4>
                                </div>
                                <div class="modal-body">
                                  <p>'.$rw['c-desc'].'</p>
                                </div>
                                <div class="modal-footer">
                                 <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                                </div>
                              </div>
                              
                            </div>
                          </div>';
                          }?>
<?php
 $goal =mysqli_query($_SESSION['connect'],"SELECT * FROM `courses` WHERE `c-id`='2'");
if (mysqli_num_rows($goal) > 0) {
$rw = mysqli_fetch_assoc($goal);
                       echo '<div class="modal fade" id="myModal1" role="dialog">
                                <div class="modal-dialog">
                                
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" style="float: left;">&times;</button>
                                      <h4 class="modal-title">'.$rw['c-topic'].'</h4>
                                    </div>
                                    <div class="modal-body">
                                      <p>'.$rw['c-desc'].'</p>
                                    </div>
                                    <div class="modal-footer">
                                     <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                                    </div>
                                  </div>
                                  
                                </div>
                              </div>';
 }?>
<?php
 $goal =mysqli_query($_SESSION['connect'],"SELECT * FROM `courses` WHERE `c-id`='3'");
if (mysqli_num_rows($goal) > 0) {
$rw = mysqli_fetch_assoc($goal);                            
                              echo '<div class="modal fade" id="myModal2" role="dialog">
                                <div class="modal-dialog">
                                
                                  <!-- Modal content-->
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" style="float: left;">&times;</button>
                                      <h4 class="modal-title">'.$rw['c-topic'].'</h4>
                                    </div>
                                    <div class="modal-body">
                                      <p>'.$rw['c-desc'].'</p>
                                    </div>
                                    <div class="modal-footer">
                                     <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                                    </div>
                                  </div>
                                  
                                </div>
                              </div>';
 }?>
<?php
 $goal =mysqli_query($_SESSION['connect'],"SELECT * FROM `courses` WHERE `c-id`='4'");
if (mysqli_num_rows($goal) > 0) {
$rw = mysqli_fetch_assoc($goal);                            
                              echo '<div class="modal fade" id="myModal3" role="dialog">
                                          <div class="modal-dialog">
                                          
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" style="float: left;">&times;</button>
                                                <h4 class="modal-title">'.$rw['c-topic'].'</h4>
                                              </div>
                                              <div class="modal-body">
                                                <p>'.$rw['c-desc'].'</p>
                                              </div>
                                              <div class="modal-footer">
                                               <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                                              </div>
                                            </div>
                                            
                                          </div>
                                        </div>';
}?>

<!-- works -->
<div id="works"  class=" clearfix grid"> 
    <figure class="effect-oscar  wowload fadeInUp">
        <?php
                        $maindir = "admin/slide/technic" ;
				$mydir = opendir($maindir) ;
				$files = array();
				$exclude = array( ".", "..", "index.php",".htaccess") ;
				while($fn = readdir($mydir))
				{
								if (!in_array($fn, $exclude)) 
								{
												$files[] = $fn;
												
								}
				}
                        
        echo '<img src="'.$maindir.'/'.$files[0].'" alt="img01"/>';
      ?>
        <figcaption>
            <h2>تکنیک بچه های کلاس</h2>
            <p><br>
            <a href="lightGallery/demo/index.php?user=tech" title="1" >نمونه های بیشتر</a></p>            
        </figcaption>
    </figure>
     <figure class="effect-oscar  wowload fadeInUp">
         <?php
                        $maindir = "admin/slide/tarahi" ;
				$mydir = opendir($maindir) ;
				$files = array();
				$exclude = array( ".", "..", "index.php",".htaccess") ;
				while($fn = readdir($mydir))
				{
								if (!in_array($fn, $exclude)) 
								{
												$files[] = $fn;
												
								}
				}
                        
        echo '<img src="admin/slide/tarahi/'.$files[0].'" alt="img01"/>';
      ?>
        <figcaption>
            <h2>طراحی</h2>
            <p><br>
            <a href="lightGallery/demo/index.php?user=tarah" title="1" >نمونه های بیشتر</a></p>            
        </figcaption>
    </figure>
     <figure class="effect-oscar  wowload fadeInUp">
      <?php
                        $maindir = "admin/slide/myworks" ;
				$mydir = opendir($maindir) ;
				$files = array();
				$exclude = array( ".", "..", "index.php",".htaccess") ;
				while($fn = readdir($mydir))
				{
								if (!in_array($fn, $exclude)) 
								{
												$files[] = $fn;
												
								}
				}
                        
        echo '<img src="admin/slide/myworks/'.$files[0].'" alt="img01"/>';
      ?>
        
        <figcaption>
            <h2>کارهای استاد</h2>
            <p><br>
            <a href="lightGallery/demo/index.php?user=ostad" title="1" >نمونه های بیشتر</a></p>            
        </figcaption>
    </figure>
     <figure class="effect-oscar  wowload fadeInUp">
        <?php
                        $maindir = "admin/slide/sier" ;
				$mydir = opendir($maindir) ;
				$files = array();
				$exclude = array( ".", "..", "index.php",".htaccess") ;
				while($fn = readdir($mydir))
				{
								if (!in_array($fn, $exclude)) 
								{
												$files[] = $fn;
												
								}
				}
                        
        echo '<img src="admin/slide/sier/'.$files[0].'" alt="img01"/>';
      ?>
        
        <figcaption>
            <h2>متفرقه</h2>
            <p><br>
            <a href="lightGallery/demo/index.php?user=sier" title="1">نمونه های بیشتر</a></p>            
        </figcaption>
    </figure>
     <figure class="effect-oscar  wowload fadeInUp">
         <?php
                        $path1 = "admin/slide/koodakan" ;
				$dir1 = opendir($path1) ;
				$koodaks = array();
				$exclude2 = array( ".", "..", "index.php",".htaccess") ;
				while($fk = readdir($dir1))
				{
								if (!in_array($fk, $exclude2)) 
								{
									$koodaks[] = $fk;
												
								}
				}
                        
        echo '<img src="'.$path1.'/'.$koodaks[0].'" alt="img01"/>';
        ?>
        <figcaption>
            <h2>کودکان</h2>
            <p><br>
            <a href="lightGallery/demo/index.php?user=koodak" title="1">نمونه های بیشتر</a></p>            
        </figcaption>
    </figure>
     
     <figure class="effect-oscar  wowload fadeInUp">
         <?php
                        $path = "admin/slide/tajasomi" ;
				$dir = opendir($path) ;
				$tajasoms = array();
				$exclude1 = array( ".", "..", "index.php",".htaccess") ;
				while($ft = readdir($dir))
				{
								if (!in_array($ft, $exclude1)) 
								{
												$tajasoms[] = $ft;
												
								}
				}
                        
        echo '<img src="'.$path.'/'.$tajasoms[0].'" alt="img01"/>';
      ?>
        <figcaption>
            <h2>هنرهای تجسمی</h2>
            <p><br>
            <a href="lightGallery/demo/index.php?user=tajasom" title="1">نمونه های بیشتر</a></p>            
        </figcaption>
    </figure>
    <!--<figure class="effect-oscar  wowload fadeInUp">
        <img src="images/portfolio/7.jpg" alt="img01"/>
        <figcaption>
            <h2>Chinese</h2>
            <p>Lily likes to play with crayons and pencils<br>
            <a href="images/portfolio/7.jpg" title="1" data-gallery>View more</a></p>            
        </figcaption>
    </figure>
    <figure class="effect-oscar  wowload fadeInUp">
        <img src="images/portfolio/8.jpg" alt="img01"/>
        <figcaption>
            <h2>Dicrap</h2>
            <p>Lily likes to play with crayons and pencils<br>
            <a href="images/portfolio/8.jpg" title="1" data-gallery>View more</a></p>            
        </figcaption>
    </figure>
    <figure class="effect-oscar  wowload fadeInUp">
        <img src="images/portfolio/9.jpg" alt="img01"/>
        <figcaption>
            <h2>Coffee</h2>
            <p>Lily likes to play with crayons and pencils<br>
            <a href="images/portfolio/9.jpg" title="1" data-gallery>View more</a></p>            
        </figcaption>
    </figure>
    <figure class="effect-oscar  wowload fadeInUp">
        <img src="images/portfolio/10.jpg" alt="img01"/>
        <figcaption>
            <h2>cameras</h2>
            <p>Lily likes to play with crayons and pencils<br>
            <a href="images/portfolio/10.jpg" title="1" data-gallery>View more</a></p>            
        </figcaption>
    </figure>
    <figure class="effect-oscar  wowload fadeInUp">
        <img src="images/portfolio/11.jpg" alt="img01"/>
        <figcaption>
            <h2>design</h2>
            <p>Lily likes to play with crayons and pencils<br>
            <a href="images/portfolio/11.jpg" title="1" data-gallery>View more</a></p>            
        </figcaption>
    </figure>
    <figure class="effect-oscar  wowload fadeInUp">
        <img src="images/portfolio/12.jpg" alt="img01"/>
        <figcaption>
            <h2>studio</h2>
            <p>Lily likes to play with crayons and pencils<br>
            <a href="images/portfolio/12.jpg" title="1" data-gallery>View more</a></p>            
        </figcaption>
    </figure>-->
    

     
</div>
<!-- works -->


<div id="partners" class="container spacer ">
	
  <div class="clearfix">
    
    <div class="col-sm-6 col-xs-12">
    <h2 class="text-center  wowload fadeInUp"><i class="fa fa-commenting-o" aria-hidden="true"></i>&nbsp;سخنان هنرمندان بزرگ</h2>

    <div id="carousel-testimonials" class="carousel slide testimonails  wowload fadeInRight" data-ride="carousel">
    <div class="carousel-inner">  
      
     <?php $dirname = "admin/slide/bozorgan/";
            $images = array();
            $images = glob($dirname."*.{jpg,png,gif}", GLOB_BRACE);
                                    
            $result =mysqli_query($_SESSION['connect'],"SELECT * FROM bozorgan ORDER BY id DESC");
            $num=mysqli_num_rows($result);
            if (mysqli_num_rows($result) > 0) {
                  $i=0;
            while($row = mysqli_fetch_assoc($result)) {
            foreach($images as $image) { 
            if (strpos($image, $row['pic']) !== false){
                  
                $i++;
                       if($i==1){
                        echo '<div class="item active animated bounceInRight row">
                        <div  class="col-xs-10">
                        <p>'.$row['tip'].'</p> 
                        <span class="pos-char">'.$row['name'].' - <b>'.$row['pishe'].'</b></span>
                        </div>
                        <div class="animated slideInRight col-xs-2"><img alt="portfolio" src="'.$image.'" width="100" class="img-circle img-responsive"></div>
                        </div>';
                        }else if($i==2){
                            
                              echo '<div class="item animated bounceInRight row">
                              <div  class="col-xs-10">
                              <p>'.$row['tip'].'</p> 
                              <span class="pos-char">'.$row['name'].' - <b>'.$row['pishe'].'</b></span>
                              </div>
                              <div class="animated slideInRight col-xs-2"><img alt="portfolio" src="'.$image.'" width="100" class="img-circle img-responsive"></div>
                              </div>';   
                            
                              
                        }
                        else if($i==3){
                            
                              echo '<div class="item animated bounceInRight row">
                              <div  class="col-xs-10">
                              <p>'.$row['tip'].'</p> 
                              <span class="pos-char">'.$row['name'].' - <b>'.$row['pishe'].'</b></span>
                              </div>
                              <div class="animated slideInRight col-xs-2"><img alt="portfolio" src="'.$image.'" width="100" class="img-circle img-responsive"></div>
                              </div>';   
                            
                              
                        }
                        
                    }
                  }
          
                }
              }
      ?>
    
      
      
  </div>

   <!-- Indicators -->
   	<ol class="carousel-indicators">
    <li data-target="#carousel-testimonials" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-testimonials" data-slide-to="1"></li>
    <li data-target="#carousel-testimonials" data-slide-to="2"></li>
  	</ol>
  	<!-- Indicators -->
  </div>



    </div>
    

<div class="grid team  wowload fadeInUpBig">  
  <h2 class="text-center  wowload fadeInUp"><i class="fa fa-book" aria-hidden="true"></i>&nbsp;معرفی کتاب</h2>
   <?php
            
            $dirname = "admin/slide/books/";
            $images = array();
            $images = glob($dirname."*.{jpg,png,gif}", GLOB_BRACE);
            $num=count($images);
            $bookdir = "admin/books/";
            $files = glob($bookdir."*.{pdf}", GLOB_BRACE);
            
            
                  
            if($num>2){
                  
            $fix=$num-1;
               
               for($i=$num;$i>=$fix;$i--){
                  $j=$i-1;
                  $step=explode('/',$images[$j]);
                  $imgname=explode('_',$images[$j]);
                 // $result =mysqli_query($_SESSION['connect'],"SELECT * FRPOM books WHERE bk_img='".$imgname[1]."'");
                 //echo $imgname[1];
                   //echo $images[$j];  
                  
                  
                    //$link=explode('/',$images[$i]);
                    $link=explode('/',$files[$i]);
                    $lk=explode('.',$link[2]);
                     $row = mysqli_fetch_assoc($result); 
                        echo '<div class=" col-sm-3 col-xs-6">
                              <figure class="effect-chico">
                                  <img src="'.$images[$j].'" alt="img01"/>
                                    <figcaption>
                                         
                                        <p><b>"'.$row['bk_name'].'"</b><br>"'.$row['bk_author'].'"<br><br><a href="download.php?link='.$lk[0].'.pdf"><i class="fa fa-download" aria-hidden="true"></i></a></p>            
                                    </figcaption>
                                </figure>
                                </div>';
                                
                 
                    
                }    
               
            }else{
                  
            $bookdir = "admin/books/";
            $files = glob($bookdir."*.{pdf}", GLOB_BRACE);
               for($i=0;$i<=1;$i++){
                  if($images[$i]!=''){
                    //$link=explode('/',$images[$i]);
                    $link=explode('/',$files[$i]);
                    $lk=explode('.',$link[2]);
                      
                        echo '<div class=" col-sm-3 col-xs-6">
                              <figure class="effect-chico">
                                  <img src="'.$images[$i].'" alt="img01"/>
                                    <figcaption>
                                         
                                        <p><b>"'.$row['bk_name'].'"</b><br>"'.$row['bk_author'].'"<br><br><a href="download.php?link='.$lk[0].'.pdf"><i class="fa fa-download" aria-hidden="true"></i>
</a></p>            
                                    </figcaption>
                                </figure>
                                </div>';
                  }
                    
                }
                  
            }
                  
            
            
        ?>
   
    

   
   
 </div>
</div>


<!-- team -->
<!--<h3 class="text-center  wowload fadeInUp">هنرمندان</h3>
<p class="text-center  wowload fadeInLeft"></p>
<div class="row grid team  wowload fadeInUpBig">	
	<div class=" col-sm-3 col-xs-6">
	<figure class="effect-chico">
        <img src="images/team/8.jpg" alt="img01" class="img-responsive" />
        <figcaption>
            <p><b>نام هنرمند</b><br>تخصص<br><br><a href="#"></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-twitter"></i></a></p>            
        </figcaption>
    </figure>
    </div>

    <div class=" col-sm-3 col-xs-6">
	<figure class="effect-chico">
        <img src="images/team/10.jpg" alt="img01"/>
        <figcaption>            
            <p><b>نام هنرمند</b><br>تخصص<br><br><a href="#"></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-twitter"></i></a></p>            
        </figcaption>
    </figure>
    </div>

    <div class=" col-sm-3 col-xs-6">
	<figure class="effect-chico">
        <img src="images/team/12.jpg" alt="img01"/>
        <figcaption>
            <p><b>نام هنرمند</b><br>تخصص<br><br><a href="#"></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-twitter"></i></a></p>          
        </figcaption>
    </figure>
    </div>

    <div class=" col-sm-3 col-xs-6">
	<figure class="effect-chico">
        <img src="images/team/17.jpg" alt="img01"/>
        <figcaption>
            <p><b>نام هنرمند</b><br>تخصص<br><br><a href="#"></a> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-twitter"></i></a></p>
        </figcaption>
    </figure>
    </div>

 
</div>-->
<!-- team -->

</div>









<!-- About Starts -->
<div class="highlight-info">
      <h4 class="text-center" style="padding-top: 7px;"><i class="fa fa-comment-o fa-2x"></i>نظرات بازدیدکنندگان</h4>
<!--<div class="overlay spacer">
<div class="container">
   <p></p>   
	<div class="col-sm-3 col-xs-6">
	<i class="fa fa-smile-o  fa-5x"></i><h4>24 Clients</h4>
	</div>
	<div class="col-sm-3 col-xs-6">
	<i class="fa fa-rocket  fa-5x"></i><h4>75 Projects</h4>
	</div>
	<div class="col-sm-3 col-xs-6">
	<i class="fa fa-cloud-download  fa-5x"></i><h4>454 Downloads</h4>
	</div>
	<div class="col-sm-3 col-xs-6">
	<i class="fa fa-map-marker fa-5x"></i><h4>2 Offices</h4>
	</div>
      

</div>
</div>-->
<div id="partners" class="container spacer " style="padding: 1em 0px 1em 0px;">
	
    
    <div class="col-xs-12">
      <div id="carousel-testimonials" class="carousel slide testimonails  wowload fadeInRight" data-ride="carousel">
    <div class="carousel-inner">  
      
     <?php $dirname = "admin/slide/bozorgan/";
            $images = array();
            $images = glob($dirname."*.{jpg,png,gif}", GLOB_BRACE);
                                    
            $result =mysqli_query($_SESSION['connect'],"SELECT * FROM bozorgan ORDER BY id DESC");
            $num=mysqli_num_rows($result);
            if (mysqli_num_rows($result) > 0) {
                  $i=0;
            while($row = mysqli_fetch_assoc($result)) {
            foreach($images as $image) { 
            if (strpos($image, $row['pic']) !== false){
                  
                $i++;
                       if($i==1){
                        echo '<div class="item active animated bounceInRight row">
                        <div  class="col-xs-10" style="padding-top: 5%;">
                        <p>'.$row['tip'].'</p> 
                        <span class="pos-char">'.$row['name'].' - <b>'.$row['pishe'].'</b></span>
                        </div>
                        </div>';
                        }else if($i==2){
                            
                              echo '<div class="item animated bounceInRight row">
                              <div  class="col-xs-10" style="padding-top: 5%;">
                              <p>'.$row['tip'].'</p> 
                              <span class="pos-char">'.$row['name'].' - <b>'.$row['pishe'].'</b></span>
                              </div>
                              </div>';   
                            
                              
                        }
                        else if($i==3){
                            
                              echo '<div class="item animated bounceInRight row">
                              <div  class="col-xs-10" style="padding-top: 5%;">
                              <p>'.$row['tip'].'</p> 
                              <span class="pos-char">'.$row['name'].' - <b>'.$row['pishe'].'</b></span>
                              </div>
                              </div>';   
                            
                              
                        }
                        
                    }
                  }
          
                }
              }
      ?>
    
      
      
  </div>

  </div>


    </div>
    </div>
    
</div>

<!-- About Ends -->





<?php
session_start();
require("core.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
if(isset($_POST['submit'])&& $_POST['subject']!=''){
      $subject = mysqli_real_escape_string($db,$_POST['subject']);
      $email = mysqli_real_escape_string($db,$_POST['email']);
      $text = mysqli_real_escape_string($db,$_POST['text']);
            $sql = "INSERT INTO contact (subject,email,text) VALUES ('".$subject."','".$email."','".$text."')";

      }
}
// Create connection
$crt=$db->query($sql);

if ($crt === TRUE) {
    
} 



?>


<div id="contact" class="spacer">
<!--Contact Starts-->
<div class="container contactform center">
<h2 class="text-center  wowload fadeInUp">با ما در ارتباط باشید</h2>
  <div class="row wowload fadeInLeftBig">      
      <div class="col-sm-6 fadeInLeft">
       <form method="POST" action="">
        <input type="text" placeholder="موضوع پیام" name="subject">
        <input type="email" placeholder="آدرس ایمیل" name="email">
        <textarea rows="5" placeholder="متن پیام" name="text"></textarea>
        <input type="submit" name="submit" value="ارسال"  class="btn btn-primary"></input>
        </form>
      </div>
      
        <div class="col-sm-6 col-xs-12  fadeInLeft appea">
          <div class="in-appea" style="max-width:100%;height:333px;" >
         <h4>آدرس:</h4>
         <p>شاهین شهر-خیابان فردوسی فرعی ۲ شرقی بن بست اول غربی پلاک &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
         <h4>تلفن های تماس:</h4>
         <p>۰۳۱۴−۴۵۲</p>
         </div>
        </div>
      
  </div>



</div>
</div>
<!--Contact Ends-->



<!-- Footer Starts -->
<div class="footer text-center spacer">
       <?php
            $network =mysqli_query($_SESSION['connect'],"SELECT * FROM networks");
            if (mysqli_num_rows($network) > 0) {
                   $gol = mysqli_fetch_assoc($network);
                   echo '<p class="wowload flipInX"><a href="'.$gol['n_fa'].'"><i class="fa fa-facebook fa-2x"></i></a> <a href="'.$gol['n_ins'].'"><i class="fa fa-instagram fa-2x"></i></a> <a href="'.$gol['n_tel'].'"> <img src="admin/images/telegram.png" style="margin-bottom: 15px;"  alt="Smiley face" height="30" width="30"> </a> </p>';
            }
            ?>
تمامی حقوق این سایت محفوظ می باشد
</div>
<!-- # Footer Ends -->
<a href="#home" class="gototop "><i class="fa fa-angle-up  fa-3x"></i></a>





<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title">Title</h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->    
</div>



<!-- jquery -->
<script src="assets/jquery.js"></script>

<!-- wow script -->
<script src="assets/wow/wow.min.js"></script>


<!-- boostrap -->
<script src="assets/bootstrap/js/bootstrap.js" type="text/javascript" ></script>

<!-- jquery mobile -->
<script src="assets/mobile/touchSwipe.min.js"></script>
<script src="assets/respond/respond.js"></script>

<!-- gallery -->
<script src="assets/gallery/jquery.blueimp-gallery.min.js"></script>

<!-- custom script -->
<script src="assets/script.js"></script>

</body>
</html>