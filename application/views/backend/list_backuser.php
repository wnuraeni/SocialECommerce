<div class="heading-buttons-sec">
        <h1>Users</h1>
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
                                      <th class="sort-down">ID User</th>
                                      <th>Name</th>
                                      <th>Birthdate</th>
                                      <th>Username</th>
                                      <th>Email</th>
                                      <th>Level</th>
                                      <th>Address</th>
                                      <th>Phone number</th>
                                     </tr>
                              </thead>
                              <tbody>
                                  <?php foreach($user as $o):?>
                                    <tr>
                                        <td>
                                        <?php echo $o->firstname." ".$o->lastname ?>
                                        <br>
                                        <img src="<?php echo  base_url('images/avatar/'.$o->avatar)?>" width="60"  height="70">
                                        </td>
                                        <td><?php echo $o->birthdate ?></td>
                                        <td><?php echo $o->username?></td>
                                        <td><?php echo $o->email ?></td>
                                        <td><?php echo $o->level ?></td>
                                        <td><?php echo $o->address.','.$o->city.'<br>'.$o->province ?></td>
                                        <td><?php echo $o->phone_number ?></td>
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