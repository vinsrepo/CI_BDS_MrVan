<div class="copyright" style="text-align: center;padding-bottom: 20px;">Copyright © <?php echo date('Y') ?> - Designed by <a target="_blank" href="http://vinsofts.com" rel="nofollow" title="vinsofts.com" target="_blank" class="color00ffd1">Vinsofts</a></div>
</div> 
        <!-- END CONTAINER -->
        
<!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->
<div id="loading" style="display: none;"><div class="modal-backdrop fade in md-modal md-effect-11 md-show" style="text-align: center;padding-top: 200px;"><div class="spinner" style="width: 100%;"><div class="rect1"></div><div class="rect2"></div><div class="rect3"></div><div class="rect4"></div><div class="rect5"></div><br /><span id="msg_loading"><?php echo lang('loading_data'); ?></span></div></div><div class="md-overlay"></div></div>


        <!-- CORE JS FRAMEWORK - START --> 
        <!-- <script src="/admincp/themes/ultra-admin-2.1/assets/js/jquery-1.11.2.min.js" type="text/javascript"></script>  -->
        <script src="/admincp/themes/ultra-admin-2.1/assets/js/jquery.easing.min.js" type="text/javascript"></script> 
        <script src="/admincp/themes/ultra-admin-2.1/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
        <script src="/admincp/themes/ultra-admin-2.1/assets/plugins/pace/pace.min.js" type="text/javascript"></script>  
        <script src="/admincp/themes/ultra-admin-2.1/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js" type="text/javascript"></script> 
        <script src="/admincp/themes/ultra-admin-2.1/assets/plugins/viewport/viewportchecker.js" type="text/javascript"></script>  
        <!-- CORE JS FRAMEWORK - END --> 
        
        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <script src="/admincp/themes/ultra-admin-2.1/assets/plugins/autosize/autosize.min.js" type="text/javascript"></script>
        <script src="/admincp/themes/ultra-admin-2.1/assets/plugins/icheck/icheck.min.js" type="text/javascript"></script>
        <script src="/admincp/themes/ultra-admin-2.1/assets/plugins/tagsinput/js/bootstrap-tagsinput.min.js" type="text/javascript"></script>
        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 
         <? if($this->uri->segment(2)==''){?>
        <script src="/admincp/themes/ultra-admin-2.1/assets/plugins/morris-chart/js/raphael-min.js" type="text/javascript"></script>
<script src="/admincp/themes/ultra-admin-2.1/assets/plugins/morris-chart/js/morris.min.js" type="text/javascript"></script>
<script src="/admincp/themes/ultra-admin-2.1/assets/plugins/easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
        <script src="/admincp/themes/ultra-admin-2.1/assets/plugins/gauge/gauge.min.js" type="text/javascript"></script> 
        <script>
        <? 
        $date = date_create(date('Y-m-d',time()));
        date_sub($date, date_interval_create_from_date_string('10 days'));
        $prefix=date_format($date, 'Y-m-d');  
        $truycaps=Modules::run('trangchu/getList','truycap','',0,'NgayGui desc','IDTruyCap',array("NgayGui >= '$prefix' and IDTruyCap !="=>''),"DATE(`NgayGui`)"," COUNT(*) as uniquec, NgayGui, SUM(Hits) as pageviews"); 
        $days=array();
        foreach($truycaps as $truycap){
            $days[]=array(
                    "period"=>date('Y-m-d',strtotime($truycap['NgayGui'])),
                    "pageviews"=>$truycap['pageviews'],
                    "unique"=>$truycap['uniquec']
            );
        } 
        ?>
        jQuery(function($) {
            'use strict';

    var ULTRA_SETTINGS = window.ULTRA_SETTINGS || {};
    
     /*--------------------------------
        Easy PIE
     --------------------------------*/
    ULTRA_SETTINGS.dbEasyPieChart = function() {

        if ($.isFunction($.fn.easyPieChart)) {

            $('.db_easypiechart1').easyPieChart({
                barColor: '#37c44b',
                trackColor: '#f5f5f5',
                scaleColor: '#f5f5f5',
                lineCap: 'square',
                lineWidth: 6,
                size: 120,
                animate: 2000,
                onStep: function(from, to, percent) {
                    $(this.el).find('.percent').text(Math.round(percent));
                }
            });
        }

    };
    
     
    /*--------------------------------
         gauge meter
     --------------------------------*/
    ULTRA_SETTINGS.dbGaugemeter = function() {

        if ($("#gauge-meter").length) {
            var opts = {
                lines: 1, // The number of lines to draw
                angle: 0.05, // The length of each line
                lineWidth: 0.30, // The line thickness
                pointer: {
                    length: 0.40, // The radius of the inner circle
                    strokeWidth: 0.038, // The rotation offset
                    color: '#ffffff' // Fill color
                },
                limitMax: 'false', // If true, the pointer will not go past the end of the gauge
                colorStart: '#36a445', // Colors
                colorStop: '#36a445', // just experiment with them
                strokeColor: '#ffffff', // to see which ones work best for you
                generateGradient: false
            };
            var target = document.getElementById('gauge-meter'); // your canvas element
            var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
            gauge.maxValue = 100; // set max gauge value
            gauge.animationSpeed = 90; // set animation speed (32 is default value)

            gauge.set(56); // set actual value
            gauge.setTextField(document.getElementById("gauge-meter-text"));
            randomGauge();

        }

        function randomGauge() {
            setTimeout(function() {
                var val = Math.random() * 99;
                gauge.set(val); // set actual va{lue
                AnimationUpdater.run();
                randomGauge();
            }, 2000);
        }

    };
    /*--------------------------------
        Morris 
     --------------------------------*/
    ULTRA_SETTINGS.dbMorrisChart = function() {


        /*Area Graph*/
        // Use Morris.Area instead of Morris.Line
        Morris.Area({
            element: 'db_morris_area_graph',
            data: [{
                x: '2009 Q1',
                y: 3,
                z: 2
            }, {
                x: '2010 Q2',
                y: 2,
                z: 1
            }, {
                x: '2011 Q3',
                y: 1,
                z: 2
            }, {
                x: '2011 Q4',
                y: 2,
                z: 2
            }, {
                x: '2012 Q5',
                y: 4,
                z: 2
            }, {
                x: '2012 Q6',
                y: 2,
                z: 4
            }],
            resize: true,
            redraw: true,
            xkey: 'x',
            ykeys: ['y', 'z'],
            labels: ['Y', 'Z'],
            lineColors: ['#9972b5', '#1fb5ac'],
            pointFillColors: ['#fa8564']
        }).on('click', function(i, row) {
            console.log(i, row);
        });


        /*Line Graph*/
        /* data stolen from http://howmanyleft.co.uk/vehicle/jaguar_'e'_type */
        var day_data = <? echo json_encode($days);?>;
        Morris.Line({
            element: 'db_morris_line_graph',
            data: day_data,
            resize: true,
            redraw: true,
            xkey: 'period',
            ykeys: ['pageviews', 'unique'],
            labels: ['Lượt xem', 'Lượt truy cập'],
            lineColors: ['#36a445', '#015f95'],
            pointFillColors: ['red']
        });

        /*Bar Graph*/
        // Use Morris.Bar
        Morris.Bar({
            element: 'db_morris_bar_graph',
            data: [{
                x: '2011 Q1',
                y: 3,
                z: 2
            }, {
                x: '2011 Q2',
                y: 2,
                z: 1
            }, {
                x: '2011 Q3',
                y: 1,
                z: 2
            }, {
                x: '2011 Q4',
                y: 2,
                z: 2
            }, {
                x: '2011 Q5',
                y: 4,
                z: 2
            }, {
                x: '2011 Q6',
                y: 2,
                z: 4
            }],
            resize: true,
            redraw: true,
            xkey: 'x',
            ykeys: ['y', 'z'],
            labels: ['Y', 'Z'],
            barColors: ['#9972b5', '#1fb5ac']
        }).on('click', function(i, row) {
            console.log(i, row);
        });

        $('.r1_maingraph .switch .fa').on('click', function() {

            $('.r1_maingraph .switch .fa').removeClass("icon-default").addClass("icon-secondary");

            if ($(this).hasClass("fa-bar-chart")) {
                $(this).toggleClass("icon-secondary icon-default");
                $("#db_morris_line_graph").hide();
                $("#db_morris_area_graph").hide();
                $("#db_morris_bar_graph").show();
            }

            if ($(this).hasClass("fa-line-chart")) {
                $(this).toggleClass("icon-secondary icon-default");
                $("#db_morris_line_graph").show();
                $("#db_morris_area_graph").hide();
                $("#db_morris_bar_graph").hide();
            }

            if ($(this).hasClass("fa-area-chart")) {
                $(this).toggleClass("icon-secondary icon-default");
                $("#db_morris_line_graph").hide();
                $("#db_morris_area_graph").show();
                $("#db_morris_bar_graph").hide();
            }

        });


    };
    $(document).ready(function() {  
        ULTRA_SETTINGS.dbEasyPieChart();        
        ULTRA_SETTINGS.dbMorrisChart();
        ULTRA_SETTINGS.dbGaugemeter();
    }); 
    });
        </script>

 <?}?>
        <!-- CORE TEMPLATE JS - START --> 
        <script src="/admincp/themes/ultra-admin-2.1/assets/js/scripts.js" type="text/javascript"></script> 
        <!-- END CORE TEMPLATE JS - END --> 

        <!-- Sidebar Graph - START --> 
        <script src="/admincp/themes/ultra-admin-2.1/assets/plugins/sparkline-chart/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="/admincp/themes/ultra-admin-2.1/assets/js/chart-sparkline.js" type="text/javascript"></script>
        <!-- Sidebar Graph - END --> 
        
        <script>
