
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>IRPTS</title>
<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
</head>
<body style="background-image: url(images/gss.jpeg);background-attachment: fixed;background-position: center;background-repeat: no-repeat;background-size: cover;">
<div id="container">
  <!-- Start of Page Header -->
  <div id="header_container">
    <div id="page_header">
      <div id="header_company">
        <h1><span></span></h1>
      </div>
      <div id="header_menu">
        <ul>
            <li><a href="AdminLogin.php"><span>Admin</span></a></li>
          <li><a href="ShowRates.php"><span>Charges</span></a></li>
          <li><a href="TrackParcel.php"><span>Track Parcel</span></a></li>
          <li><a href="AboutUs.php"><span>About Us</span></a></li>  
          <li><a href="AboutProgram.php"><span>About Program</span></a></li>
        </ul>
      </div>
      <div id="header_welcome">
        <h3>Indian Railway Parcel Transfer System</h3>
        <div id="welcome_text">
            <p>Reliable, Effortless and Flawless parcel transfer service from Indian Railways throught the nation.
            Very wide range transfers.Very cheap rates and damageless transfer is our speciality.</p>
            <p> we transfer through India, from North to South to East to West. Good connectivity of trains make us 
                unique.</p>
          </div>
      </div>
    </div>
  </div>
  <!-- End of Page Header -->
  <!-- Start of Left Sidebar -->
  <div id="left_sidebar">
    <!-- Start of User Login -->
    <div class="box_container">
      <div id="userlogin">
        <h2><span>Staff Login</span></h2>
        <form action="DBLoginPHP.php" method="post">
          <div class="form_field"> <strong>Username</strong>
              <input type="text" name="user_name" />
          </div>
          <div class="clearthis">&nbsp;</div>
          <div class="form_field"> <strong>Password</strong>
            <input type="password" name="password" />
          </div>
          <div class="clearthis">&nbsp;</div>
          <div class="form_field">
            <input type="image" src="images/userlogin_search.gif" class="button" />
          </div>
        </form>
        
      </div>
    </div>
    <!-- End of User Login -->
    <!-- Start of Latest News -->
    <div class="box_container">
      <div id="news">
          <marquee direction='up' scrolldelay='150'>
        <h2><span>Latest News</span></h2>
        <h4> FEB 09, 2017 </h4>
        <p>IRPTS honoured with prestigiousawards at the payload INDIA awards 2017</p>
        <h4> FEB 11, 2017 </h4>
        <p>INDIA's first parcel locker from IRPTS.</p>
        <p>IRPTS launches time definite delivery.</p>
        <!--<div class="link-more"> <a href="#">Read More</a> </div>-->
        <div class="clearthis">&nbsp;</div>
        </marquee>
      </div>
    </div>
    <!-- End of Latest News -->
  </div>
  <!-- End of Left Sidebar -->
  <!-- Start of Main Content Area -->
  <div id="maincontent_container">
    <div id="maincontent">
      <div id="maincontent_top">
        <!-- Start of How We Started -->
        <div id="started_container">
          <div id="started">
            <h2><span>New User Guidelines</span></h2>
            <p>To see charges : Select Charges button from above menu .</p>
            <p>To track your Parcel : Select Track Parcel button from above menu. Keep handy the parcel ticket you got when 
              you booked the parcel.</p>
            <p>For Parcel booking : Contact the nearest parcel office. </p>
            <p>Please furnish the parcel with contact number/numbers along with the correct address.</p>
          </div>
        </div>
        <!-- End of How We Started -->
        <div id="right_container">
          <!-- Start of We Also Do Repairing -->
          <div id="repairing">
            <h2><span>We also do repairing</span></h2>
            <p>All the parcels will be delivered at the given time and no faulty deelivery will be provided. Our motto is to done a safe and reliable delivery</p>
          </div>
          <div class="clearthis">&nbsp;</div>
          <!-- End of We Also Do Repairing -->
          <!-- Start of Get Special Offer -->
          <div id="offer_container">
            <div id="offer">
              <h2><span>Get <strong>Main Site</strong> Offer</span></h2>
              <p> Goto main site for details </p>
              <div class="link-go"> <a href="http://www.irctc.co.in"><span>Go</span></a> </div>
            </div>
          </div>
          <div class="clearthis">&nbsp;</div>
          <!-- End of Get Special Offer -->
        </div>
        <div class="clearthis">&nbsp;</div>
      </div>
      <!-- Start of Featured Products -->
      <div id="featured_container">
        <div id="featured">
          <h2><span>Featured Products</span></h2>
          <marquee scrolldelay="100">
          <div id="featured_products">
            <ul>
              <li><a href="#"><img src="images/featured_product_01.jpg" width="105" height="82" alt="Featured Product" /></a>
                <h4>parcel1</h4>
              </li>
              <li><a href="#"><img src="images/featured_product_02.jpg" width="105" height="82" alt="Featured Product" /></a>
                <h4>parcel2</h4>
              </li>
              <li><a href="#"><img src="images/featured_product_03.jpg" width="105" height="82" alt="Featured Product" /></a>
                <h4>parcel3</h4>
              </li>
              <li class="end"><a href="#"><img src="images/featured_product_04.jpg" width="105" height="82" alt="Featured Product" /></a>
                <h4>parcel4</h4>
              </li>
            </ul>
            <div class="clearthis">&nbsp;</div>
          </div>
         </marquee>
          
          <div class="clearthis">&nbsp;</div>
        </div>
      </div>
      <div class="clearthis">&nbsp;</div>
      <!-- End of Featured Products -->
    </div>
  </div>
  <!-- End of Main Content Area -->
  <!-- Start of Page Footer -->
  <div id="page_footer"> Powered by <a href="http://www.jdiet.ac.in">J.D.I.E.T. , Yavatmal</a> </div>
  <!-- End of Page Footer -->
  <div class="clearthis">&nbsp;</div>
</div>
</body>
</html>
