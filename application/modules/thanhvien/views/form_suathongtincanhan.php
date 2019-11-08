<div class="wr_page">
        <link href="/style/css/my.css" rel="stylesheet" type="text/css" />    
    <div class="index-page" style="width: 1280px;padding-top: 82px;margin: 0 auto;clear:left;float: unset;">
        <div class="content">
            
            <? include(APPPATH . 'includes/divLeft_thanhvien.php');?>
            
            <!-- Content Right -->
            <div class="user-mright">
                <!-- Đăng tin -->
                <div id="ContentPlaceHolder1_pnMainContent">
	<form action="" method="post" id="frmEdit">   
        <div class="module-header-profile">
            Thay đổi thông tin cá nhân
        </div>
        <div class="module-user module-user-bg ">
        <div style="padding:10px 20px;"><?php $this->load->view('template/statut_thongbao');?>
            <div class="rc-item">
                <div class="text">Tên đăng nhập:</div>
                <span id="txtUserName" style="padding: 4px 0 0 0; float: left;font-weight: bold;"><?php echo $data_thanhvien['username'];?></span>
            </div>
            <div class="form-group">
                <label for="txtTendaydu">Họ tên</label>
                <input type="text" id="txtTendaydu" class="form-control" name="HoVaTen" value="<?php echo $data_thanhvien['HoVaTen'];?>">
            </div>    
            <div class="form-group">
                <label for="txtEmail">Email <span class="text-danger">*</span></label>
                <input type="email" id="txtEmail" class="form-control" name="Email" value="<?php echo $data_thanhvien['Email'];?>">
            </div>    
            <div class="form-group">
                <label for="txtDidong">Điện thoại <span class="text-danger">*</span></label>
                <input type="text" id="txtDidong" class="form-control" name="DienThoai" value="<?php echo $data_thanhvien['DienThoai'];?>">
            </div>    
            <div class="form-group">
                <label for="txtDiachi">Địa chỉ <span class="text-danger">*</span></label>
                <input type="text" id="txtDiachi" class="form-control" name="DiaChi" value="<?php echo $data_thanhvien['DiaChi'];?>">
            </div>    
            <div class="form-group">
                <label for="txtTinhThanh">Tỉnh thành</label>
                <select name="TinhThanh" class="form-control" id="txtTinhThanh">
                    <option>--- Chọn tỉnh thành ---</option>
                    <?php 
                    $arr = file(APPPATH . 'includes/DSTinhThanh.txt');
                    foreach($arr as $row) { 
                        if($data_thanhvien['TinhThanh']==trim($row))
                        { 
                            $select='selected';
                        }else{
                            $select='';
                        }
                        echo '<option value="'.trim($row).'" '.$select.' >'.trim($row).'</option>';
                    }
                    ?>
                </select>
            </div>    
            <input type="submit" class="btn btn-success btn-sm" value="Lưu thay đổi">
            <div class="loading-indicator" id="userUpdateLoading"></div>
            </div>
        </div>
    </form>
</div>
        </div>           
        <div class="clear" style=": "></div>
    </div>
</div>
<div class="clear"></div>
</div>
<script src="/style/js/jquery.validate.min.js"></script>
<script>
    $('#frmEdit').validate({
        rules: {
            Email: {
                required: true,
                email: true               
            },
            DienThoai: {
                required: true,
                number: true,
                rangelength: [10, 11]
            },
            DiaChi: {
                required: true,
            }
        },
        messages: {
            Email: {
                required: "Vui lòng nhập email",
                email: "Vui lòng nhập đúng định dạng email"
            },
            DienThoai: {
                required: "Vui lòng nhập số điện thoại",
                number: "Vui lòng điền đúng định dạng số",
                rangelength: "Số điện thoại không đúng"
            },
            DiaChi: {
                required: "Vui lòng nhập địa chỉ",
            }
        },
    });
</script>