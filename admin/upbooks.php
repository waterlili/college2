<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
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
	
	
	
	
	
			//upload file
            $file_ext = explode('.',$name);
            $file_ext = strtolower(end($file_ext));
            
            $allowed = array('pdf');
            if(in_array($file_ext,$allowed)){
                if($error===0){
                    if($size<=2097152){
                       $file_name_new = uniqid('',true) .'.'. $file_ext;
                       $file_destination = 'books/' . $file_name_new;
                       if(move_uploaded_file($tmpName,$file_destination)){
						//$_SESSION['sabt']="sabt";
                        //$sabt=$_SESSION['sabt'];
						$variable = 'abc';
						$salt = 'your secret key';
                        $hash = md5($salt.$variable);
                        header( "Location: books.php?variable=$variable&hash=$hash" ) ;
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
                    if($size<=2097152){
                       $file_name_new = uniqid('',true) .'.'. $file_ext;
                       $file_destination = 'books/' . $file_name_new;
                       if(move_uploaded_file($tmpName,$file_destination)){
						//$_SESSION['sabt']="sabt";
                        //$sabt=$_SESSION['sabt'];
						$variable = 'abc';
						$salt = 'your secret key';
                        $hash = md5($salt.$variable);
                        header( "Location: books.php?variable=$variable&hash=$hash" ) ;
                        //check session and then print a success message
                       
                        
                       }
                    }
                }
            }
			
			
}

	

?>