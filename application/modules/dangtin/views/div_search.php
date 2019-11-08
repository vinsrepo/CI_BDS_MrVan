 <link href="/style/css/select2.min.css" rel="stylesheet" />
<script src="/style/js/select2.full.min.js"></script>
<script src="/style/js/BoxSearchList.min.js?v=20151126" type="text/javascript"></script>
<style>
.bs-item1{
    text-align: left!important;
}
</style>
<script type="text/javascript" > 
<? 
    if($this->input->post('HangXe')!=''){
        $Xe=$this->input->post('HangXe');
    }elseif($this->session->userdata('HangXe')){
        $Xe=$this->session->userdata('HangXe');
    }elseif(isset($HangXe['IDBaiViet'])){
        $Xe=$HangXe['IDBaiViet'];
    }else{
        $Xe=$xemtinban['HangXe'];                            
    }
    if($Xe!=''){
      $HangXe=Modules::run('trangchu/getInfo','baiviet','IDBaiViet',$Xe);
    }//else{
      //$HangXe='';
    //} 
     
    $opition_nam_ban='<option value="Thỏa thuận">Thỏa thuận</option><option value="Triệu">Triệu</option><option value="Tỷ">Tỷ</option><option value="USD">USD</option><option value="USD/m²">USD/m²</option><option value="Triệu/m²">Triệu/m²</option>';
    $opition_nam_thue='<option value="Thỏa thuận">Thỏa thuận</option><option value="Triệu/tháng">Triệu/tháng</option><option value="USD/tháng">USD/tháng</option><option value="USD/m²/tháng">USD/m²/tháng</option><option value="Triệu/m²/tháng">Triệu/m²/tháng</option>';
    if($HangXe['MenuCha']==449){
        $opition_namSoKM=$opition_nam_ban;
    }
    if($HangXe['MenuCha']==451){
        $opition_namSoKM=$opition_nam_thue;
    }
    ?>
function getDoiXe(HangXe){
    
    $.ajax
    ({
        
       type: "POST",
       url: "/dangtin/getDoiXe/"+HangXe,
       success: function(response)
       {   
        
          $("#ddlType").html('<option value="">Loại bất động sản</option>'+response);
          $("#ddlType").select2('val', '<? echo $Xe;?>');   
          if(HangXe==449){
             dataSoKM='<? echo $opition_nam_ban;?>';
          }
          if(HangXe==451){
             dataSoKM='<? echo $opition_nam_thue;?>';
          }
             $("#SoKM").html('<option value="">Đơn vị tính</option>'+dataSoKM);
             $("#SoKM").select2('val','<? if($this->session->userdata('SoKM')!=''){echo $this->session->userdata('SoKM');}elseif($xemtinban['SoKM']!=''){echo $xemtinban['SoKM'];}else{echo set_value('SoKM');};?>');
       }            
    });
}
function autoSearch(){
    if($("#divSellList").hasClass('bs-tab-active')){
        $("#adminForm2").attr('action','/bds-ban');  
    }else{
        $("#adminForm2").attr('action','/bds-cho-thue');  
    }
    document.getElementById('adminForm2').submit();
}
</script>
<div class="t_search">
    <h1>Tìm kiếm</h1>
