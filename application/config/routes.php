<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
$route['default_controller'] = "trangchu";
include 'ext_urls.php';
include 'blog_urls.php'; 
include 'sub_urls.php';
$route['lien-he'] = "lienhe";
$route['thanh-vien'] = "thanhvien/danhsachthanhvien";
$route['thanh-vien/trang'] = "thanhvien/danhsachthanhvien";
$route['thanh-vien/trang/(:num)'] = "thanhvien/danhsachthanhvien/$1";
$route['thanh-vien/dang-ky-json'] = "thanhvien/dangkythanhvienJson";
$route['thanh-vien/dang-ky'] = "thanhvien/dangkythanhvien";
$route['thanh-vien/dang-nhap'] = "thanhvien/dangnhap";
$route['thanh-vien/dang-nhap-json'] = "thanhvien/dangnhapJson";
$route['thanh-vien/thoat'] = "thanhvien/thoat";
$route['thanh-vien/doi-avatar'] = "thanhvien/doiavatar";
$route['thanh-vien/doi-mat-khau'] = "thanhvien/doimatkhau";
$route['thanh-vien/sua-thong-tin-ca-nhan'] = "thanhvien/suathongtincanhan";
$route['thanh-vien/(:num)/(.*)'] = "thanhvien/trangcanhan/$1/$2";
$route['thanh-vien/kich-hoat-tai-khoan/(.*)'] = "thanhvien/kichhoattaikhoan/$1";
$route['thanh-vien/tai-khoan-da-bi-khoa'] = "thanhvien/taikhoanbikhoa";
$route['thanh-vien/tai-khoan-chua-kich-hoat'] = "thanhvien/taikhoanchuakichhoat";
$route['thanh-vien/xac-thuc'] = "thanhvien/xacthuc";
$route['thanh-vien/lay-lai-mat-khau/(.*)'] = "thanhvien/datmatkhaumoi/$1";
$route['thanh-vien/quen-mat-khau'] = "thanhvien/quenmatkhau";
$route['admincp/sua-thong-tin-thanh-vien/(:num)'] = "thanhvien/dangkythanhvien/$1";
$route['thong-bao'] = "baiviet/getdanhsachbaiviet/ThongBao";
$route['thong-bao/(:num)'] = "baiviet/getdanhsachbaiviet/ThongBao/$1";
$route['thong-bao/(:num)/(.*)'] = "baiviet/xembaiviet/$1/Xem_BaiViet";
$route['bai-viet/(:num)/(.*)'] = "baiviet/xembaiviet/$1/Xem_GioiThieu";
// $route['dang-ky-thanh-vien-vip'] = "naptien/dangkyvip/vip_user";
// $route['dang-ky-thanh-vien-sieu-vip'] = "naptien/dangkyvip/xsieuvip_user";
// $route['nap-tien'] = "naptien/index";
// $route['nap-tien/kiem-tra-so-du-tai-khoan'] = "naptien/sodutaikhoan";
// $route['nap-tien/chuyen-khoan'] = "naptien/chuyenkhoan";
// $route['nap-tien/thu-truc-tiep'] = "naptien/thutructiep";
// $route['nap-tien/tai-cong-ty'] = "naptien/taicongty";
// $route['ho-tro'] = "hotro";
//dang tin
// $route['ban-xe/tin-rao-cung-nguoi-ban-uid(:num)/(:num)'] = "dangtin/xemdanhmuc/All/All/$2/PB/UID/$1";
// $route['ban-xe/tin-rao-cung-nguoi-ban-uid(:num)'] = "dangtin/xemdanhmuc/All/All/1/PB/UID/$1";
$route['bds-ban/(:num)'] = "dangtin/xemdanhmuc/All1/449/$1";
$route['bds-ban'] = "dangtin/xemdanhmuc/All1/449";
$route['bds-cho-thue/(:num)'] = "dangtin/xemdanhmuc/All/451/$1";
$route['bds-cho-thue'] = "dangtin/xemdanhmuc/All1/451";
// $route['oto/c(:num)/(.*)/trang/(:num)'] = "dangtin/xemdanhmuc/HangXe/$1/$3";
// $route['oto/c(:num)/(.*)/trang'] = "dangtin/xemdanhmuc/HangXe/$1";
// $route['oto/c(:num)/(.*)'] = "dangtin/xemdanhmuc/HangXe/$1";
// $route['oto/p(:num)/(.*)/trang/(:num)'] = "dangtin/xemdanhmuc/DoiXe/$1/$3";
// $route['oto/p(:num)/(.*)/trang'] = "dangtin/xemdanhmuc/DoiXe/$1";
// $route['oto/p(:num)/(.*)'] = "dangtin/xemdanhmuc/DoiXe/$1"; 
$route['dang-tin-ban-cho-thue-nha-dat'] = "dangtin/dangtinbanxe";
// $route['dang-tin-mua-xe'] = "dangtin/dangtinmuaxe";
$route['sua-tin-rao/(:num)'] = "dangtin/dangtinbanxe/$1";
$route['duyet-tin/(:num)'] = "dangtin/duyettin/$1";
$route['an-tin/(:num)'] = "dangtin/antin/$1";
$route['hien-tin/(:num)'] = "dangtin/hientin/$1";
// $route['sua-tin-mua-xe/(:num)'] = "dangtin/dangtinmuaxe/$1";
$route['(:any)-pr(:num)'] = "dangtin/xemtinban/$2";
$route['thanh-vien/quan-ly-tin-rao'] = "dangtin/quanlytinban";
$route['thanh-vien/quan-ly-tin-rao/(:num)'] = "dangtin/quanlytinban/$1";
// $route['thanh-vien/quan-ly-tin-da-luu'] = "dangtin/quanlytinluu";
// $route['thanh-vien/quan-ly-tin-da-luu/(:num)'] = "dangtin/quanlytinluu/$1";
// $route['quan-ly-tin-mua-xe'] = "dangtin/quanlytinmua";
// $route['quan-ly-tin-mua-xe/(:num)'] = "dangtin/quanlytinmua/$1";
// $route['xoa-tin-mua-xe/(:num)'] = "dangtin/xoatin/tin-mua/$1";
$route['xoa-tin-bds/(:num)'] = "dangtin/xoatin/tin-ban/$1";
// $route['mua-xe-toan-quoc'] = "dangtin/tinmuaxe";
// $route['mua-xe-toan-quoc/(:num)'] = "dangtin/tinmuaxe/$1";
// $route['mua-xe'] = "dangtin/tinmuaxe";
// $route['mua-xe/(:num)'] = "dangtin/tinmuaxe/$1";
// $route['mua-xe/(.*)-(:num)'] = "dangtin/xemtinmua/$2";
// $route['mua-xe-oto-toan-quoc'] = "dangtin/tinmuaxe";
// $route['mua-xe-oto-toan-quoc/(:num)'] = "dangtin/tinmuaxe/$1";
// $route['mua-xe-oto'] = "dangtin/tinmuaxe";
// $route['mua-xe-oto/(:num)'] = "dangtin/tinmuaxe/$1";
// $route['mua-xe-oto/(.*)-(:num)'] = "dangtin/xemtinmua/$2";
//salon oto
// $route['quan-ly-salon-oto'] = "salon/caidatsalon";
// $route['quan-ly-salon-oto/(:num)'] = "salon/caidatsalon/$1";
// $route['quan-ly-salon-oto/lien-he'] = "salon/quanlylienhe";
// $route['quan-ly-salon-oto/lien-he/(:num)'] = "salon/quanlylienhe/$1";
// $route['quan-ly-salon-oto/them-xe-ban-moi'] = "dangtin/dangtinbanxe/salon";
// $route['quan-ly-salon-oto/xe-dang-ban'] = "dangtin/quanlytinbansalon";
// $route['quan-ly-salon-oto/xe-dang-ban/(:num)'] = "dangtin/quanlytinbansalon/$1";
// $route['salons-xe-moi/(:num)'] = 'salon/salonoto/$1//Xe mới';
// $route['salons-xe-moi'] = 'salon/salonoto/1//Xe mới';
// $route['salons-xe-cu/(:num)'] = 'salon/salonoto/$1//Xe đã dùng';
// $route['salons-xe-cu'] = 'salon/salonoto/1//Xe đã dùng';
// $route['salon-oto'] = "salon/salonoto";
// $route['salon-oto/?city=(.*)'] = "salon/salonoto/$1";
//
$route['trang-ca-nhan'] = "thanhvien/profile";
// $route['sitemap'] = "trangchu/sitemap";
// $route['bao-gia'] = "baiviet/baogia";
// $route['auto/_report'] = "trangchu/gopy";
// $route['auto/_report1'] = "dangtin/gopy";
// $route['auto/send'] = "trangchu/guitin";
// $route['auto/send1'] = "dangtin/guitin";
//
$route['du-an'] = "salon/salonoto";
$route['du-an/(:num)'] = "salon/salonoto//$1";
$route['du-an/(:any)'] = "salon/salonoto/$1/1";
$route['(:any)pj(:num)'] = "salon/trangchusalon/$2"; 
$route['404_override'] = 'loi404';
$route['maxacnhan/captcha'] = "captcha";
//
// $route['dang-ky-nhan-tin'] = "trangchu/dichvusearch/m";
// $route['phong-thuy-theo-tuoi'] = "trangchu/chiphi/m";
$route['Services/SearchService'] = "trangchu/dichvusearch";
$route['contact'] = "trangchu/contactform";
// $route['Handler/EmailLetterHandler.ashx'] = "trangchu/letter";
// $route['quan-ly-the-nap'] = 'naptien/home_quanlythenap';
// $route['lich-su-giao-dich'] = 'naptien/home_lichsugiaodich';
//
// $route['uoc-tinh-vay-ngan-hang'] = "trangchu/nganhang";
// $route['chi-phi-lan-banh'] = "trangchu/chiphi";
$route['chon-mau-xe'] = "trangchu/mauxe";
// $route['youtube'] = "dangtin/youtube";
$route['xoa-contact/(:num)'] = "trangchu/xoaContact/$1";
$route['cost/calculator'] = "trangchu/calculator";
$route['interest/getterm'] = "trangchu/getterm";
$route['interest/getall'] = "trangchu/getall";
$route['interest/getinterest'] = "trangchu/getinterest";
$route['tai-ve/(:any)'] = "trangchu/getrepaymentschedule/$1"; 
// $route['van-ban-nganh-xay-dung'] = "trangchu/phongthuy";
// $route['van-ban-nganh-xay-dung/(.*)'] = "trangchu/phongthuy/$1";
/* End of file routes.php */
/* Location: ./application/config/routes.php */