function Delete(ID){
    if(confirm ('Bạn có chắc chắn muốn xóa bản ghi đã chọn?')==true){
    document.getElementById("Xoa"+ID+"").setAttribute('checked','checked');
    document.getElementById("formID").submit();
    }
}
$('.select-all').on('ifChecked', function (event) { 
    $('.checkbox').iCheck('check');
    triggeredByChild = false;
});
$('.btn_all').on('click', function (event) { 
    $('.skin-square-green').iCheck('check');
    $('.btn_all').hide();
    $('.btn_remove').show(); 
    triggeredByChild = false;
});
$('.btn_remove').on('click', function (event) { 
    if (!triggeredByChild) {
        $('.skin-square-green').iCheck('uncheck');
        $('.btn_all').show();
        $('.btn_remove').hide(); 
    }
    triggeredByChild = false;
});
$('.select-all').on('ifUnchecked', function (event) {
    if (!triggeredByChild) {
        $('.checkbox').iCheck('uncheck');
    }
    triggeredByChild = false;
});
// Removed the checked state from "All" if any checkbox is unchecked
$('.checkbox').on('ifUnchecked', function (event) {
    triggeredByChild = true;
    $('.select-all').iCheck('uncheck');
});

$('.checkbox').on('ifChecked', function (event) {
    if ($('.checkbox').filter(':checked').length == $('.checkbox').length) {
        $('.select-all').iCheck('check');
    }
});
</script>
    </body>
</html> 