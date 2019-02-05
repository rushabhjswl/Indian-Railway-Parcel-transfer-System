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
            <li> <a href='AdminPage.php'><span>Go Back</span></a></li>
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
       <p><b><u><div id="inner_text">Create New User</u></b>
          <form action="RecordUser.php" method="post">
              <table width="500px" border="1" align="center">
               <tr >   
                   <td style="height:30px">Full Name :</td>
                   <td style="height:30px"><input type="text" name="fullname" size="30" required="true"/></td>
               </tr>
               <tr >   
                   <td style="height:30px">Type :</td>
                   <td style="height:30px"><input type="text" name="usertype" size="30" value="Parcel Officer" readonly="true"/></td>
               </tr>
               <tr>   
                   <td style="height:30px" >Station </td>
                   <td style="height:30px">
                   <?php
                       $connect=mysqli_connect('localhost','root','','irpts');
                       $sql = "SELECT stationcode,stationname FROM stations"; 
                       $result = $connect->query($sql);
                       if ($result->num_rows > 0)
                       {
                         $select= '<select name="stationcode">';
                         while($row = $result->fetch_assoc())
                         {
                            $select.='<option value="'.$row['stationcode'].'">'.$row['stationname'].'</option>';                
                         }
                        $select.='</select>';
                       echo $select;
                     }
                    else
                    {
                       echo "Invalid database or query";
                    }
                    $connect->close(); ?>
                   </td>
                   
                  <tr>   
                     <td style="height:30px">Userid for login:</td>
                     <td style="height:30px"><input type="text" name="userid" size="30" required="true"/></td>
                  </tr>
                  
                   <tr>
                       <td align="center" style="height:30px"><input type="submit"  value="Login" id="button_eit"></td>
                       <td align="center" style="height:30px"><input type="reset" value="Clear" id="button_eit"></td> 
                   </tr>
                  </table>
            </form>
           <p>.</p>
       </div>
   </div>
    </div>        
  <div class="clearthis">&nbsp;</div>
</div>
</body>
</html>
