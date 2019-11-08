<div class="content_default">
        <?
        $arr_orders=array(
        'NgayDang-desc'=>'Thông thường',
        'GiaTien-asc'=>'Giá tăng dần',
        'GiaTien-desc'=>'Giá giảm dần',
        'NgoaiThat-asc'=>'Diện tích nhỏ nhất',
        'NgoaiThat-desc'=>'Diện tích lớn nhất'
        );
        ?>        
<div class="div_search default_padding">
    <div class="dropdownlist">
        <img src="/style/mobile/images/icon-order.png" />
        <span class="spanOver" id="spanOver">Thông thường
        </span>
        <select name="" onchange="location = this.options[this.selectedIndex].value;" id="ddlSortReult" class="dcate">
        <? 
         foreach($arr_orders as $order=>$name){ 
         if($this->session->userdata('order')==$order){
            $selected=' selected';
         }else{
            $selected=' ';
         }
              echo '<option value="?order='.$order.'" '.$selected.'>'.$name.'</option> '; 
         }
         ?>  

        </select>
    </div>

    <!-- <a href="javascript:searchLinkSaved();"> -->
        <!-- <div class="save">
            <img src="/style/mobile/images/icon-saveListing.png" /> -->
            <div style="padding:6px 0 0 0;text-align: center">Có <b style="color: green;"><? echo !isset($sotin)||$sotin==''?0:$sotin;?></b> tin rao</div>
        <!-- </div> -->
    <!-- </a> -->
    <div class="clear"></div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAncygDLD4qxYy5Uw6vPdz_KH_qOCJDL8U"></script>
<div class="divmaps" style="width: 100%; height:300px;">      
    <div id="map_canvas"></div>  
</div>
<div class="content2">
    <div class="div_container">
        <div class="div_breakcum">
            <h1 class="spanresult">
                <? 
                if($current_info['H1']!=''){
                    echo $current_info['H1'];
                }elseif(isset($HangXe['H1'])&&$HangXe['H1']!=''){
                    echo $HangXe['H1'];
                }elseif(isset($DoiXe['H1'])&&$DoiXe['H1']!=''){
                    echo $DoiXe['H1'];
                }elseif(isset($user_info_up)){?>
                CÁC TIN RAO ĐĂNG BỞI 
                <? echo $user_info_up['HoVaTen'];?>
                <?}else{?>
                    <? if(isset($phienban)){?> <? echo $phienban[1];?> <? echo $phienban[2];?> <? echo $phienban[3];?> đời 20<? echo $phienban[4];?> 
                    <?}else{?> 
                        <? $ctit=$HangXe['TieuDe']=='BĐS bán'?'NHÀ ĐẤT BÁN':($HangXe['TieuDe']=='BĐS cho thuê'?'NHÀ ĐẤT CHO THUÊ':$HangXe['TieuDe']); echo $ctit;?> 
                        <? if(isset($DoiXe['TieuDe'])){echo $DoiXe['TieuDe'];}?> 
                    <?}?> 
                    <? if($this->session->userdata('DoiXe')!=''){?> tại <? echo $this->session->userdata('DoiXe');?> 
                    <?}else{?>trên toàn quốc<?}?> 
                <?}?>
            </h1>
            <div class="clear"></div>
        </div>
        <div class="div_listListing">           
            <? include 'm_list.php';?>           
        </div>
    </div>
    <div style="text-align: center; background: #FFF;">
        <?php echo $this->pagination->create_links();?> 
    </div>
</div>
<script type="text/javascript">
    function sortchange() {
        setCookie('psortfilter', $('#ddlSortReult').val() + '$' + '/nha-dat-ban.htm', 1);
    }

    $(document).ready(function () {
        checkSaveLink();
    })
</script>
</div>
<style>
  .gm-style-iw-d {
    text-align: center;
  }
  .gm-style-iw-d b {
    font-weight: 600;
    color: #125d04;
  }
  .gm-style-iw-d i {
    color: #ca3838;
  }
  .gm-style-iw-d a:hover {
    text-decoration: none;
  }
  .gm-style-mtc div {
    height: 25px !important;
    font-size: 13px !important;
  }
