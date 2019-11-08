<!-- START CONTENT -->  <script src="/style/js/jquery-1.7.1.min.js"></script>
<form action="" method="post" class="form">
            <section id="main-content" class=" ">
                <section class="wrapper" style='margin-top:60px;display:inline-block;width:100%;padding:15px 0 0 15px;'>
                 <div class="col-md-12 col-sm-12 col-xs-12">
<?php $this->load->view("admin/statut_thongbao");?>
                                    </div>
 <div class="col-md-12 col-sm-12 col-xs-12">
       <style>
           .alert b, .alert button span{
              color: green!important;
           }
           .alert {
              margin-top: 10px;
              margin-bottom: 10px;
           }
       </style>
 </div>
    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
      <section class="box ">
          <header class="panel_header">
              <h2 class="title pull-left">Thêm dự án mới</h2>
              <div class="actions panel_actions pull-right">
                  <i class="box_toggle fa fa-chevron-down"></i> 
                  <i class="box_close fa fa-times"></i>
              </div>
          </header>
          <div class="content-body">
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="row"> 
                  <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="col-xs-7 m-0 p-0">
                   <div class="form-group">
                          <label class="form-label" for="TenSalon"><?php echo $this->lang->line('lable_name_salon');?></label> 
                          <div class="controls">
                    <input type="text" class="form-control input-lg" name="TenSalon" id="TenSalon" value="<?php if(isset($users['TenSalon'])){echo $users['TenSalon'];}else{echo set_value('TenSalon');}?>"> 
                     </div>
                          
                          </div>
                      </div>
                  <div class="col-xs-5  ">
                     
              <div id="AnhLoGo" style="float: left;margin-right: 10px;display: inline-block;">
          <?php
             if($users['LoGo']!=''){
              echo '
          <img src="'.show_img($users['LoGo'],'170x115').'" style="max-width: 100px;max-height: 100px;">
          ';
          }
          ?>
          
         </div>
         <div style="margin-top: 25px!important; ">
         <label class="form-label" for="Domain">Ảnh logo</label> 
         <input type="file" id="file_photo" style=" " class="input"  />
                <div id='dfile1'> 
                <span class="" id='loading1' style='display:none'><img src="<? echo base_url();?>style/images/loader.gif" alt="Đang tải...."/></span>
                <div class="alert alert-success" id='succes1' style=' display:none;font-weight: bold; padding: 10px;padding-top: 5px;padding-bottom: 5px;margin-top: 8px;width: 80%;overflow: hidden;'><i class="mpx-checked"></i> Tải ảnh thành công</div>
				</div>
          <input type="hidden" id="LoGo" name="LoGo" value="<?php echo $users['LoGo'];?>" />
  </div>   
<style>
.sortableitem
{ 
	height:100px;
	width:169px;
}
.uploading{
    top: 0px;
}
</style>
<script>
 (function () {
	var input = document.getElementById("file_photo"), 
		formdata = false;
	if (window.FormData) {
  		formdata = new FormData();
  	}	
 	input.addEventListener("change", function (evt) {
 	    $("#loading1").show();
        $("#succes1").hide();
        $("#AnhLoGo").hide();
 		var i = 0, len = this.files.length, img, reader, file;
	
		for ( ; i < len; i++ ) {
			file = this.files[i];
	
			if (!!file.type.match(/image.*/)) {
				 
				if (formdata) {
					formdata.append("userfile", file);
				}
			}	
		}
	
		if (formdata) {
			$.ajax({
				url: "/dangtin/dangtinbanxe/logo",
				type: "POST",
				data: formdata,
				processData: false,
				contentType: false,
				success: function (responseText) {
					$('#AnhLoGo').html(responseText);
          $("#loading1").hide();
          $("#file_photo").val('');
          $("#succes1").show();
          $("#LoGo").val($("#imgID").val());
          $("#imgID").remove();
          $("#AnhLoGo").show();
				}
			});
		}
	}, false);
}());
 </script>
         </div>
          </div>  
          </div>          
             
          
                                                  
          
          <div class="form-group">
              <label class="form-label" for="Domain"><?php echo $this->lang->line('lable_domain_salon');?></label> 
              <div class="controls">
               <div class="row"> 
      <div class="col-md-12 col-sm-12 col-xs-12">
 <div class="col-xs-4 m-0 p-0">
  <select id="Domain" class="form-control input-lg m-bot15" name="Domain" >
      <option value=""></option>
<?php 
$menu=Modules::run('trangchu/getList','baiviet',1114,0,'NgayGui desc','IDBaiViet',array('MenuCha'=>455));
                                         
                                                                                                                 
        //$menu=catToTree($menu,0,' - - ',array('MenuCha','TieuDe')); 
 
    foreach ($menu as $data)
    {  
       
       if($data['IDBaiViet']==$users['Domain'])
       {
          $select='selected';
       }
       else
       {
          $select='';
       }
       echo '<option value="'.$data['IDBaiViet'].'" '.$select.'> '.$data['TieuDe'].'</option>'; 
    }
    ?>								 
  </select>
