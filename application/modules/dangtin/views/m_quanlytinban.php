                 
<div class="content_default">
    <div class="content">          
        <div class="manage_news">
            <div class="tit">
                <h1 class="content-tit">Quản lý tin rao</h1>
            </div>
            <table class="table table-striped table-responsive">
                <thead style="font-size: 12px">
                    <tr>
                        <!-- <th scope="col" style="width:5%">#</th> -->
                        <th scope="col" style="text-align: left; width: 50%;">Nội dung</th>
                        <th scope="col" style="width: 20%;">Giá</th>                                              
                        <th scope="col" style="width:30%">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <? $user=Modules::run('trangchu/getInfo','thanhvien','userid',$this->session->userdata('userid'));?>
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
                    <?	  
                    $confirm_uptin='Bạn có chắc muốn làm mới tin này?';
                        if($lienhe){ 
                            foreach ($lienhe as $tintuc)
                            {  
                                $HangXe=Modules::run('baiviet/getDanhMucCha',$tintuc['HangXe']);
                                $DoiXe=Modules::run('baiviet/getDanhMucCha',$tintuc['DoiXe']);
                                $confirm="'".$this->lang->line('lable_confirm')."'";
                                $NoiDung=strip_tags($tintuc['ThongTinMota']);
                                                $NoiDung=''.substr($NoiDung,0,80).'';
                                                $NoiDung=substr($NoiDung, 0, strrpos($NoiDung, ' ')).'...';
                                
                                if($tintuc['TrangThai']==0){
                                    $color = '#b21900';
                                }else{
                                    $color = '#0091b2';
                                }
                                if($tintuc['is_block']==1){
                                    $act_link = 'an-tin/';
                                    $icon = '<i class="fas fa-eye-slash"></i>';
                                    $label = 'Ẩn';
                                    $class = 'dark';
                                    $confirm_ah = 'Bạn có muốn ẩn tin này?';
                                }else{
                                    $act_link = 'hien-tin/';
                                    $icon = '<i class="far fa-eye"></i>';
                                    $label = 'Hiển thị';
                                    $class = 'info';
                                    $confirm_ah = 'Bạn có muốn hiển thị tin này?';
                                } 
                                $link='/'.stripUnicode($HangXe['TieuDe']).'-'.stripUnicode($tintuc['NamSX']).'-'.stripUnicode($tintuc['DoiXe']).'/'.stripUnicode($tintuc['TieuDe']).'-pr'.$tintuc['IDMaTin'].'.html';
                        echo '
                            <tr>
                                <th scope="row" style="font-size: 13px; font-weight: 100 !important; width:50%">
                                    <a href="'.$link.'" style="color:'.$color.'">
                                        '.$tintuc['TieuDe'].'
                                    </a>                                                                         
                                </th>
                                <th scope="row" style="width:20%">
                                    <span class="btn btn-light btn-sm text-success" style="font-size: 12px;">
                                        '.($tintuc['GiaTien']==0?'':giaca($tintuc['GiaTien'])).' '.$tintuc['SoKM'].'
                                    </span>                                  
                                </th>
                                <th scope="row" style="font-weight: 100 !important; width:30%">                                                 
                                    <a style="font-weight: 100 !important;font-size:11px; padding:2px;" class="text-white btn btn-sm btn-success" href="'.$link.'" target="_blank"><i class="fa fa-eye"></i> Xem</a>
                                    <a style="font-weight: 100 !important;font-size:11px; padding:2px;" href="'.base_url().'dangtin/uptin/'.$tintuc['IDMaTin'].'" onclick="return confirm('.$confirm_uptin.')" class="text-white btn btn-warning btn-sm"><i class="fas fa-redo"></i> Làm mới</a>
                                    <a style="font-weight: 100 !important;font-size:11px; padding:2px;" class="text-white btn btn-'.$class.' btn-sm" href="'.base_url().$act_link.$tintuc['IDMaTin'].'" onclick="return confirm('.$confirm_ah.')">'.$icon.' '.$label.'</a> 
                                    <a style="font-weight: 100 !important;font-size:11px; padding:2px;" class="text-white btn btn-sm btn-warning" href="/sua-tin-rao/'.$tintuc['IDMaTin'].'"><i class="fa fa-edit"></i> Sửa</a>
                                    <a style="font-weight: 100 !important;font-size:11px; padding:2px;" onclick="return confirm('.$confirm.')" id="MainContent_ManageNewsMobile_rpProductManage_lbtDelete_0" class="text-white btn btn-sm btn-danger" href="xoa-tin-ban-xe/'.$tintuc['IDMaTin'].'"><i class="fa fa-trash"></i> Xoá</a>                                  
                                </th>                               
                            </tr>
                            
                            ';
                            }
                        }
                        else
                        {
                            echo '<div class="note note-warning" style="overflow: hidden;margin:0px;width:91.5%!important;"><div class="warning-box">Chưa có tin rao nào</div></div>';
                        }
                        ?>
                </tbody>
            </table>
            <div style="text-align: center">
                <div class="pager pager_controls">
                    <span id="MainContent_ManageNewsMobile_ProductsPager">
                        <?php echo $this->pagination->create_links();?>
                    </span>
                </div>
            </div>
        </div>
<!-- <script src="/Scripts/datepicker/picker.js" type="text/javascript"></script>
<script src="/Scripts/datepicker/picker.date.js" type="text/javascript"></script>
<script src="/Scripts/datepicker/picker.time.js" type="text/javascript"></script>
<script src="/Scripts/datepicker/legacy.js" type="text/javascript"></script>
<script src="/Scripts/datepicker/main_template.js" type="text/javascript"></script> -->

<!-- <script src="/Scripts/jquery.bt.min.js"></script> -->
<script type="text/javascript">
    // $(function () {

    //     $('.imgPost').bt('Tin hết hạn mới được đăng lại.',
    //         {
    //             trigger: 'hover',
    //             positions: 'left',
    //             width: '170px',
    //             fill: '#ffff99',
    //             showTip: function (box) {
    //                 $(box).show();
    //             }
    //         });
    //     $('.imgUp').bt(
    //         {
    //             trigger: 'hover',
    //             positions: 'left',
    //             width: '170px',
    //             fill: '#ffff99',
    //             showTip: function (box) {
    //                 $(box).show();
    //             }
    //         });
    // });
    function DeleteNews() {
        if (confirm('Bạn có chắc chắn muốn xoá tin này ?')) {
            return true;
        }
        return false;
    }

</script>

        </div>
    </div>

