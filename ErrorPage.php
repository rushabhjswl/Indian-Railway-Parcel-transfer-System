<?php
$msg1 = $_GET['msg1'];
$backurl = $_GET['backurl'];
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
        <p><b><u><div id="inner_text"> Please Consider</u></b>
        <P>&nbsp</P>
        <div id="inner_text"><?php echo $msg1;?></div>
        <P>&nbsp</P>
        <P>&nbsp</P>
        <div id="inner_text"><a href="<?php echo $backurl; ?>"> Back</a> </div>
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

