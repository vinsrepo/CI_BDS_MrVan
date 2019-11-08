<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<meta name="description"  content=""/>
<meta name="keywords" content=""/>
<meta name="robots" content="ALL,FOLLOW"/>
<meta name="Author" content="AIT"/>
<meta http-equiv="imagetoolbar" content="no"/>
<title>Trang quản trị</title>

<link rel="stylesheet" href="<? echo base_url();?>admincp/css/reset.css" type="text/css"/>
<link rel="stylesheet" href="<? echo base_url();?>admincp/css/screen.css" type="text/css"/>
<link rel="stylesheet" href="<? echo base_url();?>admincp/css/fancybox.css" type="text/css"/>
<link rel="stylesheet" href="<? echo base_url();?>admincp/css/jquery.wysiwyg.css" type="text/css"/>
<link rel="stylesheet" href="<? echo base_url();?>admincp/css/jquery.ui.css" type="text/css"/>
<link rel="stylesheet" href="<? echo base_url();?>admincp/css/visualize.css" type="text/css"/>
<link rel="stylesheet" href="<? echo base_url();?>admincp/css/visualize-light.css" type="text/css"/>
<!--[if IE 7]>
	<link rel="stylesheet" type="text/css" href="css/ie7.css" />
<![endif]-->	

<script type="text/javascript" src="<? echo base_url();?>admincp/js/jquery.js"></script>
<script type="text/javascript" src="<? echo base_url();?>admincp/js/visualize.js"></script>
<script type="text/javascript" src="<? echo base_url();?>admincp/js/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="<? echo base_url();?>admincp/js/tiny_mce/jquery.tinymce.js"></script>
<script type="text/javascript" src="<? echo base_url();?>admincp/js/jquery.fancybox.js"></script>
<script type="text/javascript" src="<? echo base_url();?>admincp/js/jquery.idtabs.js"></script>
<script type="text/javascript" src="<? echo base_url();?>admincp/js/jquery.jeditable.js"></script>
<script type="text/javascript" src="<? echo base_url();?>admincp/js/jquery.ui.js"></script>
<script type="text/javascript" src="<? echo base_url();?>admincp/js/functions.js"></script>
<script type="text/javascript" src="<? echo base_url();?>admincp/js/excanvas.js"></script>
<script type="text/javascript" src="<? echo base_url();?>admincp/js/cufon.js"></script>
<script type="text/javascript" src="<? echo base_url();?>admincp/js/Geometr231_Hv_BT_400.font.js"></script>
<script type="text/javascript" src="<? echo base_url();?>admincp/js/script.js"></script>
<script>
function Delete(ID){
    if(confirm ('<?php echo $this->lang->line('btn_return_confirm_delete');?>')==true){
    document.getElementById("Xoa"+ID+"").setAttribute('checked','checked');
    document.getElementById("formID").submit();
    }
}
</script>
</head>

<body>
<div class="clear">
<div class="main"> <!-- *** mainpage layout *** -->
	<div class="main-wrap">
	 	<div class="page clear">
        <?php error_reporting(0);$this->load->view("$template");?>
</div><!-- end of page -->
		
		</div>
	</div>
</div>
</body>
</html>	
