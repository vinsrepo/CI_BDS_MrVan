<div class="wr_page" style="padding-top: 0px">
    <div class="index-page" style="padding-top: 20px;margin: 0 auto;clear:left;float: unset;">
        <div class="content">
          <div class="col-md-12 col-sm-12" id="xacthuc">
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Đăng ký thành công!</strong> Tài khoản của bạn chưa được xác thực! Vui lòng nhập mã OTP để xác thực tài khoản
            </div>           
                <form method="POST">
                    <?php echo $ThongBao ? $ThongBao : '';?><br />
                    <?php $this->load->view('template/statut_thongbao');?>
                    <div class="row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label>Mã OTP:</label>
                            <input id="MaXacThuc" type="text" name="MaXacThuc" class="form-control">
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label>Số điện thoại của bạn là:</label>
                            <input type="text" name="SDT" value="<?php echo $SDT; ?>" class="form-control" disabled="disabled">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <!-- <a href="javascript:void(0)" onclick="resendOTP()">Gửi lại mã?</a> -->
                            &nbsp;
                            <button type="submit" class="btn btn-success btn-sm">Xác thực</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>                
    </div>
    </div>
  </div>     
</div>
<script>
    function resendOTP(){
        alert('2');
    }
</script>