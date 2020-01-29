<?php
session_start();

//turn on php error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../../core.php';
ob_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	session_start();
    include '../../core.php';
	
	$name     = $_FILES['file']['name'];
	$tmpName  = $_FILES['file']['tmp_name'];
	$error    = $_FILES['file']['error'];
	$size     = $_FILES['file']['size'];
    $ext	  = strtolower(pathinfo($name, PATHINFO_EXTENSION));
    
	$imgname     = $_FILES['image']['name'];
	$imgtmpName  = $_FILES['image']['tmp_name'];
	$imgerror    = $_FILES['image']['error'];
	$imgsize     = $_FILES['image']['size'];
    $imgext	  = strtolower(pathinfo($imgname, PATHINFO_EXTENSION));   
	
    $directory = '/var/www/html/naghashi/admin/books/';
     $filecount = count(glob($directory . '*.jpg'))+count(glob($directory . '*.jpeg'))+count(glob($directory . '*.png'))+count(glob($directory . '*.gif'))+count(glob($directory . '*.pdf'));
      $cn=$filecount/2;

	
	     if($filecount==0){
	        $j=0;
			//upload file
            $file_ext = explode('.',$name);
            $file_ext = strtolower(end($file_ext));
            
            $allowed = array('pdf');
            if(in_array($file_ext,$allowed)){
                if($error===0){
                    if($size<=10240000){
                       $file_name_new = 'file'.$j.'.'. $file_ext;
                       $file_destination =  $file_name_new;
                       if(move_uploaded_file($tmpName,$file_destination)){
						//$_SESSION['sabt']="sabt";
                        //$sabt=$_SESSION['sabt'];
						//$variable = 'abc';
						//$salt = 'your secret key';
                        //$hash = md5($salt.$variable);
                        //header( "Location: books.php?variable=$variable&hash=$hash" ) ;
                        //check session and then print a success message
                       
                        
                       }
                    }
                }
            }
			
			//upload file
            $file_ext = explode('.',$imgname);
            $file_ext = strtolower(end($file_ext));
            
            $allowedimg = array('jpg','jpeg','gif','png');
            if(in_array($file_ext,$allowedimg)){
                if($error===0){
                    if($size<=10240000){
                       $file=explode('.',$file_name_new);
                       $img_name_new = $file[0].'.'. $file_ext;
                       $file_destination =  $img_name_new;
                       if(move_uploaded_file($imgtmpName,$file_destination)){
						//$_SESSION['sabt']="sabt";
                        //$sabt=$_SESSION['sabt'];
						thumb_create($img_name_new,'200','200');
                        //check session and then print a success message
                       
                        
                       }
                    }
                }
            }
			            //$result =mysqli_query($_SESSION['connect'],"INSERT INTO books (bk_name,bk_author,bk_img,bk_pdf) VALUES ('".$imagename."','".$_POST['nam']."','".$_POST['pishe']."','".$_POST['tip']."')");
		                $variable = 'abc';
						$salt = 'your secret key';
                        $hash = md5($salt.$variable);
						//$result =mysqli_query($_SESSION['connect'],"INSERT INTO books (bk_name,bk_author,bk_img,bk_pdf) VALUES ('".$_POST['bk_name']."','".$_POST['bk_author']."','".$file_name_new."','".$file_name_new."')");
						//$result =mysqli_query($_SESSION['connect'],"INSERT INTO books (bk_name) VALUES ('sfdjl')");
                         $result =mysqli_query($_SESSION['connect'],"INSERT INTO books (bk_name,bk_author,bk_img,bk_pdf) VALUES ('".$_POST['bk_name']."','".$_POST['bk_author']."','".$img_name_new."','".$file_name_new."')");
                        header( "Location: ../books.php?variable=$variable&hash=$hash" ) ;
            }
            else{
	
			//upload file
            $file_ext = explode('.',$name);
            $file_ext = strtolower(end($file_ext));
            
            $allowed = array('pdf');
            if(in_array($file_ext,$allowed)){
                if($error===0){
                    if($size<=10240000){
                       $file_name_new = 'file'.$cn.'.'. $file_ext;
                       $file_destination = $file_name_new;
                       if(move_uploaded_file($tmpName,$file_destination)){
						//$_SESSION['sabt']="sabt";
                        //$sabt=$_SESSION['sabt'];
						//$variable = 'abc';
						//$salt = 'your secret key';
                        //$hash = md5($salt.$variable);
                        //header( "Location: books.php?variable=$variable&hash=$hash" ) ;
                        //check session and then print a success message
                       
                        
                       }
                    }
                }
            }
			
			//upload file
            $file_ext = explode('.',$imgname);
            $file_ext = strtolower(end($file_ext));
            
            $allowedimg = array('jpg','jpeg','gif','png');
            if(in_array($file_ext,$allowedimg)){
                if($error===0){
					/*2097152*/
                    if($size<=10240000){
                       $file=explode('.',$file_name_new);
                       $img_name_new = $file[0].'.'. $file_ext;
					   $file_destination =  $img_name_new;
                       if(move_uploaded_file($imgtmpName,$file_destination)){
						//$_SESSION['sabt']="sabt";
                        //$sabt=$_SESSION['sabt'];
						
                        //check session and then print a success message
						
                        thumb_create($img_name_new,'200','200');
						
                        
                       }
                    }
                }
            }
			            
		                $variable = 'abc';
						$salt = 'your secret key';
                        $hash = md5($salt.$variable);
                        $result =mysqli_query($_SESSION['connect'],"INSERT INTO books (bk_name,bk_author,bk_img,bk_pdf) VALUES ('".$_POST['bk_name']."','".$_POST['bk_author']."','".$img_name_new."','".$file_name_new."')");
                        header( "Location: ../books.php?variable=$variable&hash=$hash" ) ;
            }
                       
}
//Dynamically resize image
function thumb_create($pic, $width , $height ) {
        try
        {
                /*** the image file ***/
                $image = $pic;
        
                /*** a new imagick object ***/
                $im = new Imagick();
        
                /*** ping the image ***/
                $im->pingImage($image);
        
                /*** read the image into the object ***/
                $im->readImage( $image );
        
                /*** thumbnail the image ***/
                $im->thumbnailImage( $width, $height );
        
                /*** Write the thumbnail to disk ***/
                $im->writeImage( '../slide/books/THUMB_'.$pic );
        
                /*** Free resources associated with the Imagick object ***/
                $im->destroy();
                return 'THUMB_'.$pic;
                
        }
        catch(Exception $e)
        {
                print $e->getMessage();
                return $pic;
        }
};
ob_end_flush();
	 

?>