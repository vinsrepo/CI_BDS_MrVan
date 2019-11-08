<!doctype html>
<?php   
    $data=json_decode($info['GiaTri']);
    error_reporting(0);
    ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head><meta charset="utf-8" />
<title>
    <?php echo $title;?> 
</title>
    <link href="https://sannhadat.vip/style/images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <link href="/style/css/bootstrap.min.css?v=2015112" rel="stylesheet" />
    <link href="/style/css/reset.css" rel="stylesheet" />
    <link href="/style/css/Styles.min.css?v=20151126" rel="stylesheet" />
    <!-- <link href="/style/css/jquery-ui.min.css" rel="stylesheet" /> -->
    <link href="/style/css/shop-icon.css" rel="stylesheet" />
    <link href="/style/css/fontawesome-all.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/prettyPhoto/3.1.6/css/prettyPhoto.min.css">
    <!-- Scripts -->
    <!-- <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.7.1.min.js"></script> -->
    <script src="/style/js/jquery-3.4.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="/style/js/bootstrap.min.js"></script>
    <script src="/style/js/jquery-ui.js"></script>
    <!-- <script src="/style/js/select2.full.min.js"></script> -->
    <script src="/style/js/jquery.prettyPhoto.js"></script>
    <script src="/style/js/jquery.excoloSlider.js"></script>
    <link href="/style/css/jquery.excoloSlider.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="/style/css/jquery.fancybox.min.css" media="all" />
    <script src="/style/js/jquery.scrollToTop.min.js"></script> 
    <script type="text/javascript" src="/style/js/jquery.fancybox.js"></script>
    <script type="text/javascript" src="/style/js/jquery.placeholder.min.js"></script>
    <script src="/style/js/jquery.cookie-1.4.1.js" type="text/javascript"></script>
    <script src="/style/js/fontawesome-all.min.js"></script>
    <script src="/style/js/Common.min.js?v=20151126"></script>
    <script type="text/javascript">
        var domainCookie = '<? echo $_SERVER['HTTP_HOST'];?>'
        var productId = '<? echo $xemtinban['IDMaTin'];?>';
        var userId = '<? echo $user_info['userid'];?>';
        var base_url='<? echo base_url();?>';
    </script>
    <meta name="keywords" content="<?php if($keyword!=''){echo $keyword;}else{echo $data->{'MoTa'};} ?>" />
    <meta name="description" content="<?php echo $description;?>" />
    <meta http-equiv="content-language" content="vi" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo $data->{'google_analytics'};?>
    <?php echo $data->{'webmaster_tool'};?>
    
<link media="only screen and (max-width: 640px)" rel="alternate" href="http://m.<? echo $_SERVER['HTTP_HOST'];?>/" /><link media="handheld" rel="alternate" href="http://m.<? echo $_SERVER['HTTP_HOST'];?>/" />
<?php echo $map['js']; ?>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5d0462ff53d10a56bd7a2dbc/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</head>
<body>  
<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="#">Features</a>
            <a class="nav-item nav-link" href="#">Pricing</a>
            <a class="nav-item nav-link disabled" href="#">Disabled</a>
        </div>
    </div>
</nav> -->

