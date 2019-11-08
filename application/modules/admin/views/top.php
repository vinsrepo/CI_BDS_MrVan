<!DOCTYPE html>
<html class=" ">
    <head>  
        <meta charset="utf-8" />
        <title><? if(!isset($title)||$title==''){echo 'HỆ THỐNG QUẢN TRỊ WEBSITE - ADMIN CONTROL PANEL';}else{ echo $title;}?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        <link rel="shortcut icon" href="/admincp/themes/ultra-admin-2.1/assets/images/favicon.png" type="image/x-icon" />    <!-- Favicon -->
        <link rel="apple-touch-icon-precomposed" href="/admincp/themes/ultra-admin-2.1/assets/images/apple-touch-icon-57-precomposed.png">	<!-- For iPhone -->
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/admincp/themes/ultra-admin-2.1/assets/images/apple-touch-icon-114-precomposed.png">    <!-- For iPhone 4 Retina display -->
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/admincp/themes/ultra-admin-2.1/assets/images/apple-touch-icon-72-precomposed.png">    <!-- For iPad -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/admincp/themes/ultra-admin-2.1/assets/images/apple-touch-icon-144-precomposed.png">    <!-- For iPad Retina display -->
 
        <!-- CORE CSS FRAMEWORK Thoát - START -->
        <link href="/admincp/themes/ultra-admin-2.1/assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="/admincp/themes/ultra-admin-2.1/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="/admincp/themes/ultra-admin-2.1/assets/plugins/bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="/admincp/themes/ultra-admin-2.1/assets/fonts/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="/admincp/themes/ultra-admin-2.1/assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
        <link href="/admincp/themes/ultra-admin-2.1/assets/plugins/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" type="text/css"/>
        <!-- CORE CSS FRAMEWORK - END -->
        
        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
        <link href="/admincp/themes/ultra-admin-2.1/assets/plugins/icheck/skins/all.css" rel="stylesheet" type="text/css" media="screen"/>        
        <link href="/admincp/themes/ultra-admin-2.1/assets/plugins/tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" media="screen"/>
        <? if($this->uri->segment(2)==''){?>
        <link href="/admincp/themes/ultra-admin-2.1/assets/plugins/morris-chart/css/morris.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="/admincp/themes/ultra-admin-2.1/assets/plugins/jquery-ui/smoothness/jquery-ui.min.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="/admincp/themes/ultra-admin-2.1/assets/plugins/rickshaw-chart/css/graph.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="/admincp/themes/ultra-admin-2.1/assets/plugins/rickshaw-chart/css/detail.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="/admincp/themes/ultra-admin-2.1/assets/plugins/rickshaw-chart/css/legend.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="/admincp/themes/ultra-admin-2.1/assets/plugins/rickshaw-chart/css/extensions.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="/admincp/themes/ultra-admin-2.1/assets/plugins/rickshaw-chart/css/rickshaw.min.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="/admincp/themes/ultra-admin-2.1/assets/plugins/rickshaw-chart/css/lines.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="/admincp/themes/ultra-admin-2.1/assets/plugins/jvectormap/jquery-jvectormap-2.0.1.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="/admincp/themes/ultra-admin-2.1/assets/plugins/icheck/skins/minimal/white.css" rel="stylesheet" type="text/css" media="screen"/> 
<?}?>
        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 

 
        <!-- CORE CSS TEMPLATE - START -->
        <link href="/admincp/themes/ultra-admin-2.1/assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="/admincp/themes/ultra-admin-2.1/assets/css/responsive.css" rel="stylesheet" type="text/css"/>
        <!-- CORE CSS TEMPLATE - END -->
  <script src="/style/js/jquery-3.4.0.min.js"></script>
    </head>
    <!-- END HEAD -->
