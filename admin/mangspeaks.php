<?php
session_start();
include '../core.php';
echo $_SESSION['image'];
if($_SESSION['login_user']==''){
header('location:your-custom-404.php');}
ob_start();

?>
<!DOCTYPE html>
<?php include 'starter.php'; ?>
     
      <section id="main-content">
          <section class="wrapper">
              <!--state overview start-->
              
              <!--state overview end-->
                <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                               مدیریت سخنان بزرگان
                              
                         
                            </header>
                            
                            <div class="panel-body">
                                <div class="timeline-messages">
                                    <!-- Comment -->
                                     <?php
                                   if($_GET['id']!=''){
                                    $reslt =mysqli_query($_SESSION['connect'],"SELECT * FROM bozorgan WHERE id='".$_GET['id']."'");
                                     if (mysqli_num_rows($reslt) > 0) {
                                        
                                        $rw = mysqli_fetch_assoc($reslt);
                                          $folder="bozorgan";
                                          $fileName = $rw['pic'];
                                          $filePath = 'bozorgan/'.$fileName;
                                          $filePaththumb = 'slide/bozorgan/THUMB_'.$fileName;
                                          $files = array();
                                            $exclude = array( ".", "..", "index.php",".htaccess","guarantee.gif","speaks.php") ;
                                            // remove file if it exists
                                            $myfolder = opendir($folder);
                                            while($fn = readdir($myfolder))
                                            {
                                                if (!in_array($fn, $exclude)) 
                                                {
                                                    $files[] = $fn;
                                                }
                                                
                                            }
                                            //echo var_dump($files);
                                            closedir($myfolder);
                                            // remove file if it exists
                                            if ( file_exists($filePath) ) {
                                                unlink($filePath);
                                                unlink($filePaththumb);
                                                $reslt1 =mysqli_query($_SESSION['connect'],"DELETE FROM bozorgan WHERE id='".$_GET['id']."'");
                                            }
                                       }
                                     }
                                   
                                  $dirname = "slide/bozorgan/";
                                  $images = array();
                                  $images = glob($dirname."*.{jpg,png,gif}", GLOB_BRACE);
                                    
                                     foreach($images as $image) {
                                      
                                      $result =mysqli_query($_SESSION['connect'],"SELECT * FROM bozorgan ORDER BY id ASC");
                                      if (mysqli_num_rows($result) > 0) {
                                        
                                        while($row = mysqli_fetch_assoc($result)) {
                                            
                                           if (strpos($image, $row['pic']) !== false){
                                            echo '<div class="msg-time-chat">
                                                      <a href="#" class="message-img">
                                                         <img class="avatar" src="'.$image.'" alt=""></a>
                                                      <div class="message-body msg-in">
                                                          <span class="arrow"></span>
                                                          <div class="text">
                                                              <p class="attribution"><a href="#">'.$row['name'].'</a>'.$row['pishe'].'</p>
                                                              <p>'.$row['tip'].'</p>
                                                              <div style="text-align:left;"><a href="speaks.php?id='.$row['id'].'"><button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button></a>
                                                               <a href="?del&id='.$row['id'].'"><button class="btn btn-danger btn-xs"><i class="icon-trash "></i></button></a></div>
                                                          </div>
                                                          
                                                      </div>   
                                                  </div>
                                                 
                                                ';
                                           }
                                          
                                      }
                                      }
                                     }    
                                    
                                 
                                  
                                 
                                  
                              ?>
                                    <div class="chat-form">
                                    
                                                    <div class="form-group">
                                                        <!--<div class="pull-left chat-features">
                                                            <a class="btn btn-danger" href="javascript:;">حذف موارد</a>
                                                        </div>-->
                                                        <div class="pull-left chat-features">
                                                            <a class="btn btn-success" href="speaks.php">افزودن</a>
                                                        </div>
                                                    </div>
                
                                                </div> 
                                </div>
                                
                            </div>
                        </section>
                    </div>
                </div>
             

          </section>
      </section>
      <!--main content end-->
  </section>

   <?php include 'end.php'; ?>
  </body>
</html>
