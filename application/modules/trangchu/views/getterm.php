<?
//{"PhiTruocBa":"0 VN�","PhiDangKiemLuuHanh":"0 VN�","PhiBaoTriDuongBo":"0 VN�","BaoHiemVatChatXe":"0 VN�","BaoHiemTrachNhiemDanSu":"0 VN�","PhiBienSoXe":"0 VN�","PhiSangTenDoiChu":"150,000 VN�","Tong":"150,000 VN�"}
$get=getcontent('http://dothi.net/Handler/UtilityHandler.ashx?v=1&act=InterestBank&bank='.$_POST['bank'].'&term='.$_POST['term'].'&type='.$_POST['type'].''); 
echo $get;
?>