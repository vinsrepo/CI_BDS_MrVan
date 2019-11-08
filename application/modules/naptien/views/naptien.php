<div class="wr_page">   
    <div class="index-page">
        <div class="content">
            
            <? include(APPPATH . 'includes/divLeft_thanhvien.php');?>
            
            <!-- Content Right -->
            <div class="user-mright">
                <!-- Đăng tin -->
                <div id="ContentPlaceHolder1_pnMainContent">
	
<script type="text/javascript">
    var currentUserId = '50557';
    var currentCusPhone = '';
</script>
<div class="module-header-profile" >
    Nạp tiền
</div>
<div class="module-charge-money" >
<div style="padding-top: 10px;width: 92%;"><?php $this->load->view('template/statut_thongbao');?></div> 
    <p >
        Mời Quý khách chọn các hình thức thanh toán sau đây:
    </p>
    <div class="payment-method">
        <div class="accordion"> 
            <?  
           $tt=Modules::run('trangchu/getInfo','cauhinh','Loai','ThanhToan');
           $tt=json_decode($tt['GiaTri'],true);
           ?>
            <div class="accordion-section">
                <a class="accordion-section-title" href="#accordion-2"><span class="dotted"></span>Chuyển khoản ngân hàng</a>
                <div id="accordion-2" class="bank-transfer">
                    <div class="table">
                        <div class="tablecontainerrow">
                            <div class="column1">Số tài khoản</div>
                            <div class="column2" style="color: #ff0000"><? echo $tt['SoTaiKhoan'];?></div>
                        </div>

                        <div class="tablecontainerrow">
                            <div class="column1">Ngân hàng</div>
                            <div class="column2">
                                <p><? echo $tt['ChiNhanh'];?></p>

                            </div>
                        </div>
                        <div class="tablecontainerrow">
                            <div class="column1">Người hưởng lợi</div>
                            <div class="column2">
                                <p><? echo $tt['NguoiHuongLoi'];?></p>

                            </div>
                        </div>
                        <div class="tablecontainerrow">
                            <div class="column1">Nội dung chuyển tiền</div>
                            <div class="column2" ><? echo str_replace('[MATAIKHOAN]',$this->session->userdata('userid'),$tt['NoiDung']);?></div>
                        </div>
                    </div>
                    <? echo nl2br($tt['LuuY']);?>
                </div>
            </div>
            <div class="accordion-section">
                <a class="accordion-section-title" href="#accordion-3"><span class="dotted"></span>Thẻ cào</a>
                <div id="accordion-3" class="accordion-section-content">
                    <p>
                        Vui lòng mua thẻ cào điện thoại và nhập các tiêu chí bắt buộc dưới đây:
                    </p>
                    <p style="padding-bottom: 10px;">
                        <b style="color: red"> 
                    </p>
                    <p>
                        <img src="/style/images/charge_money_banner.png" title="Nạp tiền"  />
                    </p>
                    <form action="/nap-tien#accordion-3" method="post"> 
                    <div class="paid-card" style="padding-left: 80px;">
                        <div class="tablecontainer">
                            <div class="tablecontainerrow"> 
                                <div class=" ">
                                    <div class="row">
                                        <label>Loại thẻ: <span>(*)</span></label>
                                        <div class="row-right" >

                                            <select id="loaithe" name="loaithe" class="select-item-regis" style="width: 175px;">
                                <option value="Vinaphone">VinaPhone</option>

							<option value="Mobifone">MobiFone</option>

							<option value="Viettel">Viettel</option>

							<option value="Gate">Gate</option>

							<option value="VTC">VTC</option>
</select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tablecontainerrow">
                                <div class=" ">
                                    <div class="row">
                                        <label><?php echo $this->lang->line('lable_sopin');?>: <span>(*)</span></label>
                                        <div class="row-right">
                                            <input name="sopin" type="text" maxlength="20" id="txtCardSerial" style="width:100%;" />
                                            <div class="clear"></div> 
                                        </div>
                                    </div>
                                </div>
                                <div class=" ">
                                    <div class="row">
                                        <label><?php echo $this->lang->line('lable_soserial');?>: <span>(*)</span></label>
                                        <div class="row-right">
                                            <input name="soserial" type="text" maxlength="20" id="txtCardCode" style="width:100%;" />
                                            <div class="clear"></div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <input type="submit" value="Thực hiện"  id="btnConfirm" class="btnConfirm" style="margin-left: 125px;" />
                        </div>
                    </div>
                    </form>
                </div>
            </div>  
            <!--end .accordion-section-->
        </div>
        <!--end .accordion-->
    </div>
</div> 
<script src="/style/js/ChargeMoney.js?v=12"></script>
</div>
            </div>
            <? include(APPPATH . 'includes/divRight.php');?>
            
            <div class="clear" style=": "></div>
        </div>
    </div> 

            <div class="clear"></div>
        </div>