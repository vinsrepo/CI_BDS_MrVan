<?
$giatri=$this->session->userdata($key);//print_r($giatri);
                    if(strpos($giatri,'<')!==false){
                    $dieukien[$key.' <']=str_replace('<','',$giatri);
                    }elseif(strpos($giatri,'>')!==false){
                    $dieukien[$key.' >']=str_replace('>','',$giatri);
                    }else{
                    $khoang1=preg_replace('/([0-9]+)-([0-9]+)/',"$1",$giatri);
                    $khoang2=preg_replace('/([0-9]+)-([0-9]+)/',"$2",$giatri);
                    $dieukien[$key.' >=']=$khoang1;
                    $dieukien[$key.' <=']=$khoang2;
                    }