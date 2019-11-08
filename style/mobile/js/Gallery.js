var myVar;//= window.setInterval("nextAvatar()", 5000);

var timerId = 0;
function PlayPauseStart() {
    if (timerId == 0) {
        $('#play_pause').removeClass().addClass('play');
        myVar = window.setInterval("nextAvatar()", 5000);
        timerId = 1;
    }
    else {
        $('#play_pause').removeClass().addClass('pause');
        clearInterval(myVar);
        timerId = 0;
    }
}

$(document).ready(function () {
    /* $('#imgProduct').hover(function () {
             clearInterval(myVar);
         },
         function () {
             myVar = window.setInterval("nextAvatar()", 5000);
         });*/
    $('#photos li:first-child').addClass('active');
    $('#total').text($('#photos li').length);
    if ($('#photos li').length == 1) {
        $('#number').hide();
        $('.avatar .previous_avatar, .avatar .next_avatar, .img_preview, #play_pause').hide();
        clearInterval(myVar);
        timerId = 0;
    }
    $('#photos li').hover(function () {
        var imageOver = $(this).find('img').attr('src');
        $("#imgProduct").attr("src", imageOver);
        $('#photos li').removeClass();
        $(this).addClass('active');
        timerId = 0;
        clearInterval(myVar);
        $('#play_pause').removeClass().addClass('pause');
    });

    //LoadMap();
});

function ClickNext() {
    timerId = 0;
    clearInterval(myVar);
    $('#play_pause').removeClass().addClass('pause');
    nextAvatar();
}
function ClickPrev() {
    timerId = 0;
    clearInterval(myVar);
    $('#play_pause').removeClass().addClass('pause');
    prevAvatar();
}

function nextAvatar() {
    var id = $('.active').attr('id');
    var idNew = $('#' + id).next().attr('id');
    if ($('#' + id).next().html() == null) {
        idNew = 1;
    }
    var imageOver = $('#' + idNew).find('img').attr('src');
    $("#imgProduct").attr("src", imageOver);
    $('#' + id).removeClass();
    $('#' + idNew).addClass('active');

    $('#index').text(idNew);

    /*if ($("#" + id).position().left > 140 && $("#" + id).position().left < 185) {
        $('#photos').trigger("next", {
            fx: "fade",
            duration: 300
        });
    }*/
}

function prevAvatar() {
    var id = parseInt($('.active').attr('id'));
    if ($("#" + id).position().left == 0) {
        $('#photos').trigger("prev", {
            fx: "fade",
            duration: 300
        });
    }
    var idNew = $('#' + id).prev().attr('id');
    if ($('#' + id).prev().html() == null) {
        idNew = $('#photos li:last-child').attr('id');
    }
    var imageOver = $('#' + idNew).find('img').attr('src');
    $("#imgProduct").attr("src", imageOver);
    $('#' + id).removeClass();
    $('#' + idNew).addClass('active');

    $('#index').text(idNew);
}


/*Google maps*/

var countLoadMap = 0;
function LoadMap() {

    if (countLoadMap == 0) {
        $("#viewMap").find("a span.text-blue").text("Ẩn bản đồ");
        $(".close-m").show();
        $(".c-content-m").show();
        var lat = $('#hdLat').val();
        var lng = $('#hdLong').val();
        var address = $('#hdAddress').val();
        if (lat != '' && lng != '' && lat != '0' && lng != '0') {
            $("#map_canvas").show();
            var mapOptions = {
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                center: new google.maps.LatLng(lat, lng)
            };

            var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);

            var marker = new google.maps.Marker({
                map: map,
                draggable: true,
                animation: google.maps.Animation.DROP,
                position: new google.maps.LatLng(lat, lng)
            });
            countLoadMap = 1;
        }
    }
    else {
        $("#viewMap").find("a span.text-blue").text("Xem bản đồ");
        $(".c-content-m").hide();
        $(".close-m").hide();
        $("#map_canvas").hide();
        countLoadMap = 0;
    }
}

$(".st-panel").click(function () {
    $("#viewMap").find("a span.text-blue").text("Xem bản đồ");
    $(".c-content-m").hide();
    $(".close-m").hide();
    $("#map_canvas").hide();
    countLoadMap = 0;
});

function CloseMap() {
    if (countLoadMap != 0) {
        $("#viewMap").find("a span.text-blue").text("Xem bản đồ");
        $(".c-content-m").hide();
        $(".close-m").hide();
        $("#map_canvas").hide();
        countLoadMap = 0;
    }
}
//check link trang chi tiết
$(document).ready(function () {
    /*var exts = ['http', 'www', 'mailto', 'htm'];
    $('.boxdetail .description .text a').each(function() {
        var url = $(this).attr('href');
        if (!$(this).attr('href').match(new RegExp('(' + exts.join('|') + ')'), 'gi')) {
            $(this).attr('href', url + '.htm');
        }
    });*/

    /*remove table*/
    var rowstbl1 = $('#tbl1 tr').length;

    for (var i = 1; i <= rowstbl1; i++) {
        var $td = $('#tbl1 tr:nth-child(' + i + ') td:last-child');
        var content = $td.html();
        if ($.trim(content) == '') {
            $($td).parent().remove();
            rowstbl1--;
            i--;
        }
    }


    var rowstbl2 = $('#tbl2 tr').length;
    for (var j = 1; j <= rowstbl2; j++) {
        var $td2 = $('#tbl2 tr:nth-child(' + j + ') td:last-child');
        if ($.trim($td2.html()) == '') {
            $($td2).parent().remove();
            j--;
            rowstbl2--;
        }
    }
    if (rowstbl2 == 0) {
        $('#lienhe').remove();
    }
    /*remove table end*/
    $("#tbl1 tr:odd").addClass("alt");
});