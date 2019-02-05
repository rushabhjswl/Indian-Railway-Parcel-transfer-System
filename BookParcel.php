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
    {        
             die();
             header("location: errorPage.php?msg1='Session ended'&backurl=index.php");
    }
    
    $fpn = "";
    $fpc = "";
    $tpn = "";
    $tpc = "";
    $wt = "0";       
    $ptype="";
    
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
           <li> <a href='BookParcel.php?hello=true'>
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
           <form  action="BookingTicket.php" method="post">
              <table width="500px" border="1"  align="center">
               <tr align="left">   
                   <td>Booking Date :</td>
                   <td><input type ="date" value= "<?php echo date('Y-m-d');?>" name ="BookingDate" readonly="true"></td>
               </tr>
               <tr  align="left">   
                   <td> From Station Code :</td>
                   <td><input type="text" readonly = "true"  name ="fromcode" value="<?php echo $thisstationcode; ?>"></td>
                                 
               </tr>
                  <tr  align="left">   
                   <td> From Station :</td>
                   <td><input type="text" readonly ="true" name="fromname" value="<?php echo $thisstationname; ?>" </td> 
                              
               </tr>
                  
               <tr  align="left">   
                   <td> To station </td>
                   <td>
                   <?php
                       $connect=mysqli_connect('localhost','root','','irpts');
                       $sql = "SELECT stationcode,stationname FROM stations"; 
                       $result = $connect->query($sql);
                       if ($result->num_rows > 0)
                       {
                         $select= '<select name="tocode">';
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
                   <tr  align="left">    
                       <td>Booking Person name:</td>
                       <td><input type="text" name="from_person_name" size="30" value="<?php echo $fpn ?>" required="true"/></td>
                   </tr>
                   <tr  align="left">    
                       <td>Booking Person Contact:</td>
                       <td><input type="text" name="from_person_contact" size="30" value="<?php echo $fpc ?>"required="true"/></td>
                   </tr>
                   <tr  align="left">    
                       <td>Receiver Person name:</td>
                       <td><input type="text" name="to_person_name" size="30" value="<?php echo $tpn ?>"required="true"/></td>
                   </tr>
                   <tr  align="left">    
                       <td>Receiver Person Contact:</td>
                       <td><input type="text" name="to_person_contact" size="30" value="<?php echo $tpc ?>" required="true"/></td>
                   </tr>                   
                   <tr  align="left">
                       <td>Parcel weight</td>
                       <td> <input type ="text" name="weight" size="20" value="<?php echo $wt ?>" required="true"/></td>
                   </tr>
                   <tr  align="left">
                       <td>Parcel Type</td>
                       <td> <input type ="text" name="ptype" size="20" value="<?php echo $ptype ?>" required="true"/></td>
                   </tr>
                   
                   <tr  align="left">
                       <td><input type="submit"  value="Booking ticket" ></td>
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
