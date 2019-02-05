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
     
 $parcelcode =$_POST['parcelcode'];   
    
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
           <li> <a href='ParcelLoading.php?hello=true'>
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
       <p><b><u><div id="inner_text">Parcel Loading</u></b>
          <form action="ParcelLoadingFinal.php" method="post">
              <table width="500px" border="1" align="center">
               <tr>   
                   <td align="">Loading Date :</td>
                   <td><input type ="date" value= "<?php echo date('Y-m-d');?>" name ="LoadingDate" readonly="true"></td>
               </tr>
               <tr>   
                   <td align="left" width="250px">Parcel code :</td>
                   <td align="left"><?php echo $parcelcode; ?></td>
               </tr>
                  <tr><td align="left"> Destination </td>                      
                     <td>   
                   <?php
                       $connect=mysqli_connect('localhost','root','','irpts');
                       $sql = "SELECT bookedparcels.tocode,stations.stationname FROM bookedparcels,stations where bookedparcels.code=$parcelcode and bookedparcels.tocode = stations.stationcode"; 
                       $result = $connect->query($sql);
                       if ($result->num_rows > 0)
                       {
                         
                         if($row = $result->fetch_assoc())
                         {  
                            $destination = $row['stationname']; 
                            $tocode = $row['tocode'];
                           // $select.='<option value="'.$row['parcelcode'].'">'.$row['parcelcode'].'</option>';                
                         }
                         else
                             $destination = "NA";
                        
                       echo $destination;
                       }
                       
                    $connect->close(); ?>
                         <input type="hiden" name="tocode" value="<?php echo $tocode;   ?>">
                   </td>
               </tr>
                   <tr>    
                       <td  align="left">To Station:</td>
                       <td  align="left">
                   <?php
                    $connect=mysqli_connect('localhost','root','','irpts');
                       $sql = "SELECT stationcode,stationname FROM stations"; 
                       $result = $connect->query($sql);
                       if ($result->num_rows > 0)
                       {
                         $select= '<select name="nextcode">';
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
                    ?>
                   </td>
                   </tr>
                   <tr>    
                       <td  align="left">Train No:</td>
                       <td  align="left"><input type="text" name="train_no" size="30" required="true"/></td>
                   </tr>
                    <tr>
                       <td align="left"><input type="submit"  value="Booking ticket" ></td>
                       <td align="left"><input type="reset" value="Clear"></td> 
                   </tr>
                  </table>
              <input type="hidden" name ="parcelcode" value="<?php echo $parcelcode; ?>">
            </form>
           <p>&nbsp</p>
       </div>
   </div>
    </div>        
  <div class="clearthis">&nbsp;</div>
</div>
</body>
</html>
