            <!--Banner Block-->
        <div class="body-sec">
            <section class="banner-wrapper">
              <div class="banner-block container">
                <div class="flexslider">
                  <ul class="slides">
                      <?php
                         foreach($banner as $ban):?>
                      <li><img title="<?php echo $ban->title?>" alt="Banner" src="<?php echo base_url().'images/banner/'.$ban->media_url?>" /></li>
                      <?php endforeach; ?>

                  </ul>
                </div>
                <ul class="banner-add">
                  <li class="add1"><a href="#" title=""><img title="add1" alt="add1" src="<?php echo base_url('images/front_end')?>/static1.jpg" /></a></li>
                  <li class="add2"><a href="#" title=""><img title="add2" alt="add2" src="<?php echo base_url('images/front_end')?>/banner_add2.png" /></a></li>
                </ul>
              </div>
            </section>
            <!--Content Block-->
            <section class="content-wrapper">
              <div class="content-container container">
                <div class="heading-block">
                  <h1>Latest Shared Products</h1>
                  <ul class="pagination">
                    <li class="grid"><a href="#" title="Grid">Grid</a></li>
                  </ul>
                </div>
                <div class="feature-block">
                  <ul id="mix" class="product-grid">
                    <li>
                      <div class="pro-img"><img title="Freature Product" alt="Freature Product" src="<?php echo base_url('images/front_end')?>/default_img.png" /></div>
                      <div class="pro-hover-block">
                        <h4 class="pro-name">Htc One 1120</h4>
                        <div class="link-block">
                        <a href="#quick-view-container" class="quickllook inline" title="Quick View">Quick View</a>
                        <a href="view.html" class="quickproLink" title="Link">Product link</a></div>
                        <div class="pro-price">$600.00</div>
                      </div>
                    </li>
                  </ul>
                </div>
                <div class="heading-block">
                  <h1>New Product</h1>
                </div>
                <div class="new-product-block">
                  <ul class="product-grid">
                      <?php foreach ($new_product as $newpro):?>
                    <li>
                      <div class="pro-img">
                        <img title="<?php echo $newpro->product_name?>"
                             alt="<?php echo $newpro->product_name?>"
                             src="<?php echo base_url('images/product/'.$newpro->url_product)?>"
                             width="150px"
                             height="100px"/>

                      </div>
                      <div class="clearfix"></div><br>
                      <div class="pro-content">
                        <p><?php echo $newpro->product_name?></p>
                        <p><?php echo $newpro->product_description?></p>
                      </div>
                      <div class="pro-price">Rp.<?php echo number_format($newpro->price,0,'','.')?></div>

                      <div class="pro-btn-block">
                          <div class="basic" data-average="<?php echo $rating[$newpro->id_product]?>" data-id="<?php echo $newpro->id_product?>"></div>
                          <br>
                          <a class="add-cart left" href="#" title="Add to Cart" onclick="add_to_cart('<?php echo $newpro->id_product ?>')">Add to Cart</a>
                          <a class="add-cart right" href="<?php echo base_url('product/detail/'.$newpro->id_product)?>">View Detail</a> 
                      </div>
                      
                      <div class="clearfix"></div><br>
                       <div class="pro-link-block"> 
                        <?php
                        $session = $this->session->userdata('isLoggedin');
                        $session2 = $this->session->userdata('isFBLogin');
                        if($session || $session2){
                        ?>
                        <a onclick="postingToWall('<?php echo $newpro->id_product?>')" href="#">
                            <img src="<?php echo base_url('images/front_end').'/facebook_share.jpg'?>" >
                        </a>
                        <a onclick="postlike(<?php echo $newpro->id_product?>)" href="#">
                            <img src="<?php echo base_url('images/front_end').'/facebook_like.jpg'?>" >
                        </a>
                        <a onclick="favorite('<?php echo $newpro->id_product?>')" href="#">
                            <img src="<?php echo base_url('images/front_end').'/addtofavorite.jpg'?>" width="50px" height="50px">
                        </a>
                        <?php
                        }
                        else{
                        ?>
                        <a href="#" onclick="alert('Please login to share this on Facebook');" title="share on facebook">
                           <img src="<?php echo base_url('images/front_end').'/facebook_share.jpg'?>" >
                        </a>
                        <a href="#" onclick="alert('Please login to like this on Facebook');" title="like on facebook">
                            <img src="<?php echo base_url('images/front_end').'/facebook_like.jpg'?>" >
                        </a>
                        <a  href="#" title="Add to favorite" onclick="alert('Please login to add favorite');">
                            <img src="<?php echo base_url('images/front_end').'/addtofavorite.jpg'?>" width="20px" height="20px">
                        </a>
                        <?php } ?>
                      </div>
                    </li>
                    <?php endforeach;?>
                  </ul>
                </div>

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