</div>
<form method="post" name="adminForm2" id="adminForm2">
<div class="box-search">
    <div class="bs-tab">
        <div class="tab-sell" id="divSellList" onclick="getDoiXe(449);">BĐS bán</div>
        <div class="tab-sell" id="divRentList" onclick="getDoiXe(451);">BĐS cho thuê</div>
    </div>
    <div class="bs-content">
        <!-- <div class="bs-item" id="KeyDownEnterHome" style="background:none;">
            <input name="TieuDe" type="text" class="ui-autocomplete-input" placeholder="Nhập tên bất động sản bạn muốn tìm ..." autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true" />
        </div> -->
        <input type="hidden" name="hddcboType" id="hddcboType" value="38" />
        <input type="hidden" name="hddcboCate" id="hddcboCate" value="-1" />
        <select id="ddlType" name="HangXe" class="bs-item1"> 
                <option value="">Loại bất động sản</option>
        </select> 
        <input type="hidden" name="hddcboCity" id="hddcboCity" value="VN" />
        <select id="ddlCity" name="DoiXe" class="bs-item1">
            <option value="">Tỉnh/Thành phố</option> 
            <?
            $arr = file_get_contents(APPPATH . 'includes/DSTinhThanhKey.txt');
            foreach(json_decode($arr,true) as $key=>$val){
                $select_ed=" ".set_select('DoiXe', $val['Text']);
                    if($this->session->userdata('DoiXe')==$val['Text']||$xemtinban['DoiXe']==$val['Text']){
                        $select_ed="selected='selected'";
                    }
                    echo '
                        <option value="'.$val['Text'].'" data-key="'.$val['Id'].'" '.$select_ed.'>'.$val['Text'].'</option>    ';
                    }
                    ?>
        </select> 
        <select id="ddlDistrict" name="NamSX" class="bs-item1">
                <option value="">Quận/Huyện</option>
        </select>
        <select id="ddlWard" name="XuatXu" class="bs-item1" >
            <option value="">Phường/Xã</option>
        </select> 
        <select id="NgoaiThat" name="NgoaiThat" class="bs-item1">
            <option value="">Diện tích</option>
            <?            
                $opition_nam_area='
                <option value="<30">Dưới 30 m²</option>
                <option value="30-50">Từ 30 đến 50 m²</option>
                <option value="50-80">Từ 50 đến 80 m²</option>
                <option value="80-100">Từ 80 đến 100 m²</option>
                <option value="100-150">Từ 100 đến 150 m²</option>
                <option value="150-200">Từ 150 đến 200 m²</option>
                <option value="200-250">Từ 200 đến 250 m²</option>
                <option value="250-300">Từ 250 đến 300 m²</option>
                <option value="300-500">Từ 300 đến 500 m²</option> 
                <option value=">500">Trên 500 m²</option> 
                ';
                preg_match_all("/<option value=\"(.*?)\">(.*?)<\/option>/is", $opition_nam_area, $matches);
                 $check=0;
                foreach($matches[2] as $key => $val){
                    $select_ed=" ".set_select('NgoaiThat', $val); 
                    if($this->session->userdata('NgoaiThat')==$matches[1][$key]){
                        $select_ed=" selected='selected'";
                    }
                    $value_from=setval($matches[1],$key);
                    $value_to=setval($matches[1],$key+1);
                    if(isset($xemtinban['NgoaiThat'])){
                        if(strpos($value_from,'<')!==false&&$xemtinban['NgoaiThat']<str_replace('<','',$value_from)&&$check==0){
                            $select_ed=" selected='selected'"; $check=1;
                        }
                        if($xemtinban['NgoaiThat']>=$value_from&&$xemtinban['NgoaiThat']<=$value_to&&$check==0){
                            $select_ed=" selected='selected'"; $check=1;
                        }
                        if(strpos($value_to,'>')!==false&&$xemtinban['NgoaiThat']>str_replace('>','',$value_to)&&$check==0){
                            $select_ed=" selected='selected'"; $check=1;
                        } 
                    } 
                  echo "
                  <option value='".$matches[1][$key]."'$select_ed>$val</option>
                  ";
                }
            ?>
        </select> 
        <select id="GiaTien" name="GiaTien" class="bs-item1">
            <option value="">Mức giá</option>
            <?
                $opition_nam_price='
                <option value="1-2">Từ 1 đến 2</option>
                <option value="2-3">Từ 2 đến 3</option>
                <option value="3-5">Từ 3 đến 5</option>
                <option value="5-7">Từ 5 đến 7</option>
                <option value="7-10">Từ 7 đến 10</option>
                <option value="10-20">Từ 10 đến 20</option>
                <option value="20-30">Từ 20 đến 30</option>
                <option value=">30">Lớn hơn 30</option>
                <option value="<500">Nhỏ hơn 500</option>
                <option value="500-800">Từ 500 đến 800</option>
                <option value="800-1000">Từ 800 đến 1000</option>
                ';
                preg_match_all("/<option value=\"(.*?)\">(.*?)<\/option>/is", $opition_nam_price, $matches);
                $check=0;
                foreach($matches[2] as $key => $val){
                    $select_ed=" ".set_select('GiaTien', $val);
                    if($this->session->userdata('GiaTien')==$matches[1][$key]){
                        $select_ed=" selected='selected'";
                    } 
                    $value_from=setval($matches[1],$key);
                    $value_to=setval($matches[1],$key+1);
                    if(isset($xemtinban['GiaTien'])){
                        if($check==0&&strpos($value_from,'>')!==false&&$xemtinban['GiaTien']>str_replace('>','',$value_from)){
                            $select_ed=" selected='selected'"; $check=1; 
                        }else
                        if($check==0&&strpos($value_from,'<')!==false&&$xemtinban['GiaTien']<str_replace('<','',$value_from)){
                            $select_ed=" selected='selected'"; $check=1;  
                        }else
                        if($check==0&&$xemtinban['GiaTien']>=$value_from&&$xemtinban['GiaTien']<=str_replace($value_from.'-','',$matches[1][$key])){
                            $select_ed=" selected='selected'"; $check=1; 
                        }
                    } 
                  echo "
                  <option value='".$matches[1][$key]."'$select_ed>$val</option>
                  ";
                }
            ?>
        </select> 
        <select id="SoKM" name="SoKM" class="bs-item1">
     
        </select>
        <input type="hidden" name="hddcboDist" id="hddcboDist" value="-1" /> 
        <input type="hidden" name="hddcboArea" id="hddcboArea" value="-1" /> 
        <input type="hidden" name="hddcboPrice" id="hddcboPrice" value="-1" /> 
        <div id="bs-advance">         
            <select id="ddlStreets" name="PhanHang" class="bs-item1">
                <option value="">Đường/Phố</option>
            </select>  
            <select id="HeThongNapNhienLieu" name="HeThongNapNhienLieu" class="bs-item1" >
                <option value="">Số phòng ngủ</option>
                <?
                    $opition_nam='
                    <option value="1">1+</option>
                    <option value="2">2+</option>
                    <option value="3">3+</option>
                    <option value="4">4+</option>
                    <option value="5">5+</option> 
                    ';
                    preg_match_all("/<option value=\"(.*?)\">(.*?)<\/option>/is", $opition_nam, $matches);
                    foreach($matches[2] as $key => $val){
                        $select_ed=" ".set_select('HeThongNapNhienLieu', $val); 
                        if($this->session->userdata('HeThongNapNhienLieu')==$matches[1][$key]||$xemtinban['HeThongNapNhienLieu']==$matches[1][$key]){
                            $select_ed=" selected='selected'";
                        } 
                      echo "
                      <option value='".$matches[1][$key]."'$select_ed>$val</option>
                      ";
                    }
                ?>
            </select>  
            <select name="NoiThat" class="bs-item1 ">
                <option value="">Hướng nhà</option>
                <?
                $opition_nam='
                <option value="Không xác định">Không xác định</option>
                <option value="Đông">Đông</option>
                <option value="Tây">Tây</option>
                <option value="Nam">Nam</option>
                <option value="Bắc">Bắc</option>
                <option value="Đông-Bắc">Đông-Bắc</option>
                <option value="Tây-Bắc">Tây-Bắc</option>
                <option value="Tây-Nam">Tây-Nam</option>
                <option value="Đông-Nam">Đông-Nam</option> 
                ';
                preg_match_all("/<option value=\"(.*?)\">(.*?)<\/option>/is", $opition_nam, $matches);
                foreach($matches[2] as $key => $val){
                    $select_ed=" ".set_select('NoiThat', $val);
                    if($this->session->userdata('NoiThat')==$val||$xemtinban['NoiThat']==$val){
                        $select_ed=" selected='selected'";
                    }
                   
                  echo "
                  <option value='$val'$select_ed>$val</option>
                  ";
                }
                ?>
                
            </select> 
            <select id="ddlProjects" name="TinhTrang" class="bs-item1" >
                <option value="">Dự án</option>
            </select> 
            
            <input type="hidden" name="hddcboWard" id="hddcboWard" value="-1" /> 
            <input type="hidden" name="hddcboStreet" id="hddcboStreet" value="-1" /> 
            <input type="hidden" name="hddcboDirection" id="hddcboDirection" value="-1" /> 
            <input type="hidden" name="hddcboRoom" id="hddcboRoom" value="-1" /> 
            <input type="hidden" name="hddcboProject" id="hddcboProject" value="-1" /> 
        </div>
        <div class="bs-action">
            <div class="bs-advance"><a id="hplAdvance" href="javascript://" onclick="return $('#bs-advance').toggle()">Tìm kiếm nâng cao</a></div>
            <div class="bs-search">
                <a class="btn btn-success btn-sm btnsearch" onclick="autoSearch()" href="javascript://">Tìm kiếm</a>
            </div>
        </div>
    </div>
