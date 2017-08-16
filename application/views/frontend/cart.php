<section class="content-wrapper">
	<div class="content-container container">
		<div class="col-1-layout">
                    <form action="<?php echo base_url('user_cart/update_cart');?>" method="POST">
                    <ul class="shopping-cart-table">
                            <?php
                            $carts = $this->cart->contents();
                            foreach($carts as $c):
                            ?>
				<li>
					<div class="img-box"><img src="<?php echo base_url('images/product/'.$c['options']['image'])?>" title="" alt="" /></div>
					<a class="edit-btn" href="#" title="Edit">Edit</a>
				</li>
				<li>
					<div class="remove-item-btn"><a href="#" title="Remove"><img src="<?php echo base_url('images/frontend/delete_item_btn.png')?>" title="Remove" alt="Remove" /></a></div>
					<div class="pro-name"><?php echo $c['name']?></div>
                                        <input type="hidden" name="item_rowid[]" value="<?php echo $c['rowid'] ?>">
					<div class="pro-qty"><input type="text" name="item_qty[]" value="<?php echo $c['qty']?>" /></div>
                                        <div class="pro-price"><?php echo 'Rp. '.number_format($c['price'],0,'','.')?></div>
				</li>
                                <?php endforeach; ?>
			</ul>
                   
			<div class="show-option-block"><a href="#" title="Show Options">Show Options</a></div>
			<div class="update-shopping-cart"><button type="submit" class="colors-btn">Update Shopping Cart</button></div>
                         </form>
			<div class="shopping-cart-collaterals">
				<div class="cart-box">
					<div class="box-title">Discount Codes</div>
					<div class="box-content"><p>Enter your coupon code if you have one.</p></div>
					<button class="colors-btn" title="Apply Coupon">Apply Coupon</button>
				</div>
				<div class="cart-box">
					<div class="box-title">Estimate Shipping and Tax</div>
					<div class="box-content">
						<p>Enter your destnation to get a shipping estimate</p>
						<ul>
							<li>
								<label>Country<em>*</em></label>
								<select><option>United States</option></select>
							</li>
							<li>
								<label>State/Province</label>
								<select><option>Please select region, state or province</option></select>
							</li>
							<li>
								<label>Zip/Postal Code</label>
								<input type="text" />
							</li>
						</ul>
					</div>
					<button class="colors-btn" title="Get a Quote">Get a Quote</button>
				</div>
			</div>
			<div class="shopping-cart-totals">
				<div class="grand-row"><div class="left">Grand  Total</div><div class="right"><?php echo 'Rp. '.number_format($this->cart->total(),0,'','.')?></div></div>
				<ul class="checkout-types">
                                    <li><button class="colors-btn" title="Proceed to Checkout" onclick="window.location.href='<?php echo base_url('order/checkout')?>'">Proceed to Checkout</button></li>
				</ul>
			</div>
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