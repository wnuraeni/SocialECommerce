<div class="heading-buttons-sec">
        <h1>Products</h1>
        <div class="heading-buttons">
            <a href="<?php echo base_url('admin/product/add_product')?>" title="" class="btn" >Add New</a>
        </div>
</div>			
		<div class="body-sec">
                    <?php
                    $msg = $this->session->flashdata('message');
                    if($msg == 'success') :?>
                        <div class="alert alert-success fade in">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <strong>Good!</strong> Database update success!
                        </div>
                    <?php elseif($msg == 'failed') :?>
                        <div class="alert alert-error fade in">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <strong>Something Wrong!</strong> Failed to update database!
                        </div>
                   <?php  endif; ?>
			<div class="col-md-12">
				<div class="widget-body">
					<div class="widget-heading purple">
						<i class="icon-table pull-left"></i><h3 class="pull-left">Tables</h3>
						<ul>
						<li class="dropdown panel-function">
							<a href="#" data-toggle="dropdown" role="button" id="drop2"> <b class="caret"></b></a>
							<ul aria-labelledby="drop2" role="menu" class="dropdown-menu" id="menu2">
							<li role="presentation"><a class="hide-btn" title="">-</a></li>
							<li role="presentation"><a class="close-sec" title="">x</a></li>
							</ul>
						</li>
						</ul>
					</div>
					<div class="widget-sec">
						<table id="country-list" class="sortable-table">
							  <thead>
								<tr class="country-table-head">
								  <!--<th class="sort-down">ID Prod</th>-->
                                                                  <th class="sort-down">Category</th>
                                                                  <th class="sort-down">Brand</th>
								  <th>Product Name</th>
                                                                  <th>Product Description</th>
                                                                  <th>Price</th>
                                                                  <th>Stock</th>
                                                                  <th>Date Added</th>
                                                                  <th>Action</th>
								 </tr>
							  </thead>
							  <tbody>
                                                              <?php foreach($product as $prod):?>
								<tr>
                                                                    <!--<td><?php echo $prod->id_product ?></td>-->
                                                                    <td><a href="#"><?php echo $prod->category_name?></a></td>
                                                                    <td><a href="#"><?php echo $prod->brand_name?></a></td>
                                                                    <td><a href="#"><?php echo $prod->product_name?></a></td>
                                                                    <td><?php echo $prod->description?></td>  
                                                                    <td><?php echo $prod->price?></td>
                                                                    <td><?php echo $prod->stock?></td>
                                                                    <td><?php echo $prod->date_added?></td>
                                                                    <td>       								
                                                                        <a href="<?php echo base_url('admin/product/update_product/'.$prod->id_product)?>" 
                                                                           style="color:white" class="btns  purple sml-btn">Edit</a>
                                                                        <a href="<?php echo base_url('admin/product/delete_product/'.$prod->id_product)?>" 
                                                                           class="btns  red sml-btn" style="color:white; margin-left: 50px">Delete</a>
                                                                    </td>
                                                               </tr>
                                                              <?php endforeach;?>
                                                          </tbody>
                                                </table>
						</div>
					</div>
				</div>
                </div>