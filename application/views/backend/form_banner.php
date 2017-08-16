<div class="heading-buttons-sec">
    <h1>Form Banner</h1>
</div>
<div class="body-sec">
    <div class="col-md-6">
            <div class="widget-body">
                    <div class="widget-heading green">
                            <i class="icon-table pull-left"></i><h3 class="pull-left"><?php echo $title?></h3>
                            <ul>
                            <li class="dropdown panel-function">
                                    <a href="#" data-toggle="dropdown" role="button" id="drop6"> <b class="caret"></b></a>
                                    <ul aria-labelledby="drop6" role="menu" class="dropdown-menu" id="menu6">
                                    <li role="presentation"><a class="hide-btn" title=""><i class="icon-angle-up pull-right"></i></a></li>
                                    <li role="presentation"><a class="close-sec" title="">x</a></li>
                                    </ul>
                            </li>
                            </ul>
                    </div>
                    <div class="widget-sec">
                        <?php
                        echo $this->session->flashdata('message');
                        !empty($upload_status)?print_r($upload_status):'';
                        ?>
                        <form action="<?php echo $action?>" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                      <label  for="Title">Title</label>
                                      <input type="text" class="form-control" name="title" value="<?php echo !empty($banner)?$banner->title:set_value('title')?>">
                                      <?php echo form_error('title')?>
                                </div>
                                <input type="hidden" name="id_banner" value="<?php echo !empty($banner)?$banner->id_banner:''?>">
                              <div class="form-group">
                                    <label for="BannerImage">Banner Image</label>
                                    <?php if(!empty($banner)){ ?>
                                    <img src="<?php echo base_url().'images/banner/'.$banner->media_url?>" width="100" height="50">
                                    <?php } ?>
                                    <input type="file" id="media_url" name="media_url">
                              </div>
                              <div class="form-group">
                                    <label for="productPrice">URL</label>
                                    <input type="text" class="form-control" id="url" name="url" value="<?php echo !empty($banner)?$banner->url:set_value('url')?>"/>
                                    <?php echo form_error('url')?>
                              </div>
                              <div class="form-group">
                                    <label for="status">Status</label>
                                    <br>

                                    <div class="radio">
                                    <label>
                                        <input type="radio" id="status" name="status" value="Active"  <?php echo !empty($banner)?(($banner->status =='Active')?'checked=""':'' ):'checked=""'?>/>
                                        Active
                                    </label>
                                    </div>
                                    <div class="radio">
                                    <label><input type="radio" id="status" name="status" value="Disabled" <?php echo !empty($banner)?(($banner->status =='Disabled')?'checked=""':'' ):''?>/>Disabled</label>
                                    </div>
                                    <?php echo form_error('status')?>
                              </div>
                              <button type="submit" name="add_cat" class="btn gray btn-default"><?php echo $btnlabel?></button>
                              <a href="<?php echo base_url('admin/banner')?>"class="btn purple btn-default">Cancel</a>
                            </form>
                    </div>
            </div>
    </div>
</div><!-- Body Sec -->