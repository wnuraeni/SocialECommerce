<div class="col-md-6">
    <div class="widget-body">
            <div class="widget-heading blue">
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
    <div class="widget-sec no-padding">
            <div class="our-purchaser">
                    <input type="radio" name="nav" id="one" checked="checked"/>
                            <label for="one">Most Share</label>

                            <input type="radio" name="nav" id="two"/>
                            <label for="two">Most Like</label>

                            <input type="radio" name="nav" id="three"/>
                            <label for="three">Most Rate</label>

                            <article class="content-tab one">
                                <?php foreach($share as $val): ?>
                                    <div class="col-md-4">
                                            <div class="product-area">
                                                    <img src="<?php echo base_url('images/product/'.$val->media_url)?>" alt="" />
                                                    <h6><?php echo $val->product_name?></h6>
                                                    <span>Share :  <?php echo $val->total; ?> times</span>
                                                    <span><?php echo 'Rp. ' .number_format($val->price,0,'','.')?></span>
                                            </div>
                                    </div>
                                <?php endforeach; ?>
                            </article>

                            <article class="content-tab two">
                               <?php foreach($like as $val): ?>
                                    <div class="col-md-4">
                                            <div class="product-area">
                                                    <img src="<?php echo base_url('images/product/'.$val->media_url)?>" alt="" />
                                                    <h6><?php echo $val->product_name?></h6>
                                                    <span>Like :  <?php echo $val->total; ?> times</span>
                                                    <span><?php echo 'Rp. ' .number_format($val->price,0,'','.')?></span>
                                            </div>
                                    </div>
                                <?php endforeach; ?>
                            </article>

                            <article class="content-tab three">
                                   
                                    <?php foreach($prating as $val): ?>
                                    <div class="col-md-4">
                                            <div class="product-area">
                                                    <img src="<?php echo base_url('images/product/'.$val->media_url)?>" alt="" />
                                                    <h6><?php echo $val->product_name?></h6>
                                                    <?php 
                                                    $num = $rating[$val->id_product];
                                                    for($i=0;$i<$num;$i++){
                                                        echo '<i class="icon-star"></i>';
                                                    }
                                                    ?>
                                                    <span><?php echo 'Rp. ' .number_format($val->price,0,'','.')?></span>
                                            </div>
                                    </div>
                                    <?php endforeach; ?>
                                   
                                    
                            </article>

            </div>
    </div>
    </div>
</div>