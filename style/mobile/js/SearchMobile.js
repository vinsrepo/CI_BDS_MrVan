function SearchProduct() {
    if (!ValidateData()) return false;
    var productType = $("#hdfCategory").val();
    var cateId = $("#hdfType").val();
    var cityCode = $("#hdfCity").val();
    var districtId = $("#hdfDistrict").val();
    var streetId = $("#hdfStreet").val();
    var wardId = $("#hdfWard").val();
    var projectId = $("#hdfProject").val();
    var areaVl = $("#hdfArea").val();
    var priceVl = $("#hdfPrice").val();
    var roomVl = $("#hdfBedRoom").val();
    var directionVl = $("#hdfDirection").val();

    var url = '/Handler/Search.ashx';
    var data = {
        productType: productType,
        cateId: cateId,
        cityCode: cityCode,
        districtId: districtId,
        streetId: streetId,
        wardId: wardId,
        projectId: projectId,
        areaVl: areaVl,
        priceVl: priceVl,
        roomVl: roomVl,
        directionVl: directionVl
    };
    $.ajax({
        type: "POST",
        url: url,
        data: data,
        success: function (url) {
            window.location.href = url;
        }

    });
}

function advancedSearch() {
    $('#advanced, #tim, #botim').toggle();
}

function ChangeCategory(typeId) {
    ChangeValue('Category', typeId);
    GetLoainhadat(typeId);
    if (typeId == 38)
        GetPrice(1);
    else
        GetPrice(2);
}
function GetLoainhadat(parentId) {

    var loainhadat = $("#hdfType").val();
    var data = "";
    var isSelected = false;
    console.log(parentId);
    if (parentId == 38) {
        if (loainhadat == -1) {
            data = "<option value=\"-1\" selected = 'selected'>Chọn loại nhà đất</option>";
        } else {
            data = "<option value=\"-1\">Chọn loại nhà đất</option>";
        }
        if (loainhadat == 324) {
            data += "<option value=\"324\" selected = 'selected'>- Bán căn hộ chung cư</option>";
            isSelected = true;
        } else {
            data += "<option value=\"324\">- Bán căn hộ chung cư</option>";
        }
        if (loainhadat == 362) {
            data += "<option value=\"362\" selected = 'selected'>- Tất cả các loại nhà bán</option>";
            isSelected = true;
        } else {
            data += "<option value=\"362\">- Tất cả các loại nhà bán</option>";
        }
        if (loainhadat == 41) {
            data += "<option value=\"41\" selected = 'selected'>+ Bán nhà riêng</option>";
            isSelected = true;
        } else {
            data += "<option value=\"41\">+ Bán nhà riêng</option>";
        }
        if (loainhadat == 325) {
            data += "<option value=\"325\" selected = 'selected'>+ Bán nhà biệt thự, liền kề</option>";
            isSelected = true;
        } else {
            data += "<option value=\"325\">+ Bán nhà biệt thự</option>";
        }
        if (loainhadat == 163) {
            data += "<option value=\"163\" selected = 'selected'>+ Bán nhà mặt phố</option>";
            isSelected = true;
        } else {
            data += "<option value=\"163\">+ Bán nhà mặt phố</option>";
        }
        if (loainhadat == 361) {
            data += "<option value=\"361\" selected = 'selected'>- Tất cả các loại đất bán</option>";
            isSelected = true;
        } else {
            data += "<option value=\"361\">- Tất cả các loại đất bán</option>";
        }
        if (loainhadat == 40) {
            data += "<option value=\"40\" selected = 'selected'>+ Bán đất nền dự án</option>";
            isSelected = true;
        } else {
            data += "<option value=\"40\">+ Bán đất nền dự án</option>";
        }
        if (loainhadat == 283) {
            data += "<option value=\"283\" selected = 'selected'>+ Bán đất</option>";
            isSelected = true;
        } else {
            data += "<option value=\"283\">+ Bán đất</option>";
        }
        if (loainhadat == 44) {
            data += "<option value=\"44\" selected = 'selected'>- Bán trang trại</option>";
            isSelected = true;
        } else {
            data += "<option value=\"44\">- Bán trang trại</option>";
        }
        if (loainhadat == 45) {
            data += "<option value=\"45\" selected = 'selected'>- Bán kho, nhà xưởng</option>";
            isSelected = true;
        } else {
            data += "<option value=\"45\">- Bán kho, nhà xưởng</option>";
        }
        if (loainhadat == 48) {
            data += "<option value=\"48\" selected = 'selected'>- Bán loại bất động sản khác</option>";
            isSelected = true;
        } else {
            data += "<option value=\"48\">- Bán loại BDS khác</option>";
        }
    } else if (parentId == 49) {
        if (loainhadat == -1) {
            data = "<option value=\"-1\" selected = 'selected'>Chọn loại nhà đất</option>";
        } else {
            data = "<option value=\"-1\">Chọn loại nhà đất</option>";
        }
        if (loainhadat == 326) {
            data += "<option value=\"326\" selected = 'selected'>Cho thuê chung cư</option>";
            isSelected = true;
        } else {
            data += "<option value=\"326\">Cho thuê chung cư</option>";
        }
        if (loainhadat == 52) {
            data += "<option value=\"52\" selected = 'selected'>Cho thuê nhà riêng</option>";
            isSelected = true;
        } else {
            data += "<option value=\"52\">Cho thuê nhà riêng</option>";
        }
        if (loainhadat == 51) {
            data += "<option value=\"51\" selected = 'selected'>Cho thuê nhà mặt phố</option>";
            isSelected = true;
        } else {
            data += "<option value=\"51\">Cho thuê nhà mặt phố</option>";
        }
        if (loainhadat == 57) {
            data += "<option value=\"57\" selected = 'selected'>Cho thuê nhà trọ</option>";
            isSelected = true;
        } else {
            data += "<option value=\"57\">Cho thuê nhà trọ</option>";
        }
        if (loainhadat == 50) {
            data += "<option value=\"50\" selected = 'selected'>Cho thuê văn phòng</option>";
            isSelected = true;
        } else {
            data += "<option value=\"50\">Cho thuê văn phòng</option>";
        }
        if (loainhadat == 55) {
            data += "<option value=\"55\" selected = 'selected'>Cho thuê cửa hàng, ki ốt</option>";
            isSelected = true;
        } else {
            data += "<option value=\"55\">Cho thuê cửa hàng, ki ốt</option>";
        }
        if (loainhadat == 53) {
            data += "<option value=\"53\" selected = 'selected' >Cho thuê kho, nhà xưởng, đất</option>";
            isSelected = true;
        } else {
            data += "<option value=\"53\">Cho thuê kho, xưởng</option>";
        }
        if (loainhadat == 59) {
            data += "<option value=\"59\" selected = 'selected'>Cho thuê BDS khác</option>";
            isSelected = true;
        } else {
            data += "<option value=\"59\">Cho thuê BDS khác</option>";
        }
    } else {
        data = "<option value=\"-1\" selected = 'selected'>Chọn loại nhà đất</option>";
    }
    $("#ddlType").html(data);
    if (isSelected = true) {
        ChangeValue("Type", loainhadat);
    }
}


