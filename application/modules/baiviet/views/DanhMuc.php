

<div class="rightsearch makesearch">
    <h2 class="tit oswaldlarge-title"><? $nae=Modules::run('trangchu/getInfo','baiviet','Link','/ban-xe'); if($nae['H2']!=''){echo $nae['H2'];}else{echo 'Bán ô tô theo hãng';} ?></h2> 
	<?php 
     //echo show_menu2($menu,0,'oto',' id="primary-nav"','x');
     //$newmenus=dataWidthKeyID($menus,array('IDBaiViet',array('c_blog',1),array('MenuCha','!'),array('MenuCha',''))); 
          $newmenus=dataWidthKeyID($menu,array('IDBaiViet',array('DanhMuc',1),array('MenuCha','')),'IDBaiViet');   
          $totals=Modules::run('trangchu/getTotalGroup','tinban','HangXe',' HangXe'); 
          $totals=dataWidthKeyID($totals,array('HangXe','','HangXe'));   //print_r($totals);     
         //print_r($newmenus['IDBaiViet']); 
          $stt_0=0;
          $col_left='';
          $col_right='';
          $catID=str_replace('c','',$this->uri->segment(2));
          $catID=str_replace('p','',$catID);
     foreach($newmenus['MenuCha'][0] as $val){$stt_0++;
       $modelcolleft='';
       $modelcolright='';
       $stt_1=0;
       if(isset($newmenus['MenuCha'][$val['IDBaiViet']])&&!empty($newmenus['MenuCha'][$val['IDBaiViet']])){
         foreach($newmenus['MenuCha'][$val['IDBaiViet']] as $child){$stt_1++;
         $select1=$child['IDBaiViet']==$catID||$this->session->userdata('DoiXe')==$child['IDBaiViet']?' style="color:red!important;font-weight:bold"':'';  
         $color1=$child['NoiBat']==1?"bold":"";
         if($child['Link']!=''){
            $link_child=$child['Link'];
           }else{
            $link_child='/ban-xe-'.strtolower(stripUnicode($val['TieuDe'])).'-'.strtolower(stripUnicode($child['TieuDe'])).'';
           }
            $model_item='
                <div class="itemmodel"><a title="'.$val['TieuDe'].' '.$child['TieuDe'].'" class="'.$color1.'" '.$select1.' href="'.$link_child.'">'.$child['TieuDe'].'</a></div>
            ';
            if($stt_1 % 2 == 0){
               $modelcolright.=$model_item;
            }else{
               $modelcolleft.=$model_item;
            }
         }
       }
       if($modelcolleft!=''||$modelcolright!=''){
          $modellist='
               <div class="modellist">

                    <div class="modelcolleft">
                            '.$modelcolleft.'
                    </div>
                    <div class="modelcolright">
                            '.$modelcolright.'
                    </div>
                </div>
          ';
       }else{
           $modellist='';
       }
       $color=$val['NoiBat']==1?"bold":"";
       $total_show=$totals['HangXe'][$val['IDBaiViet']]['total'];
       if($total_show==''){$total_show=0;}
       $select=($val['IDBaiViet']==$catID||$newmenus['IDBaiViet'][$catID]['MenuCha']==$val['IDBaiViet']||$this->session->userdata('HangXe')==$val['IDBaiViet'])?' style="color:red;font-weight:bold"':''; 
       if($val['Link']!=''){
            $link_parent=$val['Link'];
           }else{
            $link_parent='/ban-xe-'.strtolower(stripUnicode($val['TieuDe'])).'';
           }
         $item='
            <div class="item">
                <a class="'.$color.'" '.$select.'  title="'.$val['TieuDe'].'" href="'.$link_parent.'">'.$val['TieuDe'].'</a><span>('.$total_show.')</span>
                '.$modellist.'
            </div>
            ';
         if($stt_0 % 2 == 0){
            $col_right.=$item;
         }else{
            $col_left.=$item;
         }
     }
    ?>
    <div class="colleft"> 
            <? echo $col_left;?>
    </div> 
    <div class="colright"> 
            <? echo $col_right;?>
    </div> 
</div>	
<script>
    $(document).ready(function () {
        if (typemodel != "") {
            activelinkrightsearch("ismodel");
        }
        else activelinkrightsearch();
    });
</script> 