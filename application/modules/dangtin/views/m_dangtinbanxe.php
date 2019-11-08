     <!-- <script src="/style/js/jquery-1.7.1.min.js"></script> -->

    <script src="/style/js/jquery-ui.js"></script> 
    <script src="/style/js/jquery.scrollToTop.min.js"></script>  
<script src="/style/js/PostNews.min.js?v=120151126" type="text/javascript"></script>
<form action="" id="frmAuto" method="post">
<script type="text/javascript" >
function GetArea(module,code,val,fill,text,set){
    $.ajax
    ({ 
       type: "POST",
       url: "/chon-mau-xe?module="+module+"&"+code+"="+val, 
       success: function(response)
       {
           $("#"+fill).html('<option value="">'+text+'</option>')
           $("#"+fill).append(response);
           
           if(set!=''){  
             $("#"+fill).val(set);  
             if(module=='GetDistrict'){
                $("#hddcboDistP").val($("#"+fill).find('option:selected').attr('data-key'));
                $('#hddcboDistP').click();
             }
           } 
           
       }            
    });
} 
<?
if($this->session->userdata('userid')){
                $dissabled=$tinban['contact']==''?'disabled':''; 
            }else{
                $dissabled='';
                
                }
                if($this->input->post('HangXe')!=''){
                                        $Xe=$this->input->post('HangXe');
                                    }elseif(isset($tinban['HangXe'])){
                                        $Xe=$tinban['HangXe'];
                                    }else{
                                        $Xe='';                            
                                    }
                                    if($Xe!=''){
                                      $HangXe=Modules::run('trangchu/getInfo','baiviet','IDBaiViet',$Xe);
                                    }else{
                                      $HangXe='';
                                    } 
                                   if($this->input->post('hddCanBan')==449||(isset($HangXe['MenuCha'])&&$HangXe['MenuCha']==449)){
                                     echo "$(document).ready(function(){ $('#hplSell').click(); $('#hplSell').addClass('active'); });";
                                   }
                                   if($this->input->post('hddCanBan')==451||(isset($HangXe['MenuCha'])&&$HangXe['MenuCha']==451)){
                                     echo "$(document).ready(function(){ $('#hplRent').click(); $('#hplRent').addClass('active'); });";
                                   }   
                                   
                                   $opition_nam_ban='<option value="Thỏa thuận">Thỏa thuận</option><option value="Triệu">Triệu</option><option value="Tỷ">Tỷ</option><option value="USD">USD</option><option value="USD/m²">USD/m²</option><option value="Triệu/m²">Triệu/m²</option>';
                                    $opition_nam_thue='<option value="Thỏa thuận">Thỏa thuận</option><option value="Triệu/tháng">Triệu/tháng</option><option value="USD/tháng">USD/tháng</option><option value="USD/m²/tháng">USD/m²/tháng</option><option value="Triệu/m²/tháng">Triệu/m²/tháng</option>';
                                    if($HangXe['MenuCha']==449||$HangXe['MenuCha']==747){
                                        $opition_namSoKM=$opition_nam_ban;
                                    }
                                    if($HangXe['MenuCha']==451){
                                        $opition_namSoKM=$opition_nam_thue;
                                    }
                                    $dataSoKM=$tinban['SoKM']!=''?$tinban['SoKM']:set_value('SoKM');
                                    ?>

