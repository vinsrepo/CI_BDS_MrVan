<script type="text/javascript" src="<? echo base_url();?>style/js/jquery-1.3.2.js"></script>
<script type="text/javascript" src="<? echo base_url();?>style/js/jquery.form.js"></script>
<script type="text/javascript" >
 $(document).ready(function() { 
            $('#userfile').change(function(){ 
            $("#loading").show();
			$("#imageform").ajaxForm({
					  	success: function(responseText) {
                                  $('#preview').append(responseText);
                                  $("#loading").hide();
                                  $("#userfile").val('');
                                  }
                        
		}).submit();
	});
}); 
</script>
<form id="imageform" method="post" enctype="multipart/form-data" action='<? echo base_url();?>uploads/images'>
<span id="pimg"><input type="file" id="userfile" name="userfile"  /></span>
</form>
<div id="loading" style="text-align: center;display: none;"><img src="<? echo base_url();?>style/images/loader.gif" alt="Đang tải...."/></div>
<div id='preview' align="center" >
</div>