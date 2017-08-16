<section class="content-wrapper">
    <div class="content-container container">
        <div class="main">
            <h1 class="page-title">Create an Account</h1>
            <div class="fieldset">
                <!-- FORM REGISTRATION START-->
            <form action="<?php echo base_url('account/registration')?>" method="POST">
            <h2 class="legend">Personal Information</h2>
                <ul class="form-list">
                    <li class="fields">
                        <div class="customer-name">
                                <div class="input-box name-firstname">
                                        <label for="firstname">First Name<em>*</em></label>
                                        <input type="text" id="firstname" class="input-text" title="First Name" value="<?php echo set_value('firstname')?>" name="firstname">
                                        <?php echo form_error('firstname')?>
                                </div>
                                <div class="input-box name-lastname">
                                        <label for="lastname">Last Name<em>*</em></label>
                                        <input type="text" class="input-text" title="Last Name" value="<?php echo set_value('lastname')?>" name="lastname">
                                        <?php echo form_error('lastname')?>
                                </div>
                                <div class="clear"></div>

                        </div>
                    </li>
                        <li>
                            <div class="input-box">
                                <label class="required" for="email_address">Email Address<em>*</em></label>
                                <input type="text" id="email" class="input-text" title="Email Address" name="email" value="<?php echo set_value('email')?>">
                                <?php echo form_error('email')?>
                            </div>
                           
                        </li>
                        <li>
                             <div class="input-box">
                                <label class="required" for="username">Username<em>*</em></label>
                                <input type="text" id="username" class="input-text" name="username" value="<?php echo set_value('username')?>">
                                <?php echo form_error('username')?>
                            </div>
                             <div class="clear"></div>
                        </li>
                        <li>
                            <label class="required" for="birthdate">Birthdate<em>*</em></label>
                            <input type="text" name="birthdate" value="" id="birthdate">
                            <a href="javascript:NewCssCal('birthdate','yyyymmdd')">
                                <img src="<?php echo base_url();?>images/cal.gif">
                            </a>
                            <?php echo form_error('birthdate')?>
                        </li>
                        <li>
                             <div class="input-box">
                                <label class="required" for="address">Address<em>*</em></label>
                                <input type="text" id="address" class="input-text" title="Address" name="address" value="<?php echo set_value('username')?>">
                                <?php echo form_error('address')?>
                            </div>
                             <div class="clear"></div>
                        </li>
                        <li>
                             <div class="input-box">
                                <label class="required" for="address">City<em>*</em></label>
                                <input type="text" id="city" class="input-text" title="City" name="city" value="<?php echo set_value('city')?>">
                                <?php echo form_error('city')?>
                            </div>
                             <div class="clear"></div>
                        </li>
                        <li>
                             <div class="input-box">
                                <label class="required" for="province">Province<em>*</em></label>
                                <input type="text" id="province" class="input-text" title="province" name="province" value="<?php echo set_value('province')?>">
                                <?php echo form_error('province')?>
                            </div>
                             <div class="clear"></div>
                        </li>
                        <li>
                             <div class="input-box">
                                <label class="required" for="phone">Phone<em>*</em></label>
                                <input type="text"  class="input-text" name="phone" value="<?php echo set_value('phone')?>">
                                <?php echo form_error('phone')?>
                            </div>
                             <div class="clear"></div>
                        </li>
                </ul>
                <h2 class="legend">Login Information</h2>
                <ul class="form-list">
                    <li class="fields">
                        <div class="customer-name">
                        <div class="input-box ">
                                <label for="firstname">Password<em>*</em></label>
                                <input type="password" id="password" class="input-text" title="Password" value="" name="password" >
                                <?php echo form_error('password')?>
                        </div>
                        <div class="input-box">
                                <label for="lastname">Confirm Password<em>*</em></label>
                                <input type="password" class="input-text" title="Password Confirm" value="" name="confirm_password" >
                                <?php echo form_error('confirm_password')?>
                        </div>
                        <div class="clear"></div>
                        </div>
                    </li>
                </ul>
                    <div class="buttons-set">
                        <p class="required">* Required Fields</p>
                        <a href="<?php echo base_url('account/login')?>" title="Back" class="f-left">&laquo; Back</a>
                        <button type="submit" title="Submit" class="colors-btn"><span><span>Submit</span></span></button>
                        <div class="clear"></div>
                    </div>
                </form><!-- End form registration -->
                
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