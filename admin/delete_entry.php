<?php
//session_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
include '../core.php';
$id=$_GET['delete_id'];
$cid=$_GET['check_id'];
if($id){
   $res =mysqli_query($_SESSION['connect'],"DELETE FROM contact WHERE id='".$id."'");
if(isset($res)) {
   echo "YES";
} else {
   echo "NO";
}
}
if($cid){
   $res =mysqli_query($_SESSION['connect'],"UPDATE contact SET status='1' WHERE id='".$cid."'");
if(isset($res)) {
   echo "YES";
} else {
   echo "NO";
}
}

?>