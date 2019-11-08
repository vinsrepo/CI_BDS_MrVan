<div class="wr_page" style="padding-top: 55px">
       <!-- Maps -->
    <div id="ContentPlaceHolder1_ProductDetail1_divmaps" class="divmaps" style="margin: 10px 0 0; float: left; width: 100%;">
        <div>
            <input type="hidden" name="" id="hddLatitude" value="<? echo $xemtinban['SoCua'];?>" />
            <input type="hidden" name="" id="hddLongtitude" value="<? echo $xemtinban['SoChoNgoi'];?>" />
            <input type="hidden" name="" id="txtPositionX" value="<? echo $xemtinban['SoCua'];?>" />
            <input type="hidden" name="" id="txtPositionY" value="<? echo $xemtinban['SoChoNgoi'];?>" />
            <input type="hidden" name="" id="hddDiadiem" value="<? echo $xemtinban['DongXe'];?>"/>
            <script src="/style/js/GoogleMapControl.min.js?v=20151126"></script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAncygDLD4qxYy5Uw6vPdz_KH_qOCJDL8U"></script>
            <div id="mapinfo">
                <div id="map_canvas"></div>
            </div>

        </div>
    </div>        
    <div class="index-page" style="width: 1280px;padding-top: 0px;margin: 0 auto;clear:left;float: unset;">
        <div class="content">          
            <!-- Content Left -->
            <div class="content-left">

                

<script src="/style/galleria/galleria-1.5.7.js"></script>

<!-- <script src="/style/themes/galleria.flickr.min.js"></script> -->
<script src="/style/galleria/themes/classic/galleria.classic.js"></script>
<script src="/style/js/jwplayer.js"></script>
<link href="/style/css/print1.css" rel="stylesheet" />
<script src="/style/js/ProductDetail.min.js?v=20151126" type="text/javascript"></script>
<!-- <script src="/style/js/GoogleMapControl.min.js?v=20140820" type="text/javascript"></script> -->
<script type="text/javascript">
    productId = '<? echo $xemtinban['IDMaTin'];?>';

    $(document).ready(function () {
        var img = new Image();
        img.src = 'http://sannhadat.vip/Handler/Statistic.ashx?id=' + productId;
    });
    $("a[rel^='prettyPhoto']").prettyPhoto({
        animation_speed: 'normal',
        theme: 'light_square',
        slideshow: 5000,
        autoplay_slideshow: false,
        social_tools: '',
        //gallery_markup: '',
        deeplinking: false,
        allow_resize: false
    });
</script> 
<?php
    $slide=explode('|',$xemtinban['AlbumAnh']);
