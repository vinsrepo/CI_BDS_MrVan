<?php
function vi2en($str)
{
	$arrTViet=array("à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă",
	"ằ","ắ","ặ","ẳ","ẵ","è","é","ẹ","ẻ","ẽ","ê","ề"
	,"ế","ệ","ể","ễ",
	"ì","í","ị","ỉ","ĩ",
	"ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ"
	,"ờ","ớ","ợ","ở","ỡ",
	"ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
	"ỳ","ý","ỵ","ỷ","ỹ",
	"đ",
	"À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă"
	,"Ằ","Ắ","Ặ","Ẳ","Ẵ",
	"È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
	"Ì","Í","Ị","Ỉ","Ĩ",
	"Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ"
	,"Ờ","Ớ","Ợ","Ở","Ỡ",
	"Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
	"Ỳ","Ý","Ỵ","Ỷ","Ỹ",
	"Đ");

	$arrKoDau=array("a","a","a","a","a","a","a","a","a","a","a"
	,"a","a","a","a","a","a",
	"e","e","e","e","e","e","e","e","e","e","e",
	"i","i","i","i","i",
	"o","o","o","o","o","o","o","o","o","o","o","o"
	,"o","o","o","o","o",
	"u","u","u","u","u","u","u","u","u","u","u",
	"y","y","y","y","y",
	"d",
	"A","A","A","A","A","A","A","A","A","A","A","A"
	,"A","A","A","A","A",
	"E","E","E","E","E","E","E","E","E","E","E",
	"I","I","I","I","I",
	"O","O","O","O","O","O","O","O","O","O","O","O"
	,"O","O","O","O","O",
	"U","U","U","U","U","U","U","U","U","U","U",
	"Y","Y","Y","Y","Y",
	"D");

	return str_replace($arrTViet, $arrKoDau, $str);
}

function stripUnicode($title) {
	
	$title = vi2en($title);
	
	$title = strip_tags($title);
	// Preserve escaped octets.
	$title = preg_replace('|%([a-fA-F0-9][a-fA-F0-9])|', '---$1---', $title);
	// Remove percent signs that are not part of an octet.
	$title = str_replace('%', '', $title);
	// Restore octets.
	$title = preg_replace('|---([a-fA-F0-9][a-fA-F0-9])---|', '%$1', $title);

	 

	$title = strtolower($title);
	$title = preg_replace('/&.+?;/', '', $title); // kill entities
	$title = str_replace('.', '-', $title);
	$title = preg_replace('/[^%a-z0-9 _-]/', '', $title);
	$title = preg_replace('/\s+/', '-', $title);
	$title = preg_replace('|-+|', '-', $title);
	$title = trim($title, '-');

	$title = vi2en($title);

	return $title;
} 
function getImage($content) {
       $first_img = '';
       ob_start();
       ob_end_clean();
       $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content, $matches);
       $first_img = $matches [1] [0];

       if(empty($first_img)){
       $first_img = ''.base_url().'/images/LOGO_OK.png';
       }
       return $first_img;
       }
function getIDYoutube($content) {
       $first_img = '';//https://www.googleapis.com/youtube/v3/videos?part=contentDetails&id=MrfUnZ7qBIY&key=AIzaSyDVFdss3SboNU9bIftweS0egOJwI1L7TJA
       ob_start();
       ob_end_clean();
       $output = preg_match_all('/https:\/\/www.youtube.com\/embed\/([^\'"]+)[\'"]/i', $content, $matches);
       $first_img = $matches [1] [0];
       $first_img="http://img.youtube.com/vi/$first_img/0.jpg";

       if(empty($first_img)){
       $first_img = ''.base_url().'/images/LOGO_OK.png';
       }
       return $matches [1] [0];
       }
function getTimeYoutube($ID) {
       // video id from url
    // video json data
    $json_result = file_get_contents("https://www.googleapis.com/youtube/v3/videos?part=contentDetails&id=$ID&key=AIzaSyDVFdss3SboNU9bIftweS0egOJwI1L7TJA");
    $result = json_decode($json_result, true);

    // video duration data
    if (!count($result['items'])) {
        return null;
    }
    $duration_encoded = $result['items'][0]['contentDetails']['duration'];

    // duration
    $interval = new DateInterval($duration_encoded);
    $seconds = $interval->days * 86400 + $interval->h * 3600 + $interval->i * 60 + $interval->s;
    //$mn=$seconds/60;
    return gmdate("i:s", $seconds);
       }
