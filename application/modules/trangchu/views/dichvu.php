 <link href="/style/css/select2.min.css" rel="stylesheet" />
<script src="/style/js/select2.full.min.js"></script>
<script src="/style/js/PostNews.min.js?v=120151126" type="text/javascript"></script>
<style>
.pjs-content .select2{
    margin-top: 4px!important;
    margin-left: 5px!important;
    width: 161px!important;
}
</style>
<script>
function __doPostBack(){
    link_cat='';link_dist='';link_city='';
    if($('#CatPJ').val()!=''){
        link_cat=UnicodeToKoDau($('#CatPJ').val().toLowerCase());
    }
    if($('#ddlDistrict2').val()!=''){
        link_dist='-'+UnicodeToKoDau($('#ddlDistrict2').val().toLowerCase());
    }
    if($('#ddlCity2').val()!=''){
        if($('#ddlDistrict2').val()!=''){
           link_city='-'+UnicodeToKoDau($('#ddlCity2').find('option:selected').attr('data-key').toLowerCase());
        }else{
           link_city='-'+UnicodeToKoDau($('#ddlCity2').val().toLowerCase());
        } 
    }
    link='/du-an/'+link_cat+link_dist+link_city;
    window.location.href=link.replace(new RegExp(' ', 'g'), '-');
}

</script>
        <div class="wr_page">
          
    <div class="index-page"> 
        <div class="content">
             
            <!-- Content Left -->
            <div class="content-left">   
        <?  
        $datacats=Modules::run('trangchu/getList','baiviet',4000,0,'SapXep asc, NgayGui asc','IDBaiViet',array('MenuCha'=>455));
        $showcat='';
        foreach($datacats as $submenu1){
                $showcat.= '
                <li>
                                <h3>
                                    <a title="'.$submenu1['TieuDe'].'" href="/du-an/'.stripUnicode($submenu1['TieuDe']).'">'.$submenu1['TieuDe'].'</a>
                                </h3>
                </li> ';
                if($cattype==$submenu1['TieuDe']){
                    $select_ed1=" selected='selected'";
                }else{
                    $select_ed1='';
                }
                $showOP.='
                <option value="'.$submenu1['TieuDe'].'" '.$select_ed1.'>'.$submenu1['TieuDe'].'</option> ';
            }
        $TinhThanh='';
$arr = file_get_contents(APPPATH . 'includes/DSTinhThanhKey.txt');
foreach(json_decode($arr,true) as $key=>$val){
    $select_ed=" ".set_select('DoiXe', $val['Text']);
                                        if($cityCode==$val['Id']){
                                            $select_ed=" selected='selected'";$xemtinban['DoiXe']=$val['Text'];
                                        }
    $TinhThanh.= '
    <option value="'.($val['Id']=='SG'?'TP HCM':$val['Text']).'" data-key="'.$val['Id'].'" '.$select_ed.'>'.$val['Text'].'</option>    ';
}

                       
        $noidung=str_replace('<div class="project-search">','
<div class="project-search">
    <div class="pjs-title">
        <h3>Tìm kiếm dự án</h3>
    </div>
    <div class="pjs-content">
        <select id="CatPJ" name="CatPJ" class="pjs-item pjs-item-ct"> 
                            '.$showOP.'
                        </select> 
        <input type="hidden" id="hddcboCatePj" value="-1" />
        <select id="ddlCity2" class="pjs-item pjs-item-ct">
                            <option value="">Tỉnh/Thành phố</option> 
                            '.$TinhThanh.'
                        </select> 
        <input type="hidden" name="hddcboCityPj" id="hddcboCityPj" value="-1" />
        <select id="ddlDistrict2" class="pjs-item pjs-item-ct">
                                <option value="">Quận/Huyện</option>
                </select> 
        <input type="hidden" name="hddcboDistPj" id="hddcboDistPj" value="-1" />
        <div class="pjs-action" style="float: right;">
            <a href="javascript:__doPostBack()">
                <img src="/style/images/btnSearch.png"></a>
        </div>
    </div>
</div>
<div class="project-search1" style="display: none;">',$noidung);
$noidung=str_replace('/du-anhttp://dothi.net//','http://'.$_SERVER['HTTP_HOST'].'/',$noidung); 
$noidung=str_replace('.htm.htm','.htm',$noidung); 
        echo $noidung;?> 
            <!-- Content Right -->
            <div class="content-right">
                <!-- Box search list -->
       <? $duan=$projectName.'|'.$projectID; include  APPPATH.'modules/dangtin/views/div_search.php';?> 
                <!-- Dự án theo lĩnh vực -->
                
<div class="product-count">
                    <div class="pc-title">
                        <h3>Dự án theo lĩnh vực</h3>
                    </div>
                    <div class="pc-content pc-content-hottoppic">
                        <ul id="ulProductCount">
<? echo $showcat; ?>  
                        </ul>
                    </div>
                </div> 
                <!-- Tin rao liên quan -->
    <? include  APPPATH.'modules/dangtin/views/xenoibat.php';?> 
 
                <!-- Box hot -->
                <? include  APPPATH.'modules/dangtin/views/tukhoanoibat.php';?> 
 
                <!-- Tin tức liên quan -->
                <? include APPPATH.'modules/baiviet/views/hot_news.php';?> 
                 <? include APPPATH.'modules/dangtin/views/div_tool.php';?>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div> 
    </div>

            <div class="clear"></div>
        </div>
      <?
echo "<script>GetArea('GetDistrict','cityCode',$('#ddlCity2').find('option:selected').attr('data-key'),'ddlDistrict2','Quận/Huyện','$distID');</script> ";
echo "<script>GetArea('GetDistrict','cityCode',$('#ddlCity2').find('option:selected').attr('data-key'),'ddlDistrict','Quận/Huyện','$distID');</script> "; 
?>  
<script type="text/javascript">

    //$(document).ready(function () {
    //    $(".various").fancybox({
    //        type: 'iframe',
    //        href: '/xem-truoc.htm',
    //        maxWidth: 800,
    //        maxHeight: 800,
    //        fitToView: true,
    //        width: '90%',
    //        height: '90%',
    //        autoSize: true,
    //        closeClick: false,
    //        openEffect: 'none',
    //        closeEffect: 'none',
    //        padding: 0
    //    });
    //});
    $('select').select2({
        matcher: function (params, data) {
            if ($.trim(params.term) === '') {
                return data;
            }
            var _keyword = UnicodeToKoDau(data.text.toLowerCase());
            var _text = UnicodeToKoDau(params.term.toLowerCase());
            if (_keyword.indexOf(_text) == 0) {
                var modifiedData = $.extend({}, data, true);
                modifiedData.text;
                return modifiedData;
            }
            return null;
        }
    });
    $('#ddlCity2').on('change', function () {  
        GetArea('GetDistrict','cityCode',$('option:selected', this).attr('data-key'),'ddlDistrict2','Quận/Huyện',''); 
    });  

    //// managage back button click (and backspace)
    var count = 0; // needed for safari
    window.onload = function () {
       if (typeof history.pushState === "function") {
           history.pushState("back", null, null);
           window.onpopstate = function () {
               history.pushState('back', null, null);
               if (count == 1) { window.location = window.location; }
          };
       }
    }
    setTimeout(function () { count = 1; }, 200); 
</script>