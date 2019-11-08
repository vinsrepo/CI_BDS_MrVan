<div class="box-right">
               <div class="menuprofileright">
            <?php 
       
      if($user['level']=='free_user'||$user['level']==''){
        $Loai='<span style="color: orange;">Miễn phí</span>';
      }
      if($user['level']=='vip_user'){
        $Loai='<span style="color: yellow;">VIP</span>';
      }
      if($user['level']=='xsieuvip_user'){
        $Loai='<span style="color: yellow;">SIÊU VIP</span>';
      } 
      ?>
    <div class="tit">Bạn đang là: <? echo $Loai;?></div>
    <style>
    .menuprofileright{
    width:193px;
    float:left;
    display:inline-block;    
    border:1px solid #e0e0e0;    
}
.menuprofileright .tit{
    font:15px 'Roboto Bold';
    text-transform:uppercase;
    background-color:#2e8894;
    color:#fff;
    float:left;
    width:180px;
    height:32px;
    padding-left:15px;
    padding-top: 10px;
}
.menuprofileright .itemmess{
    width:100%;
    float:left;
    display:inline-block;
}
.menuprofileright .itemmess li{
    float:left;    
    padding:15px;
    border-bottom:1px solid #e0e0e0;
}
.menuprofileright .itemmess li:last-child{
    border-bottom:none;
}
.menuprofileright .itemmess li a{
    font:bold 13px 'Roboto Regular';
    color:#222;
}
.menuprofileright .itemmess li label{
    font:bold 13px 'Roboto Regular';
    color:#222;
    width:100%;
    float:left;
}
.menuprofileright .itemmess li span{
    font:13px 'Roboto Regular';
    color:#7f7f7f;
    width:100%;
    float:left;
}
             .acc_info1
{
	background:#FFFFE5;    
	text-align:center;
	line-height:20px;
	font-size:13px;
    font-family:'Roboto Regular';
}
.acc_info1 b
{
	color:red;
	font-size:14px;
    font-family:'Roboto Bold';
}
.info_item{
    border-bottom: 1px solid #eee;
    padding: 5px;
}
             </style>
             <div class="acc_info1">
			<div class="info_item">
            Mã số tài khoản của bạn là: <br>
		<b>DT-<?php echo $this->session->userdata('userid');?> </b>
            </div>
		<div class="info_item">Số tin đăng trong ngày còn:<br>
        <?
        $type=Modules::run('trangchu/getInfo','cauhinh','Loai',$user['level']);
        $vip=json_decode($type['GiaTri']);
        $sotinban=Modules::run('trangchu/getTotalInfo','tinban',"NguoiDang = ".$this->session->userdata('userid')." and NgayDang LIKE '".date('Y-m-d',time())."%'");
        $sotinup=Modules::run('trangchu/getTotalInfo','tinban',"NguoiDang = ".$this->session->userdata('userid')." and uptin LIKE '".date('Y-m-d',time())."%'");
        ?>
		<b><? echo $vip->{'solandangtin'}-$sotinban; ?> tin</b>
        </div>
		<div class="info_item">Số lần up tin trong ngày còn:<br>
		<b><? echo $vip->{'solanuptin'}-$sotinup; ?> lần</b>
        </div>
        <? if($user['date_vip']!=''){?>
		<div class="info_item">Hạn sử dụng:<br>
		<b> <? echo date('d/m/Y',($user['date_vip']));?></b>
        </div>
		<?}?>
		
	</div>
    
</div>
<div style="text-align: center;">
<a href="/dang-ky-thanh-vien-vip.html"><img style="border: 0px;text-align: center;margin-top: 15px; " src="/style/images/reg_vip.gif" /></a>
<a href="/dang-ky-thanh-vien-sieu-vip.html"><img style="border: 0px;text-align: center;padding: 10px;" src="/style/images/reg_sieuvip.gif" /></a>
<a href="/nap-tien"><img style="border: 0px;text-align: center;width: 100%; " src="/style/images/huongdan_naptien.gif" /></a>
</div>

            </div>