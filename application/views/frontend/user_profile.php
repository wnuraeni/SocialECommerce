<section class="content-wrapper">
	<div class="content-container container">  
            <h1 class="page-title">Profile</h1>
            <div  class="title right">
            <?php
            if($status != 'visitor' ){?>

            <a href="<?php echo base_url('account/edit_profile/'.(!empty($user)?$user->id_user:''))?>">Edit</a> |
            <a href="<?php echo base_url('order/order_history/'.$login_iduser) ?>">Order History</a> |
            <a href="<?php echo base_url('order/konfirmasi_pembayaran') ?>">Konfirmasi Pembayaran</a>

            <?php
            }else{
            ?>
            <script>
                $(document).ready(function(){
                    $("input").prop('disabled', true);
                });
           
           </script>
            <?php
            }
            ?>
            </div>
             <div class="col-left">
                <li class="left">
                    <img src="<?php echo base_url('images/avatar/').(!empty($user) ? $user->profile_pic:'')?>">
                </li>
            </div>
            <div  class="col-main">
            <div class="contact-form-container">
     
                    <ul class="form-fields">
                       
                        <li>
                            <div class="clearfix"></div>
                        </li>
                        <li class="left">
                                <label>Firstname</label>
                                <input type="text" value="<?php echo (!empty($user))? $user->firstname : ''?>" />
                        </li>
                         <li>
                            <div class="clearfix"></div>
                        </li>
                        <li class="left">
                                <label>Birthdate</label>
                                <input type="text" value="<?php echo (!empty($user))? $user->birthdate :''?>" />
                        </li>
                        <li>
                            <div class="clearfix"></div>
                        </li>
                        <li class="left">
                                <label>City</label>
                                <input type="text" value="<?php echo (!empty($user))? $user->city:''?>" />
                        </li>
                         <li>
                            <div class="clearfix"></div>
                        </li>
                    </ul>
            </div>
    </div>
   
    
    <div class="heading-block">
      <h1>Latest Share</h1>
      <ul class="pagination">
        <li class="grid"><a href="#" title="Grid">Grid</a></li>
      </ul>
    </div>
    <div class="feature-block">
      <ul id="mix" class="product-grid">
          <?php
          if(!empty($share)){
          foreach($share as $s) { ?>

          <li>
          <div class="pro-img"><img title="Freature Product" alt="Freature Product" src="<?php echo base_url('images/product/'.$s->media_url)?>" /></div>
          <div class="pro-hover-block">
            <h4 class="pro-name"><?php echo $s->product_name?></h4>
            <div class="link-block">
            <a href="#quick-view-container" class="quickllook inline" title="Quick View">Quick View</a>
            <a href="view.html" class="quickproLink" title="Link">Product link</a></div>
            <div class="pro-price">$600.00</div>
          </div>
        </li>
       <?php }
          }
          ?>
      </ul>
    </div>

    <div class="heading-block">
      <h1>Latest Favorite</h1>
      <ul class="pagination">
        <li class="grid"><a href="#" title="Grid">Grid</a></li>
      </ul>
    </div>
    <div class="feature-block">
      <ul id="mix" class="product-grid">
          <?php 
          if(!empty($favorite)){
          foreach($favorite as $s){?>
        <li>
          <div class="pro-img"><img title="Freature Product" alt="Freature Product" src="<?php echo base_url('images/product/'.$s->media_url)?>" /></div>
          <div class="pro-hover-block">
            <h4 class="pro-name"><?php echo $s->product_name?></h4>
            <div class="link-block">
            <a href="#quick-view-container" class="quickllook inline" title="Quick View">Quick View</a>
            <a href="view.html" class="quickproLink" title="Link">Product link</a></div>
            <div class="pro-price">$600.00</div>
          </div>
        </li>
        <?php
          }
          }?>
      </ul>
    </div>
</div>
</section>
