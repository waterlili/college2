<?php
// get correct file path
$fileName = $_GET['name'];
$fileset="THUMB_".$fileName;
$filePath = 'uploads/'.$fileName;
$maindir = 'slide/'.$fileset ;
$mydir = opendir($maindir) ;
$files = array();
$page='';
$exclude = array( ".", "..", "index.php",".htaccess","guarantee.gif") ;
while($fn = readdir($mydir))
{
    if (!in_array($fn, $exclude)) 
    {
        $files[] = $fn;
		
    }
}
closedir($mydir);

if(strpos($files,$fileName)!=false){
	echo "pksdjf";
}
//var_dump($files);
// remove file if it exists
if ( file_exists($filePath) ) {
	unlink($filePath);
	//header('Location:slider.php');
}
if ( file_exists($maindir) ) {
	unlink($maindir);
	header('Location:slider.php');
}
?>