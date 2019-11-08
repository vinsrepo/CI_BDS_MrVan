        <div class="wr_page">
            
    <div class="index-page">
        <div class="content">
            <div class="content-left">
            <form method="post" action="/van-ban-nganh-xay-dung" id="Form1">
            <style>
            .aspNetHidden{display: none;}
            </style>
            <div class="aspNetHidden">
<input type="hidden" name="EVENTTARGET" id="__EVENTTARGET" value="1" /> 
</div>
 
 
                <? echo $show_content;?> 
            </form>
            <!-- Content Right -->
            <div class="content-right">
 <? include APPPATH.'modules/dangtin/views/div_tool.php';?>

                <div class="mb20 clear">
                </div>
                
<? include APPPATH.'modules/dangtin/views/div_search.php';?>
                
<? $CatID=449; include APPPATH.'modules/dangtin/views/current_category.php';?>

<? include APPPATH.'modules/dangtin/views/tukhoanoibat.php';?>   

            </div>
            <div class="clear"></div>
        </div>
    </div>

    <script type="text/javascript">

        $(document).ready(function () {
            var dataCate = '';
            dataCate += '[';
            dataCate += '{"Id":"-1","Text":"-- Tất cả các lĩnh vực --"},';
            dataCate += '{"Id":"0","Text":"Luật"},';
            dataCate += '{"Id":"1","Text":"Nghị quyết"},';
            dataCate += '{"Id":"2","Text":"Nghị định"},';
            dataCate += '{"Id":"3","Text":"Quyết định"},';
            dataCate += '{"Id":"4","Text":"Thông tư"},';
            dataCate += '{"Id":"5","Text":"Chỉ thị"},';
            dataCate += '{"Id":"6","Text":"Công văn"},';
            dataCate += '{"Id":"7","Text":"Văn bản khác"}';
            dataCate += ']';
            var dataReturn = $.parseJSON(dataCate);
            $('#cboLegal').selectoption(dataReturn, $('#hddcboLegal').val(), "215px");

            var html = '';
            html += '[';
            html += '{"Id":"-1","Text":"-- Tất cả --"}';
            for (var i = 1990; i <= (new Date()).getFullYear() ; i++) {
                html += ',{"Id":"' + i + '","Text":"' + i + '"}';
            }
            html += ']';
            var likeReturn = $.parseJSON(html);
            $("#cboYear").selectoption(likeReturn, $('#hddcboYear').val(), "122px");

            /*$('#ddlLegal').val($('#hddLegal').val());
            $('#ddlLegal').change(function () {
                $('#hddLegal').val($(this).val());
            })*/


            $("body").on("click", "#id_downloadfile", function () {
                var url = "/interest/getall?id=" + $(this).attr('data-id');
                $('#id_downloadfile').attr("href", url);
                $('#id_downloadfile').fancybox({
                    width: 700,
                    fitToView: false,
                    afterShow: function () {
                    },
                    afterClose: function () {
                        $.fancybox.close();
                    }
                });
            });

            $('.ul-vbnxd').find('.dw').each(function () {
                $(this).find('a').click(function () {
                    $('#id_downloadfile').attr('data-id', $(this).attr('data-id')).click();
                })
            });

        })
    </script>

            <div class="clear"></div>
        </div>