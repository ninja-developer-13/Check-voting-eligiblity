<script type="text/javascript">
$(document).ready(function(){
    var dob = $('#dob').val();
  // save comment to database
  $(document).on('click', '#submit_btn', function(){
$.ajax({
  	  url: 'calculate-age.php',
  	  type: 'POST',
  	  data: {
    	'dob':dob
      },
      success: function(response){
        // remove the deleted comment
        $clicked_btn.parent().remove();
        $('#dob').val('');
      }
  	});
});
});
</script>