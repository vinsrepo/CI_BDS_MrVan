<?
if(isset($salon_info)){
    $xe_view='/xe-ban/';
}else{
    $xe_view='/xe-';
}
?>
<link rel='stylesheet' href='/style/css/print.css' />
<script src='/style/js/print.js'></script>
<script src="/style/js/jquery.sticky.js"></script>
<script type="text/javascript" src="http://img.banxehoi.com/SubtitleUploadImages/jwplayer/jwplayer.js"></script>
    <!--
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key=AIzaSyBb9G2YkPF1OsSbU9KCCRAMWn6NLeuvjr4"></script>
    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAncygDLD4qxYy5Uw6vPdz_KH_qOCJDL8U"></script> 
<script>
    function Addr(Lat, Long) {
        var positioninit = new google.maps.LatLng(Lat, Long);
        var mapOptions = {
            scrollwheel: false,
            zoom: 14,
            center: positioninit,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(Lat, Long),
            map: map,
            icon: '/images/marker.png'
        });
    };

    function searchAddr(address, city) {
        var marker = null;
        var map = null;
        function initialize() {
            var positioninit = new google.maps.LatLng(15.9030623, 105.8066925);
            var mapOptions = {
                scrollwheel: false,
                zoom: 4,
                center: positioninit,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        }

        initialize();

        new google.maps.Geocoder().geocode({ 'address': address }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (!marker) {
                    marker = new google.maps.Marker({
                        map: map,
                        icon: '/images/marker.png',
                        draggable: false
                    });
                    //google.maps.event.addListener(marker, 'click', showLocation);
                }
                marker.setPosition(results[0].geometry.location);
                map.setCenter(results[0].geometry.location);
                map.setZoom(13);
                //addrInput.value = results[0].formatted_address;
            } else {

                //alert("Geocode was not successful for the following reason: " + status);
                new google.maps.Geocoder().geocode({ 'address': city }, function (results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (!marker) {
                            marker = new google.maps.Marker({
                                map: map,
                                icon: '/images/marker.png',
                                draggable: false
                            });
                            //google.maps.event.addListener(marker, 'click', showLocation);
                        }

                        marker.setPosition(results[0].geometry.location);
                        map.setCenter(results[0].geometry.location);
                        map.setZoom(13);
                    }
                    else {
                        alert("Không tìm thấy địa chỉ của tin rao này!");
                    }
                });
            }
        });
    }
</script>

    <script>
    $(document).ready(function () {

        $('.autodetail .tab li').tabautodetail();  
        $('#osgslide').osgslide('150x150', '400x250',59);  
 

        if('0' != '0'  && '0' != '0'){
            $('.tab #bando').click( function (){
                Addr('0','0');
            });
        }
        else{
            $('.tab #bando').click( function (){ 
                searchAddr("<? echo $ava['DiaChi'];?>","<? echo $ava['TinhThanh'];?>");
            });
        }

        $("div[id*='player'][data-type='jwplayer']").playVideo();
        $("div[data-type='embed']").playVideo();

        //Add HighLight
        $('.infotechv2 .baseinfo .colleft .row').addHighLight();
        $('.infotechv2 .baseinfo .colright .row').addHighLight();

        $('.infotechv2 .extendinfo .colleft .row').addHighLight();
        $('.infotechv2 .extendinfo .colright .row').addHighLight();

        $('.infotechv2 .techinfo .colleft .row').addHighLight();
        $('.infotechv2 .techinfo .colright .row').addHighLight();
        
    });
    var productId = '298431';
    window.AutoId = productId;
