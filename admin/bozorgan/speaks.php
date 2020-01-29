<?php
session_start();
include '../../core.php';
echo $_SESSION['image'];
ob_start();

?>
<!DOCTYPE html>
<?php include '../starter.php'; ?>
      <section id="main-content">
          <section class="wrapper">
              <!--state overview start-->
              
              <!--state overview end-->
           <?php
               if(isset($_POST['submit']) && $_POST['id']!=''){
                
                               session_start();
                               include '../../core.php';
                               if($_POST['nam']=='' || $_POST['pishe']=='' || $_POST['tip']==''){
                                   echo'<div class="alert alert-block alert-danger fade in">
                                    <button data-dismiss="alert" class="close close-sm" type="button">
                                        <i class="icon-remove"></i>
                                    </button>
                                    <strong>اخطار</strong>لطفا فیلدها را تکمیل نمایید
                             
                                </div>';
                               }
                               else{
                                        $name     = $_FILES['picture']['name'];
                                        $tmpName  = $_FILES['picture']['tmp_name'];
                                        $error    = $_FILES['picture']['error'];
                                        $size     = $_FILES['picture']['size'];
                                        $ext	  = strtolower(pathinfo($name, PATHINFO_EXTENSION));
                                
                                /*if file is exist*/
                                        if(empty($_FILES['picture']['name'])){
                                            $query=mysqli_query($_SESSION['connect'],"SELECT * FROM bozorgan WHERE id='".$_POST['id']."'");
                                            $rw2 = mysqli_fetch_assoc($query);
                                            $fileName1 = $rw2['pic'];
                                            $filePath = $fileName1;
                                            $filePaththumb = '../slide/bozorgan/THUMB_'.$fileName1;
                                            if ( file_exists($filePath) && file_exists($filePaththumb) ) {
                                               $result =mysqli_query($_SESSION['connect'],"UPDATE bozorgan SET pic='".$fileName1."',name='".$_POST['nam']."',pishe='".$_POST['pishe']."',tip='".$_POST['tip']."' WHERE id='".$_POST['id']."'");
                                               header( 'Location: ../mangspeaks.php' ) ;
                                               exit;
                                            }
                                        }
                                        else if($_FILES['picture']['name']){
                                       
                                /*if file is exist*/
                                        $filecount=0;
                                        $query=mysqli_query($_SESSION['connect'],"SELECT * FROM bozorgan WHERE id='".$_POST['id']."'");
                                        $rw2 = mysqli_fetch_assoc($query);
                                        $fileName1 = $rw2['pic'];
                                        $filePath = $fileName1;
                                        $filePaththumb = '../slide/bozorgan/THUMB_'.$fileName1;
                                        if ( file_exists($filePath) ) {
                                                unlink($filePath);
                                                unlink($filePaththumb);}
                                    $directory = '/var/www/html/naghashi/admin/bozorgan/';
                                    if (glob($directory . '*.jpg') || glob($directory . '*.jpeg') || glob($directory . '*.png') || glob($directory . '*.gif'))
                                    {
                                     $filecount = count(glob($directory . '*.jpg'))+count(glob($directory . '*.jpeg'))+count(glob($directory . '*.png'))+count(glob($directory . '*.gif'));
                                    
                                     
                                    }
                                      
                                     
                                           
                                      
                                      $cn=++$filecount;
                                      $filename = basename($_FILES['picture']['name']);
                                      $basename=explode(".",$filename);
                                      $extension=end($basename);
                                      $imagename="image".$cn.".".$extension;
                                       
                                      $result =mysqli_query($_SESSION['connect'],"UPDATE bozorgan SET pic='".$imagename."',name='".$_POST['nam']."',pishe='".$_POST['pishe']."',tip='".$_POST['tip']."' WHERE id='".$_POST['id']."'");
                                          if($result){
                                      switch ($error) {
                                        case UPLOAD_ERR_OK:
                                          $valid = true;
                                          //validate file extensions
                                          if ( !in_array($ext, array('jpg','jpeg','png','gif')) ) {
                                            $valid = false;
                                            $response = 'Invalid file extension.';
                                          }
                                          //validate file size
                                          if ( $size/1024/1024 > 2 ) {
                                            $valid = false;
                                            $response = 'File size is exceeding maximum allowed size.';
                                            
                                          }
                                          //upload file
                                          //$typ=var_dump($_FILES["file"]["type"]);
                                          $allowedExts = array("gif","jpg", "GIF", "jpeg");
                                          $allowedExt = array("pdf");
                                          $extension = end(explode(".", $_FILES["picture"]["name"]));
                                          //print_r($_FILES["file"]);
                                         
                                          $typimg=in_array($extension, $allowedExts);
                                          $typdf=in_array($extension, $allowedExt);
                                          if ($valid && $typimg) {
                                            
                                            $targetPath =  dirname( __FILE__ ) . DIRECTORY_SEPARATOR. $imagename;
                                            move_uploaded_file($tmpName,$targetPath);
                                            $_SESSION["tip"]="shakhs";
                                            thumb_create($imagename,'44','44');
                                        //$images=preg_grep ('/\.jpg$/i', $files);
                                            header( 'Location: ../mangspeaks.php' ) ;
                                            exit;
                                           
                                            
                                          }
                                          
                                          
                                    
                                          break;
                                        case UPLOAD_ERR_INI_SIZE:
                                          $response = 'The uploaded file exceeds the upload_max_filesize directive in php.ini.';
                                          break;
                                        case UPLOAD_ERR_PARTIAL:
                                          $response = 'The uploaded file was only partially uploaded.';
                                          break;
                                        case UPLOAD_ERR_NO_FILE:
                                          $response = 'No file was uploaded.';
                                          break;
                                        case UPLOAD_ERR_NO_TMP_DIR:
                                          $response = 'Missing a temporary folder. Introduced in PHP 4.3.10 and PHP 5.0.3.';
                                          break;
                                        case UPLOAD_ERR_CANT_WRITE:
                                          $response = 'Failed to write file to disk. Introduced in PHP 5.1.0.';
                                          break;
                                        default:
                                          $response = 'Unknown error';
                                        break;
                                      }
                                    
                                      echo $response;
                                    
                                           
                                          }
                               }
                               }
              }
              else if(isset($_POST['submit'])){
                              
                               session_start();
                               include '../../core.php';
                               if($_POST['nam']=='' || $_POST['pishe']=='' || $_POST['tip']==''){
                                   echo'<div class="alert alert-block alert-danger fade in">
                                    <button data-dismiss="alert" class="close close-sm" type="button">
                                        <i class="icon-remove"></i>
                                    </button>
                                    <strong>اخطار</strong>لطفا فیلدها را تکمیل نمایید
                             
                                </div>';
                               }
                               else{
                                
                                $name     = $_FILES['picture']['name'];
                                $tmpName  = $_FILES['picture']['tmp_name'];
                                $error    = $_FILES['picture']['error'];
                                $size     = $_FILES['picture']['size'];
                                $ext	  = strtolower(pathinfo($name, PATHINFO_EXTENSION));
                               
                                            $filecount=0;

                                    $directory = '/var/www/html/naghashi/admin/bozorgan/';
                                    if (glob($directory . '*.jpg') || glob($directory . '*.jpeg') || glob($directory . '*.png') || glob($directory . '*.gif'))
                                    {
                                     $filecount = count(glob($directory . '*.jpg'))+count(glob($directory . '*.jpeg'))+count(glob($directory . '*.png'))+count(glob($directory . '*.gif'));
                                    
                                     
                                    }
                                      
                                     
                                           
                                      
                                      $cn=++$filecount;
                                      $filename = basename($_FILES['picture']['name']);
                                      $basename=explode(".",$filename);
                                      $extension=end($basename);
                                      $imagename="image".$cn.".".$extension;
                                      
                                      $result =mysqli_query($_SESSION['connect'],"INSERT INTO bozorgan (pic,name,pishe,tip) VALUES ('".$imagename."','".$_POST['nam']."','".$_POST['pishe']."','".$_POST['tip']."')");
                                          if($result){
                                      switch ($error) {
                                        case UPLOAD_ERR_OK:
                                          $valid = true;
                                          //validate file extensions
                                          if ( !in_array($ext, array('jpg','jpeg','png','gif')) ) {
                                            $valid = false;
                                            $response = 'Invalid file extension.';
                                          }
                                          //validate file size
                                          if ( $size/1024/1024 > 2 ) {
                                            $valid = false;
                                            $response = 'File size is exceeding maximum allowed size.';
                                            
                                          }
                                          //upload file
                                          //$typ=var_dump($_FILES["file"]["type"]);
                                          $allowedExts = array("gif","jpg", "GIF", "jpeg");
                                          $allowedExt = array("pdf");
                                          $extension = end(explode(".", $_FILES["picture"]["name"]));
                                          //print_r($_FILES["file"]);
                                         
                                          $typimg=in_array($extension, $allowedExts);
                                          $typdf=in_array($extension, $allowedExt);
                                          if ($valid && $typimg) {
                                            
                                            $targetPath =  dirname( __FILE__ ) . DIRECTORY_SEPARATOR. $imagename;
                                            move_uploaded_file($tmpName,$targetPath);
                                            $_SESSION["tip"]="shakhs";
                                            thumb_create($imagename,'44','44');
                                        //$images=preg_grep ('/\.jpg$/i', $files);
                                           // echo $_GET['id'];
                                           header( 'Location: ../speaks.php' ) ;
                                           
                                           exit;
                                            
                                          }
                                          
                                          
                                    
                                          break;
                                        case UPLOAD_ERR_INI_SIZE:
                                          $response = 'The uploaded file exceeds the upload_max_filesize directive in php.ini.';
                                          break;
                                        case UPLOAD_ERR_PARTIAL:
                                          $response = 'The uploaded file was only partially uploaded.';
                                          break;
                                        case UPLOAD_ERR_NO_FILE:
                                          $response = 'No file was uploaded.';
                                          break;
                                        case UPLOAD_ERR_NO_TMP_DIR:
                                          $response = 'Missing a temporary folder. Introduced in PHP 4.3.10 and PHP 5.0.3.';
                                          break;
                                        case UPLOAD_ERR_CANT_WRITE:
                                          $response = 'Failed to write file to disk. Introduced in PHP 5.1.0.';
                                          break;
                                        default:
                                          $response = 'Unknown error';
                                        break;
                                      }
                                    
                                      echo $response;
                                    
                                           
                                          }
                               }
              }
             
