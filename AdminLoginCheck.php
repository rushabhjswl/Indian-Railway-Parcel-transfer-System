<?php
// session_start();
$user_id=$_POST['username'];
$password=$_POST['newpass'];

$connect=mysqli_connect('localhost','root','','irpts'); 
if(mysqli_connect_errno($connect))
{
 header("location: errorPage.php?msg1='Failed to connect'&backurl=AdminLogin.php");
}
else
{
// create a variable 
$sql = "SELECT * FROM users where userid='$user_id' and password='$password' and usertype='admin'";
$result = $connect->query($sql);

if ($result->num_rows > 0)
{
   $row = $result->fetch_assoc();
   session_start(); 
   $username = $row["username"];
   $_SESSION['login_user'] = $username;
   $_SESSION['user_id'] = $user_id;
   header("location: AdminPage.php");
    
} else
    {
     header("location: errorPage.php?msg1='Invalid Username or password'&backurl=AdminLogin.php");
}
 $connect->close();

}
?>