?>
<div class="product-detail">
    <h1>
        <? echo $xemtinban['TieuDe'];?>
    </h1>
    <div id="ContentPlaceHolder1_ProductDetail1_divlocation" class="pd-location">
        <div class="row">
            <div class="col-md-9">
                <?
                $arr_areas=array('PhanHang','XuatXu','NamSX','DoiXe');
                $stt1=0;
                $htmlarea='';
                foreach($arr_areas as $key=>$area){
                    if($xemtinban[$area]!=''){$stt1++;
                  
                    $info_cha=Modules::run('trangchu/getList','tinhthanh',1,0,'Name asc','ID',array('Name'=>$xemtinban[$arr_areas[$key+1]],'Loai'=>$arr_areas[$key+1]));
                        if(!$info_cha){
                            $info_cha[0]['Note']='';
                        }  
                  
                    if($area=='PhanHang'){
                        $city=Modules::run('trangchu/getList','tinhthanh',1,0,'Name asc','ID',array('Name'=>$xemtinban['DoiXe'],'Loai'=>'DoiXe'));
                        $last=Modules::run('trangchu/getList','tinhthanh',1,0,'Name asc','ID',array('Name'=>$xemtinban['NamSX'],'Loai'=>'NamSX','Parent'=>$city[0]['Note']));
                        $info_cha=$last;
                    }
                     
                    $info_reg=Modules::run('trangchu/getList','tinhthanh',1,0,'Name asc','ID',array('Name'=>$xemtinban[$area],'Loai'=>$area,'Parent'=>$info_cha[0]['Note']));; 
                    
                    // $link='/'.stripUnicode($HangXe['TieuDe']).'-'.$info_reg[0]['Link']; //Link cu
                    $link='/'.stripUnicode($HangXe['TieuDe']);
                    if($stt1==1){
                        $htmlarea.= '<a href="'.$link.'">'.$HangXe['TieuDe'].' tại '.$info_reg[0]['Perfix'].' '.$xemtinban[$area].'</a>';
                    }else{
                        $htmlarea.= ' - <a href="'.$link.'">'.$info_reg[0]['Perfix'].' '.$xemtinban[$area].'</a>';
                    } 
                    if(!isset($setlink)){
                        $setlink=$link;
                    }
                  }
                }
                ?>  
                    <div class="row">
                        <div class="col-md-12">
                            <span class=>Khu vực:</span>  <? echo $htmlarea;?>
                        </div>
                    </div>                   
                    <!-- Image -->
                    <div class="row">
                        <div class="col-md-12 tab_media"> 
                            <ul class="nav nav-tabs" id="tab_media" role="tablist" style="font-size: 15px">
                                <li class="nav-item">
                                    <input type="hidden" name="" id="CountImage" value="<?  $total_img=count($slide); echo $total_img-1;?>" />
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#img_bds" role="tab" aria-controls="img_bds"
                                  aria-selected="true">Hình ảnh<small>(<?  $total_img=count($slide); echo $total_img;?>)</small></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#video_bds" role="tab" aria-controls="video_bds"
                                  aria-selected="false">Video mô tả</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="tab_media_Content" style="font-size: 14px">
                                <div class="tab-pane fade show active" id="img_bds" role="tabpanel" aria-labelledby="img_bds-tab">
                                    <ul id="myGallery" style="margin: 0 !important; width: auto ">
                                        <?php 
                                        foreach($slide as $img){
                                            if($img!=''&&$img!='undefined'&&$img!='noimage.gif'){ 
                                                echo '
                                                 <li>
                                                    <a href="'.show_img($img).'" rel="'.show_img($img).'"><img src="'.show_img($img,$thumb='170x115').'" style="max-width: 932px; max-height: 380px;" alt="'.$xemtinban['DongXe'].'" title="'.$xemtinban['TieuDe'].'" /></a>
                                                </li>';
                                            }                                               
                                        }
                                        ?>    
                                    </ul>
                                    <div id="imgPrint"></div>
                                </div>
                                <div class="tab-pane fade" id="video_bds" role="tabpanel" aria-labelledby="video_bds-tab">
                                    <?php 
                                        if(!$xemtinban['emb_vid']) :
                                    ?>
                                        <div class="alert alert-warning alert-dismissible fade show">
                                            Không có video mô tả!
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        </div>
                                    <?php else : ?>
                                        <div class="col-md-9 video_bds" style="max-width: 900px;">
                                            <?php echo preg_replace("/\s*[a-zA-Z\/\/:\.]*youtube.com\/watch\?v=([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i","<iframe width=\"900\" height=\"315\" src=\"//www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>",$xemtinban['emb_vid']); ?>
                                        </div>                                            
                                    <?php endif ?>
                                </div>
                            </div>                             
                            <script>
                                $(document).ready(function() {
                                    $('#myGallery').galleria({
                                        transition: 'fadeslide',
                                        // width:800,
                                        height: 450,
                                    });
                                });
                                $('.video_bds iframe').addClass('iframe_bds');
                            </script>
                        </div>
                    </div>              
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="text_title">Thông tin chính</h3>
                        </div>
                    </div>
                    <div class="row">    
                        <div class="col-md-6 r_info" style="border-right: 1px solid;">
                            <p><span class="txt_info">Diện tích:</span><span><? echo $xemtinban['NgoaiThat'];?>m²</span></p>
                            <p><span class="txt_info">Số phòng:</span><span><? echo $xemtinban['HeThongNapNhienLieu'];?></span></p>
                            <p><span class="txt_info">Số phòng tắm:</span><span><? echo $xemtinban['MucTieuThu'];?></span></p>
                            <p><span class="txt_info">Đường trước nhà:</span><span><? if($xemtinban['DanDong']!=''){echo $xemtinban['DanDong'].'m';} ?></span></p>
                        </div>
                        <div class="col-md-6 r_info">
                            <p><span class="txt_info">Quận/Huyện:</span><span><? echo $xemtinban['NamSX'];?></span></p>
                            <p><span class="txt_info">Tỉnh/Thành:</span><span><? echo $xemtinban['DoiXe'];?></span></p>
                            <p><span class="txt_info">Hướng:</span><span><? echo $xemtinban['NoiThat'];?></span></p>
                            <p><span class="txt_info">Giá:</span><span><? echo ($xemtinban['GiaTien']==0?'':$xemtinban['GiaTien']);?> <? echo $xemtinban['SoKM'];?></span></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="text_title">Thông tin mô tả</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 r_info">                            
                            <div class="pd-desc-content">
                                <? echo nl2br($xemtinban['ThongTinMota']);?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="r_date">Ngày đăng tin: <span style="color: #aaa;"><? echo date('d/m/Y',strtotime($xemtinban['NgayDang']));?></span></p>
                        </div>
                    </div>
            </div>
            <div class="col-md-3">
                <div class="menu-user">
                    <h3 class="text_title">Thông tin liên hệ</h3>
                    <div class="mu-userinfo">
                        <div class="top_card"></div>
                            <div class="avatar">
                                <a href="/thanh-vien/doi-avatar.html"><img src="<? echo show_img(str_replace('upload/images/avatar/','',$ava['Avatar']),$thumb='400x250','/upload/images/avatar/');?>" /></a>
                            </div>
                            <br />
                            <div class="budget">
                            <div style="font-weight: bold;"><? echo $ava['username'];?></div>
                            <i><? echo $ava['DienThoai'];?></i>
                            <br />                      
                        </div>
                    </div>    
                </div>
            </div>
        </div>          
    </div>
    <div class="pd-share">
        <!-- <a href="javascript:printDetail();" class="print" rel="nofollow"></a>
        <a id="saveNews" rel="nofollow" onclick="productSaved(this,'<? //echo $xemtinban['IDMaTin'];?>');" class="save"></a> -->
        <![if !IE]>  
        <!-- <div class="share">
            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-526b16ce15374888"></script>
            <div class="addthis_native_toolbox"></div>
        </div> -->
        <![endif]> 
    </div>
