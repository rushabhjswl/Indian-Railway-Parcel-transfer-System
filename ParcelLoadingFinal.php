<?php
session_start();

    if (isset($_SESSION['user_id'])&& $_SESSION['user_id']!="" ) {
        /// your code here
        $username = $_SESSION['login_user']  ;
        $thisstationcode = $_SESSION['thisstationcode'] ; 
        $thisstationname = $_SESSION['thisstationname']; 
    } 
    else
    {         die();
               header("location: errorPage.php?msg1='Session ended'&backurl=index.php");
    }
$loadingdate = $_POST['LoadingDate'];
$parcelcode = $_POST['parcelcode'];
$tocode=$_POST['tocode'];
$nextcode = $_POST['nextcode'];
$train_no = $_POST['train_no'];

$connect=mysqli_connect('localhost','root','','irpts');
$msg1="";
 
if(mysqli_connect_errno($connect))
{
 echo 'Failed to connect';
}
else
{
     $dt_db = date ("Y-m-d H:i:s"); //, strtotime($bookdate));
     $sql1 = "SELECT trans_code FROM trans order by trans_code desc";
     $result = $connect->query($sql1);
     if ($result->num_rows > 0)
     {
        $row = $result->fetch_assoc();
        $newtranscode = $row["trans_code"] + 1;
     }
     else
     {
        $newtranscode = 1;
     }
     
     $sql2 = "update trans set status='n' where parcelcode = $parcelcode " ; //and `trans_code` != $newtranscode";             
     if ($connect->query($sql2) === TRUE)
     {
          $msg1 = "Updation done.";
     }
     else
     {  
        // $msg1 = $sql1;
        $msg1 = "Updation failed.";
      }
         
     $sql = "INSERT INTO `trans`(`trans_code`, `parcelcode`, `tr_date`, `tr_type`, `stationcode`, `nextstationcode`, `discription`, `status`) "
            . "VALUES ($newtranscode,$parcelcode,'$dt_db',2,$thisstationcode,$nextcode,'$train_no','y')";
     if ($connect->query($sql) === TRUE)
     {
          $msg= "Parcel loading done.";
     } 
     else
     {
        $msg= "Error: " . $sql . "<br>" . $connect->error;
     }
     $connect->close(); 

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
            <li><a href="ParcelLoading.php"><span>Load Parcel</span></a></li>
          <li><a href="StaffPage.php"><span>Staff Page</span></a></li>
          <?php
             function LogoutFunction()
             {
                 session_destroy();
                 header("Location: index.php");
                 die();
            }
            if (isset($_GET['hello']))
            {
             LogoutFunction();
            }
          ?>
          <li> <a href='ParcelLoadingFinal.php?hello=true'>
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
          <p><b><u><div id="inner_text">Parcel Loading</u></b>
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
