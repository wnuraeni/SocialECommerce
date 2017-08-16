<div class="heading-buttons-sec">
    <h1>Form Category</h1>
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
                            <form action="<?php echo $action?>" method="POST">
                                <fieldset disabled="">
                                    <div class="form-group">
                                          <label  for="categoryID">Category ID</label>
                                          <input type="text" class="form-control" value="<?php echo !empty($category)?$category->id_category:''?>">
                                    </div>
                                </fieldset>
                                <input type="hidden" name="id_category" value="<?php echo !empty($category)?$category->id_category:''?>">
                              <div class="form-group">
                                    <label for="categoryName">Category Name</label>
                                    <input type="text" class="form-control" id="categoryName" name="category" value="<?php echo !empty($category)?$category->category_name:''?>">
                              </div>
                                
                              <button type="submit" name="add_cat" class="btn gray btn-default"><?php echo $btnlabel?></button>
                              <a href="<?php echo base_url('admin/category')?>"class="btn purple btn-default">Cancel</a>
                            </form>
                    </div>
            </div>
    </div>	
</div><!-- Body Sec -->