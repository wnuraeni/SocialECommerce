<div class="heading-buttons-sec">
        <h1>Categories</h1>
        <div class="heading-buttons">
            <a href="<?php echo base_url('admin/banner/add_banner')?>" title="" class="btn" >Add New</a>
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
								  <th>Title</th>
                                                                  <th>Image</th>
                                                                  <th>Status</th>
                                                                  <th>URL</th>
                                                                  <th>Action</th>
								 </tr>
							  </thead>
							  <tbody>
                                                              <?php foreach($banner as $ban):?>
								<tr>
                                                                    <td><?php echo $ban->id_banner ?></td>
                                                                    <td><a href="#"><?php echo $ban->title?></a></td>
                                                                    <td><img src="<?php echo base_url('images/banner/'.$ban->media_url)?>" width="50" height="50"></td>
                                                                    <td><a href="#"><?php echo $ban->status?></a></td>
                                                                    <td><a href="#"><?php echo $ban->url?></a></td>
                                                                    <td>
                                                                        <a href="<?php echo base_url('admin/banner/update_banner/'.$ban->id_banner)?>" style="color:white" class="btns  purple sml-btn">Edit</a>
                                                                        <a href="<?php echo base_url('admin/banner/delete_banner/'.$ban->id_banner)?>" class="btns  red sml-btn" style="color:white; margin-left: 50px">Delete</a>
                                                                    </td>
                                                               </tr>
                                                              <?php endforeach;?>
                                                          </tbody>
                                                </table>
						</div>
					</div>
				</div>
                </div>