<div class="wr_page"> 
<script src="/style/js/bxhupload.js" type="text/javascript"></script>
<link href="/style/css/BXHUpload.css" rel="stylesheet" type="text/css">    
    <div class="index-page" style="width: 1280px;padding-top: 82px;margin: 0 auto;clear:left;float: unset;">
        <div class="content">         
            <? include(APPPATH . 'includes/divLeft_thanhvien.php');?>
            
            <!-- Content Right -->
            <div class="user-mright">
                <!-- Đăng tin -->
                <div id="ContentPlaceHolder1_pnMainContent">
                	<form name="frmEdit" id="frmEdit" action="" method="post" enctype="multipart/form-data">   
                    <div class="module-header-profile">
                        Đổi avatar
                    </div>
                        <div class="module-user module-user-bg ">
                        <div style="padding-top: 10px;width: 92%;"><?php $this->load->view('template/statut_thongbao');?></div> 
                            <div class="row">
                                <div class="col-md-3 text">
                                    <img style="max-width: 150px;" id="userfile_img" src="<? echo show_img(str_replace('upload/images/avatar/','',$LinkAvatar),$thumb='150x150','/upload/images/avatar/');?>" />
                                </div>
                                <div class="col-md-9" style="padding-bottom: 10px;">
                                    <p class="text-muted mb-2">Click vào nút bên dưới để chọn ảnh sau đó nhấn lưu</p>
                                    <div class="avatar" id="uploadimage">
                                        <input id="Avatar" name="Avatar" type="hidden" value="" />
                                    </div>
                                </div>
                            </div> 
                            <div class="rc-item rc-item-action " >
                                <div class="text">&nbsp;</div>
                                <a id="btnMemberSave" onclick="document.getElementById('frmEdit').submit();" class="btn btn-success btn-sm text-white">Lưu thay đổi</a>
                            </div>
                            <div class="loading-indicator" id="userUpdateLoading"></div>
                        </div>
                    </form>
                </div>
            </div>           
        </div>
    </div>
    <div class="clear"></div>
</div>
<script>
    $(document).ready(function () {
       $('#uploadimage').bxhupload({ token: 'umTDvyTMD2qzHH2lc/pOXsMKqlmnxOI+f3BUvClacQ4=', target: 'Avatar', maxFiles: 1 });
    }); 
</script>