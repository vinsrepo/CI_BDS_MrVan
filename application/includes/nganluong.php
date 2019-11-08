<?php

$merchant_id = '48829';

$password = '1412@2008';

$params=array(
          'func'                        => 'CardCharge',

          'version'                     => '2.0',

          'merchant_id'                 => $merchant_id,

          'merchant_account'            => 'contact@cungthi.vn',

          'merchant_password'           => MD5($merchant_id.'|'.$password),

          'pin_card'                    => $sopin,

          'card_serial'                 => $seri,

          'type_card'                   => $mang,// VNP hoặc VMS hoặc VIETTEL

          'ref_code'                    => time(),

          'client_fullname'             => 'Nguyễn Tấn Quả',

          'client_email'                => 'tanqua.nguyen@gmail.com',

          'client_mobile'               => '0906493329',

 );

$post_field = '';

foreach ($params as $key => $value){

if ($post_field != '') $post_field .= '&';

$post_field .= $key."=".$value;

}

$api_url = "https://www.nganluong.vn/mobile_card.api.post.v2.php"; 

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,$api_url);

curl_setopt($ch, CURLOPT_ENCODING , 'UTF-8'); 

curl_setopt($ch, CURLOPT_VERBOSE, 1);

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 

curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE); 

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

curl_setopt($ch, CURLOPT_POST, 1); 

curl_setopt($ch, CURLOPT_POSTFIELDS, $post_field); 

$result = curl_exec($ch);

$status = curl_getinfo($ch, CURLINFO_HTTP_CODE); $error = curl_error($ch);

if ($result != '' && $status==200){

$arr_result = explode("|",$result); 

if (count($arr_result) == 13) {

$error_code                        = $arr_result[0];

$merchant_id                      = $arr_result[1];

$merchant_account             = $arr_result[2];

$pin_card                            = $arr_result[3];

$card_serial                        = $arr_result[4];

$type_card                         = $arr_result[5];

$ref_code                           = $arr_result[6];

$client_fullname                 = $arr_result[7];

$client_email                      = $arr_result[8];

$client_mobile                    = $arr_result[9];

$card_amount                    = $arr_result[10];

$transaction_amount          = $arr_result[11];

$transaction_id                 = $arr_result[12];

if ($error_code == '00'){
 
                     $amount = $card_amount;
	                 // Xu ly thong tin tai day
                     $data['mn_value']=$amount;
                     $u_info=$this->getAdapterDB('user')->getItem(array('id'=>$getId));
                     if($this->config_site->cf_KM!=''){
                        $money=$u_info['u_money']+$amount+$amount*($this->config_site->cf_KM/100);
                        $total=$amount+$amount*($this->config_site->cf_KM/100);
                     }else{
                        $money=$u_info['u_money']+$amount;
                        $total=$amount;
                     }
                     $this->getAdapterDB('user')->saveItem(array('u_money'=>$money),'',$this->id,$getId);
                     $this->getAdapterDB()->saveItem($data,$values,$this->id,'');
                     $sucsess=$this->translate('Acc of you da dc cong them ').$total.$this->translate('VND');
                     $this->layout()->onLoad="Notices('success','Bạn đã thanh toán thành công thẻ $ten mệnh giá '.$amount.'','')";
}else{
     $this->layout()->onLoad="Notices('error','Thong tin the cao khong hop le !','')";
 
  }
}

}
else{
     $this->layout()->onLoad="Notices('error','Co loi khi xu ly !','')";
}


?>