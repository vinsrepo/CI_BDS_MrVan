/// <reference path="jquery-1.7.2.js" />

//$(document).ready(function () {
//    var description = $('#description .text').html();
//    if ($.trim(description) == '')
//        $('#description').remove();
//    var count = $('#myGallery img').length;
//    if (count > 1) {
//        //$('#myGallery').galleryView({
//        //    transition_speed: 0
//        //});

//        // Load the classic theme
//        Galleria.loadTheme('/Scripts/SlideShow_Galleria/themes/classic/galleria.classic.min.js');

//        // Initialize Galleria
//        //Galleria.run('#myGallery');

//        $('#myGallery').galleria({
//            showInfo: false,
//            extend: function () {
//                this.$('info').hide();
//            }
//        });        
//    }
//    if (count == 1) {
//        //$('.gv_panelNavNext, .gv_panelNavPrev, .gv_infobar, .gv_filmstripWrap').remove();
//        //$('.gv_gallery, .gv_galleryWrap').height(413);
//        $('.galleria-thumbnails-container, .galleria-image-nav, .galleria-counter').remove();
//        $('.gv_gallery, .gv_galleryWrap').height(413);
//        $('#myGallery').css({ 'background': '#c1e9f2', 'text-align': 'center', 'padding': '10px 10px 6px' });

//    }
//    else if (count == 0) {
//        $('#myGallery').hide();
//    }


//    var rowstbl1 = $('#tbl1 tr').length;

//    for (var i = 1; i <= rowstbl1; i++) {
//        var $td = $('#tbl1 tr:nth-child(' + i + ') td:last-child');
//        var content = $td.html();
//        if ($.trim(content) == '') {
//            $($td).parent().remove();
//            rowstbl1--;
//            i--;
//        }
//    }
//    var rowstbl2 = $('#tbl2 tr').length;
//    for (var j = 1; j <= rowstbl2; j++) {
//        var $td2 = $('#tbl2 tr:nth-child(' + j + ') td:last-child');
//        if ($.trim($td2.html()) == '') {
//            $($td2).parent().remove();
//            j--;
//            rowstbl2--;
//        }
//    }
//    if (rowstbl2 == 0) {
//        $('#lienhe').remove();
//    }

//    var rowstbl3 = $('#tbl3 tr').length;
//    for (var k = 1; k <= rowstbl3; k++) {
//        var $td3 = $('#tbl3 tr:nth-child(' + k + ') td:last-child');
//        if ($.trim($td3.html()) == '') {
//            $($td3).parent().remove();
//            k--;
//            rowstbl3--;
//        }
//    }

//});

function printDetailt() {    
    //if ($('#osgslide img').length == 1) {
    //    $('#osgslide').removeClass();
    //}
    //else if ($('.galleria-container').length == 1) {
    //    var listImages = '';
    //    $('.galleria-thumbnails .galleria-image img').each(function () {
    //        listImages += '<li><img src="' + $(this).attr('src') + '"/></li>';
    //    });
    //    $('#imgPrint').html('<ul>' + listImages + '</ul>');
    //}    
    
    var printWindow = window.open($(location).attr('href'),'myprint'+Math.random(),'target=_blank');    
    printWindow.focus();
    printWindow.print();    
     
}
