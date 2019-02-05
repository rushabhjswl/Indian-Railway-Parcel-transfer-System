<?php
$parcelcode = $_GET['parcelcode'];
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
            <li> <a href='index.php'><span>HomePage</span></a></li>
        </ul>
      </div>
      <div id="header_welcome">
        <h3>Indian Railway Parcel Transfer System</h3>
        <div id="welcome_text">   
        </div>
      </div>
    </div>
  </div>
  
   <div id="header_container"> 
       <p><b><u><div id="inner_text"> Parcel Traces</u></b>
              <table width="500px" border="1" align="center">
               <tr>   
                   <td align="left"">Date</td>
                   <td align="left"> Status </td>
                   <td align="left">Discription</td>                   
              </tr>
                 
                   <?php
                       $connect=mysqli_connect('localhost','root','','irpts');
                      $sql = "SELECT * FROM trans where parcelcode=$parcelcode ";                       
                       $result = $connect->query($sql);
                       if ($result->num_rows > 0)
                       {
                         while($row = $result->fetch_assoc())
                         {
                            $trdate = $row['tr_date'];
                            $trtype = $row['tr_type'];
                            $discr = $row['discription'];
                            $stationcode = $row['stationcode'];
                           
                            if($trtype==1)
                                $status = "Booked";
                            else if($trtype==2)
                                $status = "Loaded";
                            else if($trtype==3)
                                $status = "Unloaded";
                            else if($trtype==4)
                                $status = "Delivered";
                            else
                                $status = "-";
                                
                            $sql1 = "select stationname from stations where stationcode=$stationcode";
                            $result1 = $connect->query($sql1);
                            $row1 = $result1->fetch_assoc();
                            $stationname = $row1['stationname'];
                            ?>
                  <tr>
                      <td> <?php echo $trdate; ?></td>
                      <td> <?php echo $status; ?> &nbsp <?php echo $stationname;?> </td>
                      <td><?php echo $discr ;?>
                  </tr>
                            
                  <?php   }                         
                       }
                    $connect->close(); ?>
              </table>
           <p>&nbsp</p>
       </div>
   </div>
    </div>        
  <div class="clearthis">&nbsp;</div>
</div>
</body>
</html>
