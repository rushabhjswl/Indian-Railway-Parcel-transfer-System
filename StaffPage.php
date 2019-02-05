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
            <li><a href="LoadParcelSelect.php"><span>Load Parcel</span></a></li>
            <li><a href="UnloadParcelSelect.php"><span>Unload parcel</span></a></li>
            <li><a href="ReloadParcelSelect.php"><span>Reload parcel</span></a></li>
            <li><a href="ParcelDelivery.php"><span>Delivery</span></a></li>
            <li><a href="BookedParcelsReport.php"><span>All Booked parcels</span></a></li>
            <li><a href="StaffPasswordChange.php"><span>Change password</span></a></li>
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
        <p><b><u><div id="inner_text">Staff Page</u></b>
       <div id="inner_text">
        <P>&nbsp 1. Book the parcel. Then parcel goes to store.</P>
        <P>&nbsp 2. Load the parcel in the proper train.</P>
        <P>&nbsp 3. Receive the parcel at specific station.</P>
        <P>&nbsp 4. Repeat step 2,3 till parcel finishes the rout to the destination </P>
        <P>&nbsp 5. Deliver the parcel to appropriate person.</P>
        <P>&nbsp</P>
        <P>&nbsp</P>
        <P>&nbsp</P>
        </div>
    </div>
    </div>        
  <div class="clearthis">&nbsp;</div>
</div>
</body>
</html>

