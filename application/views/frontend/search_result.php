<div class="body-sec">
<section class="content-wrapper">
    <div class="content-container container">
 <div class="heading-block">
                  <h1>Search Result</h1>

                </div>
                <div class="new-product-block">
                  <ul class="product-grid">
                    <?php
                    foreach($result as $r):?>
                    <li>
                      <div class="pro-img">
                          <img title="<?php echo $r->username?>"
                             alt="<?php echo $r->username?>"
                             src="<?php echo base_url('images/avatar/'.$r->profile_pic); ?>"
                             width="150px"
                             height="150px"/>
                       </div>
                      <div class="pro-content">
                        <p><?php echo $r->username?></p>
                      </div>
                      <div class="pro-btn-block">
                      <a href="<?php echo base_url('account/view_profile/'.$r->id_user.'/visitor')?>">View Profile</a>
                      </div>
                         <div class="clearfix"></div>
                         <br>
                    </li>
                   
                    <?php endforeach;?>
                  </ul>
                </div>
    </div>
</section>
</div>