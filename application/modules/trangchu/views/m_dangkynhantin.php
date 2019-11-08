

<script type="text/javascript" > 
<? 
                                   $opition_nam_ban='<option value="Thỏa thuận">Thỏa thuận</option><option value="Triệu">Triệu</option><option value="Tỷ">Tỷ</option><option value="Cây vàng">Cây vàng</option><option value="USD">USD</option><option value="USD/m²">USD/m²</option><option value="Trăm nghìn/m²">Trăm nghìn/m²</option><option value="Triệu/m²">Triệu/m²</option><option value="Chỉ vàng/m²">Chỉ vàng/m²</option><option value="Cây vàng/m²">Cây vàng/m²</option>';
                                    $opition_nam_thue='<option value="Thỏa thuận">Thỏa thuận</option><option value="Trăm nghìn/tháng">Trăm nghìn/tháng</option><option value="Triệu/tháng">Triệu/tháng</option><option value="USD/tháng">USD/tháng</option><option value="USD/m²/tháng">USD/m²/tháng</option><option value="Trăm nghìn/m²/tháng">Trăm nghìn/m²/tháng</option><option value="Triệu/m²/tháng">Triệu/m²/tháng</option><option value="Nghìn/m²/tháng">Nghìn/m²/tháng</option> ';
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
        
          $("#hddECate").html('<option value="">Loại bất động sản</option>'+response);    
          if(HangXe==449){
             dataSoKM='<? echo $opition_nam_ban;?>';
          }
          if(HangXe==451){
             dataSoKM='<? echo $opition_nam_thue;?>';
          }
             $("#dvtEPrice").html('<option value="">Đơn vị tính</option>'+dataSoKM); 
       }            
    });
}
function autoSearch(){
    if($("#divSell").hasClass('tab-active')){
        $("#adminForm2").attr('action','/nha-dat-ban');  
    }else{
        $("#adminForm2").attr('action','/nha-dat-cho-thue');  
    }
    document.getElementById('adminForm2').submit();
}
</script>
<div class="email-send page-content">
        <div class="tit">
            <span class="content-tit">Đăng ký nhận tin rao</span>
        </div>
        <div class="email-send-content">
            <div class="tansuat" style="padding: 0px;margin: 0px;display: none;">
                
            </div>
            <div class="send-item">
                <div class="send-label">Loại tin rao(*)</div> 
                <div class="send-select">
                    <select id="hddEType" onchange="getDoiXe($(this).val());">
                        <option>Loại tin rao</option>
                        <option value="449">Nhà đất bán</option>
                    <option value="451">Nhà đất cho thuê</option>
                    </select>
                </div> 
                <div class="clear"></div>
            </div>
            <div class="send-item">
                <div class="send-label">Loại nhà đất(*)</div>
                <div class="send-select">
                    <select id="hddECate" onchange="EmailChangeValue('Cate',$(this).val())">
                        <option>Loại nhà đất</option>
                    </select>
                </div> 
                <div class="clear"></div>
            </div>
            <div class="send-item">
                <div class="send-label">Tỉnh/Thành Phố(*)</div>
                <div class="send-select">
                    <select id="hddECity" onchange="EmailChangeCity($(this).val())">
                        <option>Tỉnh/Thành Phố</option>
                        <?
