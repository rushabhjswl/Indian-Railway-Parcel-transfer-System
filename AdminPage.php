<?php
    session_start();

    if (isset($_SESSION['user_id'])&& $_SESSION['user_id']!="" ) {
        /// your code here
        $username = $_SESSION['login_user']  ;
    }
    else
    {         die();
             header("location: errorPage.php?msg1='Failed to connect'&backurl=AdminLogin.php");
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
            <li><a href="ListUser.php"><span>P.O. List</span></a></li>
            <li><a href="CreateUser.php"><span>Create New</span></a></li>
            <li><a href="BlockUser.php"><span>Block</span></a></li>
            <li><a href="UnblockUser.php"><span>Unblock</span></a></li>
            <li><a href="AdminStationSelect.php"><span>All Booked Parcels</span></a></li>            
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
          <li> <a href='AdminPage.php?hello=true'>
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
        <p><b><u><div id="inner_text">Admin Page</u></b>
       <div id="inner_text">
        <P>&nbsp 1. List All available Parcel Officers.</P>
        <P>&nbsp 2. Create new Parcel Officer.</P>
        <P>&nbsp 3. Block the Parcel Officer.</P>
        <P>&nbsp 4. Unblock the Parcel Officer </P>
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

