<!-- Content Left --><? $user=Modules::run('trangchu/getInfo','thanhvien','userid',$this->session->userdata('userid'));?>
 <div class="mleft">
<!-- Trang cá nhân -->
                
<div class="menu-user">
    <div class="mu-userinfo">
      <div class="top_card"></div>
        <div class="avatar">
            <a href="/thanh-vien/doi-avatar.html"><img src="<?echo base_url()?><? echo show_img(str_replace('upload/images/avatar/','',$user_info['Avatar']),$thumb='400x250','/upload/images/avatar/');?>" /></a>
        </div>
        <div class="display-name">
            <? echo $user['username'];?>
        </div>
        <div class="budget">
        <div style="font-weight: bold;"><? echo $user_info['HoVaTen'];?></div>
        <i><? echo $user_info['Email'];?></i><br /><br />
            <!-- <span class="total"> -->
                <!-- <? //echo number_format($user_info['money']);?> VND -->
            <!-- </span> -->
            <!-- <span class="main-acc"> -->
                <!-- <span>Điểm tích lũy</span>: -->
                <b>
               <?
              //$diem=Modules::run('trangchu/getTotalInfo','tinban',array('NguoiDang'=>$this->session->userdata('userid')),'');
              //echo $diem;
              ?>
              <?php 
             
                // if($user['level']=='free_user'||$user['level']==''){
                //   $Loai='<span style="color: orange;">Miễn phí</span>';
                // }
                // if($user['level']=='vip_user'){
                //   $Loai='<span style="color: red;">VIP</span>';
                // }
                // if($user['level']=='xsieuvip_user'){
                //   $Loai='<span style="color: red;">SIÊU VIP</span>';
                // } 
              ?>
                </b>
            <!-- </span> -->
            <!-- <span class="promotion-acc">
                <span>Loại TK: </span>
                <b>
                     <? echo $Loai;?>
                </b>
            </span> -->
            <span class="promotion-acc">
                <span>Trạng thái: </span>
                <? if($user_info['TrangThai']==2){
                  echo '<span style="text-align: center;">Chưa kích hoạt</span>';
                }else{echo '<span style="font-weight: bold; text-align: center;">Đã kích hoạt</span>';}?>
            </span></br>
            
            <? if($user['NgayThamGia']!=''){?>
            <span class="promotion-acc">
                <span>Ngày tham gia: </span>
                <i>
                     <? echo $user['NgayThamGia'];?>
                </i>
            </span>
            <?}?>
        </div>
    </div>
    <!-- <div class="mu-title">
        <h3>BẢNG ĐIỀU KHIỂN</h3>
    </div> -->
    <ul>
        
     <?
        $Tabs=array('Quản lý tài khoản'=>array(
                                          'Thay đổi thông tin cá nhân'=>'thanh-vien/sua-thong-tin-ca-nhan.html',
                                          'Đổi Avatar'=>'thanh-vien/doi-avatar.html',
                                          'Đổi mật khẩu'=>'thanh-vien/doi-mat-khau.html',
                                          // 'Thoát'=>'thanh-vien/thoat.html',
                                        ),
                    'Quản lý tin'=>array(
                                          'Đăng tin rao bán/cho thuê'=>'dang-tin-ban-cho-thue-nha-dat',
                                          'Quản lý tin rao bán/cho thuê'=>'thanh-vien/quan-ly-tin-rao',
                                          // 'Quản lý tin rao đã lưu'=>'thanh-vien/quan-ly-tin-da-luu',
                                        ),
                    // 'Giao dịch'=>array(
                    //                       'Kiểm tra số dư tài khoản'=>'nap-tien/kiem-tra-so-du-tai-khoan',
                    //                       'Nạp tiền vào tài khoản'=>'nap-tien',
                    //                       'Đăng ký thành viên VIP'=>'dang-ky-thanh-vien-vip.html',
                    //                       'Đăng ký thành viên SIÊU VIP'=>'dang-ky-thanh-vien-sieu-vip.html', 
                    //                       'Quản lý thẻ đã nạp'=>'quan-ly-the-nap',
                    //                       'Lịch sử giao dịch'=>'lich-su-giao-dich'
                    //                     ),
                    
                    
              ); 
        foreach($Tabs as $name=>$link){
            if($_SERVER["REQUEST_URI"]=='/'.$link||in_array(ltrim($_SERVER["REQUEST_URI"],'/'),$link)){
                $actived='active';$uled=' style="display: block;"';$icon=' down';
            }else{
                $actived='';$uled='';$icon='';
            }
            if(is_array($link)){
             //echo "<li class='lead'><a href='javascript:'>$name</a></li>";
                foreach($link as $subname=>$sublink){
                    $subactived=$_SERVER["REQUEST_URI"]=='/'.$sublink?'active':'';
                    echo "<li class='$subactived'><a href='/$sublink'>$subname</a></li>";
                }
              echo "</li>";
            }else{
              echo "<li class='$actived'><a href='/$link'>$name</a></li>";
            }
        }
        ?>         
    </ul>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $.ajax({
            dataType: 'json',
            url: '/Handler/UserHandler.ashx',
            data: { act: 'GetUserInfo' },
            type: "POST",
            success: function (data) {
                if (data != null) {
                    $('.display-name').text(data.DisplayName != null ? data.DisplayName : data.UserName);
                    $('.total').text(data.Total != null ? data.Total : '0 VND');
                    $('.main-acc b').text(data.Balance != null ? data.Balance : '0 VND');
                    $('.promotion-acc b').text(data.Promotion != null ? data.Promotion : '0 VND');
                    $('.avatar').html('<img src="' + data.Avatar + '" title="' + data.DisplayName + '"/>');
                }
            }
        });
        $.ajax({
            dataType: 'text',
            url: '/Handler/UserHandler.ashx',
            data: { act: 'GetNotify' },
            type: "GET",
            success: function (data) {
                if (data != null) {
                    $('.box-notifies').html(data);
                }
            }
        });
    });
</script>

</div>