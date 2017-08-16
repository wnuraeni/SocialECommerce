<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Form Elements Page</title>


<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:100,900,800,700,600,500,400,300,200' rel='stylesheet' type='text/css'><!-- Google Fonts -->

<!-- Styles -->
<link rel="stylesheet" href="<?php echo base_url('css/backend')?>/bootstrap.css" type="text/css" /><!-- Bootstrap -->
<link rel="stylesheet" href="<?php echo base_url()?>font-awesome/css/font-awesome.css" type="text/css" /><!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo base_url('css/backend')?>/style.css" type="text/css" /><!-- Style -->
<link rel="stylesheet" href="<?php echo base_url('css/backend')?>/responsive.css" type="text/css" /><!-- Responsive Style -->

<!-- Script -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script><!-- Jquery -->
<script src="backend/jquery.mCustomScrollbar.concat.min.js"></script><!-- Scroll Bar -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script><!-- Circle Chart -->
<script type="text/javascript"  src="<?php echo base_url('js/backend')?>/bootstrap.js"></script><!-- Bootstrap -->
<script type="text/javascript"  src="<?php echo base_url('js/backend')?>/script.js"></script><!-- Script -->
<script src="<?php echo base_url('js/backend')?>/jquery.flot.min.js"></script><!-- Chart -->
<script src="<?php echo base_url('js/backend')?>/side-navigation-tag.js"></script>
<script type="text/javascript" src="<?php echo base_url('css/backend')?>/jquery.sparkline.min.js"></script> <!-- Sparkline -->
<script src="<?php echo base_url('js/backend')?>/jquery-ui.custom.min.js"></script> <!-- Jquery UI Custom -->
<script src="<?php echo base_url('js/backend')?>/jquery.easypiechart.min.js"></script> <!-- Easy Pie Chart -->
<script type="text/javascript" src="http://xoxco.com/projects/code/tagsinput/jquery.tagsinput.js"></script><!-- Sidebar Add Tag -->
<script type="text/javascript" src="<?php echo base_url('js/backend')?>/jquery.smartWizard.js"></script><!-- Wizard Form -->


<!-- Sparklines -->
<script type="text/javascript">
	$(function() {
	$("#new-orders").sparkline([4,5,6,7,6,5,4,3,2,2,3,4], {
    type: 'bar',
    height: '40px',
	barSpacing:3,
    barWidth: 6,
    barColor: '#ff4646',
    negBarColor: '#D6A838'});
    });

	$(function() {
	$("#my-balance").sparkline([4,5,6,7,6,5,4,3,2,2,3,4], {
    type: 'bar',
    height: '40px',
	barSpacing:3,
    barWidth: 6,
    barColor: '#21b95e',
    negBarColor: '#27A9E3'});
    });
</script>
</head>
<body>
<div class="wrapper">
	<header>
		<div class="logo">
			<img src="<?php echo base_url('images/backend')?>/logo.png" alt="" />
		</div><!-- Logo -->
		<div class="welcome-user">
			<img src="<?php echo base_url('images/backend')?>/user.png" alt=""/>
			<span>LARA SMITH</span>
                        <p><a href="<?php echo base_url('admin/account/logout');?>"><?php echo 'Logout'?></a></p>
		</div>
			<div class="side-navigation">
				<ul>
                                    <li><a href="<?php echo base_url('admin/index')?>" title=""><i class="icon-laptop"></i>Dashboard</a></li>
                                    <li><a href="<?php echo base_url('admin/banner')?>" title=""><i class="icon-laptop"></i>Banner</a></li>
                                    <li><a  href="<?php echo base_url('admin/category')?>">Categories</a></li>
                                    <li><a href="<?php echo base_url('admin/product')?>">Products</a></li>
                                    <li><a href="">Review&Rating</a></li>
                                    <li><a href="">Inventory</a></li>
                                    <li><a href="">Orders</a></li>
                                    <li><a href="">Carts</a></li>
                                    <li><a href="">Users</a></li>
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
			<img src="backend/logo.png" alt="" />
		</div>
			
<div class="container">
    <div class="row">
		<div class="main-bg">
			<div class="top-stats">
				<input type="text" placeholder="Your Search Here" /><i class="icon-search"></i>
				<div class="top-bar-chart">
					<div class="bar-chart-details">
						<p>New User</p>
						<h5>17,561</h5>
					</div>
					<span id="new-orders" class="sparkline">4,5,6,7,6,5,4,3,2,2,4</span>
				</div>

				<div class="top-bar-chart">
					<div class="bar-chart-details">
						<p>My Balance</p>
						<h5>$21,561.01</h5>
					</div>
					<span id="my-balance" class="sparkline">4,5,6,7,6,5,4,3,2,2,4</span>
				</div>
				<div class="top-stats-icons">
					<i class="icon-rocket"></i><i class="icon-user"></i><i class="icon-laptop"></i><i class="icon-tasks"></i>
				</div>
			</div>

			<div class="breadcrumbs-notify">
				<a href="#" title="">Home / </a> <a href="#" class="current-page" title=""> Blank Page</a>
				<div class="notification-auto">
					<div class="fade-notification">
					<h5><i class="icon-warning-sign"></i> Notification :</h5>
					</div>
					<div class="notification-slideshow">
						<h6 class="notify-fade">Server 3 is Over Loader Please Check. <i>3:45pm</i></h6>
						<h6 class="notify-fade">Server # 10 is Not Responding<i>1:30 Am</i></h6>
						<h6 class="notify-fade">New User Registration Error . <i>Today</i></h6>
						<h6 class="notify-fade">Domain Expiration Error <i>Yesterday</i></h6>
						<h6 class="notify-fade">Database Over loaded 2% Remaining <i>9:59 pm</i></h6>
						<h6 class="notify-fade">Application Erro Delete it Now <i>Last Week</i></h6>
					</div>
				</div>
			</div>
		<?php
                if(!empty($content))
                $this->load->view($content)
                ?>
		</div><!-- main-bg-->
	</div><!-- Row -->
	<div class="row">
		<div class="main-bg">
</div><!-- main-bg-->
</div><!-- Row -->
</div><!-- Container -->

</section><!-- Main Section -->

</div><!-- Wrapper -->

</body><!-- Body -->
</html><!-- Html -->

