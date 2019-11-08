var markers = [];
var infoWindows = [];
var markerhover = [];
var map;
var data;

// Hàm lấy dữ liệu param service id 
function GetParameterByName(name) {
    var url = location.href;
    var istart = url.indexOf(name);
    var iend ;
    if (url.lastIndexOf('-k') != -1)
        iend = url.lastIndexOf('-k');
    else iend = url.length;   
    if (eval(iend) > eval(istart) && istart != - 1 ) {
        return name = url.substring(eval(istart) + name.length, eval(iend));
    }
    else return 0;
}

//Sự kiệu click item col left
$.fn.ClickLeft = function () {
    $(this).click(function () {
        $('.detail-item').removeClass("detail-item-current");
        $(this).addClass('detail-item-current');
        var id = $(this).attr('rel');

        // Đóng tất cả infowindow trước khi mở infowindow được click;
        for (var i = 0; i < infoWindows.length; i++) {
            infoWindows[i].close();
        }

        for (var i = 0; i < markers.length; i++) {
            if (id == markers[i].id) {
                var marker = markers[i];
                google.maps.event.trigger(marker, "click");
                var latLng = marker.getPosition();
                map.setCenter(latLng);
                break;
            }
        }
        //Build lại url
        SetUrlClick(id);
    });
};

//Sự kiệu hover item col left
$.fn.HoverItem = function () {

    $(this).mouseover(function () {
        var id = $(this).attr('rel');
        for (var i = 0; i < markers.length; i++) {
            if (id == markers[i].id) {     
                var marker = markers[i];                
                //google.maps.event.trigger(marker, "mouseover");

                var tooltip = new Tooltip({ map: map }, marker);
                tooltip.bindTo("text", marker, "tooltip");
                tooltip.addTip();
                tooltip.getPos2(marker.getPosition());                
                //marker.setIcon();
                marker.setZIndex = google.maps.Marker.MAX_ZINDEX + 1;
                break;
            }
        }

    }).mouseout(function () {
        $(".tooltip").remove();
    });
};

// Init map có data
function InitMap(data) {   
    // Google has tweaked their interface somewhat - this tells the api to use that new UI
    google.maps.visualRefresh = true;
    
    if (data.length == 0) {        
        var pyrmont = new google.maps.LatLng(21.026182, 105.851220);
        var mapOptions = {
            zoom: 12,
            center: pyrmont,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        // Chỉ định div chứa bản đồ
        map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
    }
    else {

        // Set vị trí center là bản ghi đầu tiên
        if (data.length > 0) {
            var pyrmont = new google.maps.LatLng(data[0].Long, data[0].Lat);
        };

        var mapOptions = {
            zoom: 16,
            center: pyrmont,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        // Chỉ định div chứa bản đồ
        map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);

        //// Setcenter and fitBounds
        setZoom(map, data);

        // For mảng dữ liệu để init bản đồ
        $.each(data, function (i, item) {

            var htmlhover = "<span class='title'>" + item.ServiceName + "</span> "
            htmlhover += "   <p><b>Uy tín:&nbsp;</b>" + item.ServiceRate + " sao</p> "
            if (item.Slogan != null) htmlhover += "   <p><b>Chuyên: </b>" + item.Slogan + "</p> "
            htmlhover += "   <p><b>Địa chỉ:&nbsp;</b>" + item.Address + "</p> ";

            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(item.Long, item.Lat),
                map: map,
                icon: item.Icon,
                tooltip: htmlhover,
                zIndex: 1
            });

            //Luu du lieu marker
            marker.id = item.ID;
            markers.push(marker);

            // Show tooltip khi hover 
            var tooltip = new Tooltip({ map: map }, marker);
            tooltip.bindTo("text", marker, "tooltip");


            //set size icon
            var image = new google.maps.MarkerImage('/style/images//marker.png',
            new google.maps.Size(35, 25),
            new google.maps.Point(0, 0),
            new google.maps.Point(0, 32));

            // Set icon
            //marker.setIcon(item.Icon);

            //--------------------------------
            var urlDeatail = "/dich-vu/" + UnicodeToKoDauAndGach(item.ServiceName) + "-sid" + item.ID;

            var star = item.ServiceRate;
            var str = "";
            for (var i = 0; i < star; i++) {
                str += "<label>&nbsp;</label>";
            }

            var html = "<div class='maptooltip'  zindex='6'> ";
            html += " <div class='detail-title'>" + item.ServiceName + "</div> ";
            html += "    <div class='img'><img src='" + item.Avatar + "'></div>";
            html += "   <div class='info'>";
            html += "   <p> <b>Uy tín:&nbsp;</b>" + str + "</p> ";
            if (item.Slogan != null) html += "   <p><b>Chuyên:&nbsp;</b>" + item.Slogan + "</p> ";
            if (item.ShortDescription != null) html += "    <p><b>Mô tả:&nbsp;</b>" + item.ShortDescription + "</p> ";
            html += "    <p><b>Địa chỉ:&nbsp;</b>" + item.Address + "</p> <br />";
            html += "    <p><div class='viewdetail'><a href='" + urlDeatail + "'>Xem chi tiết</a></div></p> ";
            html += "   </div>";
            html += "   </div>";

            var myOptions = {
                content: html,
                disableAutoPan: false,
                maxWidth: 0,
                pixelOffset: new google.maps.Size(-84, 20),
                zIndex: 1000,
                boxClass: "serviceInfoWindow",
                boxStyle: {
                    width: "362px",
                },
                closeBoxMargin: "10px 2px 2px 2px",
                closeBoxURL: "/style/images//close.png",
                infoBoxClearance: new google.maps.Size(1, 1),
                isHidden: false,
                alignBottom: true,
                enableEventPropagation: false
            };

            var infowindow = new InfoBox(myOptions);

            // add event click icon
            google.maps.event.addListener(marker, 'click', function () {
                for (var i = 0; i < infoWindows.length; i++) {
                    infoWindows[i].close();
                }
                marker.setIcon(item.Icon);
                marker.setZIndex = google.maps.Marker.MAX_ZINDEX + 1;

                infowindow.open(map, marker, 37, InfoBoxType.Product);
                infoWindows.push(infowindow);
                var latLng = marker.getPosition();
                map.setCenter(latLng);
                map.setZoom(16);           
                $(".tooltip").remove();
                // Build lại url
                SetUrlClick(item.ID);

            });

            // khi hover
            google.maps.event.addListener(marker, 'mouseover', function () {
                //if(item.Type != 1) { marker.setIcon("/style/images//markerhover.png") };
                tooltip.addTip();
                tooltip.getPos2(marker.getPosition());
                marker.setIcon(item.Icon);
                marker.setZIndex = google.maps.Marker.MAX_ZINDEX + 1;
            });
            google.maps.event.addListener(marker, 'mouseout', function () {
                //if(item.Type != 1) { marker.setIcon(item.Icon) };
                tooltip.removeTip();
                marker.setIcon(item.Icon);
                marker.setZIndex = 5;
            });
        })
        $(".overlaysearch").css('display', 'none');
    }
}