</div>


<div id="ContentPlaceHolder1_ProductArea1_divArea" class="pd-other">
    <div class="pd-other-title">
        <h3>Bất động sản tương tự</h3>
    </div>
    <div class="pd-other-content">
        <?
            $dulieu=$xecungloai;
            include 'div_grid.php';
        ?>                          
        <div class="clear"></div>
        <div class="visitall">
            <a href="<? echo $setlink;?>" title="Xem tất cả">Xem tất cả</a>
        </div>
    </div>
</div>
<!-- <div id="ContentPlaceHolder1_ProductArea1_divPrice" class="pd-other">
    <div class="pd-unit-title">
        <h3>Tin rao cùng khoảng giá</h3>
        </div>
        <div class="pd-other-content">
            <? //$dulieu=$xecungkhoanggia;
        //include 'div_grid.php';
        ?>
            
        <div class="clear"></div>
        <div class="visitall">
            <a href="<? //echo $setlink;?>?price=<? //echo $khoanggia[0].(isset($khoanggia[1])?'-'.$khoanggia[1]:'');?>&type=<? //echo $xemtinban['SoKM'];?>" title="Xem tất cả">Xem tất cả</a>
        </div>
    </div>
</div> --> 
            <div class="clear"></div>
            </div>
            <!-- Content Right -->
            <div class="content-right">
                <? //include 'div_search.php';?> 
                <? //include 'current_category.php';?>
                <? //include 'tukhoanoibat.php';?> 
                <!-- Utility -->
                <? //include  APPPATH.'modules/dangtin/views/div_tool.php';?>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
            <div class="clear"></div>
        </div>