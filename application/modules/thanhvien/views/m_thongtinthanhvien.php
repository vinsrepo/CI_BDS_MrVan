 <div class="user">
        <div class="usercontent">
            
            <div class="tit">
                <h1 class="content-tit">Trang cá nhân</h1>
            </div>
            
            
            <div class="alert alert-info username">
                <? $user=Modules::run('trangchu/getInfo','thanhvien','userid',$this->session->userdata('userid'));?>
                <div class="avatar-info">

                    <div id="fileupload" class="avatar-upload">
                        <script src="/Styles/CommonUpload/avatarUpload.js?v=01" type="text/javascript"></script>
                        <link href="/Styles/CommonUpload/css.css" rel="stylesheet" type="text/css" />
                        <div class="avatar-item">
                            <a href="/thanh-vien/doi-avatar.html" class="upload-item-delete">
                                <img src="<? echo show_img(str_replace('upload/images/avatar/','',$user_info['Avatar']),$thumb='150x150','/upload/images/avatar/');?>" style="max-width: 60px;margin-right: 10px;"/></a>
                        </div> 
                    </div>
                </div>
                <table class="userinfo">
                    <tr>
                        <td style="color:#424143;padding-right:5px">Tên liên lạc: </td>
                        <td style="color:#015f95"><? echo $user_info['HoVaTen'];?></td>
                    </tr>
                    <tr>
                        <td style="color:#424143">Điện thoại: </td>
                        <td style="color:#015f95"><? echo $user_info['DienThoai'];?></td>
                    </tr>
                    <tr>
                        <td style="color:#424143">Email: </td>
                        <td style="color:#015f95"><? echo $user_info['Email'];?></td>
                    </tr>
                   
                </table>
                <div class="clear"></div>
            </div>
            
            
            <div class="alert alert-info usermenu">
                <a href="/thanh-vien/quan-ly-tin-rao">
                    <div class="usermenu-item">
                        <span class="span">Quản lý tin rao bán/cho thuê</span>
                    </div>
                </a>

                <a href="/dang-tin-ban-cho-thue-nha-dat">
                    <div class="usermenu-item">

                        <span class="span">Đăng tin rao bán/cho thuê</span>
                    </div>
                </a>
                <a href="/thanh-vien/sua-thong-tin-ca-nhan.html">
                    <div class="usermenu-item">

                        <span class="span">Thay đổi thông tin cá nhân</span>
                    </div>
                </a>
                <a href="/thanh-vien/doi-mat-khau.html">
                    <div class="usermenu-item">
                        <span class="span">Thay đổi mật khẩu</span>
                    </div>
                </a>
                <a href="/thanh-vien/doi-avatar.html">
                    <div class="usermenu-item">
                        <span class="span">Đổi Avatar</span>
                    </div>
                </a>
                <a href="/thanh-vien/thoat.html">
                    <div class="usermenu-item usermenu-item-end">
                        <span class="span">Thoát khỏi hệ thống</span>
                    </div>
                </a>
            </div>
        </div>
    </div>

