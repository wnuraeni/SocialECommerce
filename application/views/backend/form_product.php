<div class="heading-buttons-sec">
   <div class="col-md-2">
        <div class="icon-btn"><a href="<?php echo $link_info?>" title=""><div><i class="icon-globe"></i>Product Info</div></a></div>
    </div>
    <div class="col-md-2">
            <div class="icon-btn"><a href="<?php echo $link_media ?>"><div><i class="icon-picture"></i>Product Media</div></a></div>
    </div>

</div>
<div class="body-sec">
<?php echo $this->session->flashdata('message');?>
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
            <div >
            <form action="<?php echo $action?>" method="POST">
            <div class="form-group">
            <label>Category Product</label>
            <select name="id_category" class="form-control">
            <?php
            foreach($category as $cat):?>
            <option value="<?php echo $cat->id_category?>"
            <?php echo (!empty($product))?(($product->id_category == $cat->id_category) ? 'selected="selected"' : ''):'' ?>
            >
            <?php echo $cat->category_name ?>
            </option>
            <?php endforeach; ?>
            </select>
            </div>
            <div class="form-group">
            <label>Brand Product</label>
            <select name="id_brand" class="form-control">
            <?php foreach($brand as $b):?>
            <option value="<?php echo $b->id_brand?>"
            <?php (!empty($product))?(($product->id_brand == $b->id_brand) ? 'selected="selected"' : ''):'' ?>
            >
            <?php echo $b->brand_name?>
            </option>
            <?php endforeach; ?>
            </select>
            </div>
            <div class="form-group">
            <label  for="productCode">Product Code</label>
            <input type="text" class="form-control" name="product_code" value="<?php echo !empty($product)?$product->product_code:set_value('product_code')?>">
            </div>
            <div class="form-group">
            <label  for="productName">Product Name</label>
            <input type="text" class="form-control" name="product_name" value="<?php echo !empty($product)?$product->product_name:set_value('product_name')?>">
            </div>
            <input type="hidden" name="id_product" value="<?php echo !empty($product)?$product->id_product:''?>">
            <div class="form-group">
            <label for="productDescription">Product Description</label>
            <textarea class="form-control" id="productDescription" name="product_description"> <?php echo !empty($product)?$product->description:''?></textarea>
            </div>
            <div class="form-group">
            <label for="productPrice">Product Quantity</label>
            <input type="text" class="form-control" id="productPrice" name="product_qty" value="<?php echo !empty($product)?$product->stock:''?>"/>
            </div>
            <div class="form-group">
            <label for="productPrice">Product Price</label>
            <input type="text" class="form-control" id="productPrice" name="product_price" value="<?php echo !empty($product)?$product->price:''?>"/>
            </div>
            <input type="submit" name="add_prod" class="btn btn-primary" value="<?php echo $btnlabel?>">

            </form>
            </div>
            </div>
        </div>
    </div>
</div><!-- Body Sec -->