<?

 

function dochangchuc($so,$daydu){

  $mangso = array('Không','Một','Hai','Ba','Bốn','Năm','Sáu','Bảy','Tám','Chín');

  $chuoi = "";

  $chuc = floor($so/10);

  $donvi = $so%10;

  if ($chuc>1) {

   $chuoi = " " . $mangso[$chuc] . " mươi";

   if ($donvi==1) {

    $chuoi .= " mốt";

   }

  } else if ($chuc==1) {

   $chuoi = " mười";

   if ($donvi==1) {

    $chuoi .= " một";

   }

  } else if ($daydu && $donvi>0) {

   $chuoi = " lẻ";

  }

  if ($donvi==5 && $chuc>1) {

   $chuoi .= " lăm";

  } else if ($donvi>1||($donvi==1&&chuc==0)) {

   $chuoi .= " " . $mangso[$donvi];

  }

  return $chuoi;

}

function docblock($so,$daydu){

  $mangso = array('Không','Một','Hai','Ba','Bốn','Năm','Sáu','Bảy','Tám','Chín');

  $chuoi = "";

  $tram = floor($so/100);

  $so = $so%100;

  if ($daydu || $tram>0) {

   $chuoi = " " . $mangso[$tram] . " trăm";

   $chuoi .= dochangchuc($so,true);

  } else {

   $chuoi = dochangchuc($so,false);

  }

  return $chuoi;

}

function dochangtrieu($so,$daydu){

  $chuoi = "";

  $trieu = floor($so/1000000);

  $so = $so%1000000;

  if ($trieu>0) {

   $chuoi = docblock($trieu,$daydu) . " triệu";

   $daydu = true;

  }

  $nghin = floor($so/1000);

  $so = $so%1000;

  if ($nghin>0) {

   $chuoi .= docblock($nghin,$daydu) . " nghìn";

   $daydu = true;

  }

  if ($so>0) {

   $chuoi .= docblock($so,$daydu);

  }

  return $chuoi;

}

function docso($so){

   $mangso = array('Không','Một','Hai','Ba','Bốn','Năm','Sáu','Bảy','Tám','Chín');

   if ($so==0) return $mangso[0];

  $chuoi = "";

  $hauto = "";

  do {

   $ty = $so%1000000000;

   $so = floor($so/1000000000);

   if ($so>0) {

    $chuoi = dochangtrieu($ty,true) . $hauto . $chuoi;

   } else {

    $chuoi = dochangtrieu($ty,false) . $hauto . $chuoi;

   }

   $hauto = " tỷ";

  } while ($so>0);

  return ucfirst(trim($chuoi));

}

?>
<div class="wr_page">    
    <div class="index-page">
        <div class="content">
            
            <? include(APPPATH . 'includes/divLeft_thanhvien.php');?>
            
            <!-- Content Right -->
            <div class="user-mright">
                <!-- Đăng tin -->
                <div id="ContentPlaceHolder1_pnMainContent">
	<form action="" method="post" id="frmEdit">   
<div class="module-header-profile">
    <?php echo $this->lang->line('lable_dangkyvip');?>
</div>
<div class="content-pageregister" id="divuserprofiles" style="padding-top: 10px;">
                               
                               <div class="note note-warning" style="text-align: center; font-weight: bold; ;"> Bạn đã đăng ký thành viên <? echo $Loai;?> <br /><br />

                <? if($user['level']=='vip_user'){

                 echo 'Hết hạn vào lúc <b style="color: red;">'.date('H:i d/m/Y',$user['date_vip']+3600*24*30).'</b>';

                }

                ?>

                <? if($user['level']=='sieuvip_user'){

                 echo 'Hết hạn vào lúc <b style="color: red;">'.date('H:i d/m/Y',$user['date_vip']+3600*24*30*3).'</b>';

                }

                ?>
<br /><br /><a href="/nap-tien" rel="nofollow" style="color:#09C">Đăng ký thành viên VIP hoặc gia hạn ở đây</a>
                </div>

                               
                   </div>
</form>
</div>
            </div>
            <? include(APPPATH . 'includes/divRight.php');?>
            
            <div class="clear" style=": "></div>
        </div>
    </div>
    <script src="/Scripts/Members.min.js?v=20151126" type="text/javascript"></script>

            <div class="clear"></div>
        </div>