<!DOCTYPE html>
<?php
 $parcelcode =$_POST['parcelcode'];   
 $contact =$_POST['contact'];     
 $connect=mysqli_connect('localhost','root','','irpts');
 $sql = "select * from Bookedparcels where code = $parcelcode and (fromcontact='$contact' or tocontact='$contact')";
 $result = $connect->query($sql);
 if ($result->num_rows > 0)
 {
     header("location: ParcelTrackingReport.php?parcelcode=$parcelcode");
     die();
 } 
 else
     $msg = "Parcel code or contact number not provided correctly.";
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
            <li> <a href='index.php'><span>Home Page</span></a></li> 
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
        <p><b><u><div id="inner_text">Data Error </u></b>
        <P>&nbsp</P>
        <div id="inner_text"><?php echo $msg; ?> </div>
        <P>&nbsp</P>
        <P>&nbsp</P>
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

