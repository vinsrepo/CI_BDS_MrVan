<div id="ContentPlaceHolder1_ProductDetail1_divmaps" class="divmaps" style="margin: 10px 0 0; float: left; width: 100%;">
    <div>
        <input type="hidden" name="" id="hddLatitude" value="<? echo  $data['toado_x'];?>" />
        <input type="hidden" name="" id="hddLongtitude" value="<? echo $data['toado_y'];?>" />
        <input type="hidden" name="" id="txtPositionX" value="<? echo  $data['toado_x'];?>" />
        <input type="hidden" name="" id="txtPositionY" value="<? echo $data['toado_y'];?>" />
        <input type="hidden" name="" id="hddDiadiem" value="sannhadat.vip"/>
        <script src="/style/js/GoogleMapControl.min.js?v=20151126"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAncygDLD4qxYy5Uw6vPdz_KH_qOCJDL8U"></script>
        <div id="mapinfo">
            <div id="map_canvas"></div>
        </div>
    </div>
</div>