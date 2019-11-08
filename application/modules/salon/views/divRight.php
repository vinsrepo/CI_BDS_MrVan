<div class="project-search">
    <div class="pjs-title">
        <h3>Tìm kiếm dự án</h3>
    </div>
    <div class="pjs-content">
    <form action="" method="post" id="frmAuto">
        <select id="CatPJ" name="CatPJ" class="pjs-item pjs-item-ct"> 
        <option value="">Tất cả</option>
                            <?php 
        $menu=Modules::run('trangchu/getList','baiviet',1114,0,'NgayGui desc','IDBaiViet',array('MenuCha'=>455));
                                         
                                                                                                                 
        //$menu=catToTree($menu,0,' - - ',array('MenuCha','TieuDe')); 
 
                                        foreach ($menu as $data)
                                        {  
                                           
                                           if($data['IDBaiViet']==$users['Domain']||$data['IDBaiViet']==$_POST['CatPJ']||$cat_info['IDBaiViet']==$data['IDBaiViet']||$salon_info['Domain']==$data['IDBaiViet'])
                                           {
                                              $select='selected';
                                           }
                                           else
                                           {
                                              $select='';
                                           }
                                           echo '<option value="'.$data['IDBaiViet'].'" '.$select.'> '.$data['TieuDe'].'</option>'; 
                                        }
                                        ?>		
                        </select> 
        <input type="hidden" id="hddcboCatePj" value="-1" />
        <select id="ddlCity2" name="TinhThanh" class="pjs-item pjs-item-ct">
                            <option value="">Tỉnh/Thành phố</option> 
                            <?
$arr = file_get_contents(APPPATH . 'includes/DSTinhThanhKey.txt');
foreach(json_decode($arr,true) as $key=>$val){
    $select_ed=" ".set_select('DoiXe', $val['Text']);
                                        if($salon_info['TinhThanh']==$val['Text']||$val['Text']==$_POST['TinhThanh']){
                                            $select_ed=" selected='selected'";
                                        }
    echo '
    <option value="'.$val['Text'].'" data-key="'.$val['Id'].'" '.$select_ed.'>'.$val['Text'].'</option>    ';
}
?>
                        </select> 
        <input type="hidden" name="hddcboCityPj" id="hddcboCityPj" value="-1" />
        <select id="ddlDistrict2" name="QuanHuyen" class="pjs-item pjs-item-ct">
                                <option value="">Quận/Huyện</option>
                </select> 
        <input type="hidden" name="hddcboDistPj" id="hddcboDistPj" value="-1" />
        <div class="pjs-action" style="float: right;">
            <a href="javascript:document.getElementById('frmAuto').submit()">
                <img src="/style/images/btnSearch.png"></a>
        </div>
    </div></form>
</div>
  <?
  if($_POST['QuanHuyen']!=''||$salon_info['QuanHuyen']){
    $distID=$_POST['QuanHuyen']!=''?$_POST['QuanHuyen']:$salon_info['QuanHuyen'];
  }
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
    //var count = 0; // needed for safari
    //window.onload = function () {
    //    if (typeof history.pushState === "function") {
    //        history.pushState("back", null, null);
    //        window.onpopstate = function () {
    //            history.pushState('back', null, null);
    //            if (count == 1) { window.location = window.location; }
    //        };
    //    }
    //}
    //setTimeout(function () { count = 1; }, 200); 
</script>
              <!-- Tiêu chí tìm kiếm -->