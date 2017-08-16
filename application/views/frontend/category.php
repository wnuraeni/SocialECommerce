<div class="body-sec">
<section class="content-wrapper">
	<div class="content-container container">
		<div class="breadcrum-container">
			<ul>
				<li><a href="#" title="Home">Home</a></li>
				<li>Man</li>
			</ul>
		</div>
		<div class="col-left">
			<div class="block man-block">
				<div class="block-title">MAN</div>
				<ul>
					<li><a href="#" title="SWEATERS">SWEATERS</a></li>
					<li><a href="#" title="KNIT TOPS">KNIT TOPS</a></li>
					<li><a href="#" title="SHIRTS & BLOUSES">SHIRTS & BLOUSES</a></li>
					<li><a href="#" title="TEE SHIRTS">TEE SHIRTS</a></li>
					<li><a href="#" title="OUTERWEAR & JACKETS">OUTERWEAR & JACKETS</a></li>
				</ul>
			</div>
			<div class="block compare-block">
				<div class="block-title">COMPARE PRODUCTS</div>
				<ul>
					<li>You have no items to compare</li>
				</ul>
			</div>
		</div>
		<div class="col-main">
			<div class="pager-container">
                            <?php echo $this->pagination->create_links()?>
			</div>
			<div class="new-product-block">
				<ul class="product-grid">
                                    <?php
//                                    print_r($products);
                                    $i=1;
                                    foreach($products as $p):?>
					<li>
                                            <div class="pro-img"><img title="Freature Product" alt="Freature Product" src="<?php echo base_url('images/product/'.$p->media_url)?>" /></div>
                                            <div class="pro-content"><p><?php echo $p->product_name?></p></div>
						<div class="pro-price"><?php echo $p->price?></div>
						<div class="pro-btn-block">
							<a class="add-cart left" href="#" onclick="add_to_cart('<?php echo $p->id_product ?>')" title="Add to Cart">Add to Cart</a>
							<a class="add-cart right" href="<?php echo base_url('product/detail/'.$p->id_product) ?>" >View Detail</a>
                                                </div>
						<div class="pro-link-block">
							<div class="clearfix"></div>
						</div>
					</li>
                                <?php
                                if($i%3 == 0){
                                    echo '</ul><ul class="product-grid">';
                                }
                                $i++;
                                endforeach;
                                ?>
				</ul>
			</div>
			<div class="pager-container">
				<div class="pager">
					<div class="show-items">6 Item(s)</div>
					<div class="show-per-page"><label>Show</label> <select><option>09</option></select></div>
				</div>
				<div class="view-by-block">
					<ul class="view-by">
						<li>View as:</li>
						<li><a href="#" title="Grid" class="grid">Grid</a></li>
						<li><a href="#" title="List" class="list">List</a></li>
					</ul>
					<div class="short-by">
						<label>Sort By</label><select><option>Position</option></select>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
		
	</div>
</section>
</div>