<?php
session_start();
include '../core.php';
echo $_SESSION['image'];
if($_SESSION['login_user']==''){
  header('location:your-custom-404.php');} 
?>
<!DOCTYPE html>
<?php include 'starter.php'; ?>
      <section id="main-content">
          <section class="wrapper">
              <!--state overview start-->
              
              <!--state overview end-->

              <!-- Static navbar -->
    <div class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">افزودن کتاب</a>
        </div>
      </div>
    </div>

   
    <div class="container">
   
		
		
		
		
	</div>
	<div class="col-md-4"></div>
	</div>  	
		
<?php
$variable = $_REQUEST['variable'];
$salt = 'your secret key';
$hash = md5($salt.$variable);
if($hash == $_REQUEST['hash']){  
  echo '<div class="alert alert-success alert-block fade in">
                                    <button data-dismiss="alert" class="close close-sm" type="button">
                                        <i class="icon-remove"></i>
                                    </button>
                                    <h4>
                                        <i class="icon-ok-sign"></i>
                                          کتاب شما با موفقیت افزوده شد.
                                  </h4>
                                    
                                </div>';
   //<p>Best check yo self, youre not looking too good...</p>
   //top code was in the div after h4
  
  }?>
	      <div class="row">
	      	<div class="col-lg-12">
	           <form class="well" action="books/upbook1.php" method="post" enctype="multipart/form-data">
          <div class="col-sm-6">
          <div class="form-group">
				    <label for="file"></label>
				   </br><label for="book name" class="lb-book">نام کتاب</label><input class="form-control" name="bk_name" type="text">
          </div>
				  </div>
          <div class="col-sm-6">
          <div class="form-group">
				    <label for="file"></label>
				   </br><label for="book name" class="lb-book">نام نویسنده</label><input class="form-control" name="bk_author" type="text">
				  </div>
          </div>
          <div class="col-sm-6">
				  <div class="form-group">
				    <label for="file"></label>
				<label for="file name" class="lb-book">نام فایل</label><input type="file" name="file">
				    <p class="help-block">Only jpg,jpeg,png and gif file with maximum size of 1 MB is allowed.</p>
				  </div>
        </div>
        <div class="col-sm-6">
         <label for="file name" class="lb-book">عکس فایل</label> 
          <input type="file" name="image" accept="image/*" onchange="showMyImage(this)">
         <br/>
          <img id="thumbnil" style="width:20%; margin-top:10px;"  src="" alt=""/></br>
        </div></br>
        <div class="row">
           <div  style="text-align:left;"><input type="submit" class="btn btn-lg btn-primary" value="آپلود"></div>
        </div>
				 
				</form>
			</div>
	      </div>
    </div> <!-- /container -->
              
             
             

          </section>
      </section>
      <!--main content end-->
  </section>

   <?php include 'end.php'; ?>
  
  </body>
</html>
