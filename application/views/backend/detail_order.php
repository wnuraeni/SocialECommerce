<div class="heading-buttons-sec">
    <h1>Order Detail</h1>
</div>
<div class="body-sec">
    <div class="col-md-6">
            <div class="widget-body">
                    <div class="widget-heading green">
                            <i class="icon-table pull-left"></i><h3 class="pull-left"></h3>
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
                
                                <div class="form-group">
                                      <label  for="Title">Order no</label>
                                      <input type="text" class="form-control" name="title"
                                             value="<?php echo $order[0]->order_no?>" disabled>
                                </div>
                         
                              <div class="form-group">
                                    <label for="productPrice">User ID</label>
                                    <input type="text" class="form-control" id="url" name="url"
                                           value="<?php echo $order[0]->id?>" disabled/>
                              </div>
                              <div class="form-group">
                                    <label for="productPrice">Date Ordered</label>
                                    <input type="text" class="form-control" id="url" name="url"
                                           value="<?php echo $order[0]->date_ordered?>" disabled/>
                              </div>
                    </div>
            </div>
    </div>
    <table>
        <th>Product name</th>
        <th>Price</th>
        <?php foreach($order as $o):?>
        <tr>
            <td><?php echo $o->product_name?></td>
            <td><?php echo $o->price?></td>
        </tr>
        <?php endforeach;?>
       
    </table>
    <table>
         <tr><td>Total item</td><td><?php echo $order[0]->total_item?></td></tr>
        <tr><td>Total price</td><td><?php echo $order[0]->total_price?></td></tr>
    </table>
</div><!-- Body Sec -->