<script>
    $(document).ready(function () {
        var cityCPLBData = JSON.parse('{ "jsonData" : [{"Text": "Hà Nội", "Value": "HN"},{"Text": "TP.Hồ Chí Minh", "Value": "SG"},{"Text": "Tỉnh thành khác", "Value": "0"}]}');
        var finishCPLB = function (city) {
            var price = <? echo $xemtinban['GiaTien'];?>;
            var phiDangKiem = $("#chkPhiDangKiemLuuHanh").attr("checked") == "checked";
            var phiBaoTriDuongBo = $("#chkPhiBaoTriDuongBo").attr("checked") == "checked";
            var baoHiemVatChatXe = $("#chkBaoHiemVatChatXe").attr("checked") == "checked";
            var baoHiemDanSu = $("#chkBaoHiemDanSu").attr("checked") == "checked";
            var productionYear = 2015;
            var xeMoi = 'Mới' == 'Mới' ? true : false;
            var numberOfSeat = 5;

            $.get("/cost/calculator", {
                    GiaXe: price,
                    NamDangKy: productionYear,
                    XeMoi: xeMoi,
                    SoChoNgoi: numberOfSeat,
                    TinhThanhPho: city,
                    TinhPhiDangKiem: phiDangKiem,
                    TinhPhiBaoTriDuongBo: phiBaoTriDuongBo,
                    TinhPhiBaoHiemVatChatXe: baoHiemVatChatXe,
                    TinhPhiBaoHiemTrachNhiemDanSu: baoHiemDanSu
                }, function(result) {
                    result=JSON.parse(result);
                    $("#spPhiTruocBa").text(result.PhiTruocBa);
                    $("#spPhiDangKiemLuuHanh").text(result.PhiDangKiemLuuHanh);
                    $("#spPhiBaoTriDuongBo").text(result.PhiBaoTriDuongBo);
                    $("#spBaoHiemVatChatXe").text(result.BaoHiemVatChatXe);
                    $("#spBaoHiemDanSu").text(result.BaoHiemTrachNhiemDanSu);
                    $("#spPhiBienSoXe").text(result.PhiBienSoXe);
                    $("#spPhiSangTenDoiChu").text(result.PhiSangTenDoiChu);
                    $("#spTong").text(result.Tong);
                });
        };
        
        $('#CityCPLB').combogridcitycplb(cityCPLBData.jsonData, 'HN', 'Hà Nội', 212, 'ddlCity1', 'CityCPLBContainer', 'Hà Nội', finishCPLB);
        finishCPLB('HN');
        $(".chiphilanbanh .rowitem input[type='checkbox']").click(function () {
            finishCPLB($('#ddlCity1').val());
        });
        
         $(".chiphilanbanh .rowitem input[type='checkbox']").on('ifChecked', function(event){ 
            finishCPLB($('#ddlCity1').val());
         });
         $(".chiphilanbanh .rowitem input[type='checkbox']").on('ifUnchecked', function(event){ 
            finishCPLB($('#ddlCity1').val());
         }); 

        $(".rowitem").myTooltipHover();
    });
</script>

