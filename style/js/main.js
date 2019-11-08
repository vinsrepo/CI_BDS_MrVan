$(document).ready(function () {
$('input').iCheck({
    checkboxClass: 'icheckbox_square-blue',
    radioClass: 'iradio_square-blue',
    increaseArea: '20%' // optional
  });
});
//Mảng lưu những từ khóa khi đăng ký không được chứa.
var validUserName = ["acura", "alfaromeo", "asia", "astonmartin", "audi", "bentley", "bmw", "buick", "byd", "cadillac", "changan", "chery", "chevrolet", "chrysler", "citroen", "daewoo", "daihatsu", "dodge", "eagle", "ferrari", "fiat", "ford", "gaz", "geely", "geo", "gmc", "haima", "honda", "hummer", "hyundai", "infiniti", "isuzu", "jaguar", "jeep", "kia", "lada", "lamborghini", "lancia", "landrover", "lexus", "lifan", "lincoln", "lotus", "luxgen", "man", "maserati", "maybach", "mazda", "mekong", "mercury", "mg", "mini", "mitsubishi", "nissan", "oldsmobile", "opel", "peugeot", "plymouth", "pontiac", "porsche", "proton", "renault", "rover", "saab", "samsung", "santana", "saturn", "scion", "seat", "skoda", "smart", "ssangyong", "subaru", "suzuki", "sym", "thaco", "toyota", "vinaxuki", "volkswagen", "volvo", "tata", "hino", "uaz", "xechuyêndùng", "xechuyendung", "pmc", "xetải", "rolls-royce", "tobe", "veammotor", "mclaren", "admin", "banxehoi", "bxh","auto","salon","saloon","salons"];
function contains(str) {
    str = str.replace(/([^\w\dàáảãạâầấẩẫậăằắẳẵặèéẻẽẹêềếểễệđìíỉĩịòóỏõọôồốổỗộơờớởỡợùúủũụưừứửữựỳýỷỹỵÀÁẢÃẠÂẦẤẨẪẬĂẰẮẲẴẶÈÉẺẼẸÊỀẾỂỄỆĐÌÍỈĨỊÒÓỎÕỌÔỒỐỔỖỘƠỜỚỞỠỢÙÚỦŨỤƯỪỨỬỮỰỲÝỶỸỴÂĂĐÔƠƯ\d]+)/g, '').replace('/', '').toLowerCase();
    for (var i = 0; i < validUserName.length; i++) {
        if (str.indexOf(validUserName[i]) != -1) {
            return false;
        }
    }
    return true;
};

$.fn.mousehover = function () {
    $(this).mouseenter(function () {
        $(this).addClass('itemcaractive');

        var save = $(this).find('.luuxe');
        var id = save.attr('id');
        if (save.hasClass('iconsaved')) {
            save.removeClass('iconsaved').addClass('iconremove');
            save.html('Bỏ lưu |');
            save.attr('onclick', 'RemoveSaved(this,' + id + ')');
        }

    }).mouseleave(function () {
        $(this).removeClass('itemcaractive');

        var save = $(this).find('.luuxe');
        var id = save.attr('id');
        if (save.hasClass('iconremove')) {
            save.removeClass('iconremove').addClass('iconsaved');
            save.html('Đã lưu');
            save.removeAttr('onclick');
        }
    });
};
function onlynumber(_this) {
    _this.value = _this.value.replace(/[^0-9\.]/g, '');
    $(_this).attr('style', '');
    $('#' + $(_this).attr('id') + '_validatett').remove();
    $('#errorflag').html();
    if (_this.value != '' && _this.value.length < 10) {
        $(_this).attr('style', 'border:1px solid red');
        marginleft = $(_this).position().left;
        $(_this).parent().after('<div id="' + $(_this).attr('id') + '_validatett" class="validatetooltipsellform" style="margin-left:' + marginleft + 'px">Số điện thoại không đúng</div>');
        $('#errorflag').html($(_this).attr('id'));
        return;
    }
    else if (_this.value == '') {
        $(_this).attr('style', 'border:1px solid red');
        marginleft = $(_this).position().left;
        $(_this).parent().after('<div id="' + $(_this).attr('id') + '_validatett" class="validatetooltipsellform" style="margin-left:' + marginleft + 'px">Số điện thoại không được để trống</div>');
        $('#errorflag').html($(_this).attr('id'));
        return;
    }
};
function onlyemail(_this) {
    $(_this).attr('style', '');
    $('#' + $(_this).attr('id') + '_validatett').remove();
    $('#errorflag').html();
    if (_this.value != '' && !/.+@.+\.[a-zA-Z]{2,4}$/.test(_this.value)) {
        $(_this).attr('style', 'border:1px solid red');
        marginleft = $(_this).position().left;
        $(_this).parent().after('<div id="' + $(_this).attr('id') + '_validatett" class="validatetooltipsellform" style="margin-left:' + marginleft + 'px">Sai định dạng email</div>');
        $('#errorflag').html($(_this).attr('id'));
        return;
    }
    else if (_this.value == '') {
        $(_this).attr('style', 'border:1px solid red');
        marginleft = $(_this).position().left;
        $(_this).parent().after('<div id="' + $(_this).attr('id') + '_validatett" class="validatetooltipsellform" style="margin-left:' + marginleft + 'px">Email không được để trống</div>');
        $('#errorflag').html($(_this).attr('id'));
        return;
    }
};
function MyDateDiff(date1, date2, interval) {
    var second = 1000, minute = second * 60, hour = minute * 60, day = hour * 24, week = day * 7;
    date1 = new Date(date1);
    date2 = new Date(date2);
    var timediff = date2 - date1;
    if (isNaN(timediff)) return NaN;
    switch (interval) {
        case "years": return date2.getFullYear() - date1.getFullYear();
        case "months": return (
            (date2.getFullYear() * 12 + date2.getMonth())
            -
            (date1.getFullYear() * 12 + date1.getMonth())
        );
        case "weeks": return Math.floor(timediff / week);
        case "days": return Math.floor(timediff / day);
        case "hours": return Math.floor(timediff / hour);
        case "minutes": return Math.floor(timediff / minute);
        case "seconds": return Math.floor(timediff / second);
        default: return undefined;
    }
}
function VNDate2Date(strDate) {
    var tmp = strDate.split('/');
    return date = tmp[1] + '/' + tmp[0] + '/' + tmp[2];
}
$.fn.formatCurrencyWidthDot = function () {
    var val = $(this).val().replace(/\./g, '').replace(/,/g, '');
    $(this).val(val).formatCurrency({ roundToDecimalPlace: -1, symbol: '' });
    val = $(this).val().replace(/,/g, '.');
    $(this).val(val);
};
function formatDollar(num) {
    return num.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.")
}
// remove ký tự đặc biệt chỉ giữ lại số, ký tự dấu .,-_
function removeSpecial(string) {
    return string.replace(/([^\w\dàáảãạâầấẩẫậăằắẳẵặèéẻẽẹêềếểễệđìíỉĩịòóỏõọôồốổỗộơờớởỡợùúủũụưừứửữựỳýỷỹỵÀÁẢÃẠÂẦẤẨẪẬĂẰẮẲẴẶÈÉẺẼẸÊỀẾỂỄỆĐÌÍỈĨỊÒÓỎÕỌÔỒỐỔỖỘƠỜỚỞỠỢÙÚỦŨỤƯỪỨỬỮỰỲÝỶỸỴÂĂĐÔƠƯ\,\-_ ]+)/g, '').replace('/', '');
}
function activemenuheader() {
    var location = window.location.href.toLowerCase();

    if (location == location.substring(0, location.length - 1) + "/") {
        $("#tc").parent().addClass('activemenu');
    } else {
        var active = null;
        location = location.replace('http://banxehoi.net/', '').replace('http://banxehoi.com/', '');
        if (location.indexOf('/') != -1) location = '/' + location.substring(0, location.indexOf('/'));
        else location = '/' + location;
        $('.pagemenu ul li a').not('#tc').each(function () {
            //if (location.indexOf(this.href.toLowerCase()) > -1) {
            //    if (active == null) {
            //        active = this;
            //    } else if (active.href.length < this.href.length) {
            //        active = this;
            //    }
            //}
            if (location.indexOf('/dang-tin-ban-xe') != -1) return;
            if ($(this).attr("data-key") != null && location.indexOf($(this).attr("data-key").toLowerCase()) > -1) {
                if (active == null) {
                    active = this;
                } else if (active.href.length < this.href.length) {
                    active = this;
                }
            }
        });

        if (active == null) {
            return;
        }

        active = $(active).parent();
        var _class = active.parent().attr("class");

        if (_class && _class.indexOf("sub-menu") != -1) {
            $(active).addClass('activemenu');
            active = active.parent().parent();
        }

        active.addClass('activemenu');
    }
};

/*common.js*/
$(document).ready(function () { 
    $(".autodetail .autoitem .viewmore a").click(function () {
        var link = $(this).attr("data-link");
        var container = $(this).parent().parent();

        if ($(container).find(".divthree").is(":visible")) {
            location.href = link;
        }

        if ($(container).find(".divsecond").is(":visible")) {
            $(container).find(".divthree").show("slow");
        }
        else { $(container).find(".divsecond").show("slow"); }

        $('.sell-car-griditem').syncHeight('.sell-car-griditem');
        $('.fixheightinfo').syncHeight('.fixheightinfo');
        $('.sell-car-griditem .tit').syncHeight('.sell-car-griditem .tit');
    });

    //show menu left
    $('#btn_close').click(function () {
        var heightBox = $('#boxProductSaved ul').height() + 15;
        var pos1 = $('#boxProductSaved').css('bottom');
        if (pos1 == -heightBox + 'px' || pos1 == '-10px') {
            $('#boxProductSaved ul').show();
            $('#boxProductSaved #btn_close').removeClass().addClass('hideAll');
            $('#boxProductSaved').animate({ bottom: '0' }, 200, function () {
                $.cookie('statusBox', 1, { path: '/', expires: 7 });
            });
        } else {
            $('#boxProductSaved').animate({ bottom: -heightBox }, 200, function () {
                //$('#boxProductSaved').css('width', '240px');
                $('#boxProductSaved #btn_close').removeClass().addClass('showAll');
                $.cookie('statusBox', 0, { path: '/', expires: 7 });
            });
        }
    });

    GetProductlist();//load product saved    
    checkStatus();
    checkCookie();

    checkStatusListId();
    checkStatusListIdGrid();
});

function checkStatus() {
    if (productId == 0) return false;
    if (userId == '') {
        var listProductId = $.cookie('ProductSaved');
        if (listProductId != null) {
            if (listProductId.search(productId) > -1)
                //changeHtml(productId);
            $('#' + productId).text('Đã lưu').removeAttr('onclick').addClass('iconsaved');
        }
    }
    else {       
        $.ajax({
            type: "POST",
            cache: false,
            url: "/Auto/GetProduct",
            data: { "productId": productId },
            success: function (data) {
                if (data > 0)
                {
                    $('#' + data).text('Đã lưu').removeAttr('onclick').addClass('iconsaved');
                }         
            }
        });
    }
}

function checkCookie() {
    var listProductId = $.cookie('ProductSaved');
    if (listProductId == null || listProductId == "") {
        $("#boxProductSaved").hide();
    }
    else {
        hideBox();
    }
}

//function changeHtml(productId) {
//    //var code = '<span>Đã lưu</span>';
//    //$('.luuxe').removeAttr('onclick');
//    //$('.luuxe').html(code);
//    //$('#' + productId).text('Đã lưu').removeAttr('onclick').removeClass('icon').addClass('iconsaved');
   
//    $('#' + productId).text('Đã lưu').removeAttr('onclick').addClass('iconsaved');
//}

function GetProductlist() {
    var listProductId = $.cookie('ProductSaved');
    var html = '';

    if (listProductId != null) {
        var likeReturn = '';
        $("#boxProductSaved ul").html(html);
        if (listProductId != '') {
            //if ($("body").data('GetProductlist_' + listProductId) != null) {
            if (localStorage.getItem('GetProductlist_' + listProductId) != null) {
                likeReturn = $.parseJSON(localStorage.getItem('GetProductlist_' + listProductId));
                if (likeReturn != null && likeReturn.length > 0) {
                    $.each(likeReturn, function (index, value) {
                        html += '<li rel="' + value.AutoID + '"><a  href="' + value.Link + '">' + value.Title + ' ' + value.PriceName + '</a><span title="Xóa" onclick="deleteProduct(this,' + value.AutoID + ');"></span></li>';
                    });
                    $("#boxProductSaved ul").html(html);
                }
            }
            else {
                $.ajax({
                    type: "POST",
                    cache: false,
                    url: "/Auto/GetProductList",
                    data: { "productIds": listProductId },
                    success: function (data) {
                        if (data != null) {
                            likeReturn = data;
                            //$("body").data('GetProductlist_' + listProductId, likeReturn);                        
                            localStorage.setItem('GetProductlist_' + listProductId, JSON.stringify(likeReturn));
                            if (likeReturn.length > 0) {
                                $.each(likeReturn, function (index, value) {
                                    html += '<li rel="' + value.AutoID + '"><a  href="' + value.Link + '">' + value.Title + ' ' + value.PriceName + '</a><span title="Xóa" onclick="deleteProduct(this,' + value.AutoID + ');"></span></li>';
                                });
                                $("#boxProductSaved ul").html(html);
                            }
                        }
                    }
                });
            }
        }
    }
    else if (userId != '') //Get top 5 productSaved and saved cookie
    {
        listProductId = '';
        $.ajax({
            type: "POST",
            cache: false,
            url: "/Auto/GetProductList",
            data: { "productIds": listProductId },
            success: function (data) {
                if (data != null) {
                    likeReturn = data;
                    if (likeReturn.length > 0) {
                        $.each(likeReturn, function (index, value) {
                            html += '<li rel="' + value.AutoID + '"><a  href="' + value.Link + '">' + value.Title + ' ' + value.PriceName + '</a><span title="Xóa" onclick="deleteProduct(this,' + value.AutoID + ');"></span></li>';
                            listProductId += value.AutoID + ',';
                        });
                        $("#boxProductSaved ul").html(html);
                        hideBox();
                        localStorage.setItem('GetProductlist_' + listProductId, JSON.stringify(likeReturn));
                    }
                }
                $.cookie('ProductSaved', listProductId, { path: '/', expires: 7 });
            }
        });
    }
}

function deleteProduct(index, productId) {
    if (confirm('Bạn có chắc chắn muốn xóa ?')) {
        $(index).parent().remove();
        //delete cookey
        var listProductId = $.cookie('ProductSaved');
        listProductId = listProductId.replace(productId, '').replace(',,', ',');
        deleteProductSaved(productId);//xoa trong database
        if (listProductId != '' && listProductId != ',')
            $.cookie('ProductSaved', listProductId, { path: '/', expires: 7 });
        else
            $.removeCookie('ProductSaved', { path: '/' });
        if ($("#boxProductSaved ul li").length == 0) {
            $("#boxProductSaved").hide();
        }
        //Xóa xong refresh lại trang
        //location.href =  $(location).attr('href');
        addSaveAuto(productId);
    }
}

function RemoveSaved(index, productId) {
    if (confirm('Bạn có chắc chắn muốn xóa ?')) {
        //$(index).parent().remove();

        $('.luuxe #' + productId).removeClass('iconsaved').text('Lưu xe |').attr('onclick', 'productSaved(this,\'' + productId + '\');');
        $("#boxProductSaved ul li[rel='" + productId + "']").remove();
        //delete cookey
        var listProductId = $.cookie('ProductSaved');
        listProductId = listProductId.replace(productId, '').replace(',,', ',');
        deleteProductSaved(productId);//xoa trong database
        if (listProductId != '' && listProductId != ',')
            $.cookie('ProductSaved', listProductId, { path: '/', expires: 7 });
        else
            $.removeCookie('ProductSaved', { path: '/' });
        if ($("#boxProductSaved ul li").length == 0) {
            $("#boxProductSaved").hide();
        }
        //Xóa xong refresh lại trang
        //location.href =  $(location).attr('href');
        addSaveAuto(productId);
    }
}

function deleteAllNews() {
    if (confirm('Bạn có chắc chắn muốn xóa tất cả ?')) {
        var listProductId = $.cookie('ProductSaved');
        //var arrid = listProductId.split(',');
        //var iddelete = '';
        //var idcookies = '';
        //if (arrid.length > 5) {
        //    for (var i = arrid.length - 5 ; i < arrid.length ; i++) {
        //        iddelete += arrid[i] + ',';
        //    }
        //    for (var i = 0; i < arrid.length - 5; i++) {
        //        idcookies += arrid[i] + ",";
        //    }
        //    iddelete = iddelete.substring(0, iddelete.length - 1);
        //    idcookies = idcookies.substring(0, idcookies.length - 1);
        //    deleteListProductSaved(iddelete);

        //    $.removeCookie('ProductSaved', {  path: '/' });
        //    $.cookie('ProductSaved', idcookies, {  path: '/', expires: 7 });
        //    $("#boxProductSaved").hide();
        //    ////Xóa xong refresh lại trang
        //    location.href = $(location).attr('href');
        //}
        //else
        //{
        deleteListProductSaved(listProductId);
        $.removeCookie('ProductSaved', { path: '/' });
        $("#boxProductSaved").hide();
        ////Xóa xong refresh lại trang
        //location.href = $(location).attr('href');
        addListSaveAuto(listProductId);
        //}


    }
}

function openBox() {
    $("#boxProductSaved").show();
    $('#boxProductSaved ul').show();
    var pos1 = $('#boxProductSaved').css('bottom');
    if (pos1.replace('px', '') < -1) {
        $('#boxProductSaved').animate({ bottom: '0' }, 200, function () {
            $('#boxProductSaved #btn_close').removeClass().addClass('hideAll');
        });
    }
    if ($('AutoCompare').is(':visible')) {
        $('#boxProductSaved').css('right', '175px !important');
    }
}

function hideBox() {
    $("#boxProductSaved").show();
    if ($.cookie('statusBox') == 0) {
        $('#boxProductSaved ul').hide();
        $('#boxProductSaved').css('bottom', '-10px');
        $('#boxProductSaved #btn_close').removeClass().addClass('showAll');
    }
}

function deleteProductSaved(productId) {
    if (userId != '') {
        $.ajax({
            type: "POST",
            cache: false,
            url: "/Auto/DeleteProductId",
            data: { "productId": productId },
            success: function () {
            }
        });
    }
}

function deleteListProductSaved(productIds) {
    if (userId != '') {
        $.ajax({
            type: "POST",
            cache: false,
            url: "/Auto/DeleteListProductId",
            data: { "productIds": productIds },
            success: function () {

            }
        });
    }
}

function productSaved(index, productId) {
    var listProductId = $.cookie('ProductSaved');
    if (listProductId != null) {
        if (listProductId.search(productId) == -1)
            $.cookie('ProductSaved', productId + ',' + listProductId, { path: '/', expires: 7 });
    }
    else {
        $.cookie('ProductSaved', productId, { path: '/', expires: 7 });
    }

    if (userId == '') {
        GetProductlist();//load product saved
    }
    else {
        $.ajax({
            type: "POST",
            cache: false,
            url: "/Auto/ProductInsert",
            data: { "productId": productId },
            success: function (data) {
                if (data == "false") {
                    alert("Lỗi không lưu được tin!");
                }
                else {
                    GetProductlist();
                }
            }
        });
    }
    //$(index).text('Đã lưu').removeAttr('onclick').removeClass('icon').addClass('iconsaved');
    $(index).text('Đã lưu').removeAttr('onclick').addClass('iconsaved');
    openBox();
}

function checkStatusListId() {

    if (userId == '') {
        var listProductId = $.cookie('ProductSaved');
        if (listProductId != null) {
            {
                $('.sellcar-item .luuxe').each(function () {
                    var productId = $(this).attr('id');
                    if ($(this).html() == "Lưu xe |") {
                        $(this).css('display', 'none');
                    }
                    if (listProductId.search(productId) > -1)
                        //$('#' + productId).text('Đã lưu').removeAttr('onclick').removeClass('icon').addClass('iconsaved');
                        $('#' + productId).text('Đã lưu').removeAttr('onclick').addClass('iconsaved');
                });

            }
        }
    }
    else {
        var listId = '';
        $('.sellcar-item .luuxe').each(function () {
            listId += $(this).attr('id') + ',';
        });
        if (listId != '') {
            $.ajax({
                type: "POST",
                cache: false,
                url: "/Auto/GetListProductId",
                data: { "productIds": listId },
                success: function (data) {
                    listId = '';
                    if (data != null) {
                        likeReturn = data;
                        $.each(likeReturn, function (index, value) {
                            listId += value.AutoID + ',';
                        });
                        $('.sellcar-item .luuxe').each(function () {
                            var productId = $(this).attr('id');
                            if (listId.search(productId) > -1)
                                //$('#' + productId).text('Đã lưu').removeAttr('onclick').removeClass('icon').addClass('iconsaved');
                                $('#' + productId).text('Đã lưu').removeAttr('onclick').addClass('iconsaved');
                        });
                    }
                }
            });
        }
    }
}


function checkStatusListIdGrid() {

    if (userId == '') {
        var listProductId = $.cookie('ProductSaved');
        if (listProductId != null) {
            {
                $('.sell-car-griditem .luuxe').each(function () {
                    var productId = $(this).attr('id');
                    if (listProductId.search(productId) > -1)
                        //$('#' + productId).text('Đã lưu').removeAttr('onclick').removeClass('icon').addClass('iconsaved');
                        $('#' + productId).text('Đã lưu').removeAttr('onclick').addClass('iconsaved');
                });

            }
        }
    }
    else {
        var listId = '';
        $('.sell-car-griditem .luuxe').each(function () {
            listId += $(this).attr('id') + ',';
        });
        if (listId != '') {
            $.ajax({
                type: "POST",
                cache: false,
                url: "/Auto/getListProductId",
                data: { "productIds": listId },
                success: function (data) {
                    listId = '';
                    if (data != null) {
                        likeReturn = data;
                        $.each(likeReturn, function (index, value) {
                            listId += value.AutoID + ',';
                        });
                        $('.sell-car-griditem .luuxe').each(function () {
                            var productId = $(this).attr('id');
                            if (listId.search(productId) > -1)
                                //$('#' + productId).text('Đã lưu').removeAttr('onclick').removeClass('icon').addClass('iconsaved');
                                $('#' + productId).text('Đã lưu').removeAttr('onclick').addClass('iconsaved');
                        });
                    }
                }
            });
        }
    }
}

