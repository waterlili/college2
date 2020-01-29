<?php
// get correct file path
$fileName = $_GET['name'];
echo $fileName;
$filePath = 'uploads/'.$fileName;
// remove file if it exists
if ( file_exists($filePath) ) {
	unlink($filePath);
	header('Location:../');
}
?>