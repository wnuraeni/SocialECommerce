<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Admin Panel</title>

<!-- Styles -->
<link rel="stylesheet" href="<?php echo base_url('css/backend')?>/style.css" type="text/css" />

<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo base_url('font-awesome/css')?>/font-awesome.css" type="text/css" />

<!-- Google Fonts -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script><!-- Jquery -->

</head>
<body class="log-in-bg">
    <div id="fb-root"></div>
<script>

 // Load the SDK asynchronously
  (function(d){
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
       alert('connected to facebook')
    }
    else if (response.status === 'not_authorized')
    {
       alert('failed to connect');

        //FAILED
    } else
    {
       alert('logged out');

        //UNKNOWN ERROR
    }
    });
    
    };
    
 



</script>

<!-- Log in -->
<div class="log-in">
	<div class="top-sec-log">
		<a class="facebook-btn" href="#" title="" ><i class="icon-facebook"></i><span class="facebook-btn-hover">Log in with Facebook</span></a> Facebook Btn 
		<span class="user-log-in">
			<img src="<?php echo base_url('images/backend')?>/user-log-in.png" alt="" />
		</span> User Image 
		<a class="twitter-btn" href="#" title="" ><i class="icon-twitter"></i><span class="twitter-btn-hover">Log in with Twitter</span></a> Twitter Btn 
			<h1>John <span>Doe</span></h1>
	</div>
	
	<h3>log in to your account</h3>
        <br>
        <?php echo $this->session->flashdata('message') ?>
        <div class="form">
		<span><i class="icon-user"></i></span>
            <input type="text" name="username" id="username"/>
            <?php echo form_error('username')?>
	</div><!-- Login User Name -->
	
	<div class="form">
		<span><i class="icon-key"></i></span>
                <input type="password" name="password" id="password"/>
                <?php echo form_error('password')?>
	</div><!-- Login Password -->
	
	<a href="#" class="forget-pass">forgotten password ?</a>
        <button class="log-in-btn" onclick="login()" >log in</button>
</div><!-- Log in Page -->
<script>
     function login()
    {
        /*FB.login(function(response) {
           if (response.authResponse){*/
               $.ajax({
                    url:'http://localhost/social_commerce/admin/account/login',
                    type:'post',
                    dataType:'json',
                    data:{
                        username:$('#username').val(),
                        password:$('#password').val()
                    },
                    success:function(data){
                        if(data.response == "success")
                            window.location.href='http://localhost/social_commerce/admin';
                        else
                            alert('Login Error')
                    }
                });
/*               FB.api('/me', function(response) {
                //submit data for new user
            });
            } else
            {
             console.log('User cancelled login or did not fully authorize.');
            }
         },{scope: 'email,user_photos,user_videos,publish_actions,user_likes,publish_stream,read_stream'});
*/
    }
    function Logout()
    {
        FB.logout(function(){
            window.location.href='http://localhost/social_commerce/account/logout';
        });
    }
      function get_feed(){
        FB.api("/me/post",function(response){
           for(var key in response.data ){
               var obj = response.data[key];
               console.log("id : "+obj.id +
                   "from ID: "+obj.from.id+
                   "from Name: "+obj.from.name+
               "story : "+obj.story);
           }
           console.log(response.data);
        });
    }
    function PostingToWall(id_product){
            FB.ui(
            {
                method : 'share',
                caption: "Social Commerce",
                href:"http://localhost/social_commerce/product/detail/"+id_product
            },
            function(response) {
              if (!response || response.error) {
                  console.log(response)
              } else {
                }
            });
    }
</script>
</body>
</html>