function ChangeValue(Element, Value) {
    var v = $("#ddl" + Element + " option[value='" + Value + "']").text();
    if (v == '') {
        switch (Element) {
            case "Category":
                {
                    $("#span" + Element).html("Chọn giao dịch");
                    $("#hdf" + Element).val(-1);
                    break;
                }
            case "Type":
                {
                    $("#span" + Element).html("Chọn loại nhà đất");
                    $("#hdf" + Element).val(-1);
                    break;
                }
            case "City":
                {
                    $("#span" + Element).html(" Chọn Tỉnh/TP ");
                    $("#hdf" + Element).val(-1);
                    break;
                }
            case "District":
                {
                    $("#span" + Element).html(" Chọn Quận/Huyện ");
                    $("#hdf" + Element).val(-1);
                    break;
                }
            case "Ward":
                {
                    $("#span" + Element).html(" Chọn Phường/Xã ");
                    $("#hdf" + Element).val(-1);
                    break;
                }
            case "Street":
                {
                    $("#span" + Element).html(" Chọn Đường/Phố ");
                    $("#hdf" + Element).val(-1);
                    break;
                }
            case "Project":
                {
                    $("#span" + Element).html(" Chọn dự án bất động sản ");
                    $("#hdf" + Element).val(-1);
                    break;
                }
            case "Price":
                {
                    $("#span" + Element).html(" Chọn mức giá ");
                    $("#hdf" + Element).val(-1);
                    break;
                }
            case "Area":
                {
                    $("#span" + Element).html(" Chọn diện tích ");
                    $("#hdf" + Element).val(-1);
                    break;
                }
            case "BedRoom":
                {
                    $("#span" + Element).html(" Chọn số phòng ngủ ");
                    $("#hdf" + Element).val(-1);
                    break;
                }
            case "Direction":
                {
                    $("#span" + Element).html(" Chọn hướng nhà ");
                    $("#hdf" + Element).val(-1);
                    break;
                }
        }
    } else {
        $("#hdf" + Element).val(Value);
        $("#span" + Element).html($("#ddl" + Element + " option[value='" + Value + "']").text());
    }

}


