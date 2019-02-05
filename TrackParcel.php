<!DOCTYPE html>
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
       <p><b><u><div id="inner_text">Track your Parcel</u></b>
          <form action="TrackReport.php" method="post">
              <table width="500px" border="1" align="center">
               <tr>   
                   <td align="">Parcel Code :</td>
                   <td><input type="text" name="parcelcode" size="30" required="true"/></td>
               </tr>
               <tr>   
                   <td> Contact No. :</td>
                   <td><input type="text"  name ="contact" size="30" required="true"/>                 
                   </td>           
               </tr>
                <tr>
                       <td><input type="submit"  value="Show Report" ></td>
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
