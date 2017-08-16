<div class="heading-buttons-sec">
        <h1>Categories</h1>
        <div class="heading-buttons">
            <a href="<?php echo base_url('admin/category/add_category')?>" title="" class="btn" >Add New</a>
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
								  <th class="sort-down">ID</th>
								  <th>Category Name</th>
                                                                  <th>Action</th>
								 </tr>
							  </thead>
							  <tbody>
                                                              <?php foreach($categories as $cat):?>
								<tr>
                                                                    <td><?php echo $cat->id_category ?></td>
                                                                    <td><a href="#"><?php echo $cat->category_name?></a></td>
                                                                    <td>       								
                                                                        <a href="<?php echo base_url('admin/category/update_category/'.$cat->id_category)?>" style="color:white" class="btns  purple sml-btn">Edit</a>
                                                                        <a href="<?php echo base_url('admin/category/delete_category/'.$cat->id_category)?>" class="btns  red sml-btn" style="color:white; margin-left: 50px">Delete</a>
                                                                    </td>
                                                               </tr>
                                                              <?php endforeach;?>
                                                          </tbody>
                                                </table>
						</div>
					</div>
				</div>
                </div>