<div class="wr_page">    
    <div class="index-page"style="width: 1280px;padding-top: 82px;margin: 0 auto;clear:left;float: unset;">
        <div class="content">           
            <? include(APPPATH . 'includes/divLeft_thanhvien.php');?>            
            <div class="user-mright">
                <div id="ContentPlaceHolder1_pnMainContent">
                	<form action="" method="post" id="frmEdit">   
                        <div class="module-header-profile">
                            <?php echo $this->lang->line('title_doimatkhau');?>
                        </div>
                        <div class="module-user module-user-bg ">
                        <div style="padding-top: 10px;width: 92%;"><?php $this->load->view('template/statut_thongbao');?></div>
                            <div class="form-group">
                                <label for="txtMKC">Mật khẩu cũ<span class="text-danger">*</span></label>
                                <input type="password" id="txtMKC" class="form-control" name="MatKhauCu">
                            </div>
                            <div class="form-group">
                                <label for="txtMKM">Mật khẩu mới<span class="text-danger">*</span></label>
                                <input type="password" id="txtMKM" class="form-control" name="MatKhauMoi">
                            </div>
                            <div class="form-group">
                                <label for="txtLMKM">Nhập lại mật khẩu mới<span class="text-danger">*</span></label>
                                <input type="password" id="txtLMKM" class="form-control" name="NhapLaiMatKhauMoi">
                            </div>
                            <input type="submit" name="" class="btn btn-success btn-sm text-white" value="Lưu thay đổi">
                            <div class="loading-indicator" id="userUpdateLoading"></div>
                        </div>
                    </form>
                </div>
            </div>           
        </div>
    </div>
    <div class="clear"></div>
</div>
<script src="/style/js/jquery.validate.min.js"></script>
<script>
    $('#frmEdit').validate({
        rules: {
            MatKhauCu: {
                required: true,              
            },
            MatKhauMoi: {
                required: true,
            },
            NhapLaiMatKhauMoi: {
                required: true,
                equalTo: "#txtMKM"
            }
        },
        messages: {
            MatKhauCu: {
                required: "Vui lòng nhập mật khẩu cũ",
            },
            MatKhauMoi: {
                required: "Vui lòng nhập mật khẩu mới",
            },
            NhapLaiMatKhauMoi: {
                required: "Vui lòng nhập lại mật khẩu mới",
                equalTo: "Vui lòng nhập đúng với mật khẩu mới"
            }
        },
    });
</script>