var bodyheight = $(window).height();
function advancedSearch() {
    $('#advanced, #tim, #botim').toggle();
}
$(document).ready(function () {
    var headerheight = $('.kheader').height();
    var footerheight = $('.footer').height();
    var contentheight = bodyheight - headerheight - footerheight;
    $('.content-bodypage').css("min-height", contentheight + "px");

    $(".validateSpecialChar").on("keypress", function () {
        var regex = new RegExp("^[a-zA-Z0-9]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    });
    $(".numbersOnly").on("keypress", function () {
        this.value = this.value.replace(/[^0-9]/g, '');
        var value = $(this).val();
        value = value.replace(/^(0*)/, "");
        $(this).val(value);

    });

    $('#to_top').fadeOut();
    $("#to_top").click(
        function () {
            $("body,html").animate({ scrollTop: 0 }, "normal"); $("#page").animate({ scrollTop: 0 }, "normal"); return false;
        });
    if ($('#txtdescription .text-content').height() > 210) {
        $('.extendinfo').show();
    }
    $('.extendinfo').click(function () {
        if ($('.extendinfo').hasClass('hide')) {
            $('#txtdescription').css({
                "max-height": "210px"
            });
            $('.extendinfo').html("Xem thêm&nbsp;<img src='/style/mobile/images/icon-expand.png'/>");
            $('.extendinfo').removeClass('hide')
        }
        else {
            $('#txtdescription').css({
                "max-height": $('#txtdescription .text-content').height() + "px"
            });
            $('.extendinfo').html("Ẩn&nbsp;<img src='/style/mobile/images/icon-expand.png'/>");
            $('.extendinfo').addClass('hide')
        }
    });
    var pc_hot_name = "?IsMobile=true&redirectUrl=";
    $("#backDesktop").attr("href", pc_hot_name + location.pathname);

    var img = new Image();
    img.src = '?type=removecookie';

    LoadCombobox();
    LoadCombobox_News();
    $('#lbtDirection').click(function () {
        var year = $("#txtBirthYearFromDirect").val();
        var gender = $("#cmbSexForm").val();
        var direction = $("#cmbDirectionForm").val();
        var regex = /^(19|20)[0-9]{2}$/;
        if (year != null) {
            if (!regex.test(year)) {
                $("#errorHomeDirection").show();
            } else {
                $("#errorHomeDirection").hide();
                $("#divajax").show();
                $.ajax({
                    url: "/cost/calculator?v=" + Math.random(),
                    data: {
                        act: 'ResultDirection',
                        year: year,
                        gender: gender,
                        direction: direction
                    },
                    success: function (data) {
                        $("#divajax").hide();
                        $("#divContentFS").show()
                        $('#divContentRS').html(data);
                    }
                });
            }
        }
        else {

        }
    });

    $('#lbtAgeBuildHome').click(function () {
        var year = $("#txtBirthYearFormAge").val();
        var expectedYear = $("#cmbYearForm").val();
        var regex = /^(19|20)[0-9]{2}$/;
        if (year != null) {
            if (!regex.test(year)) {
                $("#errorBuildHome").show();
            } else {
                $("#errorBuildHome").hide();
                $("#divajax").show();
                $.ajax({
                    url: "/cost/calculator?v=" + Math.random(),
                    data: {
                        act: 'ResultAge',
                        year: year,
                        expectedyear: expectedYear
                    },
                    success: function (data) {
                        $("#divajax").hide();
                        $("#divContentFS").show()
                        $('#divContentRS').html(data);
                    }
                });
            }
        }
        else {

        }
    });

    checkSaveProduct();
    //$("input.numeric").numeric()
});



String.prototype.trimstart = function (chars) {
    if (chars === undefined)
        chars = "\s";

    return this.replace(new RegExp("^[" + chars + "]+"), "");
};
String.prototype.trim = function () {
    return this.replace(/^\s+|\s+$/g, '');
}
function selectSubChange(value) {
    window.open(value, "_parent");
}

function searchNew() {
    if (pType == 38) {
        url = "nha-dat-ban";
    }
    else
        url = "nha-dat-cho-thue";
    window.open("/tim-kiem-" + url + ".htm", "_parent");
}

$(window).scroll(function () {
    if ($(window).scrollTop() >= 200) {
        $('#to_top').fadeIn();
    } else {
        $('#to_top').fadeOut();
    }
});

function refreshCaptcha(imgId) {
    $('#' + imgId).attr('src', '/Layout/Capchar/CaptchaGenerator.aspx?t=' + new Date().getMilliseconds());
}

function showMenu() {
   
    $('.menuleft .content-menu').height(bodyheight - 40);
    $('.menuleft').animate({ "left": "0px" }, "slow");
    $('.menuleft').addClass("visiable");
    $('.body-shadow').show();
    $('.content-page').css({
        "overflow": "hidden",
        "max-height": bodyheight-10 + "px"
    })
}
function HideMenu() {
    if ($('.menuleft').hasClass('visiable')) {
        $('.menuleft').animate({ "left": "-2000px" }, "slow");
        $('.menuleft').removeClass("visiable");
        $('.body-shadow').hide();
        $('.content-page').removeAttr("style");
    }
    CloseShareListing();
}

function LogOut() {
    if (confirm('Bạn chắc chắn muốn thoát ?')) {
        window.location.href = '/dang-xuat.htm';
    }
}

function LoadCombobox() {
    var text = $("#ddlSortReult option:selected").text();
    if (text != '') {
        $("#spanOver").html(text);
    }
}


function LoadCombobox_News() {
    var text = $("#slSub option:selected").text();
    if (text != '') {
        $("#spanOverNews").html(text);
    }
}


/*Product save*/
function checkStatus() {
    if (productId == 0) return false;
    if (userId == '') {
        var listProductId = $.cookie('savedProductIds');
        if (listProductId != null) {
            if (listProductId.search(productId) > -1)
                changeHtml();
        }
    }
    else {
        $.ajax({
            type: "POST",
            cache: false,
            url: "/Handler/ProductHandler.ashx?act=getProduct",
            data: { "productId": productId },
            success: function (data) {
                if (data > 0)
                    changeHtml();
            }
        });
    }
}

function checkCookie() {
    var listProductId = $.cookie('savedProductIds');
    if (listProductId == null) {
        $("#boxProductSaved").hide();
    }
    else
        hideBox()
}

function changeHtml() {
    $('#saveNews').text('Đã lưu').removeClass('save').addClass('saved').removeAttr('onclick');
}

function GetProductlist() {
    var listProductId = $.cookie('savedProductIds');
    var html = '';
    if (listProductId != null) {

        var likeReturn = '';
        $("#boxProductSaved ul").html(html);
        if ($("body").data('GetProductlist_' + listProductId) != null) {
            likeReturn = $("body").data('GetProductlist_' + listProductId);
            $.each(likeReturn, function (index, value) {
                html += '<li pid="' + value.ProductId + '" ><a href="' + value.SourceNews + '">' + value.Title + '</a><span title="Xóa" onclick="deleteProduct(this,' + value.ProductId + ');"></span></li>';
            });
            if (html != '') {
                $("#boxProductSaved").show();
                $("#boxProductSaved ul").html(html);
            }
            else {
                $.removeCookie('savedProductIds', { domain: domainCookie, path: '/' });
                $("#boxProductSaved").hide();
            }
        }
        else {
            $.ajax({
                type: "POST",
                cache: false,
                url: "",
                data: { "productIds": listProductId },
                success: function (data) {
                    if (data != null) {
                        likeReturn = eval('(' + data + ')');
                        $("body").data('GetProductlist_' + listProductId, likeReturn);
                        $.each(likeReturn, function (index, value) {
                            html += '<li pid="' + value.ProductId + '"><a href="' + value.SourceNews + '">' + value.Title + '</a><span title="Xóa" onclick="deleteProduct(this,' + value.ProductId + ');"></span></li>';
                        });
                        if (html != '') {
                            $("#boxProductSaved").show();
                            $("#boxProductSaved ul").html(html);
                        }
                        else {
                            $.removeCookie('savedProductIds', { domain: domainCookie, path: '/' });
                            $("#boxProductSaved").hide();
                        }
                    }
                },
                error: function (e) {
                    //console.log(e);
                }
            });
        }
    }
    else if (userId != '') {
        listProductId = '';
        $.ajax({
            type: "POST",
            cache: false,
            url: "/trangchu/bank",
            data: { "productIds": listProductId },
            success: function (data) {
                if (data != null && data != 'null') {
                    likeReturn = eval('(' + data + ')');

                    $.each(likeReturn, function (index, value) {
                        html += '<li pid="' + value.ProductId + '"><a href="' + value.SourceNews + '">' + value.Title + '</a><span title="Xóa" onclick="deleteProduct(this,' + value.ProductId + ');"></span></li>';
                        listProductId += value.ProductId + ',';
                    });
                    if (listProductId != '') {
                        $("#boxProductSaved").show();
                        $("#boxProductSaved ul").html(html);
                        hideBox();
                        $.cookie('savedProductIds', listProductId, { domain: domainCookie, path: '/', expires: 7 });
                    }
                    else {
                        $.removeCookie('savedProductIds', { domain: domainCookie, path: '/' });
                        $("#boxProductSaved").hide();
                    }
                }
            }
        });
    }
}
Array.prototype.clean = function (deleteValue) {
    for (var i = 0; i < this.length; i++) {
        if (this[i] == deleteValue) {
            this.splice(i, 1);
            i--;
        }
    }
    return this;
};
function deleteProduct(index, productId) {
    if (confirm('Bạn có chắc chắn muốn xóa ?')) {

        var listProductId = $.cookie('savedProductIds') != null ? $.cookie('savedProductIds') : "";

        var arrProduct = listProductId.split(',').clean("");
        var total = arrProduct != null ? arrProduct.length : 0;

        //listProductId = listProductId.replace(productId, '').replace(',,', ',');
        var i = arrProduct.indexOf(productId.toString());
        if (i != -1) {
            arrProduct.splice(i, 1);
        }
        listProductId = arrProduct.join(',');

        deleteProductSaved(productId);

        if (listProductId != '' && listProductId != ',')
            $.cookie('savedProductIds', listProductId, { domain: domainCookie, path: '/', expires: 7 });
        else
            $.removeCookie('savedProductIds', { domain: domainCookie, path: '/' });

        $(index).closest('.div_proitem').remove();
        $('.saveIMG'+productId).remove();     
        var menuCount = $('.content-menu').find('a[href="/thanh-vien/quan-ly-tin-da-luu"]');
        //listProductId = $.cookie('savedProductIds');
        var newCount = total - 1;

        console.log(newCount);
        // var currentTotal = $(menuCount).text().match(/\d+/);
        if (newCount > 0) {
            $(menuCount).text("Tin rao đã lưu" + ' (' + newCount + ')');
        }
        else {
            $(menuCount).text("Tin rao đã lưu (0)");
        }
    }
}
function DeleteSearch(index) {
    if (confirm('Bạn có chắc chắn muốn xóa ?')) {
        var link = $($('.product-info a')[0]).attr('href');
        var title = $($('.product-info a')[0]).text();
        var listProductId = $.cookie('savedSearchLinks') != null ? $.cookie('savedSearchLinks') : "";
        listProductId = listProductId.replace(link + '$' + title, '').replace('##', '#');
        var countSaved = $('#countSearchSaved').text();
        countSaved = parseInt(countSaved, 10) - 1;
        $('#countSearchSaved').text(countSaved);
        if (listProductId != '' && listProductId != ',')
            $.cookie('savedSearchLinks', listProductId, { domain: domainCookie, path: '/', expires: 7 });
        else
            $.removeCookie('savedSearchLinks', { domain: domainCookie, path: '/' });

        $('.product-info[dataid=' + index + ']').parent().remove();

        deleteProductSearchSaved(index);
    }
}

function deleteAllNews() {
    if (confirm('Bạn có chắc chắn muốn xóa tất cả ?')) {
        var listProductId = $.cookie('savedProductIds');
        if (listProductId == null || listProductId == "") {
            listProductId = "";
            $('#boxProductSaved li').each(function () {
                listProductId += $(this).attr('pid') + ",";
            });
        }
        deleteListProductSaved(listProductId);
        $.removeCookie('savedProductIds', { domain: domainCookie, path: '/' });
        $("#boxProductSaved").hide();
    }
}

function openBox() {
    $('#boxProductSaved ul').show();
    var pos1 = $('#boxProductSaved').css('bottom');
    if (pos1.replace('px', '') < -1) {
        $('#boxProductSaved').animate({ bottom: '0' }, 200, function () {
            $('#boxProductSaved #btn_close').removeClass().addClass('hideAll');
        });
    }
}

function hideBox() {
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
            url: "/Handler/ProductHandler.ashx?act=deleteProductId",
            data: { "productId": productId },
            success: function () {

            }
        });
    }
}
function deleteProductSearchSaved(id) {
    if (userId != '') {
        $.ajax({
            type: "POST",
            cache: false,
            url: "/Handler/ProductHandler.ashx?act=deleteProductSearchSaved",
            data: { "id": id },
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
            url: "/Handler/ProductHandler.ashx?act=deleteListProductId",
            data: { "productIds": productIds },
            success: function () {

            }
        });
    }
}