//Hàm load tỉnh, thành phố
function GetCity(curentCityCode) {
    var likeReturn;
    $.ajax({
        type: "POST",
        cache: false,
        url: "/Handler/SearchMobileHandler.ashx?module=getcity",
        success: function (html) {
            likeReturn = $.parseJSON(html);
        },
        error: function (msg) {
            //alert(msg.status);
        },
        timeout: 5000,
        complete: function () {
            var html = $("#ddlCity").html();
            $.each(likeReturn, function (index, value) {
                if (curentCityCode == value.CityCode) {
                    html += '<option value="' + value.CityCode + '" selected="selected">' + value.CityName + '</option>';

                }
                else
                    html += '<option value="' + value.CityCode + '">' + value.CityName + '</option>';
            });
            $("#ddlCity").html(html);
            ChangeCityLoad(curentCityCode);
        }
    });
}

function ChangeCity(cityCode) {
    ChangeValue('City', cityCode);
    //$("#hdfCity").val(cityCode);
    //$('#hdfDistrict').val("-1");
    $("#ddlDistrict").html('');


    GetDistrict(cityCode);
    //$("#ddlWard").html('<option value=\"-1\"> Chọn Phường/Xã </option>');
    //$('#hdfWard').val("-1");
    //ChangeValue('Ward', -1);
   // $("#ddlStreet").html('<option value=\"-1\"> Chọn Đường/Phố </option>');
    //$('#hdfStreet').val("-1");
    //ChangeValue('Street', -1);
   // $("#ddlProject").html('<option value=\"-1\"> Chọn dự án bất động sản </option>');
    //$('#hdfProject').val("-1");
    //ChangeValue('Project', -1);

}
function ChangeCityLoad(cityCode) {
    ChangeValue('City', cityCode);
    GetDistrict(cityCode);
}


function GetDistrict(citycode) {
    var likeReturn;
    var quanhuyen = $("#hdfDistrict").val();
    var html = "<option value=\"-1\"> Chọn Quận/Huyện </option>";
    if ($("body").data('GetDistrict_' + citycode) != null) {
        likeReturn = $("body").data('GetDistrict_' + citycode);
        $.each(likeReturn, function (index, value) {
            html += '<option value="' + value.DistrictId + '">' + value.DistrictName + '</option>';
        });
        $("#ddlDistrict").html(html);
        ChangeDistrictLoad(quanhuyen);
    }
    else {
        $.ajax({
            type: "POST",
            cache: false,
            url: "/Handler/SearchMobileHandler.ashx?module=getdistrict",
            data: { "citycode": citycode },
            success: function (html) {
                likeReturn = $.parseJSON(html);
                $("body").data('GetDistrict_' + citycode, likeReturn);
            },
            timeout: 5000,
            complete: function () {
                $.each(likeReturn, function (index, value) {
                    if (quanhuyen == value.DistrictId) {
                        html += '<option value="' + value.DistrictId + '" selected="selected">' + value.DistrictName + '</option>';
                    } else
                        html += '<option value="' + value.DistrictId + '">' + value.DistrictName + '</option>';
                });
                $("#ddlDistrict").html(html);
                ChangeDistrictLoad(quanhuyen);
            }
        });
    }
}

function ChangeDistrict(districtId) {
    //$("#hdfDistrict").val(districtId);
    ChangeValue('District', districtId);
    //$("#hdfWard").val('-1');
    $("#ddlWard").html('');
    //ChangeValue('Ward', -1);
    $("#ddlStreet").html('');
    //$("#hdfStreet").val('-1');
    //ChangeValue('Street', -1);
    $("#ddlProject").html('');
    //$("#hdfProject").val('-1');
    //ChangeValue('Project', -1);

    GetWard(districtId);
    GetStreets(districtId);
    GetProject(districtId);
}

function ChangeDistrictLoad(districtId) {
    //$("#hdfDistrict").val(districtId);
    //$("#ddlWard").html('');
    //$("#ddlStreet").html('');
    //$("#ddlProject").html('');

    ChangeValue('District', districtId);

    GetWard(districtId);
    GetStreets(districtId);
    GetProject(districtId);
}

