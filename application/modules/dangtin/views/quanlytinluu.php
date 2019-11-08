<div class="wr_page">
        <link href="/style/css/my.css" rel="stylesheet" type="text/css" />    
    <div class="index-page">
        <div class="content">
            
            <? include(APPPATH . 'includes/divLeft_thanhvien.php');?>
            
            <!-- Content Right -->
            <div class="user-mright">
                <!-- Đăng tin -->
                <div id="ContentPlaceHolder1_pnMainContent">
	



<div class="module-user">
    <div class="module-header-manage">
        Quản lý tin rao đã lưu
    </div>
    <div class="status-message" style="padding-top: 10px;"><?php $this->load->view('template/statut_thongbao');?></div>
    <div class="content-pageregister" id="divuserprofiles"> 
          <table class="member-table-data" style="margin: 10px 0 0; float: left;">
        <thead>
            <tr>
                <td class="tdth">STT</td>
                <td class="tdth">MÃ TIN</td>
                <td class="tdth" style="width: 350px;">TIÊU ĐỀ</td>
                <td class="tdth" style="width: 62px;">THAO TÁC</td>
            </tr>
        </thead>
        <tbody id="TinDaLuu">

            
                     
                
        </tbody>
    </table>

                <?php //echo $this->pagination->create_links();?>       
                   </div> 
</div> 

</div>
            </div>
            <? include(APPPATH . 'includes/divRight.php');?>
            
            <div class="clear" style=": "></div>
        </div>
    </div>
    <script src="/Scripts/Members.min.js?v=20151126" type="text/javascript"></script>

            <div class="clear"></div>
        </div>