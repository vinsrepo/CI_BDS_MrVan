<script type='text/javascript'>
  var LastID=0;
  var Start=0;
  
  function xembinhluan(xemthem)
  {
    
    if(xemthem>0)
    {
       $("#Loading_More").fadeIn();
       var State=1;
    }
    else
    {
       $("#Loading").fadeIn();
       var State=0;
       
    }
    $.ajax
    ({
       type: "POST",
       url: base_url+"binhluan",
       dataType: "json",
       data: {
                 'Loai':$("#Loai").val(),
                 'ID':$("#ID").val(),
                 'LastID':LastID,
                 'Start':Start,
                 'State':State,
             },
       success: function(response)
       {  
          if(response.length) {
            
              for(i=0; i < response.length; i++) 
              {
                fade='<li><article class="comment"><header class="gravatar"><a href="'+base_url+'thanh-vien/'+response[i].userid+'/'+response[i].username+'.html" title="'+response[i].username+'" class="userImage"><img src="'+base_url+''+response[i].Avatar+'" alt="" title="" /></a></header><section class="comment-content"><span class="arrow"> </span><cite class="author-name"><a href="'+base_url+'thanh-vien/'+response[i].userid+'/'+response[i].username+'.html" title="'+response[i].username+'" class="userImage"> '+response[i].username+' </a></cite><div class="comment-meta commentmetadata"> Gửi lúc '+response[i].GuiLuc+'  </div><div class="comment-text"><p> '+response[i].NoiDung_BinhLuan+' </p></div></section></article></li>';
                
                if(LastID==0||xemthem>0) 
                {
                   $("#BinhLuan").append(fade);
                }
                else
                {
                   $("#BinhLuan").prepend(fade); 
                }
                Start=Start+1;
              }
              if(xemthem>0) 
              {}
              else
              {
                LastID = response[0].IDBinhLuan;
              }
          
          }else{
            $("#btn_xemthem").fadeOut();
          }
          $("#Loading").fadeOut(100);
          $("#BinhLuan").fadeIn(3000);
          $("#Loading_More").fadeOut(100);
       }            
    });
     
  }
  
  function guibinhluan()
  {
    $("#stt_thongbao").fadeOut();
    $("#BtnSend").attr({ disabled:true, value:"<?php echo $this->lang->line('lable_Sending');?>" });
    $("#Sending").fadeIn();
    
    $.ajax
    ({
       type: "POST",
       url: base_url+"binhluan/vietbinhluan/",
       dataType: "json",
       data: {
                 'Loai':$("#Loai").val(),
                 'ID':$("#ID").val(),
                 'NoiDung':$("#NoiDung").val(),				
             },
       success: function(response)
       {  
          if(response.ketqua==0)
          {
            $("#stt_thongbao").html('<div class="error-box">'+response.thongbao+'</div>')
            $("#stt_thongbao").fadeIn();
          }
          else
          {
            $("#BinhLuan").fadeOut();
            $("#NoiDung").val('');
            xembinhluan();
            $("#stt_thongbao").html('<div class="success-box">Gửi bình luận thành công !</div>')
            $("#stt_thongbao").fadeIn();
          }
          
          $("#BtnSend").attr({ disabled:false, value:"<?php echo $this->lang->line('btn_binhluan');?>" });
          $("#Sending").fadeOut();
       }            
    });
     
  }
  window.onload=xembinhluan;
</script>
<script type="text/javascript" src="<? echo base_url();?>/style/js/gioihan_kytu.js"></script>
                    <!-- *.Comment Entries.* -->   	
                    <div class="commententries"> 
                    <section class="clients-slider-holder" style="height: 70px;">
                    <div class="container" style="width: 100%;"> 
                    <div class="title"> <span> </span>  <h2> 6 <?php echo $this->lang->line('lable_comment');?> : </h2> </div></div>
                    </section>                                        
                        <ul class="commentlist" id="BinhLuan">    
                        <img id="Loading" src="<? echo base_url();?>style/images/loading.gif" style=" border: 0px;display: none;" />
                        </ul>             
                        <div id="Loading_More" style="height: 100px; display: none; text-align: center;" align="center">  
                        <p class="loading">
                        <img src="<? echo base_url();?>style/images/loading-news.gif" alt="Đang tải dữ liệu..."/><br/>Đang tải dữ liệu...
                        </p></div>
                        <a id="btn_xemthem" href="javascript:xembinhluan(10);" class="btnClick" style="float: right;" title="Xem thêm">Xem thêm bình luận...</a> 
                    </div>  <!-- *.Comment Entries End.* -->  
                    
                    <div class="hr"> </div>  
                                        
                    <!-- *.Respond Form.* -->                      
                    <div class="respond"> 
                        <section class="clients-slider-holder" style="height: 70px;">
                        <div class="container" style="width: 100%;"> 
                        <div class="title"> <span> </span>  <h2> <?php echo $this->lang->line('lable_viet_binhluan');?> : </h2> </div></div>
                        </section>  
                        <div id="stt_thongbao" style="display: none;"></div>  
                        <input type="hidden" name="Loai" id="Loai" value="<?php echo $Loai;?>" />
                        <input type="hidden" name="ID" id="ID" value="<?php echo $ID;?>" />
                            <p>
                                <textarea name="NoiDung" style="width: 95%; height: 100px;float: left;margin: 0px;" placeholder="<?php echo $this->lang->line('lable_input_binhluan');?>" required="" id="NoiDung" onkeyup="checkLen(this, 500);" onchange="checkLen(this, 500);" onfocus="checkLen(this, 500);"></textarea>
                            </p>
                            <p>
                                <table style="border: 0px;padding: 0px;width: 95%;margin: 0px;"><tr style="border: 0px;padding: 0px;margin: 0px;"><td style="border: 0px;padding: 0px;"><input name="submit" id="BtnSend" type="submit" value="<?php echo $this->lang->line('btn_binhluan');?>" onclick="guibinhluan();"/></td><td style="border: 0px;padding: 0px;"><img id="Sending" src="<? echo base_url();?>style/images/loading-news.gif" style="display: none;border: 0px;" /></td><td  style="border: 0px;margin-top: 0px; padding-top: 0px;float: right;"><b><?php echo $this->lang->line('lable_max_value');?> </b></td></tr></table>
                            </p>
                         
                    </div><!-- *.Respond Form - End.* -->     
 




