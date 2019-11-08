 <div class="content_default">	
    <form action="" method="post" id="frmEdit" enctype="multipart/form-data">  
        <div class="content">
            <div id="boxRegister">
                <div class="tit mt9">
                    <h1 class="content-tit">Đổi Avatar</h1>
                </div>
                <style>
            .note {
                padding: 7px!important;
            }
            </style>
            <script src="/style/js/bxhupload.js" type="text/javascript"></script>
            <link href="/style/css/BXHUpload.css" rel="stylesheet" type="text/css">    
            <div style="padding-top: 10px; "><?php $this->load->view('template/statut_thongbao');?></div>
                <div class="alert alert-success listbox boxchangePass">
                    <div class=" item">
                        <div class="text" style="float: left;"><img style="max-width: 150px;" id="userfile_img" src="<? echo show_img(str_replace('upload/images/avatar/','',$LinkAvatar),$thumb='150x150','/upload/images/avatar/');?>" /></div>
                        <div class="avatar" id="uploadimage" style="float: right;">
                            <input id="Avatar" name="Avatar" type="hidden" value="" />
                        </div>
                        <div style="padding-bottom: 10px;display: inline-block;">
                            <?php echo $this->lang->line('lable_linkAnh');?>
                        </div>                  
                    </div>                             
                    <div class="item center">
                        <a id="btnConfirmPassword" class="btn btn-success btn-sm" href="javascript:document.getElementById('frmEdit').submit();">Lưu thay đổi</a>
                    </div>
                    <div class="loading-indicator" id="userUpdateLoading"></div>
                </div>
            </div>
        </div>
    </form>
<script>
    $(document).ready(function () {
       $('#uploadimage').bxhupload({ token: 'umTDvyTMD2qzHH2lc/pOXsMKqlmnxOI+f3BUvClacQ4=', target: 'Avatar', maxFiles: 1 });
    }); 
</script>
</div>
