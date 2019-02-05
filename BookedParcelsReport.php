<!DOCTYPE html>
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
    $showbutton=1;
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
            <li> <a href='StaffPage.php'><span>Go Back</span></a></li>
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
            <li> <a href='BookedParcelsReport.php?hello=true'>
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
       <p><b><u><div id="inner_text"> Parcels booked from this station</u></b>                                  
                   <?php
                       $connect=mysqli_connect('localhost','root','','irpts');
                       $sql = "SELECT code,bookdate,parcel_type,fromperson,fromcontact,toperson,tocontact,weight,amount,fromperson,stations.stationname "
                               . "FROM bookedparcels,stations where fromcode=$thisstationcode and"
                               . "  tocode=stations.stationcode order by code desc"; 
                       $result = $connect->query($sql);
                       if ($result->num_rows > 0)
                       {?>
                       <table width="100%" border="1" align="center">
                       <tr>   
                           <td align="left">Booking Date & Time</td>
                           <td align="left">Parcel Code</td>
                           <td align="left">Parcel type</td>
                           <td align="left">To Station</td>
                           <td align="left">From Person</td>
                           <td align="left">Contact</td>
                           <td align="left">To Person</td>
                           <td align="left">Contact</td>
                            <td align="left">Weight</td>
                           <td align="left">Amount</td>
                        </tr>   
                       <?php    
                          while($row = $result->fetch_assoc())
                          {?>
                              <tr>   
                                   <td align="left"><?php echo $row['bookdate']?></td>
                                   <td align="right"><?php echo $row['code']?></td>
                                   <td align="left"><?php echo $row['parcel_type']?></td>
                                   <td align="left"><?php echo $row['stationname']?></td>
                                   <td align="left"><?php echo $row['fromperson']?></td>
                                   <td align="left"><?php echo $row['fromcontact']?></td>
                                   <td align="left"><?php echo $row['toperson']?></td>
                                   <td align="left"><?php echo $row['tocontact']?></td>                                   
                                   <td align="right"><?php echo number_format($row['weight'],3) ?></td>
                                   <td align="right"><?php echo number_format($row['amount'],2) ?></td>
                            </tr>                 
                        <?php  }  
                        ?>
                             </table>
                      <?php
                       }
                    else
                    {                       
                       echo "No parcels booked from here";
                    }
                    $connect->close(); ?>
           <p>&nbsp</p>
       </div>
   </div>
    </div>        
  <div class="clearthis">&nbsp;</div>
</div>
</body>
</html>