function getDoiXe(HangXe){
    
    $.ajax
    ({
        
       type: "POST",
       url: "/dangtin/getDoiXe/"+HangXe,
       success: function(response)
       {   
        
          $("#ddlCatePost").html('<option value="">-- Loại nh&#224; đất --</option>'+response);   
          <? if($Xe!=''){echo '$("#ddlCatePost").val('.$Xe.');';}?>
          if(HangXe==449||HangXe==747){
             dataSoKM='<? echo $opition_nam_ban;?>';
          }
          if(HangXe==451){
             dataSoKM='<? echo $opition_nam_thue;?>';
          }
             $("#SoKM").html('<option value="">-- Chọn Mức giá --</option>'+dataSoKM);
             <? if($dataSoKM!=''){echo '$("#SoKM").val("'.$dataSoKM.'");';}?> 
       }            
    });
}
$(document).ready(function () { 
    $("#hplSell").click(function() {
        $("#hplSell").addClass("active");
        $("#hplRent").removeClass("active"); 
        $("#hddCanBan").val(449)
    });
    $("#hplRent").click(function() {
        $("#hplRent").addClass("active");
        $("#hplSell").removeClass("active"); 
        $("#hddCanBan").val(451)
    });
    <? if($tinban==''){echo '$("#hplSell").click();';}?> 
});
</script>
    <div class="content_default">
        <div id="MainContent_postHeader">
	
            <div class="ml4pc mt9 tit">
                <h1 class="content-tit">Đăng tin</h1>
            </div>
            <style>
            .note{
                padding: 5px;
            }
            </style>
            <div style="padding: 5px;padding-bottom: 15px; "><?php $this->load->view('template/statut_thongbao');?></div>
            <div class="sale">
                <div id="typeSell">
                    <div id="hplSell" class="sale_tab sales " onclick="getDoiXe(449);$('.sale_tab').removeClass('active');$(this).addClass('active');">
                        Bán
                    </div>
                </div>
                <div id="typeRent">
                    <div id="hplRent" class="sale_tab rent" onclick="getDoiXe(451);$('.sale_tab').removeClass('active');$(this).addClass('active');">
                        Cho thuê
                    </div>
                </div>
            </div>
        
</div>
        <div class="content">
            

  