<div class="menu">
    <nav class="nav_menu navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/" title="Sàn nhà đất">
            <img src="/style/images/logo_header.png" alt="Sàn nhà đất" width="120px" height="65px">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="menu-content collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="nav-menu navbar-nav">
                <li class="lv0 <? echo $this->uri->segment(1)==""?'active':"";?> nav-item nav-link nav_tc">
                    <a href="/" title="Trang chủ">TRANG CHỦ
                    </a>
                </li>
                <? //ford 
                //echo Modules::run('baiviet/menu','MenuHeader');
                $menucats=Modules::run('trangchu/getList','baiviet',4000,0,'SapXep asc, NgayGui asc','IDBaiViet',"Loai IN('DanhMuc','MenuHeader') and TrangThai=1");
                include_once(APPPATH . 'includes/chuyendau.php');
                $newmenus=dataWidthKeyID($menucats,array('IDBaiViet',array('Loai','DanhMuc'),array('MenuCha','')),'IDBaiViet');    //print_r($newmenus);
                $danhmucs=dataWidthKeyID($newmenus['MenuCha'][0],array(array('Loai','DanhMuc')),'IDBaiViet'); 
                $menuheaders=dataWidthKeyID($newmenus['MenuCha'][0],array(array('Loai','MenuHeader')),'IDBaiViet');
                $stt=0;  
                foreach(array_merge($danhmucs['Loai'],$menuheaders['Loai']) as $val){ 
                $activeTab=$val['IDBaiViet']==$HangXe['MenuCha']||$HangXe['IDBaiViet']==$val['IDBaiViet']||$cha_info['MenuCha']==$val['IDBaiViet']||$cha_info['IDBaiViet']==$val['IDBaiViet']||$this->uri->segment(1)==stripUnicode($val['TieuDe'])||$cat_info['MenuCha']==$val['IDBaiViet']?' active':''; 
                if(isset($newmenus['MenuCha'][$val['IDBaiViet']])){
                $sub2='
                <ul class="dropdown-menu">
                ';
                foreach($newmenus['MenuCha'][$val['IDBaiViet']] as $submenu){
                    $subactiveTab=$submenu['IDBaiViet']==$HangXe['MenuCha']||$HangXe['IDBaiViet']==$submenu['IDBaiViet']||$cha_info['IDBaiViet']==$submenu['IDBaiViet']||$this->uri->segment(1)==stripUnicode($submenu['TieuDe'])?' active':''; 
                    $sub2.='<li class="lv1 '.$subactiveTab.'"><a href="/'.strtolower(isset($submenu['Link'])&&$submenu['Link']!=''?$submenu['Link']:stripUnicode($submenu['TieuDe'])).'" title="'.$submenu['TieuDe'].'">'.$submenu['TieuDe'].'</a></li>';
                }
                
                $sub2.='            
                </ul>
                ';
                }else{
                    $sub2='';
                }
                echo' <li class="lv0 '.$activeTab.' nav-item nav-link"><a href="/'.strtolower(isset($val['Link'])&&$val['Link']!=''?$val['Link']:stripUnicode($val['TieuDe'])).'" title="'.$val['TieuDe'].'">'.$val['TieuDe'].'</a> 
                            '.$sub2.'
                        </li>'; 
                }
                ?>
                 <li class="lv0 <? echo $this->uri->segment(1)=="gioi-thieu"?'active':"";?> nav-item nav-link">
                    <a href="/gioi-thieu" title="Trang chủ">GIỚI THIỆU
                    </a>
                </li>
                <? if($this->session->userdata('userid')==FALSE):?>
                    <li class="postnew lv0 btn_login nav-item nav-link">
                        <a href="javascript:void(0)" title="Đăng tin">ĐĂNG TIN</a>
                    </li>
                <? else:?>    
                <li class="postnew lv0 <? echo $this->uri->segment(1)=="dang-tin-ban-cho-thue-nha-dat"?'active':"";?> nav-item nav-link">
                    <a href="/dang-tin-ban-cho-thue-nha-dat" title="Đăng tin">ĐĂNG TIN</a>
                </li>
                <? endif?>
                <? if($this->session->userdata('userid')==FALSE):?>
                <!-- <div class="dropdown" style="top:1px; height: 0;"> -->
                    <a id="btn_login" style="top:1px; height: 0;" class="btn_login pr-0 leading-none d-flex" href="javascript:void(0)"
                       title="ad">
                        <span class="btn btn-lg text-white p-2">
                            <img src="https://sannhadat.vip/style/images/user_48.png" alt="Đăng ký, đăng nhập" title="Đăng ký, đăng nhập">
                            <!-- <i class="far fa-user-circle"></i> -->
                        </span>
                    </a>  
                    <? else:?>
                    <div class="dropdown" style="top:4px;height: 58px;">
                        <a class="nav-link pr-0 leading-none d-flex" data-toggle="dropdown" href="#" rel="nofollow" style="width:200px;">
                            <span class="avatar avatar-md brround"
                                  style="background-image: url(<? echo base_url().$user_info['Avatar'];?>);background-size: contain;"
                                  title="<? echo $user_info['username'];?>"></span>
                            <span class="ml-2 mt-2 d-none d-lg-block">
                                <span class="text-white"><? echo $user_info['username'];?></span>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <a class="dropdown-item" href="/thanh-vien/quan-ly-tin-rao" rel="nofollow" title="Thông tin">
                                <i class="fa fa-user"></i>
                                Thông tin cá nhân
                            </a>
                            <a class="dropdown-item" onclick="return confirm('<?php echo $this->lang->line('lable_confirm_logout');?>');" href="/thanh-vien/thoat.html" rel="nofollow">
                                <i class="fa fa-sign-out-alt"></i><span> Thoát</span>
                            </a>
                        </div>                        
                    </div>
                    <? endif?>
            </ul>
        </div>
    </nav>    
</div>
<?php 
    $this->load->view('thanhvien/form_dangkythanhvien');
?>

<script type="text/javascript">
    var href = window.location.pathname;
    var a_return = new Array(); // Danh sách Url được active
    var AllUrl = new Array(); // arr Url
    var ElementUrl = $(".nav-menu li a");

    var arrHref = href.split("/"); // phân tích current url 

    for (var i = 0; i < ElementUrl.length; i++) {
        var abc = ElementUrl[i].toString().split("/");
        if (abc.length > 3) {
            AllUrl.push(abc[3].replace(".htm", "")); // lấy được arr url
        }
    }

    if (arrHref.length >= 2) {
        var currentUrl = arrHref[1];
        for (var i = 0; i < AllUrl.length; i++) {
            var _index = currentUrl.search(AllUrl[i]); //Duyet chuoi danh sach Url de so sanh voi Current Url
            if (_index != -1) {
                a_return.push(AllUrl[i]); //Neu la tap con cua URL thi add vao array 
            }
        }
    }

    var return_data = "";
    var return_index = 0;
    for (x in a_return) {
        if (a_return[x].length > return_index) {//so sanh do dai lon nhat trung` voi URL thi lay gia tri
            return_index = a_return[x].length;
            return_data = a_return[x]; //gia tri can lay (duy nhat 1 gia tri)
        }
    }
    var taga = $('.nav-menu,.dropdown-menu').find('a[href=\'/' + return_data + '.htm\']');

    if (taga.length > 0) {
        setActiveClass(taga, 0);
    }

    function setActiveClass(tag, interval) {
        $(".lv0").removeClass('active');
        tag.addClass('active');
        if (tag.hasClass('lv0')) {
            return;
        }
        interval++;
        if (interval <= 3) { // Menu dothi chỉ có 2 cấp, ul > li > ul > li. ra 3 cấp mới set được parrent
            setActiveClass(tag.parent(), interval);
        } else {
        }
    }
    $('.btn_login').click(function(){
        $('#formModal').modal('show');
    });
</script>