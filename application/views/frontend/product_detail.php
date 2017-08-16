
<?php
$session = $this->session->userdata('isLogin');
$session2 = $this->session->userdata('isFBLogin');
?>
<section class="content-wrapper">
<div class="content-container container">
<div class="quick-view-left " width="50%">
<img src="<?php echo base_url('images/product/'.$default_media->media_url)?>" >
<table>
    <tr>
<?php
foreach($all_media as $media){
?>
 <td>
     <img src="<?php echo base_url('images/product/'.$media->media_url)?>" width="50" height="50"/>
 </td>
<?php }
?>
</tr>
</table>
</div>
<div class="quick-view-right">
   
        <h3><?php echo $product->product_name?></h3>
        <div class="first-review"></div>
                <div class="price-box">
                    <span class="price">Rp. <?php echo number_format($product->price, 0,'','.')?></span>			</div>
                <div class="availability">In stock</div>
                <div class="color-size-block">
                        <div class="label-row">
                                <label><em>*</em> color</label>
                                <span class="required">* Required Fields</span>				</div>
                        <div class="select-row">
                                <select><option>-- Please Select --</option></select>
                        </div>
                        <div class="label-row">
                                <label><em>*</em> size</label>
                        </div>
                        <div class="select-row">
                                <select><option>-- Please Select --</option></select>
                        </div>
                </div>
                <div class="add-to-cart-box">
                    <form action="<?php echo base_url('user_cart/add_to_cart/'.$product->id_product)?>" method="POST">
                        <span class="qty-box">
                                <label for="qty">Qty:</label>
                                <a class="prev" title="" href="#"><img alt="" title="" src="<?php echo base_url('images/frontend')?>/qty_prev.png"></a>
                                <input type="text" name="qty" class="input-text qty" id="qty" maxlength="12" value="1">
                                <a class="next" title="" href="#"><img alt="" title="" src="<?php echo base_url('images/frontend')?>/qty_next.png"></a>
                        </span>
                        <button type="submit" title="Add to Cart" class="form-button"><span>Add to Cart</span></button>
                    </form>
                </div>
  
    <div class="block community-block">
        <?php
        echo $rating->total_rating.' : ';
        echo $rating->total_voter.' voters';
        ?>
        <div class="block-title">COMMUNITY POLL</div>
        <form action="<?php echo base_url('product/vote/'.$product->id_product)?>" method="POST">
        <ul>
                <li class="question-row">Rating</li>
                <li><input type="radio" name="vote" value="1"><a href="#" title="1">1</a></li>
                <li><input type="radio" name="vote" value="2"><a href="#" title="2">2</a></li>
                <li><input type="radio" name="vote" value="3"><a href="#" title="3">3</a></li>
                <li><input type="radio" name="vote" value="4"><a href="#" title="4">4</a></li>
                <li><input type="radio" name="vote" value="5"><a href="#" title="5">5</a></li>
                <?php if($session || $session2):?>
                <li class="vote-row"><button title="Vote" type="submit">Vote</button></li>
                <?php else:?>
                <a href="<?php echo base_url('product/vote/'.$product->id_product)?>">Please Login to Vote</a>
                <?php endif;?>
        </ul>
        </form>
    </div>
</div>
<div class="clear"></div>
<div class="heading-block">
  <h1>Description</h1>
</div>
<div class="feature-block">
    <p><?php echo $product->description?></p>
</div>

<div class="heading-block">
    <h1>Review</h1>
</div>
<div class="feature-block">
    <?php 
   if($session || $session2) :?>
    <form action="<?php echo base_url('review/add_review/'.$product->id_product)?>" method="POST">
   <div class="contact-form-container">
        <ul class="form-fields">
                <li class="full-row">
                        <label>Review<em>*</em></label>
                        <textarea name="review"></textarea>
                </li>
                <li>
                    <label></label>
                    <input type="checkbox" name="share[]" value="yes">Share on Facebook
                </li>
        </ul>
        
                <button type="submit" class="form-button"><span>Submit</span></button>

    </div>
    </form>
<?php else: ?>
    <button onclick="window.location.href='<?php echo base_url('review/add_review/'.$product->id_product)?>'"  width="100%">Please Login to Leave Comment</button>
<?php endif;?>
</div>
<?php
$id_user = $this->session->userdata('idUser');

foreach($reviews as $r):
if(isset($_GET['edit']) && $r->id_user == $id_user && $_GET['edit']==$r->id_product_review){
?>
<form action="<?php echo base_url('review/edit_review/'.$r->id_product)?>" method="POST">
    <textarea name="review"><?php echo $r->review?></textarea>
    <input type="hidden" name="id_product_review" value="<?php echo $r->id_product_review?>">
    <button type="submit" class="button-form" >Update</button>
</form>
<?php
}else if($r->id_user == $id_user){ ?>

<img src="<?php echo base_url('images/avatar/'.$r->profile_pic)?>">
<p><?php echo $r->username?></p>
<p><?php echo $r->date_added?></p>
<p><?php echo $r->review?></p>
<a href="?edit=<?php echo $r->id_product_review ?>">edit</a>
<a href="<?php echo base_url('review/delete_review/'.$r->id_product.'/'.$r->id_product_review)?>">delete</a>
<br>
<?php }else { ?>
<img src="<?php echo base_url('images/avatar/'.$r->profile_pic)?>">
<p style="font-size:20px"><a href="<?php echo base_url('account/view_profile/'.$r->id_user)?>"><?php echo $r->username?></a></p>
<p><?php echo $r->date_added?></p>
<p><?php echo $r->review?></p>
<?php }
endforeach; ?>


</div>
</section>
<script>
//   function submitreview(){
//        if( $("#share").ischecked()){
//        //coding facebook API
//        }
//        else{
//            //submit isi form ke controller
//        }
//   }
<?php echo $this->session->flashdata('message')?>
    </script>