function GetWard(districtId) {

    var key_data = districtId;
    if (districtId == 1) key_data = 'hoankiem';

    var phuongxa = $("#hdfWard").val();
    var html = "<option value=\"-1\"> Chọn Phường/Xã </option>";
    var likeReturn;
    if ($("body").data('GetWard_' + key_data) != null) {
        likeReturn = $("body").data('GetWard_' + key_data);
        $.each(likeReturn, function (index, value) {
            if (phuongxa == value.WardId) {
                html += '<option value="' + value.WardId + '" selected="selected">' + value.WardName + '</option>';
            } else
                html += '<option value="' + value.WardId + '">' + value.WardName + '</option>';
        });
        $("#ddlWard").html(html);
        ChangeValue('Ward', phuongxa);
    }
    else {
        $.ajax({
            type: "POST",
            cache: false,
            url: "/Handler/SearchMobileHandler.ashx?module=getward",
            data: { "districtId": districtId },
            success: function (html) {
                if (html.length > 0) {
                    likeReturn = $.parseJSON(html);
                    $("body").data('GetWard_' + key_data, likeReturn);
                }
            },
            timeout: 5000,
            complete: function () {
                if (likeReturn != null) {
                    $.each(likeReturn, function (index, value) {
                        if (phuongxa == value.WardId) {
                            html += '<option value="' + value.WardId + '" selected="selected">' + value.WardName + '</option>';
                        } else
                            html += '<option value="' + value.WardId + '">' + value.WardName + '</option>';
                    });
                    $("#ddlWard").html(html);
                    ChangeValue('Ward', phuongxa);
                }
            }
        });
    }
}

function GetStreets(districtId) {

    var key_data = districtId;
    if (districtId == 1) key_data = 'hoankiem';

    var street = $("#hdfStreet").val();
    var html = "<option value=\"-1\"> Chọn Đường/Phố </option>";
    var likeReturn;
    if ($("body").data('GetStreets_' + key_data) != null) {
        likeReturn = $("body").data('GetStreets_' + key_data);
        $.each(likeReturn, function (index, value) {
            if (street == value.StreetId) {
                html += '<option value="' + value.StreetId + '" selected="selected">' + value.StreetName + '</option>';
            } else
                html += '<option value="' + value.StreetId + '">' + value.StreetName + '</option>';
        });
        $("#ddlStreet").html(html);
        ChangeValue('Street', street);
    }
    else {
        $.ajax({
            type: "POST",
            cache: false,
            url: "/Handler/SearchMobileHandler.ashx?module=getstreet",
            data: { "districtId": districtId },
            success: function (html) {
                if (html.length > 0) {
                    likeReturn = $.parseJSON(html);
                    $("body").data('GetStreets_' + key_data, likeReturn);
                }
            },
            timeout: 5000,
            complete: function () {
                if (likeReturn != null) {
                    $.each(likeReturn, function (index, value) {
                        if (street == value.StreetId) {
                            html += '<option value="' + value.StreetId + '" selected="selected">' + value.StreetName + '</option>';
                        } else
                            html += '<option value="' + value.StreetId + '">' + value.StreetName + '</option>';
                    });
                    $("#ddlStreet").html(html);
                    ChangeValue('Street', street);
                }
            }
        });
    }
}

function GetProject(districtId) {

    var key_data = districtId;
    if (districtId == 1) key_data = 'hoankiem';

    var duan = $("#hdfProject").val();
    var html = "<option value=\"-1\"> Chọn dự án bất động sản </option>";
    var likeReturn;
    if ($("body").data('GetProject_' + key_data) != null) {
        likeReturn = $("body").data('GetProject_' + key_data);
        $.each(likeReturn, function (index, value) {
            if (duan == value.ProjectId) {
                html += '<option value="' + value.ProjectId + '" selected="selected">' + value.ShortName + '</option>';
            } else
                html += '<option value="' + value.ProjectId + '">' + value.ShortName + '</option>';
            //html += '<option value="' + value.ProjectId + '">' + value.ProjectName + '</option>';
        });
        $("#ddlProject").html(html);
        ChangeValue('Project', duan);
    }
    else {
        $.ajax({
            type: "POST",
            cache: false,
            url: "/Handler/SearchMobileHandler.ashx?module=getproject",
            data: { "districtId": districtId },
            success: function (html) {
                if (html.length > 0) {
                    likeReturn = $.parseJSON(html);
                    $("body").data('GetProject_' + key_data, likeReturn);
                }
            },
            timeout: 5000,
            complete: function () {
                if (likeReturn != null) {
                    $.each(likeReturn, function (index, value) {
                        if (duan == value.ProjectId) {
                            html += '<option value="' + value.ProjectId + '" selected="selected">' + value.ShortName + '</option>';
                        } else
                            html += '<option value="' + value.ProjectId + '">' + value.ShortName + '</option>';
                    });
                    $("#ddlProject").html(html);
                    ChangeValue('Project', duan);
                }
            }
        });
    }
}