<div class="post">
    <div id="MainContent_PostNewsMobile_pnDangtin">
	
        <div class="box">
            <div class="titlebox">
                <h2>Thông tin cơ bản</h2>
            </div>

            <div class="listbox"> 
            <? 
               $styx='';
               if($this->session->userdata('permission')==1):
               $styx=' style="border-top: 1px solid #eee;padding-top: 10px;width: 98%;"';
               ?> 
               <script src='/style/icheck-1.x/icheck.min.js'></script> 
               <link href="/style/icheck-1.x/skins/square/blue.css" rel="stylesheet" />
               <script>
               $(document).ready(function () {
                    $('input').iCheck({
                        checkboxClass: 'icheckbox_square-blue',
                        radioClass: 'iradio_square-blue',
                        increaseArea: '20%' // optional
                      });
                    });
               </script>
                <div class="line" style="width: 100%;overflow: hidden;padding: 10px;margin-bottom: 4px;background: #eee;text-align: center;">
                    <!-- <label style="font-weight: bold;"><?php echo $this->lang->line('lable_TrangThai');?></label> -->
                    <label style="color: #17a2b8;"><input required="" type="radio" name="TrangThai" value="1" <?php if($tinban['TrangThai']==1){echo 'checked';} ?> /> <?php echo $this->lang->line('lable_KichHoat');?> </label>
                    <label style="width: 40% !important;color: red;"><input type="radio" name="TrangThai" value="0" <?php if($tinban['TrangThai']==0){echo 'checked';} ?> /> <?php echo $this->lang->line('lable_ChuaKichHoat');?></label>
                </div>
            <? endif?>

              <div class="box">
                <div class="listbox">
                    <!-- <div class="item"> -->
                        <input type="hidden" name="hddLatitude" id="hddLatitude" value="<? if($tinban['SoCua']!=''){echo $tinban['SoCua'];}else{echo set_value('SoCua');};?>" />
                    <input type="hidden" name="hddLongtitude" id="hddLongtitude" value="<? if($tinban['SoChoNgoi']!=''){echo $tinban['SoChoNgoi'];}else{echo set_value('SoChoNgoi');};?>" />
                    <input type="hidden" name="SoCua" id="txtPositionX" value="<? if($tinban['SoCua']!=''){echo $tinban['SoCua'];}else{echo set_value('SoCua');};?>" />
                    <input type="hidden" name="SoChoNgoi" id="txtPositionY" value="<? if($tinban['SoChoNgoi']!=''){echo $tinban['SoChoNgoi'];}else{echo set_value('SoChoNgoi');};?>" />
                        
    <!--
    <script type="text/javascript" src="http://maps.google.com/maps/api/js"></script>
    -->
                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAncygDLD4qxYy5Uw6vPdz_KH_qOCJDL8U"></script>
                    <script src="/style/js/GoogleMapControl.min.js?v=20140820" type="text/javascript"></script>
                    <div id="mapinfo" class="" style="width: 100%; height:350px; margin-bottom: 15px">
                        <div id="map_canvas" style="display: block"></div>
                    </div>

                    <!-- </div> -->
                </div>
            </div>
                <div class="form-group item width_100">
                    <div class="text">
                        Loại nhà đất <span>*</span>
                    </div> 
                        <select name="HangXe" id="ddlCatePost" class="form-control select">
		                  <option value="">-- Loại nh&#224; đất --</option>
	                    </select>  
                    </div>
                <div class="form-group item padding_right">
                    <div class="text">
                        Tỉnh/Thành phố <span>*</span>
                    </div>  
                   <select id="ddlCity" name="DoiXe" class="form-control select-menu select">
                        <option value="">-- Chọn Tỉnh/Thành phố --</option> 
                        <?
                        $arr = file_get_contents(APPPATH . 'includes/DSTinhThanhKey.txt');
                        foreach(json_decode($arr,true) as $key=>$val){
                            $select_ed=" ".set_select('DoiXe', $val['Text']);
                            if($tinban['DoiXe']==$val['Text']){
                                $select_ed=" selected='selected'";
                            }
                            echo '
                            <option value="'.$val['Text'].'" data-key="'.$val['Id'].'" '.$select_ed.'>'.$val['Text'].'</option>    ';
                        }
                        ?>
                    </select>
                    <input type="hidden" name="hddcboCityP" id="hddcboCityP" value="-1" /> 
                </div>
                <div class="form-group item">
                    <div class="text">
                        Quận/Huyện <span>*</span>
                    </div>
                    <select name="NamSX" id="ddlDistrict" class="form-control select">
                        <option value="">-- Quận/Huyện --</option>
                    </select><input type="hidden" name="hddcboDistP" id="hddcboDistP" value="-1" />
                </div>
                <div class="form-group item padding_right">
                    <div class="text">
                        Phường/Xã
                    </div>
                    <select name="XuatXu" id="ddlWard" class="form-control select">
                        <option value="">-- Phường/Xã --</option>
                    </select>
                    <input type="hidden" name="hddcboWardP" id="hddcboWardP" value="-1" />
                    <input type="hidden" name="hddWardPrefix" id="hddWardPrefix" />
                </div>
                <div class="form-group item">
                    <div class="text">
                        Đường/Phố
                    </div> 
                        <select name="PhanHang" id="ddlStreets" class="form-control select" >
                            <option value="">-- Đường/Phố --</option>
                        </select><input type="hidden" name="hddcboStreetP" id="hddcboStreetP" value="-1" />
                        <input type="hidden" name="hddStreetPrefix" id="hddStreetPrefix" /> 
                </div>
                <div class="form-group item padding_right">
                    <div class="text">
                        Dự án
                    </div>
                    <select id="ddlProjects" name="TinhTrang" class="form-control select">
                            <option value="">-- Dự án --</option>
                        </select><input type="hidden" name="hddcboProjectP" id="hddcboProjectP" value="-1" />
                </div>
                <div class="form-group item">
                    <div class="text">
                        Diện tích (m2)
                    </div>
                    <input name="NgoaiThat" type="text" maxlength="10" id="txtDientich" class="form-control textbox w95pt numbersOnly" onchange="ChangeDientich(this)" value="<? if($tinban['NgoaiThat']!=''){echo $tinban['NgoaiThat'];}else{echo set_value('NgoaiThat');};?>"/>
                    <span class="error" id="spanDientich">Diện tích không hợp lệ!</span>
                </div>
                <div class="form-group item padding_right">
                    <div class="text">
                        Giá
                    </div>
                    <input name="GiaTien" type="text" maxlength="10" id="txtGia" class="form-control textbox numbersOnly2" onchange="ChangeMucgia(this)" value="<? if($tinban['GiaTien']!=''){echo $tinban['GiaTien'];}else{echo set_value('GiaTien');};?>" placeholder="6.8"/>
                    <span class="error" id="spanGia">Giá không hợp lệ!</span>
                </div>
                <div class="form-group item">
                    <div class="text">Đơn vị</div> 
                        <select id="SoKM" name="SoKM" class="form-control select">
                            <option value="">-- Đơn vị --</option>
                        </select>  
                </div>
                <div class="form-group item width_100">
                    <div class="text">
                        Địa điểm <span>*</span> <span class="error" id="spanDiadiem">Bạn cần nhập địa điểm</span>
                    </div>
                    <input name="DongXe" value="<? if($tinban['DongXe']!=''){echo $tinban['DongXe'];}else{echo set_value('DongXe');};?>" type="text" maxlength="150" id="txtDiadiem" class="form-control w95pt" onchange="ChangeDiadiem(this)" />
                    <input type="hidden" name="hddDiadiem" id="hddDiadiem" />
                </div>
            </div>
        </div>
        <div class="box">
            <div class="titlebox">
                <h2>Thông tin khác</h2>
            </div>
            <div class="listbox">
                <div class="form-group item padding_right">
                    <div class="text">
                        Mặt tiền (m)
                    </div>
                    <input name="HopSo" value="<? if($tinban['HopSo']!=''){echo $tinban['HopSo'];}else{echo set_value('HopSo');};?>" type="number" maxlength="10" id="txtMattien" class="form-control textbox numbersOnly" />
                    <span class="error" id="spanMattien">Mặt tiền không hợp lệ!</span>
                </div>
                <div class="form-group item">
                    <div class="text">
                        Đường trước nhà (m)
                    </div>
                    <input name="DanDong" value="<? if($tinban['DanDong']!=''){echo $tinban['DanDong'];}else{echo set_value('DanDong');};?>" type="number" maxlength="10" id="txtDuongtruocnha" class="form-control textbox w95pt numbersOnly" placeholder="m" /> 
                </div>
                <div class="form-group item padding_right">
                    <div class="text">
                        Hướng BĐS
                    </div>  
                        <select name="NoiThat" class="form-control select-item select">
                            <option value="">-- Chọn Hướng nhà --</option>
                            <?
                            $opition_nam='
                                <option value="Không xác định">Không xác định</option>
                                <option value="Đông">Đông</option>
                                <option value="Tây">Tây</option>
                                <option value="Nam">Nam</option>
                                <option value="Bắc">Bắc</option>
                                <option value="Đông-Bắc">Đông-Bắc</option>
                                <option value="Tây-Bắc">Tây-Bắc</option>
                                <option value="Tây-Nam">Tây-Nam</option>
                                <option value="Đông-Nam">Đông-Nam</option> 
                            ';
                            preg_match_all("/<option value=\"(.*?)\">(.*?)<\/option>/is", $opition_nam, $matches);
                            foreach($matches[2] as $key => $val){
                                $select_ed=" ".set_select('NoiThat', $val);
                                if($tinban['NoiThat']==$val){
                                    $select_ed=" selected='selected'";
                                }
                               
                              echo "
                              <option value='$val'$select_ed>$val</option>
                              ";
                            }
                            ?>
                            
                    </select> 
                </div>
                <div class="form-group item">
                    <div class="text">
                        Số tầng
                    </div>
                    <input name="NhienLieu" value="<? if($tinban['NhienLieu']!=''){echo $tinban['NhienLieu'];}else{echo set_value('NhienLieu');};?>" type="number" maxlength="3" id="txtSotang" class="form-control textbox w95pt numbersOnly" />
                    <span class="error" id="spanSotang">Số tầng không hợp lệ!</span>
                </div>
                <div class="form-group item padding_right">
                    <div class="text">
                        Số phòng
                    </div>
                    <input name="HeThongNapNhienLieu" value="<? if($tinban['HeThongNapNhienLieu']!=''){echo $tinban['HeThongNapNhienLieu'];}else{echo set_value('HeThongNapNhienLieu');};?>" type="number" maxlength="3" id="txtSophong" class="form-control textbox numbersOnly" />
                    <span class="error" id="spanSophong">Số phòng không hợp lệ!</span>
                </div>
                <div class="form-group item">
                    <div class="text">
                        Số toilet
                    </div>
                    <input name="MucTieuThu" value="<? if($tinban['MucTieuThu']!=''){echo $tinban['MucTieuThu'];}else{echo set_value('MucTieuThu');};?>" type="number" maxlength="3" id="txtSotoilet" class="form-control textbox w95pt numbersOnly" />
                    <span class="error" id="spanSotoilet">Số toilet không hợp lệ!</span>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="titlebox">
                <h2>Mô tả chi tiết</h2>
                <div class="note">
                    (Vui lòng gõ tiếng Việt có dấu)
                </div>
            </div>
            <div class="listbox">
                <div class="form-group item width_100">
                    <div class="text">
                        Tiêu đề <span>*</span> 
                    </div>
                    <input name="TieuDe" value="<? if($tinban['TieuDe']!=''){echo $tinban['TieuDe'];}else{echo set_value('TieuDe');};?>" type="text" maxlength="150" id="txtTieude" class="form-control w95pt" />
                </div> 
                <div class="form-group item width_100">
                    <div class="text">
                        Nội dung mô tả <span>*</span> 
                    </div>
                    <textarea name="ThongTinMota" id="tarNoidung" cols="60" rows="5" class="w95pt" maxlength="3000"><? if($tinban['ThongTinMota']!=''){echo str_replace('<br/>',"\n",$tinban['ThongTinMota']);}else{echo str_replace('<br/>',"\n",set_value('ThongTinMota'));};?></textarea>
                </div>
            </div>

        </div>

        <div class="alert alert-info box" id="box_images">
            <div class="titlebox">
                <h2>Cập nhật hình ảnh
           <span id="spanLuuY" style="font-size: 12px !important; color: #424143; font-weight: normal;text-transform:none">(Bạn có thể nhập tối đa 16 ảnh và mỗi ảnh nặng không quá 4mb!)</span>
                </h2>
            </div>
            <div class="listbox">
                <div class="item width_100" style="margin-bottom: 0;">
                    <div id="fileupload">
                        <link href="/style/css/shop-icon.css" rel="stylesheet" /> 

                        <? $hidden=1;
                        include 'upanh.php';
                        ?>
                        <style>
                        .uploadimg{
                            width: 200px!important;
                            float: left!important;
                            padding: 0px!important; 
                            font-size: 12px!important;
                            margin-top: 10px;
                        }
                        .uploadimg p{
                            padding: 0px!important;
                            margin-top: -5px!important;
                        }
                        </style>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>

        <div class="alert alert-info box">
            <div class="titlebox">
                <h2>Thông tin liên hệ</h2>
            </div>
            <div class="listbox">
                <div class="form-group item width_100">
                    <div class="text">
                        Họ tên <span>*</span> <span class="error" id="spanHovaten">Bạn cần nhập họ và tên</span>
                    </div>
                    <input  <? echo $dissabled;?> <?  if(isset($data_user_info)||$this->session->userdata('userid')==FALSE){?> name="contact[HoVaTen]" <?}?> type="text" value="<?  if(isset($data_user_info)){echo $data_user_info['HoVaTen'];}elseif(isset($user_info)){echo $user_info['HoVaTen'];}else{echo $_POST['contact']['HoVaTen'];};?>" maxlength="100" id="txtHovaten" class="form-control textbox w95pt" />
                </div>
                <div class="form-group item width_100">
                    <div class="text">
                        Địa chỉ
                    </div>
                    <input <? echo $dissabled;?> <?  if(isset($data_user_info)||$this->session->userdata('userid')==FALSE){?>name="contact[DiaChi]"<?}?> type="text" value="<?  if(isset($data_user_info)){echo $data_user_info['DiaChi'];}elseif(isset($user_info)){echo $user_info['DiaChi'];}else{echo $_POST['contact']['DiaChi'];};?>" maxlength="150" id="MainContent_PostNewsMobile_txtDiachi" class="form-control textbox w95pt" />
                </div>
                <div class="form-group item width_100">
                    <div class="text">
                        Điện thoại  <span>*</span>
                    </div>
                    <input  <? echo $dissabled;?> <?  if(isset($data_user_info)||$this->session->userdata('userid')==FALSE){?>name="contact[DienThoai]"<?}?> type="text" value="<?  if(isset($data_user_info)){echo $data_user_info['DienThoai'];}elseif(isset($user_info)){echo $user_info['DienThoai'];}else{echo $_POST['contact']['DienThoai'];};?>" id="txtDienthoai" class="form-control textbox w95pt" />
                </div> 
                <div class="form-group item width_100">
                    <div class="text">
                        Email <span class="error" id="spanEmail">Email sai định dạng, bạn hãy nhập lại!</span>
                    </div>
                    <input <? echo $dissabled;?> <?  if(isset($data_user_info)||$this->session->userdata('userid')==FALSE){?>name="contact[Email]"<?}?> type="text" value="<?  if(isset($data_user_info)){echo $data_user_info['Email'];}elseif(isset($user_info)){echo $user_info['Email'];}else{echo $_POST['contact']['Email'];};?>" maxlength="50" id="txtEmail" class="form-control textbox w95pt" />
                </div>

            </div>
        </div>
        <div class="hline"></div>
        <div class="box"> 
