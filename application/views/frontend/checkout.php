<section class="content-wrapper">
	<div class="content-container container">
		<div class="col-1-layout">
                    <h4>Cart Content</h4>
                        <table>
                            <thead><th>Pic</th><th>Name</th><th>Code Product</th><th>Quantity</th><th>Total</th></thead>
                            <tbody>
                            <?php
                            $carts = $this->cart->contents();
                            foreach($carts as $c):
                            ?>
                            <tr>
                                <td><img src="<?php echo base_url('images/product/'.$c['options']['image'])?>" width="50" height="50"/></td>
                                <td><?php echo $c['name']?></td>
                                 <td><?php echo $c['options']['code']?></td>
                                <td><?php echo $c['qty']?></td>
                                <td><?php echo 'Rp. '.number_format($c['subtotal'],0,'','.')?></td>
                            </tr>
                            <?php endforeach; ?>
                            <tr><td colspan="4">Grand Total</td><td><?php echo 'Rp. '.number_format($this->cart->total(),0,'','.')?></td></tr>
                            </tbody>
                        </table>

                    
                     <form action="<?php echo base_url('order/checkout')?>" method="POST" id="agree">
                    <div class="show-option-block">
                        <h4>Ship To</h4>
                       
                        <table>
                            <tr>
                                <td width="100">FirstName</td><td><input type="text" name="firstname" value="<?php echo (!empty($user))?$user->firstname:''?>"></td>
                            </tr>
                            <tr>
                                <td>LastName</td><td><input type="text" name="lastname" value="<?php echo (!empty($user))?$user->lastname:''?>"></td>
                            </tr>
                            <tr>
                                <td>Address</td><td><input type="text" name="address" value="<?php echo (!empty($user))?$user->address:''?>"></td>
                            </tr>
                            <tr>
                                <td>City</td><td><input type="text" name="city" value="<?php echo (!empty($user))?$user->city:''?>"></td>
                            </tr>
                            <tr>
                                <td>Province</td><td><input type="text" name="province" value="<?php echo (!empty($user))?$user->province:''?>"></td>
                            </tr>
                            <tr>
                                <td>Phone</td><td><input type="text" name="phone" value="<?php echo (!empty($user))?$user->phone:''?>"></td>
                            </tr>
                        </table>
                    </div>
                        <div class="update-shopping-cart"><button class="colors-btn" type="submit">Order</button></div>
                    </form>
			
			
			<div class="generic-product-list">
				<h4>Based on your selection, you may be interested in the following items:</h4>
				<ul>
					<li>
						<div class="left-img"><img src="images/tshir_img.png" title="" alt="" /></div>
						<div class="right-content">
							<div class="pro-name">White Round Neck <br>T-Shirt</div>
							<div class="pro-price">$600.00</div>
							<div class="add-cart-row"><button class="colors-btn" title="Add to Cart">Add to Cart</button></div>
							<a href="#" class="add-wishlist" title="Add to Wishlist">Add to Wishlist</a>
							<a href="#" class="add-compare" title="Add to Compare">Add to Compare</a>
						</div>
					</li>
					<li>
						<div class="left-img"><img src="images/tshir_img.png" title="" alt="" /></div>
						<div class="right-content">
							<div class="pro-name">White Round Neck <br>T-Shirt</div>
							<div class="pro-price">$600.00</div>
							<div class="add-cart-row"><button class="colors-btn" title="Add to Cart">Add to Cart</button></div>
							<a href="#" class="add-wishlist" title="Add to Wishlist">Add to Wishlist</a>
							<a href="#" class="add-compare" title="Add to Compare">Add to Compare</a>
						</div>
					</li>
					<li>
						<div class="left-img"><img src="images/tshir_img.png" title="" alt="" /></div>
						<div class="right-content">
							<div class="pro-name">White Round Neck <br>T-Shirt</div>
							<div class="pro-price">$600.00</div>
							<div class="add-cart-row"><button class="colors-btn" title="Add to Cart">Add to Cart</button></div>
							<a href="#" class="add-wishlist" title="Add to Wishlist">Add to Wishlist</a>
							<a href="#" class="add-compare" title="Add to Compare">Add to Compare</a>
						</div>
					</li>
					<li>
						<div class="left-img"><img src="images/tshir_img.png" title="" alt="" /></div>
						<div class="right-content">
							<div class="pro-name">White Round Neck <br>T-Shirt</div>
							<div class="pro-price">$600.00</div>
							<div class="add-cart-row"><button class="colors-btn" title="Add to Cart">Add to Cart</button></div>
							<a href="#" class="add-wishlist" title="Add to Wishlist">Add to Wishlist</a>
							<a href="#" class="add-compare" title="Add to Compare">Add to Compare</a>
						</div>
					</li>
				</ul>
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
				<input class="submit-btn" type="submit" value="Submit" title="Submit" />
			</div>
		</div>
	</div>
</section>
<script>
function proceed_purchase(){
    var check = document.getElementById("myCheck").checked;
    if(check)
        document.getElementById("agree").submit();
    else
        alert('Please check agree!')
}

</script>