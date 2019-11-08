
<link rel="stylesheet" href="/style/mobile/css/idangerous.swiper.css">
<?php
    $slide=explode('|',$xemtinban['AlbumAnh']); 
?>
<script type="text/javascript">
    productId = '<? echo $xemtinban['IDMaTin'];?>';

    $(document).ready(function () {
        var img = new Image();
        img.src = 'http://sannhadat.vip/Handler/Statistic.ashx?id=' + productId;
    });

</script>
<div class="div_search default_padding">
   <!--  <a href="javascript:void(0);" rel="nofollow" onclick="productSaved(this,'<? //echo $xemtinban['IDMaTin'];?>');" id="<? //echo $xemtinban['IDMaTin'];?>">
        <div class="save-detail">
            <img src="/style/mobile/images/icon-detail-save-listing.png" />
            <span>Lưu tin</span>
        </div>
    </a> -->
    <a href="javascript:ShareListing();">
        <div class="share">
            <i class="fa fa-share-square"></i>
            <span>Chia sẻ</span>
        </div>
    </a>

    <div class="clear"></div>
</div>
<div class="popupshare">
    <ul>
        <li>
            <span class="text">Chia sẻ</span>
            <a href="javascript:CloseShareListing();" class="closemenu">
                <img src="/style/mobile/images/closesearch.png" /></a>
        </li>
        <li id="facebook">

            <a rel="nofollow" data-role="none" href="http://www.facebook.com/sharer/sharer.php?u=<?php echo "http://" . $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>">
                <img width="20px" class="icon" src="/style/mobile/images/iconfb.png">
                <span class="text">Facebook</span>
            </a>
        </li>
        <li id="zalo">
            <div class="zalo-share-button" data-href="<?php echo "http://".$_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI']; ?>" data-oaid="579745863508352884" data-layout="2" data-color="blue" data-customize=false></div>
            <!-- <div class="zalo-share-button" data-href="" data-oaid="2186577276567055037" data-layout="2" data-color="blue" data-customize=false></div> -->
            &nbsp;&nbsp;&nbsp;<span class="text">Zalo</span>
        </li>
        <li id="email">
            <a rel="nofollow" data-role="none" href="mailto:?subject=Bat dong san hay tren <?php echo "http://" . $_SERVER['HTTP_HOST'];?>&body=<?php echo "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; ?>">
                <img width="20px" class="icon" src="/style/mobile/images/icongmail.png">
                <span class="text">Gmail</span>
            </a>
        </li>
    </ul>
