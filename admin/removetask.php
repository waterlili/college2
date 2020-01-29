<?php
// get correct file path
ob_start();
session_start();
include '../core.php';
$fileName = $_GET['name'];
$filePath = 'myworks/'.$fileName;
$files = array();
$exclude = array( ".", "..", "index.php",".htaccess","guarantee.gif","my-task.php","removetask.php") ;
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
	$result =mysqli_query($_SESSION['connect'],"DELETE FROM `myworks` WHERE img_name='".$fileName."'");
	unlink($filePath);
	header('Location:my-tasks.php');
	}
?>