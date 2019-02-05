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
            <li> <a href='StaffPasswordChange.php?hello=true'>
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
       <p><b><u><div id="inner_text">Password Change</u></b>
          <form action="PasswordChangeFinal.php" method="post">
              <table width="500px" border="1" align="center">
               <tr>   
                   <td align="">Current Password :</td>
                   <td><input type="password" name="curpass" size="30" required="true"/></td>
               </tr>
               <tr>   
                   <td> New Password :</td>
                   <td><input type="password"  name ="newpass" size="30" required="true"/>                 
                   </td>           
               </tr>
               <tr>   
                   <td> Retype New Password :</td>
                   <td><input type="password"  name ="renewpass" size="30" required="true"/>                 
                   </td>           
               </tr>
                   <tr>
                       <td><input type="submit"  value="Change Password" ></td>
                       <td><input type="reset" value="Clear"></td> 
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