function addSaveAuto(autoId) {
    $('.luuxe').each(function () {
        if ($(this).attr('id') == autoId) {
            //$('#' + autoId).text('Lưu xe').addClass('icon').attr('onclick', 'productSaved(this,\'' + autoId + '\');').removeClass('iconsaved').removeClass('iconremove');
            $('#' + autoId).text('Lưu xe |').attr('onclick', 'productSaved(this,\'' + autoId + '\');').removeClass('iconremove').removeClass('iconsaved');
        }
    });
    $('.ortherfunction #' + autoId).text('Lưu xe').attr('onclick', 'productSaved(this,\'' + autoId + '\');').removeClass('iconsaved').removeClass('iconremove');
}

function addListSaveAuto(listautoId) {
    var arr = listautoId.split(',');
    for (var i = 0; i < arr.length; i++) {
        $('.luuxe').each(function () {
            if ($(this).attr('id') == arr[i]) {
                //$('#' + arr[i]).text('Lưu xe').addClass('icon').attr('onclick', 'productSaved(this,\'' + arr[i] + '\');').removeClass('iconsaved').removeClass('iconremove');
                $('#' + arr[i]).text('Lưu xe |').attr('onclick', 'productSaved(this,\'' + arr[i] + '\');').removeClass('iconremove').removeClass('iconsaved');
            }
        });
    }
}

/*eof common.js*/
/*compare.js*/
$(document).ready(function () {

    //show menu left
    $('#closecompare').click(function () {
        if (confirm('Bạn có chắc chắn muốn xóa ?')) {

            var listCompareID = $.cookie('CompareAutoID');

            $.removeCookie('CompareAutoID', { path: '/' });
            $('.AutoCompare #countcompare').html('');
            $('.AutoCompare').hide();


            //Add Onclick button Compare
            $('.sosanh').each(function () {
                var productId = $(this).attr('data-id');
                if (listCompareID.search(productId) > -1)
                    $(this).attr('onclick', 'AutoCompared(this,\'' + productId + '\');')
            });
        }
    });

    GetComparetlist();//load product saved    
    checkStatusCompare();
    checkCookieCompare();

    //CheckCompareList();
    //CheckCompareListIdGrid();
});

function checkStatusCompare() {
    if (productId == 0) return false;
    var listCompareID = $.cookie('CompareAutoID');
    if (listCompareID != null) {
        if (listCompareID.search(productId) > -1)
            changeHtml(productId);
    }
}

function checkCookieCompare() {
    var listCompareID = $.cookie('CompareAutoID');
    if (listCompareID == "undefined") {
        $("#AutoCompare").hide();
    }
    else
        HideBoxCompare()
}

function changeHtml(productId) {
    $('.' + productId).removeAttr('onclick');
}

function GetComparetlist() {
    var listCompareID = $.cookie('CompareAutoID');
    var html = '';
    if (listCompareID != null) {
        listCompareID = listCompareID.trim(',');
        var likeReturn = '';
        $(".AutoCompare #countcompare").html(html);
        if ($("body").data('GetComparelist_' + listCompareID) != null) {
            likeReturn = $("body").data('GetComparelist_' + listCompareID);
            if (likeReturn.length > 0) {
                $(".AutoCompare #countcompare").html('(' + likeReturn.length + ')');
            }
        }
        else {
            likeReturn = listCompareID.split(',');
            $("body").data('GetComparelist_' + listCompareID, likeReturn);
            if (likeReturn.length > 0) {
                $(".AutoCompare #countcompare").html('(' + likeReturn.length + ')');
            }
        }
    }
    else {
        $(".AutoCompare #countcompare").html('');
    }
}

function DeleteCompare(index, productId) {
    if (confirm('Bạn có chắc chắn muốn xóa ?')) {
        $(index).parent().remove();
        //delete cookey
        var listCompareID = $.cookie('CompareAutoID');
        listCompareID = listCompareID.replace(productId, '').replace(',,', ',');

        if (listCompareID != '' && listCompareID != ',')
            $.cookie('CompareAutoID', listCompareID, { path: '/', expires: 7 });
        else
            $.removeCookie('CompareAutoID', { path: '/' });
        if ($("#AutoCompare ul li").length == 0) {
            $("#AutoCompare").hide();
        }
        //Xóa xong refresh lại trang
        //location.href =  $(location).attr('href');
        AddCompareAuto(productId);
    }
}

function OpenBoxCompare() {
    $(".AutoCompare").show();
}

function HideBoxCompare() {
    $(".AutoCompare").show();
    var listCompareID = $.cookie('CompareAutoID');
    if (listCompareID == null || listCompareID == "undefined") {
        $('.AutoCompare').hide();
    }
}

function AutoCompared(index, autoId) {
    var listCompareID = $.cookie('CompareAutoID');
    if (listCompareID != null) {
        if (listCompareID.search(autoId) == -1)
            $.cookie('CompareAutoID', autoId + ',' + listCompareID, { path: '/', expires: 7 });
    }
    else {
        $.cookie('CompareAutoID', autoId, { path: '/', expires: 7 });
    }

    GetComparetlist();//load product saved 

    //chage html, text button on click
    $(index).removeAttr('onclick');
    OpenBoxCompare();
}

function CheckCompareList(lstCompare) {
    var listCompareID = lstCompare;
    if (listCompareID != null) {
        {
            $('.sellcar-item .sosanh').each(function () {
                var productId = $(this).attr('data-id');
                if (listCompareID.search(productId) > -1)
                    $(this).attr('onclick', 'AutoCompared(this,\'' + productId + '\');')
            });
        }
    }
}


function CheckCompareListIdGrid() {

    if (userId == '') {
        var listCompareID = $.cookie('CompareAutoID');
        if (listCompareID != null) {
            {
                $('.sell-car-griditem .save').each(function () {
                    var productId = $(this).attr('id');
                    if (listCompareID.search(productId) > -1)
                        $('#' + productId).text('Đã lưu').removeAttr('onclick').removeClass('icon').addClass('iconsaved');
                });

            }
        }
    }
    else {
        var listId = '';
        $('.sell-car-griditem .save').each(function () {
            listId += $(this).attr('id') + ',';
        });
        if (listId != '') {
            $.ajax({
                type: "POST",
                cache: false,
                url: "/Auto/getlistCompareID",
                data: { "productIds": listId },
                success: function (data) {
                    listId = '';
                    if (data != null) {
                        likeReturn = data;
                        $.each(likeReturn, function (index, value) {
                            listId += value.AutoID + ',';
                        });
                        $('.sell-car-griditem .save').each(function () {
                            var productId = $(this).attr('id');
                            if (listId.search(productId) > -1)
                                $('#' + productId).text('Đã lưu').removeAttr('onclick').removeClass('icon').addClass('iconsaved');
                        });
                    }
                }
            });
        }
    }
}


//Show pop up
function ShowPopupCompare() {
    var listCompareID = $.cookie('CompareAutoID');
    if (listCompareID != null || listCompareID != 'undefined') {
        listCompareID = listCompareID.split(',');
        if (listCompareID.length > 1) {
            $('#showcompare, #showcompare1').fancybox({
                fitToView: false,
                href: '/so-sanh'
            });
        }
        else {
            alert('Bạn phải chọn nhiều xe để so sánh!');
            return;
        }
    }
    else {
        alert('Bạn chưa chọn xe nào để so sánh');
        return;
    }
}

function RemoveCompare(AutoID) {
    $('.viewcompare .' + AutoID).remove();

    var listCompareID = $.cookie('CompareAutoID');

    listCompareID = listCompareID.replace(AutoID, '').replace(',,', ',');
    listCompareID = listCompareID.trim(',');
    if (listCompareID != '' && listCompareID != ',')
        $.cookie('CompareAutoID', listCompareID, { path: '/', expires: 7 });
    else
        $.removeCookie('CompareAutoID', { path: '/' });

    GetComparetlist();
    checkCookieCompare();

    listCompareID = listCompareID.split(',');

    //set count popup
    $('.autocount #sl').html(listCompareID.length);
    var width = listCompareID.length * 230;
    $(".contentcompareitem").css("width", "" + width + "px");
    $(".head-fly").css("width", "" + width + "px");

    //ẩn box nếu ko còn xe
    if (listCompareID.length == 0 || listCompareID == '') {
        $(".AutoCompare").hide();
    }

    //Add lại button so sánh
    var listCompareID = $.cookie('CompareAutoID');
    $('.sosanh').each(function () {
        var productId = $(this).attr('data-id');
        if (productId == AutoID)
            $(this).attr('onclick', 'AutoCompared(this,\'' + productId + '\');')
    });
}
/*eof compare.js*/



/*main.js*/
$.fn.TooltipPoint = function () {

    $(this).hover(function () {
        var _this = $(this);
        var tooltiptop = _this.position().top + _this.height();
        var tooltipleft = _this.position().left + _this.width();
        var title = _this.attr("data-title");

        if (!title) {
            return;
        }

        title = title.replace(/\\n/g, "<br/>");

        _this.after('<div class="mytooltip" style="top:' + tooltiptop + 'px;left:' + tooltipleft + 'px; width: auto !important;">' + title + '</div>');
    }).mouseleave(function () {
        $('.mytooltip').remove();
    });
};
(function ($) {
    $.fn.myTooltip = function () {
        $(this).blur(inputFocus);
        $(this).focus(inputBlur);
        function inputBlur() {
            var tooltiptop = $(this).position().top;
            var tooltipleft = $(this).position().left + $(this).width() + 20;
            $(this).after('<div class="mytooltip" style="top:' + tooltiptop + 'px;left:' + tooltipleft + 'px">' + $(this).attr('title') + '</div>');
        }
        function inputFocus() {
            $('.mytooltip').remove();
        }
    };

    $.fn.myTooltipHover = function () {

        $(this).hover(function () {
            var _this = $(this);
            var tooltiptop = _this.position().top + _this.height();
            var tooltipleft = _this.position().left;
            var title = _this.attr("data-title");

            if (!title) {
                return;
            }

            title = title.replace(/\\n/g, "<br/>");

            _this.after('<div class="mytooltip" style="top:' + tooltiptop + 'px;left:' + tooltipleft + 'px; max-width: ' + _this.width() + 'px !important; width: auto !important;">' + title + '</div>');
        }).mouseleave(function () {
            $('.mytooltip').remove();
        });
    };

    $.fn.switchColumns = function (col1, col2) {
        //tcolC = col1.clone();
        //tcolN = col2.clone();
        col1.after(col2);
        //col2.replaceWith(tcolC);
    };

    $.fn.moveColumn = function (table, from, to) {
        var rows = jQuery('tr', table);
        var cols;
        rows.each(function () {
            cols = jQuery(this).children('th, td');
            cols.eq(from).detach().insertBefore(cols.eq(to));
        });
    }

})(jQuery);



(function ($) {
    $.fn.myTooltipManage = function () {
        $(this).hover(inputBlur, inputFocus);
        function inputBlur() {
            var tooltiptop = $(this).position().top;
            var tooltipleft = $(this).position().left + $(this).width();
            $(this).after('<div class="mytooltipmanage" style="top:' + tooltiptop + 'px;left:' + tooltipleft + 'px">' + $(this).attr('data-title') + '</div>');
        }
        function inputFocus() {
            $('.mytooltipmanage').remove();
        }
    };
})(jQuery);

(function ($) {
    $.fn.myTooltipSearch = function () {
        $(this).blur(inputFocus);
        $(this).focus(inputBlur);
        $(this).hover(inputBlur, inputFocus);
        function inputBlur() {
            var tooltiptop = $(this).position().top;
            if ($(this).attr('id') == "price-min") {
                var tooltipleft = $(this).position().left - 100;
            }
            else {
                var tooltipleft = $(this).position().left + 90;
            }
            $(this).after('<div class="mytooltipsearch" style="top:' + tooltiptop + 'px;left:' + tooltipleft + 'px;width=' + $(this).width() + 'px !important;">' + $(this).attr('title') + '</div>');
        }
        function inputFocus() {
            $('.mytooltipsearch').remove();
        }
    };
})(jQuery);

String.prototype.trimstart = function (c) {
    c = c ? c : ' ';
    var i = 0;
    for (; i < this.length && this.charAt(i) == c; i++);
    return this.substring(i);
}

String.prototype.trimEnd = function (c) {
    c = c ? c : ' ';
    var i = this.length - 1;
    for (; i >= 0 && this.charAt(i) == c; i--);
    return this.substring(0, i + 1);
}

String.prototype.trim = function (c) {
    return this.trimstart(c).trimEnd(c);
}

function isDate(txtDate) {
    var currVal = txtDate;
    if (currVal == '')
        return false;

    //Declare Regex  
    var rxDatePattern = /^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{4})$/;
    var dtArray = currVal.match(rxDatePattern); // is format OK?

    if (dtArray == null)
        return false;

    //Checks for dd/mm/yyyy format.
    dtDay = dtArray[1];
    dtMonth = dtArray[3];
    dtYear = dtArray[5];

    if (dtMonth < 1 || dtMonth > 12)
        return false;
    else if (dtDay < 1 || dtDay > 31)
        return false;
    else if ((dtMonth == 4 || dtMonth == 6 || dtMonth == 9 || dtMonth == 11) && dtDay == 31)
        return false;
    else if (dtMonth == 2) {
        var isleap = (dtYear % 4 == 0 && (dtYear % 100 != 0 || dtYear % 400 == 0));
        if (dtDay > 29 || (dtDay == 29 && !isleap))
            return false;
    }
    return true;
}

function IsNumeric(sText) {
    var validChars = "0123456789.";
    var isNumber = true;
    var onechar;
    for (var i = 0; i < sText.length && isNumber == true; i++) {
        onechar = sText.charAt(i);
        if (validChars.indexOf(onechar) == -1) {
            isNumber = false;
        }
    }
    return isNumber;

}
var minvalueprice = 0;
var maxvalueprice = 99000;
var minvalueyear = 0;
var maxvalueyear = 2015;
var initmakeid = 0;
var initmodelid = 0;
var typemodel = "";
function InputFocus(textdefault, control) {
    var text = control.value;
    if (text == textdefault) control.value = "";
}
function InputBlur(textdefault, control) {
    var text = control.value;
    if (text == "") control.value = textdefault;
}
function UnicodeToKoDauAndGach(s) {
    strChar = "abcdefghiklmnopqrstxyzuvxw0123456789 ";
    //string retVal = UnicodeToKoDau(s);

    s = UnicodeToKoDau(s.toLowerCase());

    sReturn = "";
    for (i = 0; i < s.length; i++) {
        if (strChar.indexOf(s.charAt(i)) > -1) {
            if (s.charAt(i) != ' ')
                sReturn += s.charAt(i);
            else if (i > 0 && s.charAt(i - 1) != ' ' && s.charAt(i - 1) != '-')
                sReturn += "-";
        }
    }

    return sReturn;
}
function UnicodeToKoDau(s) {
    uniChars =
        "àáảãạâầấẩẫậăằắẳẵặèéẻẽẹêềếểễệđìíỉĩịòóỏõọôồốổỗộơờớởỡợùúủũụưừứửữựỳýỷỹỵÀÁẢÃẠÂẦẤẨẪẬĂẰẮẲẴẶÈÉẺẼẸÊỀẾỂỄỆĐÌÍỈĨỊÒÓỎÕỌÔỒỐỔỖỘƠỜỚỞỠỢÙÚỦŨỤƯỪỨỬỮỰỲÝỶỸỴÂĂĐÔƠƯ";

    KoDauChars =
        "aaaaaaaaaaaaaaaaaeeeeeeeeeeediiiiiooooooooooooooooouuuuuuuuuuuyyyyyAAAAAAAAAAAAAAAAAEEEEEEEEEEEDIIIIIOOOOOOOOOOOOOOOOOUUUUUUUUUUUYYYYYAADOOU";

    retVal = "";

    for (i = 0; i < s.length; i++) {
        pos = uniChars.indexOf(s.charAt(i));

        if (pos >= 0) {
            retVal += KoDauChars.charAt(pos);
        }
        else
            retVal += s.charAt(i);
    }
    return retVal;
}
function OnchangeHangxe(hangxeID, text) {
    var likeReturn = null;
    // kiểm tra xem có chưa??    
    if (hangxeID != null && hangxeID != "" && hangxeID != 0) {
        $.ajax({
            type: "POST",
            cache: false,
            url: "/model/jsonmodels/" + hangxeID + "",
            //data:jsonData,             
            success: function (html) {
                if (html.length > 0) {
                    likeReturn = html;
                    $("body").data('Model_' + hangxeID, likeReturn);
                }
            },
            timeout: 5000,
            complete: function () {
                if (likeReturn != null) {
                    $('.combogriditem').combogriditem("0", "Tất cả loại", likeReturn);
                    //UnicodeToKoDauAndGach(text)
                    $('#Makename').val(UnicodeToKoDauAndGach(text));
                }
            }
        });
    }
}
$.fn.newsslide = function (movepx) {
    this.each(function () {
        $('.osgslideimg').hide();
        $('.osgslidecontent').hide();
        var objId = $(this).attr('id');
        var src, rel, alt, title, url;
        var htmlafter = '';
        htmlafter += '<div class="newsslide">';
        htmlafter += '    <div class="newsitemslide">';
        htmlafter += '    <div class="wp-newsitemslide">';
        htmlafter += '        <div class="slide_animation">';
        $('.itemslidemodel').each(function () {
            src = $(this).find('.osgslideimg').attr('src');
            rel = $(this).find('.osgslidecontent').attr('rel');
            alt = $(this).find('.osgslideimg').attr('alt');

            title = $(this).find('.osgslidecontent').attr('title');
            url = $(this).find('.osgslidecontent').attr('href');
            htmlafter += '  <div class=itemcontent><a href="' + url + '" title="' + title + '"><img class="imgslide" src="' + src + '" alt="' + alt + '"/></a>';
            htmlafter += '<a href="' + url + '" title="' + title + '">' + title + '</a></div>';
        });
        htmlafter += '        </div>';
        htmlafter += '        </div>';
        htmlafter += '        <img src="/style/images/rightdetail.png" class="dart dartleft" style="left:0px"/>';
        htmlafter += '        <img src="/style/images/leftdetail.png" class="dart dartright" style="right:0px"/>';
        htmlafter += '    </div>';
        htmlafter += '</div>';
        $(this).append(htmlafter);
        //$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({ animation_speed: 'normal', theme: 'light_square', slideshow: 5000, autoplay_slideshow: true, social_tools: '', gallery_markup: '', deeplinking: false, allow_resize: false });
        var currenttab = 1;
        var maxtab = eval($('#maxtab').val());
        $('.dart').click(function () {
            if ($(this).hasClass('dartleft')) {
                currenttab--;
                if (currenttab > 0) {
                    var leftpx = (currenttab - 1) * (-movepx);

                    $('#' + objId + ' .slide_animation').animate({
                        left: leftpx
                    }, 500);
                }
                if (currenttab < 1) currenttab = 1;
                var index = currenttab - 1;
            }
            else if ($(this).hasClass('dartright')) {
                currenttab++;
                if (currenttab <= maxtab) {
                    $(this).parent().parent().parent().parent().parent().parent()
                    var leftpx = (currenttab - 1) * (-movepx);
                    $('#' + objId + ' .slide_animation').animate({
                        left: leftpx
                    }, 500);
                }
                if (currenttab > maxtab) currenttab = maxtab;
                var index = currenttab + 1;
            }
        });
    });
};
$.fn.osgslide = function (smallThumb, largeThumb, movepx) {
    this.each(function () {
        $('.osgslideimg').hide();
        var objId = $(this).attr('id');
        var htmlafter = '';
        htmlafter += '<div class="imageslide">';
        htmlafter += '    <div class="imagecontainer">';
        htmlafter += '        <a href="javascript:void(0)"><img id="osgslidemainimage" alt="' + $('.osgslideimg:eq(0)').attr('alt') + '" title="' + $('.osgslideimg:eq(0)').attr('alt') + '" rel="osgslide-display-none-index-0" src="' + $('.osgslideimg:eq(0)').attr('src').replace('/' + smallThumb + '/', '/' + largeThumb + '/') + '"></a>';
        htmlafter += '    </div>';
        htmlafter += '    <div class="imageitemslide">';
        htmlafter += '    <div class="wp-imageitemslide">';
        htmlafter += '        <div class="slide_animation">';
        $('.osgslideimg').each(function (index) {
            var src = $(this).attr('src');
            var rel = $(this).attr('rel');
            var alt = $(this).attr('alt');
            //if (index % 3 == 2) classImage = 'class="imgslide last"';
            //else classImage = 'class="imgslide"';
            htmlafter += '            <img id="imgslide_' + index + '" class="imgslide" src="' + src + '" rel="' + rel + '" alt="' + alt + '" title="' + alt + '"/>';
        });
        htmlafter += '        </div>';
        htmlafter += '        </div>';
        htmlafter += '        <img src="/style/images/leftv5.png" class="dart dartleft" style="left:14px"/>';
        htmlafter += '        <img src="/style/images/rightv5.png" class="dart dartright" style="right:15px"/>';
        htmlafter += '    </div>';
        htmlafter += '</div>';
        $(this).append(htmlafter);
        $(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({ animation_speed: 'fast', theme: 'light_square', slideshow: 5000, autoplay_slideshow: true, social_tools: '', gallery_markup: '', deeplinking: false, allow_resize: false });
        var currenttab = 1;
        var maxtab = eval($('#maxtab').val());
        var currentimage = 0;
        var maximage = eval($('#maximage').val());
        $('.dart').click(function () {
            if ($(this).hasClass('dartleft')) {
                currenttab--;
                if (currenttab >= 1) {
                    if ($(this).parent().parent().parent().parent().parent().parent().hasClass('slidesalon')) {
                        var leftpx = (currenttab - 1) * (-movepx);
                    }
                    else {
                        var leftpx = (currenttab - 1) * (-movepx);
                    }

                    $('#' + objId + ' .slide_animation').animate({
                        left: leftpx
                    }, 500);
                }
                if (currenttab < 1) currenttab = 1;
                currentimage--;
                if (currentimage < 0) currentimage = 0;
            }
            else if ($(this).hasClass('dartright')) {
                currenttab++;
                if (currenttab <= maxtab) {
                    $(this).parent().parent().parent().parent().parent().parent()
                    if ($(this).parent().parent().parent().parent().parent().parent().hasClass('slidesalon')) {
                        var leftpx = (currenttab - 1) * (-movepx);
                    }
                    else {
                        var leftpx = (currenttab - 1) * (-movepx);
                    }
                    $('#' + objId + ' .slide_animation').animate({
                        left: leftpx
                    }, 500);
                }
                if (currenttab > maxtab) currenttab = maxtab;
                currentimage++;
                if (currentimage >= maximage) currentimage = maximage - 1;
            }
            $('#osgslidemainimage')
                .attr('src', $('.osgslideimg:eq(' + currentimage + ')').attr('src').replace('/' + smallThumb + '/', '/' + largeThumb + '/'))
                .attr('rel', $('.osgslideimg:eq(' + currentimage + ')').attr('rel'));
            $('.imgslide').removeClass('osgslide-active');
            $('#imgslide_' + currentimage).addClass('osgslide-active');
        });
        $('.imgslide').click(function () {
            var src = $(this).attr('src');
            var rel = $(this).attr('rel');
            $('#osgslidemainimage')
                .attr('src', src.replace('/' + smallThumb + '/', '/' + largeThumb + '/'))
                .attr('rel', rel);
            currentimage = rel.replace('osgslide-display-none-index-', '');
            $('.imgslide').removeClass('osgslide-active');
            $(this).addClass('osgslide-active');
        });
        $('#osgslidemainimage').click(function () {
            var rel = $(this).attr('rel');
            $('#' + rel).click();
        });
    });
};
function GetMoneyText2(money) {
    if (money == 0) return "0 tr";
    money = Math.round(money * 10) / 10;
    var sodu = 0;
    if (money >= 1000000000) {
        sodu = money / 1000000000;
        return sodu.toString().replace('.', ',') + ' tỷ';
    }
    if (money >= 1000000) {
        sodu = money / 1000000;
        return sodu + ' tr';
    }
}
function GetText2Money(text) {
    if (text.indexOf('triệu') != -1) {
        text = text.replace('triệu', '').trim();
        return eval(text);
    }
    else if (text.indexOf('tỷ') != -1) {
        text = text.replace('tỷ', '');
        return eval(text) * 1000;
    } else return eval(text);
}
var minprice = minvalueprice;
var maxprice = maxvalueprice;
function getMinMaxPrice(price) {
    if (price == '' || price == 'Giá') {
        minprice = minvalueprice;
        maxprice = maxvalueprice;
    }
    else if (price.indexOf('Dưới') != -1) {
        price = price.replace('Dưới ', '');
        maxprice = GetText2Money(price.trim());
        minprice = 0;
    } else if (price.indexOf(' trở lên') != -1) {
        price = price.replace(' trở lên', '').replace('Từ', '');
        maxprice = maxvalueprice;
        minprice = GetText2Money(price.trim());
    } else {
        var arrprice = price.split('đến');
        minprice = arrprice[0].replace('Từ', '');
        maxprice = arrprice[1];
        minprice = GetText2Money(minprice.trim());
        maxprice = GetText2Money(maxprice.trim());
    }
}
var minyear = minvalueyear;
var maxyear = maxvalueyear;
function getMinMaxYear(year) {
    if (year == '' || year == 'Năm') return;
    if (year.indexOf('Sau năm') != -1) {
        year = year.replace('Sau năm', '').trim();
        minyear = eval(year);
        maxyear = maxvalueyear;
    } else if (year.indexOf('Trước năm') != -1) {
        year = year.replace('Trước năm', '').trim();
        minyear = minvalueyear;
        maxyear = eval(year.trim());
    } else {
        var arryear = year.split('đến');
        minyear = arryear[0].replace('Từ năm', '');
        minyear = eval(minyear.trim());
        maxyear = arryear[1];
        maxyear = eval(maxyear.replace('năm', '').trim());
    }
}
function SetFilterHaveImageCookie(haveimage) {
    if (haveimage) {
        document.cookie = "HaveImage=1;path=/;";
    } else {
        document.cookie = "HaveImage=0;path=/;";
    }
    var url = document.URL;
    url = url.replace(new RegExp("/p([0-9]+)"), "");//bo phan trang di ve trang 1
    location.href = url;
}
function SetFilterThumbViewCookie(isthumbview) {
    if (isthumbview) document.cookie = "IsThumbView=1;path=/;";
    else document.cookie = "IsThumbView=0;path=/;";
    location.reload();
}
function SetFilterSortByCookie(index) {
    switch (eval(index)) {
        case 1:
            document.cookie = "OrderPrice=1;path=/;";
            document.cookie = "OrderYear=0;path=/;";
            break;
        case 2:
            document.cookie = "OrderPrice=2;path=/;";
            document.cookie = "OrderYear=0;path=/;";
            break;
        case 3:
            document.cookie = "OrderYear=1;path=/;";
            document.cookie = "OrderPrice=0;path=/;";
            break;
        case 4:
            document.cookie = "OrderYear=2;path=/;";
            document.cookie = "OrderPrice=0;path=/;";
            break;
        default:
            document.cookie = "OrderPrice=0;path=/;";
            document.cookie = "OrderYear=0;path=/;";
            break;
    }
    //location.reload();
    var url = document.URL;
    url = url.replace(new RegExp("/p([0-9]+)"), "");//bo phan trang di ve trang 1
    location.href = url;
}
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i].replace(/^\s+|\s+$/g, '');
        if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
    }
    return "";
}

