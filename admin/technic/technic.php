<?php

ob_start();
//turn on php error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../../core.php';

$filecount=0;

$directory = '/var/www/html/naghashi/admin/technic/';
if (glob($directory . '*.jpg') || glob($directory . '*.jpeg') || glob($directory . '*.png') || glob($directory . '*.gif'))
{
 $filecount = count(glob($directory . '*.jpg'))+count(glob($directory . '*.jpeg'))+count(glob($directory . '*.png'))+count(glob($directory . '*.gif'));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' &&  isset($_POST['upload'])) {
	
	$name     = $_FILES['file']['name'];
	$tmpName  = $_FILES['file']['tmp_name'];
	$error    = $_FILES['file']['error'];
	$size     = $_FILES['file']['size'];
 $ext	  = strtolower(pathinfo($name, PATHINFO_EXTENSION));
       
	
	$cn=++$filecount;
	$filename = basename($_FILES['file']['name']);
	$basename=explode(".",$filename);
	$extension=end($basename);
	$imagename="image".$cn.".".$extension;
	
	
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
			$extension = end(explode(".", $_FILES["file"]["name"]));
			//print_r($_FILES["file"]);
	   
			$typimg=in_array($extension, $allowedExts);
			$typdf=in_array($extension, $allowedExt);
			if ($valid && $typimg) {
				
				$targetPath =  dirname( __FILE__ ) . DIRECTORY_SEPARATOR. $imagename;
				move_uploaded_file($tmpName,$targetPath);
					$result =mysqli_query($_SESSION['connect'],"INSERT INTO technics (img_name,img_desc) VALUES ('".$imagename."','".$_POST['desc']."')");
    $images=preg_grep ('/\.jpg$/i', $files);
				/*$maindir = "../slide/myworks" ;
				$mydir = opendir($maindir) ;
				$files = array();
				$filePaths = array();
				$exclude = array( ".", "..", "index.php",".htaccess") ;
				while($fn = readdir($mydir))
				{
								if (!in_array($fn, $exclude)) 
								{
												$files[] = $fn;
												$filePaths[] = $maindir.'/'.$fn;
												
								}
				}
				//echo var_dump($filePaths);
				foreach($filePaths as $filePath){
					 unlink($filePath);
				}
				closedir($mydir);
			 //$qry =mysqli_query($_SESSION['connect'],"SELECT * FROM `myworks` ORDER BY `id` DESC LIMIT 1");
				//$erw = mysqli_fetch_array($qry);
				//thumb_create($erw['img_name'],'1234','800');*/
			 header( 'Location: ../technic.php' ) ;
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
if(isset($_POST['inx']) )
{echo "ol";
	if(isset($_POST['shakhes']))
	{ 
			 $maindir = "../slide/technic/" ;
				$mydir = opendir($maindir) ;
				$fake = array();
				$filePaths = array();
				$exclude = array( ".", "..", "index.php",".htaccess","my-task.php","technic.php") ;
				while($fn = readdir($mydir))
				{
								if (!in_array($fn, $exclude)) 
								{
												$fake[] = $fn;
												$filePaths[] = $maindir.'/'.$fn;
												
								}
				}
				echo var_dump($filePaths);
				foreach($filePaths as $filePath){
					 unlink($filePath);
				}
				closedir($mydir);
			 $qry =mysqli_query($_SESSION['connect'],"SELECT * FROM `technics` WHERE id='".$_POST['shakhes']."'");
				$erw = mysqli_fetch_array($qry);
			  if($qry){
						echo "ok";
					}
				thumb_create($erw['img_name'],'1234','800');
			 header( 'Location: ../technic.php' ) ;
				exit;
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
                $im->writeImage( '../slide/technic/THUMB_'.$file );
        
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