function GetDirection(idx) {
    var curentDirection = $("#hdfDirection").val();
    var html = "<option value=\"-1\"> Chọn hướng nhà </option>";
    if (idx > 0) {
        var likeReturn;
        $.ajax({
            type: "POST",
            cache: false,
            url: "/Handler/SearchMobileHandler.ashx?module=getdirection",
            success: function (html) {
                likeReturn = $.parseJSON(html);
                $("body").data('GetDirection_' + idx, likeReturn);
            },
            timeout: 5000,
            complete: function () {
                idx = idx - 1;
                if (idx > 1)
                    idx = 1;

                if (likeReturn != null) {
                    var retVal = likeReturn[idx];
                    $.each(retVal, function (index, value) {
                        if (curentDirection == value.Name) {
                            html += '<option value="' + value.Name + '" selected="selected">' + value.Value + '</option>';
                        } else
                            html += '<option value="' + value.Name + '">' + value.Value + '</option>';
                    });
                }
                $("#ddlDirection").html(html);
                ChangeValue('Direction', curentDirection);
            }
        });
    }
}

function GetArea(idx) {
    var curentArea = $("#hdfArea").val();
    var html = "<option value=\"-1\"> Chọn diện tích </option>";
    if (idx > 0) {
        var likeReturn;
        idx = idx - 1;
        if (idx > 1)
            idx = 1;
        if ($("body").data('GetArea_' + idx) != null) {
            likeReturn = $("body").data('GetArea_' + idx);
            $.each(likeReturn, function (index, value) {
                html += '<option value="' + value.Name + '">' + value.Value + '</option>';
            });
            $("#ddlArea").html(html);
            ChangeValue('Area', curentArea);
        }
        else {
            $.ajax({
                type: "POST",
                cache: false,
                url: "/Handler/SearchMobileHandler.ashx?module=getarea",
                success: function (html) {
                    likeReturn = $.parseJSON(html)[idx];
                    $("body").data('GetArea_' + idx, likeReturn);
                },
                timeout: 5000,
                complete: function () {
                    if (likeReturn != null) {
                        $.each(likeReturn, function (index, value) {
                            if (curentArea == value.Name) {
                                html += '<option value="' + value.Name + '" selected="selected">' + value.Value + '</option>';
                            }
                            else
                                html += '<option value="' + value.Name + '">' + value.Value + '</option>';
                        });
                    }
                    $("#ddlArea").html(html);
                    ChangeValue('Area', curentArea);
                }
            });
        }
    }
}

function GetPrice(idx) {

    var curentPrice = $("#hdfPrice").val();

    var html = "<option value=\"-1\"> Chọn mức giá </option>";
    if (idx > 0) {
        var likeReturn;
        idx = idx - 1;
        if (idx > 1)
            idx = 1;
        if ($("body").data('GetPrice_' + idx) != null) {
            likeReturn = $("body").data('GetPrice_' + idx);
            $.each(likeReturn, function (index, value) {
                html += '<option value="' + value.Name + '">' + value.Value + '</option>';
            });
            $("#ddlPrice").html(html);
            ChangeValue('Price', curentPrice);
        }
        else {
            $.ajax({
                type: "POST",
                cache: false,
                url: "/Handler/SearchMobileHandler.ashx?module=getprice",
                success: function (html) {
                    likeReturn = $.parseJSON(html)[idx];
                    $("body").data('GetPrice_' + idx, likeReturn);
                },
                timeout: 5000,
                complete: function () {

                    if (likeReturn != null) {
                        $.each(likeReturn, function (index, value) {
                            if (curentPrice == value.Name) {
                                html += '<option value="' + value.Name + '" selected="selected">' + value.Value + '</option>';
                            } else
                                html += '<option value="' + value.Name + '">' + value.Value + '</option>';
                        });
                    }
                    $("#ddlPrice").html(html);
                    ChangeValue('Price', curentPrice);
                }
            });
        }
    }
}

