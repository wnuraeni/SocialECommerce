<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=263603350468346&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="body-sec">
<section class="content-wrapper">
	<div class="content-container container">
<?php $session = $this->session->userdata('isLoggedin');
    $session2 = $this->session->userdata('isFBLogin');

    ?>
<div class="col-left">
        <div class="">
            <p class="">
                <img src="<?php echo base_url('images/product/'.$default_media->url_product)?>"
            </p>
       <ul class="shopping-cart-table">
             <?php foreach ($all_media as $media):?>
            <li>
                <img src="<?php echo base_url('images/product/'.$media->url_product)?>" width ="50" height="50"/>
            </li>
            <?php endforeach;?>
        </ul>
        </div>
</div>
<div class="quick-view-right">
     <h2><?php echo $product->product_name?></h2>
    <div>
        <div class="first-review"></div>
                <div class="price-box">
                    <span class="price">Rp. <?php echo number_format($product->price,0,'','.')?></span>
                                </div>
                <div class="availability">In stock : <?php echo $product->stock?></div>
                <div class="add-to-cart-box">
                    <?php
                    if($session || $session2){
                    if($product->stock > 0){?>
                    <form action="<?php echo base_url('user_cart/add_to_cart/'.$product->id_product)?>" method="POST" id="submitcart">
                        <span class="qty-box">
                                <label for="qty">Qty:</label>
                                <a class="prev" title="" href="#"><img alt="" title="" src="<?php echo base_url('images/front_end')?>/qty_prev.png"></a>
                                <input type="text" name="qty" class="input-text qty" id="qty" maxlength="12" value="1">
                                <a class="next" title="" href="#"><img alt="" title="" src="<?php echo base_url('images/front_end')?>/qty_next.png"></a>				</span>
                          <button title="Add to Cart" class="form-button" onclick="proceed_addtocart('<?php echo $product->stock ?>'); return false;"><span>Add to Cart</span></button>
                    </form>
                    <?php }
                    }?>
                </div>
                <div class="clearfix"></div><br>
                <div class="">
                        <?php
                        if($session2){
                        ?>
                        <a onclick="postingToWall('<?php echo $product->id_product?>')" href="#">
                            <img src="<?php echo base_url('images/front_end').'/facebook_share.jpg'?>" >
                        </a>
                        <a onclick="postlike(<?php echo $product->id_product?>)" href="#">
                            <img src="<?php echo base_url('images/front_end').'/facebook_like.jpg'?>" >
                        </a>
                       <div class="fb-like" data-href="http://kayitah.dmsn.web.id/product/detail/<?php echo $product->id_product?>" data-layout="button" data-action="recommend" data-show-faces="false" data-share="false" style="margin-bottom:2px"></div>


                        <a onclick="favorite('<?php echo $product->id_product?>')" href="#">
                            <img src="<?php echo base_url('images/front_end').'/addtofavorite.jpg'?>" width="20px" height="20px">
                        </a>
                        <?php
                        }
                        else if($session){
                        ?>
                        <a onclick="login('share','<?php echo $product->id_product?>')" href="#">
                            <img src="<?php echo base_url('images/front_end').'/facebook_share.jpg'?>" >
                        </a>
                        <a onclick="login('like','<?php echo $product->id_product?>')" href="#">
                            <img src="<?php echo base_url('images/front_end').'/facebook_like.jpg'?>" >
                        </a>
                       <div class="fb-like" data-href="http://kayitah.dmsn.web.id/product/detail/<?php echo $product->id_product?>" data-layout="button" data-action="recommend" data-show-faces="false" data-share="false" style="margin-bottom:2px"></div>

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
                       <h5>Share</h5>
<?php foreach($share as $val) {?>
                       <a href="<?php echo base_url('account/view_profile/'.$val->id_user.'/visitor')?>">
<img src="<?php echo $val->avatar;?>" width="40" height="40"/>
                       </a>
                       <? } ?>
<br>
<h5>Like</h5>
<?php foreach($like as $val) {?>
<a  href="<?php echo base_url('account/view_profile/'.$val->id_user.'/visitor')?>">
<img src="<?php echo $val->avatar;?>" width="40" height="40"/>
</a>
                       <? } ?>


                      </div>
    </div>
</div>
<div class="clear"></div>
<div class="heading-block">
  <h1>Description</h1>
</div>
<div class="feature-block">
    <p><?php echo $product->product_description?></p>
</div>
<div class="heading-block">
    <h1>Review/Comment</h1>
</div>
<div class="feature-block">
    <?php

    if($session || $session2) :
        ?>
    <form action="<?php echo base_url('review/add_review/'.$product->id_product)?>" method ="POST" >
   <div class="contact-form-container">
        <ul class="form-fields">
                <li class="full-row">
                        <label>Comment<em>*</em></label>
                        <textarea name="content"></textarea>
                </li>
        </ul>

       <br>
                <button type="submit" class="form-button"><span>Submit</span></button>
    </div>
    </form>
    <br>
       <?php else: ?>
    <button onclick="window.location.href='<?php echo base_url('review/add_review/'.$product->id_product)?>'" class="form-button">Review</button>
    <?php endif; ?>


<?php
$id_user = $this->session->userdata('id_user');
foreach ($review as $r):

    if(isset($_GET['edit']) && $r->id_user == $id_user && $_GET['edit']==$r->id_review){
        ?>
<form action="<?php echo base_url('review/edit_review/'.$r->id_product)?>" method="POST">
    <textarea name="content"><?php echo $r->content?></textarea>
    <input type="hidden" name="id_review" value="<?php echo $r->id_review?>">
    <button type="submit" class="button-form">Update</button>
</form>
    <?php }elseif ($r->id_user==$id_user) { ?>
 <div class="clearfix"></div><br /><br />
<table cellpadding="2">
            <tr>
                  <td>
<b><?php echo $r->username?></b>
<br>
<img src="<?php echo base_url('images/avatar/'.$r->avatar)?>" width="50" height="60">


                  </td>
                  <td> <?php echo $r->date_added?>
                      <br> <?php echo $r->content?></td>

                  <td><a onclick="postingToWall('<?php echo $r->id_product?>')" href="#">
                            <img src="<?php echo base_url('images/front_end').'/facebook_share.jpg'?>" >
                        </a>
                      <br />
                      <a href="?edit=<?php echo $r->id_review?>">Edit</a> |
                  <a href="<?php echo base_url('review/delete_review/'.$r->id_product.'/'.$r->id_review)?>">Delete</a></td>
            </tr>
        </table>
        <br>
    <?php } else { ?>
        <table>
            <td><img src="<?php echo base_url('images/avatar/'.$r->avatar)?>"></td>
            <td><span style="font-size:20px"><a href="<?php echo base_url('account/view_profile/'.$r->id_user.'/visitor')?>"><?php echo $r->username?></a></span> <?php echo $r->date_added?> <br> <?php echo $r->content?></td>
        </table>
    <?php }
 endforeach;?>
</div>
</div>
</section>
</div>

<script>
<?php echo $this->session->flashdata('message'); ?>

    function proceed_addtocart(stock){
        var purchased = $("#qty").val();
        if(purchased > stock){
            alert('Stok tidak mencukupi');
            return false;
        }
        else{
            document.getElementById("submitcart").submit();
            return true;
        }
    }
</script>

<style>

table {
color: #333;
font-family: Helvetica, Arial, sans-serif;
width: 100%;
border-collapse:collapse;
border-spacing: 0;

margin-top: 10px;
}

td, th {
border: 1px solid transparent; /* No more visible border */
height: 30px;
transition: all 0.3s;  /* Simple transition for hover effect */
}

th {
background: #DFDFDF;  /* Darken header a bit */
font-weight: bold;
}

td {
background: #FAFAFA;
text-align: left;
vertical-align: middle;
}

/* Cells in even rows (2,4,6...) are one color */
tr:nth-child(even) td { background: #F1F1F1; }

/* Cells in odd rows (1,3,5...) are another (excludes header cells)  */
tr:nth-child(odd) td { background: #FEFEFE; }

tr td:hover { background: #666; color: #FFF; } /* Hover cell effect! */
</style>