</div>
<div class="content2">
    <div class="div_detail">
        
        <div class="pdetail">
            <div class="ptitle">
                <h1>
                    <? echo $xemtinban['TieuDe'];?></h1>
            </div>
            <div class="btn btn-light" style="color: #6f42c1">
                <span>Giá :</span>
                <? echo ($xemtinban['GiaTien']==0?'':$xemtinban['GiaTien']);?> <? echo $xemtinban['SoKM'];?>
            </div>
            <div class="btn btn-light" style="color: #20c997">
                <span>Diện tích:</span>
                <? echo $xemtinban['NgoaiThat'];?> m²
            </div>           
            <div id="MainContent_ProductDetailMobile_myGallery" class="device">
                <a class="arrow-left" href="#" rel="nofollow"></a>
                <a class="arrow-right" href="#" rel="nofollow"></a>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php 
                            foreach($slide as $img){
                                if($img!=''&&$img!='undefined'&&$img!='noimage.gif'){ 
                                echo ' 
                                <div class="swiper-slide">
                                    <div class="pro-img" style="background-image: url(\''.show_img($img,$thumb='624x476').'\')"></div>
                                    <img src="'.show_img($img,$thumb='624x476').'" alt="'.$xemtinban['TieuDe'].'" style="display: none" /></li>
                                </div>
                                ';                               
                                }
                            }
                            ?>     
                    </div>
                </div>
                <div style="clear: both;"></div>
                <div class="wr_number"><span id="index_slide">1</span><span style="display: none"><?  $total_img=count($slide)-1; echo $total_img;?></span></div>
            </div>
            <script src="/style/mobile/js/idangerous.swiper-2.1.min.js"></script>
            <script>
                var mySwiper = new Swiper('.swiper-container', {
                    loop: true,
                    grabCursor: true,
                    paginationClickable: true,
                    onSlideChangeEnd: function (swiper) {
                        $('#index_slide').text(mySwiper.activeLoopIndex + 1)
                    }
                })
                $('.arrow-left').on('click', function (e) {
                    e.preventDefault()
                    mySwiper.swipePrev()
                })
                $('.arrow-right').on('click', function (e) {
                    e.preventDefault()
                    mySwiper.swipeNext()
                })
            </script>
            <hr>
            
            <div class="pdes">
                <div class="alert alert-info">
                    <? echo nl2br($xemtinban['ThongTinMota']);?>
                </div>
            </div>
            
            <!-- <div id="viewMap" class="alert alert-success view-map">
                <a href="javascript:;" onclick="LoadMap();" rel="nofollow">
                    <span class="img-v-m">
                        <i class="icon-v-m"></i>
                    </span>
                    <span class="btn btn-light text-muted text-vm">Xem bản đồ</span>
                </a>

                <a href="javascript:void(0);" onclick="LoadMap();" rel="nofollow" class="close-m">
                    <img src="/style/mobile/images/close.png" />
                </a>
            </div> -->
            <div class="clear"></div>
            <ul class="nav nav-tabs" id="Tab_cont" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="map_tab" data-toggle="tab" href="#l_map" role="tab" aria-controls="profile" aria-selected="false">Bản đồ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="home-tab" data-toggle="tab" href="#t_desc" role="tab" aria-controls="home" aria-selected="true">Chi tiết</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="l_map" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="mb-2">
                        <div id="ContentPlaceHolder1_ProductDetail1_divmaps" class="divmaps" style="margin: 10px 0 0; width: 100%;">
                            <div>
                                <input type="hidden" name="" id="hddLatitude" value="<? echo $xemtinban['SoCua'];?>" />
                                <input type="hidden" name="" id="hddLongtitude" value="<? echo $xemtinban['SoChoNgoi'];?>" />
                                <input type="hidden" name="" id="txtPositionX" value="<? echo $xemtinban['SoCua'];?>" />
                                <input type="hidden" name="" id="txtPositionY" value="<? echo $xemtinban['SoChoNgoi'];?>" />
                                <input type="hidden" name="" id="hddDiadiem" value="<? echo $xemtinban['DongXe'];?>"/>
                                <script src="/style/js/GoogleMapControl.min.js?v=20151126"></script>
                                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAncygDLD4qxYy5Uw6vPdz_KH_qOCJDL8U"></script>
                                <div id="mapinfo">
                                    <div id="map_canvas" style="height: 380px;"></div>
                                </div>

                            </div>
                        </div>
                    </div>                   
                </div>
                <div class="tab-pane fade" id="t_desc" role="tabpanel" aria-labelledby="home-tab">
                    <div class="alert alert-primary">
                        <table id="tbl1">
                            <tr>
                                <td class="td_info">Ngày đăng tin <span class="paddingRight">:</span></td>
                                <td>
                                    <? echo date('d/m/Y',strtotime($xemtinban['NgayDang']));?>
                                </td>
                            </tr>  
                        
                            <tr id="MainContent_ProductDetailMobile_trProject">
                                <td class="td_info">Loại tin rao <span class="paddingRight">:</span></td>
                                <td>
                                    <? echo $HangXe['TieuDe'];?>
                                </td>
                            </tr>

                            <tr id="MainContent_ProductDetailMobile_trAddress">
                                <td class="td_info">Hướng nhà <span class="paddingRight">:</span></td>
                                <td>
                                    <? echo $xemtinban['NoiThat'];?> 
                                </td>
                            </tr>
                            <tr>
                                <td class="td_info"> Đường vào  <span class="paddingRight">:</span></td>
                                <td>
                                    <? if($xemtinban['DanDong']!=''){echo $xemtinban['DanDong'].' m';} ?> 
                                </td>
                            </tr>
                            <tr>
                                <td class="td_info"> Mặt tiền  <span class="paddingRight">:</span></td>
                                <td>
                                    <? if($xemtinban['HopSo']!=''){echo $xemtinban['HopSo'].' m';} ?>
                                </td>
                            </tr>
                            
                            <tr>
                                <td class="td_info"> Số phòng  <span class="paddingRight">:</span></td>
                                <td><? echo $xemtinban['HeThongNapNhienLieu'];?>
                                    </td>
                            </tr>  
                            <tr>
                                <td class="td_info">Số tầng <span class="paddingRight">:</span></td>
                                <td>
                                    <? echo $xemtinban['NhienLieu'];?>
                                </td>
                            </tr>
                            <tr>
                                <td class="td_info">Số toilet 
                                    <span class="paddingRight">:</span>
                                </td>
                                <td>
                                    <? echo $xemtinban['MucTieuThu'];?>
                                </td>
                            </tr>
                            <tr>
                                <td class="td_info">Địa chỉ 
                                    <span class="paddingRight">:</span>
                                </td>
                                <td>
                                    <? echo $xemtinban['DongXe'];?>
                                </td>
                            </tr>
                        </table>
                    </div>    
                </div>
            </div>           
            <div class="alert alert-warning pcontact">
                <div class="row">
                    <div class="h_cus_1">
                        <img style="border: 0px;width: 80px; border-radius: 50%;" src="<?
                        if($xemtinban['contact']!=''){
                        $ava=array_merge($ava,json_decode($xemtinban['contact'],true)); 
                        } 
                
                        echo show_img(str_replace('upload/images/avatar/','',$ava['Avatar']),$thumb='150x150','/upload/images/avatar/');?>" /> 
                    </div>
	                                      
                    <div class="h_cus_2">
                        <div>
                            <b>Liên hệ:</b>                           
                        </div>
                        <div class="h_cus">
                            <? echo $ava['username'];?>                           
                        </div>
                        <div class="h_cus">
                            <a rel="nofollow" href="tel:<? echo $ava['DienThoai'];?>"><? echo $ava['DienThoai'];?></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="alert alert-secondary otherProducts">               
                <div class="tit">
                    <h2 class="text-success content-tit">Tin rao tương tự</h2>
                </div>
                <ul>
                    <?
                    $dulieu=$xecungloai; 
                    ?>
                    <?php   
                    foreach($dulieu as $tintuc){ 
                    ?>
                    <? 
                        $c_HangXe=Modules::run('baiviet/getDanhMucCha',$tintuc['HangXe']);
                        $link='/'.stripUnicode($c_HangXe['TieuDe']).'-'.stripUnicode($tintuc['NamSX']).'-'.stripUnicode($tintuc['DoiXe']).'/'.stripUnicode($tintuc['TieuDe']).'-pr'.$tintuc['IDMaTin'].'.html';
                        ?>
    	 				<li><a href='<? echo $link;?>' title='<? echo $tintuc['TieuDe'];?>'>
                    <? echo $tintuc['TieuDe'];?><i class="text-danger" style="font-size: 12px;"> (<? echo date('d/m/Y',strtotime($tintuc['NgayDang']));?>)</i></a></li>
                    <?}?> 
                </ul>

            </div>
        </div>
    </div>