</script>

                <div class="tit">
                    <h1><? echo $xemtinban['TieuDe'];?></h1>
                    <?php
                            $slide=explode('|',$xemtinban['AlbumAnh']); 
                            ?>
                </div> 
                <div class="tab">
                    <ul>
                        <li id="anh" class="activetab oswaldlarge-tab">Hình ảnh (<?  $total_img=count($slide)-1; echo $total_img;?>)</li>
                        <li id="video" class="oswaldlarge-tab">Video (0)</li>
                        <li id="bando" class="oswaldlarge-tab">Map</li>
                    </ul>
                </div>
                <div class="bound">
                    <div class="img">
                        <div class="container-tab">
                            <div class="anh box" style="display: block;">
                                <div class="imageslide">
                                    <link rel="stylesheet" href="/style/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8">
                                    <script src="/style/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
                                    <div class="gallery clearfix" id="osgslide">
                                    <?php
                            $stt=-1;
                            foreach($slide as $img){
                                if($img!=''&&$img!='undefined'&&$img!='noimage.gif'){
                                 $stt++;
                                echo '
                            <a id="osgslide-display-none-index-'.$stt.'" style="display:none" href="'.show_img($img).'" rel="prettyPhoto[gallery1]">
                                                    <img alt="'.$xemtinban['TieuDe'].'" title="'.$xemtinban['TieuDe'].'" src="'.show_img($img,$thumb='400x250').'" />
                                                </a>
                                                <img  style="width: 100%;height: auto;" class="osgslideimg" title="'.$xemtinban['TieuDe'].'" src="'.show_img($img,$thumb='150x150').'" rel="osgslide-display-none-index-'.$stt.'" alt="'.$xemtinban['TieuDe'].'" />   
                            ';
                                
                                }
                                
                            }
                            if($stt==-1){
                                echo '
                            <a id="osgslide-display-none-index-0" style="display:none" href="'.show_img(0).'" rel="prettyPhoto[gallery1]">
                                                    <img alt="'.$xemtinban['TieuDe'].'" title="'.$xemtinban['TieuDe'].'" src="'.show_img(0).'" />
                                                </a>
                                                <img  style="width: 100%;height: auto;" class="osgslideimg" title="'.$xemtinban['TieuDe'].'" src="'.show_img(0).'" rel="osgslide-display-none-index-0" alt="'.$xemtinban['TieuDe'].'" />   
                            ';
                            }
                            ?>     
                                                
                                        <input type="hidden" id="maxtab" value="<? echo $total_img-4;?>" />
                                        <input type="hidden" id="maximage" value="<? echo $total_img;?>" />

                                    </div>
                                </div>

                            </div>
                            <div class="video box" style="display: none;">
                                

                                
                            </div>
                            <div class="bando box" style="display: none;">
                                <div id="map-canvas"></div>
                            </div>
                        </div>
                        <div class="infoauto">
                            <div class="price">
                                <label>Giá bán:</label>
                                <span> <? echo giaca($xemtinban['GiaTien']);?></span>
                            </div>
                            <div class="rowinfoauto highlight">
                                <label>Tình trạng xe</label>
                                <span>: <? echo $xemtinban['TinhTrang'];?></span>
                            </div>
                            <div class="rowinfoauto">
                                <label>Xuất xứ</label>
                                <span>: <? echo $xemtinban['XuatXu'];?></span>
                            </div>
                            <div class="rowinfoauto highlight">
                                <label>Kiểu dáng</label>
                                <span>: <? echo $xemtinban['DongXe'];?>       </span>
                            </div>
                            <div class="rowinfoauto">
                                <label>Năm sản xuất</label>
                                <span>: <? echo $xemtinban['NamSX'];?></span>
                            </div>
                            <div class="rowinfoauto highlight">
                                <label>Ngày đăng</label>
                                <span>: <? echo date('d/m/Y',strtotime($xemtinban['NgayDang']));?></span>
                            </div>
                            <div class="rowinfoauto">
                                <label>Mã tin</label>
                                <span>: <? echo $xemtinban['IDMaTin'];?></span>
                            </div>
                            <div class="share-fbgg">
                                                        

                                <script>
                                    (function (d, s, id) {
                                        var js, fjs = d.getElementsByTagName(s)[0];
                                        if (d.getElementById(id)) return;
                                        js = d.createElement(s); js.id = id;
                                        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.0";
                                        fjs.parentNode.insertBefore(js, fjs);

                                    }(document, 'script', 'facebook-jssdk'));
                                </script>
                                <script src="https://apis.google.com/js/platform.js" async="" defer="" gapi_processed="true">{ lang: 'vi' }</script>
                                <div style="float:left;padding-top: 3px;"><div class="fb-like fb_iframe_widget" data-href="http://banxehoi.com/ban-xe-samsung-sm3-ha-noi/can-ban-samsung-sm3-doi-2015-mau-den-gia-tot-goi-ngay-0986187434-aid305763" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=&amp;container_width=0&amp;href=http%3A%2F%2Fbanxehoi.com%2Fban-xe-samsung-sm3-ha-noi%2Fcan-ban-samsung-sm3-doi-2015-mau-den-gia-tot-goi-ngay-0986187434-aid305763&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;share=false&amp;show_faces=true"><span style="vertical-align: bottom; width: 84px; height: 20px;"><iframe name="ff8bb3ec8" width="1000px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:like Facebook Social Plugin" src="http://www.facebook.com/v2.0/plugins/like.php?action=like&amp;app_id=&amp;channel=http%3A%2F%2Fstatic.ak.facebook.com%2Fconnect%2Fxd_arbiter%2F44OwK74u0Ie.js%3Fversion%3D41%23cb%3Df13e4be7f8%26domain%3Dbanxehoi.com%26origin%3Dhttp%253A%252F%252Fbanxehoi.com%252Ff3f6844bf8%26relation%3Dparent.parent&amp;container_width=0&amp;href=http%3A%2F%2Fbanxehoi.com%2Fban-xe-samsung-sm3-ha-noi%2Fcan-ban-samsung-sm3-doi-2015-mau-den-gia-tot-goi-ngay-0986187434-aid305763&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;share=false&amp;show_faces=true" style="border: none; visibility: visible; width: 84px; height: 20px;" class=""></iframe></span></div></div>
                                <div style="float: left; padding: 3px 0 0 05px;"><div id="___plusone_1" style="text-indent: 0px; margin: 0px; padding: 0px; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 90px; height: 20px; background: transparent;"><iframe frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 90px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 20px;" tabindex="0" vspace="0" width="100%" id="I0_1441533581926" name="I0_1441533581926" src="https://apis.google.com/u/0/se/0/_/+1/fastbutton?usegapi=1&amp;size=medium&amp;hl=vi&amp;origin=http%3A%2F%2Fbanxehoi.com&amp;url=http%3A%2F%2Fbanxehoi.com%2Fban-xe-samsung-sm3-ha-noi%2Fcan-ban-samsung-sm3-doi-2015-mau-den-gia-tot-goi-ngay-0986187434-aid305763&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.vi.w4e3O96WXRQ.O%2Fm%3D__features__%2Fam%3DAQ%2Frt%3Dj%2Fd%3D1%2Ft%3Dzcms%2Frs%3DAGLTcCMm1mLwYuT2DaZEVNSJrMaIJ0FsOA#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I0_1441533581926&amp;parent=http%3A%2F%2Fbanxehoi.com&amp;pfname=&amp;rpctoken=25897653" data-gapiattached="true" title="+1"></iframe></div></div>
                            </div>
                            <div class="iconfbgg" style="margin-bottom: 20px;">
                                <a rel="nofollow" href="https://www.facebook.com/sharer/sharer.php?u=http://banxehoi.com/ban-xe-samsung-sm3-ha-noi/can-ban-samsung-sm3-doi-2015-mau-den-gia-tot-goi-ngay-0986187434-aid305763" target="_blank"><img src="<? echo base_url();?>style/images/f.png"></a>
                                <a rel="nofollow" href="https://plus.google.com/share?url=http://banxehoi.com/ban-xe-samsung-sm3-ha-noi/can-ban-samsung-sm3-doi-2015-mau-den-gia-tot-goi-ngay-0986187434-aid305763" target="_blank"><img src="<? echo base_url();?>style/images/g.png"></a>
                                <a rel="nofollow" href="http://twitter.com/home?status=http://banxehoi.com/ban-xe-samsung-sm3-ha-noi/can-ban-samsung-sm3-doi-2015-mau-den-gia-tot-goi-ngay-0986187434-aid305763" target="_blank"><img src="<? echo base_url();?>style/images/t.png"></a>
                            </div>
                            <div>
                            <div class="item" style="float: left;"><a rel="nofollow" href="javascript:window.print();"><img src="/images/printv2.png"></a></div>
                            <div class="item" style="float: left;margin-left: 10px;"><a rel="nofollow" id="report" class="fancybox.ajax" href="/auto/_report"><img src="/images/warning.png" /></a></div>
                            </div>
                        </div> 
                    </div>
                    <div class="desc">
                        
                        <p class="description" style="text-align: justify;">
                            <? echo nl2br($xemtinban['ThongTinMota']);?>
                        </p>
                    </div>

                    <div class="infotechv2">

                            <div class="baseinfo">
                                <div class="titlebox">Thông số cơ bản</div>
                                <div class="colleft">
                                        <div class="row highlight">
                                            <label style="width: 64px;">Số cửa</label>
                                            <span><? echo $xemtinban['SoCua'];?> cửa</span>
                                        </div>			 
                                        <div class="row">
                                            <label style="width: 64px;">Số chỗ</label>
                                            <span><? echo $xemtinban['SoChoNgoi'];?> ghế</span>
                                        </div>			 
                                        <div class="row highlight">
                                            <label style="width: 64px;">Hộp số</label>
                                            <span><? echo $xemtinban['HopSo'];?></span>
                                        </div>			 
                                        <div class="row">
                                            <label style="width: 64px;">Dẫn động</label>
                                            <span><? echo $xemtinban['DanDong'];?></span>
                                        </div>	
                                        <div class="row highlight">
                                            <label style="width: 84px;"><? echo $this->lang->line('lable_thongso_khongbatbuoc_SoKM');?></label>
                                            <span><? echo $xemtinban['SoKM'];?></span>
                                        </div>			 
                                </div>
                                <div class="colright">
                                        <div class="row highlight">
                                            <label style="width: 93px;">Nhiên liệu</label>
                                            <span><? echo $xemtinban['NhienLieu'];?></span>
                                        </div>
                                        <div class="row">
                                            <label style="margin-right: 10px;"><? echo $this->lang->line('lable_thongso_khongbatbuoc_HeThongNapNhienLieu');?>: </label>
                                            <span> <? echo $xemtinban['HeThongNapNhienLieu'];?>  </span>
                                        </div>
                                        <div class="row highlight">
                                            <label style="margin-right: 10px;"><? echo $this->lang->line('lable_thongso_khongbatbuoc_MucTieuThu');?>:</label>
                                            <span><? echo $xemtinban['MucTieuThu'];?> L/100Km       </span>
                                        </div>
                                        <div class="row">
                                            <label style="width: 93px;">Màu ngoại thất</label>
                                            <span><? echo $xemtinban['NgoaiThat'];?></span>
                                        </div>
                                        <div class="row highlight">
                                            <label style="width: 93px;">Màu nội thất</label>
                                            <span><? echo $xemtinban['NoiThat'];?> </span>
                                        </div>
                                </div>
                            </div>
                            <div class="extendinfo"> 
                                <link rel="stylesheet" href="<? echo base_url();?>style/css/dangtin2.css" type="text/css"/>
