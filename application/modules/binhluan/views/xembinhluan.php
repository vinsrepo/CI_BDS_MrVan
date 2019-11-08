<script type='text/javascript'>
  function xembinhluan()
  {
    $.ajax
    ({
       type: "POST",
       url: base_url+"binhluan/index/<?php echo $Loai;?>/<?php echo $ID;?>",
       dataType: "json",
       data: {
                 'Loai':"<?php echo $Loai;?>",
                 'ID':<?php echo $ID;?>
             },
       success: function(response)
       {  
          $("#BinhLuan").html(response);
          $("#BinhLuan").fadeIn(2000);
       }            
    });
     
  }
  window.onload=xembinhluan;
</script>
<script type="text/javascript" src="<? echo base_url();?>/style/js/gioihan_kytu.js"></script>
<div id="BinhLuan" style="width: 600px;height: 400px;"></div>
<input type="button" value="load" onclick="xembinhluan()" />