//Dynamically resize image
function thumb_create($file, $width , $height ) {
        try
        {
                /*** the image file ***/
                $image = $file;
        
                /*** a new imagick object ***/
                $im = new Imagick();
        
                /*** ping the image ***/
                $im->pingImage($image);
        
                /*** read the image into the object ***/
                $im->readImage( $image );
        
                /*** thumbnail the image ***/
                $im->thumbnailImage( $width, $height );
        
                /*** Write the thumbnail to disk ***/
                $im->writeImage( '../slide/bozorgan/THUMB_'.$file );
        
                /*** Free resources associated with the Imagick object ***/
                $im->destroy();
                return 'THUMB_'.$file;
                
        }
        catch(Exception $e)
        {
                print $e->getMessage();
                return $file;
        }
};
ob_end_flush();
                        
           ?>
            <div class="row">
                            <div class="col-lg-12">
                                <section class="panel">
                                    <header class="panel-heading">
سخنان هنرمندان                                 
                                    </header>
                                    <div class="panel-body">
                                        <div class="form">
                                            
                                           
                                            <form action="bozorgan/speaks.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                                                <div class="form-group">
                                                  <label class="col-sm-2 control-label">عکس هنرمند</label>
                                                  <div class="col-sm-10">
                                                  <input type="file" id="exampleInputFile" name="picture">
                                                  <p class="help-block">Example block-level help text here.</p>
                                                  </div>
                                                  
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">نام هنرمند</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="nam">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">پیشه</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" name="pishe">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label col-sm-2">شرح سخن</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control ckeditor" name="tip" rows="6"></textarea>
                                                    </div>
                                                </div>
                                                 
                                                 <input type="submit" value="ثبت" class="btn btn-shadow btn-success" name="submit" style="float:left;">
                                            </form>
                                            
                                           
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
               
             
              
             
             

          </section>
      </section>
      <!--main content end-->
  </section>
<?php include '../end.php'; ?>
  </body>
</html>