</div> 
<div class="col-xs-4 ">
  <select id="ddlCity" name="TinhThanh" class="form-control  input-lg m-bot15">
    <option value="">Tỉnh/Thành Phố</option>
      <?
      $arr = file_get_contents(APPPATH . 'includes/DSTinhThanhKey.txt');
      foreach(json_decode($arr,true) as $key=>$val){
      $select_ed=" ".set_select('DoiXe', $val['Text']);
      if($users['TinhThanh']==$val['Text']){
          $select_ed=" selected='selected'";
      }
      echo '
      <option value="'.$val['Text'].'" data-key="'.$val['Id'].'" '.$select_ed.'>'.$val['Text'].'</option>    ';
      }
        ?>
  </select> 
  </div>
  <div class="col-xs-4 m-0 p-0">
         <select id="ddlDistrict" name="QuanHuyen" class="form-control  input-lg m-bot15" ><option value="">Quận/Huyện</option></select>    
  </div>                                                         
    <script type="text/javascript">
     
      function GetArea(module,code,val,fill,text,set){
    $.ajax
    ({ 
       type: "POST",
       url: "/chon-mau-xe?module="+module+"&"+code+"="+val, 
       success: function(response)
       {
        if(set!=''){  
            response=response.replace('<option value="'+set+'"','<option value="'+set+'" selected')
        }else{
            $("#"+fill).html('<option value="">'+text+'</option>')
        }
           
           $("#"+fill).append(response); 
           $('#loading').hide();
       }            
    });
} 
  
    $('#ddlCity').on('change', function () {  
        $('#loading').show(); 
        GetArea('GetDistrict','cityCode',$('option:selected', this).attr('data-key'),'ddlDistrict','Quận/Huyện',''); 
        showLocation($('option:selected', this).text()); 
    });
    $('#ddlDistrict').on('change', function () {
        $('#loading').show();
        $("#hddcboDistP").val($('option:selected', this).attr('data-key')); 
        GetArea('GetProject','distId',$('option:selected', this).attr('data-key'),'hddEProject','Chọn Dự án',''); 
        showLocation($('option:selected', this).text() +' , '+ $('option:selected', $('#ddlCity')).text()); 
    });     
</script>   
  <?
     if($users['TinhThanh']!=''){  
       echo "<script>GetArea('GetDistrict','cityCode',$('#ddlCity').find('option:selected').attr('data-key'),'ddlDistrict','Quận/Huyện','".$users['QuanHuyen']."');</script>";
        }
        ?> 
            </div>
            </div>
          </div>
          </div>	
            <div class="form-group"> 
                <div class="controls">
                    <div class="row"> 
        <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-xs-4 m-0 p-0">
        
        
         <div class="form-group">
                <label class="form-label" for="hddDiadiem">Địa chỉ</label> 
                <div class="controls">
                    <input type="text" name="DiaChi" class="form-control input-lg" id="hddDiadiem" value="<?php if(isset($users['DiaChi'])){echo $users['DiaChi'];}else{echo set_value('DiaChi');}?>">
                </div>
            </div>
        <div class="form-group">
                <label class="form-label" for="DienThoai">Điện thoại</label> 
                <div class="controls">
                    <input type="text" name="DienThoai" class="form-control input-lg" id="DienThoai" value="<?php if(isset($users['DienThoai'])){echo $users['DienThoai'];}else{echo set_value('DienThoai');}?>">
                </div>
            </div> 
        <div class="form-group">
                <label class="form-label" for="Website">Website</label> 
                <div class="controls">
                    <input type="text" name="Website" class="form-control input-lg" id="Website"   value="<?php if(isset($users['Website'])){echo $users['Website'];}else{echo set_value('Website');}?>">
                </div>
            </div>
        <div class="form-group">
                <label class="form-label" for="Email">Email</label> 
                <div class="controls">
                    <input type="text" name="Email" class="form-control input-lg" id="Email"  value="<?php if(isset($users['Email'])){echo $users['Email'];}else{echo set_value('Email');}?>">
                </div>
            </div>             
        </div>
   <div class="col-xs-8">
   <div class="controls">
   <div class="form-group">
   <label class="form-label" for="Title">BẢN ĐỒ</label>  
       <input type="hidden" name="hddLatitude" id="hddLatitude" value="<? if($users['txtPositionX']!=''){echo $users['txtPositionX'];}else{echo set_value('hddLatitude');};?>" />
