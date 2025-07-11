<!DOCTYPE html>
<html>
<head>
<title>AAmer Dhaka</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="Demo/layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">

    <!-- Pogo Slider CSS -->
    <link rel="stylesheet" href="Demo/css/pogo-slider.min.css">

</head>
<body id="top">
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row0">
  <div id="topbar" class="clear"> 
    <!-- ################################################################################################ -->
    <nav>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="{{ route('common.contactus') }}">Contact Us</a></li>
        <li><a href="{{route('login')}}">Login</a></li>
      </ul>
    </nav>
    <!-- ################################################################################################ --> 
  </div>
</div>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row1">
  <header id="header" class="clear"> 
    <!-- ################################################################################################ -->
    <div id="logo" class="fl_left">
      <h1><a href="index.html">AAmer Dhaka</a></h1>
      <p>One stop citizen engagement and management system</p>
    </div>
    <div class="fl_right">
      <form class="clear" method="post" action="#">
        <fieldset>
          <legend>Search:</legend>
          <input type="text" value="" placeholder="Search Here">
          <button class="fa fa-search" type="submit" title="Search"><em>Search</em></button>
        </fieldset>
      </form>
    </div>
    <!-- ################################################################################################ --> 
  </header>
</div>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row2">
  <div class="rounded">
    <nav id="mainav" class="clear"> 
      <!-- ################################################################################################ -->
      <ul class="clear">
        <li class="active"><a href="index.html">Home</a></li>
        <li><a class="drop" href="#">Raise Issue</a>
          <ul>
            <li><a href="{{route('roadissue.create')}}">Road</a></li>
            <li><a href="{{route('garbageissue.create')}}">Garbage</a></li>
            <li><a href="{{route('streetlightissue.create')}}">Street Light</a></li>
            <li><a href="{{route('publictoiletissue.create')}}">Public Toilet</a></li>
            <li><a href="{{route('mosquitoissue.create')}}">Mosquito</a></li>
            <li><a href="{{route('illegalstructureissue.create')}}">Illegal Stucture</a></li>
          </ul>
        </li>
        <li><a class="drop" href="#">Services</a>
          <ul>
            <li><a href="#">Road Cutting Permission</a></li>
            <li><a href="#">New Holding Number</a></li>
            <li><a href="#">Trade Licence</a></li>
            <li><a href="#">Birth Certificate</a></li>
            <li><a href="#">e-Revenue</a></li>
            <li><a href="#">Primary Health Care Centers</a></li>

            
          </ul>
        </li>
        <li><a href="{{ route('common.aboutus') }}">About Us</a></li>
        <li><a href="{{ route('common.contactus') }}">Contact Us</a></li>
         <li><a href="{{route('login')}}">Login/SignUp</a></li>
        
      </ul>
      <!-- ################################################################################################ --> 
    </nav>
  </div>
</div>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<!-- Start Banner -->
<div class="ulockd-home-slider">
		<div class="container-fluid">
			<div class="row">
				<div class="pogoSlider" id="js-main-slider">
					<div class="pogoSlider-slide" data-transition="fade" data-duration="100" style="background-image:url(Demo/imagess/pic-2.jpg);">
					</div>
					<div class="pogoSlider-slide" data-transition="fade" data-duration="100" style="background-image:url(Demo/imagess/pic-3.jpg);">
						
					</div>
					<div class="pogoSlider-slide" data-transition="fade" data-duration="100" style="background-image:url(Demo/imagess/pic-1.jpg);">
						
						
					</div>
				</div><!-- .pogoSlider -->
			</div>
		</div>
	</div>