<script type="text/javascript" src="<? echo base_url();?>style/js/tabber.js"></script>
 
<div id="sgg" style="width: 100%;margin: 0px;padding: 0px;height: auto;border: 1px whitesmoke;">
<div class="tabber" style="float:left ">  
      <?
      $data_tinban=json_decode($xemtinban['ThongTinThem']);
        foreach ($this->lang->language as $key => $val) 
        {      
           $var=str_replace('lable_thongtinthem_khongbatbuoc_Nhom_','',$key);
              
            if(preg_match("/^[0-9]+$/", $var))
            {
                
              echo '
              <div class="tabbertab" style="BORDER: #dedede 1px solid;height:400px;background: white;">
              <h2>'.$val.'</h2>
              ';
                
              foreach ($this->lang->language as $key => $val) 
              {
               $var1=str_replace('lable_thongtinthem_khongbatbuoc_Nhom_'.$var.'_','',$key);
                
              
              
               if(preg_match("/^[0-9]+$/", $var1)){
                $sty='';
                if($key=='lable_thongtinthem_khongbatbuoc_Nhom_3_1'){
                    $sty='float:right';
                }
              
                echo '<div class="col" style="width:50%;'.$sty.'">';
              
              
               
                 echo ' <div class="col"><h3>'.$val.'</h3></div>';
                 foreach ($this->lang->language as $key => $val) 
                 {
                 
                 $name=$var."_".$var1."_".preg_replace("/lable_thongtinthem_khongbatbuoc_Nhom_".$var."_".$var1."_([0-9]+)(.*)/",'$1',$key);
                 $giatri='';
                 if(preg_match("/lable_thongtinthem_khongbatbuoc_Nhom_".$var."_".$var1."_([0-9]+)(.*)/",$key)){
                    
                    if($data_tinban!=''){
                        $giatri=$data_tinban->{$name};
                    }
                    if($data_tinban!=''&&$data_tinban->{$name}==1||$this->input->post($name)==1){
                    $check='<span style="text-align: right;float: right;padding-right:10px;padding-top:2px"><img src="/images/checkedv2.png"></span>';
                    }
                    else{
                      $check='';
                    }
                    if($giatri==''){
                        $giatri=$this->input->post($name);
                    }
                 if(preg_match("/(.*)_checkbox/", $key)){
                    $lable=$check;
                    //$lable='<INPUT id="lable_'.$name.'" TYPE=CHECKBOX NAME="'.$name.'" disabled value="1" '.$check.'>';
                 }
                 elseif(preg_match("/(.*)_textbox/", $key)){
                     
                    $lable='<b>'.$giatri.'</b>';
                 }elseif(preg_match("/(.*)_textarea/", $key)){
                    $val='';
                    $lable=$giatri;
                 }
                 echo '<div class="row_last">
						<div class="label_tab1">
							<label for="lable_'.$name.'"> 
								'.$val.'
							</label>
						</div>
						
						<div class="bbformfield">
							<span class="inp">	
								'.$lable.'
							
							</span>
						</div>
						 
						 
					</div>';
                 }
                 }
                 echo '</div>';
                 
              }
              
              
              }
                echo '</div>';
            }
     }
      ?>
      </div>
      </div>
                            </div>

                                            </div>

                   
                    <div class="contact">
                        <div class="contactinfo" style="width: 100%;">
                        <?if(isset($salon_info)){?>
                        <h2 class="tit" style="margin-bottom: 10px;">Thông tin Salon: <? echo $salon_info['TenSalon'];?> </h2> 
                        <div class="" style="width: 100%;line-height: 18px;">
				<div class="salonaddress"><b style="color: black;"><?php echo $this->lang->line('lable_add');?></b>: <? echo $salon_info['DiaChi'];?></div>
                <div class="salonmobile"><b style="color: black;"><?php echo $this->lang->line('lable_mobile');?></b>: <? echo $salon_info['DienThoai'];?> </div>
                <div class="salonemail"><b style="color: black;"><?php echo $this->lang->line('lable_email');?></b>: <? echo $salon_info['Email'];?><br /></div>
                <div class="salonaddress"><b style="color: black;">Website</b>: <a href="http://<? echo $_SERVER['HTTP_HOST'];?>"> <? echo $_SERVER['HTTP_HOST'];?></a> </div>
             </div> 
                        <?}else{?>
                            <h2 class="tit">Thông tin người bán</h2>
                            
       <div class="ttnd_box" style="border: 0px;width: 100%;">
        <div style="float: left;width: 80px;padding: 10px;text-align: center;">
        <img style="border: 0px;width: 80px;" src="<? echo show_img(str_replace('upload/images/avatar/','',$ava['Avatar']),$thumb='150x150','/upload/images/avatar/');?>" /><br />
        <b style="color: blue;"><? echo $ava['username'];?></b>
        </div>
        
        <div style="float: left;padding-left: 10px;padding-top: 10px;">
        <ul>
          <li>Tên người đăng: &nbsp;<b><? echo $ava['HoVaTen'];?> </b></li>
          <li>Điện thoại: &nbsp;<b><? echo $ava['DienThoai'];?></b></li>
          <li>Email: &nbsp;<b><? echo $ava['Email'];?></b></li>
          <? $salon=Modules::run('trangchu/getInfo','salon','NguoiTao',$ava['userid']);  
          $host=$_SERVER['HTTP_HOST'];
                   $name_site=preg_replace('/([a-z0-9A-Z_-]+)\.([a-z0-9A-Z_-]+)\.([a-z0-9A-Z_-]+)\.([a-z]+)/', '$2.$3.$4', $host);
          if($salon!==false){
            echo '<li>Website: &nbsp;<b style="color:blue"><a href="http://'.$salon['Domain'].'.'.$name_site.'" target="_blank">'.$salon['Domain'].'.'.$name_site.'</a></b></li>';
          }
          ?>
		  
                 <li>Địa chỉ: &nbsp;<b><? echo $ava['DiaChi'];?> </b></li>
          <li>Tỉnh thành: &nbsp;<b><? echo $ava['TinhThanh'];?></b></li>             
                    
                  </ul>
                  
        </div> 
        <div style="float: left;"><a rel="nofollow" id="btnSento" class="fancybox.ajax btnSento" style="width: 200px;margin-top: 10px;" href="/auto/send">Gửi tin cho người bán</a></div>
      </div> 
      <div class="viewmore" style="display: inline-block;width: 100%;margin-top: 10px;"><a rel="nofollow" href="/ban-xe/tin-rao-cung-nguoi-ban-uid<? echo $ava['userid'];?>">» Xem tất cả tin rao của người bán</a></div>
      
      <?}?>
                        </div> 

                    </div>
                    
                    <div class="contact">
                        <div class="contactinfo" style="width: 100%;">
                            <h2 class="tit">Bình luận</h2>
                            <fb:comments href="<?php

