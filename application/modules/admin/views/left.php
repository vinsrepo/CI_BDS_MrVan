<? if(!isset($hidden_top)){?>
<!-- SIDEBAR - START -->
            <div class="page-sidebar ">


                <!-- MAIN MENU - START -->
                <div class="page-sidebar-wrapper" id="main-menu-wrapper"> 
<?
                if(isset($user_info)&&$user_info!=''){  ?>
                    <!-- USER INFO - START -->
                    <div class="profile-info row">

                        <div class="profile-image col-md-4 col-sm-4 col-xs-4">
                            <a target="_blank" href="/thanh-vien/doi-avatar.html">
                                <img src="<? echo show_img(str_replace('upload/images/avatar/','',$user_info['Avatar']),$thumb='150x150','/upload/images/avatar/');?>" class="img-responsive img-circle">
                            </a>
                        </div>

                        <div class="profile-details col-md-8 col-sm-8 col-xs-8">

                            <h3>
                                <a href="/thanhvien/suathanhvien/<? echo $this->session->userdata('userid');?>?region=9-1"><? echo $user_info['username'];?></a>

                                <!-- Available statuses: online, idle, busy, away and offline -->
                                <span class="profile-status online"></span>
                            </h3>

                            <p class="profile-title"><?php echo lang('mn_website'); ?></p>

                        </div>

                    </div>
                    <!-- USER INFO - END '/'=>'',-->
 <?}?>


                    <ul class='wraplist'>
                        <?
                        function showTotal($total){
                            if($total){
        $show_total='<span class="label label-success" style="padding: 5px;padding-top: 3px;padding-bottom:0px;font-size:14px">'.$total.'</span>';
    }else{
        $show_total=''; 
        
    }
    return $show_total;
                        } 
                        $show_total=showTotal(Modules::run('trangchu/totalRows','tinban',array()));
                        $member=showTotal(Modules::run('trangchu/totalRows','thanhvien',array()));
                        $truycap=showTotal(Modules::run('trangchu/totalRows','truycap',array()));
                        $tintuc=showTotal(Modules::run('trangchu/totalRows','baiviet',array('Loai IN(\'TinTuc\',\'TuVanXe\',\'SoSanhXe\',\'DanhGiaXe\',\'KinhNghiem\') and IDBaiViet !='=>'')));
    
                        $listMenus=array(
                            'Trang quản trị|dashboard'=>'admin',
                            'Danh mục BĐS|folder-open'=>array(
                                  'Tạo danh mục mới'=>'baiviet/taobaiviet/0/DanhMuc?region=2-1',
                                  'Quản lý danh mục'=>'baiviet/quanlybaiviet/true/DanhMuc?region=2-2',
                            ),
                            'Quản lý tin rao|edit'=>array(
                                  'Tin đang chờ kiểm duyệt'=>'dangtin/quanlytinban_admin/true/1/0?region=3-1',
                                  // 'Quản lý tin rao thường'=>'dangtin/quanlytinban_admin/true/1/1/free_user?region=3-2',
                                  // 'Quản lý tin rao VIP'=>'dangtin/quanlytinban_admin/true/1/1/vip_user?region=3-3',
                                  // 'Quản lý tin rao SIÊU VIP'=>'dangtin/quanlytinban_admin/true/1/1/xsieuvip_user?region=3-4',
                                  // 'Quản lý tin rao HOT'=>'dangtin/quanlytinban_admin/true/1/1/hot?region=3-5',
                                  'Tin đã kiểm duyệt'=>'dangtin/quanlytinban_admin/true/1?region=3-2',
                                  //'Quản lý thông báo lỗi'=>'dangtin/quanlygopy/true/1?region=3-6',
                            ),
                            'Dự án|suitcase'=>array(
                                  'Tạo dự án mới'=>'salon/taosalon/0/?region=4-1',
                                  'Quản lý dự án'=>'salon/quanlysalon/true?region=4-2', 
                            ),
                            'Menu|navicon'=>array(
                                  'Menu đầu trang'=>array(
                                               'Tạo menu mới'=>'baiviet/taobaiviet/0/MenuHeader?region=5-1-1',
                                               'Quản lý menu'=>'baiviet/quanlybaiviet/true/MenuHeader?region=5-1-2',
                                  ),
                                  'Menu chân trang'=>array(
                                               'Tạo menu mới'=>'baiviet/taobaiviet/0/MenuFooter?region=5-2-1',
                                               'Quản lý menu'=>'baiviet/quanlybaiviet/true/MenuFooter?region=5-2-2',
                                  ),
                            ),
                            // 'Advertisement Banner|image'=>array(
                            //       'New Banner'=>'baiviet/taobaiviet/0/Banner?region=5-1',
                            //       'Manage Banner'=>'baiviet/quanlybaiviet/true/Banner?region=5-2',
                            // ),
                            // 'News|newspaper-o'=>array(
                            //       'New Post'=>'baiviet/taobaiviet/0/TinTuc?region=6-1',
                            //       'Manage Posts'=>'baiviet/quanlybaiviet/true/TinTuc?region=6-2',
                            // ),
                            
                            // 'Access Counting|bar-chart'=>array(
                            //       'Online Customers'=>'truycap/dangonline/1/true?region=8-1',
                            //       'Manage Access'=>'truycap/quanlytruycap/1/true?region=8-2',
                            // ),
                            'Thành viên|user'=>array(
                                  'Tạo thành viên mới'=>'admin/taotaikhoan?region=6-1',
                                  'Danh sách thành viên'=>'thanhvien/quanlythanhvien/1/true?region=6-2-1',
                            ),
                            'Email|envelope'=>array(
                                  'Gửi Email'=>'email/guiemail?region=7-1',
                                  'Email đăng ký thành viên mới'=>'email/thietlapmauemail/EmailChaoMung/?region=7-2',
                                  'Email xác thực'=>'email/thietlapmauemail/EmailKichHoat?region=7-3',
                                  'Email quên mật khẩu'=>'email/thietlapmauemail/EmailQuenMatKhau?region=7-4',
                                  'Cấu hình email'=>'email/cauhinhemail?region=7-5',
                            ),
                            'Cài đặt Website|cog'=>array(
                                  'Đóng/Mở Website'=>'admin/dongmowebsite?region=8-1',
                                  'Cấu hình chung'=>'admin/suathongtin?region=8-2',
                                  // 'Nganluong Charging Configuration'=>'admin/naptien?region=8-3',
                                  // 'Billing Information'=>'admin/thanhtoan?region=8-4',
                                  // 'Membership Permission'=>array(
                                  //              'Free User Permission'=>'admin/change_user/free_user?region=8-5-1',
                                  //              'V.I.P User Permission'=>'admin/change_user/vip_user?region=8-5-2',
                                  //              'Diamond User Permission'=>'admin/change_user/xsieuvip_user?region=8-5-3',
                                  // ),
                            ),
                            'Liên hệ|paper-plane'=>array(
                                  'Góp ý'=>'lienhe/quanlylienhe/true/1?region=9-1',
                                  // 'Manage Messages'=>'dangtin/quanlytinnhan/true/1?region=9-2',
                                  'Email đăng ký'=>'trangchu/quanlydangky/true/1?region=9-2',
                                  'Tư vấn'=>'trangchu/quanlytuvan/true/1?region=9-3',
                            ),
                            // 'Manage Billing|money'=>array(
                            //       'Transaction History '=>'naptien/lichsugiaodich/true/1?region=13-1',
                            //       'Manage Charging Card'=>'naptien/quanlythenap/true/1?region=13-2',
                            // ),
                        );//print_r($region);
                        $region=explode('-',$_GET["region"]);
                        $stt_parent=0;
        foreach($listMenus as $name=>$link){$stt_parent++;
            $name=explode('|',$name);
            $name2=$name[0];
            $icon=$name[1];  
            $actived=$region[0]==$stt_parent||($region[0]==''&&$stt_parent==1)?'open':''; 
            
            $total1=$icon=='edit'?$show_total:'';
            $total2=$icon=='user'?$member:'';
            $total3=$icon=='bar-chart'?$truycap:'';
            $total4=$icon=='newspaper-o'?$tintuc:'';
            $total5=$icon=='dashboard'?'<span class="label label-orange" style=" padding: 5px;padding-top: 3px;padding-bottom:0px;font-size:14px">MỚI</span>':'';
            $total6=$icon=='suitcase'?'<span class="label label-orange" style=" padding: 5px;padding-top: 3px;padding-bottom:0px;font-size:14px">HOT</span>':'';
            
            if(is_array($link)){
              echo "
              <li class='$actived'><a href='javascript://;'><i class='fa fa-$icon'></i><span class='title'>$name2</span>
              <span class='arrow '></span>$total1 $total2 $total3 $total4 $total6
                            </a>
                            <ul class='sub-menu' >";
                            $stt_child=0;                            
                foreach($link as $subname=>$sublink){$stt_child++;
                    
                    
                    if(is_array($sublink)){
                        $subactived=$region[1]==$stt_child&&$region[0]==$stt_parent?'open':'';
              echo "
              <li class='$subactived'><a href='javascript://;'><span class='title'>$subname</span>
              <span class='arrow '></span></a>
                            <ul class='sub-menu' >";
                            $stt2_child=0;                            
                foreach($sublink as $sub2name=>$sub2link){$stt2_child++;
                    $sub2actived=$region[2]==$stt2_child&&$region[1]==$stt_child&&$region[0]==$stt_parent?'active':'';
                    echo " 
                       <li><a class='$sub2actived' href='/$sub2link'>$sub2name</a></li> 
                    ";
                }
              echo " 
              </ul>
              </li>
              ";
            }else{
                $subactived=$region[1]==$stt_child&&$region[0]==$stt_parent?'active':'';
              echo " 
                       <li><a class='$subactived' href='/$sublink'>$subname</a></li> 
                    ";
            }
                    
                    
                }
              echo " 
              </ul>
              </li>
              ";
            }else{
              echo "
               <li class='$actived'><a href='/$link'><i class='fa fa-$icon'></i><span class='title'>$name2</span> $total5 $total6</a></li>
              ";
            }
        }
                        ?>
                         

                    </ul>

                </div>
                <!-- MAIN MENU - END -->



                <div class="project-info">

                    <div class="block1">
                        <div class="data">
                            <span class='title'>Tin rao</span>
                            <span class='total'><? echo number_format(Modules::run('trangchu/totalRows','tinban',array()));?></span>
                        </div>
                        <div class="graph">
                            <span class="sidebar_orders">...</span>
                        </div>
                    </div>

                    <div class="block2">
                        <div class="data">
                            <span class='title'>Truy cập</span>
                            <span class='total'><? echo number_format(Modules::run('trangchu/totalRows','truycap',array()));?></span>
                        </div>
                        <div class="graph">
                            <span class="sidebar_visitors">...</span>
                        </div>
                    </div>

                </div>



            </div>
            <!--  SIDEBAR - END -->
             <?}?>