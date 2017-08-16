<!-- Script -->
<script src="<?php echo base_url('js/backend')?>/jquery.min.js"></script><!-- Jquery -->
<script src="<?php echo base_url('js/backend')?>/jquery.mCustomScrollbar.concat.min.js"></script><!-- Scroll Bar -->
<script type="text/javascript" src="<?php echo base_url('js/backend')?>/jquery.sparkline.min.js"></script> <!-- Sparkline -->
<script src="<?php echo base_url('js/backend')?>/jquery-ui.custom.min.js"></script> <!-- Jquery UI Custom -->
<script src="<?php echo base_url('js/backend')?>/jquery.easypiechart.min.js"></script> <!-- Easy Pie Chart -->
<script type="text/javascript" src="http://xoxco.com/projects/code/tagsinput/jquery.tagsinput.js"></script><!-- Sidebar Add Tag -->
<script src="<?php echo base_url('js/backend')?>/streaming-mustache.js" type="text/javascript"></script>
<script src="<?php echo base_url('js/backend')?>/stream_table.js" type="text/javascript"></script>
<script src="<?php echo base_url('js/backend')?>/movie_data.js" type="text/javascript"></script>
<script src="<?php echo base_url('js/backend')?>/stream.js" type="text/javascript"></script>
<div class="wrapper">

			<div class="col-md-12">
				<div class="widget-body">
					<div class="widget-heading purple">
						<i class="icon-table pull-left"></i><h3 class="pull-left">Tables Example 2</h3>
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
							<div class="streaming-table">
								<div class="progress progress-striped active">
								  <div id="record_count" class="progress-bar progress-bar-success purple large-progress" style="width: 0%">0</div>
								</div>
									<span id="found" class="label label-info"></span>
									<table id="stream_table" class='table table-striped table-bordered'>
									  <thead>
										<tr>
										  <th>#</th>
										  <th>Name</th>
										  <th>Director</th>
										  <th>Actor</th>
										  <th>Rating</th>
										  <th>Year</th>
										</tr>
									  </thead>
									  <tbody>
									  </tbody>
									</table>
									<div id="summary">
									<div>
								  </div>
								</div>
							</div>
						</div>
					</div>
				</div>


</div><!-- Wrapper -->
<script id="template" type="text/html">
  <tr>
	<td>{{index}}</td>
	<td>{{record.name}}</td>
	<td>{{record.director}}</td>
	<td>{{record.actor}}</td>
	<td>{{record.rating}}</td>
	<td>{{record.year}}</td>
  </tr>
</script>
