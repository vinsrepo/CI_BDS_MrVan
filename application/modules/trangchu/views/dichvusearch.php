 

<script type="text/javascript" > 

function getLoainha(HangXe){
    
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
</script>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>

</title></head>
<body>
    <div class="contact_form text-white">
        <div class="form_content">
            <div class="form_header">
                <h2 class="bolder">Bạn đang muốn tìm bất động sản?</h2>
                <p>Hãy điền thông tin bên dưới, chúng tôi sẽ giúp bạn tìm</p>
            </div>
            <?php echo validation_errors(); ?>
            <?php //echo form_open('form'); ?>
            <form method="post" class="form_body" id="frmContact">
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <input name="f_hoten" id="f_hoten" type="text" class="form-control" placeholder="Họ và tên*">
                    </div>
                    <div class="col-md-4 mb-3">
                        <input name="f_email" id="f_email" type="email" class="form-control" placeholder="Email*">
                    </div>
                    <div class="col-md-4 mb-3">
                        <input name="f_sophone" id="f_sophone" type="text" class="form-control" placeholder="Số điện thoại*">
                    </div>                    
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <select class="custom-select" name="hddECity" id="hddECity">
                            <option value="">Tỉnh/Thành Phố</option>
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
                    <div class="col-md-4 mb-3">
                        <select class="custom-select" name="hddEDist" id="hddEDist">
                            <option value="">Chọn Quận/huyện</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <input name="hddEPrice" id="hddEPrice" type="text" class="form-control" placeholder="Giá">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <select name="hddEType" id="hddEType" onchange="getLoainha($(this).val());" class="custom-select">
                            <option value="">--Loại Tin Rao--</option>
                            <option value="449">Nhà đất bán</option>
                            <option value="451">Nhà đất cho thuê</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <select class="custom-select" name="hddECate" id="hddECate">
                            <option value="">--Loại BĐS--</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <select class="custom-select" name="hddEArea" id="hddEArea"  >
                            <option value="">Diện tích</option><?
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
                </div>
                <div class="form-row" style="width: 200px; margin: 0 auto; padding-top: 20px;">
                    <button class="btn_sent" type="submit">Gửi Thông Tin</button>
                </div>
                <div>&nbsp;</div>
                <!-- <div class="form-row" style="width: 200px; margin: 0 auto">
                    <p style="margin: 0 auto;">
                        Hotline: <i><?php //echo $data->{'DienThoai'};?></i>
                    </p>
                    
                </div> -->
            </form>
        </div>
    </div>   
</body>
</html> 
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
$('.btn_sent').click(function(){
    var rules = $('#frmContact').validate({
        rules: {
            f_hoten: {
                required: true,
            },
            f_email: {
                required: true,
                email: true
            },
            f_sophone: {
                required: true,
                number: true,
                rangelength: [9, 11]
            }
        },
        messages: {
            f_hoten: {
                required: "Vui lòng nhập họ tên",
            },
            f_email: {
                required: "Vui lòng nhập email",
                email: "Email không đúng định đạng",
            },
            f_sophone: {
                required: "Vui lòng nhập số điện thoại",
                number: "Số điện thoại phải có định dạng số",
                rangelength: "Số điện thoại có độ dài từ 9 đến 11 ký tự",
            }
        },
        submitHandler: function (form) {
            var ht = $("#f_hoten").val(),
            pn = $("#f_sophone").val(),
            em = $("#f_email").val(),
            t = $("#hddECate").val(),
            i = $("#hddECity").val(),
            r = $("#hddEDist").val(),
            u = $("#hddEArea").val(),
            f = $("#hddEPrice").val(),
            v = {
                hddEName: ht,
                hddEPhone: pn,
                hddEEmail: em,
                hddECate: t,
                hddECity: i,
                hddEDist: r,
                hddEArea: u,
                hddEPrice: f,
            };
            $.ajax({
                type: "POST",
                url: "contact",
                data: v,
                success: function(n) {
                    if(n == 1) {
                        alert("Đăng ký thành công! Chúng tôi sẽ sớm liên hệ với bạn");
                        location.reload();
                    }
                    else {
                        alert("Có lỗi trong quá trình đăng ký. Vui lòng thử lại");
                    }            
                }
            })
        }
    });  
})


$('#hddECity').on('change', function () {  
    GetArea('GetDistrict','cityCode',$('option:selected', this).attr('data-key'),'hddEDist','Quận/Huyện',''); 
});
$('#hddEDist').on('change', function () { 
    GetArea('GetWard','distId',$('option:selected', this).attr('data-key'),'hddEWard','Phường/Xã','');   
    GetArea('GetStreet','distId',$('option:selected', this).attr('data-key'),'hddEStreet','Đường/Phố',''); 
    GetArea('GetProject','distId',$('option:selected', this).attr('data-key'),'slEProject','-- Chọn Dự án --','');  
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
  
</script>