function productSaved(index, productId) {
    var listProductId = $.cookie('savedProductIds');
    if (listProductId != null) {
        if (listProductId.search(productId) == -1)
            $.cookie('savedProductIds', productId + ',' + listProductId, { domain: domainCookie, path: '/', expires: 7 });
    }
    else {
        $.cookie('savedProductIds', productId, { domain: domainCookie, path: '/', expires: 7 });
    }
    //$("#boxProductSaved").show();
    $('#' + productId).attr('onclick', 'javascript:void(0)')
    //var countSaved = 0;
    //if ($('#countSaved').text()!=''){
    //    countSaved = $('#countSaved').text();
    //}
    //countSaved = parseInt(countSaved, 10) + 1;
    //$('#countSaved').text(countSaved);
    if (userId == '') {
         GetProductlist();
        //alert('Lưu tin thành công');
    }
    else {
        $.ajax({
            type: "POST",
            cache: false,
            url: "/trangchu/addpr",
            data: { "productId": productId },
            success: function (data) {
               GetProductlist();
                // alert('Lưu tin thành công');
            }
        });
    }
    $('.save-detail span').text("Đã lưu");
    var menuCount = $('.content-menu').find('a[href="/thanh-vien/quan-ly-tin-da-luu"]');
    listProductId = $.cookie('savedProductIds');
    var total = listProductId != null ? listProductId.split(',').length : 0;

    if (total > 0) {
        $(menuCount).text("Tin rao đã lưu" + ' (' + total + ')');
    }
    else {
        $(menuCount).text("Tin rao đã lưu");
    }

}

