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
                  <a class="navbar-brand" href="slider.php">آپلود تصاویر اسلایدر</a>
                </div>
              </div>
            </div>

   
    <div class="container">
    <?php
       $directory = '/var/www/html/naghashi/admin/uploads/';
      if (glob($directory . '*.jpg'))
      {
       $filecount = count(glob($directory . '*.jpg'));
      
       
      }
      ?>
    	<div class="row">
      <?php
       
      $maindir = "uploads" ;
      $mydir = opendir($maindir) ;
      $limit = 12;
      $offset = ((int)$_GET['offset']) ? $_GET['offset'] : 0; 
      $files = array();
      $page='';
      $exclude = array( ".", "..", "index.php",".htaccess","guarantee.gif","up2.php") ;
      while($fn = readdir($mydir))
      {
          if (!in_array($fn, $exclude)) 
          {
              $files[] = $fn;
          }
      }
      closedir($mydir);
      ksort($files);
      
      $newICounter = (($offset + $limit) <= sizeof($files)) ? ($offset + $limit) : sizeof($files);
      $directory = '/var/www/html/naghashi/admin/uploads/';
      if (glob($directory . '*.jpg') || glob($directory . '*.jpeg') || glob($directory . '*.png') || glob($directory . '*.gif'))
      {
       $filecount = count(glob($directory . '*.jpg'))+count(glob($directory . '*.jpeg'))+count(glob($directory . '*.png'))+count(glob($directory . '*.gif'));
      
       
      }
      
      for($i=$offset;$i<$newICounter;$i++) {   
        
          /*<a href="<?php print $files[$i]; ?>"><?php print $files[$i]; ?></a><br>*/
          echo '
                  <div class="col-xs-6 col-sm-3 col-md-3" id="sizeopt">
                    <div class="thumbnail" id="thumbnail">
                      <img src="'.$maindir. '/' .$files[$i].'" alt="..."  style="height: 221px !important;">
                        <div class="caption">
                        <p class="del" ><a href="remove.php?name='.$files[$i].'" class="btn btn-danger btn-xs" role="button">حذف</a></p>
                      </div>
                    </div>
                  </div>';
            
            }
      ?>

</div>
  <div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4" style="text-align: center;">
		<?php

freddyShowNav($offset,$limit,sizeof($files),"");

function freddyShowNav($offset, $limit, $totalnum, $query) {
    global $PHP_SELF;
    if ($totalnum > $limit) {
            // calculate number of pages needing links 
            $pages = intval($totalnum/$limit);

            // $pages now contains int of pages needed unless there is a remainder from division 
            if ($totalnum%$limit) $pages++;

            if (($offset + $limit) > $totalnum) {
                $lastnum = $totalnum;
                }
            else {
                $lastnum = ($offset + $limit);
                }
            ?>
                
								<ul class="pagination">
            <?php
            for ($i=1; $i <= $pages; $i++) {  // loop thru 
                $newoffset=$limit*($i-1);
                if ($newoffset != $offset) {
            ?>
                    <li>
                        <a href="<?php print  $PHP_SELF; ?>?offset=<?php print $newoffset; ?><?php print $query; ?>"><?php print $i; ?>
                        </a>
                    </li>
                    
            <?php
                    }     
                else {
            ?>
                    <li><a><?php print $i; ?></a></li>
            <?php
                    }
                }
            ?>
								</ul>
            <?php
        }
    return;
    }



echo $page;
?>
		
		
		
		
	</div>
	<div class="col-md-4"></div>
	</div>  	
		

	      <div class="row">
	      	<div class="col-lg-12">
	           <form class="well" action="uploads/up2.php" method="post" enctype="multipart/form-data">
				  <div class="form-group">
				    <label for="file">Select a file to upload</label>
				    <input type="file" name="file">
				    <p class="help-block">Only jpg,jpeg,png and gif file with maximum size of 1 MB is allowed.</p>
				  </div>
				  <input type="submit" class="btn btn-lg btn-primary" value="آپلود">
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
