<?php
header('Content-type:application/pdf');
header('Content-Transfer-Encoding:binary');
header('Accept-Ranges:bytes');
if (isset($_FILES["file"])) {
    $tmpName = $_FILES["file"]["tmp_name"];
    $fileName = "uploads";

    list($width, $height) = getimagesize($tmpName);
    // check if the file is really an image
    if ($width == null && $height == null) {
        header("Location: index.php");
        return;
    }
    // resize if necessary
    if ($width >= 400 && $height >= 400) {
        $image = new Imagick($tmpFile);
        $image->thumbnailImage(400, 400);
        $image->writeImage($fileName);
    }
    else {
        move_uploaded_file($tmpName, $fileName);
    }
}








//turn on php error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

$filecount=0;

$directory = '/var/www/html/naghashi/admin/uploads/';
if (glob($directory . '*.jpg') || glob($directory . '*.jpeg') || glob($directory . '*.png') || glob($directory . '*.gif'))
{
 $filecount = count(glob($directory . '*.jpg'))+count(glob($directory . '*.jpeg'))+count(glob($directory . '*.png'))+count(glob($directory . '*.gif'));

 
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
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
			$typ=var_dump($_FILES["file"]["type"]);
			$allowedExts = array("gif","jpg", "GIF", "jpeg");
			$allowedExt = array("pdf");
			$extension = end(explode(".", $_FILES["file"]["name"]));
			print_r($_FILES["file"]);
	   
			$typimg=in_array($extension, $allowedExts);
			$typdf=in_array($extension, $allowedExt);
			if ($valid && $typimg) {
				
				$targetPath =  dirname( __FILE__ ) . DIRECTORY_SEPARATOR. 'uploads' . DIRECTORY_SEPARATOR. $imagename;
				$status=move_uploaded_file($tmpName,$targetPath);
				//$im = new Imagick('images/teamicons/'.$newFilename);
				
					//header( 'Location: slider.php' ) ;
				 
				//path to directory to scan
				$directory = "uploads/";
				//get all image files with a .jpg extension. This way you can add extension parser
				$images = glob($directory . "{*.jpg,*.gif}", GLOB_BRACE);
				$listImages=array();
				
				foreach($images as $image){
					echo $image;
					$listImages=$image;
					$img = explode('/',$listImages);
					echo $img[1];
					
					$imname = $img[1];
				    
					// Content type
					header('Content-Type: image/jpeg');
					
					// Get new dimensions
					list($width, $height) = getimagesize($imname);
					$new_width = 1900;
					$new_height = 900;
					
					// Resample
					$image_p = imagecreatetruecolor($new_width, $new_height);
					$image = imagecreatefromjpeg($imname);
					$exa=imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
					$vdir_upload ="../images/slider/";
					imagejpeg($image_p,$vdir_upload . "small_" . $imname);
					$image = $image_p;
				    
				
				
				
				thumb_create('image1.jpg','1900','900');
				
				header( 'Location: slider.php' ) ;
				exit;
				}
			}
			if($valid && $typdf){
				$targetPath =  dirname( __FILE__ ) . DIRECTORY_SEPARATOR. 'books' . DIRECTORY_SEPARATOR. $_FILES['file']['name'];
				move_uploaded_file($tmpName,$targetPath);
				header( 'Location: slider.php' ) ;
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
                $im->writeImage( 'slide/THUMB_'.$file );
        
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

?>
