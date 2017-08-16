<div class="wrapper">
<div class="col-md-12">
    <div class="widget-body">
            <div class="widget-heading purple">
                    <i class="icon-table pull-left"></i><h3 class="pull-left">Laporan Penjualan</h3>
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
                <div class="streaming-table">
                     <div style="float:right">
                <form action="<?php echo base_url('admin/laporan/penjualan')?>" method="POST">
                    <div class="col-md-1">
                       <div class="inline-form">
                         From
                       </div>
                    </div>
                    <div class="col-md-3">
                       <div class="inline-form">
                         <input type="text" name="dateStart" class="tcal" />
                       </div>
                    </div>
                    <div class="col-md-1">
                       <div class="inline-form">
                         To
                       </div>
                    </div>
                    <div class="col-md-3">
                        <div class="inline-form">
                         <input type="text" name="dateEnd" class="tcal"/>
                        </div>
                    </div>
                     <div class="col-md-2">
                       <div class="inline-form">
                        <button id="lapPenjualanBtn" class="btn gray pull-right">Search</button>
                       </div>
                     </div>
                </form>
               </div>
                     <div class="clearfix"></div><br>
                    <p style="text-align: center; font-weight: bold"><?php echo 'Periode : '.date('d-F-Y',strtotime($start_date)).' ~ '.date('d-F-Y',strtotime($end_date))?></p>
                    <br>
                   
       <table id="stream_table" class='table table-striped table-bordered'>
            <thead>
                        <tr class="country-table-head">
                          <th>#</th>
                          <th class="sort-down">Product name</th>
                          <th>Total Sold Item</th>
                          <th>Total Share</th>
                          <th>Total Like</th>
                          <th>Detail</th>
                         </tr>
                  </thead>
                  <tbody>
                   
                  </tbody>

        </table>
                </div>
        </div>
    </div>
</div>
</div>

<script type="text/javascript" src="<?php echo base_url('js/backend')?>/jquery.sparkline.min.js"></script> <!-- Sparkline -->
<script src="<?php echo base_url('js/backend')?>/jquery-ui.custom.min.js"></script> <!-- Jquery UI Custom -->
<script src="<?php echo base_url('js/backend')?>/jquery.easypiechart.min.js"></script> <!-- Easy Pie Chart -->
<script src="<?php echo base_url('js/backend')?>/streaming-mustache.js" type="text/javascript"></script>
<script src="<?php echo base_url('js/backend')?>/stream_table.js" type="text/javascript"></script>
<script src="<?php echo base_url('js/backend')?>/movie_data.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url('js/backend')?>/tcal.js"></script> <!-- Input Calendar -->

<script>
$(document).ready(function() {
  //var data = Movies[1]

  var data = <?php echo $data_laporan ?>;
  var html = $.trim($("#template").html()), template = Mustache.compile(html);
  var view = function(record, index){
    return template({record: record, index: index});
  };
  var $summary = $('#summary');
  var $found = $('#found');
  var $record_count = $('#record_count');

  $('#found').hide();

  var callbacks = {
    pagination: function(summary){
      if ($.trim($('#st_search').val()).length > 0){
        $found.text('Found : '+ summary.total).show();
      }else{
        $found.hide();
      }
      $summary.text( summary.from + ' to '+ summary.to +' of '+ summary.total +' entries');
    },
    after_add: function(){
      var percent = this.data.length*100/2000;
      $record_count.text(percent + '%').attr('style', 'width:' + percent + '%');

      //Only for example: Stop ajax streaming beacause from localfile data size never going to empty.
      if (this.data.length == 2000){
        this.stopStreaming();
        $('.example .progress').removeClass('active').hide();
      }

    }
  }

  /*st = StreamTable('#stream_table',
    { view: view,
      per_page: 10,
      //data_url: 'http://localhost/social_commerce/data/movies.json',
      callbacks: callbacks,
      pagination: {span: 5, next_text: 'Next &rarr;', prev_text: '&larr; Previous'}
    },data
  );

  //Only for example: Stop ajax streaming beacause from localfile data size never going to empty.

  var timer = setTimeout(function(){
    st.clearTimer();
    $('.example .progress').removeClass('active').hide();
   }, 10*1000);
  */
var options = {
  view: view,                  //View function to render table rows.  stream_after: 2,
  per_page: 10,
  pagination: {span: 5, next_text: 'Next &rarr;', prev_text: '&larr; Previous'}
}

$('#stream_table').stream_table(options, data);

});

</script>
<script id="template" type="text/html">
  <tr>
	<td>{{index}}</td>
	<td>{{record.product_name}}</td>
	<td>{{record.sold_item}}</td>
	<td>{{record.total_share}}</td>
        <td>{{record.total_like}}</td>
        <td></td>
  </tr>
</script>