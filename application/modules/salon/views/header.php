<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
$host=$_SERVER['HTTP_HOST'];
$name_site=preg_replace('/([a-z0-9A-Z_-]+)\.([a-z0-9A-Z_-]+)\.([a-z]+)/', '$2.$3', $host);
$subdomain=str_replace(".".$name_site, '', $host);
$sa=Modules::run('trangchu/getInfo','salon','Domain',$subdomain);
 if($sa==FALSE){
    echo Modules::run('loi404');
    exit();
 }
 error_reporting(0);
?>
<?php
     
    $data=json_decode($info['GiaTri']);
    error_reporting(0);
	
    ?><head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="SHORTCUT ICON" href="/style/images/favicon.ico" />
    <meta name="google-site-verification" content="ZISLFXP9puZFE1ujmE1c_gtCIsTX6NWvNdq9V0GYu-0" /><!--youtube verify-->
    <title><?php echo $title;?> - <?php echo $data->{'TenTrangWeb'};?></title>
    <meta name="keywords" content="<?php echo $data->{'MoTa'};?>" />
    <meta name="description" content="<? $NoiDung=''.substr($salon_info['GioiThieu'],0,200).'';
                                       $NoiDung=substr($NoiDung, 0, strrpos($NoiDung, ' ')).'...';
                                       echo $NoiDung;?>" />  
    
    
    <link rel="alternate" href="http://m.banxehoi.com/" media="only screen and (max-width: 640px)" /><link rel="alternate" href="http://m.banxehoi.com/" media="handheld" />    
    <meta property="fb:app_id" content="314961368702265" />  
    <meta property="article:section" content="Auto, News" />    
    <meta property="article:tag" content="<?php echo $data->{'MoTa'};?>" />
    <meta property="og:site_name" content="<?php echo $title;?>" />
<meta property='og:title' content='<?php echo $data->{'TenTrangWeb'};?>'/>
<meta property="og:type" content="article" />
<meta property="og:description" content="<?php echo $NoiDung;?>" />
<meta property="og:url" content="http://banxehoi.com/" />
<meta property="og:image" content="http://banxehoi.com/Images/banner.jpg" />
<meta property="og:image:type" content="image/jpg" />
<meta property="og:image:width" content="1000" />
<meta property="og:image:height" content="288" />
    
    <meta name="p:domain_verify" content="61006787b124378683af5c15aba41d13" />
    <meta name="p:domain_verify" content="75e6c955fdb80a732ed0b943ddba7445"/><!--pinterest verify-->
    <script src='/style/js/jquery-1.7.1.min.js'></script>
    <script src='/style/js/jquery.hashchange.min.js'></script>
    <script src='/style/js/jquery.flexisel.js'></script>
    <script src='/style/js/jquery.cookie-1.4.1.js'></script>
    <script src='/style/js/jquery-ui.js'></script>
    <script src="/style/js/jquery.fancybox.js"></script>    
    <script src="/style/js/jquery.scrollToTop.min.js"></script> 
    <script src='/style/icheck-1.x/icheck.min.js'></script> 
    <script src='/style/js/main.js?v=20150831'></script> 
    
    <link rel='stylesheet' type='text/css' href='/style/css/MainStyle.css?v=20150831' />      
    <!--[if IE 8]>
    <link rel="stylesheet" href="/Styles/ie8.css?v=20150226">
    <![endif]-->   
    <link href="/style/css/jquery.fancybox.css" rel="stylesheet" />        
    <link href="/style/css/jquery-ui.css?v=20150404" rel="stylesheet" />
    <link href="/style/css/shop-icon.css" rel="stylesheet" />    
    <link href="/style/icheck-1.x/skins/square/blue.css" rel="stylesheet" />
    
    <script type="text/javascript" src="/style/js/jwplayer.js"></script>
    <script type='text/javascript'>
        $(document).ready(function () {
            jwplayer.key = "5qMQ1qMprX8KZ79H695ZPnH4X4zDHiI0rCXt1g==";
        });
        var domainCookie = 'http://banxehoi.com';
        var productId = '0';
        var userId = '';
        //GA
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date(); a = s.createElement(o),
            m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-57229882-1', 'auto');
        ga('send', 'pageview');
        //eof GA        
    </script>
    <script>
        (function () {
            var _fbq = window._fbq || (window._fbq = []);
            if (!_fbq.loaded) {
                var fbds = document.createElement('script');
                fbds.async = true;
                fbds.src = '//connect.facebook.net/en_US/fbds.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(fbds, s);
                _fbq.loaded = true;
            }
            _fbq.push(['addPixelId', '1854420384783152']);
        })();
        window._fbq = window._fbq || [];
        window._fbq.push(['track', 'PixelInitialized', {}]);
    </script>    
