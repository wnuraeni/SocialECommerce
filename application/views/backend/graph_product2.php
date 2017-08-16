<div class="col-md-12">
        <div class="widget-body">
                <div class="widget-heading green">
                        <i class="icon-signal pull-left"></i><h3 class="pull-left">Sales and Activity Graph</h3>
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
                    <p style="text-align: center; font-weight: bold"><?php echo 'Periode : '.date('d-F-Y',strtotime($start)).' ~ '.date('d-F-Y',strtotime($end))?></p>
                        <div id="graph-wrapper">
                                <div class="graph-info">
                                        <a href="#" class="visitors"><span class="green"></span>Sales</a>
                                        <a href="#" class="returning"><span class="gray"></span>Activities</a>

                                        <a href="#" id="bars"><span><i class="icon-bar-chart"></i></span></a>
                                        <a href="#" id="lines" class="active"><span><i class="icon-code-fork"></i></span></a>
                                </div>
                                <div class="graph-container">
                                        <div id="graph-lines"></div>
                                        <div id="graph-bars"></div>
                                </div>
                                <div class="graph-details">
                                        <!--<ul>
                                                <li><strong><span class="green">$5,450</span></strong><p>Sales Average of $450.35 Per Day</p></li>
                                                <li><strong><span class="gray">1,120</span></strong><p>Total Activities : 2,58,256,00</p></li>
                                        </ul>-->
                                    <form action="<?php echo base_url('admin/laporan/grafikpenjualan') ?>" method="POST">
                                                    <div class="col-md-1">
                                                       <div class="inline-form">
                                                          <label>From</label>
                                                       </div>
                                                    </div>

                                                    <!-- add class="tcal" to your input field -->
                                                     <div class="col-md-3">
                                                       <div class="inline-form">
                                                       <input type="text" name="dateStart" class="tcal" value="" />
                                                       </div>
                                                     </div>

                                                    <div class="col-md-1">
                                                       <div class="inline-form">
                                                          <label>To</label>
                                                       </div>
                                                    </div>
                                                    <!-- add class="tcal" to your input field -->
                                                    <div class="col-md-3">
                                                        <div class="inline-form">
                                                        <input type="text" name="dateEnd" class="tcal" value="" />
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                            <div class="inline-form">
                                                        <button type="submit" name="submit" class="btn gray" id="searchPeriod">Submit</button>
                                                            </div>
                                                    </div>
                                                    </form>
                                </div>
                        </div>
                </div>
        </div>

</div><!-- Body Sec -->
<script src="<?php echo base_url('js/backend')?>/jquery.easing.min.js"></script><!-- Circle Chart -->
<script src="<?php echo base_url('js/backend')?>/jquery.flot.min.js"></script><!-- Chart -->
<script src="<?php echo base_url('js/backend')?>/side-navigation-tag.js"></script>
<script type="text/javascript" src="<?php echo base_url('js/backend')?>/tcal.js"></script> <!-- Input Calendar -->
<script src="<?php echo base_url('js/backend')?>/jquery-ui.custom.min.js"></script> <!-- Jquery UI Custom -->
<script type="text/javascript" src="<?php echo base_url('js/backend')?>/jquery.sparkline.min.js"></script> <!-- Sparkline -->
<script src="<?php echo base_url('js/backend')?>/jquery-ui.custom.min.js"></script> <!-- Jquery UI Custom -->
<script src="<?php echo base_url('js/backend')?>/jquery.easypiechart.min.js"></script> <!-- Easy Pie Chart -->
<script type="text/javascript" src="<?php echo base_url('js/backend')?>/jquery.tagsinput.js"></script><!-- Sidebar Add Tag -->


<script>
	$(document).ready(function () {

		// Graph Data ##############################################
		var graphData =  <?php echo $datagrafik ?>

		// Lines Graph #############################################
		$.plot($('#graph-lines'), graphData, {
			series: {
				points: {
					show: true,
					radius: 5
				},
				lines: {
					show: true
				},
				shadowSize: 0
			},
			grid: {
				color: '#282828',
				borderColor: 'transparent',
				borderWidth: 60,
				hoverable: true,
                                clickable: true
			},
			xaxis: {
				tickColor: 'transparent',
				tickDecimals: 2
			},
			yaxis: {
				tickSize: 500
			}
		});

		// Bars Graph ##############################################
		$.plot($('#graph-bars'), graphData, {
			series: {
				bars: {
					show: true,
					barWidth: .7,
					align: 'center'
				},
				shadowSize: 0
			},
			grid: {
				color: '#646464',
				borderColor: 'transparent',
				borderWidth: 40,
				hoverable: true
			},
			xaxis: {
				tickColor: 'transparent',
				tickDecimals: 2
			},
			yaxis: {
				tickSize: 800
			}
		});

		// Graph Toggle ############################################
		$('#graph-bars').hide();

		$('#lines').on('click', function (e) {
			$('#bars').removeClass('active');
			$('#graph-bars').fadeOut();
			$(this).addClass('active');
			$('#graph-lines').fadeIn();
			e.preventDefault();
		});

		$('#bars').on('click', function (e) {
			$('#lines').removeClass('active');
			$('#graph-lines').fadeOut();
			$(this).addClass('active');
			$('#graph-bars').fadeIn().removeClass('hidden');
			e.preventDefault();
		});

		// Tooltip #################################################
		function showTooltip(x, y, contents) {
			$('<div id="tooltip">' + contents + '</div>').css({
				top: y - 16,
				left: x + 20
			}).appendTo('body').fadeIn();
		}

		var previousPoint = null;

		$('#graph-lines, #graph-bars').bind('plotclick', function (event, pos, item) {
			if (item) {
				if (previousPoint != item.dataIndex) {
					previousPoint = item.dataIndex;
					var x = item.datapoint[0],
						y = item.datapoint[1];
                                                alert(x+","+y);
//						showTooltip(item.pageX, item.pageY, y + ' visitors at ' + x + '.00h');
				}
			} else {
				previousPoint = null;
			}
		});

	});
        </script>