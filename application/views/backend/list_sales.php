<div class="heading-buttons-sec">
        <h1>Orders</h1>
</div>


		<div class="body-sec">
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
								  <th class="sort-down">Order no</th>
								  <th>Id User</th>
                                                                  <th>Date Ordered</th>
                                                                  <th>Total Item</th>
                                                                  <th>Total Price</th>
                                                                  <th>Order Status</th>
                                                                  <th>Payment Status</th>
                                                                  <th>Shipping Status</th>
                                                                  <th>Action</th>
								 </tr>
							  </thead>
							  <tbody>
                                                              <?php foreach($orders as $o):?>
								<tr>
                                                                    <td><?php echo $o->order_no ?></td>
                                                                    <td><?php echo $o->id_user ?></td>
                                                                    <td><?php echo $o->date_ordered ?></td>
                                                                    <td><?php echo $o->total_item ?></td>
                                                                    <td><?php echo $o->total_price ?></td>
                                                                    <td><?php echo $o->order_status ?></td>
                                                                    <td><?php echo $o->payment_status ?></td>
                                                                    <td><?php echo $o->shipping_status ?></td>
                                                                    <td>
                                                                        <a href="<?php echo base_url('admin/order/confirm/'.$o->order_no)?>" style="color:white" class="btns  purple sml-btn">Confirm</a>
                                                                        <a href="<?php echo base_url('admin/order/cancel/'.$o->order_no)?>" style="color:white" class="btns  red sml-btn" style="color:white; margin-left: 50px">Cancel</a>
                                                                        <a href="<?php echo base_url('admin/order/detail/'.$o->order_no)?>" class="btns  purple sml-btn" style="color:white; margin-left: 50px">Detail</a>
                                                                    </td>
                                                               </tr>
                                                              <?php endforeach;?>
                                                          </tbody>
                                                </table>
						</div>
					</div>
				</div>
                </div>