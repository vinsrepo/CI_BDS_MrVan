 
<div class="wr_page">          
    <div class="index-page" style="padding-top: 65px">
        <div class="content">           
<link href="/style/css/select2.min.css" rel="stylesheet" />
<script src="/style/js/select2.full.min.js"></script>
<link href="/style/icheck-1.x/skins/square/blue.css" rel="stylesheet" /> 
<script src="/style/js/jquery-ui.js"></script>
   
<!-- <script src="/style/js/jquery.validate.min.js"></script> -->

<script src='/style/icheck-1.x/icheck.min.js'></script> 
       
<form action="" id="frmAuto" method="post">
<!-- Content Right -->
<div class="col-sm-12" style="padding: 0;">
    <input type="hidden" name="hddLatitude" id="hddLatitude" value="<? if($tinban['SoCua']!=''){echo $tinban['SoCua'];}else{echo set_value('hddLatitude');};?>" />
    <input type="hidden" name="hddLongtitude" id="hddLongtitude" value="<? if($tinban['SoChoNgoi']!=''){echo $tinban['SoChoNgoi'];}else{echo set_value('hddLongtitude');};?>" />
    <input type="hidden" name="SoCua" id="txtPositionX" value="<? if($tinban['SoCua']!=''){echo $tinban['SoCua'];}else{echo set_value('SoCua');};?>" />
    <input type="hidden" name="SoChoNgoi" id="txtPositionY" value="<? if($tinban['SoChoNgoi']!=''){echo $tinban['SoChoNgoi'];}else{echo set_value('SoChoNgoi');};?>" />
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAncygDLD4qxYy5Uw6vPdz_KH_qOCJDL8U"></script>
    <script src="/style/js/GoogleMapControl.min.js?v=20140820" type="text/javascript"></script>     
    <div id="mapinfo">
        <div id="map_canvas" style="width: 100%"></div>
    </div>
</div>
<div class="mright">
    <!-- Đăng tin -->
    <div id="ContentPlaceHolder1_pnMainContent">
    <script src="/style/js/PostNews.min.js?v=120151126" type="text/javascript"></script>
    <script type="text/javascript" > 
        <?
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
         echo "$(document).ready(function(){ $('#hplSell').click(); $('#hplSell').addClass('hplcate-active'); });";
        }
        if($this->input->post('hddCanBan')==451||(isset($HangXe['MenuCha'])&&$HangXe['MenuCha']==451)){
         echo "$(document).ready(function(){ $('#hplRent').click(); $('#hplRent').addClass('hplcate-active'); });";
        }   

        $opition_nam_ban='<option value="Thỏa thuận">Thỏa thuận</option><option value="Triệu">Triệu</option><option value="Tỷ">Tỷ</option><option value="USD">USD</option><option value="USD/m²">USD/m²</option><option value="Triệu/m²">Triệu/m²</option>';
        $opition_nam_thue='<option value="Thỏa thuận">Thỏa thuận</option><option value="Triệu/tháng">Triệu/tháng</option><option value="USD/tháng">USD/tháng</option><option value="USD/m²/tháng">USD/m²/tháng</option><option value="Triệu/m²/tháng">Triệu/m²/tháng</option>';
        if($HangXe['MenuCha']==449){
            $opition_namSoKM=$opition_nam_ban;
        }
        if($HangXe['MenuCha']==451){
            $opition_namSoKM=$opition_nam_thue;
        }
        ?>
    function getDoiXe(HangXe){
        
        $.ajax
        ({
            
           type: "POST",
           url: "/dangtin/getDoiXe/"+HangXe,
           success: function(response)
           {   
            
              $("#ddlType").html(response);
              $("#ddlType").select2('val', '<? echo $Xe;?>');   
              if(HangXe==449){
                 dataSoKM='<? echo $opition_nam_ban;?>';
              }
              if(HangXe==451){
                 dataSoKM='<? echo $opition_nam_thue;?>';
              }
                 $("#SoKM").html('<option value="">-- Chọn Mức giá --</option>'+dataSoKM);
                 $("#SoKM").select2('val','<? if($tinban['SoKM']!=''){echo $tinban['SoKM'];}else{echo set_value('SoKM');};?>'); 
           }            
        });
    }
