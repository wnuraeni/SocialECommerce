<div class="body-sec">
<!--Banner Block-->
            <section class="banner-wrapper">
              <div class="banner-block container">
                <div class="flexslider">
                  <ul class="slides">
                    <!-- <li><img title="Banner" alt="Banner" src="<?php //echo base_url('images/frontend')?>/banner1.jpg" /></li>
                    <li><img title="Banner" alt="Banner" src="<?php //echo base_url('images/frontend')?>/banner2.jpg" /></li>
                    <li><img title="Banner" alt="Banner" src="<?php //echo base_url('images/frontend')?>/banner3.jpg" /></li>
                    <li><img title="Banner" alt="Banner" src="<?php //echo base_url('images/frontend')?>/banner4.jpg" /></li> -->
                      <?php

                      foreach($banner as $ban){ ?>
                       <li>
                           <a href="<?php echo base_url($ban->url)?>">
                           <img title="<?php echo $ban->title ?>" alt="Banner" src="<?php echo base_url().'/images/banner/'.$ban->media_url?>" />
                           </a>
                       </li>
                      <?php } ?>

                  </ul>
                </div>
                <ul class="banner-add">
                  <li class="add1"><a href="#" title=""><img title="add1" alt="add1" src="<?php echo base_url('images/frontend')?>/static1.jpg" /></a></li>
                  <li class="add2"><a href="#" title=""><img title="add2" alt="add2" src="<?php echo base_url('images/frontend')?>/static2.jpg" /></a></li>
                </ul>
              </div>
            </section>
            <!--Content Block-->
            <section class="content-wrapper">
              <div class="content-container container">
                <div class="heading-block">
                  <h1>Recommended Products</h1>
                  <ul class="pagination">
                    <li class="grid"><a href="#" title="Grid">Grid</a></li>
                  </ul>
                </div>
                <div class="feature-block">
                  <ul id="mix" class="product-grid">
                      <?php foreach($recommend as $rec):?>
                    <li>
                      <div class="pro-img"><img title="Freature Product" alt="Freature Product" src="<?php echo base_url('images/product/'.$rec->media_url)?>" /></div>
                      <div class="pro-hover-block">
                        <h4 class="pro-name"><?php echo $rec->product_name?></h4>
                        <div class="link-block"> 
                        <a href="<?php echo base_url('product/detail/'.$rec->id_product)?>">View Detail</a>
                        <div class="pro-price"><?php echo 'Rp.'.$rec->price ?></div>
                      </div>
                      </div>
                    </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
                <div class="heading-block">
                  <h1>New Product</h1>
                 
                </div>
                <div class="new-product-block">
                  <ul class="product-grid">
                    <?php 
                    foreach($new_product as $prod):?>
                    <li>
                      <div class="pro-img">
                        
                          <img title="<?php echo $prod->product_name?>"
                             alt="<?php echo $prod->product_name?>"
                             src="<?php echo base_url('images/product/'.$prod->media_url); ?>"
                             width="150px"
                             height="150px"/>
                        <div class="basic" data-average="<?php echo $rating[$prod->id_product]?>" data-id="<?php echo $prod->id_product?>" ></div>
                      </div>
                      <div class="pro-content">
                        <p><?php echo $prod->product_name?></p>
                        <p><?php echo $prod->description?></p>
                      </div>
                        <div class="pro-price"><?php echo 'Rp.'.number_format($prod->price,'0','','.')?></div>
                      <div class="pro-btn-block"> 
                      <a class="add-cart left" href="#" onclick="add_to_cart('<?php echo $prod->id_product ?>')" title="Add to Cart">Add to Cart</a>
                      <a class="add-cart right " href="<?php echo base_url('product/detail/'.$prod->id_product)?>">View Detail</a> </div>
                        <div class="pro-link-block"><div class="clearfix"></div></div>
                        <?php
                        $session = $this->session->userdata('isLogin');
                        $session2 = $this->session->userdata('isFBLogin');
                        if($session || $session2){
                        ?>
                        <a onclick="PostingToWall('<?php echo $prod->id_product?>')" href="#">Share To Facebook</a> |
                        <a onclick="" href="#" id="like">Like </a> |
                        <a onclick="Favorite(<?php echo $prod->id_product?>)" href="#" >Favorite </a>
                        <?php
                        }
                        else{
                        ?>
                        <a  href="#">Share To Facebook</a> |
                        <a  href="#" id="like">Like </a> |
                        <a  href="#" >Favorite </a>
                        <?php }?>
                      
                    </li>
                    <?php endforeach;?>
                  </ul>
                </div>
                <!-- <h6 style="float:right"><a href="#">See More</a></h6> -->

              </div>
            </section>
    </div>

    <!--Quick view Block-->
<script type="text/javascript">
jQuery (function(){
	var tabContainers=jQuery('div.tabs > div');
	tabContainers.hide().filter(':first').show();
	jQuery('div.tabs ul.tabNavigation a').click(function(){
		tabContainers.hide();
		tabContainers.filter(this.hash).show();
		jQuery('div.tabs ul.tabNavigation a').removeClass('selected');
		jQuery(this).addClass('selected');
		return false;
		}).filter(':first').click();
	});
       

</script>
