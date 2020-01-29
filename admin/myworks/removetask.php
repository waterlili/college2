<?php
// get correct file path
ob_start();
session_start();
include '../../core.php';
$fileName = $_GET['name'];
$filePath = $fileName;
$filethPath = '../slide/myworks/THUMB_'.$fileName;
$folder = 'myworks';
$files = array();
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
	$result =mysqli_query($_SESSION['connect'],"DELETE FROM `myworks` WHERE img_name='".$fileName."'");
	unlink($filePath);
	//header('Location:my-tasks.php');
	if($filethPath){
			
			unlink($filethPath);
			/*$qry =mysqli_query($_SESSION['connect'],"SELECT * FROM `myworks` ORDER BY `id` DESC LIMIT 1");
            $erw =mysqli_fetch_array($qry);
			foreach($files as $file){
				if($file===$erw['img_name']){
					$bounce=$file;
					thumb_create($bounce,'1234','800');
					 header('Location:my-tasks.php');
		             exit;
				}
			}*/
			header('Location:my-tasks.php');
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
                $im->writeImage( 'slide/myworks/THUMB_'.$file );
        
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