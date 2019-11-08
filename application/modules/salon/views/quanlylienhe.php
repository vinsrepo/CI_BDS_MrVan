<div class="breadcrumbs " style="margin-bottom: -10px;">
        <div class="center">
           <div class="list-content">
             <ul class="grid12-12">
                 <li><a href="/" title="<?php echo $this->lang->line('lable_home');?>"><span><?php echo $this->lang->line('lable_home');?></span></a> <span class="mpx-arr-thin-right"></span></li>   
                 <li><a href="/quan-ly-salon-oto" title="<?php echo $this->lang->line('lable_quanlysalon');?>"><span><?php echo $this->lang->line('lable_quanlysalon');?></span></a> <span class="mpx-arr-thin-right"></span></li> 
                 <li><a href=""><span class="last"><?php echo $this->lang->line('lable_ql_lienhe');?></span></a> <span class="mpx-arr-thin-right last"></span></li>             
                 </ul>
           </div>
                    </div>
    </div>  
<link href="/style/css/my.css" rel="stylesheet" type="text/css" />
<div class="center">
    <div class="manage">
        <div class="colleft">
           <? include(APPPATH . 'includes/divLeft_QLSalon.php');?>
        </div>
        <div class="colright">
            <div class="content pageregister salonmanage" style="margin-top:0;font-family:'Open Sans';font-size: 13px;">
                <div class="container-register">
                    <div class="titleauto"><?php echo $this->lang->line('lable_ql_lienhe');?></div> 
                    <div class="content-pageregister" id="divuserprofiles">
                       
                    <table class="list_items" style="width: 100%;">
		<tbody><tr class="r_header">
			<td width="32">ID</td>
			<td><?php echo $this->lang->line('lable_HoVaTen');?></td>
			<td width="70"><?php echo $this->lang->line('lable_email');?></td> 
			<td width="80"><?php echo $this->lang->line('lable_mobile');?></td>
			 
            <td><?php echo $this->lang->line('lable_date_creat');?></td>
			 
		</tr>
							<?	
                                if($lienhe){ 
                  foreach ($lienhe as $tintuc)
                  { 
                  echo '
                   
                    <tr class="r_item ">
			<td align="center">'.$tintuc['IDBaiViet'].' 
			</td>
			<td   >
			
							 '.$tintuc['NguoiGui'].'
													
				<span class="addimg_approved"></span>			
							<br>
				<!--  -->
				
			</td>
			<td ><span class="pendding">'.$tintuc['TieuDe'].'</span>
						</td> 
			<td align="center">'.$tintuc['Link'].'</td>
			 
            <td align="center">'.date("d-m-Y", strtotime($tintuc['NgayGui'])).'</td>
			 
		</tr>
                  ';
                  }
                  }
                  else
                  {
                  echo '<div class="column one-half"><div class="warning-box">'.$this->lang->line('lable_no_rows').'</div></div>';
                  }
                  ?>
                                
				
	</tbody></table>
                <?php echo $this->pagination->create_links();?>       
                   </div>
                </div>
            </div>
        </div>
        <div class="colmess">
            <? include(APPPATH . 'includes/divRight.php');?>
        </div>
    </div>
</div> 