<?
if(isset($data_salon)){
    $tinban=$data_salon;
}
?>
<script src="/style/js/bxhupload.js" type="text/javascript"></script>
<link href="/style/css/BXHUpload.css" rel="stylesheet" type="text/css">
<div class="shadowbox" style="overflow: hidden;margin-top: 15px;padding-bottom: 7px;width:600px;"> 
        <style>
  .upload-item{
      margin-right: 10px!important;
  }
  </style>
  <div class="avatar" id="uploadimage" style=""><input id="Avatar" name="Avatar" type="hidden" value="" />
  <div class="uploading" style="display: none;top: 0px;"><img src="/style/images/loading2.gif"  /></div>
  </div>
  <div class="uploadimg" style="display: block;height: 120px;  float: right; width: 416px;">
  <p style="color: #222; text-transform: none;font: italic 13px;<? if(isset($hidden)){echo'display:none';} ?>">(Vui lòng không chèn thêm link của bất kỳ website nào khác)</p>
      <p style="<? if(isset($hidden)){echo'display:none';} ?>">Đăng ảnh theo các định dạng: jpg, png...</p>
      <p>Thay đổi vị trí của ảnh bằng cách kéo thả ảnh vào vị trí mà bạn muốn.</p>
      <p>Ảnh đầu tiên sẽ là ảnh đại diện cho tin của bạn.</p>
      <div id="uploadfiles" >
	<div id='dfile1'> 
          <span class="" id='loading' style='display:none'><img src="/style/images/loader.gif" alt="Đang tải...."/></span>
          <div class="note note-success" id='succes' style='display: none;font-weight: bold; padding: 10px;padding-top: 5px;padding-bottom: 5px;margin-top: 4px;width: 100%;margin-left: 0px;'><i class="mpx-checked"></i> Tải ảnh thành công</div>
	</div>	
		
	</div>
</div>
<input id="AlbumAnh" name="AlbumAnh" type="hidden" value="<? if($tinban['AlbumAnh']!=''){echo $tinban['AlbumAnh'];}else{echo set_value('AlbumAnh');};?>" />
<script>
    $('#uploadimage').bxhupload({ token: 'DtSOq9oRLCqj13IAvGy8rlZNSzKvagnpIbiO2i3MiF0=', target: 'Avatar', maxFiles: 25 });
</script>
<link rel="stylesheet" href="/style/css/dangtin.css" type="text/css"/>
<link rel="stylesheet" href="/style/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8">
<script src="/style/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
<div id="image_lists" style="display: block;margin-top: 120px;<? if(isset($hidden)){echo'width:340px!important';} ?>"> 	 
<?php
    if($this->input->post('AlbumAnh')!=''){
                $Anh=$this->input->post('AlbumAnh');
            }else{
                $Anh=$tinban['AlbumAnh'];
            }
    if($Anh!=''){
    $slide=explode('|',$Anh); 
    foreach($slide as $img)
    {
     if($img!=''){ 
     echo '<div class="sortableitem"><a href="'.show_img($img).'" title="'.$DoiXe['TieuDe'].' '.$tinban['PhanHang'].' '.$tinban['NamSX'].'" rel="prettyPhoto[gallery1]"><img src="'.show_img($img,'170x115').'"></a> <a class="del" href="javascript:void(0)" title="Xóa ảnh" id="'.$img.'" onclick="return del_img(this)"><i class="mpx-close"></i></a></div>';
    }
    }
    }
    ?> 
			
	 	</div>
                        
<script>
function del_img(obj)
{
	if(confirm("Xóa ảnh này ?"))
	{
		$(obj).parent().remove();
        d=$("#AlbumAnh").val();
        $("#AlbumAnh").val(d.replace("|"+$(obj).attr('id')+"",""));
        num_pic--;
		queueSizeLimit++;
		$('#file_upload').uploadifySettings('queueSizeLimit',queueSizeLimit);
		if($("#sortable_img").html().trim()=='')
		{
			$("#noimage").show();
		}
        
        
	}
	return false;
	
}
  $(function() {
    $("#image_lists").sortable({
       update: function( event, ui ) {
        imglist='';
         $('.sortableitem .del').each(function(index){
             imglist+=$(this).attr('id')+'|';
         });
        $("#AlbumAnh").val(imglist);
       }
    }); 
  });
 (function () {
	var input = document.getElementById("userfile"), 
		formdata = false; 

	if (window.FormData) {
  		formdata = new FormData();
  	}
	
 	input.addEventListener("change", function (event) {
 	    $("#loading").show();
        $(".uploading").show();
        $("#succes").hide();
 		var i = 0, len = this.files.length, img, reader, file;
	
		for ( ; i < len; i++ ) {
			file = this.files[i];
			if (!!file.type.match(/image.*/)) {
				 
				if (formdata) {
					formdata.append("userfile", file);
          $.ajax({
            url: "/dang-tin-ban-cho-thue-nha-dat",
            type: "POST",
            data: formdata,
            processData: false,
            contentType: false,
            success: function (responseText) {
               
              $('#image_lists').append(responseText);
                                      $("#loading").hide();
                                      $(".uploading").hide();
                                      $("#userfile").val('');
                                      $("#succes").show().delay(3000).fadeOut(2000);;
                                      c=$("#AlbumAnh").val()+'|'+$("#imgID").val();
                                      $("#AlbumAnh").val(c);
                                      $("#imgID").remove();
                                      $("#image_lists").sortable(); 
                                      $("a[rel^='prettyPhoto']").prettyPhoto({ animation_speed: 'fast', theme: 'light_square', slideshow: 5000, autoplay_slideshow: true, social_tools: '', gallery_markup: '', deeplinking: false, allow_resize: false });
            }
          });
				}
			}	
		}
		if (formdata) {
			
		}
	}, false);
}());
 </script>
                        <script>
                        $("a[rel^='prettyPhoto']").prettyPhoto({ animation_speed: 'fast', theme: 'light_square', slideshow: 5000, autoplay_slideshow: true, social_tools: '', gallery_markup: '', deeplinking: false, allow_resize: false });
                        </script>
                        
                        </div>