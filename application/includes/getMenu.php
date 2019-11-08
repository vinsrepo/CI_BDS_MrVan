<?php
function show_menu($menus,$parrent,$url,$class_ul="",$active_class="")
{
// LAY MENU DUA VAO MENU ID MENU CHA TRUYEN VAO
 $current_menus = array();
 
    foreach ($menus as $key => $val) 
    {
       if ($val['MenuCha'] == $parrent) 
       {
          $current_menus[] = $val;
          unset($menus[$key]);
       }
    }
// SHOW RA MENU THEO UL
    if (sizeof($current_menus) > 0) 
    {
        
         echo '
              <ul'.$class_ul.'>
              ';
         if($val['CapMenu']==1){
            echo '<li class="first">
                    <a href="/" id="tc"><img src="/style/images/homev3.png"></a>
                </li>';
         }     
              
     foreach ($current_menus as $key => $val) 
     {
        $arr_link=explode('/',$_SERVER["REQUEST_URI"]);
        $arr_link_first=explode('?',$arr_link[1]);
        if('/'.$arr_link_first[0]==$val['Link'])
        {
        $activeTab=' class="'.$active_class.'"';
        }
        else
        {
        $activeTab='';
        }
        if($val['CapMenu']=='1')
        {
            $class=$class_ul;
            $u='c';
        }
        else{
            $class='';
            $u='p';
        }
        if($val['Link']=="")
        {
            $HangXe=Modules::run('baiviet/getDanhMucCha',$val['MenuCha']);
            if($HangXe['TieuDe']!=''){
                $ul='-';
            }else{
                $ul='';
            }
            $Link=base_url().$url.'/'.$u.$val['IDBaiViet'].'/'.stripUnicode($HangXe['TieuDe']).$ul.stripUnicode($val['TieuDe']).'.html';
        }
        else
        {
            $Link=$val['Link'];
        }
        if($class_ul==' id="primary-nav"'&&$val['CapMenu']==1){
            $list='<img src="'.base_url().'style/images/bullet_icon.gif" border="0" align="middle" style="float:left;padding-top:4px" class="menu_icon"/>';
        }else{
            $list='';
        }
        echo '
                   <li'.$activeTab.'><a href="'.$Link.'">'.$list.' '.$val['TieuDe'].'</a>';
                   
             show_menu($menus,$val['IDBaiViet'],$url,$class_ul,$active_class);
        echo '     </li>';
     }
   
   echo '
             </ul>
        ';
   }
}  

function show_menu2($menus,$parrent,$url,$class_ul="",$active_class="")
{
// LAY MENU DUA VAO MENU ID MENU CHA TRUYEN VAO
 $current_menus = array();
 
    foreach ($menus as $key => $val) 
    {
       if ($val['MenuCha'] == $parrent) 
       {
          $current_menus[] = $val;
          unset($menus[$key]);
       }
    }
// SHOW RA MENU THEO UL
    if (sizeof($current_menus) > 0) 
    {
        
         echo '
              <ul'.$class_ul.'>
              ';
     foreach ($current_menus as $key => $val) 
     {
        if(base_url().substr($_SERVER["REQUEST_URI"],1)==$val['Link'])
        {
        $activeTab=' class="'.$active_class.'"';
        }
        else
        {
        $activeTab='';
        }
        if($val['CapMenu']=='1')
        {
            $class=$class_ul;
            $u='c';
        }
        else{
            $class='';
            $u='p';
        }
        if($val['Link']=="")
        {
            $HangXe=Modules::run('baiviet/getDanhMucCha',$val['MenuCha']);
            if($HangXe['TieuDe']!=''){
                $ul='-';
            }else{
                $ul='';
            }
            $Link=base_url().$url.'/'.$u.$val['IDBaiViet'].'/'.stripUnicode($HangXe['TieuDe']).$ul.stripUnicode($val['TieuDe']).'.html';
        }
        else
        {
            $Link=$val['Link'];
        }
        if($class_ul==' id="primary-nav"'&&$val['CapMenu']==1){
            $list='<img src="'.base_url().'style/images/bullet_icon.gif" border="0" align="middle" style="float:left;padding-top:4px" class="menu_icon"/>';
        }else{
            $list='';
        }
        echo '
                   <li'.$activeTab.'><a href="'.$Link.'">'.$list.' '.$val['TieuDe'].'</a>';
                   
             show_menu2($menus,$val['IDBaiViet'],$url,$class_ul,$active_class);
        echo '     </li>';
     }
   
   echo '
             </ul>
        ';
   }
} 