echo "http://" . $_SERVER['HTTP_HOST']  . $_SERVER['REQUEST_URI'];

?>" width="657"></fb:comments>
                        </div> 

                    </div>
                    
                </div>  
                <div class="tags" style="margin-top: 20px;">
                    <a rel="nofollow" href="javascript:void(0)" class="first">Tags</a>
                    <a href="/ban-xe-<? echo strtolower(stripUnicode($HangXe['TieuDe'])).'-'.strtolower(stripUnicode($DoiXe['TieuDe'])).'-aid'.$xemtinban['IDMaTin'].'.html'?>" title="Bán xe  <? echo $HangXe['TieuDe'];?> <? echo $DoiXe['TieuDe'];?> <? echo $xemtinban['PhanHang'];?> <? echo $xemtinban['NamSX'];?>">Bán xe  <? echo $HangXe['TieuDe'];?> <? echo $DoiXe['TieuDe'];?> <? echo $xemtinban['PhanHang'];?> <? echo $xemtinban['NamSX'];?></a>
                    <a href="/ban-xe-<? echo strtolower(stripUnicode($HangXe['TieuDe'])).'-'.strtolower(stripUnicode($DoiXe['TieuDe'])).'-doi-'.$xemtinban['NamSX'].'-aid'.$xemtinban['IDMaTin'].'.html'?>" title="Bán xe  <? echo $HangXe['TieuDe'];?> <? echo $DoiXe['TieuDe'];?> đời <? echo $xemtinban['NamSX'];?>">Bán xe  <? echo $HangXe['TieuDe'];?> <? echo $DoiXe['TieuDe'];?> đời <? echo $xemtinban['NamSX'];?></a>
                    <a href="/ban-xe-<? echo strtolower(stripUnicode($HangXe['TieuDe'])).'-'.strtolower(stripUnicode($DoiXe['TieuDe'])).'-mau-'.strtolower(stripUnicode($xemtinban['NgoaiThat'])).'-aid'.$xemtinban['IDMaTin'].'.html'?>" title="Bán xe màu <? echo $HangXe['TieuDe'];?> <? echo $DoiXe['TieuDe'];?> <? echo $xemtinban['NgoaiThat'];?>">Bán xe  <? echo $HangXe['TieuDe'];?> <? echo $DoiXe['TieuDe'];?> màu <? echo $xemtinban['NgoaiThat'];?></a>
                    
                    <a href="/ban-xe-<? echo strtolower(stripUnicode($HangXe['TieuDe'])).'-'.strtolower(stripUnicode($DoiXe['TieuDe'])).'-'.strtolower(stripUnicode($xemtinban['HopSo'])).'-aid'.$xemtinban['IDMaTin'].'.html'?>" title="Bán xe <? echo $HangXe['TieuDe'];?> <? echo $DoiXe['TieuDe'];?> <? echo $xemtinban['HopSo'];?>">Bán xe  <? echo $HangXe['TieuDe'];?> <? echo $DoiXe['TieuDe'];?> <? echo $xemtinban['HopSo'];?></a>
                    <a href="/ban-xe-<? echo strtolower(stripUnicode($HangXe['TieuDe'])).'-'.strtolower(stripUnicode($DoiXe['TieuDe'])).'-'.strtolower(stripUnicode($xemtinban['XuatXu'])).'-aid'.$xemtinban['IDMaTin'].'.html'?>" title="Bán xe <? echo $HangXe['TieuDe'];?> <? echo $DoiXe['TieuDe'];?> <? echo $xemtinban['XuatXu'];?>">Bán xe  <? echo $HangXe['TieuDe'];?> <? echo $DoiXe['TieuDe'];?> <? echo $xemtinban['XuatXu'];?></a>
                    <a href="/ban-xe-<? echo strtolower(stripUnicode($HangXe['TieuDe'])).'-'.strtolower(stripUnicode($DoiXe['TieuDe'])).'-'.strtolower(stripUnicode($ava['TinhThanh'])).'-aid'.$xemtinban['IDMaTin'].'.html'?>" title="Bán xe <? echo $HangXe['TieuDe'];?> <? echo $DoiXe['TieuDe'];?> <? echo $ava['TinhThanh'];?>">Bán xe  <? echo $HangXe['TieuDe'];?> <? echo $DoiXe['TieuDe'];?> <? echo $ava['TinhThanh'];?></a>
                    <a href="/ban-xe-<? echo strtolower(stripUnicode($HangXe['TieuDe'])).'-'.strtolower(stripUnicode($DoiXe['TieuDe']));?>" title="Bán xe <? echo $HangXe['TieuDe'];?> <?  echo $DoiXe['TieuDe'];?>">Bán xe <? echo $HangXe['TieuDe'];?> <?  echo $DoiXe['TieuDe'];?></a>                    
                    <a href="/ban-xe-<? echo strtolower(stripUnicode($HangXe['TieuDe']));?>" title="Bán xe <? echo $HangXe['TieuDe'];?>">Bán xe <? echo $HangXe['TieuDe'];?></a>
                    
                </div>
<script>

    $(document).ready(function () {
         $("body").on("click", "#report", function () {
            $('#report').fancybox({
                fitToView: false
            });
        }); 
        $("body").on("click", "#btnSento", function () {
            $('#btnSento').fancybox({
                fitToView: false
            });
        }); 

        $('.sell-car-griditem').syncHeight('.sell-car-griditem');
        $('.fixheightinfo').syncHeight('.fixheightinfo');
        $('.sell-car-griditem .tit').syncHeight('.sell-car-griditem .tit');      
        $(".sell-car-griditem").mousehover();
    });

</script>
 
