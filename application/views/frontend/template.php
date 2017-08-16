<!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<title>Kayitah</title>

<!--js-->
<script src="<?php echo base_url('js/frontend');?>/jquery-1.8.2.min.js"></script>
<script src="<?php echo base_url('js/frontend');?>/common.js"></script>
<script src="<?php echo base_url('js/frontend');?>/jquery.easing.1.3.js"></script>
<script src="<?php echo base_url('js/frontend');?>/ddsmoothmenu.js"></script>
<script src="<?php echo base_url('js/frontend');?>/jquery.flexslider.js"></script>
<script src="<?php echo base_url('js/frontend');?>/jquery.elastislide.js"></script>
<script src="<?php echo base_url('js/frontend');?>/jquery.jcarousel.min.js"></script>
<script src="<?php echo base_url('js/frontend');?>/jquery.accordion.js"></script>
<script src="<?php echo base_url('js/frontend');?>/light_box.js"></script>
<script src="<?php echo base_url('js/frontend');?>/datetimepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url('js/frontend');?>/jRating.jquery.js"></script>
<script type="text/javascript">$(document).ready(function(){$(".inline").colorbox({inline:true, width:"50%"});});</script>
<!--end js-->

<!-- Mobile Specific Metas ================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS ================================================== -->

<link rel="stylesheet" href="<?php echo base_url('css/frontend');?>/style.css">
<link rel="stylesheet" href="<?php echo base_url('css/frontend');?>/colors.css">
<link rel="stylesheet" href="<?php echo base_url('css/frontend');?>/skeleton.css">
<link rel="stylesheet" href="<?php echo base_url('css/frontend');?>/layout.css">
<link rel="stylesheet" href="<?php echo base_url('css/frontend');?>/ddsmoothmenu.css"/>
<link rel="stylesheet" href="<?php echo base_url('css/frontend');?>/elastislide.css"/>
<link rel="stylesheet" href="<?php echo base_url('css/frontend');?>/home_flexslider.css"/>
<link rel="stylesheet" href="<?php echo base_url('css/frontend');?>/jRating.jquery.css" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url('css/frontend');?>/light_box.css"/>
<link href="../../../html5shiv.googlecode.com/svn/trunk/html5.js">
<link rel="icon" href="<?php echo base_url('images/frontend/logo.png');?>" type="image/png" sizes="16x16"/>
<!--[if IE]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
<?php echo !empty($meta_tag)?$meta_tag:'' ?>
</head>
<body onload="login()">
    <div id="fb-root"></div>
<script>
     $(document).ready(function(){
        $.ajax({
            url:'http://localhost/social_commerce/index/category_menu',
            dataType:'json',
            success:function(data){
            $("#menu_category").append(data.menu);
            }
        });
    });
 window.fbAsyncInit = function() {
    FB.init({
      appId      : '1429147820661503', // Set YOUR APP ID
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true  // parse XFBML
    });

    };
 function Login()
    {

        FB.login(function(response) {
           if (response.authResponse){
               
               FB.api('/me', function(response) {

                //submit data for new user
                $.ajax({
                    url:'http://localhost/social_commerce/account/login_facebook',
                    type:'post',
                    dataType:'json',
                    data:{
                        username:response.username,
                        email:response.email,
                        password:response.username
                        //firstname:response.firstname,
                        //birthdate:response.birthdate
                    },
                    success:function(data){
                       window.location.href='http://localhost/social_commerce/';
                    }
                });
            });
            } else
            {
             console.log('User cancelled login or did not fully authorize.');
            }
         },{scope: 'email,user_photos,user_videos,publish_actions,user_likes'});

    }
    function Logout()
    {
        FB.logout(function(){
            window.location.href='http://localhost/social_commerce/account/logout';
        });
        
    }
    function PostingToWall(id_product){
            FB.ui(
            {
                method : 'share',
                caption: "Social Commerce",
                href:"http://kayitah.dmsn.web.id/product/detail/"+id_product,
                scheduled_publish_time : "<?php echo strtotime("23-06-2014 14:50"); ?>"
////href:"http://wnuraeni.com/wp"
            },
            function(response) {
              if (!response || response.error) {
                  console.log(response)
              } else {
//                  FB.api(
//                    "/{"+response.post_id+"}",
//                    function (response) {
//                      if (response && !response.error) {
//                        /* handle the result */
//                         console.log(response);
//                      }else{
//                          alert(response.message);
//                      }
//                    }
//                );

                   $.ajax({
                        url:'http://localhost/social_commerce/product/save_activity/'+id_product,
                        type:'post',
                        dataType:'json',
                        data:{type:"Share",
                            activity_id:response.id},
                        success:function(data){}
                   });
                }
            });
//            FB.ui({
//  method: 'share',
//  href: 'https://developers.facebook.com/docs/',
//  caption: 'An example caption'
//}, function(response){});
//https://developers.facebook.com/docs/sharing/reference/share-dialog
//https://developers.facebook.com/docs/sharing/reference/feed-dialog/v2.0
    }

    function postLike(id){
        FB.ui({
            method : 'share_open_graph',
            action_type : 'og.likes',
            action_properties : JSON.stringify({
                object : 'http://kayitah.dmsn.web.id/product/detail/'+id
            })
        },function(response){});
    }

    function Favorite(id_product){
        $.ajax({
            url:'http://localhost/social_commerce/product/favorite/'+id_product,
            dataType:'json',
            success:function(data){
              location.reload();
            }
        });
    }
 // Load the SDK asynchronously
  (function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     ref.parentNode.insertBefore(js, ref);
   }(document));