$.fn.combocustom = function (initValueModel, initTextModel) {
    this.each(function () {
        var objId = $(this).attr('id');
        var inputId = $(this).find('input').attr('id');
        var datawidth = $(this).find('input').attr('data-width');
 

        $('#' + objId + ' .selected').click(function () {
            if ($(this).hasClass('active')) {
                finish();
            } else {
                $(this).addClass('active');
                //$(this).css('margin-top', '-21px')
                $('#' + objId + ' .list-selections').show();
            }
        });
        $('#' + objId + ' .list-selections a').click(function () {
            var text = $(this).html();
            var value = $(this).attr('rel');
            //if (value != 0)
            SetFilterSortByCookie(value);
            //else {
            //    finish(text, value);
            //    $('#sorttype').val(value);
            //}
        });
        $(document).mouseup(function (e) {
            var container = $("#" + objId);
            if (!container.is(e.target) // if the target of the click isn't the container...
                && container.has(e.target).length === 0 // ... nor a descendant of the container
                && $('#' + objId + ' .selected').hasClass('active')) {
                finish();
            }
        });
        function finish(text, value) {
            if (text != null && text != '') $('#' + objId + ' .price').html(text);
            if (value != null && value != '') $('#' + inputId).val(value);
            $('#' + objId + ' .selected').removeClass('active');
            // $('#' + objId + ' .selected').css('margin-top', '5px');
            $('#' + objId + ' .list-selections').hide();
        }
    });
};
/*paging*/
function LoadData(pageindex) {
    this.CurrentPage = pageindex;
    loadList(pageindex);
    HandlerPage();

}
function PageInfo(pageCount, initPage) {
    this.PageCount = Math.floor(pageCount);
    this.CurrentPage = initPage;
}
function HandlerPage() {
    htmlpage = "";
    var div = document.getElementById("divPaging");
    if (!div) return;
    div.style.display = (page.PageCount <= 1) ? "none" : "";
    div.innerHTML = "";
    if (1 != page.CurrentPage) CreateLink(div, 1, "<img src='/style/images/firstpage-v2.png' />");
    if (page.PageCount <= 4) {
        for (var i = 1; i <= page.PageCount; i++) {
            CreateLink(div, i, i);
        }
    }
    else {
        if (page.CurrentPage == 1) {
            for (var i = 1; i <= 5; i++) {
                CreateLink(div, i, i);
            }
        }
        if (page.CurrentPage > 1 && eval(page.CurrentPage) < page.PageCount) {
            if (page.CurrentPage > 2) {
                CreateLink(div, page.CurrentPage - 2, '<img src="/style/images/previewpage-v2.png" />');
            }
            for (var i = (page.CurrentPage - 1) ; i <= (eval(page.CurrentPage) + 1) ; i++) {
                CreateLink(div, i, i)
            }
            if (page.CurrentPage <= page.PageCount - 2) {
                CreateLink(div, eval(page.CurrentPage) + 2, '<img src="/style/images/nextpage-v2.png" />');
            }
        }
        if (page.CurrentPage == page.PageCount) {
            CreateLink(div, page.CurrentPage - 3, page.CurrentPage - 3);

            for (var i = page.PageCount - 2; i <= page.PageCount; i++) {
                CreateLink(div, i, i);
            }
        }
    }
    if (page.PageCount != page.CurrentPage) {
        CreateLink(div, page.PageCount, "<img src='/style/images/lastpage-v2.png' />");
    }
}
function CreateLink(div, i, text) {
    var objPrevLink = document.createElement("a");
    objPrevLink.onclick = function () {
        if (i != page.CurrentPage) {
            ShowPage(this.getAttribute('value'));
        }
        return false;
    }
    if (i != page.CurrentPage) {
        if (text.toString().indexOf('img') != -1) htmlpage += '<a class="img" href="' + $('#CurrentURL').val() + (i == "1" ? "" : "/p" + i) + '" value="' + i + '">' + text + '</a>';
        else htmlpage += '<a href="' + $('#CurrentURL').val() + (i == "1" ? "" : "/p" + i) + '" value="' + i + '">' + text + '</a>';
    }
    else {
        htmlpage += '<a href="' + $('#CurrentURL').val() + (i == "1" ? "" : "/p" + i) + '" class="jp-current">' + text + '</a>';
        //}
        //else{
        //    htmlpage += '<a href="' + $('#CurrentURL').val() + "/p" + i + '" class="jp-current">' + text + '</a>';
        //}
    }
    div.innerHTML = htmlpage;
}
function ShowPage(id) {
    page.CurrentPage = id;
    LoadData(id);
    return false;
}
/*endpaging*/
function BuildSeachLink(makeid, modelid, cityid, bitValue, minprice, maxprice, minyear, maxyear, exteriorColor, interiorColor) {
    //Kiểm tra nếu minprice > maxprice thì đổi ngược lại
    var medial = 0;
    if (minprice > maxprice) {
        medial = maxprice;
        maxprice = minprice;
        minprice = medial;
    }
    if (minyear > maxyear) {
        medial = maxyear;
        maxyear = minyear;
        minyear = medial;
    }
    var urlFormat;
    var modelcity = (makeid == 0 ? "" : "-" + makeid) + (modelid == 0 ? "" : "-" + modelid) + (cityid == 0 ? "" : "-" + cityid);
    var year = '';
    if (minyear == minvalueyear && maxyear == maxvalueyear) year = '5555';
    else if (minyear == minvalueyear && maxyear != maxvalueyear) year = '55' + maxyear.toString().substr(2, 2);
    else if (minyear != minvalueyear && maxyear == maxvalueyear) year = minyear.toString().substr(2, 2) + '55';
    else year = minyear.toString().substr(2, 2) + maxyear.toString().substr(2, 2);

    var price = '';
    var colorVal = '';
    if (minprice == minvalueprice && maxprice != maxvalueprice) price = 'lt' + maxprice;
    else if (minprice != minvalueprice && maxprice == maxvalueprice) price = 'gt' + minprice;
    else price = minprice + "-" + maxprice;

    //if ((minprice != minvalueprice || maxprice != maxvalueprice)
    //    && (bitValue != 0 || minyear != minvalueyear || maxyear != maxvalueyear)
    //    && (interiorColor != 0 || exteriorColor != 0)) {
    //    urlFormat = "/ban-xe{0}/m{1}/f{2}{3}/c{4}";
    //    colorVal = exteriorColor + "-" + interiorColor;
    //    return String.format(urlFormat, modelcity, price, bitValue, year, colorVal);
    //}
    //else if ((minprice != minvalueprice || maxprice != maxvalueprice)
    //    && (bitValue == 0 & minyear == minvalueyear & maxyear == maxvalueyear)
    //    && (interiorColor != 0 || exteriorColor != 0)) {
    //    urlFormat = "/ban-xe{0}/m{1}/c{2}";
    //    colorVal = exteriorColor + "-" + interiorColor;
    //    return String.format(urlFormat, modelcity, price, colorVal);
    //}
    //else if ((minprice == minvalueprice && maxprice == maxvalueprice)
    //    && (bitValue != 0 || minyear != minvalueyear || maxyear != maxvalueyear)
    //    && (interiorColor != 0 || exteriorColor != 0)) {
    //    urlFormat = "/ban-xe{0}/f{1}{2}/c{3}";
    //    colorVal = exteriorColor + "-" + interiorColor;
    //    return String.format(urlFormat, modelcity, bitValue, year, colorVal);
    //}
    if (interiorColor != 0 || exteriorColor != 0) {
        urlFormat = "/ban-xe{0}/m{1}/f{2}{3}/c{4}";
        colorVal = exteriorColor + "-" + interiorColor;
        return String.format(urlFormat, modelcity, price, bitValue, year, colorVal);
    }
    else if ((minprice == minvalueprice && maxprice == maxvalueprice)
        && (bitValue == 0 & minyear == minvalueyear & maxyear == maxvalueyear)
        && (interiorColor != 0 || exteriorColor != 0)) {
        urlFormat = "/ban-xe{0}/c{1}";
        colorVal = exteriorColor + "-" + interiorColor;
        return String.format(urlFormat, modelcity, colorVal);
    }
    else if ((minprice != minvalueprice || maxprice != maxvalueprice)
        && (bitValue != 0 || minyear != minvalueyear || maxyear != maxvalueyear)) {
        urlFormat = "/ban-xe{0}/m{1}/f{2}{3}";
        return String.format(urlFormat, modelcity, price, bitValue, year);
    }
    else if ((minprice == minvalueprice && maxprice == maxvalueprice)
        && (bitValue != 0 || minyear != minvalueyear || maxyear != maxvalueyear)) {
        urlFormat = "/ban-xe{0}/f{1}{2}";
        return String.format(urlFormat, modelcity, bitValue, year);
    }
    else if ((minprice != minvalueprice || maxprice != maxvalueprice)
        && (bitValue == 0 & minyear == minvalueyear & maxyear == maxvalueyear)) {
        urlFormat = "/ban-xe{0}/m{1}";
        return String.format(urlFormat, modelcity, price);
    }
    else if ((minprice == minvalueprice && maxprice == maxvalueprice)
        && (bitValue == 0 && minyear == minvalueyear && maxyear == maxvalueyear)) {
        urlFormat = "/ban-xe{0}";
        return String.format(urlFormat, modelcity);
    }
    return "";
}

function BuildSalonLink(salontype, cityid, cityshortname, keyword) {
    var urlFormat, salontypename, cityname;
    if (salontype == 1) {
        salontypename = "xe-moi";
    }
    else if (salontype == 2) {
        salontypename = "xe-cu";
    }
    else { salontypename = ""; }

    var salontypecity = (salontype == 0 ? "" : "-" + salontypename) + (cityid == 0 ? "" : "-" + cityshortname);
    if (keyword != "") {
        urlFormat = "/salons{0}-{1}";
        return String.format(urlFormat, salontypecity, keyword);
    }
    else {
        urlFormat = "/salons{0}";
        return String.format(urlFormat, salontypecity);
    }
}

String.format = function (format) {
    var args = Array.prototype.slice.call(arguments, 1);
    return format.replace(/{(\d+)}/g, function (match, number) {
        return typeof args[number] != 'undefined'
          ? args[number]
          : match
        ;
    });
};



$.fn.combobuyprice = function (initValueModel, initTextModel) {
    this.each(function () {
        var objId = $(this).attr('id');
        var inputId = $(this).find('input').attr('id');
        var data = $('#buyprice').data('list');
        var htmlafter = '';
        htmlafter += '    <div class="selected"><div class="price">' + initTextModel + '</div></div>';
        htmlafter += '    <div class="list" style="display:none;" >';
        htmlafter += '<ul>';
        for (var i = 0; i < data.length; i++) {
            htmlafter += '<li><a rel="' + data[i].value + '" href="javascript:void(0)">' + data[i].text + '</a></li>';
        }
        htmlafter += '</ul>';
        htmlafter += '    </div>';
        if (type = 1) {
            $('.combocustprice').html(htmlafter);
        }
        else {
            $('.combocustcity').html(htmlafter);
        }


        $('#' + objId + ' .selected').click(function () {
            if ($(this).hasClass('active')) {
                finish();
            } else {
                $(this).addClass('active');
                //$(this).css('margin-top', '-21px')
                $('#' + objId + ' .list').show();
            }
        });
        $('#' + objId + ' .list a').click(function () {
            var text = $(this).html();
            var value = $(this).attr('rel');
            SetFilterSortByCookiePrice(value);
            finish(text, value);
        });
        $(document).mouseup(function (e) {
            var container = $("#" + objId);
            if (!container.is(e.target) // if the target of the click isn't the container...
                && container.has(e.target).length === 0 // ... nor a descendant of the container
                && $('#' + objId + ' .selected').hasClass('active')) {
                finish();
            }
        });
        function finish(text, value) {
            if (text != null && text != '') $('#' + objId + ' .price').html(text);
            if (value != null && value != '') $('#' + inputId).val(value);
            $('#' + objId + ' .selected').removeClass('active');
            //$('#' + objId + ' .selected').css('margin-top', '5px');
            $('#' + objId + ' .list').hide();
        }
    });
};
function SetFilterSortByCookiePrice(index) {
    document.cookie = "SearchPrice=" + index + ";path=/;";
    var url = document.URL;
    url = url.replace(new RegExp("/p([0-9]+)"), "");//bo phan trang di ve trang 1
    location.href = url;
}

$.fn.combobuycity = function (initValueModel, initTextModel) {
    this.each(function () {
        var objId = $(this).attr('id');
        var inputId = $(this).find('input').attr('id');
        var data = $('#buycity').data('list');
        var htmlafter = '';
        htmlafter += '    <div class="selected"><div class="price">' + initTextModel + '</div></div>';
        htmlafter += '    <div class="list" style="display:none;" >';
        htmlafter += '<ul>';
        for (var i = 0; i < data.length; i++) {
            htmlafter += '<li><a rel="' + data[i].value + '" href="javascript:void(0)">' + data[i].text + '</a></li>';
        }
        htmlafter += '</ul>';
        htmlafter += '    </div>';

        $('.combocustcity').html(htmlafter);

        $('#' + objId + ' .selected').click(function () {
            if ($(this).hasClass('active')) {
                finish();
            } else {
                $(this).addClass('active');
                //$(this).css('margin-top', '-21px')
                $('#' + objId + ' .list').show();
            }
        });
        $('#' + objId + ' .list a').click(function () {
            var text = $(this).html();
            var value = $(this).attr('rel');
            SetFilterSortByCookieCity(value);
            finish(text, value);
        });
        $(document).mouseup(function (e) {
            var container = $("#" + objId);
            if (!container.is(e.target) // if the target of the click isn't the container...
                && container.has(e.target).length === 0 // ... nor a descendant of the container
                && $('#' + objId + ' .selected').hasClass('active')) {
                finish();
            }
        });
        function finish(text, value) {
            if (text != null && text != '') $('#' + objId + ' .price').html(text);
            if (value != null && value != '') $('#' + inputId).val(value);
            $('#' + objId + ' .selected').removeClass('active');
            //$('#' + objId + ' .selected').css('margin-top', '5px');
            $('#' + objId + ' .list').hide();
        }
    });
};

function SetFilterSortByCookieCity(index) {
    document.cookie = "SearchCity=" + index + ";path=/;";
    var url = document.URL;
    url = url.replace(new RegExp("/p([0-9]+)"), "");//bo phan trang di ve trang 1
    location.href = url;
}

function setcookieStatus(value) {
    document.cookie = "cookieSecondHand=" + value + ";path=/;";
    location.reload();
};

$.fn.anotherfilter = function () {
    this.each(function () {
        $(this).find('.af-text').click(function () {
            $(this).parent().toggleClass('another-filler-active');
        });
        $(this).find('li').find('a').click(function () {
            $(this).parent().toggleClass('active');
        });
        $(this).find('img.af-search-button').click(function () {
            execSearch();
        });
        $(document).mouseup(function (e) {
            var container = $('.another-filler-active');
            if (!container.is(e.target) // if the target of the click isn't the container...
                && container.has(e.target).length === 0 // ... nor a descendant of the container
                && $(container).hasClass('another-filler-active')) {
                $(container).removeClass('another-filler-active');
            }
        });
    }
)
};

function loadList(PageIndex) {
    location.href = $('#CurrentURL').val() + "/p" + PageIndex;
}

function ResetPage() {
    try {
        var count = eval(document.getElementById("PageNum").value);
        page = new PageInfo(count, document.getElementById("PageIndex").value);
    }
    catch (e) { alert(e.message); }
}

$.fn.capchar = function () {
    $(this).click(function () {
        $('.verifycode').attr('src', '/captcha/' + Math.random());
    });
};

$.fn.comboColorOut = function (initValueColor, initTextColor) {
    this.each(function () {
        var objId = $(this).attr('id');
        var inputId = "ExteriorColor";
        var datawidth = $('#ColorIDOut').attr('data-width');
        var data = $('#ColorIDOut').data('list');
        var htmlafter = '';
        htmlafter += '    <div style="width:' + datawidth + '" class="segmentedsection"><span class="segtext" style="width:' + datawidth + '">' + initTextColor + '</span><span class="segdart"></span></div>';
        htmlafter += '    <div class="af-color" style="display:none;width:345px;" >';
        for (i = 0; i < data.length; i++) {
            if (initValueColor == data[i].value) {
                htmlafter += '<div class="af-color-item" >';
                htmlafter += '  <a class="selected" style=\"background: url(\'/style/images/color-' + data[i].ExtValue + '.png\') no-repeat left;\" rel=' + data[i].BitValue + '>' + data[i].Key + '</a> ';
                htmlafter += ' </div>';
            }
            else {
                htmlafter += '<div class="af-color-item" >';
                htmlafter += '  <a style=\"background: url(\'/style/images/color-' + data[i].ExtValue + '.png\') no-repeat left;\" rel=' + data[i].BitValue + '>' + data[i].Key + '</a> ';
                htmlafter += ' </div>';
            }
            if (i % 2 == 1) {
                htmlafter += '<div class=\"af-line\"></div>';
            }
        }
        htmlafter += '    </div>';
        $('.combogridcolorout').html(htmlafter);
        $('#' + objId + ' .segmentedsection').click(function () {
            if ($(this).hasClass('segmentedsectionactive')) {
                finish();
            } else {
                $(this).addClass('segmentedsectionactive');
                $('#' + objId + ' .af-color').show();
            }
        });
        $('#' + objId + ' .af-color a').click(function () {
            var text = $(this).html();
            var value = $(this).attr('rel');
            $('#' + objId + ' .af-color a').removeClass('selected');
            $(this).addClass('selected');
            finish(text, value);
        });
        $(document).mouseup(function (e) {
            var container = $("#" + objId);
            if (!container.is(e.target) // if the target of the click isn't the container...
                && container.has(e.target).length === 0 // ... nor a descendant of the container
                && $('#' + objId + ' .segmentedsection').hasClass('segmentedsectionactive')) {
                finish();
            }
        });
        function finish(text, value) {
            if (text != null && text != '') {
                $('#' + objId + ' .segtext').html(text);
                $('#OutColor').val(text);
            }
            if (value != null && value != '') $('#' + inputId).val(value);
            $('#' + objId + ' .segmentedsection').removeClass('segmentedsectionactive');
            $('#' + objId + ' .af-color').hide();
        }
    });
};

