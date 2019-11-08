        <div class="wr_page">
            
    <div class="index-page">
        <div class="content">
            <!-- Content Left -->
            <div class="content-left">
                <!-- News Break Cum -->
                
                
<?  
include 'breakcum.php';?>

                <div class="clear"></div>
                <div id="ContentPlaceHolder1_pnLoadControl">
	
<? //print_r($cha_info);
if((isset($cha_info)&&$cha_info['MenuCha']!=0)||(!isset($datacats)||empty($datacats))){ 
?>
<div class="articlelist margin-top10">
<? if(isset($datacats)&&!empty($datacats)){?>
    <div class="titlebox">
        <h3><? if($cha_info['H1']!=''){echo $cha_info['H1'];} elseif(isset($cha_info)){echo $cha_info['TieuDe'];}elseif($current_info['H1']!=''){echo $current_info['H1'];}else{ echo $this->lang->line('lable_'.$Loai.'');}?></h3>
    </div>
<? 

 if(isset($thongbao[0])&&$page=='1'){
    $NoiDung=strip_tags(html_entity_decode($thongbao[0]['NoiDung']));
                  $NoiDung=''.substr($NoiDung,0,360).'';
                  $NoiDung=substr($NoiDung, 0, strrpos($NoiDung, ' ')).'...';
                  $parent=Modules::run('trangchu/getInfo','baiviet','IDBaiViet',$thongbao[0]['MenuCha']);
                  $links='/'.stripUnicode($parent['TieuDe']).'/'.stripUnicode($thongbao[0]['TieuDe']).'-'.$thongbao[0]['IDBaiViet'].'.html';
    ?>
    <div id="ContentPlaceHolder1_ctl00_divArticleHost" class="news-home">
        <div class="news-top">
            
            <a href="<? echo $links;?>" title="<? echo $thongbao[0]['TieuDe'];?>">
                <img style="width: 318px;max-height: 200px;" src="<? echo img_thumb_blog($thongbao[0]['NoiDung'],'400x250');?>" alt="<? echo $thongbao[0]['TieuDe'];?>" />
            </a>
            <div class="litext">
                <h2>
                    <a href="<? echo $links;?>" title="<? echo $thongbao[0]['TieuDe'];?>"><? echo $thongbao[0]['TieuDe'];?></a>
                </h2>
                <p><? echo $NoiDung;?></p>
                
            </div>

            
        </div>
        <div class="clear"></div>
    </div>
<?
 unset($thongbao[0]);
}

}else{
  if($page==1){
    include 'div_hot.php';
    }
}?>
    <!-- News List -->
    <div class="news-list mt20">
        <ul>
            
                <?php 
            
                  if($thongbao){ 
                  foreach ($thongbao as $tintuc)
                  { 
                  $NoiDung=strip_tags(html_entity_decode($tintuc['NoiDung']));
                  $NoiDung=''.substr($NoiDung,0,250).'';
                  $NoiDung=substr($NoiDung, 0, strrpos($NoiDung, ' ')).'...';
                  $parent=Modules::run('trangchu/getInfo','baiviet','IDBaiViet',$tintuc['MenuCha']);
                  $link='/'.stripUnicode($parent['TieuDe']).'/'.stripUnicode($tintuc['TieuDe']).'-'.$tintuc['IDBaiViet'].'.html';
                  echo '
                 <li>
                        <div class="liimg">
                            <a href="'.$link.'" title="'.$tintuc['TieuDe'].'">
                                <img src="'.img_thumb_blog($tintuc['NoiDung'],'250x200').'" alt="'.$tintuc['TieuDe'].'" />
                            </a>
                        </div>
                        <div class="litext">
                            <a href="'.$link.'" title="'.$tintuc['TieuDe'].'">'.$tintuc['TieuDe'].'</a>
                            <p>'.$NoiDung.'</p>
                            
                        </div>
                        <div class="clear"></div>
                    </li>
                  ';
                  }
                  }else{
                    echo '<div class="note note-warning" style="margin-top:20px;overflow:hidden;width:90%!important"><div class="warning-box">'.$this->lang->line('lable_no_rows').'</div></div>';
                  }
                  ?>
                    
                
        </ul>
    </div>
    <?php echo $this->pagination->create_links();?>
    <div class="clear"></div>
</div>

<?}else{
    
    ?>
<div class="articlelist">
    <? include 'div_hot.php';?>
    
<? include 'div_group.php';?>
 
    <div class="clear"></div>
</div>

<?}?>
</div>
                <div class="clear"></div>
            </div>
            <!-- Content Right -->
            <div class="content-right">
                <!-- Box search list -->
                
<? include  APPPATH.'modules/dangtin/views/div_search.php';?> 
                <!-- News hight light -->
                
<? include 'tinnhieunguoidoc.php';?>

                <!-- Hot toppic -->
  <? include  APPPATH.'modules/dangtin/views/xenoibat.php';?> 
                <!-- Utility -->
                
<? include  APPPATH.'modules/dangtin/views/tukhoanoibat.php';?> 

                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>

            <div class="clear"></div>
        </div>