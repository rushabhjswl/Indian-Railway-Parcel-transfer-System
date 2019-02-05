<?php
$tocode=$_POST['tocode'];
$fromcode=$_POST['fromcode'];
$from_person_name = $_POST['from_person_name'];
$from_person_contact = $_POST['from_person_contact'];
$to_person_name = $_POST['to_person_name'];
$to_person_contact = $_POST['to_person_contact'];
$weight = $_POST['weight'];
$ptype = $_POST['ptype'];
$bookdate = $_POST['BookingDate'];
session_start();
$yn=0;
$backurl = "BookParcel.php";  //?fpn='$from_person_name'&fpc='$from_person_contact'&tpn='$to_person_name'&tpc='$to_person_contact'&wt=$weight";
if(is_numeric($from_person_contact))
 {
   if($from_person_contact>=1000000000 && $from_person_contact<=9999999999) 
    {
       $from_person_contact="0".$from_person_contact;
       $yn=1;
    }
   else
   {
     header("location: ErrorPage.php?msg1='Sender's Mobile Number is not valid'&backurl=$backurl");
    }
}
else
 {
       header("location: ErrorPage.php?msg1='Sender's Mobile Number is not valid'&backurl=$backurl");
  }
if(is_numeric($to_person_contact))
 {
   if($to_person_contact>=1000000000 && $to_person_contact<=9999999999) 
    {
       $to_person_contact="0".$to_person_contact;
       $yn=1;
    }
   else
   {
     header("location: ErrorPage.php?msg1='Receiver's Mobile Number is not valid'&backurl=$backurl");
    }
}
else
 {
       header("location: ErrorPage.php?msg1='Receiver's Mobile Number is not valid'&backurl=$backurl");
  }

  
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
            $mf = 1;
             if($weight<=10)
             {     $mf=1;}
             else if($weight<=20)
             {    $mf=2;}
             elseif($weight<=30)
             {    $mf=3;}
             elseif($weight<=40)
             {    $mf=4;}
             elseif($weight<=50)
             {    $mf=5;}
             elseif($weight<=60)
             {    $mf=6;}
             elseif($weight<=70)
             {    $mf=7;}
             elseif($weight<=80)
             {    $mf=8;}
             elseif($weight<=90)
             {    $mf=9;}
             elseif($weight<=100)
             {    $mf=10;}
             else
             {    $mf=15;}
    
//echo 'hello booking ticket';
//echo  $tocode;echo "|";//
//echo $fromcode;echo "|";
//echo $person_name;echo "|";
//echo $weight;echo "|";
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
        
            <li><a href="#"><span>Cancel<span></a></li>
          <li><a href="BookParcel.php"><span>Go Back</span></a></li>
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
          <li> <a href='BookingTicket.php?hello=true'>
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
<?php   
  $connect=mysqli_connect('localhost','root','','irpts');
         if(! mysqli_connect_errno($connect))
         {
          $sql = "SELECT kms FROM distances where (fromcode='$fromcode' and tocode='$tocode') or (fromcode='$tocode' and tocode='$fromcode')";
          $result = $connect->query($sql);
          if ($result->num_rows > 0)
          {
             if($row = $result->fetch_assoc())
                 {
                   $distance = $row['kms'];                
                 }
             else
             {
                 $distance = 0;
             }
          }
          else
              $distance=0;
          ////
          $sql = "SELECT stationname FROM stations where stationcode='$tocode'";
          $result = $connect->query($sql);
          if ($result->num_rows > 0)
          {
             if($row = $result->fetch_assoc())
                 {
                   $tostationname = $row['stationname'];                 
                 }
          }
          ////
          $sql = "SELECT rate FROM rates where fromdistance<='$distance' and todistance>= '$distance'";
          $result = $connect->query($sql);
          $amt=0;
          if ($result->num_rows > 0)
          {
             if($row = $result->fetch_assoc())
                 {
                   $rate = $row['rate'];                   
                   $amt = $rate*$mf;                 
                 }
             else
             {
                   $rate = 0;                   
                   $amt = 0;                                 
             }
          }
         }    
  ?>
   <div id="header_container">      
       
       <P><div id = "inner_text">Booking Ticket</div></P>
       <table width="500px" border="1" align="center" >
           <div id="inner_text">
           <tr>
               <td width="250px">Date         :</td>
               <td><?php echo $bookdate; ?><td>
           </tr>
           <tr>
               <td>From Person name  :</td>
               <td><?php echo $from_person_name; ?></td>
           </tr>
           <tr>
               <td>From Person Contact no.  :</td>
               <td><?php echo $from_person_contact; ?></td>
           </tr>
           <tr>
               <td>To Person name  :</td>
               <td><?php echo $to_person_name; ?></td>
           </tr>
           <tr>
               <td>To Person Contact no.  :</td>
               <td><?php echo $to_person_contact; ?></td>
           </tr>               
           <tr>    
               <td>From Station :</td>
               <td><?php echo $fromcode;?>(<?php echo $thisstationname;  ?> ) </td>
           </tr> 
           <tr>
               <td>To Station   :</td>
               <td><?php echo $tocode; ?>(<?php echo $tostationname;  ?> ) </td>
           </tr>
           <tr>
               <td>Distance(KMs):</td>
               <td><?php echo $distance; ?></td>
           </tr>
           <tr>
               <td>Weight(kg):</td>
               <td><?php echo $weight; ?></td>
           </tr>
           <tr>
               <td>Parcel type:</td>
               <td><?php echo $ptype; ?></td>
           </tr>
           <tr>
               <td>Amount (Rs)  :</td>
               <td><?php echo ($amt); ?></td>
         </tr>
               <tr>
                   <td colspan="2" align="center">
      <form action="ConfirmTicket.php" method="post">
      <input type="hidden" name ="bookdate" value="<?php echo $bookdate; ?>">
      <input type="hidden" name ="fromcode" value="<?php echo $fromcode; ?>">
      <input type="hidden" name ="tocode" value="<?php echo $tocode; ?>">
      <input type="hidden" name ="fromperson" value="<?php echo $from_person_name; ?>">
      <input type="hidden" name ="fromcontact" value="<?php echo $from_person_contact; ?>">
      <input type="hidden" name ="toperson" value="<?php echo $to_person_name; ?>">
      <input type="hidden" name ="tocontact" value="<?php echo $to_person_contact; ?>">
      <input type="hidden" name ="weight" value="<?php echo $weight; ?>">
      <input type="hidden" name ="ptype" value="<?php echo $ptype; ?>">
      <input type="hidden" name ="distance" value="<?php echo $distance; ?>">
      <input type="hidden" name ="amount" value="<?php echo $amt; ?>">
      <input type="submit" value="Submit">    
  </form>
        
                   </td>
               </tr>  
       </table>
       <p>.</p>
       <p>.</p>
    </div>
    </div>        
  <div class="clearthis">&nbsp;</div>
</div>
</body>
</html>
