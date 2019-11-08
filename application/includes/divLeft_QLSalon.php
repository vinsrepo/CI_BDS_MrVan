 <? $user=Modules::run('trangchu/getInfo','salon','NguoiTao',$this->session->userdata('userid'));?>
 <?php $host=$_SERVER['HTTP_HOST'];
        $name_site=preg_replace('/([a-z0-9A-Z_-]+)\.([a-z0-9A-Z_-]+)\.([a-z0-9A-Z_-]+)\.([a-z]+)/', '$2.$3.$4', $host); 
        $link_salon='http://'.$user['Domain'].'.'.$name_site;
         ?>
    <div class="profile">
    <div class="avatar">
        <a href="<? echo $link_salon;?>" target="_blank"><img style="border: 0px;width: 100%; " src="<? echo show_img($user['LoGo'],'150x150');?>" /></a>
    </div>
    <div class="avatar">
        <a href="<? echo $link_salon;?>" target="_blank"><img style="border: 0px;width: 100%; " src="<? echo get_first_img($user['AlbumAnh'],'150x150');?>" /></a>
    </div>
    <div class="fullname"><? echo $user['Domain'];?></div>
    <div class="account"><? echo $user['TenSalon'];?></div>
     
    <div class="infoaccount" style="margin-top: 10px;">
        <label style="width: 90px;">Trạng thái:</label> 
        <? if($user['TrangThai']==1){
        echo '<span style="font-weight: bold;float: right; text-align: right;">Đã kích hoạt</span>';
      }else{echo '<span style=" float: right; text-align: right;">Chưa kích hoạt</span>';}?>
    </div>
</div>

<div class="menuprofile">
    <ul>
        <li class="tit"><a>Quản lý VIP Salon ô tô </a></li> 
        
        <?
        $Tabs=array('Xe đang bán'=>array(
                                          'Thêm xe bán mới'=>'quan-ly-salon-oto/them-xe-ban-moi',
                                          'Quản lý xe đang bán'=>'quan-ly-salon-oto/xe-dang-ban', 
                                        ),
                    'Khách hàng'=>array(
                                          'Quản lý liên hệ'=>'quan-ly-salon-oto/lien-he', 
                                        ),
                    'Cài đặt Salon'=>'quan-ly-salon-oto', 
                    'Xem trang web Salon'=>$link_salon,
                    'Về bảng điều khiển cá nhân'=>'thanh-vien/sua-thong-tin-ca-nhan.html', 
              ); 
        foreach($Tabs as $name=>$link){
            if($_SERVER["REQUEST_URI"]=='/'.$link||in_array(ltrim($_SERVER["REQUEST_URI"],'/'),$link)){
                $actived='active';$uled=' style="display: block;"';$icon=' down';
            }else{
                $actived='';$uled='';$icon='';
            }
            if(is_array($link)){
              echo "
              <li class='hasChild$icon'>
                  <a>$name</a>
                  <ul$uled> 
              ";
                foreach($link as $subname=>$sublink){
                    $subactived=$_SERVER["REQUEST_URI"]=='/'.$sublink?'active':'';
                    echo " 
                       <li class='$subactived'><a href='/$sublink'>$subname</a></li> 
                    ";
                }
              echo "
                  </ul>
              </li>
              ";
            }else{
                $newlink=strrpos($link,'http')!==false?$link:'/'.$link;
              echo "
               <li class='$actived'><a href='$newlink'>$name</a></li>
              ";
            }
        }
        ?> 
    </ul>
</div>
<script>  
    $(document).ready(function () {
        $(".inputtooltips").TooltipPoint();
    });
    $('.hasChild>a').click(function () {
        var id = $(this).attr('id');
        if ($(this).parent().find("ul").is(":visible")) {
            $(this).parent().removeClass("down");
        } else {
            $(this).parent().addClass("down");
        }
        $(this).parent().find("ul").toggle();
    });

    $('.hasChild ul li').each(function () {
        if ($(this).hasClass('active')) {
            $(this).parent().css('display', 'block');
        };
    });

    $("body").on("click", "#changepoint2money", function () {
        $('#changepoint2money').fancybox({
            fitToView: false,
            padding:0
        });
    });
</script>