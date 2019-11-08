
$.fn.selectoption = function (data, oldValue, datawidth) {
    var html = '';
    var optionhtml = '';
    var id = $(this).attr('id');
    var newValue = -1;
    var newText = '';
    var vWidth = '63px';
    optionhtml = GetFistItemCombo(id, oldValue);
    if (id == "cboCardType") {
        $.each(data, function (index, value) {
            if (value.Id == oldValue) {
                optionhtml += ' <li class="selected" rel="' + value.Id + '">' + value.Text + '</li>';
                newValue = value.Id;
                newText = value.Text;
            }
            else
                optionhtml += ' <li rel="' + value.Id + '">' + value.Text + '</li>';
            $("#hddcboCardType").val(value.Id);
        });
    } else if (id == "cboCity_CM") {
        $.each(data, function (index, value) {
            if (value.Id == oldValue) {
                optionhtml += ' <li class="selected" rel="' + value.Id + '">' + value.Text + '</li>';
                newValue = value.Id;
                newText = value.Text;
            }
            else
                optionhtml += ' <li rel="' + value.Id + '">' + value.Text + '</li>';
            $("#hddcboCity_CM").val(value.Id);
            vWidth = "95px";
        });
    }
    if (newValue == -1) {
        newText = GetTextCombo(id);
    }
    html += ' <div class="section" style="width:' + datawidth + ';" ><span style="width:' + vWidth + ';line-height:13px" class="v-drop">' + newText + '</span><span class="segdart"></span></div>';
    html += ' <div class="pncontainer" style="min-width:' + datawidth + '; display:none;" > ';
    html += ' <ul style="min-width:' + datawidth + '"> ';
    html += optionhtml;
    html += ' </ul> ';
    $("#" + id).html(html);
    $("#hdd" + id).val(newValue);
    $('#' + id + ' .pncontainer li').removeClass('selected');
    $('#' + id + ' .pncontainer li[rel="' + newValue + '"]').addClass('selected');
    $('#' + id + ' .section').click(function () {
        if ($(this).hasClass('sectionactive')) {
            finish();
        } else {
            $(this).addClass('sectionactive');
            $('#' + id + ' .pncontainer').show();
        }
    });

    $('#' + id + ' .pncontainer li:not(.sbDisabled)').click(function () {
        var text = $(this).html();
        var value = $(this).attr('rel');
        $('#' + id + ' .pncontainer li').removeClass('selected');
        $(this).addClass('selected');
        finish(text, value);
    });

    $(document).mouseup(function (e) {
        var container = $("#" + id + ' .pncontainer');
        var container1 = $("#" + id + ' .section');
        if (!container.is(e.target)
            && container.has(e.target).length === 0 && !container1.is(e.target) && container1.has(e.target).length === 0) {
            finish();
        }
    });

    function finish(text, value) {
        if (text != null && text != '') $('#' + id + ' .v-drop').html(text);

        if (value != null && value != '') {
            $('#' + id).change();
            $("#hdd" + id).val(value);
            switch (id) {

                case "cboCardType":
                    {
                        ChangeCardType(value);
                    }
                    break;
                case "cboCity_CM":
                    {
                        ChangeCity(value);
                    }
                    break;
            }
        }
        $('#' + id + ' .pncontainer').hide();
        $('#' + id + ' .section').removeClass('sectionactive');
    }
};


function GetTextCombo(Element) {
    var r = '';
    switch (Element) {
        case "cbopTypeP":
            {
                r = "-- Chọn Loại tin rao --";
                break;
            }
    }
    return r;
}
function GetFistItemCombo(Element, OldValue) {
    var r = '';
    switch (Element) {
        case "cboVipTypeP":
            r = ' <li rel="-1">Loại tin</li>';
            break;
        case "cboStatusP":
            r = ' <li rel="0">Trạng thái</li>';
            break;
    }
    return r;
}

function GetCardType() {
    var html = '';
    html += '[';
    html += '{"Id":"VMS","Text":"Mobifone"},';
    html += '{"Id":"VNP","Text":"Vinaphone"},';
    html += '{"Id":"VTT","Text":"Viettel"},';
    html += '{"Id":"FPT","Text":"FPT Gate"}';
    html += ']';
    var likeReturn = $.parseJSON(html);
    $("#cboCardType").selectoption(likeReturn, "VMS", "176px");
}

function ChangeCardType(item) {
    $("#hddcboCardType").val(item);
}
function GetCity() {
    var html = '';
    html += '[';
    html += '{"Id":"HN","Text":"Hà Nội"},';
    html += '{"Id":"SG","Text":"Hồ Chí Minh"}';
    html += ']';
    var likeReturn = $.parseJSON(html);
    $("#cboCity_CM").selectoption(likeReturn, "HN", "124px");
}

function ChangeCity(item) {
    $("#hddcboCity_CM").val(item);
}