</div>
</form>



<script type="text/javascript">
    $(function () {
        var cnt = 0;
        $("#KeyDownEnterHome").keyup(function (event) {
            if (event.keyCode == 13 && cnt > 0) {
                cnt = 0;
                window.__doPostBack('lbtSearch', '');
            }
            else if (event.keyCode == 13) {
                cnt++;
            }
        });
    });
</script> 
<script src="/style/js/PostNews.min.js?v=120151126" type="text/javascript"></script>
<?
    if($this->input->post('NamSX')!=''){
        $quan=$this->input->post('NamSX');
    }elseif($this->session->userdata('NamSX')!=''){
        $quan=$this->session->userdata('NamSX');
    }else{
        $quan=$xemtinban['NamSX'];
    }
    if($quan!=''||$this->session->userdata('DoiXe')){  
         echo "<script>GetArea('GetDistrict','cityCode',$('#ddlCity').find('option:selected').attr('data-key'),'ddlDistrict','Quận/Huyện','$quan',false);</script>";
    } 
    ?>
    <?
    if($this->input->post('XuatXu')!=''){
        $phuong=$this->input->post('XuatXu');
    }elseif($this->session->userdata('XuatXu')!=''){
        $phuong=$this->session->userdata('XuatXu');
    }else{
        $phuong=$xemtinban['XuatXu'];
    } 
    ?>
    <?
    if($this->input->post('PhanHang')!=''){
        $duong=$this->input->post('PhanHang');
    }elseif($this->session->userdata('PhanHang')!=''){
        $duong=$this->session->userdata('PhanHang');
    }else{
        $duong=$xemtinban['PhanHang'];
    }  
    ?>
                            
    <?
    if($this->input->post('TinhTrang')!=''){
        $duan=$this->input->post('TinhTrang');
    }elseif($this->session->userdata('TinhTrang')!=''){
        $duan=$this->session->userdata('TinhTrang');
    }else{
      if(!isset($duan)){
        $duan=$xemtinban['TinhTrang'];
      }
    }  
