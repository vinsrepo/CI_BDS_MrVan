<?php
$tt=Modules::run('trangchu/getInfo','cauhinh','Loai','NapTien');
           $tt=json_decode($tt['GiaTri'],true);
$merchant_id = $tt['merchant_id'];

$password = $tt['password'];

$params=array(
          'func'                        => 'CardCharge',

          'version'                     => '2.0',

          'merchant_id'                 => $merchant_id,

          'merchant_account'            => $tt['merchant_account'],

          'merchant_password'           => MD5($merchant_id.'|'.$password),

          'pin_card'                    => $sopin,

          'card_serial'                 => $seri,

          'type_card'                   => $mang,// VNP hoặc VMS hoặc VIETTEL

          'ref_code'                    => time(),

          'client_fullname'             => $tt['client_fullname'],

          'client_email'                => $tt['client_email'],

          'client_mobile'               => $tt['client_mobile'],

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
                     $money=$user['money']+$amount; 
                     $this->default_model->updateDuLieu('thanhvien',array('money'=>$money),array("userid" => $this->session->userdata('userid'))); 
                     //$this->default_model->addDuLieuMoi('naptien',array('NguoiNap'=>$this->session->userdata('userid'),'loaithe'=>$ten,'sopin'=>$sopin,'soserial'=>$seri,'menhgia'=>$amount,'TrangThai'=>1)); 
                     //$this->getAdapterDB()->saveItem($data,$values,$this->id,''); 
                     echo '<script>alert("Ban da thanh toan thanh cong the cao '.$ten.' với menh gia '.$amount.'");window.location="/nap-tien/kiem-tra-so-du-tai-khoan";</script>';
}else{
     echo '<script>alert("The nap sai hoac da duoc su dung ban vui long kiem tra lai !")</script>'; 
  }
}

}
else{
     echo '<script>alert("Co loi khi xu ly !")</script>'; 
}
 