<div class="chiphilanbanh">
    <div class="title oswaldlarge-title"><h2>Ước tính chi phí lăn bánh</h2></div> 
    <div class="rowitem total">
        <label>Tổng cộng (Xe + Phí)</label>
        <span id="spTong" style="width: 164px !important"></span>
    </div>   
    <div class="location">
        <label>Nơi mua</label>
        <div id="CityCPLB"></div> 
    </div>     
    <div class="rowitem">
        <label>Giá xe</label>
        <span id="data-price" data-price="<? echo $xemtinban['GiaTien'];?>"><? echo giaca($xemtinban['GiaTien']);?> VNĐ</span>
    </div>
    <div class="rowitem" data-title="Đối với xe mới:\nHà Nội: 12%\nTP. HCM: 10%\nTỉnh thành khác: 10%\nĐối với xe cũ: 2%"> 
        <label><input type="checkbox" id="chkPhiTruocBa" disabled="disabled" checked="checked" /> Phí trước bạ</label>
        <span id="spPhiTruocBa"></span>
    </div>
    <div class="rowitem"> 
        <label><input type="checkbox" id="chkPhiDangKiemLuuHanh" checked="checked" /> Phí đăng kiểm</label>
        <span id="spPhiDangKiemLuuHanh"></span>
    </div>
    <div class="rowitem">
        
        <label><input type="checkbox" id="chkPhiBaoTriDuongBo" checked="checked" /> Phí bảo trì đường bộ</label>
        <span id="spPhiBaoTriDuongBo"></span>
    </div>
    <div class="rowitem" data-title="= 1.5% giá xe">
        
        <label><input type="checkbox" id="chkBaoHiemVatChatXe" checked="checked" /> Bảo hiểm vật chất xe</label>
        <span id="spBaoHiemVatChatXe"></span>
    </div>
    <div class="rowitem">
        
        <label><input type="checkbox" id="chkBaoHiemDanSu" checked="checked" /> Bảo hiểm dân sự</label>
        <span id="spBaoHiemDanSu"></span>
    </div>
    <div class="rowitem" data-title="Đối với xe mới:\nHà Nội: 20,000,000 VNĐ\nTP. HCM: 2,000,000 VNĐ\nTỉnh thành khác: 1,000,000 VNĐ">
        
        <label><input type="checkbox" id="chkPhiBienSoXe" disabled="disabled" checked="checked" /> Phí biển số</label>
        <span id="spPhiBienSoXe"></span>
    </div>
    <div class="rowitem">
        
        <label><input type="checkbox" id="chkPhiSangTenDoiChu" disabled="disabled" checked="checked" /> Phí sang tên đổi chủ</label>
        <span id="spPhiSangTenDoiChu"></span>
    </div>  
   
    <div class="note" style="margin: 0px;padding: 0px;text-align: justify;padding-top: 10px;">
        Trên đây là một số chi phí cố định quý khách hàng buộc phải trả khi mua và đăng ký xe. Các chi phí khác có thể phát sinh (và không bắt buộc) trong quá trình đăng ký xe.
    </div>
</div>
<script>
    $(document).ready(function () {
        $('selectoption').selectoption();
    });
</script>

<style>
    .chiphilanbanh .rowitem input[type=checkbox] {
        float: left;
        margin: 8px 5px 8px 0px;
    }

    .chiphilanbanh .rowitem label {
        width: 136px !important;
    }

    .chiphilanbanh .rowitem span {
        width: 146px !important;
    }
</style>

            <script src="/style/js/jquery.formatCurrency-1.4.0.js"></script>