//Init map không có data dùng khi pageload
function InitNodata()
{           
    var pyrmont = new google.maps.LatLng(21.026182,105.851220);   
    var mapOptions = {
        zoom: 12,
        center: pyrmont,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    // Chỉ định div chứa bản đồ
    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);              
}

// Set Zoom And fitBounds
function setZoom(map, markers) {
    var boundbox = new google.maps.LatLngBounds();
    for ( var i = 0; i < markers.length; i++ )
    {
        boundbox.extend(new google.maps.LatLng(markers[i].Long, markers[i].Lat));
        if(i == 100) break;
    }
    map.setCenter(boundbox.getCenter());
    map.fitBounds(boundbox);
}

//Init item col left
function InitColLeft(data)
{    
    var html = "";
    if (data.length > 0) {
        $.each(data, function (i, item) {
            var star = item.ServiceRate;
            var str = "";
            for (var i = 0; i < star; i++) {
                str += "<label>&nbsp;</label>";
            }

            html += " <li  class='detail-item' rel='" + item.ID + "' > ";
            html += "          <div class='detail-title'>" + item.ServiceName + "</div> ";
            html += "          <img src='" + item.Avatar + "'>";
            html += "          <div style='width:170px;float:left;'><b>Uy tín:&nbsp;</b>" + str + "</div> ";
            if (item.Slogan != null) html += "          <div><b>Chuyên:&nbsp;</b>" + item.Slogan + "</div> ";
            if (item.ShortDescription != null) html += "          <div><b>Mô tả:&nbsp;</b>" + item.ShortDescription + "</div> ";
            html += "          <div><b>Địa chỉ:&nbsp;</b>" + item.Address + "</div> ";
            html += "   </li>  ";
        })
        $('.item-view').html(html);
        //Item bên trái được click, hover
        $('.detail-item').ClickLeft();
        $('.detail-item').HoverItem();
    }
    else {
        $('.item-view').html("<div style='color: red; font-weight: bold; text-align: center;padding:5px;width:280px;'>Không có dữ liệu, bạn hãy chọn dịch vụ hoặc tỉnh thành khác!</div>");
    }   
}