</div>
<br><br>
	<!-- End Banner -->
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      <!-- main body --> 
      <!-- ################################################################################################ -->
      <div class="group btmspace-30"> 
        <!-- Left Column -->
        <div class="one_quarter first"> 
          <!-- ################################################################################################ -->
          <ul class="nospace">
            <li class="btmspace-15"><a href="#"><em class="heading">Hon'ble Chief Adviser</em> <img class="borderedbox" src="Demo/images/demo/pic-4.gif" alt=""><br>
          <em class="padding">  Dr. Muhammad Yunus</em></a></li>
            <li class="btmspace-15"><a href="#"><em class="heading">Hon'ble Adviser</em> <img class="borderedbox" src="Demo/images/demo/pic-5.gif" alt=""><br>
            <em class="padding">  Asif Mahmud Shojib Bhyain</em></a></li></a></li>
            <li class="btmspace-15"><a href="#"><em class="heading">Administrator</em> <img class="borderedbox" src="Demo/images/demo/pic-6.gif" alt=""><br>
            <em class="padding">  Mohammad Azaz</em></a></li>
            <li><a href="#"><em class="heading">Chief Executive Officer</em> <img class="borderedbox" src="Demo/images/demo/pic-7.gif" alt=""><br>
            <em class="padding">  Abu Sayed Md. Kamruzzam, NDC</em></a></li>
          </ul>
          <!-- ################################################################################################ --> 
        </div>
        <!-- / Left Column --> 
        <!-- Middle Column -->
        <div class="one_half"> 
          <!-- ################################################################################################ -->
          <ul class="nospace listing">
            <li class="clear">
              <div class="borderedbox"><em class="heading">Raise Issue</em><img src="Demo/images/demo/riseissue.gif" alt=""><ul type="square" >
                 <li><a href="{{route('roadissue.create')}}">Road</a></li>
                <li><a href="{{route('garbageissue.create')}}">Garbage</a></li>
                <li><a href="{{route('streetlightissue.create')}}">Street Light</a></li>
                <li><a href="{{route('publictoiletissue.create')}}">Public Toilet</a></li>
                <li><a href="{{route('mosquitoissue.create')}}">Mosquito</a></li>
                <li><a href="{{route('illegalstructureissue.create')}}">Illegal Stucture</a></li>
              </div>
            </li>
            <ul class="nospace listing">
            <li class="clear">
              <div class="borderedbox"><em class="heading">Tender/Office Order/Circular</em><img src="Demo/images/demo/pic-12.gif" alt=""><ul type="disc" >
              <li><a href="https://dncc.gov.bd/site/view/tenders/Tender">Tender</li>
                <li><a href="https://dncc.gov.bd/site/view/notices/Circular">Circular</li>
                <li><a href="https://dncc.gov.bd/site/view/publications/Job-Advertisement">Job-Advertisement</li>
              </div>

              
            </li>
            <ul class="nospace listing">
            <li class="clear">
              <div class="borderedbox"><em class="heading">Form</em><img src="Demo/images/demo/pic-10.gif" alt=""><ul type="disc" >
                <li><a href="https://forms.portal.gov.bd">Form Portal</li>
                <li><a href="https://dncc.gov.bd/site/page/cff4a0b8-6655-4819-9c8e-17b2aed8e9d4/City-Coporation's-History">City-Coporation's-History</li>
                <li><a href="https://dncc.gov.bd/site/page/c0b6953f-16d3-405b-85e9-dece13bb98de/Location-and-Area">Location-and-Area</li>
              </div>

              
            </li>
          </ul>
       
          <!-- ################################################################################################ --> 
        </div>
        <!-- / Middle Column --> 
        <!-- Right Column -->
        <div class="one_quarter sidebar"> 
          <!-- ################################################################################################ -->
          <div class="sdb_holder">
            <h6>Virtual Tour</h6>
            <div class="mediacontainer"><img src="Demo/images/demo/video.gif" alt="">
              <p><a href="#">View More Tour Videos Here</a></p>
            </div>
          </div>
          <div class="sdb_holder">
          <h6 style="color: red;">Emergency Helpline Number</h6>
            
              <li class="clear"><a href="https://bangladesh.gov.bd/site/page/aaebba14-f52a-4a3d-98fd-a3f8b911d3d9"><img src="Demo/images/demo/pic-8.gif" alt=""></a></li>
            
          </div>
          <!-- ################################################################################################ --> 
        </div>
        <!-- / Right Column --> 
      </div>
      <!-- ################################################################################################ --> 
  
      <!-- ################################################################################################ --> 
      <!-- ################################################################################################ -->
      <div class="group">
        <h2>Important Link</h2>
        <div class="one_quarter first"> 
          <!-- ################################################################################################ -->
          <ul class="nospace">
            <li><a href="https://lgd.gov.bd">Ministry of Local Government</a></li>
            <li><a href="https://www.eprocure.gov.bd">e-GP</a></li>
            <li><a href="https://bdris.gov.bd/br/application">Birth and Death Registration</a></li>
            <li><a href="https://bidaquickserv.org">One Stop Service(BIDA)</a></li>