<?
include_once('time.php');
$total_inbox=0;
$html_inbox='';
$show_total_tinnhan=Modules::run('trangchu/getList','tinnhan',10000,0,'NgayGui desc','IDMaTin',array('viewed'=>0));
if($show_total_tinnhan){
    foreach($show_total_tinnhan as $tinnhan){
       $total_inbox=$total_inbox+1; 
       $hour=timeAgo(strtotime($tinnhan['NgayGui']));
       $html_inbox.='
          <li class="unread status-available available">
                <a href="/dangtin/xemtinnhan/'.$tinnhan['IDMaTin'].'">
                    <div class="notice-icon">
                        <i class="fa fa-comments"></i>
                    </div>
                    <div>
                        <span class="name">
                            <strong>'.$tinnhan['fullname'].'</strong>
                            <span class="time small">- '.$hour.'</span>
                            <span class="profile-status available pull-right"></span>
                        </span>
                        <span class="desc small">
                            '.$tinnhan['content'].'
                        </span>
                    </div>
                </a>
          </li> ';
    }
}

$show_total_lienhe=Modules::run('trangchu/getList','baiviet',10000,0,'NgayGui desc','IDBaiViet',array('viewed'=>0,'Loai'=>'LienHe'));
if($show_total_lienhe){
    foreach($show_total_lienhe as $lienhe){
       $total_inbox=$total_inbox+1; 
       $hour=timeAgo(strtotime($lienhe['NgayGui']));
       $html_inbox.='
            <li class="unread status-available available">
                <a href="/lienhe/xemlienhe/'.$lienhe['IDBaiViet'].'">
                    <div class="notice-icon">
                        <i class="fa fa-envelope"></i>
                    </div>
                    <div>
                        <span class="name">
                            <strong>'.$lienhe['NguoiGui'].'</strong>
                            <span class="time small">- '.$hour.'</span>
                            <span class="profile-status available pull-right"></span>
                        </span>
                        <span class="desc small">
                            '.$lienhe['NoiDung'].'
                        </span>
                    </div>
                </a>
            </li> ';
    }
}
?>

<?
include_once('time.php');
$total_notice=0;
$html_notice='';
$show_total_tinban=Modules::run('trangchu/totalRows','tinban',array('viewed'=>0));
if($show_total_tinban){
    $total_notice=$total_notice+1;
    $lasts=Modules::run('trangchu/getList','tinban',1,0,'NgayDang desc','IDMaTin',array('viewed'=>0));
    $hour=timeAgo(strtotime($lasts[0]['NgayDang']));
    $html_notice.='
    <li class="unread away ">
        <a href="/dangtin/quanlytinban_admin/true/1/0?region=3-1">
            <div class="notice-icon">
                <i class="fa fa-edit"></i>
            </div>
            <div>
                <span class="name">
                    <strong>'.$show_total_tinban.' tin rao mới chưa được duyệt</strong>
                    <span class="time small">'.$hour.'</span>
                </span>
            </div>
        </a>
    </li>';
}

$show_total_thanhvien=Modules::run('trangchu/totalRows','thanhvien',array('viewed'=>0));
if($show_total_thanhvien){
    $total_notice=$total_notice+1;
    $lasts=Modules::run('trangchu/getList','thanhvien',1,0,'NgayThamGia desc','IDMaTin',array('viewed'=>0));
    $hour=timeAgo(strtotime($lasts[0]['NgayThamGia']));
    $html_notice.='
    <li class="unread busy ">
        <a href="/thanhvien/quanlythanhvien/1/true?region=6-3">
            <div class="notice-icon">
                <i class="fa fa-user"></i>
            </div>
            <div>
                <span class="name">
                    <strong>'.$show_total_thanhvien.' thành viên mới đăng ký</strong>
                    <span class="time small">'.$hour.'</span>
                </span>
            </div>
        </a>
    </li>';
}

