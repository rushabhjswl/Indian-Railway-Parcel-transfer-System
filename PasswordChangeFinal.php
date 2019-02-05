<?php
session_start();

    if (isset($_SESSION['user_id'])&& $_SESSION['user_id']!="" ) {
        /// your code here
        $userid = $_SESSION['user_id'];
        $username = $_SESSION['login_user']  ;
        $thisstationcode = $_SESSION['thisstationcode'] ; 
        $thisstationname = $_SESSION['thisstationname']; 
    } 
    else
    {         die();
              header("location: errorPage.php?msg1='Session ended'&backurl=index.php");
    }
$curpass=$_POST['curpass'];
$newpass=$_POST['newpass'];
$renewpass = $_POST['renewpass'];

if($newpass != $renewpass)
{
    $msg = "New passwords are not matching.";
    $msg1="";
}
else
{    
  $connect=mysqli_connect('localhost','root','','irpts');
  $msg="";
  $msg1="";
  if(mysqli_connect_errno($connect))
  {
     $msg = 'Failed to connect';
     $msg1 ="Contact Admin";
  }
  else 
 {
   $sql = "SELECT * FROM users where userid='$userid' and password='$curpass'";
   $result = $connect->query($sql);
    if ($result->num_rows > 0)
    {
       $sql = "update users set password = '$newpass' where userid='$userid'";
       if($connect->query($sql)===TRUE)
       {    $msg = "Password successfully changed";
            $msg1 = "Next time login with new password";
       }
       else
       {
           $msg = "Error while changing password.Retry later.";
           $msg1="";
       }
    }
    else
    {
      $msg = "No such user exists";
      $msg1 = "Existing password is not valid";
      }
}
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>IRPTS</title>
<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
</head>
<body>
<div id="container">
  <!-- Start of Page Header -->
  <div id="header_container">
    <div id="page_header">
      <div id="header_company">
        <h1><span></span></h1>
        
      </div>
      <div id="header_menu">
        <ul>
            <li><a href="StaffPasswordChange.php"><span>Back</span></a></li>
          <li><a href="StaffPage.php"><span>Staff Page</span></a></li>
          <?php
             function LogoutFunction() {
                 session_destroy();
                 header("Location: index.php");
                 die();
            }
            if (isset($_GET['hello'])) {
             LogoutFunction();
  }
?>
          <li> <a href='PasswordChangeFinal.php?hello=true'>
          <span>Logout</span></a></li>
        </ul>
      </div>
      <div id="header_welcome">
        <h3>Indian Railway Parcel Transfer System</h3>
        <div id="welcome_text">   
            <p/><strong>Username :<?php echo $username; ?></strong>
            <p/><strong> Station : <?php echo $thisstationname; ?></strong>      
        </div>
      </div>
    </div>
  </div>
  
   <div id="header_container">      
        <p><b><u><div id="inner_text">Parcel Booking</u></b>
        <P>&nbsp</P>
        <div id="inner_text"><?php echo $msg; ?> </div>
        <P>&nbsp</P>
        <P>&nbsp</P>
         <div id="inner_text"><?php echo $msg1; ?> </div>
        <P>&nbsp</P>
        <P>&nbsp</P>
        <P>&nbsp</P>
        <P>&nbsp</P>
    </div>
    </div>        
  <div class="clearthis">&nbsp;</div>
</div>
</body>
</html>