</div>
<div class="clear"></div>
<script src="/style/mobile/js/Gallery.js"></script>
<input type="hidden" name="ctl00$MainContent$ProductDetailMobile$hdLat" id="hdLat" value="<? echo $xemtinban['SoCua'];?>"" />
<input type="hidden" name="ctl00$MainContent$ProductDetailMobile$hdLong" id="hdLong" value="<? echo $xemtinban['SoChoNgoi'];?>" />
<input type="hidden" name="ctl00$MainContent$ProductDetailMobile$hdAddress" id="hdAddress" value="<? echo $xemtinban['DongXe'];?>" />

<script type="text/javascript">
    $(document).ready(function () {
        $('#map_canvas').css('display','block');
        checkSaveProduct(<? echo $xemtinban['IDMaTin'];?>);
        if ($(".divmaps").length) {
            console.log($("#hddLatitude").val() + ' ' + $("#hddLongtitude").val() + ' ' + $("#hddDiadiem").val());
            $(".divmaps").show();
            initializeAddress($("#hddLatitude").val(), $("#hddLongtitude").val(), $("#hddDiadiem").val());
        }
        // $('#map_tab').click(function(e){
        //     e.preventDefault();
        //     $('#t_desc').removeClass('active show');
        //     $('#l_map').addClass('active show');           
        //     $('#l_map #map_canvas').show();           
        // });
    });
</script>
