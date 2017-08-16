<style>
    a:hover{
        cursor:pointer;
    }
</style>
<!--Content Block-->
<section class="content-wrapper">
	<div class="content-container container">
		<div class="main">
			<h1 class="page-title">Login or Create an Account</h1>
			<div class="account-login">
				<div class="col-1 new-users">
					<div class="content">
						<h2>New Customers</h2>
						<p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
					</div>
					<div class="buttons-set">
						<a class="colors-btn" title="Create an Account" href="<?php echo base_url('account/registration');?>"><span><span>Create an Account</span></span></a>
						<div class="clear"></div>
					</div>
				</div>
                                <form action="<?php echo base_url('account/login');?>" method="POST">
				<div class="col-2 registered-users">
					<div class="content">
						<h2>Registered Customers</h2>
						<p>If you have an account with us, please log in.</p>
                                                <p style="color:red"><?php echo $this->session->flashdata('message');?></p>
                                                <ul class="form-list">
							<li>
								<label class="required" for="email">Email Address<em>*</em></label>
								<div class="input-box">
									<input type="text" title="Email Address" name="email" class="input-text " value="" />
                                                                        <?php echo form_error('email'); ?>
                                                                </div> 
								<div class="clear"></div>
							</li>
							<li>
								<label class="required" for="pass">Password<em>*</em></label>
								<div class="input-box">
									<input type="password" title="Password" name="password" class="input-text " />
                                                                        <?php echo form_error('password')?>
                                                                </div>
								<div class="clear"></div>
							</li>
						</ul>
                                                
						<p class="required">* Required Fields</p>
					</div>
                                   
					<div class="buttons-set">
                                                <button type="submit" class="colors-btn" style="float:right" title="Login"><span><span>Login</span></span></button>
                                                <a onclick="Login()"><img src="<?php echo base_url().'images/fb_login.png'?>" width="190" height="100"></a>
						<div class="clear"></div>
					</div>
                                    <br>
                                    <a class="f-left" href="#">Forgot Your Password?</a>

                                    </div>
                                    </form>

				<div class="clear"></div>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="news-letter-container">
			<div class="free-shipping-block">
				<h1>ENJOY FREE SHIPPING</h1>
				<p>on all orders as our holiday gift for you!</p>
			</div>
			<div class="news-letter-block">
				<h2>SIGN UP FOR OUR NEWSLETTER</h2>
				<input type="text" value="Enter email address" title="" />
				<input type="submit" value="Submit" title="Submit" />
			</div>
		</div>	
	</div>
</section>
