<script src="<?php echo base_url('js/backend')?>/jquery.easing.min.js"></script><!-- Circle Chart -->
<script src="<?php echo base_url('js/backend')?>/jquery.flot.min.js"></script><!-- Chart -->
<script src="<?php echo base_url('js/backend')?>/side-navigation-tag.js"></script>
<script type="text/javascript" src="<?php echo base_url('js/backend')?>/tcal.js"></script> <!-- Input Calendar -->
<script src="<?php echo base_url('js/backend')?>/jquery-ui.custom.min.js"></script> <!-- Jquery UI Custom -->
<script src="<?php echo base_url('js/backend')?>/chart-line-and-graph.js"></script>
<script type="text/javascript" src="<?php echo base_url('js/backend')?>/jquery.sparkline.min.js"></script> <!-- Sparkline -->
<script src="<?php echo base_url('js/backend')?>/jquery-ui.custom.min.js"></script> <!-- Jquery UI Custom -->
<script src="<?php echo base_url('js/backend')?>/jquery.easypiechart.min.js"></script> <!-- Easy Pie Chart -->
<script type="text/javascript" src="http://xoxco.com/projects/code/tagsinput/jquery.tagsinput.js"></script><!-- Sidebar Add Tag -->


<script>
	(function($){
		$(window).load(function(){
			$("#content_1").mCustomScrollbar({
				scrollButtons:{
					enable:true
				}
			});
		});
	})(jQuery);
</script>
<script>
	(function($){
		$(window).load(function(){
			$("#content_2").mCustomScrollbar({
				scrollButtons:{
					enable:true
				}
			});
		});
	})(jQuery);
</script>

<div class="col-md-6">
        <div class="widget-body">
                <div class="widget-heading green">
                        <i class="icon-signal pull-left"></i><h3 class="pull-left">Profit Graph</h3>
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
                        <div id="graph-wrapper">
                                <div class="graph-info">
                                        <a href="#" class="visitors"><span class="green"></span>Purchasers</a>
                                        <a href="#" class="returning"><span class="brown"></span>Buyers</a>

                                        <a href="#" id="bars2"><span><i class="icon-bar-chart"></i></span></a>
                                        <a href="#" id="lines2" class="active"><span><i class="icon-code-fork"></i></span></a>
                                </div>
                                <div class="graph-container">
                                        <div id="graph-lines2"></div>
                                        <div id="graph-bars2"></div>
                                </div>
                                <div class="graph-details">
                                        <ul>
                                                <li><strong>$5,450<span class="green">+5.00%</span></strong><p>Average of $450.35 Per Day</p></li>
                                                <li><strong>1,120<span class="gray">+5.00%</span></strong><p>Total Buyers : 2,58,256,00</p></li>
                                                <li>
                                                        <form action="#">
                                                                <label>From</label>
                                                                <!-- add class="tcal" to your input field -->
                                                                <div><input type="text" name="date" class="tcal" value="" /></div>
                                                        </form>

                                                        <form action="#">
                                                                <label>To</label>
                                                                <!-- add class="tcal" to your input field -->
                                                                <div><input type="text" name="date" class="tcal" value="" /></div>
                                                        </form>
                                                </li>
                                        </ul>
                                </div>
                        </div>
                </div>
        </div>

</div><!-- Body Sec -->