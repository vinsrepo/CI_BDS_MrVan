 </div></div>
<div class="clear"></div>
               
<div class="footer">
    <div class="ICP bor-bottom">
        <h4><?php echo $data->{'GiayPhep'};?></h4>
        <h4 class="bor-bottom"><?php echo $data->{'GhiChu'};?></h4>
        <h4 class="bor-top"><strong>Hotline: <?php echo $data->{'DienThoai'};?> <?php if($data->{'Fax'}!=''){ echo ' - Fax: '.$data->{'Fax'};}?><span>|</span>Email: <?php echo $data->{'ThoiGianLamViec'};?><span>|</span>Skype: <?php echo $data->{'Skype'};?><span>|</span>Địa chỉ: <?php echo $data->{'DiaChi'};?></strong></h4>
    </div>
</div>
            </div>
            <div id="bottombanner" class="adPosition">
                
            </div>
        </div> 
    <a id="to_top" href="javascript:;" rel="nofollow" style="display: none;">
        <img title="Về đầu trang" alt="Về đầu trang" src="/style/mobile/images/totop123.png" />
    </a>
    <div class="phonering-alo-phone phonering-alo-green phonering-alo-show" id="phonering-alo-phoneIcon" style="position: fixed;left: -47px;bottom: 138px;height: 20px;width: 0px;z-index: 9999999999999999;">
        <div class="phonering-alo-ph-circle"></div>
        <div class="phonering-alo-ph-circle-fill"></div>
        <a href="tel:<?php echo $data->{'DienThoai'};?>" class="pps-btn-img" title="Liên hệ">
            <div class="phonering-alo-ph-img-circle"><i class="fa fa-phone"></i></div>
        </a>
    </div>
<!-- <div class="nav_bt">
    <ul>
        <li class="mn_item <? //echo $this->uri->segment(1)==""?'active':"";?>">
            <a href="/" class="item"><i class="fa fa-home"></i><p>Trang chủ</p></a>
        </li>
        <? //if($this->session->userdata('userid')==FALSE):?>
            <li class="mn_item <? //echo $this->uri->segment(2)=="dang-nhap"?'active':"";?>">
                <a href="/thanh-vien/dang-nhap.html" class="item"><i class="far fa-user-circle"></i><p>Đăng nhập</p></a>
            </li>
            <? //else:?>
            <li class="mn_item <? //echo $this->uri->segment(1)=="trang-ca-nhan"?'active':"";?>">
                <a href="/trang-ca-nhan" rel="nofollow" id="dangnhap" title="<? //cho $user_info['username'];?>" class="item">
                    <i class="far fa-user-circle"></i><p><? //echo $user_info['username'];?></p>
                </a>
            </li>
        <?// endif?>
        <? //if($this->session->userdata('userid')==FALSE):?>           
            <li class="mn_item <? //echo $this->uri->segment(2)=="dang-ky"?'active':"";?>">
                <a href="/thanh-vien/dang-ky.html" class="item"><i class="fas fa-user-plus"></i><p>Đăng ký</p></a>
            </li>           
        <? //else:?>
            <li class="mn_item <? //echo $this->uri->segment(1)=="dang-tin-ban-cho-thue-nha-dat"?'active':"";?>">
                <a href="/dang-tin-ban-cho-thue-nha-dat" class="item"><i class="fas fa-cubes"></i><p>Đăng tin</p></a>
            </li>
        <? //endif?>
    </ul>
</div>  --> 
<script src="https://sp.zalo.me/plugins/sdk.js"></script>  
</body>
</html>