$.fn.comboColorIn = function (initValueColor, initTextColor) {
    this.each(function () {
        var objId = $(this).attr('id');
        var inputId = "InteriorColor";
        var datawidth = $('#ColorIDIn').attr('data-width');
        var data = $('#ColorIDIn').data('list');
        var htmlafter = '';
        htmlafter += '    <div style="width:' + datawidth + '" class="segmentedsection"><span class="segtext" style="width:' + datawidth + '">' + initTextColor + '</span><span class="segdart"></span></div>';
        htmlafter += '    <div class="af-color" style="display:none;width:345px;" >';
        for (i = 0; i < data.length; i++) {
            if (initValueColor == data[i].value) {
                htmlafter += '<div class="af-color-item" >';
                htmlafter += '  <a class="selected" style=\"background: url(\'/style/images/color-' + data[i].ExtValue + '.png\') no-repeat left;\" rel=' + data[i].BitValue + '>' + data[i].Key + '</a> ';
                htmlafter += ' </div>';
            }
            else {
                htmlafter += '<div class="af-color-item" >';
                htmlafter += '  <a style=\"background: url(\'/style/images/color-' + data[i].ExtValue + '.png\') no-repeat left;\" rel=' + data[i].BitValue + '>' + data[i].Key + '</a> ';
                htmlafter += ' </div>';
            }
            if (i % 2 == 1) {
                htmlafter += '<div class=\"af-line\"></div>';
            }
        }
        htmlafter += '    </div>';
        $('.combogridcolorin').html(htmlafter);
        $('#' + objId + ' .segmentedsection').click(function () {
            if ($(this).hasClass('segmentedsectionactive')) {
                finish();
            } else {
                $(this).addClass('segmentedsectionactive');
                $('#' + objId + ' .af-color').show();
            }
        });
        $('#' + objId + ' .af-color a').click(function () {
            var text = $(this).html();
            var value = $(this).attr('rel');
            $('#' + objId + ' .af-color a').removeClass('selected');
            $(this).addClass('selected');
            finish(text, value);
        });
        $(document).mouseup(function (e) {
            var container = $("#" + objId);
            if (!container.is(e.target) // if the target of the click isn't the container...
                && container.has(e.target).length === 0 // ... nor a descendant of the container
                && $('#' + objId + ' .segmentedsection').hasClass('segmentedsectionactive')) {
                finish();
            }
        });
        function finish(text, value) {
            if (text != null && text != '') {
                $('#' + objId + ' .segtext').html(text);
                $('#InColor').val(text);
            };
            if (value != null && value != '') $('#' + inputId).val(value);
            $('#' + objId + ' .segmentedsection').removeClass('segmentedsectionactive');
            $('#' + objId + ' .af-color').hide();
        }
    });
};

var HasState = function (itemValue, bitValue) {
    bitValue = eval(bitValue);
    itemValue = eval(itemValue);
    bitValue = parseInt(bitValue).toString(2);
    itemValue = parseInt(itemValue).toString(2);
    return CheckBit(bitValue, itemValue);
};
var CheckBit = function (stringBit, stringItem) {
    if (stringItem.length > 0) {
        for (var i = stringItem.length - 1; i >= 0; i--) {
            if (stringItem[i] == "1") {
                var j = stringBit.length - stringItem.length + i;
                if (j >= 0 && stringBit.length > j && stringBit[j] == "1") return true;
                else return false;
            }
        }
    }
    return true;
};

$.fn.combogridmake = function (initValueMake, initTextMake, initShortMake, datawidth, isGetAll, type, className, relName, isDisableModify, functionOnChange) {
    this.each(function () {
        var objId = $(this).attr('id');
        //var url = isGetAll ? "/Make/JsonAllMake" : "/Make/JsonMake";
        var url = "/Make/JsonAllMake";
        if (initTextMake == '') initTextMake = 'Chọn';
        $.ajax({
            type: "POST",
            cache: false,
            url: url,
            success: function (data) {
                if (data != null) {
                    var htmlbefore = '<input id="MakeID" type="hidden" name="MakeID" class="' + className + '" rel="' + relName + '" value="' + initValueMake + '">';
                    htmlbefore += '<input id="ShortMakeName" type="hidden" name="ShortMakeName" value="' + initShortMake + '">';
                    htmlbefore += '<input id="MakeName" type="hidden" name="MakeName" value="' + initTextMake + '">';
                    htmlbefore += '<div style="width:' + datawidth + 'px" class="dvcombo"><span class="combotext" style="width:' + eval(datawidth - 28) + 'px">' + initTextMake + '</span><span class="dartdown"></span></div>';
                    var htmlafter = '<div class="makecombogridcontainer combogridcontainer" style="display:none;width:320px;" >';
                    htmlafter += '    <div id="combogridcontainer_col1" class="combogridcontainer_col"></div>';
                    htmlafter += '    <div id="combogridcontainer_col2" class="combogridcontainer_col"></div>';
                    htmlafter += '    <div id="combogridcontainerexpand" style="display:none">';
                    htmlafter += '        <div id="combogridcontainer_col3" class="combogridcontainer_col"></div>';
                    htmlafter += '        <div id="combogridcontainer_col4" class="combogridcontainer_col"></div>';
                    htmlafter += '        <div id="combogridcontainer_col5" class="combogridcontainer_col"></div>';
                    htmlafter += '        <div id="combogridcontainer_col6" class="combogridcontainer_col"></div>';
                    htmlafter += '        <div id="combogridcontainer_col7" class="combogridcontainer_col"></div>';
                    htmlafter += '    </div>';
                    htmlafter += '</div>';
                    $('#' + objId).html(htmlbefore);
                    $('body').append(htmlafter);

                    var htmlcol1 = '    <div class="combogridcontainer_item"><a href="javascript:void(0)" rel="0" data-title="" >' + 'Tất cả' + '</a></div>';
                    var htmlcol2 = '';
                    var htmlcol3 = '';
                    var htmlcol4 = '';
                    var htmlcol5 = '';
                    var htmlcol6 = '';
                    var htmlcol7 = '';
                    var isExpand = false;
                    for (var i = 0; i < data.length; i++) {
                        var htmlSelected = '';
                        if (initValueMake == data[i].MakeID) {
                            htmlSelected = 'class="selected"';
                            $('#MakeName').val(data[i].MakeName);
                            $('#ShortMakeName').val(data[i].ShortMakeName);
                            $('#' + objId + ' .combotext').html(data[i].MakeName);
                            if (i >= 24) isExpand = true;
                        }
                        var htmlItem = '    <div class="combogridcontainer_item"><a ' + htmlSelected + ' href="javascript:void(0)" data-title="' + data[i].ShortMakeName + '" rel="' + data[i].MakeID + '" >' + data[i].MakeName + '</a></div>';
                        if (i < 14) {
                            htmlcol1 += htmlItem;
                        }
                        else if (i < 24) {
                            htmlcol2 += htmlItem;
                        }
                        else if (i >= 24 && i < 39) {
                            htmlcol3 += htmlItem;
                        }
                        else if (i >= 39 && i < 54) {
                            htmlcol4 += htmlItem;
                        }
                        else if (i >= 54 && i < 69) {
                            htmlcol5 += htmlItem;
                        }
                        else if (i >= 69 && i < 84) {
                            htmlcol6 += htmlItem;
                        }
                        else if (i >= 84 && i < 99) {
                            htmlcol7 += htmlItem;
                        }
                    }
                    htmlcol2 += '    <div class="combogridcontainer_item special"><a href="javascript:void(0)" id="expandColumn">Hãng xe khác &#187;</a></div>';
                    $('.makecombogridcontainer #combogridcontainer_col1').append(htmlcol1);
                    $('.makecombogridcontainer #combogridcontainer_col2').append(htmlcol2);
                    $('.makecombogridcontainer #combogridcontainer_col3').append(htmlcol3);
                    $('.makecombogridcontainer #combogridcontainer_col4').append(htmlcol4);
                    $('.makecombogridcontainer #combogridcontainer_col5').append(htmlcol5);
                    $('.makecombogridcontainer #combogridcontainer_col6').append(htmlcol6);
                    htmlcol7 += '    <div class="combogridcontainer_item special"><a href="javascript:void(0)" id="colapeColumn">&#171; Thu gọn</a></div>';
                    $('.makecombogridcontainer #combogridcontainer_col7').append(htmlcol7);
                    if (isExpand) {
                        $('#expandColumn').hide();
                        $('.makecombogridcontainer').css('width', 1050);
                        $('#combogridcontainerexpand').show();
                    }
                    //define functions
                    var finishcombomake = function (text, value, shortname) {
                        if (value == 0) $('#' + objId + ' .combotext').html('Hãng xe');
                        if (value != 0 && text != null && text != '') {
                            $('#' + objId + ' .combotext').html(text);
                            $('#MakeName').val(text);
                        }
                        if (value != null && value != '') $('#MakeID').val(value);
                        if (shortname != null) $('#ShortMakeName').val(shortname);
                        $('#' + objId + ' .dvcombo').removeClass('segmentedsectionactive');
                        $('.makecombogridcontainer').hide();
                        if (functionOnChange != null) functionOnChange();
                    };
                    $(document).mouseup(function (e) {
                        if (e.target.id == 'expandColumn') return;
                        if (e.target.id == 'colapeColumn') return;
                        var container = $("#" + objId);
                        if (!container.is(e.target) // if the target of the click isn't the container...
                            && container.has(e.target).length === 0 // ... nor a descendant of the container
                            && $('#' + objId + ' .dvcombo').hasClass('segmentedsectionactive')) {
                            finishcombomake();
                        }
                    });
                    $('#' + objId + ' .dvcombo').click(function () {
                        if (isDisableModify) return;
                        if ($(this).hasClass('segmentedsectionactive')) {
                            finishcombomake();
                        } else {
                            $(this).addClass('segmentedsectionactive');
                            $('.makecombogridcontainer').show();
                            $('.makecombogridcontainer').css('top', $(this).offset().top + 29);
                            if (type == 1 || type == 3 || type == 4) $('.makecombogridcontainer').css('left', $(this).offset().left);
                            else if (type == 2 && $('#combogridcontainerexpand').css('display') == 'none') $('.makecombogridcontainer').css('left', $(this).offset().left - 199);
                            else if (type == 2 && $('#combogridcontainerexpand').css('display') != 'none') $('.makecombogridcontainer').css('left', $(this).offset().left - 776);
                            else if (type == 5 && $('#combogridcontainerexpand').css('display') == 'none') $('.makecombogridcontainer').css('left', $(this).offset().left - 48);
                        }
                    });
                    $('.makecombogridcontainer a').click(function () {
                        if ($(this).attr('id') == 'expandColumn') return;
                        if ($(this).attr('id') == 'colapeColumn') return;
                        var text = $(this).html();
                        var value = $(this).attr('rel');
                        var shortname = $(this).attr('data-title');
                        $('.makecombogridcontainer a').removeClass('selected');
                        $(this).addClass('selected');
                        $('#ModelSearch').combogridmodel(value, "0", "Loại xe", "", datawidth, isGetAll, type, 'cb_required', "Loại xe", isDisableModify, functionOnChange);
                        finishcombomake(text, value, shortname);
                    });
                    $('#expandColumn').click(function () {
                        $('#expandColumn').hide();
                        $('.makecombogridcontainer').css('width', 1050);
                        $('#combogridcontainerexpand').show();
                        if (type == 2) $('.makecombogridcontainer').css('left', $('.makecombogridcontainer').offset().left - 577);
                        else if (type == 5) $('.makecombogridcontainer').css('left', $('.makecombogridcontainer').offset().left - 730);
                    });
                    $('#colapeColumn').click(function () {
                        $('#expandColumn').show();
                        $('.makecombogridcontainer').css('width', 320);
                        $('#combogridcontainerexpand').hide();
                        if (type == 2) $('.makecombogridcontainer').css('left', $('#' + objId + ' .dvcombo').offset().left - 199);
                        else if (type == 5) $('.makecombogridcontainer').css('left', $('#' + objId + ' .dvcombo').offset().left - 48);
                    });
                }
            }
        });
    });
};

$.fn.combogridmodel = function (initValueMake, initValueModel, initTextModel, initShortModel, datawidth, isGetAll, type, className, relName, isDisableModify, functionOnChange) {
    if (initTextModel == '') initTextModel = 'Chọn';
    //this.each(function () {
    var objId = $(this).attr('id');
    //var url = isGetAll ? ("/model/jsonallmodels/" + eval(initValueMake)) : ("/model/jsonmodels/" + eval(initValueMake));
    var url = "/model/jsonallmodels/" + eval(initValueMake);
    $.getJSON("" + url + "", function (data) {
        var htmlbefore = '<input id="ModelID" type="hidden" name="ModelID" class="' + className + '" rel="' + relName + '" value="' + initValueModel + '">';
        htmlbefore += '<input id="ShortModelName" type="hidden" name="ShortModelName" value="' + initShortModel + '">';
        htmlbefore += '<input id="ModelName" type="hidden" name="ModelName" value="' + initTextModel + '">';
        htmlbefore += '<div style="width:' + datawidth + 'px" class="dvcombo"><span class="combotext" style="width:' + eval(datawidth - 28) + 'px">' + initTextModel + '</span><span class="dartdown"></span></div>';
        var htmlafter = '';
        if (type == 1 || type == 3) htmlafter += '<div class="modelcombogridcontainer combogridcontainer" style="display:none;width:149px;" >';
        else if (type == 2 || type == 4 || type == 5) htmlafter += '<div class="modelcombogridcontainer combogridcontainer" style="display:none;width:121px;" >';
        htmlafter += '    <div id="combogridcontainer_col1" class="combogridcontainer_col"></div>';
        htmlafter += '    <div id="combogridcontainer_col2" class="combogridcontainer_col"></div>';
        htmlafter += '    <div id="combogridcontainer_col3" class="combogridcontainer_col"></div>';
        htmlafter += '    <div id="combogridcontainer_col4" class="combogridcontainer_col"></div>';
        htmlafter += '    <div id="combogridcontainer_col5" class="combogridcontainer_col"></div>';
        htmlafter += '    <div id="combogridcontainer_col6" class="combogridcontainer_col"></div>';
        htmlafter += '    <div id="combogridcontainer_col7" class="combogridcontainer_col"></div>';
        htmlafter += '</div>';

        $('#' + objId).html(htmlbefore);
        $('.modelcombogridcontainer').remove();
        $('body').append(htmlafter);
        var htmlcol1 = '    <div class="combogridcontainer_item"><a href="javascript:void(0)" data-title="" rel="' + 0 + '" >' + 'Tất cả' + '</a></div>';
        var htmlcol2 = '';
        var htmlcol3 = '';
        var htmlcol4 = '';
        var htmlcol5 = '';
        var htmlcol6 = '';
        var htmlcol7 = '';
        for (var i = 0; i < data.length; i++) {
            var htmlSelected = '';
            if (initValueModel == data[i].ModelID) {
                htmlSelected = 'class="selected"';
                $('#ModelName').val(data[i].ModelName);
                $('#ShortModelName').val(data[i].ShortModelName);
                $('#' + objId + ' .combotext').html(data[i].ModelName);
            }
            var htmlItem = '     <div class="combogridcontainer_item"><a href="javascript:void(0)" ' + htmlSelected + ' data-title="' + data[i].ShortModelName + '" rel="' + data[i].ModelID + '" >' + data[i].ModelName + '</a></div>';
            if (i < 14) {
                htmlcol1 += htmlItem;
            }
            else if (i < 29) {
                htmlcol2 += htmlItem;
            }
            else if (i >= 29 && i < 44) {
                htmlcol3 += htmlItem;
            }
            else if (i >= 44 && i < 59) {
                htmlcol4 += htmlItem;
            }
            else if (i >= 59 && i < 74) {
                htmlcol5 += htmlItem;
            }
            else if (i >= 74 && i < 89) {
                htmlcol6 += htmlItem;
            }
            else if (i >= 89 && i < 104) {
                htmlcol7 += htmlItem;
            }
        }
        $('.modelcombogridcontainer #combogridcontainer_col1').append(htmlcol1);
        if (htmlcol2 != '') {
            $('.modelcombogridcontainer').css('width', 300);
            $('.modelcombogridcontainer #combogridcontainer_col2').append(htmlcol2);
        }
        if (htmlcol3 != '') {
            $('.modelcombogridcontainer').css('width', 450);
            $('.modelcombogridcontainer #combogridcontainer_col3').append(htmlcol3);
        }
        if (htmlcol4 != '') {
            $('.modelcombogridcontainer').css('width', 600);
            $('.modelcombogridcontainer #combogridcontainer_col4').append(htmlcol4);
        }
        if (htmlcol5 != '') {
            $('.modelcombogridcontainer').css('width', 750);
            $('.modelcombogridcontainer #combogridcontainer_col5').append(htmlcol5);
        }
        if (htmlcol6 != '') {
            $('.modelcombogridcontainer').css('width', 900);
            $('.modelcombogridcontainer #combogridcontainer_col6').append(htmlcol6);
        }
        if (htmlcol7 != '') {
            $('.modelcombogridcontainer').css('width', 1050);
            $('.modelcombogridcontainer #combogridcontainer_col7').append(htmlcol7);
        }
        $('#' + objId + ' .dvcombo').click(function () {
            if (isDisableModify) return;
            if ($(this).hasClass('segmentedsectionactive')) {
                finishmodel();
            } else {
                $(this).addClass('segmentedsectionactive');
                $('.modelcombogridcontainer').show();
                $('.modelcombogridcontainer').css('top', $(this).offset().top + 29);
                if (type == 1) $('.modelcombogridcontainer').css('left', $(this).offset().left);
                else if (type == 3 && $('.modelcombogridcontainer #combogridcontainer_col5').html().length == 0) {
                    $('.modelcombogridcontainer').css('left', $(this).offset().left);
                }
                else if (type == 3 && $('.modelcombogridcontainer #combogridcontainer_col5').html().length > 0) {
                    var leftindex = $(this).offset().left - eval($('.modelcombogridcontainer').css('width').replace('px', '')) + 588;
                    $('.modelcombogridcontainer').css('left', leftindex);
                }
                if (type == 2) {
                    var leftindex = $(this).offset().left - eval($('.modelcombogridcontainer').css('width').replace('px', '')) + 121;
                    $('.modelcombogridcontainer').css('left', leftindex);
                }
                if (type == 4) {
                    var element = $('.modelcombogridcontainer');
                    var screenWidth = window.screen.width;
                    var elementWidth = element.width();
                    var comboLeft = $(this).offset().left;
                    var left = comboLeft;

                    if (screenWidth - comboLeft < elementWidth) {
                        left = comboLeft - Math.abs(screenWidth - elementWidth - comboLeft - 50);
                    }

                    element.css("left", left);
                }

                if (type == 5) {
                    var leftindex = $(this).offset().left - eval($('.modelcombogridcontainer').css('width').replace('px', '')) + 272;
                    $('.modelcombogridcontainer').css('left', leftindex);
                }
            }
        });
        $('.modelcombogridcontainer a').click(function () {
            var text = $(this).html();
            var value = $(this).attr('rel');
            var shortmodelname = $(this).attr('data-title');
            $('.modelcombogridcontainer a').removeClass('selected');
            $(this).addClass('selected');
            finishmodel(text, value, shortmodelname);

        });
    });
    $(document).mouseup(function (e) {
        var container = $("#" + objId);
        if (!container.is(e.target) // if the target of the click isn't the container...
            && container.has(e.target).length === 0 // ... nor a descendant of the container
            && $('#' + objId + ' .dvcombo').hasClass('segmentedsectionactive')) {
            finishmodel();
        }
    });
    var finishmodel = function (text, value, shortmodelname) {
        if (value == 0) $('#' + objId + ' .combotext').html('Loại xe');
        if (value != 0 && text != null && text != '') {
            $('#' + objId + ' .combotext').html(text);
            $('#ModelName').val(text);
        }
        if (value != null && value != '') $('#ModelID').val(value);
        if (shortmodelname != null) $('#ShortModelName').val(shortmodelname);
        $('#' + objId + ' .dvcombo').removeClass('segmentedsectionactive');
        $('.modelcombogridcontainer').hide();
        if (functionOnChange != null) functionOnChange();
    };
};