function add_to_cart(id_product){
    $.ajax({
        url:'http://localhost/social_commerce/user_cart/add_to_cart/'+id_product,
        dataType:'json',
        success:function(data){
            location.reload();
        }
    });
}
   function remove_item(rowid){
       $.ajax({
          url:'http://localhost/social_commerce/user_cart/remove_item/'+rowid,
          dataType:'json',
          success:function(data){
              location.reload();
          }
       });
   }
//    var url = 'http://localhost/social_commerce';
//$('#like').html('<fb:like href="' + url + '" layout="button_count" show_faces="false" width="65" action="like" font="segoe ui" colorscheme="light" />');
//if (typeof FB !== 'undefined') {
//    FB.XFBML.parse(document.getElementById('like'));
//}
</script>
    <?php
     $isLogin = $this->session->userdata('isLogin');
     $isFBLogin = $this->session->userdata('isFBLogin');
    ?>
	<div class="mainContainer sixteen container">
            <!--Header Block-->
            <div class="header-wrapper">
              <header class="container">
                <div class="head-right">
                      <ul class="top-nav">
                             <?php if($isLogin || $isFBLogin): ?>
                            <li class=""><a href="<?php echo base_url('account/view_profile')?>" title="My Account">My Account</a></li>
                            <?php endif; ?>
                           <li class="contact-us"><a href="contact_us.html" title="Contact Us">Contact Us</a></li>
                            <li class="checkout"><a href="<?php echo base_url('user_cart/index')?>" title="Checkout">Checkout</a></li>
                            <?php
                            if($isLogin || $isFBLogin):
                            ?>
                            <li class="log-ut"><a href="<?php echo base_url('account/logout')?>" title="Logout">Logout</a></li>
                            <?php elseif($isFBLogin):?>
                            <li class="log-ut"><a onclick="Logout()" title="Logout">Logout</a></li>
                            <?php else:?>
                            <li class="log-in"><a href="<?php echo base_url('account/login')?>" title="Log In">Log In</a></li>
                            <?php endif;?>

                      </ul>
     
                  <section class="header-bottom">
                    <div class="cart-block">
					<ul>
						<li>(<?php echo $this->cart->total_items()?> )</li>
						<li><a href="<?php echo base_url('user_cart/index')?>" title="Cart"><img title="Item" alt="Item" src="<?php echo base_url('images/frontend')?>/item_icon.png" /></a></li>
						<li>Item</li>
					</ul>
					<div id="minicart" class="remain_cart" style="display: none;">
						 <p class="empty">You have <?php echo $this->cart->total_items()?> items in your shopping cart.</p>
						 <ol id="cart_content">
                                                     <?php
                                                     //print_r($this->cart->contents());
                                                     $cart = $this->cart->contents();
                                                     foreach($cart as $c):
                                                     ?>
						 	<li>
								<div class="img-block"><img src="<?php echo base_url('images/product/'.$c['options']['image'])?>" title="" alt="" /></div>
								<div class="detail-block">
									<h4><a href="#" title="<?php echo $c['name']?>"><?php echo $c['name']?></a></h4>
									<p>
										<strong><?php echo $c['qty']?></strong> x <?php echo 'Rp.'.$c['price']?>
									</p>
                                                                        <a href="<?php echo base_url('product/detail/'.$c['id'])?>" title="Details">Details</a>
								</div>
								<div class="edit-delete-block">
									<a href="#" title="Edit"><img src="<?php echo base_url('images/frontend')?>/edit_icon.png" alt="Edit" title="Edit" /></a>
									<a href="#" onclick="remove_item('<?php echo  $c['rowid']?>')" title="Remove"><img src="<?php echo base_url('images/frontend')?>/delete_item_btn.png" alt="Remove" title="Remove" /></a>
								</div>
							</li>
                                                        <?php endforeach; ?>
                                                        <li>
								<div class="total-block">Total:<span> <?php echo 'Rp.'.number_format($this->cart->total(),0,'','.')?></span></div>
								<a href="<?php echo base_url('user_cart/index')?>" title="Checkout" class="colors-btn">Checkout</a>
								<div class="clear"></div>
							</li>
						 </ol>
					</div>
				</div>
                    <div class="search-block">
                        <form action="<?php echo base_url('index/search_user')?>" method="POST">
                      <input type="text" name="search_user" hint="Search User" />
                      <input type="submit" value="Search" title="Search" />
                        </form>
                    </div>
                  </section>
                </div>
                <h1 class="logo"><a href="index-2.html" title="Logo">
                  <img title="Logo" alt="Logo" src="<?php echo base_url('images/frontend')?>/logo.png" />
                  </a></h1>
                <nav id="smoothmenu1" class="ddsmoothmenu mainMenu">
                  <ul id="nav">
                    <li class="active"><a href="<?php echo base_url()?>" title="Home">Home</a></li>
                    <li class=""><a href="<?php echo base_url('product/category')?>" title="Shop by">Shop by</a>
                      <ul id="menu_category">
                        
                      </ul>
                    </li>
                   <li class=""><a href="<?php echo base_url()?>" title="Faq">Faq</a></li>
                    <li class=""><a href="<?php echo base_url()?>" title="About us">About us</a></li>
                    <li class=""><a href="<?php echo base_url()?>" title="Footwear">Contact us</a></li>
                  </ul>
                </nav>
                
                <div class="mobMenu">
            <h1>
            <span>Menu</span>
            <a class="menuBox highlight" href="javascript:void(0);">ccc</a>
            <span class="clearfix"></span>
            </h1>
                    
                    <!-- responsive menu -->
            <div id="menuInnner" style="display:none;">
                   <ul class="accordion">
                       <li class="active"><a href="index-2.html" title="Home">Home</a></li>
                    <li class="parent"><a href="category.html" title="Shop by">Shop by</a>
                      <ul>
                        <li><a href="category.html">Woman Collection</a></li>
                        <li><a href="category.html">Men Collection</a></li>
                        <li><a href="category.html">Accessories</a></li>
                        <li><a href="category.html">Mobile</a>
                        	<ul>
                                <li><a href="category.html">Second level</a></li>
                                <li><a href="category.html">Second level</a></li>
                                <li><a href="category.html">Second level</a></li>
                                <li><a href="category.html">Second level</a></li>
                                <li><a href="category.html">Second level</a></li>
                                <li><a href="category.html">Second level</a></li>
                              </ul>
                        </li>
                        <li><a href="category.html">Shoes</a></li>
                        <li><a href="category.html">Others</a></li>
                      </ul>
                    </li>
                    <li class=""><a href="blog.html" title="Blog">Blog</a></li>
                    <li class=""><a href="faq.html" title="Faq">Faq</a></li>
                    <li class=""><a href="about_us.html" title="About us">About us</a></li>
                    <li class=""><a href="404_error.html" title="Pages">Pages</a></li>
                    <li class=""><a href="contact_us.html" title="Footwear">Contact us</a></li>
                      <span class="clearfix"></span>
                   </ul>
                  
             </div>      
            </div>
                
              </header>
            </div>
        </div>
            <?php 
            if(!empty($content))
                $this->load->view($content); 
            ?>      
            <!--Footer Block-->
            <section class="footer-wrapper">
              <footer class="container">
                <div class="link-block">
                  <ul>
                    <li class="link-title"><a href="about_us.html" title="ABOUT US">ABOUT US</a></li>
                    <li><a href="about_us.html" title="About Us">About Us</a></li>
                    <li><a href="#" title="Customer Service">Customer Service</a></li>
                    <li><a href="#" title="Privacy Policy">Privacy Policy</a></li>
                  </ul>
                  <ul>
                    <li class="link-title"><a href="#" title="CUSTOMER SERVICES">CUSTOMER SERVICES</a></li>
                    <li><a href="#" title="Shipping & Returns">Shipping & Returns</a></li>
                    <li><a href="#" title="Secure Shopping">Secure Shopping</a></li>
                    <li><a href="contact_us.html" title="Contact Us">Contact Us</a></li>
                  </ul>
 
                  <ul class="stay-connected-blcok">
                    <li class="link-title"><a href="#" title="STAY CONNECTED...">STAY CONNECTED...</a></li>
                    <li>
                         <ul class="social-links">
                            <li><a data-tooltip="Like us on facebook" href="#"><img alt="facebook" src="<?php echo base_url('images/frontend')?>/facebook.png"></a></li>
                            <li><a data-tooltip="Follow us on twitter" href="#"><img alt="twitter" src="<?php echo base_url('images/frontend')?>/twitter.png"></a></li>
                           </ul>
                         <div class="payment-block"><img src="<?php echo base_url('images/frontend')?>/payment.png" alt="payment"></div>
                    </li>
                  </ul>
                </div>
                <div class="footer-bottom-block">
                    <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="standard" data-action="recommend" data-show-faces="true" data-share="true"></div>

                  <ul class="bottom-links">
                    <li><a href="index-2.html" title="Home">HOME</a></li>
                    <li><a href="about_us.html" title="About">ABOUT</a></li>
                    <li><a href="contact_us.html" title="Contact">CONTACT</a></li>
                  </ul>
                </div>
              </footer>
            </section>

        <script type="text/javascript">
		$(document).ready(function(){
			$('.basic').jRating({
                            rateMax : 5
                        });
		});
	</script>
</body>
</html>