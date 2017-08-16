var st; //For debuggin only
$(document).ready(function() {
   var data;
    var clicked = false;
    $(document).ready(function(){
        $("#lapPenjualanBtn").click(function(ev){
        clicked = true;
        ev.preventDefault();
        if(clicked == true){
            alert('clicked');
        }
        });
    });
    if(clicked == false){
        alert('not clicked');
        $.ajax({
            dataType:'json',
            url:'http://localhost/social_commerce/admin/index/penjualan',
            success:function(result){
                data = result;
            }
        });
    }
  //var data = Movies[1]
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