$.fn.combogridcity = function (data, initCityId, initShortName, initCityName, datawidth, type, className, relName, isUseArea) {
    this.each(function () {
        var objId = $(this).attr('id');
        if (initCityName == '') initCityName = 'Tỉnh / Thành phố';
        if (data != null) {
            var htmlbefore = '<input id="CityID" type="hidden" name="CityID" class="' + className + '" rel="' + relName + '" value="' + initCityId + '">';
            htmlbefore += '<input id="ShortCityName" type="hidden" name="ShortCityName" value="' + initShortName + '">';
            htmlbefore += '<input id="CityName" type="hidden" name="CityName" value="' + initCityName + '">';
            htmlbefore += '<div style="width:' + datawidth + 'px" class="dvcombo"><span class="combotext" style="width:' + eval(datawidth - 28) + 'px">' + initCityName + '</span><span class="dartdown"></span></div>';
            var htmlafter = '<div class="citycombogridcontainer combogridcontainer" style="display:none;width:450px;" >';
            htmlafter += '    <div id="combogridcontainer_col1" class="combogridcontainer_col"></div>';
            htmlafter += '    <div id="combogridcontainer_col2" class="combogridcontainer_col"></div>';
            htmlafter += '    <div id="combogridcontainer_col3" class="combogridcontainer_col"></div>';
            htmlafter += '</div>';
            $('#' + objId).html(htmlbefore);
            $('body').append(htmlafter);

            var htmlcol1 = '';
            if (isUseArea) htmlcol1 += '    <div class="combogridcontainer_item"><a href="javascript:void(0)" rel="10" data-title="mien-bac"><span>' + 'Miền Bắc' + '</span></a></div>';
            else htmlcol1 += '    <div class="combogridcontainer_item"><span>' + 'Miền Bắc' + '</span></div>';
            htmlcol1 += '    <div class="combogridcontainer_item"><a href="javascript:void(0)" class="specialcity" rel="1" data-title="ha-noi">' + 'Hà Nội' + '</a></div>';
            htmlcol1 += '    <div class="combogridcontainer_item"><a href="javascript:void(0)" class="specialcity" rel="92" data-title="hai-phong">' + 'Hải Phòng' + '</a></div>';
            var htmlcol2 = '';
            if (isUseArea) htmlcol2 += '    <div class="combogridcontainer_item"><a href="javascript:void(0)" rel="11" data-title="mien-trung"><span>' + 'Miền Trung' + '</span></a></div>';
            else htmlcol2 += '    <div class="combogridcontainer_item"><span>' + 'Miền Trung' + '</span></div>';
            htmlcol2 += '    <div class="combogridcontainer_item"><a href="javascript:void(0)" class="specialcity" rel="3" data-title="da-nang">' + 'Đà Nẵng' + '</a></div>';
            htmlcol2 += '    <div class="combogridcontainer_item"><a href="javascript:void(0)" class="specialcity" rel="123" data-title="thua-thien-hue">' + 'Thừa Thiên Huế' + '</a></div>';
            htmlcol2 += '    <div class="combogridcontainer_item"><a href="javascript:void(0)" class="specialcity" rel="96" data-title="khanh-hoa">' + 'Khánh Hòa' + '</a></div>';
            htmlcol2 += '    <div class="combogridcontainer_item"><a href="javascript:void(0)" class="specialcity" rel="101" data-title="lam-dong">' + 'Lâm Đồng' + '</a></div>';
            var htmlcol3 = '';
            if (isUseArea) htmlcol3 += '    <div class="combogridcontainer_item"><a href="javascript:void(0)" rel="12" data-title="mien-nam"><span>' + 'Miền Nam' + '</span></a></div>';
            else htmlcol3 += '    <div class="combogridcontainer_item"><span>' + 'Miền Nam' + '</span></div>';
            htmlcol3 += '    <div class="combogridcontainer_item"><a href="javascript:void(0)" class="specialcity" rel="2" data-title="hcm">' + 'Tp.HCM' + '</a></div>';
            htmlcol3 += '    <div class="combogridcontainer_item"><a href="javascript:void(0)" class="specialcity" rel="66" data-title="binh-duong">' + 'Bình Dương' + '</a></div>';
            htmlcol3 += '    <div class="combogridcontainer_item"><a href="javascript:void(0)" class="specialcity" rel="127" data-title="ba-ria-vung-tau">' + 'Bà Rịa Vũng Tàu' + '</a></div>';
            htmlcol3 += '    <div class="combogridcontainer_item"><a href="javascript:void(0)" class="specialcity" rel="78" data-title="can-tho">' + 'Cần Thơ' + '</a></div>';
            var dataCity = data[0].jsonMBData;
            if (initCityId == 1) {
                $('#CityName').val('Hà Nội');
                $('#ShortCityName').val('ha-noi');
                $('#' + objId + ' .combotext').html('Hà Nội');
            }
            else if (initCityId == 92) {
                $('#CityName').val('Hải Phòng');
                $('#ShortCityName').val('hai-phong');
                $('#' + objId + ' .combotext').html('Hải Phòng');
            }
            else if (initCityId == 3) {
                $('#CityName').val('Đà Nẵng');
                $('#ShortCityName').val('da-nang');
                $('#' + objId + ' .combotext').html('Đà Nẵng');
            }
            else if (initCityId == 123) {
                $('#CityName').val('Thừa Thiên Huế');
                $('#ShortCityName').val('thua-thien-hue');
                $('#' + objId + ' .combotext').html('Thừa Thiên Huế');
            }
            else if (initCityId == 96) {
                $('#CityName').val('Khánh Hòa');
                $('#ShortCityName').val('khanh-hoa');
                $('#' + objId + ' .combotext').html('Khánh Hòa');
            }
            else if (initCityId == 101) {
                $('#CityName').val('Lâm Đồng');
                $('#ShortCityName').val('lam-dong');
                $('#' + objId + ' .combotext').html('Lâm Đồng');
            }

            else if (initCityId == 2) {
                $('#CityName').val('Tp.HCM');
                $('#ShortCityName').val('hcm');
                $('#' + objId + ' .combotext').html('Tp.HCM');
            }
            else if (initCityId == 66) {
                $('#CityName').val('Bình Dương');
                $('#ShortCityName').val('binh-duong');
                $('#' + objId + ' .combotext').html('Bình Dương');
            }
            else if (initCityId == 127) {
                $('#CityName').val('Bà Rịa Vũng Tàu');
                $('#ShortCityName').val('ba-ria-vung-tau');
                $('#' + objId + ' .combotext').html('Bà Rịa Vũng Tàu');
            }
            else if (initCityId == 78) {
                $('#CityName').val('Cần Thơ');
                $('#ShortCityName').val('can-tho');
                $('#' + objId + ' .combotext').html('Cần Thơ');
            }
            for (var i = 0; i < dataCity.length; i++) {
                var htmlSelected = '';
                if (initCityId == dataCity[i].Value) {
                    htmlSelected = 'class="selected"';
                    $('#CityName').val(dataCity[i].Text);
                    $('#ShortCityName').val(dataCity[i].ShortName);
                    $('#' + objId + ' .combotext').html(dataCity[i].Text);
                }
                var htmlItem = '    <div class="combogridcontainer_item"><a ' + htmlSelected + ' href="javascript:void(0)" data-title="' + dataCity[i].ShortName + '" rel="' + dataCity[i].Value + '" >' + dataCity[i].Text + '</a></div>';
                htmlcol1 += htmlItem;
            }
            dataCity = data[1].jsonMTData;
            for (var i = 0; i < dataCity.length; i++) {
                var htmlSelected = initCityId == dataCity[i].Value ? 'class="selected"' : '';
                var htmlItem = '    <div class="combogridcontainer_item"><a ' + htmlSelected + ' href="javascript:void(0)" data-title="' + dataCity[i].ShortName + '" rel="' + dataCity[i].Value + '" >' + dataCity[i].Text + '</a></div>';
                htmlcol2 += htmlItem;
            }
            dataCity = data[2].jsonMNData;
            for (var i = 0; i < dataCity.length; i++) {
                var htmlSelected = initCityId == dataCity[i].Value ? 'class="selected"' : '';
                var htmlItem = '    <div class="combogridcontainer_item"><a ' + htmlSelected + ' href="javascript:void(0)" data-title="' + dataCity[i].ShortName + '" rel="' + dataCity[i].Value + '" >' + dataCity[i].Text + '</a></div>';
                htmlcol3 += htmlItem;
            }
            $('.citycombogridcontainer #combogridcontainer_col1').append(htmlcol1);
            $('.citycombogridcontainer #combogridcontainer_col2').append(htmlcol2);
            $('.citycombogridcontainer #combogridcontainer_col3').append(htmlcol3);
            //define functions
            var finishcombocity = function (text, value, shortname) {
                if (text != null && text != '') {
                    $('#' + objId + ' .combotext').html(text);
                    $('#CityName').val(text);
                }
                if (value != null && value != '') $('#CityID').val(value);
                if (shortname != null && shortname != '') $('#ShortCityName').val(shortname);
                $('#' + objId + ' .dvcombo').removeClass('segmentedsectionactive');
                $('.citycombogridcontainer').hide();
            };
            $(document).mouseup(function (e) {
                var container = $("#" + objId);
                if (!container.is(e.target) // if the target of the click isn't the container...
                    && container.has(e.target).length === 0 // ... nor a descendant of the container
                    && $('#' + objId + ' .dvcombo').hasClass('segmentedsectionactive')) {
                    finishcombocity();
                }
            });
            $('#' + objId + ' .dvcombo').click(function () {
                if ($(this).hasClass('segmentedsectionactive')) {
                    finishcombocity();
                } else {
                    $(this).addClass('segmentedsectionactive');
                    $('.citycombogridcontainer').show();
                    $('.citycombogridcontainer').css('top', $(this).offset().top + 29);
                    if (type == 1 || type == 3) $('.citycombogridcontainer').css('left', $(this).offset().left);
                    else if (type == 2) {
                        var leftindex = $(this).offset().left - eval($('.citycombogridcontainer').css('width').replace('px', '')) + 121;
                        $('.citycombogridcontainer').css('left', leftindex);
                    }
                }
            });
            $('.citycombogridcontainer a').click(function () {
                var text = $(this).html();
                var value = $(this).attr('rel');
                var shortname = $(this).attr('data-title');
                $('.citycombogridcontainer a').removeClass('selected');
                $(this).addClass('selected');
                finishcombocity(text, value, shortname);
            });
        }
    });
};

$.fn.combogridyear = function (initMinValue, initMaxValue, initText, datawidth, type) {
    this.each(function () {
        var objId = $(this).attr('id');
        var htmlbefore = '<div style="width:' + datawidth + 'px" class="dvcombo"><span class="combotext" style="width:' + eval(datawidth - 28) + 'px">' + initText + '</span><span class="dartdown"></span></div>';
        $('#' + objId).html(htmlbefore);

        if (initMinValue == minvalueyear && initMaxValue == maxvalueyear) {
            initMinValue = '';
            initMaxValue = '';
        }
        var htmlafter = '';
        if (type == 1) htmlafter += '<div class="yearcombogridcontainer combogridcontainer" style="display:none;width:149px;" >';
        else if (type == 2) htmlafter += '<div class="yearcombogridcontainer combogridcontainer" style="display:none;width:121px;" >';
        var inputWidth = '';
        if (type == 2) inputWidth = ';width: 38px';
        htmlafter += '    <div class="dualbox" >';
        htmlafter += '        <input type="text" id="minyear" maxlength="4" style="margin-right: 5px' + inputWidth + '" class="yearOnly" placeholder="Từ" value="' + initMinValue + '">';
        htmlafter += '        <input type="text" id="maxyear" maxlength="4" style="text-align: right' + inputWidth + '" class="yearOnly" placeholder="Đến" value="' + initMaxValue + '">';
        htmlafter += '    </div>';
        var colwidth = '';
        if (type == 2) colwidth = ' style="width: 121px !important"';
        htmlafter += '    <div id="combogridcontainer_col1" class="combogridcontainer_col" ' + colwidth + '>';
        var htmlSelected = (initMinValue == minvalueyear && initMaxValue == 1992) ? 'class="selected"' : '';
        htmlafter += '        <div class="combogridcontainer_item"' + colwidth + '><a href="javascript:void(0)" ' + htmlSelected + ' data-title="' + minvalueyear + '" rel="1992" >Trước 1992</a></div>';
        htmlSelected = (initMinValue == 1992 && initMaxValue == 2000) ? 'class="selected"' : '';
        htmlafter += '        <div class="combogridcontainer_item"' + colwidth + '><a href="javascript:void(0)" ' + htmlSelected + ' data-title="1992" rel="2000" >1992 - 2000</a></div>';
        htmlSelected = (initMinValue == 2001 && initMaxValue == 2005) ? 'class="selected"' : '';
        htmlafter += '        <div class="combogridcontainer_item"' + colwidth + '><a href="javascript:void(0)" ' + htmlSelected + ' data-title="2001" rel="2005" >2001 - 2005</a></div>';
        htmlSelected = (initMinValue == 2006 && initMaxValue == 2010) ? 'class="selected"' : '';
        htmlafter += '        <div class="combogridcontainer_item"' + colwidth + '><a href="javascript:void(0)" ' + htmlSelected + ' data-title="2006" rel="2010" >2006 - 2010</a></div>';
        htmlSelected = (initMinValue == 2011 && initMaxValue == maxvalueyear) ? 'class="selected"' : '';
        htmlafter += '        <div class="combogridcontainer_item"' + colwidth + '><a href="javascript:void(0)" ' + htmlSelected + ' data-title="2011" rel="' + maxvalueyear + '" >2011 tới nay</a></div>';
        htmlafter += '    </div>';
        htmlafter += '</div>';
        $('body').append(htmlafter);


        jQuery(".yearOnly").keyup(function () {
            //if ($(this).val() == 'Từ' || $(this).val() == 'Đến') return;
            $(this).val($(this).val().replace(/[^0-9]/g, ''));
        });
        $(document).mouseup(function (e) {
            if (e.target.id == 'minyear') return;
            if (e.target.id == 'maxyear') return;
            var container = $("#" + objId);
            if (!container.is(e.target) // if the target of the click isn't the container...
                && container.has(e.target).length === 0 // ... nor a descendant of the container
                && $('#' + objId + ' .dvcombo').hasClass('segmentedsectionactive')) {
                finishyear();
            }
        });
        $('#' + objId + ' .dvcombo').click(function () {
            if ($(this).hasClass('segmentedsectionactive')) {
                finishyear();
            } else {
                $(this).addClass('segmentedsectionactive');
                $('.yearcombogridcontainer').show();
                $('.yearcombogridcontainer').css('top', $(this).offset().top + 29);
                $('.yearcombogridcontainer').css('left', $(this).offset().left);
            }
        });
        $('#minyear').focus(function () {
            $(this).val('');
            $(this).addClass('active');
            $('#maxyear').removeClass('active');
        });
        $('#maxyear').focus(function () {
            $(this).val('');
            $(this).addClass('active');
            $('#minyear').removeClass('active');
        });
        $('.yearcombogridcontainer a').click(function () {
            $('#minyear').val($(this).attr('data-title'));
            $('#maxyear').val($(this).attr('rel'));
            $('.yearcombogridcontainer a').removeClass('selected');
            $(this).addClass('selected');
            finishyear();
        });
        var finishyear = function () {
            var minval, maxval;
            minval = $('#minyear').val();
            if (minval == 0 || minval == '' || minval == 'Từ') minval = minvalueyear;
            maxval = $('#maxyear').val();
            if (maxval == 0 || maxval == '' || maxval == 'Đến') maxval = maxvalueyear;
            if (minval < 1990 || minval > maxvalueyear) {
                minval = minvalueyear;
                $('#minyear').val(minvalueyear);
            }
            if (maxval < 1990 || maxval >= maxvalueyear) {
                maxval = maxvalueyear;
                $('#maxyear').val(maxvalueyear);
            }
            if (minval == minvalueyear && maxval == maxvalueyear) {
                $('#minyear').val('');
                $('#maxyear').val('');
            }
            if (minval == minvalueyear && maxval == maxvalueyear) $('#' + objId + ' .combotext').html(initText);
            else if (minval == minvalueyear && maxval != maxvalueyear) $('#' + objId + ' .combotext').html('Trước năm ' + maxval);
            else if (minval != minvalueyear && maxval == maxvalueyear) $('#' + objId + ' .combotext').html('Sau năm ' + minval);
            else $('#' + objId + ' .combotext').html(minval + ' - ' + maxval);

            $('#' + objId + ' .dvcombo').removeClass('segmentedsectionactive');
            $('.yearcombogridcontainer').hide();
        };
        $('#maxyear').keypress(function (e) {
            if (e.which == 13) {
                finishyear();
            }
        });
        $('#minyear').keypress(function (e) {
            if (e.which == 13) {
                $('#maxyear').focus();
            }
        });
    });
};

$.fn.combogridprice = function (initMinValue, initMaxValue, datawidth, type) {

    var getpricename = function (minval, maxval) {
        if (minval == minvalueprice && maxval == maxvalueprice) return 'Giá';
        else if (minval == minvalueprice && maxval != maxvalueprice) return 'Dưới ' + GetMoneyText2(maxval * 1000000);
        else if (minval != minvalueprice && maxval == maxvalueprice) return 'Trên ' + GetMoneyText2(minval * 1000000);
        else return GetMoneyText2(minval * 1000000) + ' - ' + GetMoneyText2(maxval * 1000000);
    };
    this.each(function () {
        var objId = $(this).attr('id');
        var htmlbefore = '<div style="width:' + datawidth + 'px" class="dvcombo"><span class="combotext" style="width:' + eval(datawidth - 28) + 'px">' + getpricename(initMinValue, initMaxValue) + '</span><span class="dartdown"></span></div>';
        $('#' + objId).html(htmlbefore);

        if (initMinValue == minvalueprice && initMaxValue == maxvalueprice) {
            initMinValue = '';
            initMaxValue = '';
        }
        var htmlafter = '';
        if (type == 1) htmlafter += '<div class="pricecombogridcontainer combogridcontainer" style="display:none;width:149px;" >';
        else if (type == 2) htmlafter += '<div class="pricecombogridcontainer combogridcontainer" style="display:none;width:121px;" >';
        var inputWidth = '';
        if (type == 2) inputWidth = ';width: 38px';
        htmlafter += '    <div class="dualbox" >';
        htmlafter += '        <input type="text" id="minprice" maxlength="5" style="margin-right: 5px' + inputWidth + '" class="priceOnly" placeholder="Từ" value="' + initMinValue + '">';
        htmlafter += '        <input type="text" id="maxprice" maxlength="5" style="text-align: right' + inputWidth + '" class="priceOnly" placeholder="Đến" value="' + initMaxValue + '">';
        htmlafter += '    </div>';

        var colwidth = '';
        if (type == 2) colwidth = ' style="width: 52px !important"';

        htmlafter += '    <div id="combogridcontainer_col1" class="combogridcontainer_col" ' + colwidth + '>';

        var htmlSelected = (initMinValue == 0) ? 'class="selected"' : '';
        htmlafter += '        <div class="combogridcontainer_item"><a class="linkprice" href="javascript:void(0)" ' + htmlSelected + ' rel="0" >0 triệu</a></div>';
        htmlSelected = (initMinValue == 50) ? 'class="selected"' : '';
        htmlafter += '        <div class="combogridcontainer_item"><a class="linkprice" href="javascript:void(0)" ' + htmlSelected + ' rel="50" >50 triệu</a></div>';
        htmlSelected = (initMinValue == 100) ? 'class="selected"' : '';
        htmlafter += '        <div class="combogridcontainer_item"><a class="linkprice" href="javascript:void(0)" ' + htmlSelected + ' rel="100" >100 triệu</a></div>';
        htmlSelected = (initMinValue == 150) ? 'class="selected"' : '';
        htmlafter += '        <div class="combogridcontainer_item"><a class="linkprice" href="javascript:void(0)" ' + htmlSelected + ' rel="150" >150 triệu</a></div>';
        htmlSelected = (initMinValue == 200) ? 'class="selected"' : '';
        htmlafter += '        <div class="combogridcontainer_item"><a class="linkprice" href="javascript:void(0)" ' + htmlSelected + ' rel="200" >200 triệu</a></div>';
        for (var i = 3; i <= 9; i++) {
            var p = i * 100;
            htmlSelected = (initMinValue == p) ? 'class="selected"' : '';
            htmlafter += '        <div class="combogridcontainer_item"><a class="linkprice" href="javascript:void(0)" ' + htmlSelected + ' rel="' + p + '" >' + p + ' triệu</a></div>';
        }
        htmlSelected = (initMinValue == 1000) ? 'class="selected"' : '';
        htmlafter += '        <div class="combogridcontainer_item"><a class="linkprice" href="javascript:void(0)" ' + htmlSelected + ' rel="1000" >1 tỉ</a></div>';
        htmlafter += '    </div>';

        htmlafter += '    <div id="combogridcontainer_col2" class="combogridcontainer_col" ' + colwidth + '>';
        htmlSelected = (initMinValue == 50) ? 'class="selected"' : '';
        htmlafter += '        <div class="combogridcontainer_item"><a class="linkpricecolright" href="javascript:void(0)" ' + htmlSelected + ' rel="50" >50 triệu</a></div>';
        htmlSelected = (initMinValue == 100) ? 'class="selected"' : '';
        htmlafter += '        <div class="combogridcontainer_item"><a class="linkpricecolright" href="javascript:void(0)" ' + htmlSelected + ' rel="100" >100 triệu</a></div>';
        htmlSelected = (initMinValue == 150) ? 'class="selected"' : '';
        htmlafter += '        <div class="combogridcontainer_item"><a class="linkpricecolright" href="javascript:void(0)" ' + htmlSelected + ' rel="150" >150 triệu</a></div>';
        htmlSelected = (initMinValue == 200) ? 'class="selected"' : '';
        htmlafter += '        <div class="combogridcontainer_item"><a class="linkpricecolright" href="javascript:void(0)" ' + htmlSelected + ' rel="200" >200 triệu</a></div>';
        for (var i = 3; i <= 9; i++) {
            var p = i * 100;
            htmlSelected = (initMinValue == p) ? 'class="selected"' : '';
            htmlafter += '        <div class="combogridcontainer_item"><a class="linkpricecolright" href="javascript:void(0)" ' + htmlSelected + ' rel="' + p + '" >' + p + ' triệu</a></div>';
        }
        htmlSelected = (initMinValue > 1000) ? 'class="selected"' : '';
        htmlafter += '        <div class="combogridcontainer_item"><a class="linkpricecolright" href="javascript:void(0)" ' + htmlSelected + ' rel="' + maxvalueprice + '" > &gt; 1 tỉ</a></div>';
        htmlafter += '    </div>';

        htmlafter += '</div>';
        $('body').append(htmlafter);
        jQuery(".priceOnly").keyup(function () {
            this.value = this.value.replace(/[^0-9]/g, '');
            var text;
            if (this.value == '') text = '0';
            else {
                var milionValue = eval($(this).val().replace(/\b0(\d+)\b/g, '$1'));
                text = milionValue;
            }
            $(this).html(text);
        });
        $(document).mouseup(function (e) {
            if (e.target.id == 'minprice') return;
            if (e.target.id == 'maxprice') return;
            if ($(e.target).hasClass('linkprice')) return;
            if ($(e.target).hasClass('linkpricecolright')) return;
            var container = $("#" + objId);
            if (!container.is(e.target) // if the target of the click isn't the container...
                && container.has(e.target).length === 0 // ... nor a descendant of the container
                && $('#' + objId + ' .dvcombo').hasClass('segmentedsectionactive')) {
                finishprice();
            }
        });
        $('#' + objId + ' .dvcombo').click(function () {
            if ($(this).hasClass('segmentedsectionactive')) {
                finishprice();
            } else {
                $(this).addClass('segmentedsectionactive');
                $('.pricecombogridcontainer').show();
                $('.pricecombogridcontainer').css('top', $(this).offset().top + 29);
                $('.pricecombogridcontainer').css('left', $(this).offset().left);
            }
        });
        $('#minprice').focus(function () {
            $(this).val('');
            $(this).addClass('active');
            $('#maxprice').removeClass('active');
        });
        $('#maxprice').focus(function () {
            $(this).val('');
            $(this).addClass('active');
            $('#minprice').removeClass('active');
        });
        $('.pricecombogridcontainer a').click(function () {
            if ($(this).hasClass('linkprice')) {
                //neu la cot trai
                $('#minprice').val($(this).attr('rel'));
                $('.pricecombogridcontainer #combogridcontainer_col1 a').removeClass('selected');
                $(this).addClass('selected');
                $('#maxprice').focus();
            } else {
                $('#maxprice').val($(this).attr('rel'));
                $('.pricecombogridcontainer #combogridcontainer_col2 a').removeClass('selected');
                $(this).addClass('selected');
                finishprice();
            }
        });
        var finishprice = function () {
            var minval, maxval;
            minval = $('#minprice').val();
            if (minval == 0 || minval == '' || minval == 'Từ') minval = minvalueprice;
            maxval = $('#maxprice').val();
            if (maxval == 0 || maxval == '' || maxval == 'Đến') maxval = maxvalueprice;
            minval = eval(minval);
            maxval = eval(maxval);

            $('#' + objId + ' .combotext').html(getpricename(minval, maxval));

            $('#' + objId + ' .dvcombo').removeClass('segmentedsectionactive');
            $('.pricecombogridcontainer').hide();
        };
        $('#maxprice').keypress(function (e) {
            if (e.which == 13) {
                finishprice();
            }
        });
        $('#minprice').keypress(function (e) {
            if (e.which == 13) {
                $('#maxprice').focus();
            }
        });
    });
};

