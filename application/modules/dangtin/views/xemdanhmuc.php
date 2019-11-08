<script src='/style/icheck-1.x/icheck.min.js'></script> 
<link href="/style/icheck-1.x/skins/square/blue.css" rel="stylesheet" />
<style>
  #hc_text {
    width: 400px;
    max-height: 300px;
    background: #27252500;
    position: absolute;
    top: 263px;
    left: 15px;
    border: 1px solid #e8e8e8;
    padding: 15px;
    background: #000;
    opacity: 0.67;
    color: #fff;
    display: none;
  }
</style>
<script>
$(document).ready(function () {
$('input').iCheck({
    checkboxClass: 'icheckbox_square-blue',
    radioClass: 'iradio_square-blue',
    increaseArea: '20%' // optional
  });
});
</script>
<div class="wr_page" style="padding-top: 55px"> 
  <div id="ContentPlaceHolder1_ProductDetail1_divmaps" class="divmaps" style="margin: 10px 0 0; float: left; width: 100%;">      
    <div id="mapinfo">
        <div id="map_canvas"></div>
    </div>
  </div>
  <div id="hc_text"></div>
  <div class="gg_img">
      <ul class="img_gg">
        <?php 
        if($map) 
          foreach ($map as $data) :
        ?>
          <li>
            <a href="<?php echo $data['Link']?>" title="<?php echo $data['DisplayText'] ?>" alt="<?php echo $data['DisplayText'] ?>">
              <img id="thumb_<?php echo $data['id'] ?>" src="<?php echo $data['BigImage'];?>" class="h_gg_img">
            </a>
          </li>
          <?php endforeach;?>
      </ul>
  </div>       
  <div class="index-page" style="width: 1200px;padding-top: 50px;margin: 0 auto;clear:left;float: unset;">
    <div class="content">          
      <!-- Content Left -->
      <div class="row">
        <div class="col-md-9">                 
          <div class="product">
            <div class="product-title" style="width: 450px;float: left;">
                <h1>
                    <? 
                      if(isset($user_info_up)){?>
                        CÁC TIN RAO ĐĂNG BỞI 
                        <? echo $user_info_up['HoVaTen'];?>
                      <?}else{?>   <? if(isset($phienban)){?> <? echo $phienban[1];?> <? echo $phienban[2];?> <? echo $phienban[3];?> đời 20<? echo $phienban[4];?> <?}else{?> <?
                      if($current_info['H1']!=''){
                            $ctit= $current_info['H1'];
                      }elseif(isset($HangXe['H1'])&&$HangXe['H1']!=''){
                            $ctit= $HangXe['H1'];
                      }else{
                         $ctit=$HangXe['TieuDe']=='BĐS bán'?'NHÀ ĐẤT BÁN':($HangXe['TieuDe']=='BĐS cho thuê'?'NHÀ ĐẤT CHO THUÊ':$HangXe['TieuDe']); 
                      } 
                      echo $ctit;?> 
                      <? if(isset($DoiXe['TieuDe'])){echo $DoiXe['TieuDe'];}?> <?}?> <? if($this->session->userdata('DoiXe')!=''){?> tại <? if($this->session->userdata('PhanHang')!=''){
                            
                          $city=Modules::run('trangchu/getList','tinhthanh',1,0,'Name asc','ID',array('Name'=>$this->session->userdata('DoiXe'),'Loai'=>'DoiXe'));
                          $last=Modules::run('trangchu/getList','tinhthanh',1,0,'Name asc','ID',array('Name'=>$this->session->userdata('NamSX'),'Loai'=>'NamSX','Parent'=>$city[0]['Note']));
                          $info_cha=$last;
                  
                          $info_reg=Modules::run('trangchu/getList','tinhthanh',1,0,'Name asc','ID',array('Name'=>$this->session->userdata('PhanHang'),'Loai'=>'PhanHang','Parent'=>$info_cha[0]['Note']));
                  
                            ?>  <? echo $info_reg[0]['Perfix'];?> <? echo $this->session->userdata('PhanHang').' - ';}?> <? if($this->session->userdata('XuatXu')!=''){
                                
                          $city=Modules::run('trangchu/getList','tinhthanh',1,0,'Name asc','ID',array('Name'=>$this->session->userdata('DoiXe'),'Loai'=>'DoiXe'));
                          $last=Modules::run('trangchu/getList','tinhthanh',1,0,'Name asc','ID',array('Name'=>$this->session->userdata('NamSX'),'Loai'=>'NamSX','Parent'=>$city[0]['Note']));
                          $info_cha=$last;
                  
                          $info_reg=Modules::run('trangchu/getList','tinhthanh',1,0,'Name asc','ID',array('Name'=>$this->session->userdata('XuatXu'),'Loai'=>'XuatXu','Parent'=>$info_cha[0]['Note']));
                  
                          ?> 
                          <? echo $info_reg[0]['Perfix'];?> <? echo $this->session->userdata('XuatXu').' - ';}?> <? if($this->session->userdata('NamSX')!=''){?> <? echo $this->session->userdata('NamSX').' - ';}?> <? echo $this->session->userdata('DoiXe');?> <?}else{?>trên toàn quốc<?}?> <?}?>                        
                </h1>
            </div>
            <div style="margin: 0px;padding: 0px;text-align: right;"><span class="spancount">Có <b>
              <? echo !isset($sotin)||$sotin==''?0:$sotin;?></b> tin bất động sản</span> </div>
              <?if($this->session->userdata('HangXe')!=''||$this->session->userdata('DoiXe')!=''||$this->session->userdata('NamSX')!=''||$this->session->userdata('XuatXu')!=''||$this->session->userdata('PhanHang')!=''||$this->session->userdata('TinhTrang')!=''||$this->session->userdata('NgoaiThat')!=''||$this->session->userdata('GiaTien')!=''||$this->session->userdata('HeThongNapNhienLieu')!=''||$this->session->userdata('NoiThat')!=''){?>
                <div class="lblsearchresult" style=" float: left;margin-top: 8px;">       
                  <h2>
                    Tìm kiếm theo các tiêu chí:  
                      <?if($this->session->userdata('HangXe')!=''){echo '  <strong><span>'.$HangXe['TieuDe'].'</span></strong>  .  ';}?>
                      <?if($this->session->userdata('DoiXe')!=''){echo '| Tỉnh/Tp: <strong><span>'.$this->session->userdata('DoiXe').'</span></strong>.  ';}?>
                      <?if($this->session->userdata('NamSX')!=''){echo '| Quận/Huyện: <strong><span>'.$this->session->userdata('NamSX').'</span></strong>.  ';}?>
                      <?if($this->session->userdata('XuatXu')!=''){echo '| Phường/Xã: <strong><span>'.$this->session->userdata('XuatXu').'</span></strong>.  ';}?>
                      <?if($this->session->userdata('PhanHang')!=''){echo '| Đường/Phố: <strong><span>'.$this->session->userdata('PhanHang').'</span></strong>.  ';}?>
                      <?if($this->session->userdata('TinhTrang')!=''){$pr=explode('|',$this->session->userdata('TinhTrang')); echo '| Dự án: <strong><span>'.$pr[0].'</span></strong>.  ';}?>
                      <?if($this->session->userdata('NgoaiThat')!=''){echo '| Diện tích: <strong><span>'.str_replace('-',' - ',$this->session->userdata('NgoaiThat')).' m²</span></strong>.  ';}?>
                      
                      <?if($this->session->userdata('GiaTien')!=''){echo '| Giá : <strong><span>'.str_replace('-',' - ',$this->session->userdata('GiaTien')).' '.$this->session->userdata('SoKM').'</span></strong>.  ';}?>
                      <?if($this->session->userdata('HeThongNapNhienLieu')!=''){echo '| Số phòng: <strong><span>'.$this->session->userdata('HeThongNapNhienLieu').'</span></strong>. ';}?>
                      <?if($this->session->userdata('NoiThat')!=''){echo '| Hướng: <strong><span>'.$this->session->userdata('NoiThat').'</span></strong>.  ';}?>
                        
                      </h2>        
                </div>
              <?}?>
            <!-- <script>
              $(document).ready(function () {
                $("#cbhaveimg").on('ifChecked', function(event){ 
                    window.location.href='?img=on';
                });
                $("#cbhaveimg").on('ifUnchecked', function(event){ 
                    window.location.href='?img=off';
                }); 
              });     
            </script>  -->
            <?
                $arr_orders=array(
                'NgayDang-desc'=>'Ngày đăng',
                'GiaTien-asc'=>'Giá tăng dần',
                'GiaTien-desc'=>'Giá giảm dần',
                'NgoaiThat-asc'=>'Diện tích nhỏ nhất',
                'NgoaiThat-desc'=>'Diện tích lớn nhất'
                );
                ?>
                <style>
                .select-order .select2{
                    margin-top: -3px;
                }
                </style>
            <div class="tab" style="background:linear-gradient(to right, #7fb84e, #4b915a);"> 
                <div style="padding-top: 9px;float: left;padding-left: 7px;">
                  <a class="btnall" href="/<? echo $this->uri->segment(1);?>">Xem tất cả</a>  
                  <!-- <label for="cbhaveimg"><input type="checkbox" class="checkbox" <? //if($this->session->userdata('XeCoAnh')=='on'){echo 'checked';} ?> id="cbhaveimg" onclick="check_img()"/> Xem tin rao có ảnh
                  </label> -->
                </div>
                <div class="select-order">
                    <div class="option-item">
                        <span class="v-drop v-drop-width text-white" id="spanCate">Sắp xếp theo: </span> 
                        <select name="" onchange="location = this.options[this.selectedIndex].value;" id="">
                        <option value="?order=off">Thông thường</option>
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
                </div>
            </div>
          </div>
          <div class="for-user">
            <ul>
              <? include 'div_list.php';?>                       
            </ul>
            <div class="clear"></div>
          </div>
          <?php echo $this->pagination->create_links();?> 
          <div class="clear"></div>
        </div>
         <!-- Content Right -->
        <div class="col-md-3">
          <!-- Box search list -->                
          <? include 'div_search.php';?> 
          <!-- Product count -->
                        
          <? //include 'current_category.php';?>
          <!-- Banner -->
          <!-- Box hot -->
          <? //include 'tukhoanoibat.php';?>              
                        <!-- Utility -->
          <? //include  APPPATH.'modules/dangtin/views/div_tool.php';?>
          <div class="clear"></div>
        </div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
  <div class="clear"></div>
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
</style>
<script type="text/javascript">
  var map;
  var geocoder;
  var marker;
  var vitri = new Array();
  var latlng;
  var infowindow;
  var markers = {};
  
  $(document).ready(function() {
      ViewCustInGoogleMap();
  });

  function ViewCustInGoogleMap() {

      var mapOptions = {
          center: new google.maps.LatLng(21.0287974, 105.85235420000004),
          zoom: 10,
          mapTypeId: google.maps.MapTypeId.ROADMAP,
          scrollwheel: true,
          zoomControlOptions: {
              position: google.maps.ControlPosition.TOP_RIGHT
          },
      };
      map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);

      var data = '<?php echo json_encode($map); ?>';                          
      vitri = JSON.parse(data);
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
                      icon: vitri["icon"]
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
          latlng = new google.maps.LatLng(lat, lng);
          marker = new google.maps.Marker({
              position: latlng,
              map: map,
              draggable: false,
              html:'<div><p data-id="'+vitri["id"]+'"><b>' + vitri["DisplayText"] + ' | ' + vitri["GiaTien"] + '</b></p><b>' + vitri["Address"] + '</b></br>' + '<a style="font-style:italic" href="'+ vitri["Link"] +'"><i>Click vào icon để xem chi tiết</i></a></div>',
              // html:'<img data-id="'+vitri["id"]+'" src="'+ vitri["Image"]+ '" width="auto" height="120px"/>'+ '<p data-id="'+vitri["id"]+'><b>' + vitri["DisplayText"] + ' | ' + vitri["GiaTien"] + '</b></p><b>' + vitri["Address"] + '</b></br>' + '<a style="font-style:italic" href="'+ vitri["Link"] +'"><i>Click vào icon để xem chi tiết</i></a>',
              icon: vitri['icon_1'],
              optimized: false,            
          });
                 
          marker.setPosition(latlng);
          map.setCenter(latlng);
          google.maps.event.addListener(marker, 'mouseover', function(event) {
            var id = $(this)[0].html.split('data-id="')[1].split('"')[0];
              infowindow.setContent(this.html);
              infowindow.setPosition(event.latLng);
              this.setIcon(vitri['icon_red']);
              $('#thumb_'+id).css({transform: "scale(3)", transition:"0.7s", zIndex:"999"});
              infowindow.open(map, this);
          });
          google.maps.event.addListener(marker, 'mouseout', function(event) {
              var id = $(this)[0].html.split('data-id="')[1].split('"')[0];
              this.setIcon(vitri['icon_1']);
              $(this).css({transform: "scale(1)", transition:"0.7s"});
              $('#thumb_'+id).css({transform: "scale(1)",transition:"0.7s",zIndex:"1"});
              infowindow.close(map, this);
          });
          google.maps.event.addListener(marker, 'click', function(event) {
              window.location.href = vitri["Link"];
          });               
      }
      var getMarkerUniqueId= function(lat, lng) {
        return lat + '_' + lng;
      }
      var markerId = getMarkerUniqueId(lat, lng);

      $('#thumb_'+vitri['id']).mouseover(function(){
        $(this).css({transform: "scale(1.5)", transition:"0.7s",zIndex:"99"});
        var latlngStr = vitri["LatitudeLongitude"].split(",");
        var lat = parseFloat(latlngStr[0]);
        var lng = parseFloat(latlngStr[1]);
        latlng = new google.maps.LatLng(lat, lng);
        marker2 = new google.maps.Marker({
            position: latlng,
            map: map,
            draggable: false,
            icon:vitri['icon_red'],
            optimized: false,
            id: 'marker_' + markerId
        });
        markers[markerId] = marker2;

        $('#hc_text').css('display','block');

        document.getElementById('hc_text').innerHTML=('<div class="hc_thumb"><p data-id="'+vitri["id"]+'"><b>' + vitri["DisplayText"] + '</b></p><small>Vị trí: ' + vitri["Address"] + '</small></b></p><p><small>Diện tích: ' + vitri["DienTich"] + '</small></p><p><small>Số phòng: ' + vitri["Phong"] + '</small>  -  <small>Phòng tắm: ' + vitri["PhongTam"] + '</small></p><p><small>Hướng: ' + vitri["Huong"] + '</small>  -  <small>Giá: ' + vitri["GiaTien"] + '</small></p></div>')
      });
      $('#thumb_'+vitri['id']).mouseout(function(){
        $(this).css({transform: "scale(1)", transition:"0.7s",zIndex:"1"});
        $('#hc_text').css('display','none');
        var marker = markers[markerId]; // find marker
        removeMarker(marker, markerId);
      });
      var removeMarker = function(marker2, markerId) {
        marker2.setMap(null);
        delete markers[markerId];
    };         
  }
</script>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyAncygDLD4qxYy5Uw6vPdz_KH_qOCJDL8U"></script>