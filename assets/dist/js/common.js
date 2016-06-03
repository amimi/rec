$(function() {
  $('input').iCheck({
    checkboxClass: 'icheckbox_flat-red',
    radioClass: 'iradio_flat-red'
  });
  
  $('#published_at').datepicker({
  	dateFormat: 'yy/mm/dd'
  });
});