?>
<script type="text/javascript">

    //$(document).ready(function () {
    //    $(".various").fancybox({
    //        type: 'iframe',
    //        href: '/xem-truoc.htm',
    //        maxWidth: 800,
    //        maxHeight: 800,
    //        fitToView: true,
    //        width: '90%',
    //        height: '90%',
    //        autoSize: true,
    //        closeClick: false,
    //        openEffect: 'none',
    //        closeEffect: 'none',
    //        padding: 0
    //    });
    //});
    $('select').select2({
        matcher: function (params, data) {
            if ($.trim(params.term) === '') {
                return data;
            }
            var _keyword = UnicodeToKoDau(data.text.toLowerCase());
            var _text = UnicodeToKoDau(params.term.toLowerCase());
            if (_keyword.indexOf(_text) == 0) {
                var modifiedData = $.extend({}, data, true);
                modifiedData.text;
                return modifiedData;
            }
            return null;
        }
    });
    $('#ddlCity').on('change', function (event) { 
    // console.log(1, event.showLocation)
        GetArea('GetDistrict','cityCode',$('option:selected', this).attr('data-key'),'ddlDistrict','Quận/Huyện',''); 
    });
    $('#ddlDistrict').on('change', function (event) { 
        console.log(1, event.showLocation)
        GetArea('GetWard','distId',$('option:selected', this).attr('data-key'),'ddlWard','Phường/Xã','<? echo $phuong;?>');   
        GetArea('GetStreet','distId',$('option:selected', this).attr('data-key'),'ddlStreets','Đường/Phố','<? echo $duong;?>');        
        GetArea('GetProject','distId',$('option:selected', this).attr('data-key'),'ddlProjects','-- Chọn Dự án --','<? echo $duan;?>'); 
    }); 
    $('#ddlWard').on('change', function () {
        $("#hddcboWardP").val($('#ddlWard').find('option:selected').attr('data-key')); 
        $("#hddWardPrefix").val($('#ddlWard').find('option:selected').attr('wardprefix')); 
        $("#hddcboStreetP").val(-1);  
    }); 
    $('#ddlStreets').on('change', function () {
        $("#hddcboStreetP").val($('#ddlStreets').find('option:selected').attr('data-key')); 
        $('#hddStreetPrefix').val($('#ddlStreets').find('option:selected').attr('streetprefix'));  
    });  

    //// managage back button click (and backspace)
    //var count = 0; // needed for safari
    //window.onload = function () {
    //    if (typeof history.pushState === "function") {
    //        history.pushState("back", null, null);
    //        window.onpopstate = function () {
    //            history.pushState('back', null, null);
    //            if (count == 1) { window.location = window.location; }
    //        };
    //    }
    //}
    //setTimeout(function () { count = 1; }, 200);
    <?
    if($this->input->post('hddCanBan')==449||(isset($HangXe['MenuCha'])&&$HangXe['MenuCha']==449)||(isset($HangXe['IDBaiViet'])&&$HangXe['IDBaiViet']==449)){
            echo "$(document).ready(function(){ $('#divSellList').click(); $('#divSellList').addClass('bs-tab-active'); $('#divRentList').removeClass('bs-tab-active'); });";
        }elseif($this->input->post('hddCanBan')==451||(isset($HangXe['MenuCha'])&&$HangXe['MenuCha']==451)||(isset($HangXe['IDBaiViet'])&&$HangXe['IDBaiViet']==451)){
            echo "$(document).ready(function(){ $('#divRentList').click(); $('#divRentList').addClass('bs-tab-active'); $('#divSellList').removeClass('bs-tab-active'); });";
        }else{
            echo '$(document).ready(function(){$("#divSellList").click();  });';
       }
    ?>
</script>