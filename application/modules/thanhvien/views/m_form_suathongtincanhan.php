 <div class="div_login">	<form action="" method="post" id="frmEdit">   
        <div id="boxRegister">
            <div class="tit">
                <h1 class="content-tit">Thay đổi thông tin cá nhân</h1>
            </div>
            <style>
            .note {
                padding: 7px!important;
            }
            </style>
            <div style="padding-top: 10px; "><?php $this->load->view('template/statut_thongbao');?></div>
            <div class="listbox">
                <div class="form-group">
                    <label>Họ và tên</label>
                    <input name="HoVaTen" type="text" value="<?php echo $data_thanhvien['HoVaTen'];?>" id="txtTendaydu" class="form-control" /> 
                   
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <span id="txtEmailUser" class="form-control spanemail"><?php echo $data_thanhvien['Email'];?></span><input name="Email" type="hidden" value="<?php echo $data_thanhvien['Email'];?>" id="txtDidong" />
                </div>
                <div class="form-group">
                    <label>Tên đăng nhập </label>
                    <input id="txtUserName" disabled="disabled" value="<?php echo $data_thanhvien['username'];?>" class="form-control spanemail">
                </div>
                <div class="form-group">
                    <label>Điện thoại <span class="text-danger">*</span></label>
                    <input  name="DienThoai" type="text" value="<?php echo $data_thanhvien['DienThoai'];?>" maxlength="12" id="txtDidong" class="form-control" />
                    <!-- <span id="validateFortxtDidong" class="message">Số di động sai định dạng, bạn hãy nhập lại!</span> -->
                </div>
                <div>
                    <div class="form-group">
                        <label>Tỉnh / Thành phố</label>
                        <div class=""> 
                            <select id="ddlCityRegis" name="TinhThanh" class="form-control selectn">
                                <option value="">--- Chọn tỉnh thành --- </option>
             <option value="Hà Nội">Hà Nội</option>
             <?php 
             $arr = file(APPPATH . 'includes/DSTinhThanh.txt');
             foreach($arr as $row) { 
                if($data_thanhvien['TinhThanh']==trim($row))
                { 
                    $select='selected';
                }else{
                    $select='';
                }
                echo '
                     <option value="'.trim($row).'" '.$select.' >'.trim($row).'</option>
                     ';
             }
             ?>
                            </select>
 
                        </div>
                    </div> 
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <input name="DiaChi" type="text" value="<?php echo $data_thanhvien['DiaChi'];?>" id="txtYahoo" class="form-control" />
                    </div> 
                </div>

                <div class="form-group center">
                    <a id="MainContent_lbtRegister" class="btn btn-success btn-sm button-save" href="javascript:document.getElementById('frmEdit').submit()">Lưu lại</a>
                    <a id="MainContent_btnCancel" class="btn btn-danger btn-sm button-save button2" href="/thanh-vien/sua-thong-tin-ca-nhan.html">Hủy</a>
                </div>
            </div>
        </div></form>
    </div>
    <script src="/Scripts/Register.js"></script>

