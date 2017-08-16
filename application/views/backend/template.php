<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Panel</title>


<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Raleway:100,900,800,700,600,500,400,300,200' rel='stylesheet' type='text/css' /><!-- Google Fonts -->

<!-- Styles -->
<link rel="stylesheet" href="<?php echo base_url('css/backend')?>/bootstrap.css" type="text/css" /><!-- Bootstrap -->
<link href="<?php echo base_url('css/backend')?>/fullcalendar.css" rel="stylesheet" /><!-- Full calendar -->
<link href="<?php echo base_url('css/backend')?>/fullcalendar.print.css" rel="stylesheet" media="print" /><!-- Full Calendar -->
<link href="<?php echo base_url('css/backend')?>/jquery.mCustomScrollbar.css" rel="stylesheet" /><!-- Custom Scroll Bar -->
<link rel="stylesheet" href="<?php echo base_url()?>/font-awesome/css/font-awesome.css" type="text/css" /><!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo base_url('css/backend')?>/style.css" type="text/css" /><!-- Style -->

<link rel="stylesheet" href="<?php echo base_url('css/backend')?>/responsive.css" type="text/css" /><!-- Responsive Style -->

<!-- Script -->
<script src="<?php echo base_url('js/backend')?>/jquery.min.js"></script><!-- Jquery -->
<script src="<?php echo base_url('js/backend')?>/jquery.mCustomScrollbar.concat.min.js"></script><!-- Scroll Bar -->
<script type="text/javascript"  src="<?php echo base_url('js/backend')?>/bootstrap.js"></script><!-- Bootstrap -->
<script type="text/javascript"  src="<?php echo base_url('js/backend')?>/script.js"></script><!-- Script -->
</head>
<!-- <body onload="get_feed()"> -->
<body>
      <div id="fb-root"></div>
<script>
 // Load the SDK asynchronously
  /*(function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     ref.parentNode.insertBefore(js, ref);
   }(document));

 window.fbAsyncInit = function() {
    FB.init({
      appId      : '1429147820661503', // Set YOUR APP ID
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true  // parse XFBML
    });

    FB.Event.subscribe('auth.authResponseChange', function(response)
    {
     if (response.status === 'connected')
    {
       //alert('connected to facebook')
    }
    else if (response.status === 'not_authorized')
    {
       //alert('failed to connect');

        //FAILED
    } else
    {
       alert('logged out');

        //UNKNOWN ERROR
    }
    });
    
    };


    function logout()
    {
         var pageAccessToken = '1429147820661503|faketoken';
        FB.logout(
        {access_token : pageAccessToken},
        function(){
            window.location.href='http://localhost/social_commerce/admin/account/logout';
        });
    }
      function get_feed(){
          var pageAccessToken = '1429147820661503|faketoken';
        FB.api("/prtalbelanjacom/feed",
        {access_token : pageAccessToken},
        function(response){
           for(var key in response.data ){
               var obj = response.data[key];
               console.log("id : "+obj.id +
                   "from ID: "+obj.from.id+
                   "from Name: "+obj.from.name+
               "story : "+obj.story);
           }
           console.log("response from FB" +response.data);
        });
    }
 
*/
</script>