$.fn.selectoption = function (data, initValue, initText, datawidth, inputObjId, inputObjName, divContainerId, type, defaultText, className, relName, isMulti, isDisableModify, functionOnChange) {
    this.each(function () {
        $('#' + objId).html('');
        $('#' + divContainerId).remove();
        var objId = $(this).attr('id');
        if (initText == '') initText = defaultText;
        var endhtml = '';
        var htmlbefore = '<input id="' + inputObjName + '" type="hidden" name="' + inputObjName + '" value="' + initText + '">';
        htmlbefore += '<input id="' + inputObjId + '" type="hidden" name="' + inputObjId + '" class="' + className + '" rel="' + relName + '" value="' + initValue + '">';
        htmlbefore += '<div style="width:' + datawidth + 'px" class="dvcombo"><span class="combotext" style="width:' + eval(datawidth - 28) + 'px">' + initText + '</span><span class="dartdown"></span></div>';
        $('#' + objId).html(htmlbefore);
        var htmlafter = '';
        if (type == 1) htmlafter += '<div id="' + divContainerId + '" class="selectoptioncontainer" style="display:none;width:149px;padding:12px;" >';
        else if (type == 2) htmlafter += '<div id="' + divContainerId + '" class="selectoptioncontainer" style="display:none;width:121px;padding:12px;" >';
        else if (type == 3 && (inputObjId == 'Drivetrain' || inputObjId == 'ServiceType')) htmlafter += '<div id="' + divContainerId + '" class="selectoptioncontainer" style="display:none;width:214px;padding:12px;" >';
        else if (type == 3) htmlafter += '<div id="' + divContainerId + '" class="selectoptioncontainer" style="display:none;width:' + eval(datawidth - 24) + 'px;padding:12px;" >';
        htmlafter += '    <a href="javascript:void(0)" class="selectoptioncontainer_closebutton"><img src="/style/images/selectoption_close.png" border="0"></a>';
        for (var i = 0; i < data.length; i++) {
            var htmlSelected = '';
            if ((type == 3 && eval(data[i].Value) == eval(initValue))
                || (type != 3 && HasState(data[i].Value, initValue))) {
                htmlSelected = 'class="selected"';
                $('#' + inputObjName).val(data[i].Text);
                $('#' + inputObjId).next().find('.combotext').html(data[i].Text);
            }
            var itemWidth = (type == 3 && (inputObjId == 'Drivetrain' || inputObjId == 'ServiceType')) ? 'style="width: 210px;"' : '';
            var selectone = isMulti ? '' : ' optionbox';
            htmlafter += '    <div class="selectoptioncontainer_item' + selectone + '" ' + itemWidth + '><a ' + htmlSelected + ' href="javascript:void(0)" data-title="' + data[i].Value + '" rel="' + data[i].Value + '" >' + data[i].Text + '</a></div>';
        }
        htmlafter += endhtml;
        htmlafter += '</div>';
        $('body').append(htmlafter);

        //define functions
        var finishselectoption = function () {
            var thisvalue = 0;
            var thistext = '';
            $('#' + divContainerId + ' .selectoptioncontainer_item').each(function () {
                if ($(this).find('a').hasClass('selected')) {
                    thisvalue += eval($(this).find('a').attr('rel'));
                    thistext += $(this).find('a').html() + ', ';
                }
            });
            if (thistext.length > 0) thistext = thistext.substring(0, thistext.length - 2);
            else thistext = defaultText;
            $('#' + inputObjId).val(thisvalue);
            if (thistext != '') {
                $('#' + inputObjId).next().find('.combotext').html(thistext);
                $('#' + inputObjName).val(thistext);
            }
            $('#' + objId + ' .dvcombo').removeClass('segmentedsectionactive');
            $('#' + divContainerId).hide();
            if (className == "cb_required") $("#SecondHandSearch").click();
            if (functionOnChange != null) functionOnChange();
        };
        $(document).mouseup(function (e) {
            if ($(e.target).parent().hasClass('selectoptioncontainer_item')) return;
            var container = $("#" + objId);
            if (!container.is(e.target) // if the target of the click isn't the container...
                && container.has(e.target).length === 0 // ... nor a descendant of the container
                && $('#' + objId + ' .dvcombo').hasClass('segmentedsectionactive')) {
                finishselectoption();
            }
        });

        $('#' + divContainerId + ' .selectoptioncontainer_closebutton').click(function () {
            finishselectoption();
        });
        $('#' + objId + ' .dvcombo').click(function () {
            if (isDisableModify) return;
            if ($(this).hasClass('segmentedsectionactive')) {
                finishselectoption();
            } else {
                $(this).addClass('segmentedsectionactive');
                $('#' + divContainerId).show();
                $('#' + divContainerId).css('top', $(this).offset().top + 29);
                $('#' + divContainerId).css('left', $(this).offset().left);
            }
        });
        $('#' + divContainerId + ' a').click(function () {
            if (isMulti) $(this).toggleClass('selected');
            else {
                var isSelected = $(this).hasClass('selected'); //lưu lại giá trị trước khi unselect hết
                $('#' + divContainerId + ' a').removeClass('selected'); //un check all
                if (!isSelected) $(this).addClass('selected'); //nếu trước là không check thì giờ checked, không cần else vì tất cả đã bị uncheck rồi
                finishselectoption();
            }
        });
    });
};

$.fn.combogridclassification = function (data, initValue, initText, datawidth, inputObjId, inputObjName, divContainerId, type, className, relName) {
    this.each(function () {
        var objId = $(this).attr('id');
        if (initText == '') initText = 'Chọn';
        var endhtml = '';
        var htmlbefore = '<input id="' + inputObjName + '" type="hidden" name="' + inputObjName + '" value="' + initText + '">';
        htmlbefore += '<input id="' + inputObjId + '" type="hidden" name="' + inputObjId + '" class="' + className + '" rel="' + relName + '" value="' + initValue + '">';
        htmlbefore += '<div style="width:' + datawidth + 'px" class="dvcombo"><span class="combotext" style="width:' + eval(datawidth - 28) + 'px">' + initText + '</span><span class="dartdown"></span></div>';
        $('#' + objId).html(htmlbefore);
        var htmlafter = '<div id="' + divContainerId + '" class="classificationscontainer" style="display:none;width:720px;padding:12px;" >';
        htmlafter += '    <a href="javascript:void(0)" class="selectoptioncontainer_closebutton"><img src="/style/images/selectoption_close.png" border="0"></a>';
        for (var i = 0; i < data.length; i++) {
            var htmlSelected = '';
            if (type == 4 || type == 3 || type == 5) {
                //dạng combo dang xe lấy giá trị dáng xe để insert vào db
                if (data[i].ShortName == initValue) {
                    htmlSelected = 'class="selected"';
                    $('#' + inputObjName).val(data[i].Text);
                    $('#' + objId + ' .combotext').html(data[i].Text);
                }
            }
            else htmlSelected = (HasState(data[i].Value, initValue)) ? 'class="selected"' : '';
            var isSelected = (initValue == data[i].Value);
            if (type == 4 || type == 5) isSelected = data[i].ShortName == initValue;
            var imgAvatar = data[i].Value;
            var value = (type == 3 || type == 4 || type == 5) ? data[i].ShortName : data[i].Value;
            htmlafter += '    <div class="selectoptioncontainer_item">';
            htmlafter += '        <a ' + htmlSelected + ' href="javascript:void(0)" data-title="' + value + '" rel="' + value + '" >';
            htmlafter += '            <img rel="' + value + '" src="/style/images/ClassificationsSearch/' + imgAvatar + '.png" ' + (isSelected ? 'style="display:none"' : '') + '/>';
            htmlafter += '            <img rel="' + value + '" src="/style/images/ClassificationsSearch/' + imgAvatar + '_hover.png" ' + (isSelected ? '' : 'style="display:none"') + '/>';
            htmlafter += '            <span>' + data[i].Text + '</span>';
            htmlafter += '        </a>';
            htmlafter += '    </div>';
        }
        htmlafter += endhtml;
        htmlafter += '</div>';
        $('body').append(htmlafter);

        //define functions
        var finishclassifications = function () {
            $('#' + objId + ' .dvcombo').removeClass('segmentedsectionactive');
            $('#' + divContainerId).hide();
        };
        $(document).mouseup(function (e) {
            var container = $("#" + objId);
            if (!container.is(e.target) // if the target of the click isn't the container...
                && container.has(e.target).length === 0 // ... nor a descendant of the container
                && $('#' + objId + ' .dvcombo').hasClass('segmentedsectionactive')) {
                finishclassifications();
            }
        });
        $('#' + divContainerId + ' .selectoptioncontainer_closebutton').click(function () {
            finishclassifications();
        });
        $('#' + objId + ' .dvcombo').click(function () {
            if ($(this).hasClass('segmentedsectionactive')) {
                finishclassifications();
            } else {
                $(this).addClass('segmentedsectionactive');
                $('#' + divContainerId).show();
                $('#' + divContainerId).css('top', $(this).offset().top + 29);
                if (type == 1) $('#' + divContainerId).css('left', $(this).offset().left - 195);
                else if (type == 3) $('#' + divContainerId).css('left', $(this).offset().left);
                else if (type == 2) {
                    var leftindex = $(this).offset().left - eval($('.classificationscontainer').css('width').replace('px', '')) + 121;
                    $('#' + divContainerId).css('left', leftindex);
                } else if (type == 4) {
                    var element = $('.classificationscontainer');
                    var left = $(".search-carreview").offset().left;
                    element.css("left", left);
                }
                else if (type == 5) {
                    var element = $('.classificationscontainer');
                    var left = $(".rightboxnews").offset().left;
                    element.css("left", left - 448);
                }
            }
        });
        //$('#' + divContainerId + ' a').live('mouseover', function () {
        $('#' + divContainerId + ' a').hover(function () {
            if ($(this).hasClass('selectoptioncontainer_closebutton')) return;
            $($(this).find('img')[0]).hide();
            $($(this).find('img')[1]).show();
        });

        $('#' + divContainerId + ' a').live('mouseleave', function () {
            if ($(this).hasClass('selected')) return;
            $($(this).find('img')[0]).show();
            $($(this).find('img')[1]).hide();
        });
        $('#' + divContainerId + ' a').click(function () {
            if ($(this).hasClass('selected')) {
                $('#' + divContainerId + ' a').removeClass('selected');
                $('#' + inputObjId).val('0');
                $('#' + objId + ' .combotext').html('Kiểu dáng');
                $('#' + inputObjName).val('Kiểu dáng');
                $(this).mouseleave();
            }
            else {
                $('#' + inputObjId).val($(this).attr('rel'));
                var text = $(this).find('span').html();
                if (text != null && text != '') {
                    $('#' + objId + ' .combotext').html(text);
                    $('#' + inputObjName).val(text);
                }
                $('#' + divContainerId + ' a').removeClass('selected');
                $(this).addClass('selected');
            }
            $('#' + divContainerId + ' a').each(function () {
                $(this).mouseleave();
            });
            finishclassifications();
        });
    });
};

$.fn.combogridcolor = function (data, initValue, initText, datawidth, inputObjId, inputObjName, divContainerId, type, defaultText, isDisableModify, functionOnChange) {
    this.each(function () {
        var objId = $(this).attr('id');
        if (initText == '') initText = defaultText;
        var endhtml = '';
        var htmlbefore = '<input id="' + inputObjName + '" type="hidden" name="' + inputObjName + '" value="' + initText + '">';
        htmlbefore += '<input id="' + inputObjId + '" type="hidden" name="' + inputObjId + '" value="' + initValue + '">';
        htmlbefore += '<div style="width:' + datawidth + 'px" class="dvcombo"><span class="combotext" style="width:' + eval(datawidth - 28) + 'px">' + initText + '</span><span class="dartdown"></span></div>';
        var htmlafter = '<div id="' + divContainerId + '" class="selectoptioncontainer" style="display:none;width:306px;padding:12px;" >';
        htmlafter += '    <a href="javascript:void(0)" class="selectoptioncontainer_closebutton"><img src="/style/images/selectoption_close.png" border="0"></a>';
        for (var i = 0; i < data.length; i++) {
            var htmlSelected = '';
            if ((type == 3 && eval(data[i].Value) == eval(initValue))
                || (type != 3 && HasState(data[i].Value, initValue))) {
                htmlSelected = 'class="selected"';
                $('#' + inputObjName).val(data[i].Text);
                $('#' + inputObjId).next().find('.combotext').html(data[i].Text);
            }
            htmlafter += '    <div class="selectoptioncontainer_item"><a ' + htmlSelected + ' href="javascript:void(0)" data-title="' + data[i].Value + '" rel="' + data[i].Value + '" ><img rel="' + data[i].Value + '" src="/style/images/color-' + data[i].ShortName + '.png" /><span>' + data[i].Text + '</span></a></div>';
        }
        htmlafter += endhtml;
        htmlafter += '</div>';
        $('#' + objId).html(htmlbefore);
        $('body').append(htmlafter);

        //define functions
        var finishcolor = function () {
            var thisvalue = 0;
            var thistext = '';
            $('#' + divContainerId + ' .selectoptioncontainer_item').each(function () {
                if ($(this).find('a').hasClass('selected')) {
                    thisvalue += eval($(this).find('a').attr('rel'));
                    thistext += $(this).find('a').find('span').html() + ', ';
                }
            });
            if (thistext.length > 0) thistext = thistext.substring(0, thistext.length - 2);
            else thistext = defaultText;
            $('#' + inputObjId).val(thisvalue);
            if (thistext != '') {
                $('#' + inputObjId).next().find('.combotext').html(thistext);
                $('#' + inputObjName).val(thistext);
            }
            $('#' + objId + ' .dvcombo').removeClass('segmentedsectionactive');
            $('#' + divContainerId).hide();
            if (functionOnChange != null) functionOnChange();
        };
        $(document).mouseup(function (e) {
            if ($(e.target).parent().hasClass('selectoptioncontainer_item') || $(e.target).parent().parent().hasClass('selectoptioncontainer_item')) return;
            var container = $("#" + objId);
            if (!container.is(e.target) // if the target of the click isn't the container...
                && container.has(e.target).length === 0 // ... nor a descendant of the container
                && $('#' + objId + ' .dvcombo').hasClass('segmentedsectionactive')) {
                finishcolor();
            }
        });
        $('#' + divContainerId + ' .selectoptioncontainer_closebutton').click(function () {
            finishcolor();
        });
        $('#' + objId + ' .dvcombo').click(function () {
            if (isDisableModify) return;
            if ($(this).hasClass('segmentedsectionactive')) {
                finishcolor();
            } else {
                $(this).addClass('segmentedsectionactive');
                $('#' + divContainerId).show();
                $('#' + divContainerId).css('top', $(this).offset().top + 29);

                if (type == 1 || type == 3) $('#' + divContainerId).css('left', $(this).offset().left);
                else if (type == 2) {
                    var leftindex = $(this).offset().left - eval($('#' + divContainerId).css('width').replace('px', '')) + 121;
                    $('#' + divContainerId).css('left', leftindex);
                }
            }
        });
        $('#' + divContainerId + ' a').click(function () {
            var isSelected = $(this).hasClass('selected'); //lưu lại giá trị trước khi unselect hết
            $('#' + divContainerId + ' a').removeClass('selected'); //un check all
            if (!isSelected) $(this).addClass('selected'); //nếu trước là không check thì giờ checked, không cần else vì tất cả đã bị uncheck rồi
            finishcolor();
        });
    });
};

$.fn.combogridcitycplb = function (data, initValue, initText, datawidth, inputObjId, divContainerId, defaultText, finishCPLB) {
    this.each(function () {
        var objId = $(this).attr('id');
        if (initText == '') initText = defaultText;
        var endhtml = '';
        var htmlbefore = '<input id="' + inputObjId + '" type="hidden" name="' + inputObjId + '" value="' + initValue + '">';
        htmlbefore += '<div style="width:' + datawidth + 'px" class="dvcombo"><span class="combotext" style="width:' + eval(datawidth - 28) + 'px">' + initText + '</span><span class="dartdown"></span></div>';
        var htmlafter = '<div id="' + divContainerId + '" class="selectoptioncontainer" style="display:none;width:' + eval(datawidth - 24) + 'px;padding:12px;" >';
        htmlafter += '    <a href="javascript:void(0)" class="selectoptioncontainer_closebutton"><img src="/style/images/selectoption_close.png" border="0"></a>';
        for (var i = 0; i < data.length; i++) {
            var selected = '';
            if (data[i].Value == initValue) selected = 'class="selected"';
            htmlafter += '    <div class="selectoptioncontainer_item"><a href="javascript:void(0)" ' + selected + ' data-title="' + data[i].Value + '" rel="' + data[i].Value + '" >' + data[i].Text + '</a></div>';
        }
        htmlafter += endhtml;
        htmlafter += '</div>';
        $('#' + objId).html(htmlbefore);
        $('body').append(htmlafter);

        //define functions
        var finishselectoption = function () {
            var thisvalue = 0;
            var thistext = '';
            $('#' + divContainerId + ' .selectoptioncontainer_item').each(function () {
                if ($(this).find('a').hasClass('selected')) {
                    thisvalue = $(this).find('a').attr('rel');
                    thistext += $(this).find('a').html() + ', ';
                }
            });
            if (thistext.length > 0) thistext = thistext.substring(0, thistext.length - 2);
            else thistext = defaultText;
            $('#' + inputObjId).val(thisvalue);
            if (thistext != '') $('#' + inputObjId).next().find('.combotext').html(thistext);
            $('#' + objId + ' .dvcombo').removeClass('segmentedsectionactive');
            $('#' + divContainerId).hide();
            finishCPLB(thisvalue);
        };
        $(document).mouseup(function (e) {
            if ($(e.target).parent().hasClass('selectoptioncontainer_item')) return;
            var container = $("#" + objId);
            if (!container.is(e.target) // if the target of the click isn't the container...
                && container.has(e.target).length === 0 // ... nor a descendant of the container
                && $('#' + objId + ' .dvcombo').hasClass('segmentedsectionactive')) {
                finishselectoption();
            }
        });
        $('#' + divContainerId + ' .selectoptioncontainer_closebutton').click(function () {
            finishselectoption();
        });
        $('#' + objId + ' .dvcombo').click(function () {
            if ($(this).hasClass('segmentedsectionactive')) {
                finishselectoption();
            } else {
                $(this).addClass('segmentedsectionactive');
                $('#' + divContainerId).show();
                $('#' + divContainerId).css('top', $(this).offset().top + 29);
                $('#' + divContainerId).css('left', $(this).offset().left);
            }
        });
        $('#' + divContainerId + ' a').click(function () {
            var isSelected = $(this).hasClass('selected'); //lưu lại giá trị trước khi unselect hết
            $('#' + divContainerId + ' a').removeClass('selected'); //un check all
            if (!isSelected) $(this).addClass('selected'); //nếu trước là không check thì giờ checked, không cần else vì tất cả đã bị uncheck rồi
            finishselectoption();
        });
    });
};