//Load dữ liệu ban đầu khi gửi link
function SearchService() {
    $(window).scrollTop($('.service').offset().top);
    var docHeight = $(document).height();
    $(".overlaysearch").height(docHeight);
    $(".overlaysearch").css('display', 'block');
    var keyWord = $('#txtKeyword').val();
    var serviceType = $('#ServiceType').val();
    var rate = $('#Rate').val();
    var city = $('#CityID').val();
    
    var param = GetParameterByName("service");
        
    var url = "/Services/SearchService";
    var dataparam = {
        keyWord: keyWord,
        serviceType: serviceType,
        rate: rate,
        city: city
    };
    if (city != 0 && serviceType != 0) {
        $.ajax({
            type: "POST",
            url: url,
            data: dataparam,
            success: function (resultData) {
                resultData=JSON.parse(resultData);
                InitMap(resultData);
                InitColLeft(resultData);                         
                data = resultData;
                $(".item-view").animate({ scrollTop: 0 }, 0);
            },
            complete: function () {
                $(".overlaysearch").css('display', 'none');
                // Gọi sự kiện click khi gửi link 
                TrigerClick(param);
            }
        });
        if(keyWord != '')
            window.history.pushState("string", "Title", "/dich-vu/st" + serviceType + "-sr" + rate + "-c" + city + "-service" + param + "-k" + keyWord + "");
        else
            window.history.pushState("string", "Title", "/dich-vu/st" + serviceType + "-sr" + rate + "-c" + city + "-service" + param );
    }
    else
    {
        if (city == 0 && serviceType == 0) alert("Bạn phải lựa dịch vụ, địa điểm cần tìm kiếm!")
        else if (serviceType == 0) alert("Bạn phải lựa dịch vụ cần tìm kiếm!");
        else alert("Bạn phải lựa chọn địa điểm cần tìm kiếm!");
        $(".overlaysearch").css('display', 'none');
    }    
   
};

// Gọi khi click button search
function SearchServiceClick() {    
    $(window).scrollTop($('.service').offset().top);
    var docHeight = $(document).height();
    $(".overlaysearch").height(docHeight);
    $(".overlaysearch").css('display', 'block');
    var keyWord = $('#txtKeyword').val();
    var serviceType = $('#ServiceType').val();
    var rate = $('#Rate').val();
    var city = $('#CityID').val();
    
    var url = "/Services/SearchService";
    var dataparam = {
        keyWord: keyWord,
        serviceType: serviceType,
        rate: rate,
        city: city
    };
    if (city != 0 && serviceType != 0) {
        $.ajax({
            type: "POST",
            url: url,
            data: dataparam,
            success: function (resultData) {
                resultData=JSON.parse(resultData);
                InitMap(resultData);
                InitColLeft(resultData);
                data = resultData;                
                $(".item-view").animate({ scrollTop: 0 }, 0);
            },
            complete: function () {
                $(".overlaysearch").css('display', 'none');                
                //$(".item-view").scrollTop(0);
                // Gọi sự kiện click khi gửi link               
            }
        });
        if (keyWord != '')
            window.history.pushState("string", "Title", "/dich-vu/st" + serviceType + "-sr" + rate + "-c" + city + "-service0-k" + keyWord + "");
        else
            window.history.pushState("string", "Title", "/dich-vu/st" + serviceType + "-sr" + rate + "-c" + city + "-service0");
    }
    else {
        if (city == 0 && serviceType == 0) alert("Bạn phải lựa dịch vụ, tỉnh thành cần tìm kiếm!")
        else if (serviceType == 0) alert("Bạn phải lựa dịch vụ cần tìm kiếm!");
        else alert("Bạn phải lựa chọn tỉnh thành cần tìm kiếm!");
        $(".overlaysearch").css('display', 'none');
    }  
};

//Set url
function SetUrlClick(id)
{
    var keyWord = $('#txtKeyword').val();
    var serviceType = $('#ServiceType').val();
    var rate = $('#Rate').val();
    var city = $('#CityID').val();
    if(keyWord != '')
        window.history.pushState("string", "Title", "/dich-vu/st" + serviceType + "-sr" + rate + "-c" + city + "-service" + id + "-k" + keyWord + "");
    else
        window.history.pushState("string", "Title", "/dich-vu/st" + serviceType + "-sr" + rate + "-c" + city + "-service" + id);
}
 
// Khởi tạo dữ liệu ban đầu cho bản đồ
//InitNodata();

// Sự kiện click button search
$('.buttonsearchservice').click( function(){   
    // gọi hàm tìm kiếm
    SearchServiceClick();   
});

//Sự kiện click khi gửi link
function TrigerClick(id)
{    
    if (id > 0) {
        $('.detail-item').removeClass("detail-item-current");
        $(".detail-item[rel=" + id + "]").addClass('detail-item-current');        
        for (var i = 0; i < markers.length; i++) {
            if (id == markers[i].id) {
                var marker = markers[i];
                google.maps.event.trigger(marker, "click");
                var latLng = marker.getPosition();
                map.setCenter(latLng);
                break;
            }
        }
    }
}