function GetRoom(idx) {
    var curentRoom = $("#hdfBedRoom").val();
    var html = "<option value=\"-1\"> Chọn số phòng ngủ </option>";
    if (idx > 0) {
        var likeReturn;
        idx = idx - 1;
        if (idx > 1)
            idx = 1;
        if ($("body").data('GetRoom_' + idx) != null) {
            likeReturn = $("body").data('GetRoom_' + idx);
            $.each(likeReturn, function (index, value) {
                html += '<option value="' + value.Name + '">' + value.Value + '</option>';
            });
            $("#ddlBedRoom").html(html);
            ChangeValue('Room', curentRoom);
        }
        else {
            $.ajax({
                type: "POST",
                cache: false,
                url: "/Handler/SearchMobileHandler.ashx?module=getroom",
                success: function (html) {
                    likeReturn = $.parseJSON(html)[idx];
                    $("body").data('GetRoom_' + idx, likeReturn);
                },
                timeout: 5000,
                complete: function () {
                    if (likeReturn != null) {
                        $.each(likeReturn, function (index, value) {
                            if (curentRoom == value.Name) {
                                html += '<option value="' + value.Name + '" selected="selected">' + value.Value + '</option>';
                            } else
                                html += '<option value="' + value.Name + '">' + value.Value + '</option>';
                        });
                    }
                    $("#ddlBedRoom").html(html);
                    ChangeValue('Room', curentRoom);
                }
            });
        }
    }
}
function ValidateData() {
    //if ($("#ddlCategory").val() == -1) {
    //    alert("Bạn phải chọn Loại giao dịch !");
    //    document.getElementById('ddlCategory').focus();
    //    return false;
    //}
    return true;
}

function ShowBoxSearch() {
    $('.wr_boxSearch').toggle();
    //$('#advanced, #tim, #botim').toggle();
}


/*gọi ý tìm kiếm star*/


LocationControl = function (opts) {

};


LocationControl.prototype.ChangeLocation = function (opt) {
    if (opt.city != null) {
        $('#ddlCity').val(opt.city);
        ChangeValue('City', opt.city);


        if (opt.distr != null) {
            $('#hdfDistrict').val(opt.distr);
        }

        if (opt.wardid != null) {
            $('#hdfWard').val(opt.wardid);
        }

        if (opt.streetid != null) {
            $('#hdfStreet').val(opt.streetid);
        }

        if (opt.projid != null) {
            $('#hdfProject').val(opt.projid);
        }

        if (opt.city != -1) {
            LoadDistrict(opt.city);
        }
    }
}