function ValidateData_DirectMoney() {
    var isValidate = true;
    if ($("#txtCashDeliveryAmount").val() == "") {
        $("#spanCashDeliveryAmount").text("Bạn cần nhập số tiền");
        $("#spanCashDeliveryAmount").show();
        isValidate = false;
    }
    //else if (isNaN($("#txtCashDeliveryAmount").val())) {
    //    $("#spanCashDeliveryAmount").text("Bạn cần nhập số tiền đúng định dạng số");
    //    $("#spanCashDeliveryAmount").show();
    //    isValidate = false;
    //}
    else {
        var amount = parseFloat($("#txtCashDeliveryAmount").val().replace(/\,/g, ''));
        if (amount < 200000) {
            $("#spanCashDeliveryAmount").text("Giá trị hợp đồng phải từ 200.000 VND trở lên");
            $("#spanCashDeliveryAmount").show();
            isValidate = false;
        }
        else {
            $("#spanCashDeliveryAmount").hide();
        }
    }
    if ($("#txtName").val() == "") {
        $("#spanHovaten").show();
        isValidate = false;
    }
    else {
        $("#spanHovaten").hide();
    }
    if ($("#txtDienthoai").val() == '') {
        $("#spanDienthoaiCheck").show();
        isValidate = false;
    } else {
        $("#spanDienthoaiCheck").css("display", "none");
        var phoneNumberPattern = /^[(]{0,1}[0-9]{3,5}[)]{0,1}[-\s.]{0,1}[0-9]{3}[-\s.]{0,1}[0-9]{3}$/;
        if (!phoneNumberPattern.test($("#txtDienthoai").val().replace(/ /g, ''))) {
            $("#spanDienthoaiCheck").show();
            isValidate = false;
        }
        else {
            $("#spanDienthoaiCheck").hide();
        }
    }
    if ($("#txtDiachi").val() == "") {
        $("#spanDiachi").show();
        isValidate = false;
    }
    else {
        $("#spanDiachi").hide();
    }

    return isValidate;

}

function ValidateData_Card() {
    var isValidate = true;
    if ($("#txtCardSerial").val() == "") {
        $("#spanCardSerial").show();
        isValidate = false;
    }
    else {
        $("#spanCardSerial").hide();
    }

    if ($("#txtCard_PhoneNumber").val() == '') {
        $("#spanCard_PhoneNumber").show();
        isValidate = false;
    } else {
        $("#spanCard_PhoneNumber").css("display", "none");
        var phoneNumberPattern = /^[(]{0,1}[0-9]{3,5}[)]{0,1}[-\s.]{0,1}[0-9]{3}[-\s.]{0,1}[0-9]{3}$/;
        if (!phoneNumberPattern.test($("#txtCard_PhoneNumber").val().replace(/ /g, ''))) {
            $("#spanCard_PhoneNumber").show();
            isValidate = false;
        }
        else {
            $("#spanCard_PhoneNumber").hide();
        }
    }
    if ($("#txtCardCode").val() == "") {
        $("#spanCardCode").show();
        isValidate = false;
    }
    else {
        $("#spanCardCode").hide();
    }
    if ($("#txtContent").val() == "") {
        $("#spanContent").show();
        isValidate = false;
    }
    else {
        $("#spanContent").hide();
    }

    return isValidate;
}

GetCardType();
GetCity();

$(document).ready(function () {
    $('.accordion-section-title').click(function (e) {
        var currentAttrValue = $(this).attr('href');
        $('.accordion-section-title').each(function () {
            if (currentAttrValue != $(this).attr('href')) {
                $('.accordion ' + $(this).attr('href')).slideUp(300).removeClass('open');
                $(this).removeClass('active');
            }

        })
        //   $('.accordion').slideUp(300).removeClass('open');
        if ($('.accordion ' + currentAttrValue).hasClass("open")) {
            $('.accordion ' + currentAttrValue).slideUp(300).removeClass('open');
            $(this).removeClass('active');
        }
        else {
            $(this).addClass('active');
            $('.accordion ' + currentAttrValue).slideDown(300).addClass('open');

        }

        e.preventDefault();
    });
    if (currentUserId != null && currentUserId != "0") {
        $('#bankTransferContent').text('Mã khách hàng : ' + currentUserId);
    }
    else if ($('#dvProductID').text() != "")
    {
        $('#bankTransferContent').text('Mã tin đăng : ' + $('#dvProductID').text());
    }
    else if (currentCusPhone != "") {
        $('#bankTransferContent').text('Điện thoại : ' + currentCusPhone);
    }

    $('#txtCashDeliveryAmount').keyup(function (event) {

        // skip for arrow keys
        if (event.which >= 37 && event.which <= 40) return;

        // format number
        $(this).val(function (index, value) {
            return value
                .replace(/\D/g, '')
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
            ;
        });
    });

});