<input type="hidden" name="hddLongtitude" id="hddLongtitude" value="<? if($users['txtPositionY']!=''){echo $users['txtPositionY'];}else{echo set_value('hddLongtitude');};?>" />
<input type="hidden" name="txtPositionX" id="txtPositionX" value="<? if($users['txtPositionX']!=''){echo $users['txtPositionX'];}else{echo set_value('txtPositionX');};?>" />
<input type="hidden" name="txtPositionY" id="txtPositionY" value="<? if($users['txtPositionY']!=''){echo $users['txtPositionY'];}else{echo set_value('txtPositionY');};?>" />
 
   <style>
   #map_canvas {
    float: left;
    width: 100%;
    height: 343px;
    border: 1px solid #cac1ba; 
    text-align: justify;
  }
   </style>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAncygDLD4qxYy5Uw6vPdz_KH_qOCJDL8U"></script>
<script src="/style/js/GoogleMapControl.min.js?v=2015112" type="text/javascript"></script>
<div id="mapinfo">
    <div id="map_canvas"></div>
</div>
<script> 
//$("#txtDiadiem").focusout(function() { 
  //  ShowLocation(); 
//});
</script>
 </div> 
</div>
 </div>
          </div>
           </div>
          </div>                                        
           </div>   
          <div class="form-group">
              <label class="form-label" for="GioiThieu"><?php echo $this->lang->line('lable_gioithieu');?></label> 
              <div class="controls">
                  <?php
         
        if(isset($users['GioiThieu'])){
            $GioiThieu=$users['GioiThieu'];
        }else{
            $GioiThieu=set_value('GioiThieu');
        }
        echo $this->ckeditor->editor("GioiThieu",html_entity_decode($GioiThieu)); 
        
         
        ?>
                </div>
            </div>
            
            <div class="form-group">
                <label class="form-label" for="GioiThieu"><?php echo $this->lang->line('lable_xedangban');?></label> 
                <div class="controls">
                  <div class="row"> 
        <div class="col-md-12 col-sm-12 col-xs-12 m-0 p-0">
   <div class="col-xs-8">
   <?php
         
        if(isset($users['AlbumAnh'])){
            $AlbumAnh=$users['AlbumAnh'];
        }else{
            $AlbumAnh=set_value('AlbumAnh');
        }
        echo $this->ckeditor->editor("AlbumAnh",html_entity_decode($AlbumAnh)); 
        
         
        ?>
        </div>
        
        <div class="col-xs-4">
         <div class="form-group">
                    <label class="form-label" for="Title">Tiêu đề SEO</label> 
                    <div class="controls">
                        <input type="text" name="Title" class="form-control input-lg" id="Title" value="<?php if(isset($users['Title'])){echo $users['Title'];}else{echo set_value('Title');}?>">
                    </div>
                </div>
            <div class="form-group">
                    <label class="form-label" for="H1">Thẻ H1</label> 
                    <div class="controls">
                        <input type="text" name="H1" class="form-control input-lg" id="H1" value="<?php if(isset($users['H1'])){echo $users['H1'];}else{echo set_value('H1');}?>">
                    </div>
                </div> 
            <div class="form-group">
                    <label class="form-label" for="tagsinput-1">Meta Keyword</label> 
                    <div class="controls">
                        <input type="text" name="Keyword" class="form-control input-lg" id="tagsinput-1" data-role="tagsinput" value="<?php if(isset($users['Keyword'])){echo $users['Keyword'];}else{echo set_value('Keyword');}?>">
                    </div>
                </div>
            <div class="form-group">
                    <label class="form-label" for="Description">Meta Description</label> 
                    <div class="controls">
                        <textarea name="Description" id="Description" class="form-control input-lg" style="height: 100px;"><?php if(isset($users['Description'])){echo $users['Description'];}else{echo set_value('Description');}?></textarea>
                    </div>
                </div>
        </div>
            </div>
            
            </div>
                        
                    </div>
                </div>
                
                
                <div class="form-group pull-left">
                    <label class="form-label" for="TrangThai"><?php //echo $this->lang->line('lable_TrangThai');?> </label> 
                    <div class="controls" style="float: right;">
                        <input tabindex="5" type="radio" name="TrangThai" id="TrangThai" value="1" class="skin-square-green" <?php if(isset($users['TrangThai'])&&($users['TrangThai']=='1')){ echo "checked";}else{echo set_radio('TrangThai', '1');} ?>/> <label class="iradio-label form-label" for="TrangThai" style="margin-right: 20px;"><?php echo $this->lang->line('lable_KichHoat');?> </label>
                        <input tabindex="5" type="radio" name="TrangThai" value="0" id="square-radio-3" class="skin-square-green" <?php if(isset($users['TrangThai'])&&($users['TrangThai']=='0')){ echo "checked";}else{echo set_radio('TrangThai', '0');} ?>/> <label class="iradio-label form-label" for="square-radio-3"><?php echo $this->lang->line('lable_ChuaKichHoat');?> </label>

                    </div>
                </div>
                
                <button class="btn btn-success btn-icon bottom15 pull-right" type="submit">
                    <i class="fa fa-save"></i> &nbsp; <span>Lưu thay đổi</span>
                </button>

            </div>
        </div>

    </div>
</section>
</div>

</section>
</section>
</form>
            <!-- END CONTENT -->