</script>    
<div class="postnews">
    <div id="ContentPlaceHolder1_ctl00_pnDangtin">
        <div class="pn-title mt-3">
            <h1>Đăng tin rao bán, cho thuê nhà đất</h1>
        </div>
        <div class="pn-content"> 
        <div style=" width: 99%;margin-left: -10px;"><?php $this->load->view('template/statut_thongbao');?></div>
        <? 
       $styx='';
       if($this->session->userdata('permission')==1):
       $styx=' style="border-top: 1px solid #eee;padding-top: 10px;width: 98%;"';
       ?> 
       <script>
       $(document).ready(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
          });
        });
        </script>
        <div class="line" style="width: 100%;overflow: hidden;padding: 10px;margin-bottom: 30px;background: #eee;text-align: center;">
            <label style="font-weight: bold;"><?php echo $this->lang->line('lable_TrangThai');?></label>
            <label style="color: blue;"><input required="" type="radio" name="TrangThai" value="1" <?php if($tinban['TrangThai']==1){echo 'checked';} ?> /> <?php echo $this->lang->line('lable_KichHoat');?> </label>
            <label style="width: 270px!important;color: red;"><input type="radio" name="TrangThai" value="0" <?php if($tinban['TrangThai']==0){echo 'checked';} ?> /> <?php echo $this->lang->line('lable_ChuaKichHoat');?></label>
        </div>
        <? endif?>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label for="txtTieude" class="col-sm-2 col-form-label" style="padding:0;">Tiêu đề <span class="text-danger">*</span>:</label>
                    <div class="col-sm-10" style="padding:0;">
                        <input name="TieuDe" type="text" tabindex="19" class="form-control input1 input3" id="txtTieude" placeholder="Vui lòng gõ tiếng Việt có dấu" value="<? if($tinban['TieuDe']!=''){echo $tinban['TieuDe'];}else{echo set_value('TieuDe');};?>">
                        <div class="clear"></div>
                        <span class="help-block field-validation-valid" data-valmsg-for="txtTieude"
                                      data-valmsg-replace="true"></span>
                        <span style="color: Red; display: none;" id="spanTieude">Bạn cần nhập tiêu đề</span>
                        <span style="color: Red; display: none;" id="spanLimit">Tiêu đề phải nhập ít nhất 5 chữ!</span>
                        <span style="color: Red; display: none;" id="spanMaxCharacter">Tiêu đề không được nhập quá 99 kí tự!</span>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tarNoidung">Mô tả <span class="text-danger">*</span>:</label>
                    <textarea name="ThongTinMota" rows="5" cols="60" tabindex="20" class="form-control input1 input3" id="tarNoidung"><? if($tinban['ThongTinMota']!=''){echo str_replace('<br/>',"\n",$tinban['ThongTinMota']);}else{echo str_replace('<br/>',"\n",set_value('ThongTinMota'));};?>
                    </textarea>
                    <div class="clear"></div>
                    <span style="color: Red; display: none;" id="spanNoidungmota">Bạn cần nhập Nội dung mô tả</span>
                    <span style="color: Red; max-width: 500px; float: left; display: none;" id="spanLimited">Nội dung mô tả phải có tối thiểu 100 kí tự và tối đa 3000 kí tự (Không tính các kí tự trắng ở đầu, cuối và các kí tự trắng liền nhau trong đoạn văn bản)!</span>
                </div>
                <div class="row wr_upload">

                    <ul class="nav nav-tabs" id="tab_media" role="tablist" style="font-size: 15px">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#img_bds" role="tab" aria-controls="img_bds"
                          aria-selected="true">Hình ảnh</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#video_bds" role="tab" aria-controls="video_bds"
                          aria-selected="false">Video nếu có</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="tab_media_Content" style="font-size: 14px">
                        <div class="tab-pane fade show active" id="img_bds" role="tabpanel" aria-labelledby="img_bds-tab">
                            <div id="fileupload">
                                <?
                                include 'upanh.php';
                                ?>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="video_bds" role="tabpanel" aria-labelledby="video_bds-tab">
                            <div class="form-group">
                                <label for="desc">Đường dẫn video:</label> 
                                <textarea id="desc" class="form-control" name="emb_vid" cols="60" rows="3" placeholder="Dán đường link hoặc mã embed video từ Youtube. Nếu không có xin vui lòng bỏ qua."></textarea>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="row1"></div>
                <div class="form-group row">
                    <label for="txtHovaten" class="col-sm-2 col-form-label" style="padding:0;">Họ tên <span class="text-danger">*</span>:</label>
                    <div class="col-sm-10" style="padding:0;">
                        <input <? echo $dissabled;?><? if(isset($data_user_info)||$this->session->userdata('userid')==FALSE){?> name="contact[HoVaTen]" <?}?> name="contact[HoVaTen]" type="text" tabindex="24" class="form-control input1 input3" id="txtHovaten" value="<? if(isset($data_user_info)){echo $data_user_info['HoVaTen'];}elseif(isset($user_info)){echo $user_info['HoVaTen'];}else{echo $_POST['contact']['HoVaTen'];};?>">
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="txtDiachi" class="col-sm-2 col-form-label" style="padding:0;">Địa chỉ:</label>
                    <div class="col-sm-10" style="padding:0;">
                        <input <? echo $dissabled;?><? if(isset($data_user_info)||$this->session->userdata('userid')==FALSE){?> name="contact[DiaChi]" <?}?> type="text" tabindex="25" class="form-control input1 input3" id="txtDiachi" value="<? if(isset($data_user_info)){echo $data_user_info['DiaChi'];}elseif(isset($user_info)){echo $user_info['DiaChi'];}else{echo $_POST['contact']['DiaChi'];};?>">
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="txtDienthoai" class="col-sm-2 col-form-label" style="padding:0;">Điện thoại <span class="text-danger">*</span>:</label>
                    <div class="col-sm-10" style="padding:0;">
                        <input <? echo $dissabled;?><? if(isset($data_user_info)||$this->session->userdata('userid')==FALSE){?>name="contact[DienThoai]"<?}?> type="text" tabindex="26" class="form-control input1 input3" id="txtDienthoai" value="<? if(isset($data_user_info)){echo $data_user_info['DienThoai'];}elseif(isset($user_info)){echo $user_info['DienThoai'];}else{echo $_POST['contact']['DienThoai'];}?>">
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="txtEmail1" class="col-sm-2 col-form-label" style="padding:0;">Email:</label>
                    <div class="col-sm-10" style="padding:0;">
                        <input <? echo $dissabled;?><? if(isset($data_user_info)||$this->session->userdata('userid')==FALSE){?>name="contact[Email]"<?}?> type="email" tabindex="28" class="form-control input1 input3" id="txtEmail1" value="<? if(isset($data_user_info)){echo $data_user_info['Email'];}elseif(isset($user_info)){echo $user_info['Email'];}else{echo $_POST['contact']['Email'];};?>">
                        <div class="clear"></div>
                    </div>
                </div> 
                <div class="row1"></div>
            </div>
            <div class="col-md-6">
                <h4 class="posth4">THÔNG TIN CƠ BẢN</h4> 
                <div class="row">
                    <label>Loại tin <span class="text-danger">*</span>:</label>
                    
                    <div class="row-right" style="padding-top: 8px;">
                        <a href="javascript:" class="hplcate" id="hplSell" onclick="getDoiXe(449);">BĐS Bán</a>
                        <a href="javascript:" class="hplcate" id="hplRent" onclick="getDoiXe(451);">BĐS Cho Thuê</a>
                    </div>
                    <input type="hidden" name="hddCanBan" id="hddCanBan" value="449" />
                </div>
                <div class="row">
                    <label>Loại nhà đất <span class="text-danger">*</span>:</label>
                    <div class="row-right">
                        <select id="ddlType" name="HangXe" class="select-menu" style="width: 231px"> 
                            <option value="">-- Chọn loại bất động sản --</option>
                        </select>

                    </div>
                </div>
                <div class="row">
                    <label>Vị trí <span class="text-danger">*</span>:</label>
                    <div class="row-right ">
                        <div class="pncon marginright34">
                            <select id="ddlCity" name="DoiXe" class="select-menu" style="width: 231px">
                                <option value="<? $tinban['DoiXe']!='' ? $tinban['DoiXe'] : set_value('DoiXe')?>">Chọn Tỉnh/Thành phố</option> 
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
                        <div class="pncon">
                        
                            <select id="ddlDistrict" name="NamSX" class="select-menu">
                                <option value="<? $tinban['NamSX']!='' ? $tinban['NamSX'] : set_value('NamSX')?>">Chọn Quận/Huyện</option>
                            </select>
                            <input type="hidden" name="hddcboDistP" id="hddcboDistP" value="-1" />

                        </div> 
                    </div>
                </div>
                <div class="row">
                    <label>&nbsp;</label>
                    <div class="row-right">
                        <div class="pncon marginright34" id="cboWardP">
                                            
                            <select id="ddlWard" name="XuatXu" class="select-menu">
                                <option value="<? $tinban['XuatXu']!='' ? $tinban['XuatXu'] : set_value('XuatXu')?>">Chọn Phường/Xã</option>
                            </select> 
                            <input type="hidden" name="hddcboWardP" id="hddcboWardP" value="-1" />
                            <input type="hidden" name="hddWardPrefix" id="hddWardPrefix" />

                        </div>
                        <div class="pncon" id="cboStreetP">
                            <select id="ddlStreets" name="PhanHang" class="select-menu">
                                <option value="<? $tinban['PhanHang']!='' ? $tinban['PhanHang'] : set_value('PhanHang')?>">Chọn Đường/Phố</option>
                            </select> 
                            <input type="hidden" name="hddcboStreetP" id="hddcboStreetP" value="-1" />
                            <input type="hidden" name="hddStreetPrefix" id="hddStreetPrefix" />

                        </div>
                    </div>
                </div>
                <div class="row">
                    <label>&nbsp;</label>
                    <div class="row-right">
                        <div class="select-container marginright34" id="cboProjectP">
                            <select id="ddlProjects" name="TinhTrang" class="select-menu">
                                <option value="<? $tinban['TinhTrang']!='' ? $tinban['TinhTrang'] : set_value('TinhTrang')?>">Chọn Dự án</option>
                            </select>
                            <input type="hidden" name="hddcboProjectP" id="hddcboProjectP" value="-1" />
                            <span style="color: Red; display: none;" id="spanLocation">Bạn cần nhập loại nhà đất</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label>Giá:</label>
                    <div class="row-right">
                        <div class="pncon marginright34">
                            <input name="GiaTien" type="text" id="txtGia" tabindex="10" class="input1 numbersOnly2" onchange="ChangeMucgia(this)" value="<? if($tinban['GiaTien']!=''){echo $tinban['GiaTien'];}else{echo set_value('GiaTien');};?>" placeholder="6.8 (Phân biệt hàng thập phân bởi dấu '.'" />
                        </div>
                        <div class="clear"></div> 
                    </div>
                </div>
                <div class="row">
                    <label>Đơn vị:</label>
                    <div class="row-right">
                        <div class="pncon marginright34">                          
                            <select id="SoKM" name="SoKM" class="select-item select-item1">
                            <option value="">Chọn Mức giá</option>                                                       
                            </select>
                        </div>
                        <input type="hidden" name="hddcboPriceP" id="hddcboPriceP" value="-1" />
                        <div class="clear"></div> 
                    </div>    
                </div>
                <div class="row">
                    <label>Diện tích:</label>
                    <div class="row-right">
                        <input name="NgoaiThat" type="text" id="txtDientich" tabindex="12" class="input1 input2" onchange="ChangeDientich(this)" value="<? if($tinban['NgoaiThat']!=''){echo $tinban['NgoaiThat'];}else{echo set_value('NgoaiThat');};?>" />
                        <span class="span">m2</span>
                        <div class="clear"></div>
                        <span style="color: Red; float: left; display: none;" id="spanDientich">Diện tích không hợp lệ!</span>
                    </div>
                </div>
                <div class="row">
                    <label>Địa điểm <span class="text-danger">*</span>:</label>
                    <div class="row-right">
                        <input name="DongXe" value="<? if($tinban['DongXe']!=''){echo $tinban['DongXe'];}else{echo set_value('DongXe');};?>" type="text" id="txtDiadiem" tabindex="9" class="input1 input3" />
                        <input type="hidden" name="hddDiadiem" id="hddDiadiem" value="<? if($tinban['DongXe']!=''){echo $tinban['DongXe'];}else{echo set_value('DongXe');};?>"/>
                        <div class="clear"></div>
                        <span style="color: Red; float: left; display: none;" id="spanDiadiem">Bạn cần nhập địa điểm</span>
                    </div>
                </div>
                <div class="row1"></div>
                <h4 class="posth4">THÔNG TIN KHÁC</h4>
                <div class="row">
                    <label>Mặt tiền:</label>
                    <div class="row-right">
                        <div class="pncon mr-3">
                            <input name="HopSo" value="<? if($tinban['HopSo']!=''){echo $tinban['HopSo'];}else{echo set_value('HopSo');};?>" type="number" id="txtMattien" tabindex="13" class="input1 input2" />
                            <span class="span mr-4">m</span>
                            <div class="clear"></div>
                            <span style="color: Red; float: left; display: none;" id="spanMattien">Mặt tiền không hợp lệ!</span>
                        </div>
                        <label style="width: 129px;">Đường trước nhà:</label>
                        <div class="pncon">
                            <input name="DanDong" value="<? if($tinban['DanDong']!=''){echo $tinban['DanDong'];}else{echo set_value('DanDong');};?>" type="number" id="txtDuongtruocnha" tabindex="14" class="input1 input4" />
                            <span class="span">m</span>
                            <div class="clear"></div>
                            <span style="color: Red; float: left; display: none;" id="spanDuongtruocnha">Đường trước nhà không hợp lệ!</span>
                        </div>

                    </div>
                    <span style="color: Red; display: none; float: left;" id="spantxtMattien">Bạn cần nhập loại nhà đất</span>
                    <span style="color: Red; display: none; float: left;" id="spantxtDuongtruocnha">Bạn cần nhập loại nhà đất</span>
                </div>
                <div class="row">
                    <label>Số tầng:</label>
                    <div class="row-right">
                        <div class="pncon mr-4">
                            <input name="NhienLieu" value="<? if($tinban['NhienLieu']!=''){echo $tinban['NhienLieu'];}else{echo set_value('NhienLieu');};?>" type="number" id="txtSotang" tabindex="16" class="input1 input2" />
                            <div class="clear"></div>
                            <span style="color: Red; float: left; display: none;" id="spanSotang">Số tầng không hợp lệ!</span>
                        </div>
                        <label style="width: 129px; margin-left: 32px; ">Số phòng:</label>
                        <input name="HeThongNapNhienLieu" value="<? if($tinban['HeThongNapNhienLieu']!=''){echo $tinban['HeThongNapNhienLieu'];}else{echo set_value('HeThongNapNhienLieu');};?>" type="number" id="txtSophong" tabindex="17" class="input1 input4" />
                    </div>
                </div>
                <div class="row">
                    <label>Hướng BĐS:</label>
                    <div class="row-right">
                      <div class="pncon mr-4">
                        <select name="NoiThat" class="select-item ">
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
                      <div class="pncon">
                        <input type="hidden" name="hddcboDirectionP" id="hddcboDirectionP" value="-1" />
                        <label style="width: 129px;">Số toilet:</label>
                        <input name="MucTieuThu" value="<? if($tinban['MucTieuThu']!=''){echo $tinban['MucTieuThu'];}else{echo set_value('MucTieuThu');};?>" type="number" id="txtSotoilet" tabindex="18" class="input1 input4" />
                      </div>
                    </div>
                </div>
            </div>
        </div>                                       
        <?
        if($tinban!=''):?> 
        <div class="row row2" style="padding-left: 110px;"> 
            <!-- <a id="btnMemberSave" onclick="document.getElementById('frmAuto').submit();" class="btnMemberSave" style="margin-left: 100px;"><?php //echo $this->lang->line('lable_btnCapNhap');?></a> -->
            <input class="btnpost" type="submit" name="" value="Cập nhật">
            <a id="lbtCancel" class="btncancel" href="/quan-ly-tin-rao">Hủy bỏ</a>
        </div>
        <? else:?>
        <div class="col-sm-12">
            <div id="ContentPlaceHolder1_ctl00_divCaptcha" class="form-group row">
                <label>Mã an toàn <span class="text-danger">*</span>:</label>
                <div class="row-right">                 
                    <input name="MaXacNhan" type="text" id="txtcode1" class="form-control input3" style="width: 276px!important; float: left;" />
                    <span class="imgCaptcha" style="padding: 5px 0 0; float: right;">
                        <img src="/maxacnhan/captcha" id="captcha" title="Mã xác nhận" style=" margin-left: 5px;margin-top: -3px; vertical-align: middle;"/>
                        <img title="Đổi mã xác nhận khác" src="/style/images/ref.gif" width="26" height="25" onclick="document.getElementById('captcha').src='/maxacnhan/captcha?'+Math.random();" style=" vertical-align: middle;"/>
                    </span>
                </div>
            </div>
            <div class="row row2" style="padding-left: 110px;">
                <input class="btnpost" type="submit" name="" value="Đăng tin">
                <!-- <a onclick="document.getElementById('frmAuto').submit();" id="lbtPost" class="btnpost" href="javascript:void(0)">Đăng tin</a> -->
                <a id="lbtCancel" class="btncancel" href="/dang-tin-ban-cho-thue-nha-dat">Hủy bỏ</a>
            </div>
            <? endif;?>
        </div>    
                  
        </div>
    
	</div>
    <input type="hidden" name="hddCusPhone" id="hddCusPhone" />