function checkSaveProduct(productId) {
    var listProductId = $.cookie('savedProductIds');
    var total = 0;
    var html = '';
    var menuCount = $('.content-menu').find('a[href="/thanh-vien/quan-ly-tin-da-luu"]');
    if (listProductId != null && userId == '') {

        if (listProductId.indexOf(productId) != -1) {
            $('.save-detail span').text("Đã lưu");
            $('.save-detail').parent().attr('onclick', 'javascript:void(0)');
        }
        var total = listProductId != null && listProductId != '' ? listProductId.split(',').length : 0;

        if (total > 0) {
            $(menuCount).text("Tin rao đã lưu" + ' (' + total + ')');
        }
        else {
            $(menuCount).text("Tin rao đã lưu");
        }
    }
    else if (userId != '') {
         listProductId = $.cookie('savedProductIds');
        if (listProductId.indexOf(productId) != -1) {
                    $('.save-detail span').text("Đã lưu");
                    $('.save-detail').parent().attr('onclick', 'javascript:void(0)');
                }

                total = listProductId != null && listProductId != "" ? listProductId.split(',').length : 0;
                console.log(total);
                if (total > 0) {
                    $(menuCount).text("Tin rao đã lưu" + ' (' + total + ')');
                }
                else {
                    $(menuCount).text("Tin rao đã lưu (0)");
                }
    }
    else {
        $(menuCount).text("Tin rao đã lưu (0)");
    }



}
function checkSaveLink() {
    var title = $('.spanresult').html().trim();
    var link = window.location.href;
    var listSavedSearchLink = $.cookie('savedSearchLinks');
    var listSavedSearchLink;
    if (listSavedSearchLink != null) {
        // console.log(listSavedSearchLink.indexOf(link));
        // console.log(listSavedSearchLink);
        if (listSavedSearchLink.indexOf(link) != -1) {
            $('.save span').text("Đã lưu");
            $('.save').parent().attr('href', 'javascript:void(0)');
        }
    }
    else if (userId != '') {
        listProductId = '';
        $.ajax({
            type: "POST",
            cache: false,
            url: "/Handler/ProductHandler.ashx?act=getProductSearchSavedList",
            success: function (data) {
                if (data.indexOf(link) != -1) {
                    $('.save span').text("Đã lưu");
                    $('.save').parent().attr('href', 'javascript:void(0)');
                }
            }
        });
    }

}
function searchLinkSaved() {
    var title = $('.spanresult').text().trim();
    var link = window.location.href;
    var listSavedSearchLink = $.cookie('savedSearchLinks');//alert(listSavedSearchLink)
    if (listSavedSearchLink != null) {
        if (listSavedSearchLink.indexOf(link) == -1)
            $.cookie('savedSearchLinks', link + '$' + title + '#' + listSavedSearchLink, { domain: domainCookie, path: '/', expires: 7 });
    }
    else {
        $.cookie('savedSearchLinks', link + '$' + title, { domain: domainCookie, path: '/', expires: 7 });
    }

    if (userId == '') {
        //GetProductlist();
        //alert('Lưu tin thành công');
    }
    else {
        $.ajax({
            type: "POST",
            cache: false,
            url: "/Handler/ProductHandler.ashx?act=productSearchInsert",
            data: { "title": title, "link": link },
            success: function (data) {
                // GetProductlist();
                //alert('Lưu tin thành công');
            }
        });
    }

    $('.save span').text("Đã lưu");
    $('.save').parent().attr('href', 'javascript:void(0)');

    var countSaved = $('#countSearchSaved').text();
    countSaved = parseInt(countSaved, 10) + 1;
    $('#countSearchSaved').text(countSaved);

    //console.log(link + ';' + title);
    alert('Lưu tìm kiếm thành công!');
}
function GetListSaveSearch() {
    var listSavedSearchLink = $.cookie('savedSearchLinks');
    var html = '';
    if (listSavedSearchLink != null) {
        var likeReturn = '';
        $("#boxProductSaved ul").html(html);
        var lstLink = listSavedSearchLink.Split(',');
        for (var i = 0; i < lstLink.lengt; i++) {

        }
    }
}