</head>
<body>
    <noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?id=1854420384783152&amp;ev=PixelInitialized" /></noscript>
    <input value="0" type="hidden" id="hidmenu" />
    <div class="pagewrap">
        <script>var page = 'isHome';</script>
        
<script src="/style/jss/jquery.nicescroll.js"></script>
<div class="pageheader">
    <div class="divlogo">
        <a href="/"><img alt="<? echo $salon_info['TenSalon'];?>" src="http://<? echo $_SERVER['HTTP_HOST'];?>/upload/photo/<? echo $salon_info['LoGo'];?>" class="logo" style="max-height: 80px;" /></a> 
    </div> 
    <div class="headerbanner" style="float: right;padding-top: 20px;padding-right: 20px;">   
          <h2 class="title">Hotline <? echo $salon_info['TenSalon'];?>: <span class="title" style="text-align: right;color: red;"><? echo $salon_info['DienThoai'];?></span></h2>
          
    </div>
</div>

<div id="sticky">
    <div class="pagemenu">
        <div class="content-pagemenu">
             <li class="first">
                    <a href="http://<? echo $name_site;?>" id="tc"><img src="/style/images/homev3.png"></a>
             </li> 
             <?
             $menus=array('gioi-thieu'=>'GIỚI THIỆU','xe-dang-ban'=>'XE BÁN','ban-do'=>'BẢN ĐỒ','lien-he'=>'LIÊN HỆ','tin-tuc'=>'TIN TỨC','danh-gia-xe'=>'ĐÁNH GIÁ XE','so-sanh-xe'=>'SO SÁNH XE','kinh-nghiem'=>'KINH NGHIỆM','tu-van-xe'=>'TƯ VẤN XE','video-o-to'=>'VIDEO','dich-vu'=>'DỊCH VỤ');
             foreach($menus as $link=>$menu){
                $class=$link==$this->uri->segment(1)?'activemenu':'';
                echo '
                    <li class="'.$class.'"><a href="/'.$link.'"> '.$menu.'</a>     </li>
                ';
             }
             ?>
        </div>
    </div>
</div>

<script>
    activemenuheader();
    $("body").on("click", "#dangnhap", function () {
        $('#dangnhap').fancybox({
            fitToView: false,
            autoCenter: false
        });
    });
    $("body").on("click", "#dangky", function () {
        $('#dangky').fancybox({
            fitToView: false,            
            autoCenter: false
        });
    });

    $('#banxe').hover(function () {
        $(this).find(".submenuv2").show();
    },
        function () {
            $(this).find(".submenuv2").hide(); 
        });

    //$('.submenuv2 .item>a').showmodelbymake();
</script>
 <script src="/style/js/jquery.sticky.js"></script>
<script>
    $(document).ready(function () {
        $("#sticky").sticky({ topSpacing: 0 });
        $("#sticker").sticky({ topSpacing: $("#sticky").height() });
    });
</script>
     
 <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script>
//var $tiena4vn = jQuery.noConflict();
</script>

<script type="text/javascript">
<!-- 
	var base_url='';
//-->
</script>	