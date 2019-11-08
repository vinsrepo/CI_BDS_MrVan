 <!-- Footer -->

 <div class="footer">
    <hr style="border:2px solid #6bb17a;">
    <div class="footer_bottom">
        <div class="row_footer">
            <div class="row">
                <div class="col-md-4">
                    <a href="/" title="mua bán nhà đất">
                        <img src="/style/images/logo_footer.png" alt="Sàn nhà đất" width="221px" height="95px">
                    </a>
                    <p class="info_ct">
                        <span>
                            <i class="fa fa-phone"></i> <?php echo $data->{'DienThoai'};?> <?php if($data->{'Fax'}!=''){ echo ' - Fax: '.$data->{'Fax'};}?>
                        </span>                    
                    </p>
                    <p class="info_ct">
                        <a style="border:none;margin:0;padding:0" rel="nofollow" href="mailto:<?php echo $data->{'ThoiGianLamViec'};?>?Subject=Liên hệ-<?php echo $data->{'ThoiGianLamViec'};?>" target="_top"><i class="fa fa-envelope"></i> <?php echo $data->{'ThoiGianLamViec'};?>                           
                        </a>
                    </p>
                    <p class="info_ct">
                        <span><i class="fa fa-map-marker-alt"></i> <?php echo $data->{'DiaChi'};?></span>
                    </p>
                </div>
                <div class="col-md-4">
                    <h4 class="sp_text">Sản phẩm trên trang</h4>
                    <div class="menu-bottom">
                        <ul>
                            <li><a href="">Nhà riêng</a></li>
                            <li><a href="">Căn hộ/Chung cư</a></li>
                            <li><a href="">Văn phòng</a></li>
                            <li><a href="">Đất nền</a></li>
                        </ul>
                    </div>                    
                </div>
                <div class="col-md-4">
                    <h4 class="sp_text">Tìm hiểu thêm</h4>
                    <?echo Modules::run('baiviet/menufooter');?>
                </div>
            </div>
            <!-- <div class="info_footer">
                <p><?php //echo $data->{'GiayPhep'};?></p>
                <p><?php //echo $data->{'GhiChu'};?></p>
            </div> -->
        
            <!-- <div class="clear">
            </div> -->
            <div class="phonering-alo-phone phonering-alo-green phonering-alo-show" id="phonering-alo-phoneIcon" style="position: fixed;left: 0;bottom: 0;height: 160px;width: 160px;">
                <div class="phonering-alo-ph-circle"></div>
                <div class="phonering-alo-ph-circle-fill"></div>
                <a href="tel:<?php echo $data->{'DienThoai'};?>" class="pps-btn-img" title="Liên hệ">
                    <div class="phonering-alo-ph-img-circle"></div>
                </a>
            </div>
            <!-- <div class="bd_footer"></div> -->
        </div>
        <div class="share_footer">
            <!-- <span style="float: left;">Copyright © <?php //echo date("Y"); ?> - <a href="#" rel="nofollow" title="JooLand" target="_blank" class="color00ffd1">JooLand</a></span> -->

            <!-- Đặt thẻ này vào nơi bạn muốn Nút +1 kết xuất. -->
            <!-- <div class="g-plusone" data-size="medium" data-annotation="inline" data-href="<?php //echo $data->{'Google'};?>" data-width="100"></div> -->

        </div>
    </div>
    <div class="clear"></div>
</div>
</form>
<a href="#top" id="toTop" rel="nofollow" style="display: inline;"></a>
</body>
</html>