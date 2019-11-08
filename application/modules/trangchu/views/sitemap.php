<div class="breadcrumbs " style="margin-bottom: 10px;">
        <div class="center">
           <div class="list-content">
             <ul class="grid12-12">
                 <li><a href="/" title="<?php echo $this->lang->line('lable_home');?>"><span><?php echo $this->lang->line('lable_home');?></span></a> <span class="mpx-arr-thin-right"></span></li> 
                 <li><a href=""><span class="last">Sitemap</span></a> <span class="mpx-arr-thin-right last"></span></li>
                              
                 </ul>
           </div>
                    </div>
    </div>
<div class="center">
     
    <div style="width:1000px;height:19px"></div>
    <div class="list-content">
     <div class="sitemap">
    <div class="title" style="margin: 0px;padding: 0px; ">
        <h1 style="margin: 0px;padding: 0px;margin-bottom: 10px;">SITEMAP</h1>
    </div>
    <div class="linksitemap">

        <div class="colmenu">
            <ul>
                <li><a href="/" style="text-transform: uppercase;">Trang chủ</a></li>
                <?
$tintucs=Modules::run('trangchu/getList','baiviet',114,0,'SapXep asc, NgayGui asc','IDBaiViet',array('Loai'=>'MenuHeader'));
foreach($tintucs as $tintuc){
    echo '
               <li><a href="'.$tintuc['Link'].'">'.$tintuc['TieuDe'].'</a></li>
    ';
}
?>
</ul>

        </div>
        <div class="colCity">
            <div class="colname">Bán xe theo địa phương</div>
            <?php 
             $arr = file(APPPATH . 'includes/DSTinhThanh.txt');
             foreach($arr as $row) {  
                echo '
                     <a class="" href="/ban-xe-'.strtolower(stripUnicode(trim($row))).'">Bán xe tại '.trim($row).'</a>
                     ';
             }
             ?> 
        </div>
        <div class="colMake">
            <div class="colname">Bán xe theo hãng</div>
            <?
$tintucs=Modules::run('trangchu/getList','baiviet',114,0,'SapXep asc, NgayGui asc','IDBaiViet',array('Loai'=>'DanhMuc','CapMenu'=>1));
foreach($tintucs as $tintuc){
    $color=$tintuc['NoiBat']==1?"light":"small";
    if($tintuc['Link']!=''){
            $link_parent=$tintuc['Link'];
           }else{
            $link_parent='/ban-xe-'.strtolower(stripUnicode($tintuc['TieuDe'])).'';
           }
    echo '
               <a class="'.$color.'" href="'.$link_parent.'">Bán xe '.$tintuc['TieuDe'].'</a>
    ';
}
?>
                    
        </div>
    </div>
</div>

        </div>
    </div>