function checkStatusListId() {

    if (userId == '') {
        var listProductId = $.cookie('savedProductIds');
        if (listProductId != null) {
            {
                $('.productlist .item .save').each(function () {
                    var productId = $(this).attr('id');
                    if (listProductId.search(productId) > -1)
                        $('#' + productId).text('Đã lưu').removeClass().addClass('saved').removeAttr('onclick');
                });

            }
        }
    }
    else {
        var listId = '';
        $('.productlist .item .save').each(function () {
            listId += $(this).attr('id') + ',';
        });
        if (listId != '') {
            $.ajax({
                type: "POST",
                cache: false,
                url: "/Handler/ProductHandler.ashx?act=getListProductId",
                data: { "productIds": listId },
                success: function (data) {
                    listId = '';
                    if (data != null) {
                        likeReturn = eval('(' + data + ')');
                        $.each(likeReturn, function (index, value) {
                            listId += value.ProductId + ',';
                        });
                        $('.productlist .item .save').each(function () {
                            var productId = $(this).attr('id');
                            if (listId.search(productId) > -1)
                                $('#' + productId).text('Đã lưu').removeClass().addClass('saved').removeAttr('onclick');
                        });
                    }
                }
            });
        }
    }
}

/*Product save end*/




function ShowHomeDirection_From() {
    $("#divContentFS").hide();
    if ($("div#HomeDirectionForm").is(":visible")) {
    } else {
        $("div#HomeDirectionForm").show();
        $("div#AgeBuildHomeForm").hide();
        $("div.ff-tab1").addClass("ff-tab-active");
        $("div.ff-tab2").removeClass("ff-tab-active");
    }
}
function ShowAgeBuildHome_From() {
    $("#divContentFS").hide();
    if ($("div#AgeBuildHomeForm").is(":visible")) {
    }
    else {
        $("div#HomeDirectionForm").hide();
        $("div#AgeBuildHomeForm").show();
        $("div.ff-tab2").addClass("ff-tab-active");
        $("div.ff-tab1").removeClass("ff-tab-active");
    }
}
function ShareListing() {
    var bodyheight = $(window).height();
    $('.popupshare').show();
    $('.content2').css("opacity", "0.5");
    $('.kheader').css("opacity", "0.5");
    $('.default_padding').css("opacity", "0.5");
    $('.body-shadow2').show();
    $('body').css({
        "overflow": "hidden",
        "height": bodyheight + "px"
    })
    $('.kheader').css("opacity", "0.2");
}
function CloseShareListing() {
    $('.popupshare').hide();
    $('.content2').css("opacity", "1");
    $('.default_padding').css("opacity", "1");
    $('.body-shadow2').hide();
    $('body').removeAttr("style");
    $('.kheader').css("opacity", "1");
}