// Custom select option
$.fn.selectoptionsalon = function (data, initCityId, initShortName, initCityName, datawidth, type) {
    this.each(function () {
        var objId = $(this).attr('id');
        var link = '';
        if (initCityName == '') initCityName = 'Tỉnh / Thành phố';
        if (data != null) {
            //var htmlbefore = '<input id="CityID" type="hidden" name="CityID" class="' + className + '" rel="' + relName + '" value="' + initCityId + '">';
            //var htmlbefore = '<input id="ShortCityName" type="hidden" name="ShortCityName" value="' + initShortName + '">';
            var htmlbefore = '<div style="width:' + datawidth + 'px" class="dvcombo"><span class="combotext" style="width:' + eval(datawidth - 28) + 'px">' + initCityName + '</span><span class="dartdown"></span></div>';
            var htmlafter = '<div class="citycombogridcontainer combogridcontainer" style="display:none;width:450px;" >';
            htmlafter += '    <div id="combogridcontainer_col1" class="combogridcontainer_col"></div>';
            htmlafter += '    <div id="combogridcontainer_col2" class="combogridcontainer_col"></div>';
            htmlafter += '    <div id="combogridcontainer_col3" class="combogridcontainer_col"></div>';
            htmlafter += '</div>';
            $('#' + objId).html(htmlbefore);
            $('body').append(htmlafter);

            var htmlcol1 = '    <div class="combogridcontainer_item"><span>' + 'Miền Bắc' + '</span></div>';
            //htmlcol1 += '    <div class="combogridcontainer_item"><a href="javascript:void(0)" class="specialcity" rel="1" title="ha-noi">' + 'Hà Nội' + '</a></div>';
            //htmlcol1 += '    <div class="combogridcontainer_item"><a href="javascript:void(0)" class="specialcity" rel="92" title="hai-phong">' + 'Hải Phòng' + '</a></div>';
            var htmlcol2 = '    <div class="combogridcontainer_item"><span>' + 'Miền Trung' + '</span></div>';
            //htmlcol2 += '    <div class="combogridcontainer_item"><a href="javascript:void(0)" class="specialcity" rel="3" title="da-nang">' + 'Đà Nẵng' + '</a></div>';
            //htmlcol2 += '    <div class="combogridcontainer_item"><a href="javascript:void(0)" rel="123" title="thua-thien-hue">' + 'Thừa Thiên Huế' + '</a></div>';
            //htmlcol2 += '    <div class="combogridcontainer_item"><a href="javascript:void(0)" rel="96" title="khanh-hoa">' + 'Khánh Hòa' + '</a></div>';
            //htmlcol2 += '    <div class="combogridcontainer_item"><a href="javascript:void(0)" rel="101" title="lam-dong">' + 'Lâm Đồng' + '</a></div>';
            var htmlcol3 = '    <div class="combogridcontainer_item"><span>' + 'Miền Nam' + '</span></div>';
            //htmlcol3 += '    <div class="combogridcontainer_item"><a href="javascript:void(0)" class="specialcity" rel="2" title="hcm">' + 'Tp.HCM' + '</a></div>';
            //htmlcol3 += '    <div class="combogridcontainer_item"><a href="javascript:void(0)"  rel="66" title="binh-duong">' + 'Bình Dương' + '</a></div>';
            //htmlcol3 += '    <div class="combogridcontainer_item"><a href="javascript:void(0)"  rel="127" title="ba-ria-vung-tau">' + 'Bà Rịa Vũng Tàu' + '</a></div>';
            //htmlcol3 += '    <div class="combogridcontainer_item"><a href="javascript:void(0)"  rel="78" title="can-tho">' + 'Cần Thơ' + '</a></div>';
            var dataCity = data[0].jsonMBData;
            for (var i = 0; i < dataCity.length; i++) {

                if (dataCity[i].SecondHand != '') {
                    link = '/salons-' + dataCity[i].SecondHand + '-' + dataCity[i].ShortName;
                }
                else link = '/salons-' + dataCity[i].ShortName;
                if (dataCity[i].Keyword != '') link += "-" + dataCity[i].Keyword;

                var htmlSelected = initCityId == dataCity[i].Value ? 'class="selected"' : '';
                var htmlItem = '    <div class="combogridcontainer_item"><a ' + htmlSelected + ' href="' + link + '" data-title="' + dataCity[i].ShortName + '" rel="' + dataCity[i].Value + '" >' + dataCity[i].Text + '</a></div>';
                htmlcol1 += htmlItem;
            }
            dataCity = data[1].jsonMTData;
            for (var i = 0; i < dataCity.length; i++) {

                if (dataCity[i].SecondHand != '') {
                    link = '/salons-' + dataCity[i].SecondHand + '-' + dataCity[i].ShortName;
                }
                else link = '/salons-' + dataCity[i].ShortName;
                if (dataCity[i].Keyword != '') link += "-" + dataCity[i].Keyword;

                var htmlSelected = initCityId == dataCity[i].Value ? 'class="selected"' : '';
                var htmlItem = '    <div class="combogridcontainer_item"><a ' + htmlSelected + ' href="' + link + '" data-title="' + dataCity[i].ShortName + '" rel="' + dataCity[i].Value + '" >' + dataCity[i].Text + '</a></div>';
                htmlcol2 += htmlItem;
            }
            dataCity = data[2].jsonMNData;
            for (var i = 0; i < dataCity.length; i++) {

                if (dataCity[i].SecondHand != '') {
                    link = '/salons-' + dataCity[i].SecondHand + '-' + dataCity[i].ShortName;
                }
                else link = '/salons-' + dataCity[i].ShortName;
                if (dataCity[i].Keyword != '') link += "-" + dataCity[i].Keyword;

                var htmlSelected = initCityId == dataCity[i].Value ? 'class="selected"' : '';
                var htmlItem = '    <div class="combogridcontainer_item"><a ' + htmlSelected + ' href="' + link + '" data-title="' + dataCity[i].ShortName + '" rel="' + dataCity[i].Value + '" >' + dataCity[i].Text + '</a></div>';
                htmlcol3 += htmlItem;
            }
            $('.citycombogridcontainer #combogridcontainer_col1').append(htmlcol1);
            $('.citycombogridcontainer #combogridcontainer_col2').append(htmlcol2);
            $('.citycombogridcontainer #combogridcontainer_col3').append(htmlcol3);
            //define functions
            var finishcombocity = function (text, value, shortname) {
                if (text != null && text != '') $('#' + objId + ' .combotext').html(text);
                if (value != null && value != '') $('#CityID').val(value);
                if (shortname != null && shortname != '') $('#ShortCityName').val(shortname);
                $('#' + objId + ' .dvcombo').removeClass('segmentedsectionactive');
                $('.citycombogridcontainer').hide();
            };
            $(document).mouseup(function (e) {
                var container = $("#" + objId);
                if (!container.is(e.target) // if the target of the click isn't the container...
                    && container.has(e.target).length === 0 // ... nor a descendant of the container
                    && $('#' + objId + ' .dvcombo').hasClass('segmentedsectionactive')) {
                    finishcombocity();
                }
            });
            $('#' + objId + ' .dvcombo').click(function () {
                if ($(this).hasClass('segmentedsectionactive')) {
                    finishcombocity();
                } else {
                    $(this).addClass('segmentedsectionactive');
                    $('.citycombogridcontainer').show();
                    $('.citycombogridcontainer').css('top', $(this).offset().top + 29);

                    var leftindex = $(this).offset().left - eval($('.citycombogridcontainer').css('width').replace('px', '')) + 121;
                    $('.citycombogridcontainer').css('left', leftindex);

                }
            });
            $('.citycombogridcontainer a').click(function () {
                var text = $(this).html();
                var value = $(this).attr('rel');
                var shortname = $(this).attr('data-title');
                $('.citycombogridcontainer a').removeClass('selected');
                $(this).addClass('selected');
                finishcombocity(text, value, shortname);
                SearchSalon();
            });
        }
    });
};

function GetByMakeId(arr, id) {
    for (var d = 0, len = arr.length; d < len; d += 1) {
        if (arr[d].MakeID === id) {
            return arr[d];
        }
    }
};

$.fn.showmodelbymake = function () {
    var timeout;
    this.each(function () {
        $(this).hover(function () {
            //Sau khi hover 1s
            var _this = $(this);
            var m = '';            
            timeout = setTimeout(function () {
                var html = '';
                var htmlCol1 = '';
                var htmlCol2 = '';
                var htmlCol3 = '';
                var makeID = $(_this).attr('id');
                var link = $(_this).attr('href');
                m = 'm' + makeID;                
                //Find model by make in Json using $.grep
                var objModel = $.grep(MakeAndModelData, function (e) { return (e.MakeID == makeID) })[0].Models;
                if (objModel != null && objModel.length > 0) {
                    if ($(_this).parent().parent().attr('id') == 'col6' || $(_this).parent().parent().attr('id') == 'col7') {
                        html += "<div id='" + m + "' class='modelbymake' style='right:" + $(_this).parent().width() + "px;'><div class='contentmakemodel'>";
                    }
                    else {
                        html += "<div id='" + m + "' class='modelbymake' style='left:" + ($(_this).width() + 13) + "px;'><div class='contentmakemodel'>";
                    }

                    html += "<div class='col1'></div>";
                    html += "<div class='col2'></div>";
                    html += "<div class='col3'></div>";
                    html += "</div></div>";                   
                    if (!$("#" + m).is(':visible')) {
                        $(_this).append(html);
                        for (var i = 0; i < objModel.length; i++) {
                            var num = eval(Math.floor(objModel.length / 3));
                            if (eval(objModel.length % 3) == 2) // Trường hợp chia 3 cột lẻ 2 bản ghi thì hiển thị 2 bản ghi ở cột 1,2
                            {
                                if (i < num + 1) {
                                    htmlCol1 += "<a href=\"" + link + '-' + objModel[i].ShortModelName + "\">" + objModel[i].ModelName + "</a>";
                                }
                                else if (i >= (num + 1) && i <= (eval(num*2) + 1)) {
                                    htmlCol2 += "<a href=\"" + link + '-' + objModel[i].ShortModelName + "\">" + objModel[i].ModelName + "</a>";
                                }
                                else if (i > ( eval(num*2) + 1) && i < objModel.length) {
                                    htmlCol3 += "<a href=\"" + link + '-' + objModel[i].ShortModelName + "\">" + objModel[i].ModelName + "</a>";
                                }
                            }                            
                            else
                            {
                                if (i < num) {
                                    htmlCol1 += "<a href=\"" + link + '-' + objModel[i].ShortModelName + "\">" + objModel[i].ModelName + "</a>";
                                }
                                else if (i >= num && i < eval(num * 2)) {
                                    htmlCol2 += "<a href=\"" + link + '-' + objModel[i].ShortModelName + "\">" + objModel[i].ModelName + "</a>";
                                }
                                else if (i >= eval(num * 2) && i < objModel.length) {
                                    htmlCol3 += "<a href=\"" + link + '-' + objModel[i].ShortModelName + "\">" + objModel[i].ModelName + "</a>";
                                }
                            }
                        }
                        $(_this).find('.modelbymake .col1').append(htmlCol1);
                        $(_this).find('.modelbymake .col2').append(htmlCol2);
                        $(_this).find('.modelbymake .col3').append(htmlCol3);

                        var parentTop = eval($(_this).parent().position().top); // vị trí top của thẻ đang hover
                        var topPopup = eval($('.modelbymake').height() / 2); // Position center popup
                        var bottom = (eval($('.submenuv2').height()) -  parentTop ) + 35; // vị trí bottom của thẻ đang hover
                        
                        if (parentTop >= topPopup && bottom >= topPopup)
                        {
                            $('.modelbymake').css('top', '-' + topPopup + 'px');
                        }
                        else if (eval(bottom) <= topPopup) {
                            $('.modelbymake').css('bottom', '-' + eval(bottom) + 'px');
                        }                       
                        else
                        {
                            $('.modelbymake').css('top', '0px');
                        }

                        $(".contentmakemodel").niceScroll({
                            cursorcolor: "#f25448",
                            cursoropacitymin: 0.3,
                            background: "#f25448",
                            cursorborder: "0",
                            autohidemode: false,
                            cursorminheight: 30,
                            cursorborderradius: 4,
                            cursorwidth: 7,
                            horizrailenabled: false,
                            background: "url(/style/images/scrollbg.png) repeat-y center top"
                        });
                    }
                }
            }, 1000);

        }, function () {
            // out hover  
            clearTimeout(timeout);            
                if($(".modelbymake").is(':visible'))
                {
                    $('.contentmakemodel').remove();
                    $('.modelbymake').remove();
                }                          
        }
        );
    });
};

$.fn.btnsubmit = function (containerclass) {
    $(this).click(function () {
        $('#errorflag').html('');
        $('.validatetooltip').hide();
        $('' + containerclass + '').find(':input.isPhoneNumber').trigger('blur');
        $('' + containerclass + '').find(':input.required').trigger('blur'); /*gọi các sự kiện khi thoát khỏi textbox để kiểm tra các điều kiện*/
        $('' + containerclass + ' textarea').trigger('blur');
        $('.image_uploaded').val($('#hdImage').val());
        if ($('#errorflag').html() != null && $('#errorflag').html() != '') {
            $('#' + $('#errorflag').html()).focus();
            return false;
        }
        else return true;
    });
};

$.fn.cancel = function () {
    $(this).click(function () {
        location.href = $(location).attr('href');
    });
};

$.fn.cancelhome = function () {
    $(this).click(function () {
        location.href = "/";
    });
};

$.fn.sendmailcontactsalon = function () {
    $(this).click(function () {
        $('#errorflag').html('');
        $('.validatetooltip').hide();
        $('.lienhe').find(':input.required').trigger('blur'); /*gọi các sự kiện khi thoát khỏi textbox để kiểm tra các điều kiện*/
        $('.lienhe textarea').trigger('blur');
        if ($('#errorflag').html() != null && $('#errorflag').html() != '') {
            $('#' + $('#errorflag').html()).focus();
            return false;

        }
        else {
            var docHeight = $(document).height();
            $("body").append("<div id='overlay'></div>");
            $("#overlay")
               .height(docHeight)
               .css({
                   'opacity': 0.4,
                   'position': 'absolute',
                   'top': 0,
                   'left': 0,
                   //'background-color': 'black',
                   'width': '100%',
                   'z-index': 5000,
                   'background': 'url("/style/images/loading.gif") no-repeat center black'
               });
            //var url = "/Handler/Autohandler.ashx?module=sendmailsalon"
            var url = "/Salons/SendMailSalon"
            var data = {
                To: $('#mailto').val(),
                name: $('#name').val(),
                email: $('#email').val(),
                sdt: $('#sdt').val(),
                address: $('#address').val(),
                content: $('#content').val(),
                Capchar: $('#txtImgVerifyCode').val()
            };
            $.ajax({
                type: "POST",
                url: url,
                data: data,
                success: function (GetValue) {
                    if (GetValue == "true") {
                        alert("Gửi mail thành công!");
                        $('#overlay').hide();
                        $('.verifycode').attr('src', '/captcha/' + Math.random());
                        location.href = $(location).attr('href');
                    }
                    else {
                        $('.verifycode').attr('src', '/captcha/' + Math.random());
                        alert("Mã an không đúng. Vui lòng thử lại.");
                    }
                }
            });
            return true;
        }
    });
};

$.fn.sendmailsalon = function () {
    $(this).click(function () {
        $('#errorflag').html('');
        $('.contact').find(':input.required').trigger('blur'); /*gọi các sự kiện khi thoát khỏi textbox để kiểm tra các điều kiện*/
        $('.contact textarea').trigger('blur');
        if ($('#errorflag').html() != null && $('#errorflag').html() != '') {
            $('#' + $('#errorflag').html()).focus();
            return false;
        }
        else {
            //$(".overlay").height();
            $(".overlay").css('display', 'block');
            //var url = "/Handler/Autohandler.ashx?module=sendmailsalon";
            var url = "/Salons/SendMailSalon";
            var data = {
                To: $('#mailto').val(),
                name: $('#name').val(),
                email: $('#email').val(),
                sdt: $('#phone').val(),
                address: $('#address').val(),
                content: $('#content').val(),
                Capchar: $('#txtImgVerifyCode').val()
            };
            //var inVal = setInterval(function () { }, 1000);
            setTimeout(1000);
            $.ajax({
                type: "POST",
                url: url,
                data: data,
                async: false,
                success: function (GetValue) {
                    if (GetValue == "true") {
                        alert("Gửi mail thành công!");
                        //clearInterval(inVal);
                        $('.verifycode').attr('src', '/captcha/' + Math.random());
                    }
                    else if (GetValue == "capcharfalse") {
                        $('.verifycode').attr('src', '/captcha/' + Math.random());
                        alert("Mã xác thực không đúng, Vui lòng thử lại.");
                    }
                    else {
                        $('.verifycode').attr('src', '/captcha/' + Math.random());
                        alert("Gửi email không thành công.");
                    }
                    $(".overlay").css('display', 'none');

                }
            });
            return true;
        }
    });
};

$.fn.sendmailcontact = function () {
    $(this).click(function () {
        $('#errorflag').html('');
        $('.container-pageinfo').find(':input.required').trigger('blur'); /*gọi các sự kiện khi thoát khỏi textbox để kiểm tra các điều kiện*/
        $('.contact textarea').trigger('blur');
        if ($('#errorflag').html() != null && $('#errorflag').html() != '') {
            $('#' + $('#errorflag').html()).focus();
            return false;
        }
        else {
            //var docHeight = $(document).height();
            //$(".overlay").height(docHeight);
            $(".overlay").css('display', 'block');
            var url = "/Home/SendMailContact";
            var data = {
                name: $('#name').val(),
                email: $('#email').val(),
                sdt: $('#phone').val(),
                address: $('#address').val(),
                content: $('#content').val(),
                Capchar: $('#txtImgVerify').val()
            };
            //var inval = setInterval(function (){ }, 1000);
            setTimeout(1000);
            $.ajax({
                type: "POST",
                url: url,
                data: data,
                success: function (GetValue) {
                    if (GetValue == "true") {
                        alert("Gửi mail thành công!");
                        //clearInterval(inval);
                        $('.verifycode').attr('src', '/captcha/' + Math.random());
                    }
                    else if (GetValue == "capcharfalse") {
                        $('.verifycode').attr('src', '/captcha/' + Math.random());
                        alert("Mã xác thực không đúng, Vui lòng thử lại.");
                    }
                    else {
                        $('.verifycode').attr('src', '/captcha/' + Math.random());
                        alert("Gửi email không thành công.");
                    }
                    $(".overlay").css('display', 'none');
                }
            });
            return true;
        }
    });
};
function setcookies() {
    if (getCookie("HaveImage") == 1) {
        $('#filtertoolallbutton').attr('src', '/style/images/filter-tatca-active2.png');
        $('#filtertoolcoanhbutton').attr('src', '/style/images/filter-coanh-deactive.png');
        $('.filter #cbhaveimg').attr('checked', 'checked');
    }
    else if (getCookie("HaveImage") == 0) {
        $('#filtertoolallbutton').attr('src', '/style/images/filter-tatca-deactive.png');
        $('#filtertoolcoanhbutton').attr('src', '/style/images/filter-coanh-active2.png');
        $('.filter #cbhaveimg').removeAttr('checked');
    };
    if (getCookie("IsThumbView") == 1) {
        $('#filtertoollistviewbutton').attr('src', '/style/images/filter-listview-active2.png');
        $('#filtertoolthumbviewbutton').attr('src', '/style/images/filter-thumbview-deactive.png');
        $('#liststyle').attr('src', '/style/images/list-deactive.png');
        $('#gridstyle').attr('src', '/style/images/grid-active.png');
    }
    else if (getCookie("IsThumbView") == 0) {
        $('#filtertoollistviewbutton').attr('src', '/style/images/filter-listview-deactive.png');
        $('#filtertoolthumbviewbutton').attr('src', '/style/images/filter-thumbview-active2.png');
        $('#liststyle').attr('src', '/style/images/list-active.png');
        $('#gridstyle').attr('src', '/style/images/grid-deactive.png');
    };
};

function activelinkrightsearch(type) {
    $(".rightsearch .item h3").click(function () {
        var url = $(this).find("a").attr("href");
        location.href = url;
    });
    $(".rightsearch .item p").click(function () {
        var url = $(this).find("a").attr("href");
        location.href = url;
    });
    var href = window.location.href.replace("http://").replace("https://");
    var sorthref = href.substring(href.indexOf('/'), href.length);
    var link = "";
    $(".rightsearch .item a").removeClass('active');

    var active = null;

    $(".rightsearch .item a").each(function () {
        var _this = $(this);

        if (sorthref.indexOf($(this).attr("href")) != -1 && $(this).attr('id') != "all" && $(this).attr('id') != "allcity") {
            link = $(this).attr("href");
            active = _this;
            if (active == null) {
                active = _this;
            } else if (_this.attr("href").length > active.attr("href").length) {
                active = _this;
            }
        }
    });

    if (active == null) {
        active = $("#all");
        $("#allcity").parent().addClass('active');
        if (type == "ismodel") {
            typemodel = "ismodel";
        }
    }
    active.parent().addClass("active");
    if (typemodel != "") {
        $("#allcity").parent().removeClass('active');
    }
    // Remove selected loại xe khi chọn thêm điều kiện lọc
    if (sorthref.length > link.length && link.length != 0) {
        $("#.rightsearch .item a").parent().removeClass('active');
    }
};

function activelinkrightsearchsalon() {
    $(".rightsearch .item p").click(function () {
        var url = $(this).find("a").attr("href");
        location.href = url;
    });
    var href = window.location.href.replace("http://").replace("https://");
    var sorthref = href.substring(href.indexOf('/'), href.length);
    $(".rightsearch .item a").removeClass('active');
    var active = null;
    $(".rightsearch .item a").each(function () {
        var _this = $(this);
        if (sorthref.indexOf($(this).attr("href")) != -1) {
            //$(this).addClass("active");
            //$('.salonmenu #list').addClass("active");
            //return;
            active = _this;
            if (active == null) {
                active = _this;
            } else if (_this.attr("href").length > active.attr("href").length) {
                active = _this;
            }
        }
    });
    if (active == null) {
        active = $("#all");
    }
    active.parent().addClass("active");
};

$.fn.tabcreate = function () {
    this.click(function (e) {
        var valid = $("#tabvalid").val();
        if (valid.indexOf(e.target.id) != -1) {
            //add checked
            if (valid.trim() != 0) {
                valid = valid.trimstart(',');
                var arr = valid.split(',');
                for (var i = 0; i < arr.length; i++) {
                    $("#tabitem #" + arr[i]).addClass("checked");
                }
            }
            $("#tabitem .active").removeClass("active");
            $("#tabitem #" + e.target.id).addClass("active");
            $("#tabitem #" + e.target.id).removeClass("checked");
            $("#tabcontent .box").hide();
            $("#tabcontent ." + e.target.id).fadeIn();
            $("#tabcontent .specialtab").show();
            $(".createautoright").show();
            $(".tooltipfirst").hide();
            $(window).scrollTop($('.list-content').offset().top);
            return false;
        }
    });
};
(function ($) {
    $.fn.syncHeight = function (settings) {
        if (settings != '' && settings != 'undefined' && settings != null) {
            var max = 0;
            var className = settings;
            $(this).each(function (index) {
                if ($(this).is(':visible')) {
                    var val = $($(className)[index]).height();
                    if (val > max) {
                        max = val;
                    }
                    if (index % 3 == 2) {
                        $($(className)[index]).height(max);
                        $($(className)[index - 1]).height(max);
                        $($(className)[index - 2]).height(max);
                        max = 0;
                    }
                }
            });
        }
        else {
            var max = 0;
            $(this).each(function () {
                if ($(this).is(':visible')) {
                    var val = $(this).height();
                    if (val > max) {
                        max = val;
                    }
                }
            });
            $(this).each(function () {
                $(this).height(max);
            });
        }
        return this;
    };
})(jQuery);

(function ($) {
    $.fn.syncWidth = function (settings) {
        var max = 0;
        $(this).each(function () {
            if ($(this).is(':visible')) {
                var val = $(this).width();
                if (val > max) {
                    max = val;
                }
            }
        });
        $(this).each(function () {
            $(this).width(max + 10);
        });
        return this;
    };
})(jQuery);

$.fn.tabcreateviewall = function () {
    this.click(function (e) {
        var tabvalid = $("#tabvalid").val();
        if (tabvalid.indexOf('baseinfo') != -1 && tabvalid.indexOf('multil') != -1 && tabvalid.indexOf('price') != -1 && tabvalid.indexOf('techology') != -1 && tabvalid.indexOf('contact') != -1) {
            if (tabvalid.trim() != 0) {
                tabvalid = tabvalid.trimstart(',');
                var arr = tabvalid.split(',');
                for (var i = 0; i < arr.length; i++) {
                    $("#tabitem #" + arr[i]).addClass("checked");
                }
            }
            $("#tabitem .active").removeClass("active");
            $("#tabitem #" + e.target.id).addClass("active");
            $("#tabcontent .box").show();
            $("#tabcontent .specialtab").hide();
            $(".createautoright").hide();
            var html = "";
            html += "<span>Chú ý: </span>";
            html += "<p>Vui lòng rà soát lại toàn bộ tin đăng của bạn để đảm bảo các trường bắt buộc đã được điền đẩy đủ.</p>";
            html += "<p>Vui lòng kiểm tra lại các thông số cơ bản của xe nhằm đảm bảo tính xác thực của tin đăng.</p>";
            $(".tooltipfirst").html(html);
            $(".tooltipfirst").show();
            $(window).scrollTop($('.list-content').offset().top);
            return false;
        }
    });
};

