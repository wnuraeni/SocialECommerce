<div class="heading-buttons-sec">
        <h1>Product Review</h1>
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
                                                  <th class="sort-down">Product</th>
                                                  <th class="sort-down">Username</th>
                                                  <th> Review</th>
                                                 </tr>
                                          </thead>
                                          <tbody>
                                              <?php foreach($review as $val):?>
                                                <tr>
                                                    <td><a href="#"><?php echo $val->product_name?></a></td>
                                                    <td><?php echo $val->username?></td>
                                                    <td>
                                                        <p><?php echo $val->date_added?></p>
                                                        <p><?php echo $val->review?></p>
                                                    </td>
                                                   
                                               </tr>
                                              <?php endforeach;?>
                                          </tbody>
                                </table>
                                </div>
                        </div>
                </div>
</div>