<?
            if($tinban==''):?>
            <div id="MainContent_PostNewsMobile_divCaptcha" class="form-group item padding_right">
                <div class="text">
                    Mã an toàn <span>*</span>
                </div>
                <input name="MaXacNhan" type="text" maxlength="10" class="form-control textbox "/>
                
            </div>
            
            <div class="item">
                    <div class="text" style="height: 25px;">
                       
                    </div>
                    <img src="/maxacnhan/captcha" id="captcha" title="Mã xác nhận" style=" margin-left: 5px;  vertical-align: middle;width: 120px; "/><img title="Đổi mã xác nhận khác" src="/style/images/ref.gif" width="26" height="25" onclick="document.getElementById('captcha').src='/maxacnhan/captcha?'+Math.random();" style=" vertical-align: middle; "/>
                </div>
            <? endif;?> 
            <div class="item wr_botton">
                <a onclick="return ValidateData();" id="btnSave" class="btn btn-success btn-sm" href="javascript:document.getElementById('frmAuto').submit()"><?
            if($tinban==''){echo 'Đăng tin';}else{echo 'Lưu tin';}?> </a>
                <a id="MainContent_PostNewsMobile_btnCancel" class="btn btn-danger btn-sm" href="/thanh-vien/quan-ly-tin-rao">Hủy</a>
            </div>
        </div>
    