$('.body-shadow2').on('touchstart', function () {
    CloseShareListing();
})
$('.body-shadow').on('touchstart', function () {
    HideMenu();
    CloseShareListing();
})
//var countLoadMap = 0;
//function LoadMap() {

//    if (countLoadMap == 0) {
//        $("#viewMap").find("a span.text-blue").text("Ẩn bản đồ");
//        $(".close-m").show();
//        $(".c-content-m").show();
//        var lat = $('#hdLat').val();
//        var lng = $('#hdLong').val();
//        var address = $('#hdAddress').val();
//        if (lat != '' && lng != '' && lat != '0' && lng != '0') {
//            $("#map_canvas").show();
//            var mapOptions = {
//                zoom: 15,
//                mapTypeId: google.maps.MapTypeId.ROADMAP,
//                center: new google.maps.LatLng(lat, lng)
//            };

//            var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);

//            var marker = new google.maps.Marker({
//                map: map,
//                draggable: true,
//                animation: google.maps.Animation.DROP,
//                position: new google.maps.LatLng(lat, lng)
//            });
//            countLoadMap = 1;
//        }
//    }
//    else {
//        $("#viewMap").find("a span.text-blue").text("Xem bản đồ");
//        $(".c-content-m").hide();
//        $(".close-m").hide();
//        $("#map_canvas").hide();
//        countLoadMap = 0;
//    }
//}