$show_total_dangky=Modules::run('trangchu/totalRows','dangky',array('viewed'=>0));
if($show_total_dangky){
    $total_notice=$total_notice+1;
    $lasts=Modules::run('trangchu/getList','dangky',1,0,'NgayGui desc','ID',array('viewed'=>0));
    $hour=timeAgo(strtotime($lasts[0]['NgayGui']));
    $html_notice.='
    <li class="unread available ">
        <a href="/trangchu/quanlydangky/true/1?region=12-3">
            <div class="notice-icon">
                <i class="fa fa-envelope"></i>
            </div>
            <div>
                <span class="name">
                    <strong>'.$show_total_dangky.' email mới đăng ký nhận bản tin</strong>
                    <span class="time small">'.$hour.'</span>
                </span>
            </div>
        </a>
    </li>';
}
?>
    <!-- BEGIN BODY -->
    <body class="<? if(isset($bodyClass)){echo $bodyClass;}?>"><!-- START TOPBAR -->
    <? if(!isset($hidden_top)){?>
        <div class='page-topbar '>
            <a href="/admin" class='logo-area'>

            </a>
            <div class='quick-area'>
                <div class='pull-left'>
                    <ul class="info-menu left-links list-inline list-unstyled">
                        <li class="sidebar-toggle-wrap">
                            <a href="#" data-toggle="sidebar" class="sidebar_toggle">
                                <i class="fa fa-bars"></i>
                            </a>
                        </li>
                        <li class="message-toggle-wrapper">
                            <a href="#" data-toggle="dropdown" class="toggle">
                                <i class="fa fa-envelope"></i>
                                <? echo $total_inbox==0?'':'<span class="badge badge-orange">'.$total_inbox.'</span>'; ?> 
                            </a>
                            <ul class="dropdown-menu messages animated fadeIn">

                                <li class="list">

                                    <ul class="dropdown-menu-list list-unstyled ps-scrollbar">
                                        
                                        <li class="total" style="padding-top: 5px;padding-bottom: 5px;">
                                    <span class="small">
                                        Bạn có <strong><? echo $total_inbox;?></strong> tin nhắn mới.
                                        <a href="/admin?inbox=all" class="pull-right"><i class="fa fa-check-square-o"></i> Đánh dấu là đã đọc tất cả</a>
                                    </span>
                                </li>
                                        
                                        <? echo $html_inbox;?>

                                    </ul>

                                </li> 
                            </ul>

                        </li>
                        <li class="notify-toggle-wrapper">
                            <a href="#" data-toggle="dropdown" class="toggle">
                                <i class="fa fa-bell"></i>
                                <? echo $total_notice==0?'':'<span class="badge badge-orange">'.$total_notice.'</span>'; ?>
                            </a>
                            <ul class="dropdown-menu notifications animated fadeIn">
                                <li class="total">
                                    <span class="small">
                                        Bạn có <strong><? echo $total_notice;?></strong> thông báo mới.
                                        <a href="/admin?viewed=all" class="pull-right"><i class="fa fa-check-square-o"></i> Đánh dấu là đã đọc tất cả</a>
                                    </span>
                                </li>
                                <li class="list">

                                    <ul class="dropdown-menu-list list-unstyled ps-scrollbar">
                                        <? echo $html_notice;?>
                                    </ul>

                                </li> 
                            </ul>
                        </li> 
                        <li class="message-toggle-wrapper">
                            <a href="/"  target="_blank" class="toggle">
                                <i class="fa fa-university"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <?
                if(isset($user_info)&&$user_info!=''){  ?>	
                <div class='pull-right'>
                    <ul class="info-menu right-links list-inline list-unstyled">
                         <li class="profile">
                            <a href="#" data-toggle="dropdown" class="toggle">
                                <img src="<? echo show_img(str_replace('upload/images/avatar/','',$user_info['Avatar']),$thumb='150x150','/upload/images/avatar/');?>" alt="user-image" class="img-circle img-inline">
                                <span><? echo $user_info['username'];?> <i class="fa fa-angle-down"></i></span>
                            </a>
                            <ul class="dropdown-menu profile animated fadeIn">
                                <li>
                                    <a href="/admin/suathongtin?region=11-2">
                                        <i class="fa fa-wrench"></i>
                                        Cài đặt chung 
                                    </a>
                                </li>
                                <li>
                                    <a href="/thanhvien/suathanhvien/<? echo $this->session->userdata('userid');?>?region=9-1">
                                        <i class="fa fa-user"></i>
                                         Sửa thông tin
                                    </a>
                                </li> 
                                <li class="last">
                                    <a href="/thanh-vien/thoat.html">
                                        <i class="fa fa-lock"></i>
                                         Thoát
                                    </a>
                                </li>
                            </ul>
                        </li> 
                    </ul>			
                </div>		
                <?}?>
            </div>

        </div>
        <?}?>
        <!-- END TOPBAR -->
        
        <!-- START CONTAINER -->
        <div class="page-container row-fluid">