</div>

    
    
</div>
<script type="text/javascript">

    var productid = '0';
    var RootDomain = 'http://sannhadat.vip';   
    $("input.numbersOnly").numeric();
    $('input[type=text]').bind("keypress", function (e) {
        // enter key code is 13
        if (e.which === 13) {
            if(ValidateData()){
                __doPostBack('ctl00$MainContent$PostNewsMobile$btnSave', '');
            }
        }
    })
</script>
  
 
<?
    if($this->input->post('NamSX')!=''){
        $quan=$this->input->post('NamSX');
    }else{
        $quan=$tinban['NamSX'];
    }
    if($quan!=''){  
         echo "<script>GetArea('GetDistrict','cityCode',$('#ddlCity').find('option:selected').attr('data-key'),'ddlDistrict','Chọn Quận/Huyện','$quan');</script>";
    } 
    ?>
<?
    if($this->input->post('XuatXu')!=''){
        $phuong=$this->input->post('XuatXu');
    }else{
        $phuong=$tinban['XuatXu'];
    }
    if($phuong!=''){  
        echo "<script>
            $('#hddcboDistP').click(function(){
                GetArea('GetWard','distId',$('#hddcboDistP').val(),'ddlWard','Chọn Phường/Xã','$phuong');
            });
          </script>";
    }  
    ?>