<link href="/style/css/jquery.fancybox.css" rel="stylesheet" />
<script src="/style/js/jquery.fancybox.js"></script>
<script>
    $(document).ready(function () {
        $(".pricemask").pricemask();
        $(".numbersOnly2").keyup(function () {
            this.value = this.value.replace(/[^0-9\.]/g, '');
        });
        $(".numbersOnly").keyup(function () {
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        $("#ddlPercent").change(function () {
            calculatorPercent();
        }).change();

        $("#btnCalc").click(function () {            
            var txtTime = $("#txtTime1");
            var txtInterest = $("#txtInterest1");
            var money = $("#data-price-same").attr("data-price");
            var time = txtTime.val();
            var interest = txtInterest.val();
            var timeUnit = $("#timeUnit").val();
            var interestUnit = $("#interestUnit").val();

            if (!time || eval(time) <= 0) {
                alert("Bạn cần nhập thời gian vay!");
                txtTime.focus();

                return;
            }

            if (!interest || eval(interest) <= 0) {
                alert("Bạn cần nhập lãi suất!");
                txtInterest.focus();

                return;
            }

            window.paramLSNN = {
                Amount: money,
                Interest: interest,
                Time: time,
                InterestUnit: interestUnit,
                TimeUnit: timeUnit
            }

            $.fancybox({
                type: "ajax",
                fitToView: false,
                href: "/uoc-tinh-vay-ngan-hang"
            });
        });
    });

    function calculatorPercent() {
        var percent = parseInt($("#ddlPercent").val());
        var price = parseInt($("#data-price").attr("data-price"));
        var pricePercent = (price * percent / 100).toString();
        //var pricePercentConvert = "";
        //var length = pricePercent.length;

        //if (length > 3) {
        //    for (var i = length - 1, j = 1; i >= 0; i--, j++) {
        //        pricePercentConvert = pricePercent[i] + pricePercentConvert;

        //        if (i != 0 && j % 3 == 0) {
        //            pricePercentConvert = "." + pricePercentConvert;
        //        }
        //    }

        //    pricePercentConvert += " VNĐ";
        //}
        
        var pricePercentConvert = formatPrice(pricePercent, ",", "VNĐ");

        $(".same").text(pricePercentConvert);
        $("#data-price-same").attr("data-price", pricePercent);        
    }
</script>

<div class="uoctinhvaynganhang">
    <div class="title oswaldlarge-title">Ước tính vay ngân hàng</div> 
    <div class="rowitem">
        <label>Giá xe</label>
        <span id="data-price" data-price="<? echo $xemtinban['GiaTien'];?>"><? echo giaca($xemtinban['GiaTien']);?> VNĐ</span>
    </div>
    <div class="rowitem">
        <label>Số tiền vay</label>
        <select id="ddlPercent" data-width="195px" class="selectoption select-base" style="width: 195px; height: 30px; border: 1px solid #e8e8e8;">
                <option value="10">10% giá trị xe</option>    
                <option value="15">15% giá trị xe</option>    
                <option value="20">20% giá trị xe</option>    
                <option value="25">25% giá trị xe</option>    
                <option value="30">30% giá trị xe</option>    
                <option value="35">35% giá trị xe</option>    
                <option value="40">40% giá trị xe</option>    
                <option value="45">45% giá trị xe</option>    
                    <option selected="selected" value="50">50% giá trị xe</option>
                <option value="55">55% giá trị xe</option>    
                <option value="60">60% giá trị xe</option>    
                <option value="65">65% giá trị xe</option>    
                <option value="70">70% giá trị xe</option>    
                <option value="75">75% giá trị xe</option>    
                <option value="80">80% giá trị xe</option>    
                <option value="85">85% giá trị xe</option>    
                <option value="90">90% giá trị xe</option>    
                <option value="95">95% giá trị xe</option>    
                <option value="100">100% giá trị xe</option>    
        </select>
    </div>
    <div class="rowitem">
        <label>Tương đương</label>
        <span class="same" id="data-price-same"><? echo str_replace(',','.',number_format($xemtinban['GiaTien']));?> VNĐ</span>
    </div>
    <div class="rowitem">
        <label>Thời gian vay</label>
        <input type="text" id="txtTime1" class="input numbersOnly" placeholder="48" />
        <select id="timeUnit" data-width="125px" class="selectoption select-base" style="width: 125px; height: 30px; border: 1px solid #e8e8e8;">
            <option value="1" selected="selected">Tháng</option>
            <option value="12" >Năm</option>
        </select>
    </div>
    <div class="rowitem">
        <label>Lãi suất (%)</label>
        <input type="text" placeholder="10" id="txtInterest1" class="selectoption1 numbersOnly2" />
        <select id="interestUnit" data-width="125px" class="selectoption select-base" style="width: 125px; height: 30px; border: 1px solid #e8e8e8;">
            <option value="1">Tháng</option>
            <option value="12" selected="selected">Năm</option>
        </select>
    </div>
    <div class="rowitem">
        <label>&nbsp;</label>
        <input type="button" id="btnCalc" class="result" value="XEM KẾT QUẢ">
    </div>
</div>
<script>
    $(document).ready(function () {
        $('selectoption').selectoption();
    });
</script>