function catToMenu($arrays,$parent=0,$level=0,$ul_element='',$li_element='',$a_element='',$listID='',$active='',$key_parent=array('c_parentid','id'),$set_link=''){
                
                if(is_array($parent)){
                    $filters=$parent[1];
                    $parent=$parent[0];
                    
                }
                
                $new_ul=$ul_element;
                $new_li=$li_element;
                $new_a=$a_element; 
                
                $html='';
                $child=false;
                if(!isset($ul_element[$level])){
                    $level=0;
                }
                $html.= $ul_element[$level][0];
                
                   foreach ($arrays as $key=>$value) 
                   {
                    
                    if(isset($filters)){
                     foreach($filters as $filter_key=>$filter_val){
                        if(isset($value[$filter_key])&&$value[$filter_key]==$filter_val){
                            $check_where=1;
                        }else{
                            $check_where=0;
                        }
                     }
                    }else{
                        $check_where=1;
                    }
                      if(isset($value[$key_parent[0]])&&$value[$key_parent[0]]==$parent&&$check_where==1){
                       //link
                       if(isset($value['Link'])){
                       $c_link=$value['Link'];
                       if($c_link==''){
                          
                          $c_link=$set_link;
                          $value['Link']=str_replace('//','/',$c_link);
                       }
                       }
                       //end link
                       
                        
                                              
                           //unset($arrays[$key]);
                           $data_childs=catToMenu($arrays,$value[$key_parent[1]],$level+1,$new_ul,$new_li,$new_a,$listID,$active,$key_parent[0],$dataLayouts,$key_megamenu);
                           
                           if($data_childs['child']==true&&isset($li_element[$level][2])){
                            
                               if($listID!=''&&in_array($value[$key_parent[1]],$listID)){
                                  $li_element_replace2=str_replace('class="','class="'.$active.' ',$li_element[$level][2]);
                                  if(isset($a_element[$level][2])){
                                    $a_element[$level][3]=str_replace('<a class="','<a class="'.$active.' ',$a_element[$level][3]);
                                  }
                               }else{
                                  $li_element_replace2=$li_element[$level][2];
                                  if(isset($a_element[$level][2])){
                                    $a_element[$level][3]=str_replace('<a class="'.$active.' ','<a class="',$a_element[$level][3]);
                                  }
                               }
                       
                               $html.= $li_element_replace2;
                               
                               if(isset($a_element[$level][2])){
                                  $html.=$a_element[$level][2].$a_element[$level][3];
                               }else{
                                  $html.=$a_element[$level][0].$a_element[$level][1];
                               }
                               
                           }else{
                            
                               if($listID!=''&&in_array($value[$key_parent[1]],$listID)){
                                  $li_element_replace0=str_replace('class="','class="'.$active.' ',$li_element[$level][0]); 
                               }else{
                                  $li_element_replace0=$li_element[$level][0];
                               }
                               
                               $html.= $li_element_replace0.$a_element[$level][0].$a_element[$level][1];
                           }
                           
                           $html.= $data_childs['html'];
                           
                           
                           if($data_childs['child']==true&&isset($li_element[$level][3])){
                               $html.= $li_element[$level][3];
                           }else{
                               $html.= $li_element[$level][1];
                           }
                           
                           
                           $child=true;
                           
                            
                              
                       }
                       $html=preg_replace_callback('/\[([a-zA-Z0-9_]+)\]/', function($m) use($value){return $value[$m[1]];}, $html);
                       
                   }
               
                $html.= $ul_element[$level][1];
                $html=str_replace($ul_element[$level][0].$ul_element[$level][1],'',$html);
                return array('html'=>$html,'child'=>$child);
    }
    function dataWidthKeyID($datas,$ID='id',$keyID='id'){
                 
                $lists=array();
                
                 foreach($datas as $key=>$val){
                    if(is_array($ID)){
                        foreach($ID as $listID){
                            if(is_array($listID)){
                              if($listID[1]==''){
                                    $lists[$listID[0]][$val[$listID[0]]][$val[$keyID]]=$val;
                              }else{
                                if($listID[1]=='!'){
                                    if(isset($val[$listID[0]])&&$val[$listID[0]]!=''){
                                      $lists[$listID[0]][$val[$keyID]]=$val;
                                    }
                                }else{
                                  if(isset($val[$listID[0]])&&$val[$listID[0]]==$listID[1]){
                                    $lists[$listID[0]][$val[$keyID]]=$val;
                                  }
                                }
                              }
                            }else{
                                $lists[$listID][$val[$listID]]=$val;
                            } 
                        } 
                    }else{
                        $lists[$val[$keyID]]=$val;
                    }
                    
                 }
                 
                 return $lists;
    }
function show_img($image,$thumb='',$base='/upload/photo/'){ 
    if($image==''||$image=='noimage.gif'||$image=='undefined'||$image=='|undefined'){
        $re_img='/images/LOGO_OK.png';
    }else{
        if (!file_exists('.'.$base.$image)) {   
           $re_img='/images/LOGO_OK.png';                       
        }else{
           if($thumb!=''){
              $link_thumb=$base.$thumb.'/'.$image;
              if(!file_exists('.'.$link_thumb)){
                 $get_arr_ext=explode('.',$image);
                 $image=str_replace('.'.end($get_arr_ext),'.jpg',$image);
              }
              $re_img=$link_thumb;       
           }else{
              $re_img=$base.$image; 
           }
        }
    }
    return $re_img;
}
function get_first_img($list_image,$thumb=''){
    $stt=0;
    $logo=show_img(1);
    $slide=explode('|',$list_image);
    foreach($slide as $img){ 
         if($img!=''&&$img!='undefined'&&$img!='noimage.gif'){ 
             $stt++;
             if($stt==1){
                   $logo=show_img($img,$thumb);
                   break;
             }
         }
    }
    return $logo;
}
function img_thumb_blog($content,$thumb='',$base='/upload/_thumbs/Images/',$sub=''){
    $newimg=str_replace('/upload/images/','',str_replace('/home/upload/images/','',($sub!=''?str_replace($sub.'/','',getImage($content)):getImage($content))));
    if(strrpos($newimg,'http://')!==false||strrpos($newimg,'https://')!==false){
        $img=$newimg;
    }else{
        $img=show_img($newimg,$thumb,$base);
    }
    return $img;
}
function setval($matches,$key){
                                        $value=explode('-',$matches[$key]); 
                                   return $value[0];
                                }
function catToTree($dataTables,$parentID='',$first='',$parent=array('c_parentid','c_name')){
        $a_data=array();
        foreach($dataTables as $key=>$dataTable){
            
            if($dataTable[$parent[0]]==$parentID){
                $new_first=$first;
                $dataTable[$parent[1]]=$new_first.' '.$dataTable[$parent[1]];
                $a_data[]=$dataTable;
                unset($dataTables[$key]);
                $childs=catToTree($dataTables,$dataTable['IDBaiViet'],$new_first.$first,$parent);
                foreach($childs as $child){ 
                    $a_data[]=$child;
                }
            }
        }
        return $a_data;
    }