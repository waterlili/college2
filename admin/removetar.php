<?php
// get correct file path
ob_start();
session_start();
include '../core.php';
$fileName = $_GET['name'];
$filePath = 'tarahi/'.$fileName;
$files = array();
$exclude = array( ".", "..", "index.php",".htaccess","guarantee.gif","tarahi.php") ;
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
	$result =mysqli_query($_SESSION['connect'],"DELETE FROM `tarahi` WHERE img_name='".$fileName."'");
	unlink($filePath);
	header('Location:tarahi.php');
	}
?>