$.fn.tabnews = function () {
    this.click(function (e) {
        $(".title-tabs .activetab").removeClass("activetab");
        $(".title-tabs #" + e.target.id).addClass("activetab");
        $(".contanertab .box").hide();
        $(".contanertab ." + e.target.id).show();

        return false;
    });
};

$.fn.tabauto4u = function () {
    this.click(function (e) {
        $(".auto4u_tabs .activetab").removeClass("activetab");
        $(".auto4u_tabs #" + e.target.id).addClass("activetab");
        $(".autoforyou .containertab .box").hide();
        $(".autoforyou .containertab ." + e.target.id).show();
        // sang tab xe mới dữ liệu hiển thị sau nên phải gọi lại js lấy height        
        $('.contentnewauto .sell-car-griditem').syncHeight('.contentnewauto .sell-car-griditem');
        $('.contentnewauto .fixheightinfo').syncHeight('.contentnewauto .fixheightinfo');
        $('.contentnewauto .sell-car-griditem .tit').syncHeight('.contentnewauto .sell-car-griditem .tit');
        return false;
    });
};

$.fn.tabextendcomment = function () {
    this.click(function (e) {
        var id = $(this).attr('id');
        $(".titletabcomment .activetab").removeClass("activetab");
        $(".titletabcomment #" + id).addClass("activetab");
        $(".container-comment .box").hide();
        $(".container-comment ." + id).show();
        $(".container-comment ." + id).removeClass("gg");
        $(".mainvideo .comment").resize();
        return false;
    });
};

$.fn.tabautohotnew = function () {   
    this.click(function (e) {
        $(".newsright .tabs_item .activetab").removeClass("activetab");
        $(".newsright .tabs_item #" + e.target.id).addClass("activetab");
        $(".newsright .containertab .box").hide();
        $(".newsright .containertab ." + e.target.id).show();
        return false;
    });
};

$.fn.tabautodgx = function () {
    this.click(function (e) {        
        $(".dgx .tabs_item .activetab").removeClass("activetab");
        $(".dgx .tabs_item #" + e.target.id).addClass("activetab");
        $(".dgx .containertab .box").hide();
        $(".dgx .containertab ." + e.target.id).show();
        return false;
    });
};

$.fn.tabautoright = function () {
    this.click(function (e) {
        $(".tabs_autoitem .activetab").removeClass("activetab");
        $(".tabs_autoitem #" + e.target.id).addClass("activetab");
        $(".auto_rightlist .containertab .box").hide();
        $(".auto_rightlist .containertab ." + e.target.id).show();
        return false;
    });
};

$.fn.tabautodetail = function () {
    this.click(function (e) {
        $(".autodetail .tab .activetab").removeClass("activetab");
        $(".autodetail .tab #" + e.target.id).addClass("activetab");
        $(".autodetail .container-tab .box").hide();
        $(".autodetail .container-tab ." + e.target.id).show();
        return false;
    });
};

$.fn.tabvideos = function () {
    this.click(function (e) {
        $(".categoryvideo .tabitem .active").removeClass("active");
        $(".categoryvideo .tabitem #" + e.target.id).addClass("active");
        $(".categoryvideo .container .box").hide();
        $(".categoryvideo .container ." + e.target.id).show();
        return false;
    });
};

$.fn.tabcarreview = function () {
    this.click(function (e) {
        var height = $('.tabsitem').outerHeight(true);
        var divposition = $(".detail-carreview .container-tabsitem ." + e.target.id);

        if ($(document).scrollTop() < 300) {
            height += 40;
        }

        //$(".detail-carreview .tabsitem .active").removeClass("active");
        //$(".detail-carreview .tabsitem #" + e.target.id).addClass("active");      

        $('html,body').animate({
            scrollTop: (divposition.offset().top - height)
        }, 'slow');

        return false;
    });
};

$.fn.tabcarcompare = function () {
    this.click(function (e) {
        var height = $('.tabsitem').outerHeight(true);
        var divposition = $(".comparepage .containertab ." + e.target.id);

        if ($(document).scrollTop() < 300) {
            height += 40;
        }

        //$(".detail-carreview .tabsitem .active").removeClass("active");
        //$(".detail-carreview .tabsitem #" + e.target.id).addClass("active");      

        $('html,body').animate({
            scrollTop: (divposition.offset().top - height)
        }, 'slow');

        return false;
    });
};

$.fn.tab = function () {
    $(this).click(function () {
        $(".title-tabs-detail .activetab").removeClass("activetab");
        var a = $(this);
        $(this).addClass("activetab");
        var aTag = $(".title-tabs-detail  ." + $(this).attr("id"));
        $(".title-tabs-detail .box").not(aTag).slideUp(1000); if (aTag.is(':visible'))
            aTag.slideUp(1000);
        if (aTag.is(':hidden')) {
            aTag.slideDown(1000);
            //setTimeout(function () {
            //    //$('html,body').animate({ scrollTop: a.offset().top }, 1000);
            //}, 1000);

        }
        return false;
    });
};

$.fn.tabcreateauto = function () {
    $(this).click(function () {
        var id = $(this).attr('id');
        if ($("." + id).is(":visible")) {
            $(this).addClass("active");
        } else {
            $(this).removeClass("active");
        }
        $("." + id).toggle('slow');
    });
};

$.fn.activemenusalon = function () {
    var href = window.location.href.replace("http://").replace("https://");
    var sorthref = href.substring(href.indexOf('/'), href.length);
    this.each(function () {
        if (sorthref == ($(this).attr("href"))) {
            $(this).parent().addClass("active");
            return;
        }
    });
};

$.fn.pagenum = function () {
    var recodenumber = 0, pagenumber = 0;
    this.each(function () {
        if (recodenumber % 3 == 0)
            pagenumber++;
        $(this).find('.grid-title').addClass('grid-title-row' + pagenumber);
        recodenumber++;
        if (pagenumber == 4) pagenumber = 0;
    });
};

$.fn.playVideo = function (autoPlay) {
    if (!autoPlay) {
        autoPlay = false;
    }

    this.each(function () {
        var _this = $(this);
        var type = _this.attr("data-type");
        var video = _this.attr("data-video");
        var width = _this.attr("data-width");
        var height = _this.attr("data-height");
        var image = _this.attr("data-image");

        if (!image) {
            image = "";
        }

        if (type == "jwplayer") {
            var id = _this.attr("id");
            var subtitle = _this.attr("data-subtitle");

            jwplayer.key = "5qMQ1qMprX8KZ79H695ZPnH4X4zDHiI0rCXt1g==";

            jwplayer(id).setup({
                file: video,
                width: width,
                image: image,
                height: height,
                controlbar: "bottom",
                autostart: autoPlay,
                tracks: [{
                    file: subtitle,
                    label: "English",
                    kind: "captions",
                    "default": true
                }],
                captions: [{
                    color: "#FF0000",
                    fontSize: 20,
                    backgroundOpacity: 0
                }]
            });
        } else if (type == "embed") {
            var html = "<object width='" + width + "' height='" + height + "' classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' id='object_banxehoi'>"
	            + "<param name='wmode' value='transparent'>"
	            + "<param name='movie' value='" + video + "'>"
	            + "<param name='allowFullScreen' value='true'>"
	            + "<param name='flashvars' value='videotag=true&autostart=" + autoPlay + "'>"
	            + "<param name='allowscriptaccess' value='always'><param name='bgcolor' value='#000000'>"
	            + "<embed width='" + width + "' height='" + height + "'  src='" + video + "'  id='object_banxehoi' name='movie' type='application/x-shockwave-flash' allowscriptaccess='always' allowfullscreen='true' wmode='transparent' flashvars='videotag=true&autostart=true' bgcolor='#000000' quality='high'>"
                + "</object>";

            _this.html(html);
        }
    });
}

$.fn.prettyPhotos = function () {
    $(this).each(function () {
        var img = $(this);
        var title = img.attr("title");
        var src = img.attr("src");

        if (src == "/assets/img/video.png"
            || src == "/assets/img/embed.png"
            || src == "/content/style/images/video.png"
            || src == "/style/images/gl.png"
            || src == "/style/images/fb.png") {
            return;
        }

        img.addClass("prettyPhotos");
        img.replaceWith("<a href = '" + src + "' title = '" + title + "' rel='prettyPhoto[pp_gal]'>" + this.outerHTML + "</a>");
    });

    $("a[rel^='prettyPhoto']").prettyPhoto({
        animation_speed: 'normal',
        theme: 'light_square',
        slideshow: 5000,
        autoplay_slideshow: false,
        social_tools: '',
        //gallery_markup: '',
        deeplinking: false,
        allow_resize: false
    });
};

$.fn.sliderCompare = function () {
    this.each(function () {
        var _this = $(this);
        var width = _this.attr("data-width");
        var height = _this.attr("data-height");

        _this.css("border", "none");
        _this.find("img").each(function () {
            var img = $(this);

            img.css("width", width);
            img.css("height", height);
        });

        _this.addClass("twentytwenty-container").twentytwenty({ default_offset_pct: 0.7 });
    });
};

$.fn.cropImage = function () {
    DOMAIN_IMAGE_STORAGE = "http://img.banxehoi.com";
    DOMAIN_IMAGE_STORAGE_1 = "http://img1.banxehoi.com";

    this.each(function () {
        var _this = $(this);
        var width = _this.attr("width");
        var height = _this.attr("height");
        var src = _this.attr("src");

        if (!width) {
            width = _this.css("width").replace("px", "");
        }

        if (!height) {
            height = _this.css("height").replace("px", "");
        }

        if (!width || !height) {
            return;
        }

        if (src.indexOf(DOMAIN_IMAGE_STORAGE_1) >= 0) {
            src = src.replace(DOMAIN_IMAGE_STORAGE_1, DOMAIN_IMAGE_STORAGE_1 + "/crop/" + width + "x" + height);
        } else if (src.indexOf(DOMAIN_IMAGE_STORAGE) >= 0) {
            src = src.replace(DOMAIN_IMAGE_STORAGE, DOMAIN_IMAGE_STORAGE + "/crop" + width + "x" + height);
        }

        _this.attr("src", src);
    });
};

$.fn.ShowHideDiv = function () {
    $(this).click(function () {
        if ($('.tdleft').hasClass('hide')) {
            $('.tdleft').removeClass('hide');
            $(this).removeClass('icon-show');
        }
        else {
            $('.tdleft').addClass('hide');
            $(this).addClass('icon-show');
        }
    });
};

function formatPrice(input, separator, unit) {
    var result = input;
    var length = input.length;

    if (length > 3) {
        result = "";

        for (var i = length - 1, j = 1; i >= 0; i--, j++) {
            result = input[i] + result;

            if (i != 0 && j % 3 == 0) {
                result = separator + result;
            }
        }
    }

    result += unit ? " " + unit : "";

    return result;
}

var get_radio_value = function (radioArray) {
    var i;
    for (i = 0; i < radioArray.length; i++) {
        if (radioArray[i].checked) {
            return radioArray[i].value;
        }
    }
    return null;
};
var ShowVoteResult = function () {
    var width;
    var widthPopup;
    widthPopup = 550 / 2;
    width = screen.availWidth / 2 - widthPopup;

    var mywindow = window.open("/vote", '_blank', 'height=250,width=560,location=0,status=0,scrollbars=0, resizable=0');
    mywindow.moveTo(width, width / 2);
};
var Vote = function () {
    var voteItId = get_radio_value(document.getElementsByName("bc"));
    if (voteItId == null) {
        alert("Bạn chưa chọn câu trả lời!");
        return false;
    }
    else {
        var width;
        var widthPopup;
        widthPopup = 550 / 2;
        width = screen.availWidth / 2 - widthPopup;

        var mywindow = window.open("/vote-" + voteItId, '_blank', 'height=250,width=560,location=0,status=0,scrollbars=0, resizable=0');
        mywindow.moveTo(width, width / 2);
    }
};

$.fn.addHighLight = function () {
    $(this).each(function (index, elem) {
        if (index % 2 == 0) {
            $(this).addClass('highlight');
        }
    });
};

$.fn.addHighLightCompare = function () {
    $(this).each(function (index, elem) {
        if ((index + 1) % 2 == 0) {
            $(this).addClass('highlight');
        }
    });
};

function isEmpty(el) {
    return !$.trim(el.html())
}

$.fn.CheckContent = function () {
    $(this).each(function (index, elem) {
        if (isEmpty($(this))) $(this).parent().hide();
    });
};
//sidebanner
$.fn.sidebanner = function () {
    var bodywidth = 1000; // $('.site').width();
    var widthleft = 100;
    var widthright = 100;
    $(window).scroll(function () {
        RePosition();
    });
    $(window).resize(function () {
        RePosition();
    });
    var RePosition = function () {
        var xleft = (($(window).width() - bodywidth) / 2) - widthleft - 10;
        var xright = (($(window).width() - bodywidth) / 2) + bodywidth + 10;

        if ($(window).width() < bodywidth + widthleft + widthright + 20) {
            $('.ban_scroll').css('display', 'none');
            return;
        } else {
            $('.ban_scroll').css('display', 'block');
        }

        //xright = (($(document.body).width() - 0 - bodywidth) / 2) + bodywidth + 10;

        //if (widthleft == null) {
        //    xleft = (($(document.body).width() - 0 - bodywidth) / 2) - widthright - 10;
        //}
        //else {
        //    xleft = (($(document.body).width() - 0 - bodywidth) / 2) - widthleft - 10;
        //}
        var $toado_old = 0;
        var $toado_curr = $(window).scrollTop();
        var heightFromTop = 42;
        var fixPos = 200;
        var newtop = 0;
        var botPos = $(".newfooter").position().top - $(".ban_scroll").height() - 50;
        if ($toado_curr <= fixPos) {
            newtop = fixPos;
        } else if ($toado_curr >= botPos) {
            newtop = botPos;
        }
        else {
            newtop = $toado_curr - $toado_old + heightFromTop;
        }
        $('#ban_left').stop().animate({ 'top': newtop, 'left': xleft }, 400);//Cách TOP 0px
        $('#ban_right').stop().animate({ 'top': newtop, 'left': xright }, 400);//Cách TOP 0px
        $toado_old = $toado_curr;
    }
    RePosition();
};
$.fn.multibanner = function (className) {
    var showMultiBanner = function (className, index) {
        $('.' + className).hide();
        $($('.' + className)[index]).show();
        saveCookieMultiBanner(className, index);
    };
    var saveCookieMultiBanner = function (className, index) {
        var d = new Date();
        d.setTime(d.getTime() + (1 * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = className + "Index=" + index + "; " + expires + "; path=/";
    };
    var index = getCookie(className + "Index");
    if (index != "") {
        index = eval(index) + 1;
        if (index >= $('.' + className).length) index = 0;
    } else {
        index = 0;
    }
    showMultiBanner(className, index);
};
/*header run*/
$(document).ready(function () {
    $('#slideModel').newsslide(230);
    $('.focusnews .nbs-flexisel-nav-right').css("top", "17px");

    $('.focusnews .nbs-flexisel-nav-right').css("right", "21px");

    $('.focusnews .nbs-flexisel-nav-left').css("top", "17px");
});
//Scroll To Top
$(function () {
    $("#toTop").scrollToTop(1000);
});
//buttonfly
$(document).ready(function () {
    var $width = jQuery(window).width();
    jQuery('body').append('<div id="buttonfly"><img src="/style/images/buttonfly-mini.png" border="0"/><img src="/style/images/buttonfly.png" style="display:none" border="0"/></div>');
    jQuery(window).scroll(function () {
        if (jQuery(window).scrollTop() > 180) {
            jQuery('#buttonfly').fadeIn();
        } else {
            jQuery('#buttonfly').fadeOut();
        }
    });
    jQuery('#buttonfly').click(function () {
        //jQuery('html, body').animate({ scrollTop: 0 }, 500);
        location.href = '/dang-tin-ban-xe';
    });
    jQuery('#buttonfly').hover(function () {
        //alert('f');
        //jQuery('#buttonfly').toggleClass('buttonfly-mini');                
        $(this).addClass('buttonfly-mini');
        $($(this).find('img')[0]).hide();
        $($(this).find('img')[1]).show();
    });
    $('#buttonfly').live('mouseleave', function () {
        $(this).removeClass('buttonfly-mini');
        $($(this).find('img')[0]).show();
        $($(this).find('img')[1]).hide();
    });
    jQuery(window).resize(function () {
        jQuery('#buttonfly').remove();
        var $width = jQuery(window).width();
        if (jQuery(window).width() > 1000) {
            var $top = jQuery('#buttonfly');
            if ($top.length < 1)
                jQuery('body').append('<div id="buttonfly"></div>');
            jQuery(window).scroll(function () {
                if (jQuery(window).scrollTop() > 180) {
                    jQuery('#buttonfly').fadeIn();
                } else {
                    jQuery('#buttonfly').fadeOut();
                }
            });
            jQuery('#buttonfly').click(function () {
                location.href = '/dang-tin-ban-xe';
            });
        } else {
            jQuery('#buttonfly').remove();
        }
    });
});
//buttonfly eof
/*eof header run*/
/*eof main.js*/
function ItemClick(id) {
    $.ajax({
        type: "POST",
        cache: false,
        url: "/AutoCompares/GetAutoCompareByID",
        data: { "autoCompareId": id },
        success: function (data) {
            if (data != "") {
                if ($(".autocompare-item").find("table").length > 4) {
                    alert("Tối đa chỉ chọn được 5 xe.");
                    return;
                }
                else if ($(".autocompare-item").find("table[id='" + id + "']").length > 0) {
                    alert("Xe này đã có trong danh sách so sánh.");
                }
                else {
                    var url = location.href + "-" + id;
                    $(".autocompare-item .contentscroll").append(data);

                    window.history.pushState("string", "Title", url);
                    $(".popupseachauto").hide();

                    // set text count
                    $(".tblCompare .count").text($(".autocompare-item").find(".item").length)
                    $(".autocompare-item .contentscroll").resize();

                    $('.autocompare-item .item').each(function () {
                        $(this).find("tr").addHighLightCompare();
                    });
                    NextBack();
                    SetScroll();
                }
            }
        }
    });
};

function DeleteItemCompare(_this, id) {

    $(_this).parent().parent().parent().parent().parent().remove();

    // set text count
    var count = eval($(".tblCompare .count").text()) - 1;
    $(".tblCompare .count").text(count);

    //set lại url
    SetUrl();

    $(".autocompare-item .contentscroll").resize();
    NextBack();
    SetScroll();
};

function SetUrl() {
    var url = location.href;
    var lstID = "";
    $(".autocompare-item .item").each(function () {
        lstID += $(this).attr("id") + "-";
    });
    lstID = lstID.trimEnd("-");
    url = url.substring(0, url.lastIndexOf("/") + 1) + lstID;
    window.history.pushState("string", "Title", url);
}

function SetScroll() {
    var count = $(".autocompare-item .item").length;
    var width = count * 230;
    $(".contentscroll").css("width", "" + width + "px");
}

/************************So sánh xe level 1***********************/
function SelectItem(id) {
    $.ajax({
        type: "POST",
        cache: false,
        url: "/AutoCompares/GetAutoCompareByIDSearch",
        data: { "autoCompareId": id },
        success: function (data) {
            if (data != "") {
                if ($(".selectedauto .itemselect").find(".item").length > 4) {
                    alert("Tối đa chỉ chọn được 5 xe!");
                }
                else if ($(".selectedauto .itemselect").find(".item[rel='" + id + "']").length > 0) {
                    alert("Xe này đã có trong danh sách so sánh!");
                }
                else {
                    $(".selectedauto .itemselect").append(data);
                    $(".selectedauto .count .countnumb").text($(".selectedauto .itemselect").find(".item").length)

                }
            }
        }
    });
};
function DeleteItem(_this) {
    $(_this).parent().parent().remove();
    var count = eval($(".selectedauto .count .countnumb").text()) - 1;
    $(".selectedauto .count .countnumb").text(count);

}
function DeleteAllItem() {
    $(".selectedauto .itemselect").empty();
    $(".selectedauto .count .countnumb").text(0);
}
function NextBack() {
    $(".autocompare-item table").find(".next").show();
    $(".autocompare-item table").find(".preview").show();
    $(".autocompare-item table:last").find(".next").hide();
    $(".autocompare-item table:first").find(".preview").hide();
    SetUrl();
}

function next(control) {
    var _this = $(control).parent().parent().parent().parent().parent();
    var _next = _this.next();

    if (_next.length == 0) {
        return;
    }

    _this.animate({
        opacity: 0.2,
    }, 500, function () {
        _this.remove();
        _next.css("opacity", "0").animate({
            opacity: 1,
        }, 300);
        _next.after("<div style = 'opacity: 0'>" + _this.html() + "</div>");
        NextBack();
        _next.next().animate({
            opacity: 1,
        }, 500);
    });

}

function preview(control) {
    var _this = $(control).parent().parent().parent().parent().parent();
    var _next = _this.prev();
    if (_next.length == 0) {
        return;
    }

    _this.animate({
        opacity: 0.2,
    }, 500, function () {
        _this.remove();
        _next.css("opacity", "0").animate({
            opacity: 1,
        }, 300);
        _next.before("<div style = 'opacity:0'>" + _this.html() + "</div>");
        NextBack();
        _next.prev().animate({
            opacity: 1,
        }, 500);
    });
}
$.fn.pricemask = function () {
    $(this).keyup(function () {
        var val = $(this).val().replace(/\./g, '').replace(/,/g, '');
        $(this).val(val).formatCurrency({ roundToDecimalPlace: -1, symbol: '' });
        val = $(this).val().replace(/,/g, '.');
        $(this).val(val);
    });
};
$.fn.numbersOnly = function () {
    this.keyup(function () {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
};
$.fn.numbersOnly2 = function () {
    this.keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g, '');
    });
};

function RedirectLinkViewMore() {
    $.removeCookie('OrderYear', { path: '/' });
    $.removeCookie('OrderPrice', { path: '/' });
    location.href = "/ban-xe";
}
function addDays(theDate, days) {
    return new Date(theDate.getTime() + days * 24 * 60 * 60 * 1000);
}