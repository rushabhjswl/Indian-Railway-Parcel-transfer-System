<<!DOCTYPE html>
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
     
 $parcelcode =$_POST['parcelcode'];   
 $connect=mysqli_connect('localhost','root','','irpts');
 $sql = "SELECT bookdate,fromcode,tocode,fromperson,fromcontact,toperson,tocontact,parcel_type,stations.stationname FROM bookedparcels,stations where code=$parcelcode and fromcode=stationcode"; 
 $result = $connect->query($sql);
 if ($result->num_rows > 0)
 {         
    $row  = $result->fetch_assoc();
    $bookdate = $row['bookdate'];   
    $fromcode = $row['fromcode'];
    $tocode =$row['tocode'];
    $fromstation = $row['stationname'];
    $fromperson = $row['fromperson']; 
    $fromcontact = $row['fromcontact']; 
    $toperson = $row['toperson']; 
    $tocontact = $row['tocontact'];     
    $ptype = $row['parcel_type'];    
    $sql1 = "select stationname from stations where stationcode=$tocode";
    $result = $connect->query($sql1);
    $row = $result->fetch_assoc();
    $tostationname = $row['stationname'];
}
                       
$connect->close(); 
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
            <li> <a href="ParcelDelivery.php"><span>Go Back</span></a></li>
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
            <li> <a href='ParcelDeliveryConfirm.php?hello=true'>
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
       <p><b><u><div id="inner_text">Parcel Delivery</u></b>
          <form action="ParcelDeliveryFinal.php" method="post">
              <table width="500px" border="1" align="center">
               <tr>   
                   <td align="left" width="250px">Parcel code :</td>
                   <td align="left"><?php echo $parcelcode; ?></td>
               </tr>
               <tr>   
                   <td align="left" width="250px">Booked date :</td>
                   <td align="left"><?php echo $bookdate; ?> </td>
               </tr>
               <tr>   
                   <td align="left" width="250px">From Station :</td>
                   <td align="left"><?php echo $fromstation; ?>(<?php echo $fromcode; ?>) </td>
               </tr>
               <tr>   
                   <td align="left" width="250px">Destination :</td>
                   <td align="left"> <?php echo $tostationname; ?>(<?php echo $tocode; ?>) </td>
               </tr>
               <tr>    
                   <td  align="left">From person:</td>
                   <td align="left"><?php echo $fromperson; ?>(<?php echo $fromcontact; ?>) </td>
               </tr>
               <tr>    
                   <td  align="left">To person:</td>
                   <td align="left"><?php echo $toperson; ?>(<?php echo $tocontact; ?>) </td>
               </tr>
               <tr>    
                   <td  align="left">Parcel type:</td>
                   <td align="left"><?php echo $ptype; ?> </td>
               </tr>
            
                  <tr>  <input type="hidden" name ="parcelcode" value="<?php echo $parcelcode; ?>">
                       <td align="left"><input type="submit"  value="Confirm Delivery" height="30" width="100" ></td>
                   <td align="left"><input type="reset" value="Clear"></td> 
               </tr>
             </table>
            </form>
           <p>&nbsp</p>
       </div>
   </div>
    </div>        
  <div class="clearthis">&nbsp;</div>
</div>
</body>
</html>