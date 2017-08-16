<div class="col-md-6">
        <div class="widget-body">
                <div class="widget-heading purple">
                        <i class="icon-shopping-cart pull-left"></i><h3 class="pull-left">Buyers Statistics</h3>
                        <ul>
                        <li class="dropdown panel-function">
                                <a href="#" data-toggle="dropdown" role="button" id="drop3"> <b class="caret"></b></a>
                                <ul aria-labelledby="drop3" role="menu" class="dropdown-menu" id="menu3">
                                <li role="presentation"><a class="hide-btn" title="">-</a></li>
                                <li role="presentation"><a class="close-sec" title="">x</a></li>
                                </ul>
                        </li>
                        </ul>
                </div>
                <div class="widget-sec">
                        <div class="product-left content" id="content_1">
                                <ul>
                                    <?php foreach($useractivity as $val): ?>
                                        <li><div class="product-thumb"><img src="<?php echo base_url('images/avatar/'.$val->profile_pic)?>" alt="" /></div>
                                                <h4><?php echo $val->firstname.' '.$val->lastname?></h4>
                                                <span><?php echo $val->totalshare.' share(s) and '.$val->totallike. ' like(s)'?></span>
                                        </li>
                                       <?php endforeach;?>

                                </ul>
                        </div>
                </div>
        </div>
</div>