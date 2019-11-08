<div class="project-detail">
        

<div class="tit">
    <div class="content-tit">Dự án</div>
</div>
<div class="prj-content">
    <div class="pc-img">
        <img id="MainContent_ProjectDetail1_imgAvatar" title="<? echo $salon_info['TenSalon'];?>" src="<? echo get_first_img($salon_info['LoGo'],'624x476');?>" alt="<? echo $salon_info['TenSalon'];?>" />
    </div>
    <div class="pc-text">
        <h1>
            <? echo $salon_info['TenSalon'];?></h1>
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
                <? echo $salon_info['Website'];?>
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
<div class="prj-tab hidden" ><span>Bản đồ</span></div>
<div class="prj-map">
    <div id="MainContent_ProjectDetail1_divmaps" class="divmaps a1">
        <div>
            <input type="hidden" name="hddLatitude" id="hddLatitude" value="<? echo $salon_info['txtPositionX'];?>" />
            <input type="hidden" name="hddLongtitude" id="hddLongtitude" value="<? echo $salon_info['txtPositionY'];?>" />
            <input type="hidden" name="txtPositionX" id="txtPositionX" value="<? echo $salon_info['txtPositionX'];?>" />
            <input type="hidden" name="txtPositionY" id="txtPositionY" value="<? echo $salon_info['txtPositionY'];?>" />
            <input type="hidden" name="hddDiadiem" id="hddDiadiem" value="<? echo $salon_info['DiaChi'];?>" />
            
<!--
<script type="text/javascript" src="http://maps.google.com/maps/api/js"></script>
-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA245hzjShy4wzQa9EM4dyjBYDjAR5XaQA"></script>
<script src="/style/js/GoogleMapControl.js?v=20140820" type="text/javascript"></script>

<div id="mapinfo">
    <div id="map_canvas"></div>
</div>

        </div>
    </div>
</div>
<div class="clear"></div>
<div class="prj-tab"><span>Tổng quan</span></div>
<div class="prj-over">
    <? echo html_entity_decode($salon_info['GioiThieu']);?>
</div>


        <div id="MainContent_ProjectOther1_divProjectOther">
    <div class="project-other project-result">
        <div class="prj-tab"><span>Dự án cùng khu vực</span></div>
        <div class="prj-other-content">
            <? 
$salon_data=Modules::run('trangchu/getList','salon',5,0,'NgayTao desc ','IDSalon',array('TrangThai'=>1,'TinhThanh'=>$salon_info['TinhThanh'],'QuanHuyen'=>$salon_info['QuanHuyen']));
include 'm_grid.php';
?>
                  
               
        </div>
    </div>
</div>


    </div>