<div class="wrapper">
	<header>
		<div class="logo">
			<img src="<?php echo base_url('images/backend')?>/logo.png" alt="" />
		</div><!-- Logo -->
		<div class="welcome-user">
			<img src="<?php echo base_url('images/backend')?>/user.png" alt=""/>
			<span>LARA SMITH</span>
                        <p><a href="#" onclick="logout()"><?php echo 'Logout'?></a></p>
		</div>
			<div class="side-navigation">
				<ul>
                                    <li><a href="<?php echo base_url('admin/index')?>" title=""><i class="icon-laptop"></i>Dashboard</a></li>
                                    <li><a href="<?php echo base_url('admin/banner')?>" title=""><i class="icon-laptop"></i>Banner</a></li>
                                    <li><a  href="<?php echo base_url('admin/category')?>">Categories</a></li>
                                    <li><a href="<?php echo base_url('admin/product')?>">Products</a></li>
                                    <li><a href="<?php echo base_url('admin/product/review')?>">Review</a></li>
                                    <li><a href="<?php echo base_url('admin/product/rating')?>">Rating</a></li>
                                    <li><a href="<?php echo base_url('admin/order')?>">Orders</a></li>
                                    <li><a href="#">Laporan</a>
                                        <ul>
                                            <li><a href="<?php echo base_url('admin/laporan/grafikpenjualan')?>">Grafik Penjualan dan Aktifitas</a></li>
                                            <li><a href="<?php echo base_url('admin/laporan/penjualan')?>">Laporan Penjualan</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="">Carts</a></li>
                                    <li><a href="<?php echo base_url('admin/user') ?>">Users</a></li>
                                    <li></li>
				</ul>
			</div>
		<div class="social-statistics">
			<h4 class="headings"><i class="icon-twitter"></i>Social Statistics</h4>
				<div class="social-details">
					<img src="<?php echo base_url('images/backend')?>/fb.jpg" alt="" />
					<span>530,893</span>
					<p>Total Facebook Likes</p>
				</div>
				
				<div class="social-details">
					<img src="<?php echo base_url('images/backend')?>/twitter.jpg" alt="" />
					<span>17,812</span>
					<p>Total Twitter Tweets</p>
				</div>
				
				<div class="social-details">
					<img src="<?php echo base_url('images/backend')?>/rss.jpg" alt="" />
					<span>2,159</span>
					<p>Total Rss</p>
				</div>
		</div>
		
		
		<div class="new-files">
			<h4 class="headings"><i class="icon-envelope"></i> Your Emails</h4>
			<ul>
				<li>
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<a title="" href="#"><i class="icon-envelope blue"></i>From : David Smith</a>
					<p>Dear Victoria, Congratulations! You work has been uploaded so please....</p>
				</li>
				<li>
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<a title="" href="#"><img src="<?php echo base_url('images/backend')?>/email-thumb.png" alt="" />Re : John Doe</a>
					<p>Dear Haxzer, What's Your Plan! You work has been uploaded so please....</p>
				</li>
				<li>
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<a title="" href="#"><i class="icon-envelope green"></i>Re : Parker</a>
					<p>Dear Haxzer, What's Your Plan! You work has been uploaded so please....</p>
				</li>
			
			</ul>
		</div>
		<div class="tag-sec">
			<input id="tags_1" type="text" class="tags" value="Here,you,can,add,tags" />
		</div>
		
		<a class="slide-up-btn"><i class="icon-align-justify"></i></a>
	</header><!-- Header End -->
	

<section class="main-section">
		<div class="responsive-logo">
			<img src="<?php echo base_url('images/backend')?>/logo.png" alt="" />
		</div>
			<div class="responsive-menu">
			<div class="responsive-menu-dropdown">
				<a title="" class="red">MENU <i class="icon-align-justify" ></i></a>
			</div>
				<ul>
                                    <li><a href="<?php echo base_url('admin/index')?>" title=""><i class="icon-laptop"></i>Dashboard</a></li>
                                    <li><a href="<?php echo base_url('admin/banner')?>" title=""><i class="icon-laptop"></i>Banner</a></li>
                                    <li><a href="<?php echo base_url('admin/category')?>" title=""><i class="icon-laptop"></i>Categories</a></li>
                                    <li><a href="<?php echo base_url('admin/product')?>" title=""><i class="icon-laptop"></i>Products</a></li>
                                    <li><a href="<?php echo base_url('admin/product/review')?>">Review</a></li>
                                    <li><a href="<?php echo base_url('admin/product/rating')?>">Rating</a></li>
                                    <li><a href="<?php echo base_url('admin/order')?>">Orders</a></li>
                                    <li><a href="#">Laporan</a>
                                    <ul>
                                            <li><a href="<?php echo base_url('admin/laporan/penjualan')?>">Penjualan</a></li>
                                            <li><a href="<?php echo base_url('admin/laporan/popularity')?>">Popular Product</a></li>
                                    </ul>

                                    </li>
                                    <li><a href="">Carts</a></li>
                                    <li><a href="<?php echo base_url('admin/user') ?>">Uses</a></li>
                                </ul>
			</div>
<div class="container">
	<div class="row">
		<div class="main-bg">

			
			<div class="breadcrumbs-notify">
				<a href="#" title="">Home / </a> <a href="#" class="current-page" title=""> Blank Page</a>
				<div class="notification-auto">
					<div class="fade-notification">
					<h5><i class="icon-warning-sign"></i> Notification :</h5>
					</div>
					<div class="notification-slideshow">
						<h6 class="notify-fade">Notification here<i>3:45pm</i></h6>
                                        </div>
				</div>
			</div>
		<?php 
                if(!empty($content)) 
                $this->load->view($content)
                ?>
		</div><!-- main-bg-->
	</div><!-- Row -->
</div><!-- Container -->
	
</section><!-- Main Section -->
	
</div>


</body><!-- Body -->

</html><!-- Html -->