</ul>
          <!-- ################################################################################################ --> 
        </div>
        
      <!-- ################################################################################################ --> 
      <!-- / main body -->
      <div class="clear"></div>
    </main>
  </div>
</div>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row4">
  <div class="rounded">
    <footer id="footer" class="clear"> 
      <!-- ################################################################################################ -->
      <div class="one_third first">
        <figure class="center"><a href="https://www.google.com/maps?ll=23.795552,90.41477&z=15&t=m&hl=en-US&gl=US&mapclient=embed&cid=4275206349592039644"><img class="btmspace-15" src="Demo/images/demo/pic-11.png"  alt="" >
          <figcaption><a href="https://www.google.com/maps?ll=23.795552,90.41477&z=15&t=m&hl=en-US&gl=US&mapclient=embed&cid=4275206349592039644">Office Location & DNCC Map &raquo;</a></figcaption>
        </figure>
      </div>
      <div class="one_third">
        <address>
        Nagar Bhaban<br>
        Dhaka North City Corporation<br>
        Gulshan Center Point<br>
        Plot No# 23-26, Road No#  46,<br>
        Gulshan-2, Dhaka-1212.
        <br>
        <i class="fa fa-phone pright-10"></i> 01796430956<br>
        <i class="fa fa-envelope-o pright-10"></i> <a href="#">kajol.99bd@gmail.com</a>
        </address>
      </div>
      <div class="one_third">
        <p class="nospace btmspace-10">Stay Up to Date With What's Happening</p>
        <ul class="faico clear">
          <li><a class="faicon-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
          <li><a class="faicon-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
          <li><a class="faicon-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
          <li><a class="faicon-flickr" href="#"><i class="fa fa-flickr"></i></a></li>
          <li><a class="faicon-rss" href="#"><i class="fa fa-rss"></i></a></li>
        </ul>
        <form class="clear" method="post" action="#">
          <fieldset>
            <legend>Subscribe To Our Newsletter:</legend>
            <input type="text" value="" placeholder="Enter Email Here&hellip;">
            <button class="fa fa-sign-in" type="submit" title="Sign Up"><em>Sign Up</em></button>
          </fieldset>
        </form>
      </div>
      <!-- ################################################################################################ --> 
    </footer>
  </div>
</div>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row5">
  <div id="copyright" class="clear"> 
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright &copy; 2025 - All Rights Reserved - <a href="#">Kajol</a></p>
    
    <!-- ################################################################################################ --> 
  </div>
</div>
<!-- JAVASCRIPTS --> 
<script src="layout/scripts/jquery.min.js"></script> 
<script src="layout/scripts/jquery.fitvids.min.js"></script> 
<script src="layout/scripts/jquery.mobilemenu.js"></script> 
<script src="layout/scripts/tabslet/jquery.tabslet.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="Demo/js/jquery.pogo-slider.min.js"></script> 
<script src="Demo/js/slider-index.js"></script>
</body>
</html>