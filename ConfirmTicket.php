<?php
session_start();

    if (isset($_SESSION['user_id'])&& $_SESSION['user_id']!="" ) {
        /// your code here
        $username = $_SESSION['login_user']  ;
        $thisstationcode = $_SESSION['thisstationcode'] ; 
        $thisstationname = $_SESSION['thisstationname']; 
    } 
    else
    {                     die();
               header("location: errorPage.php?msg1='Session ended'&backurl=index.php");

    }
$tocode=$_POST['tocode'];
$fromcode=$_POST['fromcode'];
$from_person_name = $_POST['fromperson'];
$from_person_contact = $_POST['fromcontact'];
$to_person_name = $_POST['toperson'];
$to_person_contact = $_POST['tocontact'];
$weight = $_POST['weight'];
$ptype = $_POST['ptype'];
$distance = $_POST['distance'];
$amount = $_POST['amount'];
$bookdate = $_POST['bookdate'];

$connect=mysqli_connect('localhost','root','','irpts');
$msg1="";
 
if(mysqli_connect_errno($connect))
{
 $msg = 'Failed to connect';
 $msg1="";
}
else
{
   $sql = "SELECT code FROM bookedparcels order by code desc";
   $result = $connect->query($sql);
    if ($result->num_rows > 0)
    {
     $row = $result->fetch_assoc();
     $newcode = $row["code"] + 1;
    }
    else
    {
    $newcode = 1;
    }
     $dt_db = date ("Y-m-d H:i:s"); //, strtotime($bookdate));
     $sql ="INSERT INTO `bookedparcels`(`code`, `bookdate`, `fromcode`, `tocode`, `fromperson`, `fromcontact`, `toperson`, `tocontact`, `weight`,`parcel_type`,`distance`, `amount`)"
            . " VALUES ($newcode,'$dt_db',$fromcode,$tocode,'$from_person_name','$from_person_contact','$to_person_name','$to_person_contact',$weight,'$ptype',$distance,$amount)" ;
          if ($connect->query($sql) === TRUE)
          {
              $msg= "Parcel booking successfull";
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
              
             // echo $newtranscode;
              $sql1 = "INSERT INTO `trans`(`trans_code`, `parcelcode`, `tr_date`, `tr_type`, `stationcode`, `nextstationcode`, `discription`, `status`) "
                      . "VALUES ($newtranscode,$newcode,'$dt_db',1,$thisstationcode,$thisstationcode,'$thisstationname','y')";
              
              if ($connect->query($sql1) === TRUE)
              {
                  $msg1 = "Transferred to store.";
              }
              else
              {  
                  $msg1 = "Transfer to store failed.Perform manually.";
              }
          } 
          else
          {
             $msg= "Error: " . $sql . "<br>" . $connect->error;
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
          <li><a href="BookParcel.php"><span>Parcel Booking</span></a></li>
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
          <li> <a href='staffPage.php?hello=true'>
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
        <div id="inner_text">Parcel code : <?php echo $newcode; ?> </div>
        <P>&nbsp</P>
       <div id="inner_text"><?php echo $msg1; ?> </div>
        <P>&nbsp</P>
        <P>&nbsp</P>
        <div id="inner_text"><INPUT TYPE="button" onClick="window.print()" value="Print ticket"></div>
        <P>.</P>
        <P>&nbsp</P>
    </div>
    </div>        
  <div class="clearthis">&nbsp;</div>
</div>
</body>
</html>

