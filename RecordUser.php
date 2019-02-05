<?php
$fullname = $_POST['fullname'];
$usertype = $_POST['usertype'];
$stationcode = $_POST['stationcode'];
$userid = $_POST['userid'];
$connect=mysqli_connect('localhost','root','','irpts');
$sql = "INSERT INTO `users`(`userid`, `password`, `username`, `usertype`, `stationcode`, `status`) "
        . "VALUES ('$userid','$userid','$fullname','$usertype',$stationcode,'active')";

if ($connect->query($sql) === TRUE)
{
    $msg1 = "New User Registration successfull.";
}
else
{  
    $msg1 = "Transfer to store failed.";
}
header("location: Errorpage.php?msg1=$msg1&backurl=CreateUser.php");
$connect->close();
?>