<?
    if($this->input->post('PhanHang')!=''){
        $duong=$this->input->post('PhanHang');
    }else{
        $duong=$tinban['PhanHang'];
    } 
    if($duong!=''){  
        echo "<script>
            $('#hddcboDistP').click(function(){
                GetArea('GetStreet','distId',$('#hddcboDistP').val(),'ddlStreets','Chọn Đường/Phố','$duong');
            });
        </script>";
    }  
    ?>
<?
    if($this->input->post('TinhTrang')!=''){
        $duan=$this->input->post('TinhTrang');
    }elseif($this->session->userdata('TinhTrang')!=''){
        $duan=$this->session->userdata('TinhTrang');
    }else{
        $duan=$xemtinban['TinhTrang'];
    }    
    echo "<script>
        $('#hddcboDistP').click(function(){
            GetArea('GetProject','distId',$('#hddcboDistP').val(),'ddlProjects','Chọn Dự án','$duan');
        });
      </script>";
   
    ?>
<script type="text/javascript">

    //$(document).ready(function () {
    //    $(".various").fancybox({
    //        type: 'iframe',
    //        href: '/xem-truoc.htm',
    //        maxWidth: 800,
    //        maxHeight: 800,
    //        fitToView: true,
    //        width: '90%',
    //        height: '90%',
    //        autoSize: true,
    //        closeClick: false,
    //        openEffect: 'none',
    //        closeEffect: 'none',
    //        padding: 0
    //    });
    //}); 
    $('#ddlCity').on('change', function () { 
        $("#hddcboCityP").val($('option:selected', this).attr('data-key'));
        $("#hddcboDistP").val(-1);
        $("#hddcboWardP").val(-1);
        $("#hddcboStreetP").val(-1);
        $("#hddcboProjectP").val(-1); 
        GetArea('GetDistrict','cityCode',$('option:selected', this).attr('data-key'),'ddlDistrict','-- Chọn Quận/Huyện --','');
        ShowLocation(); 
    });
    $('#ddlDistrict').on('change', function (){
        $("#hddcboDistP").val($('option:selected', this).attr('data-key')); 
        GetArea('GetWard','distId',$('option:selected', this).attr('data-key'),'ddlWard','-- Chọn Phường/Xã --','<? echo $phuong;?>');   
        GetArea('GetStreet','distId',$('option:selected', this).attr('data-key'),'ddlStreets','-- Chọn Đường/Phố --','<? echo $duong;?>');
        GetArea('GetProject','distId',$('option:selected', this).attr('data-key'),'ddlProjects','-- Chọn Dự án --','<? echo $duan;?>');   
        ShowLocation(); 
    }); 
    $('#ddlWard').on('change', function () {
        $("#hddcboWardP").val($('#ddlWard').find('option:selected').attr('data-key')); 
        $("#hddWardPrefix").val($('#ddlWard').find('option:selected').attr('wardprefix')); 
        $("#hddcboStreetP").val(-1); 
        GetDiadiem();  
        ShowLocation(); 
    }); 
    $('#ddlStreets').on('change', function () {
        $("#hddcboStreetP").val($('#ddlStreets').find('option:selected').attr('data-key')); 
        $('#hddStreetPrefix').val($('#ddlStreets').find('option:selected').attr('streetprefix')); 
        GetDiadiem();  
        ShowLocation(); 
    }); 
    $('#ddlProjects').on('change', function () {

        $("#hddcboProjectP").val($('#ddlProjects').find('option:selected').attr('data-key'));
        GetDiadiem();  
        ShowLocation(); 
        //loadProjectMap($('#ddlProjects').val());

        var wardId = $('#ddlProjects option:selected').attr('wardid');
        //console.log(wardId);
        if (wardId > 0) {
            $('#select2-ddlWard-container').html($('#ddlWard option[value="' + wardId + '"]').html());
            $('#ddlWard').val(wardId);
            $("#hddcboWardP").val(wardId);
        }
    });

    //// managage back button click (and backspace)
    //var count = 0; // needed for safari
    //window.onload = function () {
    //    if (typeof history.pushState === "function") {
    //        history.pushState("back", null, null);
    //        window.onpopstate = function () {
    //            history.pushState('back', null, null);
    //            if (count == 1) { window.location = window.location; }
    //        };
    //    }
    //}
    //setTimeout(function () { count = 1; }, 200);
</script>

        </div>
    </div>
    </form>