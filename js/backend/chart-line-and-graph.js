	$(document).ready(function () {

		// Graph Data ##############################################
		var graphData = [{
				// Visits
				data: [ [6, 1300], [7, 1600], [8, 1900], [9, 2100], [10, 2500], [11, 2200], [12, 2000], [13, 1950], [14, 1900], [15, 2000] ],
				color: '#a6d87a'
			}, {
				// Returning Visits
				data: [ [6, 500], [7, 600], [8, 550], [9, 600], [10, 800], [11, 900], [12, 800], [13, 850], [14, 830], [15, 1000] ],
				color: '#282828',
				points: { radius: 4, fillColor: '#ffffff' }
			}
		];

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
				hoverable: true
			},
			xaxis: {
				tickColor: 'transparent',
				tickDecimals: 2
			},
			yaxis: {
				tickSize: 500
			}
		});
                $.plot($('#graph-lines2'), graphData, {
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
				hoverable: true
			},
			xaxis: {
				tickColor: 'transparent',
				tickDecimals: 2
			},
			yaxis: {
				tickSize: 500
			}
		});
		
		// Graph Toggle ############################################
		$('#graph-bars').hide();
                $('#graph-bars2').hide();

		$('#lines').on('click', function (e) {
			$('#bars').removeClass('active');
			$('#graph-bars').fadeOut();
			$(this).addClass('active');
			$('#graph-lines').fadeIn();
			e.preventDefault();
		});
                $('#lines2').on('click', function (e) {
			$('#bars2').removeClass('active');
			$('#graph-bars2').fadeOut();
			$(this).addClass('active');
			$('#graph-lines2').fadeIn();
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

		$('#graph-lines, #graph-lines2, #graph-bars, #graph-bars2').bind('plothover', function (event, pos, item) {
			if (item) {
				if (previousPoint != item.dataIndex) {
					previousPoint = item.dataIndex;
					$('#tooltip').remove();
					var x = item.datapoint[0],
						y = item.datapoint[1];
						showTooltip(item.pageX, item.pageY, y + ' visitors at ' + x + '.00h');
				}
			} else {
				$('#tooltip').remove();
				previousPoint = null;
			}
		});

	});