<?php
function giaca($so){ 
        if (($so < 0) || ($so > 999999999999999)) 
        {
            echo "Số quá lớn";
        }
        else
        {
        if (($so>=1000000000) && ($so <= 999999999999999))    //TỶ
            {
                $ty = floor(($so / 1000000000));
            $gia = $ty." tỷ";
            $conlai=round((($so-$ty*1000000000)/1000000),1);
            if($conlai>0){
                $conlai=$conlai. ' triệu';
            }
            else{
                $conlai='';
            }
            
            }else{
                
            
            if (($so>=1000000) && ($so < 1000000000)) //TRIỆU
            {$trieu = round(($so / 1000000),2);
            $gia = $trieu." triệu";
            $conlai='';
            }
            else{
               $gia=$so;
                $conlai='';
            }
            }
            
        }
        return $gia. " $conlai"; 
}