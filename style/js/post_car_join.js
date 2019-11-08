Tooltip.init([

{
id:"make_id",
tripTemplate:RS_JS_Make_Notice,
refPoint:"make_id",
validArray:[
{t:ValidType.Require,e:RS_JS_Make_Requirement}
],
getValue:function ()
{
	return document.getElementById(this.EL.id).value;
},
tripEvent:["onclick","onfocus"],
validEvent:["onblur"]
},
{
id:"model_id",
tripTemplate:RS_JS_Model_Notice,
refPoint:"model_id",
validArray:[
{t:ValidType.Require,e:RS_JS_Model_Requirement}
],
getValue:function ()
{
	return document.getElementById(this.EL.id).value;
},
tripEvent:["onclick","onfocus"],
validEvent:["onblur"]
},
{
id:"submodel",
tripTemplate:RS_JS_SubModel_Notice,
refPoint:"submodel",
validArray:[

],
getValue:function ()
{
	return document.getElementById(this.EL.id).value;
},
tripEvent:["onclick","onfocus"],
validEvent:["onblur"]
},
{
id:"car_year",
tripTemplate:RS_JS_CarYear_Notice,
refPoint:"car_year",
validArray:[
{t:ValidType.Require,e:RS_JS_CarYear_Requirement}
],
getValue:function ()
{
	return document.getElementById(this.EL.id).value;
},
tripEvent:["onclick","onfocus"],
validEvent:["onblur"]
},
{
id:"from_type",
tripTemplate:RS_JS_From_Notice,
refPoint:"from_type",
validArray:[
{t:ValidType.Require,e:RS_JS_From_Requirement}
],
getValue:function ()
{
	return document.getElementById(this.EL.id).value;
},
tripEvent:["onclick","onfocus"],
validEvent:["onblur"]
},
{
id:"car_status",
tripTemplate:RS_JS_CarStatus_Notice,
refPoint:"car_status",
validArray:[
{t:ValidType.Require,e:RS_JS_CarStatus_Requirement}
],
getValue:function ()
{
	return document.getElementById(this.EL.id).value;
},
tripEvent:["onclick","onfocus"],
validEvent:["onblur"]
},
{
id:"mileage",
tripTemplate:RS_JS_Mileage_Notice,
refPoint:"mileage",
validArray:[

{t:ValidType.Regex,r:/^\d+$/,v:true,e:RS_JS_Number_Only}
],
getValue:function ()
{
	return document.getElementById(this.EL.id).value;
},
tripEvent:["onclick","onfocus"],
validEvent:["onblur"]
},
{
id:"body_style_id",
tripTemplate:RS_JS_BodyStyle_Notice,
refPoint:"body_style_id",
validArray:[
{t:ValidType.Require,e:RS_JS_BodyStyle_Requirement}
],
getValue:function ()
{
	return document.getElementById(this.EL.id).value;
},
tripEvent:["onclick","onfocus"],
validEvent:["onblur"]
},
{
id:"price",
tripTemplate:RS_JS_Price_Notice,
refPoint:"money_type2",
validArray:[
{t:ValidType.Require,e:RS_JS_Price_Requirement},
{t:ValidType.Regex,r:/^\d+$/,v:true,e:RS_JS_Number_Only},
{t:ValidType.Ajax,r:function (Sv,context){
c_price=0;
if($("#VND").attr("checked"))
{ 
	c_price=$("#price").val()*1000000;
}else
{
	c_price=$("#price").val()*17800;
}
if(c_price<10000000 ) return true;
},e:RS_JS_TooSmallPrice},
{t:ValidType.Ajax,r:function (Sv,context){
c_price=0;
if($("#VND").attr("checked"))
{ 
	c_price=$("#price").val()*1000000;
}else
{
	c_price=$("#price").val()*17800;
}
if(c_price>20000000000 ) return true;
},e:RS_JS_TooBigPrice}
],
getValue:function ()
{
	return document.getElementById(this.EL.id).value;
},
tripEvent:["onclick","onfocus"],
validEvent:["onblur"]
},

{
id:"exterior_color_id",
tripTemplate:RS_JS_ExteriorColor_Notice,
refPoint:"exterior_color_id",
validArray:[

],
getValue:function ()
{
	return document.getElementById(this.EL.id).value;
},
tripEvent:["onclick","onfocus"],
validEvent:["onblur"]
},
{
id:"interior_color_id",
tripTemplate:RS_JS_InteriorColor_Notice,
refPoint:"interior_color_id",
validArray:[

],
getValue:function ()
{
	return document.getElementById(this.EL.id).value;
},
tripEvent:["onclick","onfocus"],
validEvent:["onblur"]
},
{
id:"num_doors",
tripTemplate:RS_JS_NumDoors_Notice,
refPoint:"num_doors",
validArray:[
{t:ValidType.Regex,r:/^\d+$/,v:true,e:RS_JS_Number_Only}
],
getValue:function ()
{
	return document.getElementById(this.EL.id).value;
},
tripEvent:["onclick","onfocus"],
validEvent:["onblur"]
},
{
id:"num_seats",
tripTemplate:RS_JS_NumSeats_Notice,
refPoint:"num_seats",
validArray:[
{t:ValidType.Regex,r:/^\d+$/,v:true,e:RS_JS_Number_Only}
],
getValue:function ()
{
	return document.getElementById(this.EL.id).value;
},
tripEvent:["onclick","onfocus"],
validEvent:["onblur"]
},
{
id:"transmission_id",
tripTemplate:RS_JS_Transmission_Notice,
refPoint:"transmission_id",
validArray:[

],
getValue:function ()
{
	return document.getElementById(this.EL.id).value;
},
tripEvent:["onclick","onfocus"],
validEvent:["onblur"]
},
{
id:"drivetrain",
tripTemplate:RS_JS_Drivetrain_Notice,
refPoint:"drivetrain",
validArray:[

],
getValue:function ()
{
	return document.getElementById(this.EL.id).value;
},
tripEvent:["onclick","onfocus"],
validEvent:["onblur"]
},
{
id:"fueltype_id",
tripTemplate:RS_JS_FuelType_Notice,
refPoint:"fueltype_id",
validArray:[

],
getValue:function ()
{
	return document.getElementById(this.EL.id).value;
},
tripEvent:["onclick","onfocus"],
validEvent:["onblur"]
},
{
id:"fuel_system",
tripTemplate:RS_JS_FuelSystem_Notice,
refPoint:"fuel_system",
validArray:[

],
getValue:function ()
{
	return document.getElementById(this.EL.id).value;
},
tripEvent:["onclick","onfocus"],
validEvent:["onblur"]
},
{
id:"fuel_consumer",
tripTemplate:RS_JS_FuelConsumer_Notice,
refPoint:"fuel_consumer_tmp",
validArray:[
{t:ValidType.Regex,r:/^\d+$/,v:true,e:RS_JS_Number_Only}
],
getValue:function ()
{
	return document.getElementById(this.EL.id).value;
},
tripEvent:["onclick","onfocus"],
validEvent:["onblur"]
},
{
id:"descriptions",
tripTemplate:RS_JS_Descriptions_Notice,
refPoint:"descriptions",
validArray:[
{t:ValidType.Require,e:RS_JS_Description_Requirement},
{t:ValidType.MinRang,r:60,e:RS_JS_Description_MaxLength},
{t:ValidType.MaxRang,r:600,e:RS_JS_Description_MaxLength}, 
{t:ValidType.Ajax,r:function (Sv,context){
str=$get("descriptions").value;
str=ReplaceAll(str," ","");
str=ReplaceAll(str,",","");
str=ReplaceAll(str,".","");
str=ReplaceAll(str,"-","");
str=ReplaceAll(str,"_","");
str=ReplaceAll(str,"\n","");
checkPhoneReg=/^(.*)\d{9}(.*)$/;

if (checkPhoneReg.test(str)) return true;
//if($get("descriptions").value<100000) return true;			
	
},e:JS_NoInputPhone},
{t:ValidType.Regex,r:/<\/?[^>]+(>|$)/g,v:false,e:RS_JS_INVALID_HTML_Error}
],
getValue:function ()
{
	return document.getElementById(this.EL.id).value;
},
tripEvent:["onclick","onfocus"],
validEvent:["onblur"]
},
{
id:"chair_stuff",
tripTemplate:RS_JS_ChairStuff_Notice,
refPoint:"chair_stuff",
validArray:[
{
}
],
getValue:function ()
{
	return document.getElementById(this.EL.id).value;
},
tripEvent:["onclick","onfocus"],
validEvent:["onblur"]
},
{
id:"audio_video",
tripTemplate:RS_JS_AudioVideo_Notice,
refPoint:"audio_video",
validArray:[
{
}
],
getValue:function ()
{
	return document.getElementById(this.EL.id).value;
},
tripEvent:["onclick","onfocus"],
validEvent:["onblur"]
},
{
id:"other_equipment",
tripTemplate:RS_JS_OtherEquipment_Notice,
refPoint:"other_equipment",
validArray:[
{
}
],
getValue:function ()
{
	return document.getElementById(this.EL.id).value;
},
tripEvent:["onclick","onfocus"],
validEvent:["onblur"]
},
{
id:"length_width_heigh",
tripTemplate:RS_JS_LengthWidthHeigh_Notice,
refPoint:"length_width_heigh",
validArray:[
{t:ValidType.Regex,r:/\b[0-9]{4,5}x[0-9]{4}x[0-9]{4}\b/,v:true,e:RS_JS_INVALID_FORMAT}
],
getValue:function ()
{
	return document.getElementById(this.EL.id).value;
},
tripEvent:["onclick","onfocus"],
validEvent:["onblur"]
},
{
id:"basic_length",
tripTemplate:RS_JS_BasicLength_Notice,
refPoint:"basic_length",
validArray:[
{t:ValidType.Regex,r:/^\d+$/,v:true,e:RS_JS_NUMBER_ONLY}
],
getValue:function ()
{
	return document.getElementById(this.EL.id).value;
},
tripEvent:["onclick","onfocus"],
validEvent:["onblur"]
},
{
id:"basic_width",
tripTemplate:RS_JS_BasicWidth_Notice,
refPoint:"basic_width",
validArray:[
{t:ValidType.Regex,r:/\b[0-9]{4,5}\/[0-9]{4}\b/,v:true,e:RS_JS_INVALID_FORMAT}
],
getValue:function ()
{
	return document.getElementById(this.EL.id).value;
},
tripEvent:["onclick","onfocus"],
validEvent:["onblur"]
},
{
id:"weight",
tripTemplate:RS_JS_Weight_Notice,
refPoint:"weight",
validArray:[
{t:ValidType.Regex,r:/^\d+$/,v:true,e:RS_JS_NUMBER_ONLY}
],
getValue:function ()
{
	return document.getElementById(this.EL.id).value;
},
tripEvent:["onclick","onfocus"],
validEvent:["onblur"]
},
{
id:"fuel_capacity",
tripTemplate:RS_JS_FuelCapacity_Notice,
refPoint:"fuel_capacity",
validArray:[
{t:ValidType.Regex,r:/^\d+$/,v:true,e:RS_JS_NUMBER_ONLY}
],
getValue:function ()
{
	return document.getElementById(this.EL.id).value;
},
tripEvent:["onclick","onfocus"],
validEvent:["onblur"]
},
{
id:"engine",
tripTemplate:RS_JS_Engine_Notice,
refPoint:"engine",
validArray:[
{
}
],
getValue:function ()
{
	return document.getElementById(this.EL.id).value;
},
tripEvent:["onclick","onfocus"],
validEvent:["onblur"]
},
{
id:"engine_type",
tripTemplate:RS_JS_EngineType_Notice,
refPoint:"engine_type",
validArray:[
{
}
],
getValue:function ()
{
	return document.getElementById(this.EL.id).value;
},
tripEvent:["onclick","onfocus"],
validEvent:["onblur"]
},
{
id:"cylinder_vol",
tripTemplate:RS_JS_CylinderVol_Notice,
refPoint:"cylinder_vol",
validArray:[
{t:ValidType.Regex,r:/^\d+$/,v:true,e:RS_JS_NUMBER_ONLY}
],
getValue:function ()
{
	return document.getElementById(this.EL.id).value;
},
tripEvent:["onclick","onfocus"],
validEvent:["onblur"]
},
{
id:"brake_des",
tripTemplate:RS_JS_BrakeDes_Notice,
refPoint:"brake_des",
validArray:[
{
}
],
getValue:function ()
{
	return document.getElementById(this.EL.id).value;
},
tripEvent:["onclick","onfocus"],
validEvent:["onblur"]
},
{
id:"absorber",
tripTemplate:RS_JS_Absorber_Notice,
refPoint:"absorber",
validArray:[
{
}
],
getValue:function ()
{
	return document.getElementById(this.EL.id).value;
},
tripEvent:["onclick","onfocus"],
validEvent:["onblur"]
},
{
id:"tyre",
tripTemplate:RS_JS_Tyre_Notice,
refPoint:"tyre",
validArray:[
{
}
],
getValue:function ()
{
	return document.getElementById(this.EL.id).value;
},
tripEvent:["onclick","onfocus"],
validEvent:["onblur"]
},
{
id:"rim",
tripTemplate:RS_JS_Rim_Notice,
refPoint:"rim",
validArray:[
{
}
],
getValue:function ()
{
	return document.getElementById(this.EL.id).value;
},
tripEvent:["onclick","onfocus"],
validEvent:["onblur"]
},
{
id:"other_tech_para",
tripTemplate:RS_JS_OtherTechPara_Notice,
refPoint:"other_tech_para",
validArray:[
{
}
],
getValue:function ()
{
	return document.getElementById(this.EL.id).value;
},
tripEvent:["onclick","onfocus"],
validEvent:["onblur"]
}
]);

function OneCharToUpper()
{
    var One = this.value.trim().charAt(0).toString().toLocaleUpperCase();
    var slice = "";
    if(this.value.trim().length>1)
         slice = this.value.slice(1);
    this.value = One+slice;
}
function ReplaceAll(Source,stringToFind,stringToReplace){

  var temp = Source;

    var index = temp.indexOf(stringToFind);

        while(index != -1){

            temp = temp.replace(stringToFind,stringToReplace);

            index = temp.indexOf(stringToFind);

        }

        return temp;

}