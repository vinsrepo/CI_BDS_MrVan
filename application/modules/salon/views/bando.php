
<div class="breadcrumbs " style="margin-bottom: 10px;">
        <div class="center">
           <div class="list-content">
             <ul class="grid12-12">
                 <li><a href="/" title="<?php echo $this->lang->line('lable_home');?> <? echo $salon_info['TenSalon'];?>"><span><?php echo $this->lang->line('lable_home');?> <? echo $salon_info['TenSalon'];?></span></a> <span class="mpx-arr-thin-right"></span></li>  
                 <li><a href=""><span class="last"><? echo $this->lang->line('lable_map');?></span></a> <span class="mpx-arr-thin-right last"></span></li>
                              
                 </ul>
           </div>
                    </div>
    </div>
<form>
<div class="center">
<div class="list-content">
 

<div class="list-left-container" style="">
<div class="salondetail">
<div class="salondetailcontent">
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=places&language=vi&key=AIzaSyAncygDLD4qxYy5Uw6vPdz_KH_qOCJDL8U"></script>
<script type="text/javascript">
    var directionsDisplay;
    var directionsService = new google.maps.DirectionsService();
    var map;
    var geocoder;
    var marker
    var start = '';
    var end = '';       
    function initialize() {
        var infowindow = new google.maps.InfoWindow({
            content: "<div><? echo $salon_info['TenSalon'];?></div><div><? echo $salon_info['DiaChi'];?></div>"
        });
        var positioninit = new google.maps.LatLng('20.963684', '105.842178');
                                
        var mapOptions = {
            zoom: 15,
            center: positioninit,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById('mapcontent'), mapOptions);

        marker = new google.maps.Marker({
            position: positioninit,
            map: map,
            icon: '/images/marker.png'
        });
        google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map,marker);
        });
        
        new google.maps.places.Autocomplete($("#start")[0], {});
        new google.maps.places.Autocomplete($("#end")[0], {});
        
        //
        end = document.getElementById('end').value;
        if(end == "") { alert('Chưa nhập địa chỉ salon!');$("#end").focus(); return; } 
        geocoder = new google.maps.Geocoder();
        geocoder.geocode({ 'address': end }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) { 
                marker.setPosition(results[0].geometry.location);
                map.setCenter(results[0].geometry.location);
                map.setZoom(12);
            } else {
                alert('Không tìm thấy địa điểm: ' + status);
            }
        });
    };

    function calcRoute() {
        start = document.getElementById('start').value;
        if(start == "") { alert('Chưa nhập địa điểm của bạn!'); $("#start").focus(); return; }

        end = document.getElementById('end').value;
        if(end == "") { alert('Chưa nhập địa chỉ salon!');$("#end").focus(); return; }
        $('#directionsPanel').html('');
        $('#directionsPanel').show();  
        geocoder = new google.maps.Geocoder();
        directionsDisplay = new google.maps.DirectionsRenderer();
        var latlng = new google.maps.LatLng(20.963684, 105.842178);
        var mapOptions = {
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            center: latlng
        };
        map = new google.maps.Map(document.getElementById("mapcontent"), mapOptions);
        directionsDisplay.setMap(map);
        directionsDisplay.setPanel(document.getElementById("directionsPanel"));
              
        geocoder.geocode({ 'address': start }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                start = results[0].geometry.location;
            } else {
                alert('Không tìm thấy địa điểm: ' + status);
            }
        });

        
        geocoder.geocode({ 'address': end }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                end = results[0].geometry.location;
            } else {
                alert('Không tìm thấy địa điểm: ' + status);
            }
        });

        //CHọn loại phương tiện di chuyển
        //var selectedMode = document.getElementById("mode").value;
        var selectedMode = "DRIVING";
        var request = {
            origin: start,
            destination: end,
            travelMode: google.maps.TravelMode[selectedMode]
        };
        directionsService.route(request, function (response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
            }
        });
    };
    google.maps.event.addDomListener(window, 'load', initialize);
</script>

<div class="titsalon">Bản đồ đường đi</div>
                    <div id="mapcontent" class="mapcontent">

                    </div>

                    <div class="locationmap">
                        <div class="row">
                            <input type="button" class="stt" value="1" />
                            <input type="text" placeholder="Nhập địa điểm của bạn" id="start" class="text" />
                            <input type="button" value="Tìm đường" onclick="javascript:calcRoute();" class="btn" />
                        </div>
                        <div class="row">
                            <input type="button" class="stt" value="2" />
                            <input type="text" id="end" value="<? echo $salon_info['DiaChi'];?>" class="endlocation" />
                        </div>
                    </div>

                    <div class="directionsPanel" id="directionsPanel">

                    </div>
                    
</div>
</div>
</div>
<div class="salondetail list-right ">
<div class="saloninfo shadowbox2" style="padding-bottom: 0px;margin-bottom: 0px;padding-left: 15px;width: 300px;">
     
        <div class="inforsalon" style="width: 280px;border: none;">            
            <div class="titsalon" style="width: 99%;padding-bottom: 5px;margin-bottom: 10px;padding-top: 10px;">
                            <? echo $salon_info['TenSalon'];?> 
                        </div>
             <div class="shortdescription" style="width: 100%;line-height: 18px;">
				<div class="salonaddress"><b style="color: black;"><?php echo $this->lang->line('lable_add');?></b>: <? echo $salon_info['DiaChi'];?></div>
                <div class="salonmobile"><b style="color: black;"><?php echo $this->lang->line('lable_mobile');?></b>: <? echo $salon_info['DienThoai'];?> </div>
                <div class="salonemail"><b style="color: black;"><?php echo $this->lang->line('lable_email');?></b>: <? echo $salon_info['Email'];?><br /></div>
                <div class="salonaddress"><b style="color: black;">Website</b>: <a href="http://<? echo $_SERVER['HTTP_HOST'];?>"> <? echo $_SERVER['HTTP_HOST'];?></a> </div>
             </div> 
           <div class="shortdescription" style="margin-top: 10px;margin-bottom: 10px;"><? 
               $NoiDung=strip_tags($salon_info['GioiThieu']);
                  $NoiDung=''.substr($NoiDung,0,800).'';
                  $NoiDung=substr($NoiDung, 0, strrpos($NoiDung, ' ')).'...';
               echo $NoiDung;?><a href="/gioi-thieu"> Xem thêm</a></div>
        </div> 
    </div>
</div>
</div>
</div>