$(function () {

    var cnt = 0;
    $(".wr_textsearch").keyup(function (event) {
        if (event.keyCode == 13 && cnt > 0) {
            cnt = 0;
            $("#btnSearch").click();
        }
        else if (event.keyCode == 13) {
            cnt++;
        }
    });

    var toolTipPosition = window.location.pathname == '/' ? 'right' : 'left';


    $.ui.autocomplete.prototype._renderItem = function (ul, item) {
        var term = this.term.split(' ');
        var t = item.label.split(' ');
        var label = '';

        var reg = new RegExp("(~|!|@|#|\\$|%|\\^|&|\\*|\\(|\\)|_|\\+|\\{|\\}|\\||\"|:|\\?|>|<|,|\\.|\\/|;|'|\\\|[|]|=|-)", "gi");

        for (var j = 0; j < t.length; j++) {

            if (label.length > 0)
                label += ' ';

            var word = t[j];

            for (var i = 0; i < term.length; i++) {

                if (UnicodeToKoDau(term[i].replace(reg, "")).toLowerCase() == UnicodeToKoDau(word.replace(reg, "")).toLowerCase()) {
                    word = '<b>' + word + '</b>';
                    break;
                }
            }

            label += word;
        }

        if ($('#ddlCategory').val() == 38) {
            return $("<li></li>").data("item.autocomplete", item).append("<a>" + label + " <font style='color:#319c00;font-size:11px;font-weight:700'>(" + item.id.ts + " tin)</font>" + "</a>").appendTo(ul);
        } else {
            return $("<li></li>").data("item.autocomplete", item).append("<a>" + label + " <font style='color:#319c00;font-size:11px;font-weight:700'>(" + item.id.tr + " tin)</font>" + "</a>").appendTo(ul);
        }
    };

    ___isIE = /MSIE (\d+\.\d+);/.test(navigator.userAgent);
    if (___isIE) {

        var defaultText = $('#txtAutoComplete').attr('placeholder');
        $('#txtAutoComplete').css('color', '#777');
        $('#txtAutoComplete').css('height', '19px');
        $('#txtAutoComplete').css('padding-top', '2px');
        $('#txtAutoComplete').css('padding-bottom', '2px');
        $('#txtAutoComplete').css('line-height', '18px');

        if ($('#txtAutoComplete').val().length == 0)
            $('#txtAutoComplete').val(defaultText);

        $('#txtAutoComplete').blur(function () {
            if ($('#txtAutoComplete').val().length == 0)
                $('#txtAutoComplete').val(defaultText);
        });

        $('#txtAutoComplete').focus(function () {

            if ($('#txtAutoComplete').val() == defaultText)
                $('#txtAutoComplete').val('');
        });

    }

    $('#txtAutoComplete').keydown(function (evt) {
        //console.log($('#ddlCategory').val())
        //if ($('#ddlCategory').val() == -1) {
        //    $('#ddlCategory, #hdfCategory').val(38);
        //    GetLoainhadat(38);
        //}
        return evt.keyCode != 13;
    });

    $('#txtAutoComplete').autocomplete({
        source: function (request, response) {
            var term = UnicodeToKoDau(request.term);

            var cache = null;
            if (JSON != undefined && localStorage != undefined) {
                cache = JSON.parse(localStorage.getItem('suggestion-cache'));
            }

            if (cache == null) {
                cache = [{}];
            }

            var data = cache[term];

            if (data != null) {
                response(data);
                return;
            } else {
                var urlRequest = '';
                if ($('#ddlCategory').val() == 38) {
                    urlRequest = 'http://s1.dothi.net/';
                } else {
                    urlRequest = 'http://s2.dothi.net/';
                }

                cnt = 0;
                $.ajax({
                    url: urlRequest + term,
                    success: function (data) {
                        cache[term] = data;

                        if (localStorage != undefined) {
                            localStorage.setItem('suggestion-cache', JSON.stringify(cache));
                        }

                        response(data);
                    }
                });
            }

        },
        minLength: 2,
        select: function (event, ui) {
            var result = ui.item.id;
            var urlRequest = '';
            if ($('#ddlCategory').val() == 38) {
                urlRequest = 'http://s1.dothi.net/';
            } else {
                urlRequest = 'http://s2.dothi.net/';
            }
            LocationControl.prototype.ChangeLocation(result);

            $.post(urlRequest + result.id);
        }
    }).on('click', function () {
        if (document.hasFocus()) {
            $('ul.ui-autocomplete').hide();
        }
    });
});

var uniChars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTVWXYZàáảãạâầấẩẫậăằắẳẵặèéẻẽẹêềếểễệđìíỉĩịòóỏõọôồốổỗộơờớởỡợùúủũụưừứửữựỳýỷỹỵÀÁẢÃẠÂẦẤẨẪẬĂẰẮẲẴẶÈÉẺẼẸÊỀẾỂỄỆĐÌÍỈĨỊÒÓỎÕỌÔỒỐỔỖỘƠỜỚỞỠỢÙÚỦŨỤƯỪỨỬỮỰỲÝỶỸỴÂĂĐÔƠƯ1234567890~!@#$%^&*()_+=-{}][|\":;'\\/.,<>? \n\r\t";
var KoDauChars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTVWXYZaaaaaaaaaaaaaaaaaeeeeeeeeeeediiiiiooooooooooooooooouuuuuuuuuuuyyyyyAAAAAAAAAAAAAAAAAEEEEEEEEEEEDIIIOOOOOOOOOOOOOOOOOOOUUUUUUUUUUUYYYYYAADOOU1234567890~!@#$%^&*()_+=-{}][|\":;'\\/.,<>? \n\r\t";
var Alphabe = "qwertyuioplkjhgfdsazxcvbnm0123456789QWERTYUIOPASDFGHJKLZXCVBNM";

function UnicodeToKoDau(s) {
    var retVal = '';
    if (s == null)
        return retVal;
    var pos;
    var c = 'a';
    for (var i = 0; i < s.length; i++) {
        if (c == ' ' && s[i] == ' ')
            continue;
        c = s[i];
        pos = uniChars.indexOf(c);
        if (pos >= 0)
            retVal += KoDauChars[pos];
    }
    return retVal;
}

