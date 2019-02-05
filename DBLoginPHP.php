<?php
// session_start();
$user_id=$_POST['user_name'];
$password=$_POST['password'];


//echo "user ", $user_id;

$connect=mysqli_connect('localhost','root','','irpts');
 
if(mysqli_connect_errno($connect))
{
 header("location: errorPage.php?msg1='Failed to connect'&backurl=AdminLogin.php");
}
else
{
// create a variable 
$sql = "SELECT username,stationcode,status FROM users where userid='$user_id' and password='$password'";
$result = $connect->query($sql);

if ($result->num_rows > 0)
{
    if($row = $result->fetch_assoc())
    {       
        if($row['status']=='blocked')
        {
             header("location: errorPage.php?msg1='You are blocked. Contact Admin.'&backurl=Index.php");
             die();
        }
        else
        {
        session_start(); 
        $username = $row["username"];
        $stationcode = $row["stationcode"];
        $_SESSION['login_user'] = $username;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['thisstationcode']= $stationcode;         
        $connect=mysqli_connect('localhost','root','','irpts');
        if(! mysqli_connect_errno($connect))
        {
          $sql = "SELECT stationname FROM stations where stationcode='$stationcode'";
          $result = $connect->query($sql);
          if ($result->num_rows > 0)
          {
             while($row = $result->fetch_assoc())
                 {
                   $stationname = $row["stationname"];
                 }
          }
         }
        $_SESSION['thisstationname'] = $stationname;      
         header("location: staffpage.php");
         //echo "User ", $username;
         //echo "Station code ", $row["stationcode"];
        }
    }
} else {
     header("location: errorPage.php?msg1='Invalid Username or password'&backurl=index.php");
}
 $connect->close();

}
?>