</style>
<script type="text/javascript">
  var map;
  var geocoder;
  var marker;
  var vitri = new Array();
  var latlng;
  var infowindow;
  var icon_marker = "style/images/markerhover.png";
  var icon = "style/images/marker.png";

  $(document).ready(function() {
      ViewCustInGoogleMap();
      $('#map_canvas').css('display','block');
  });

  function ViewCustInGoogleMap() {

      var mapOptions = {
          center: new google.maps.LatLng(21.0287974, 105.85235420000004),
          zoom: 7,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          scrollwheel: true,
          gestureHandling: 'greedy'
          // zoomControlOptions: {
          //     position: google.maps.ControlPosition.TOP_RIGHT
          // },
      };
      map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);

      var data = '<?php echo json_encode($map); ?>';                          
      vitri = JSON.parse(data);
      // console.log(data);
      for (var i = 0; i < vitri.length; i++) {
          setMarker(vitri[i]);
      }
  }

  function setMarker(vitri) {
      geocoder = new google.maps.Geocoder();
      infowindow = new google.maps.InfoWindow();
      if ((vitri["LatitudeLongitude"] == null) || (vitri["LatitudeLongitude"] == 'null') || (vitri["LatitudeLongitude"] == '')) {
          geocoder.geocode({ 'address': vitri["Address"] }, function(results, status) {
              if (status == google.maps.GeocoderStatus.OK) {
                  latlng = new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng());
                  marker = new google.maps.Marker({
                      position: latlng,
                      map: map,
                      draggable: false,
                      html: vitri["DisplayText"],
                      icon: vitri["icon_home"]
                  });
                  google.maps.event.addListener(marker, 'click', function(event) {
                      infowindow.setContent(this.html);
                      infowindow.setPosition(event.latLng);
                      infowindow.open(map, this);
                  });
              }
              else {
                  alert(vitri["DisplayText"] + " -- " + vitri["Address"] + ". This address couldn't be found");
              }
          });
      }
      else {
          var latlngStr = vitri["LatitudeLongitude"].split(",");
          var lat = parseFloat(latlngStr[0]);
          var lng = parseFloat(latlngStr[1]);
          var icon = {
              url: vitri["icon_1"], // url
          };       
          latlng = new google.maps.LatLng(lat, lng);
          marker = new google.maps.Marker({
              position: latlng,
              map: map,
              draggable: false,
              html:'<p data-id="'+vitri["id"]+'"><b>' + vitri["DisplayText"] + ' | ' + vitri["GiaTien"] + '</b></p><b>' + vitri["Address"] + '</b></br>' + '<a style="font-style:italic" href="'+ vitri["Link"] +'"><i>Click vào icon để xem chi tiết</i></a>',
              // html:'<img data-id="'+vitri["id"]+'" src="'+ vitri["Image"]+ '" width="auto" height="120px"/>'+ '<p data-id="'+vitri["id"]+'><b>' + vitri["DisplayText"] + ' | ' + vitri["GiaTien"] + '</b></p><b>' + vitri["Address"] + '</b></br>' + '<a style="font-style:italic" href="'+ vitri["Link"] +'"><i>Click vào icon để xem chi tiết</i></a>',
              icon: vitri["icon_1"]
          });

          var myoverlay = new google.maps.OverlayView();
            myoverlay.draw = function () {
                this.getPanes().markerLayer.id='markerLayer';
            };
          myoverlay.setMap(map);

          marker.setPosition(latlng);
          map.setCenter(latlng);
          google.maps.event.addListener(marker, 'mouseover', function(event) {
            // var id = $(this)[0].html.split('data-id="')[1].split('"')[0];
              infowindow.setContent(this.html);
              infowindow.setPosition(event.latLng);
              this.setIcon(icon);
              // $('#thumb_'+id).css({transform: "scale(3)", transition:"0.7s", zIndex:"999"});
              infowindow.open(map, this);
          });
          google.maps.event.addListener(marker, 'mouseout', function(event) {
              // var id = $(this)[0].html.split('data-id="')[1].split('"')[0];
              this.setIcon(icon);
              // $('#thumb_'+id).css({transform: "scale(1)",transition:"0.7s",zIndex:"1"});
              infowindow.close(map, this);
          });
          google.maps.event.addListener(marker, 'click', function(event) {
              window.location.href = vitri["Link"];
          });
      }
  }
  // google.maps.event.addDomListener(window, "load", ViewCustInGoogleMap);
</script>