$arr = file_get_contents(APPPATH . 'includes/DSTinhThanhKey.txt');
foreach(json_decode($arr,true) as $key=>$val){
    $select_ed=" ".set_select('DoiXe', $val['Text']);
                                        if($tinban['DoiXe']==$val['Text']){
                                            $select_ed=" selected='selected'";
                                        }
    echo '
    <option value="'.$val['Text'].'" data-key="'.$val['Id'].'" '.$select_ed.'>'.$val['Text'].'</option>    ';
}
?>
                    </select>
                </div> 
                <div class="clear"></div>
            </div>
            <div class="send-item">
                <div class="send-label">Quận/Huyện(*)</div>
                <div class="send-select">
                    <select id="hddEDist" onchange="EmailChangeDistrict($(this).val())">
                        <option>Quận/Huyện</option>
                    </select>
                </div> 
                <div class="clear"></div>
            </div>
            <div class="send-item">
                <div class="send-label">Diện tích</div>
                <div class="send-select">
                    <select id="hddEArea" onchange="EmailChangeValue('Area',$(this).val())">
                        <option>Diện tích</option><?
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
                                    foreach($matches[2] as $key => $val){
                                        $select_ed=" ".set_select('NgoaiThat', $val); 
                                      echo "
                                      <option value='".$matches[1][$key]."'$select_ed>$val</option>
                                      ";
                                    }
                                    ?>
                    </select>
                </div> 
                <div class="clear"></div>
            </div>
            <div class="send-item">
                <div class="send-label">Số phòng ngủ</div>
                <div class="send-select">
                    <select id="hddERoom" onchange="EmailChangeValue('Room',$(this).val())">
                        <option>Số phòng ngủ</option><?
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
                                      echo "
                                      <option value='".$matches[1][$key]."'$select_ed>$val</option>
                                      ";
                                    }
                                    ?>
                    </select>
                </div> 
                <div class="clear"></div>
            </div>
            <div class="send-item">
                <div class="send-label">Mức giá</div>
                <div class="send-select">
                    <select id="hddEPrice" onchange="EmailChangeValue('Price',$(this).val())">
                        <option>Mức giá</option><?
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
                                    foreach($matches[2] as $key => $val){
                                        $select_ed=" ".set_select('GiaTien', $val); 
                                      echo "
                                      <option value='".$matches[1][$key]."'$select_ed>$val</option>
                                      ";
                                    }
                                    ?>
                    </select>
                </div> 
                <div class="clear"></div>
            </div>
            <div class="send-item">
                <div class="send-label">Đơn vị tính</div>
                <div class="send-select">
                    <select id="dvtEPrice" onchange="EmailChangeValue('Room',$(this).val())">
                        <option>Đơn vị tính</option> 
                    </select>
                </div> 
                <div class="clear"></div>
            </div>
            <div class="send-item">
                <div class="send-label">Phường/Xã</div>
                <div class="send-select">
                    <select id="hddEWard" onchange="EmailChangeValue('Ward',$(this).val())">
                        <option>Phường/Xã</option>
                    </select>
                </div> 
                <div class="clear"></div>
            </div>
            <div class="send-item">
                <div class="send-label">Đường/Phố</div>
                <div class="send-select">
                    <select id="hddEStreet" onchange="EmailChangeValue('Street',$(this).val())">
                        <option>Đường/Phố</option>
                    </select>
                </div> 
                <div class="clear"></div>
            </div>
            
            <div class="send-item">
                <div class="send-label">Hướng nhà</div>
                <div class="send-select">
                    <select id="hddEDirection" onchange="EmailChangeValue('Direction',$(this).val())">
                        <option>Hướng nhà</option><?
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
                                        if($tinban['NoiThat']==$val){
                                            $select_ed=" selected='selected'";
                                        }
                                       
                                      echo "
                                      <option value='$val'$select_ed>$val</option>
                                      ";
                                    }
                                    ?>
                    </select>
                </div> 
                <div class="clear"></div>
            </div>
            <div class="send-item">
                <div class="send-label">Dự án bất động sản</div>
                <div class="send-select">
                    <select id="hddEProject" onchange="EmailChangeValue('Project',$(this).val())">
                        <option>Dự án bất động sản</option>
                    </select>
                </div> 
                <div class="clear"></div>
            </div> 
            <div class="send-item info-item">
                <div class="send-label">Email</div>
                <div class="nhan-input">
                    <input name="txtEmailRegister" type="text" id="txtEmailRegister" />
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        
        <div class="email-send-footer">
            <a href="javascript:ResetBoxSearch();">
                <div class="btnCancel">
                    <img src="/style/mobile/images/i-btn-cancel.png" />
                </div>
            </a>

            <a class="submit" id="aRegisEmail" onclick="RegisterEmailLetter();">
                <div class="btnCancel">
                    <img src="/style/mobile/images/btn_SendRequest.png" />
                </div>
            </a>

        </div>
    </div>

<script src="/style/js/PostNews.min.js?v=120151126" type="text/javascript"></script>

