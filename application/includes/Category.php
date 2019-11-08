<?
    function moveMenu($datas,$from,$to){
        foreach($datas as $key_menu=>$menu){
            if($menu['c_parentid']==$from){
               $datas[$key_menu]['c_parentid']=$to;
            }
        }
        return $datas;
    }
    function removeMenu($datas,$field,$id){
        foreach($datas as $key_menu=>$menu){
            if($menu[$field]==$id){
               unset($datas[$key_menu]);
            }
        }
        return $datas;
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
                        $lists[$val[$ID]]=$val;
                    }
                    
                 }
                 
                 return $lists;
    } 
    function getChildArray($list_parent,$parentid,$inc_parent=true){
        $list=$inc_parent==true?array($parentid):array();
        if(isset($list_parent[$parentid])){
            foreach($list_parent[$parentid] as $childID=>$val){
                $list[]=$childID;
                if(isset($list_parent[$childID])){
                    $list=array_merge($list,getChildArray($list_parent,$childID)); 
                }
            }
        }
        return $list;
    } 