function LoadDistrict(citycode) {
    var quanhuyen = $("#hdfDistrict").val();
    $("#ddlDistrict").find("option:gt(0).").remove();
    var likeReturn;
    var html = $("#ddlDistrict").html();
    if ($("body").data('GetDistrict_' + citycode) != null) {
        likeReturn = $("body").data('GetDistrict_' + citycode);
        $.each(likeReturn, function (index, value) {
            if (quanhuyen == value.DistrictId) {
                html += '<option value="' + value.DistrictId + '" selected="selected">' + value.DistrictName + '</option>';
                AutoChangeDistrict(value.DistrictId);
            } else
                html += '<option value="' + value.DistrictId + '">' + value.DistrictName + '</option>';
        });
        $("#ddlDistrict").html(html);
        ChangeValue('District', quanhuyen);
    }
    else {
        $.ajax({
            type: "POST",
            cache: false,
            url: "/Handler/SearchMobileHandler.ashx?module=getdistrict",
            data: { "citycode": citycode },
            success: function (html) {
                likeReturn = $.parseJSON(html);
                $("body").data('GetDistrict_' + citycode, likeReturn);
            },
            timeout: 5000,
            complete: function () {
                var districtId = 0;
                $.each(likeReturn, function (index, value) {
                    if (quanhuyen == value.DistrictId) {
                        html += '<option value="' + value.DistrictId + '" selected="selected">' + value.DistrictName + '</option>';
                        AutoChangeDistrict(value.DistrictId);

                    } else
                        html += '<option value="' + value.DistrictId + '">' + value.DistrictName + '</option>';
                });
                $("#ddlDistrict").html(html);
                ChangeValue('District', quanhuyen);
            }
        });
    }
}
function AutoChangeDistrict(districtId) {
    if (districtId >= 0) {
        GetWard(districtId);
        GetStreets(districtId);
        GetProject(districtId);
//        ChangeValue('Area', -1);
        $('#hdfArea').val(-1);
//        ChangeValue('Price', -1);
        $('#hdfPrice').val(-1);
 //       ChangeValue('BedRoom', -1);
        $('#hdfBedRoom').val(-1);
 //       ChangeValue('Direction', -1);
        $('#hdfDirection').val(-1);
    }
}
//function ChangeValue(Element, Id) {
//    $("#" + Element).val(Id);
//}
function ClearText() {
    $('#txtAutoComplete').val('');
    $("#cleartext").hide();
}
$("#txtAutoComplete").keyup(function () {
    var str = $(this).val();
    if (str.length > 0) {
        $("#cleartext").show();
    } else {
        $("#cleartext").hide();
    }
});
/*gọi ý tìm kiếm end*/

/* Reset Box Tìm Kiếm */

function ResetBoxSearch() {

    $('#bds-ban').trigger("click");

    $("#ddlCategory").val(pType);
    $("#hdfCategory").val(pType);

    $('#hdfType').val('-1');
    ChangeCategory(pType);

    $('#hdfPrice').val('-1');
    $('#ddlPrice').val('-1');
    $('#spanPrice').text(' Chọn mức giá ');

    $("#ddlCity").val(-1);
    ChangeCity(-1);

    $("#ddlArea").val(-1);
    $("#hdfArea").val(-1);
    $('#spanArea').text(' Chọn diện tích ');

    $("#ddlBedRoom").val(-1);
    $("#hdfBedRoom").val(-1);
    $('#spanBedRoom').text(' Chọn số phòng ngủ ');

    $("#ddlDirection").val(-1);
    $("#hdfDirection").val(-1);
    $('#spanDirection').text(' Chọn hướng nhà ');
    ClearText();
}

$(document).ready(function () {
    ChangeCategory(38);
})

$('#bds-ban').on('click', function () {
    $('#hdfType').val('-1');
    $('#hdfPrice').val('-1');
    ChangeCategory(38);
    $('#bds-ban .sales').addClass('active');
    $('#bds-thue .rent').removeClass('active');
})
$('#bds-thue').on('click', function () {
    $('#hdfType').val('-1');
    $('#hdfPrice').val('-1');
    ChangeCategory(49);
    $('#bds-ban .sales').removeClass('active');
    $('#bds-thue .rent').addClass('active');
})


$('#typeSell').on('click', function () {
    ChangeLoaiTin(38);
})
$('#typeRent').on('click', function () {
    ChangeLoaiTin(49);
})

//$('#bds-ban').trigger("click");