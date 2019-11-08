<!DOCTYPE html>
<html lang="vi" xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">
<head>
<?php
     
    $data=json_decode($info['GiaTri']);
    error_reporting(0);
	
    ?>
<title>
	<?php echo $title;?> | <? echo $_SERVER['HTTP_HOST'];?>
</title>
    <link href="/style/css/bootstrap.min.css?v=2015112" rel="stylesheet" />
    <link href="/style/css/fontawesome-all.css" rel="stylesheet" />
    <link href="/style/mobile/css/Site.css?v=20151221" rel="stylesheet" />
    <link href="/style/mobile/css/StyleSheet1.css?v=20151221" rel="stylesheet" /> 
    <link href="/style/images/favicon.ico?v=2" rel="shortcut icon" type="image/x-icon" /><meta name="viewport" content="width=device-width" /><meta content="yes" name="apple-mobile-web-app-capable" /><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><meta name="format-detection" content="telephone=no" /><meta name="keywords" content="<?php if($keyword!=''){echo $keyword;}else{echo $data->{'MoTa'};} ?>" /><meta name="description" content="<?php echo $description;?>" /><meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /><meta name="apple-mobile-web-app-capable" content="yes" /><meta name="dc.language" content="vi-VN"/>

    <script src="/style/js/jquery-3.4.0.min.js"></script>
    <script src="/style/js/bootstrap.min.js"></script>
    <script src="/style/mobile/js/jquery.cookie-1.4.1.js"></script>
    <script src="/style/mobile/js/jquery.numeric.min.js"></script>
    <script type="text/javascript">
        var domainCookie = '<? echo $_SERVER['HTTP_HOST'];?>';
        var productId = '<? echo $xemtinban['IDMaTin'];?>';
        var userId = '<? echo $user_info['userid'];?>';
        var base_url='<? echo base_url();?>';
    </script>
    <script src="/style/mobile/js/dothi-mobile.js?v=20151221"></script>
    <?php echo $data->{'google_analytics'};?>
    <?php echo $data->{'webmaster_tool'};?>
    
<meta name="title" content="<?php echo $title;?> - <? echo $_SERVER['HTTP_HOST'];?>" /><link rel="canonical" href="<? echo base_url();?>" />
<?php echo $map['js']; ?>
</head>
<body> 
<style>
    .div_logo a:hover {
        text-decoration: none;
    }
</style>       
<div class="menuleft">
    <div class="div_logo">
        <a href="/" class="a_logo">
            <img title="Sàn nhà đất" alt="Sàn nhà đất" src="/style/images/logo_mobile.png">
            <span style="color:#ffffffd9;font-size: 18px;font-family: 'Bangers', cursive;margin: 0px -6px;">Sàn nhà đất</span>
        </a>
        <a href="javascript:HideMenu();" class="closemenu">
            <img src="/style/mobile/images/closesearch.png" /></a>
    </div>
    <ul class="content-menu">
        <? if($this->session->userdata('userid')==FALSE):?>
            <li>
                <a href="/thanh-vien/dang-nhap.html" class="item">Đăng nhập - Đăng ký</a>
            </li>
            <? else:?>
            <li>
                <a href="/trang-ca-nhan" rel="nofollow" id="dangnhap" title="<? echo $user_info['username'];?>">
                    <span>Chào </span>, <b style="color: #563800;"><? echo $user_info['HoVaTen'];?></b>
                </a>
            </li>
        <? endif?>     
        <li><a href="<?php echo base_url() ?>">Trang chủ</a></li>
        <li><a href="/nha-dat-ban" class="item">Bất động sản bán</a></li>
        <li><a href="/nha-dat-cho-thue" class="item">Bất động sản cho thuê</a></li>
        <? if($this->session->userdata('userid')==TRUE):?>
            <li>
                <a href="/thanh-vien/quan-ly-tin-rao" class="item">Quản lý tin rao</a>
            </li>
            <li>
                <a href="/dang-tin-ban-cho-thue-nha-dat" class="item">Đăng tin</a>
            </li>                   
        <? endif?>
        <!-- <li><a href="/thanh-vien/quan-ly-tin-da-luu" class="item">Tin rao đã lưu</a></li> 
        <li><a href="/thiet-ke-kien-truc" class="item">Thiết kế kiến trúc</a></li>
        <li><a href="/khong-gian-song" class="item">Không gian sống</a></li>
        <li><a href="/phong-thuy" class="item">Phong thủy</a></li>
        <li><a href="/tu-van-luat" class="item">Tư vấn luật</a></li>
        <li><a href="/du-an" class="item">Dự án</a></li>
        <li>
            <a href="javascript:void(0)" class="item">Hỗ trợ khác</a>
            <ul>
                <li><a href="/dang-ky-nhan-tin">Đăng ký nhận tin</a></li>
                <li><a href="/phong-thuy-theo-tuoi">Phong thủy theo tuổi</a></li>
            </ul>
        </li> -->
        <li><a href="/gioi-thieu" class="item">Giới thiệu</a></li>
        <li><a href="/lien-he" class="item">Liên hệ</a></li>
        <? if($this->session->userdata('userid')==TRUE):?>
            <li><a href="/thanh-vien/thoat" class="item">Đăng xuất</a></li>          
        <? endif?>
        
    </ul>
</div>
<div class="body-shadow" onclick="HideMenu();"></div>
<div class="body-shadow2" onclick="HideMenu();"></div>
<div class="content-page">
    <div class="page-body">
        <div class="kheader" onclick="CloseShareListing();">
            <div class="div_logo">
                <a href="/">
                    <img src="/style/images/logo_mobile.png" alt="Sàn nhà đất" title="Sàn nhà đất" />
                    <span style="color:#ffffffd9; font-size: 18px;font-family: 'Bangers', cursive;margin: 0px -6px;">Sàn nhà đất</span>
                </a>
            </div>
            <div class="div_logo2">
                <div class="div_menu" id="div_menu">
                    <a href="javascript:showMenu();" rel="nofollow">
                        <img src="/style/mobile/images/menu.png" />
                    </a>
                </div>
            </div>
            <span id="lblRedirect"></span>
            <div class="clear"></div>
        </div>
    <div class="content-bodypage">
<div class="content_default">