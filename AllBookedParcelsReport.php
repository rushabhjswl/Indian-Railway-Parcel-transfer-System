<!DOCTYPE html>
<?php
    session_start();

    if (isset($_SESSION['user_id'])&& $_SESSION['user_id']!="" ) {
        /// your code here
         $username = $_SESSION['login_user']  ;
       //  $thisstationcode = $_SESSION['thisstationcode'] ;
       //  $thisstationname = $_SESSION['thisstationname'];
    }
    else
    {                     die();
              header("location: errorPage.php?msg1='Session ended'&backurl=index.php");

    }
    $stationcode = $_POST['stationcode'];
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
            <li> <a href='AdminPage.php'><span>Home</span></a></li>
            <li> <a href='AdminStationSelect.php'><span>Go Back</span></a></li>
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
            <li> <a href='AllBookedParcelsReport.php?hello=true'>
          <span>Logout</span></a></li>
        </ul>
      </div>
      <div id="header_welcome">
           <h3>Indian Railway Parcel Transfer System</h3>
        <div id="welcome_text">   
           <p/><strong>Username :<?php echo $username; ?></strong>
        </div>
      </div>
    </div>
  </div>
   <div id="header_container"> 
        <?php
          if($stationcode!=0)
          {  $connect=mysqli_connect('localhost','root','','irpts');
              $sql = "SELECT stationname FROM stations where stationcode=$stationcode";
              $result = $connect->query($sql);
              $row = $result->fetch_assoc();
              $stationname = $row['stationname'];                 
          }
          else
              $stationname="All";
          ?>
       <p><b><u><div id="inner_text"> All Booked Parcels : Station - <?php echo $stationname ?></u></b>             
                   <?php
                       $connect=mysqli_connect('localhost','root','','irpts');
                       $sql = "SELECT code,bookdate,parcel_type,weight,amount,fromcode,tocode,fromperson,toperson,fromcontact,tocontact FROM bookedparcels ";
                       if($stationcode!=0)
                       {
                           $sql = $sql." where fromcode=$stationcode ";
                       }
                        $sql = $sql. " order by code desc"; 
                        $result = $connect->query($sql);
                       if ($result->num_rows > 0)
                       {?>
                       <table width="100%" border="1" align="center">
                       <tr>   
                            <td align="left">Parcel Code</td>
                           <td align="left">Booking Date</td>
                          
                           <td align="left">Parcel type</td>
                           <td align="left">From Station</td>
                           <td align="left">From Person</td>
                           <td align="left">Contact No</td> 
                           <td align="left">To Station</td>
                           <td align="left">To Person</td>
                           <td align="left">Contact No</td> 
                           <td align="left">Weight</td>
                           <td align="left">Amount</td>
                        </tr>   
                       <?php    
                          while($row = $result->fetch_assoc())
                          { $fromcode = $row["fromcode"];
                            $tocode = $row["tocode"];
                              $sql1 = "SELECT stationname from stations where stationcode=$fromcode";
                             $result1 = $connect->query($sql1);
                             if($row1 = $result1->fetch_assoc())
                               $fromstation = $row1['stationname'];
                             else
                               $fromstation="NA";
                             $sql2 = "SELECT stationname from stations where stationcode=$tocode";
                             $result2 = $connect->query($sql2);
                             if($row2 = $result2->fetch_assoc())
                               $tostation = $row2['stationname'];
                             else
                                $tostation="NA"; 
                          ?>
                              <tr>   
                                   <td align="right"><?php echo $row['code']?></td>
                                   <td align="left"><?php echo $row['bookdate']?></td>
                                  
                                   <td align="left"><?php echo $row['parcel_type']?></td>
                                   <td align="left"><?php echo $fromstation?></td>
                                   <td align="left"><?php echo $row['fromperson']?></td>
                                   <td align="left"><?php echo $row['fromcontact']?></td>
                                    
                                   <td align="left"><?php echo $tostation?></td>
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
                       echo "No parcels booked";
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
