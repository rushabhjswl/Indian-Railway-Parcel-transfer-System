<?php
$userid = $_GET['userid'];
$connect=mysqli_connect('localhost','root','','irpts');
$sql = "Update users set status = 'blocked' where userid = $userid"; 
$connect->query($sql);
//echo $sql;
header("location: BlockUser.php");
?>