<script type="text/javascript">
function GetArea(module,code,val,fill,text,set){
    $.ajax
    ({ 
       type: "POST",
       url: "/chon-mau-xe?module="+module+"&"+code+"="+val, 
       success: function(response)
       {
           $("#"+fill).html('<option value="">'+text+'</option>')
           $("#"+fill).append(response); 
           
       }            
    });
}
function RegisterEmailLetter() {
    var n;
    if (!validateEmailLetter()) return !1;
    $(".fajaxload").show();
    n = 0;
    $("#rdE2").attr("checked") ? n = 1 : $("#reE3").attr("checked") && (n = 2);
    var t = $("#hddECate").val(),
        i = $("#hddECity").val(),
        r = $("#hddEDist").val(),
        u = $("#hddEArea").val(),
        f = $("#hddEPrice").val(),
        e = $("#hddEWard").val(),
        o = $("#hddEStreet").val(),
        s = $("#hddERoom").val(),
        h = $("#hddEDirection").val(),
        c = $("#hddEProject").val(),
        l = $("#txtEmailTitle").val(),
        a = $("#txtEmailRegister").val(),
        v = {
            Frequency: n,
            hddECate: t,
            hddECity: i,
            hddEDist: r,
            hddEArea: u,
            hddEPrice: f,
            hddEWard: e,
            hddEStreet: o,
            hddERoom: s,
            dvtEPrice: $("#dvtEPrice").val(),
            hddEDirection: h,
            hddEProject: c, 
            txtEmailRegister: a
        };
    $.ajax({
        type: "POST",
        url: "/Handler/EmailLetterHandler.ashx",
        data: v,
        success: function(n) {
            n == 1 ? (alert("Đăng ký nhận tin thành công!"), $(".fajaxload").hide(), $.fancybox.close()) : n == 2 ? (alert("Email này đã được đăng ký rồi. Cảm ơn bạn !"), $(".fajaxload").hide(), $.fancybox.close()) : (alert("Có lỗi xảy ra trong quá trình đăng ký. Vui lòng thử lại sau!"), $(".fajaxload").hide(), $.fancybox.close())
        }
    })
}

function validateEmailLetter() {
    if ($("#hddEType").val() == "") return alert("Bạn phải chọn loại tin rao."), !1;
    if ($("#hddECate").val() == "") return alert("Bạn phải chọn loại nhà đất."), !1;
    if ($("#hddECity").val() == "") return alert("Bạn phải chọn Tỉnh/Thành phố."), !1;
    if ($("#hddEDist").val() == "") return alert("Bạn phải chọn Quận/Huyện."), !1;
    //if ($.trim($("#txtEmailTitle").val()) == "") return alert("Bạn phải nhập tiêu đề."), document.getElementById("txtEmailTitle").focus(), !1;
    var n = $("#txtEmailRegister").val();
    return /.+@.+\.[a-zA-Z]{2,4}$/.test(n) ? !0 : (alert("Email sai định dạng,bạn hãy nhập lại"), $("#txtEmailRegister").focus(), !1)
}
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
    $('#hddECity').on('change', function () {  
        GetArea('GetDistrict','cityCode',$('option:selected', this).attr('data-key'),'hddEDist','Quận/Huyện',''); 
    });
    $('#hddEDist').on('change', function () { 
        GetArea('GetWard','distId',$('option:selected', this).attr('data-key'),'hddEWard','Phường/Xã','');   
        GetArea('GetStreet','distId',$('option:selected', this).attr('data-key'),'hddEStreet','Đường/Phố',''); 
        GetArea('GetProject','distId',$('option:selected', this).attr('data-key'),'hddEProject','-- Chọn Dự án --','');  
    }); 
    $('#hddEWard').on('change', function () {
        $("#hddcboWardP").val($('#hddEWard').find('option:selected').attr('data-key')); 
        $("#hddWardPrefix").val($('#hddEWard').find('option:selected').attr('wardprefix')); 
        $("#hddcboStreetP").val(-1);  
    }); 
    $('#hddEStreet').on('change', function () {
        $("#hddcboStreetP").val($('#hddEStreet').find('option:selected').attr('data-key')); 
        $('#hddStreetPrefix').val($('#hddEStreet').find('option:selected').attr('streetprefix'));  
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
    $("#divSell").click();
</script>