<div class="heading-buttons-sec">
   <div class="col-md-2">
        <div class="icon-btn"><a href="<?php echo $link_info?>" title=""><div><i class="icon-globe"></i>Product Info</div></a></div>
    </div>
    <div class="col-md-2">
            <div class="icon-btn"><a href="<?php echo $link_media ?>"><div><i class="icon-envelope"></i>Product Media</div></a></div>
    </div>

</div>
<div class="body-sec">
    <?php
    $msg = $this->session->flashdata('message');
    if($msg == 'success') :?>
        <div class="alert alert-success fade in">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <strong>Good!</strong> Upload & Add media success!
        </div>
    <?php elseif($msg == 'failed') :?>
        <div class="alert alert-error fade in">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <strong>Something Wrong!</strong> Failed to upload media!
        </div>
    <?php  endif; ?>
    <div class="col-md-12">
    <div class="widget-body">
    <div class="widget-heading green">
    <i class="icon-table pull-left"></i>
    <h3 class="pull-left"><?php echo $title?></h3>
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
                <div class="gallery sec">
                    <?php foreach($medias as $med):?>
                    <div class="col-md-3">
                            <div class="image_tn">
                                <a href="<?php echo base_url('admin/product/update_media').'/'.$id_product.'/'.$med->id_product_media ?>">
                                    <img src="<?php echo base_url('images/product').'/'.$med->media_url?>" alt="<?php echo $med->alt?>" width="50" height="120"/>
                                </a>
                                <span class="blue"><a title="Evening" class="html5lightbox" href="<?php echo base_url('images/frontend').'/'.$med->media_url?>">
                                        <i class="icon-search blue"></i></a>
                                    <a href="<?php echo base_url('admin/product/delete_media').'/'.$id_product.'/'.$med->id_product_media?>"><i class="icon-trash blue"></i></a></span>
                            </div>
                    </div>
                    <?php endforeach;?>

                </div>
                <div style="background-color: #71c633; width: 100%; height: 30px; float: left; padding: 5px; margin-bottom: 10px">
                <span style=" color: #fff"><?php echo $subtitle?></span>
                </div>
                <div class="col-md-6">
                    
                    
                    <form action="<?php echo $action?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id_media" value="<?php echo !empty($id_media)?$id_media:''?>">
                        <div class="form-group">
                        <label for="file">File</label>
                        <input type="file" class="form-control" name="media_url" />
                        </div>
                        <div class="form-group">
                        <label for="alt">Alt</label>
                        <input type="text" class="form-control" name="alt" value="<?php echo !empty($media)?$media->alt:''?>"/>
                        </div>
                        <div class="form-group">
                        <label>Set as default</label><br>
                        <div class="radio">
                            <label><input type="radio" name="as_default" value="1" <?php echo !empty($media)?($media->as_default==1?'checked':''):'' ?> >Yes</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="as_default" value="0" <?php echo !empty($media)?($media->as_default==0?'checked':''):'checked' ?>>No</label>
                        </div>
                        </div>
                    <input type="submit" name="add_media" class="btn btn-primary" value="<?php echo $btnlabel?>">
                    <a href="<?php echo base_url('admin/product/add_media/'.$id_product)?>" class="btn btn-info">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div><!-- Body Sec -->