</div>
</form>
<script type="text/javascript">
    var productid = '0';
    function GetArea(module,code,val,fill,text,set,showLocation=true){
        $.ajax
        ({ 
           type: "POST",
           url: "/chon-mau-xe?module="+module+"&"+code+"="+val, 
           success: function(response)
           {
               $("#"+fill).html('<option value="">'+text+'</option>')
               $("#"+fill).append(response);
               if(set!=''){
                    if(fill ==='ddlDistrict'){
                        $("#"+fill).val(set).select2().trigger({type:'change',showLocation});
                    }else{
                        $("#"+fill).val(set).select2();
                    }
               }else{
                  $("#"+fill).select2();
               }
               
           }            
        });
    }
</script>
<?
if($this->input->post('NamSX')!=''){
    $quan=$this->input->post('NamSX');
}else{
    $quan=$tinban['NamSX'];
}
if($quan!=''){  
    echo "<script>GetArea('GetDistrict','cityCode',$('#ddlCity').find('option:selected').attr('data-key'),'ddlDistrict','Chọn Quận/Huyện','$quan',false);</script>";
} 
?>
<?
if($this->input->post('XuatXu')!=''){
    $phuong=$this->input->post('XuatXu');
}else{
    $phuong=$tinban['XuatXu'];
}
?>
<?
if($this->input->post('PhanHang')!=''){
    $duong=$this->input->post('PhanHang');
}else{
    $duong=$tinban['PhanHang'];
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

?>
<script type="text/javascript">
    $('select').select2({
        matcher: function (params, data) {
            if ($.trim(params.term) === '') {
                return data;
            }
            var _keyword = UnicodeToKoDau(data.text.toLowerCase());
            var _text = UnicodeToKoDau(params.term.toLowerCase());
            if (_keyword.indexOf(_text) == 0) {
                var modifiedData = $.extend({}, data, true);
                modifiedData.text;
                return modifiedData;
            }
            return null;
        }
    });
    $('#ddlCity').on('change', function () { 
        $("#hddcboCityP").val($('option:selected', this).attr('data-key'));
        $("#hddcboDistP").val(-1);
        $("#hddcboWardP").val(-1);
        $("#hddcboStreetP").val(-1);
        $("#hddcboProjectP").val(-1); 
        GetArea('GetDistrict','cityCode',$('option:selected', this).attr('data-key'),'ddlDistrict','Chọn Quận/Huyện','');
        ShowLocation(); 
    });
    $('#ddlDistrict').on('change', function (event){
        console.log(event.showLocation)
        $("#hddcboDistP").val($('option:selected', this).attr('data-key')); 
        GetArea('GetWard','distId',$('option:selected', this).attr('data-key'),'ddlWard','Chọn Phường/Xã','<? echo $phuong;?>');   
        GetArea('GetStreet','distId',$('option:selected', this).attr('data-key'),'ddlStreets','Chọn Đường/Phố','<? echo $duong;?>');
        GetArea('GetProject','distId',$('option:selected', this).attr('data-key'),'ddlProjects','Chọn Dự án','<? echo $duan;?>');   
        if(event.showLocation || event.showLocation === undefined){ ShowLocation()}; 
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
    $('#frmAuto').validate({
        rules: {
            TieuDe: {
                required: true,
            },
            ThongTinMota: {
                required: true,
            },
            HangXe: {
                required: true,
            },
            DoiXe: {
                required: true,
            },
            DongXe: {
                required: true,
            }
        },
        messages: {
            TieuDe: {
                required: "Vui lòng nhập tiêu đề",
            },
            ThongTinMota: {
                required: "Vui lòng nhập mô tả",
            },
            HangXe: {
                required: "Vui lòng chọn loại bất động sản",
            },
            DoiXe: {
                required: "Vui lòng chọn địa chỉ",
            },
            DongXe: {
                required: "Vui lòng chọn địa chỉ",
            }
        },
    });
</script>

</div>
    </div>
<div class="clear"></div>
    </div>
</div> 

<div class="clear"></div>
</div>