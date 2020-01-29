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
          <a class="navbar-brand" href="slider.php">آپلود آثار متفرقه</a>
        </div>
      </div>
    </div>

   
    <div class="container">
    <?php
       $directory = '/var/www/html/naghashi/admin/sier/';
      if (glob($directory . '*.jpg'))
      {
       $filecount = count(glob($directory . '*.jpg'));
      
       
      }
      ?>
    	<div class="row">
<?php
 
$maindir = "sier" ;
$mydir = opendir($maindir) ;
$limit = 12;
$offset = ((int)$_GET['offset']) ? $_GET['offset'] : 0; 
$files = array();
$page='';
$exclude = array( ".", "..", "index.php",".htaccess","guarantee.gif","sier.php") ;
while($fn = readdir($mydir))
{
    if (!in_array($fn, $exclude)) 
    {
        $files[] = $fn;
    }
}
closedir($mydir);
sort($files);
$newICounter = (($offset + $limit) <= sizeof($files)) ? ($offset + $limit) : sizeof($files);
$directory = '/var/www/html/naghashi/admin/sier/';
if (glob($directory . '*.jpg') || glob($directory . '*.jpeg') || glob($directory . '*.png') || glob($directory . '*.gif'))
{
 $filecount = count(glob($directory . '*.jpg'))+count(glob($directory . '*.jpeg'))+count(glob($directory . '*.png'))+count(glob($directory . '*.gif'));

 
}
$imgs = array();

$query =mysqli_query($_SESSION['connect'],"SELECT * FROM `sier` ORDER BY id DESC");
  if (mysqli_num_rows($query) > 0) {
		$num=mysqli_num_rows($query);
		//echo $num;
    while($row = mysqli_fetch_assoc($query)){
			
			    //echo $row['img_name'];
					
					$imgs[]=$row['img_name'];
					$imgstxt[]=$row['img_desc'];
					}
					
		}
//echo var_dump($imgs);
for($i=$offset;$i<$newICounter;$i++) {   
  $query =mysqli_query($_SESSION['connect'],"SELECT * FROM `sier` WHERE img_name='".$imgs[$i]."'");
	  if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
		$char=substr($imgstxt[$i], 0, 60);
    /*<a href="<?php print $files[$i]; ?>"><?php print $files[$i]; ?></a><br>*/
    echo '
	       		<div class="col-xs-6 col-sm-3 col-md-3" id="sizeopt">
		       		<div class="thumbnail" id="thumbnail">
			       		<img src="'.$maindir. '/' .$imgs[$i].'" alt="..."  style="height: 221px !important;">
				       		<div class="caption">
									 <p class="desc">'.$char.'</p>
									 <p class="del"><a href="removesier.php?name='.$imgs[$i].'" class="btn btn-danger btn-xs" role="button">حذف</a></p>
									 <form method="post" action="sier/sier.php">
									 <input type="radio" name="shakhes" id='.$row['id'].' value='.$row['id'].'  style="position: absolute;top: 10px;">
                  
			       		</div>
		       		</div>
	       		</div>';
	      }
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
						<input type="submit" class="btn btn-lg btn-warning" name="inx" value="شاخص">
				 </form>
	           <form class="well" action="sier/sier.php" method="post" enctype="multipart/form-data">
				  <div class="form-group">
				    <label for="file">انتخاب فایل به منظور آپلود</label>
				    <input type="file" name="file">
				    <p class="help-block">نوع فایل حتما از نوع عکس باشد</p>
				  </div>
					<div class="form-group">
				    <label for="file">توضیح مختصر</label>
				    <textarea type="text" name="desc" class="form-control"></textarea>
				    <p class="help-block">توضیحی که در قسمت پایینی هر عکس نمایش داده می شود</p>
				  </div>
				  <input type="submit" class="btn btn-lg btn-primary" name="upload" value="آپلود">
					
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
