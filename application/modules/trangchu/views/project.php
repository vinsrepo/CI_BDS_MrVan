<?
$sliderA=''; $thumbSlide='';
 $listDuAns=Modules::run('trangchu/getList','salon',6,0,'NgayTao desc','IDSalon',array('TrangThai'=>1));
 foreach($listDuAns as $k=>$duan){
    $link='/'.stripUnicode($duan['TenSalon']).'-pj'.$duan['IDSalon'].'.html'; 
    $sliderA.='
                 <div>
                                <a href="'.$link.'" title="'.$duan['TenSalon'].'">
                                    <img src="'.get_first_img($duan['LoGo'],'624x476').'" alt="'.$duan['TenSalon'].'" />
                                </a>
                                <h4><a href="'.$link.'" title="'.$duan['TenSalon'].'">'.$duan['TenSalon'].'</a></h4>
                                <p>'.$duan['DiaChi'].'</p>
                 </div>
    ';
    $thumbSlide.='
                 <div rel="'.$k.'" class="act item first">
                            <a class="tt_project" href="'.$link.'" title="'.$duan['TenSalon'].'">
                                <img class="avatar" src="'.get_first_img($duan['LoGo'],'170x115').'" alt="'.$duan['TenSalon'].'" />
                            </a>
                            <div class="info_project">
                                <a href="'.$link.'" title="'.$duan['TenSalon'].'">'.$duan['TenSalon'].'</a>
                                <p>'.$duan['DiaChi'].'</p>
                            </div>
                        </div>
    ';
 }
?>

           <div id="ContentPlaceHolder1_ProjectHome_divProject" class="project-hl">
    <div class="hl-title">
        <h3><a href="/du-an" title="Dự án nổi bật">Dự án nổi bật</a></h3>
    </div>
    <div class="wr_project">
        <div class="wr_slide">
            <div class="slideproject">
                <div id="sliderA" class="slider">
                    <? echo $sliderA;?> 
                </div>
            </div>
        </div>
        <div class="thumbSlide">
            <div class="listproject">
                <? echo $thumbSlide;?> 
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <script>
        $(function () {
            $("#sliderA").excoloSlider();
        });
    </script>

</div>    