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
            <li><a href="AdminPage.php"><span>Back</span></a></li>
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
        <p><b><u><div id="inner_text"> Blocked Users List</u></b>
       <div id="inner_text">

           <?php
               $connect=mysqli_connect('localhost','root','','irpts');
               $sql = "SELECT userid,username,usertype,status,stationname FROM users,stations where usertype!='admin' and users.stationcode=stations.stationcode and status='blocked'";
               $result = $connect->query($sql);
               if ($result->num_rows > 0)
               {
                   $count=0;
           ?>
           <table width="750" border="1">
             <tr>
                 <td ><strong>SN</strong></td>
		<td ><strong>User ID</strong></td>
		<td ><strong>User Name</strong></td>
                <td><strong>Type</strong></td>
                <td><strong>Station</strong></td>
                <td><strong>Status</strong> </td> 
                <td><strong>Change</strong> </td> 
                
	    </tr>    
            <?php   
                while($row = $result->fetch_assoc()) 
                {
                $count++;
                $userid = $row['userid'];    
                    //    "<a href='ChangeStatus.php?tocode=$tocode'> &nbsp change...</a>";
                $item = "<a href='ChangeBlockedStatus.php?userid=$userid'> &nbsp Unblock...</a>";
            ?>
             <tr>
                <td><?php echo $count;?></td>
		<td><?php echo $userid;?></td>
                <td><?php echo $row['username'];?></td>               
                <td><?php echo $row['usertype'];?></td>
                <td><?php echo $row['stationname'];?></td>
                <td><?php echo $row['status'];?> </td>                                    
                <td><?php echo $item;?> </td>                                                   
	    </tr>    
            <?php
             
            }
              }
             $connect->close();
             ?>
           </table>
           <p>.</p>
        </div>
    </div>
    </div>        
  <div class="clearthis">&nbsp;</div>
</div>
</body>
</html>

