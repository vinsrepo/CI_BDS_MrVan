<div class="wr_page">    
    <div class="index-page">
        <div class="content">
            
            <? include(APPPATH . 'includes/divLeft_thanhvien.php');?>
            
            <!-- Content Right -->
            <div class="user-mright" style="margin-top: 5px;">
                <!-- Đăng tin -->
                <div id="ContentPlaceHolder1_pnMainContent">
	



<div class="module-user" style="margin-top: 0px;">
    <div class="module-header-manage">
       <?php echo $title;?>
    </div>
    <div class="status-message" style="padding-top: 10px;"><?php $this->load->view('template/statut_thongbao');?></div>
    <div class="content-pageregister" id="divuserprofiles">
                        
                       <table class="member-table-data" style="width: 100%;font-size: 12px;">
		<tbody><tr class="r_header" style="background: #eee;">
			<td  style="text-align: left;">Loại giao dịch</td>
            <td >Thời hạn	</td>
			<td >Số tiền	</td>  
            <td>Ngày giao dịch	</td> 
		</tr>
							<?	   
                                if($lienhe){ 
                  foreach ($lienhe as $tintuc)
                  {   
                  echo '
                   
                    <tr class="r_item ">
			<td style="text-align: left;">'.$tintuc['Loai'].'</td>
            <td style="text-align: center;"> '.$tintuc['ThoiHan'].'</td> 
            <td style="text-align: center;"> '.number_format($tintuc['SoTien']).' Đ</td>  
			<td align="center">'.date("d-m-Y", strtotime($tintuc['NgayGD'])).'</td> 
		</tr>
                  ';
                  }
                  }
                  else
                  {
                   
                  }
                  ?>
                                
				
	</tbody></table>
                <?php echo $this->pagination->create_links();?>       
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