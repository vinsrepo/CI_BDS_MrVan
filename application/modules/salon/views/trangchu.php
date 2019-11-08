<link href="/style/css/select2.min.css" rel="stylesheet" />
<script src="/style/js/select2.full.min.js"></script>
<script src="/style/js/PostNews.min.js?v=120151126" type="text/javascript"></script>
<style>
.pjs-content .select2{
    margin-top: 4px!important;
    margin-left: 5px!important;
    width: 161px!important;
}
</style> 
<div class="wr_page">          
    <div class="index-page" style="width: 1000px;padding-top: 90px;margin: 0 auto;clear:left;float: unset;"> 
        <div class="content">         
            <!-- Content Left -->
            <div class="content-left" style="width: 1000px">                 
                <!-- Project Detail -->
                
                <div class="project-detail">
                    <div class="prj-content">
                        <div class="pc-img">
                            <img title="<? echo $salon_info['TenSalon'];?>" src="<? echo get_first_img($salon_info['LoGo'],$thumb='624x476');?>" alt="<? echo $salon_info['TenSalon'];?>" />
                        </div>
                        <div class="pc-text">
                            <h1>
                                <? echo $salon_info['TenSalon'];?>
                            </h1>
                            <div class="pc-text-address">
                                <span>Địa chỉ: </span>
                                <p>
                                    <? echo $salon_info['DiaChi'];?>    
                                </p>
                            </div>
                            <div class="pc-text-address">
                                <span>Điện thoại: </span>
                                <p>
                                    <? echo $salon_info['DienThoai'];?>
                                </p>
                            </div>
                            <div class="pc-text-address">
                                <span>Website: </span>
                                <p>
                                    <a href='<? echo $salon_info['Website'];?>' target='_blank' rel='nofollow' style='color:#555555;'><? echo $salon_info['Website'];?></a>
                                </p>
                            </div>
                            <div class="pc-text-address">
                                <span>Email: </span>
                                <p>
                                    <? echo $salon_info['Email'];?>      
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="prj-tab">       
                        <div class="prj-tab-active">Bản đồ</div>
                    </div>  
                    <div class="prj-map">
                        <div id="ContentPlaceHolder1_ProjectDetail1_divmaps" class="divmaps a1">   
                            <div>
                                <input type="hidden" name="hddLatitude" id="hddLatitude" value="<? echo $salon_info['txtPositionX'];?>" />
                                <input type="hidden" name="hddLongtitude" id="hddLongtitude" value="<? echo $salon_info['txtPositionY'];?>" />
                                <input type="hidden" name="txtPositionX" id="txtPositionX" value="<? echo $salon_info['txtPositionX'];?>" />
                                <input type="hidden" name="txtPositionY" id="txtPositionY" value="<? echo $salon_info['txtPositionY'];?>" />
                                <input type="hidden" name="hddDiadiem" id="hddDiadiem" value="<? echo $salon_info['DiaChi'];?>" />

                                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAncygDLD4qxYy5Uw6vPdz_KH_qOCJDL8U"></script>
                                <script src="/style/js/GoogleMapControl.min.js?v=2015123112" type="text/javascript"></script>
                                <div id="mapinfo">
                                    <div id="map_canvas"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <h3 class="tongquan">Tổng quan</h3>
                    <div class="prj-over" style="width: 640px;text-align: justify;">
                         <? echo html_entity_decode($salon_info['GioiThieu']);?>
                    </div>
                    <style>
                    .prj-over img{
                        max-width: 630px!important;
                    }
                    </style>
                    
                    <div id="ContentPlaceHolder1_ProjectDetail1_EnterpriseInfo1_ProjectEnterprise">
                        <div class="prj-tab">
                            <ul id="ulOver">
                                <li class="prj-tab-normal prj-tab-active" value="0">
                                    <span>Chủ đầu tư</span>
                                </li>
                            </ul>
                        </div>
                        <div class="prj-enter">
                            <div class="prj-enter-img">
                                <img id="ContentPlaceHolder1_ProjectDetail1_EnterpriseInfo1_imgAvatar" src="<? echo img_thumb_blog($salon_info['AlbumAnh'],'250x200');?>"  />
                            </div>
                            <div class="prj-enter-text">
                                <? echo strip_tags($salon_info['AlbumAnh'], '<div>,<p>');?>
                            </div>
                        </div>   
                    </div>    
                </div>            
                <div id="ContentPlaceHolder1_ProjectOther1_divProjectOther">
                    <div class="project-other">
                        <div class="prj-other-title">
                            <h3>Dự án cùng khu vực</h3>
                        </div>
                        <div class="prj-other-content">
                            <ul>
                                <? $stt=0;
                                $tinlienquan=Modules::run('trangchu/getList','salon',5,0,'NgayTao desc ','IDSalon',array('TrangThai'=>1,'TinhThanh'=>$salon_info['TinhThanh'],'QuanHuyen'=>$salon_info['QuanHuyen']));
                                foreach($tinlienquan as $news){$stt++;
                                    $link='/'.stripUnicode($news['TenSalon']).'-pj'.$news['IDSalon'].'.html'; 
                                ?>
                                <li>
                                    <div class="prj-other-item">
                                        <div class="prj-other-img">
                                            <a href="<? echo $link;?>" title="<? echo $news['TenSalon'];?>">
                                                <img src="<? echo get_first_img($news['LoGo'],'170x115');?>" alt="<? echo $news['TenSalon'];?>" />
                                            </a>
                                        </div>
                                        <div class="prj-other-text">
                                            <h2><a href="<? echo $link;?>" title="<? echo $news['TenSalon'];?>"><? echo $news['TenSalon'];?></a></h2>
                                            <div class="pc-text-address">
                                                <span>Địa chỉ: </span>
                                                <p><? echo $news['DiaChi'];?></p>
                                            </div>
                                            <div class="pc-text-address">
                                                <span>Điện thoại: </span>
                                                <p><? echo $news['DienThoai'];?></p>
                                            </div>
                                            <div class="pc-text-address">
                                                <span>Website: </span>
                                                <p><? echo $news['Website'];?></p>
                                            </div>
                                            <div class="pc-text-address">
                                                <span>Email: </span>
                                                <p><? echo $news['Email'];?></p>
                                            </div>
                                        </div>
                                    </div>
                                </li>                    
                                <?
                                }
                                ?>                
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
                </div>           
            <div class="clear"></div>
        </div> 
    </div>
    <div class="clear"></div>
</div>
     