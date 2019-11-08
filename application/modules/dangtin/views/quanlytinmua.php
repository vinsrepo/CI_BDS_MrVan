<div class="breadcrumbs " style="margin-bottom: -10px;">
        <div class="center">
           <div class="list-content">
             <ul class="grid12-12">
                 <li><a href="/" title="<?php echo $this->lang->line('lable_home');?>"><span><?php echo $this->lang->line('lable_home');?></span></a> <span class="mpx-arr-thin-right"></span></li>   
                 <li><a href="/thanh-vien" title="<?php echo $this->lang->line('lable_Member');?>"><span><?php echo $this->lang->line('lable_Member');?></span></a> <span class="mpx-arr-thin-right"></span></li> 
                 <li><a href=""><span class="last"><?php echo $this->lang->line('title_ql_tinmuaxe');?></span></a> <span class="mpx-arr-thin-right last"></span></li>             
                 </ul>
           </div>
                    </div>
    </div>  
<link href="<? echo base_url();?>style/css/my.css" rel="stylesheet" type="text/css" />
<div class="center">
    <div class="manage">
        <div class="colleft">
           <? include(APPPATH . 'includes/divLeft_thanhvien.php');?>
        </div>
        <div class="colright">
            <div class="content pageregister salonmanage" style="margin-top:0;font-family:'Open Sans';font-size: 13px;">
                <div class="container-register">
                    <div class="titleauto"><?php echo $this->lang->line('title_ql_tinmuaxe');?></div>
                    <div class="status-message" style="padding-top: 10px;"><?php $this->load->view('template/statut_thongbao');?></div>
                    <div class="content-pageregister" id="divuserprofiles">
                       <div style="float:left;width:98%; padding:5px;background:#FFFFE5;border:1px dashed #FF9A4D;margin-bottom: 10px;" class="remark">
	<span style="color:red;">Ghi chú thao tác:</span>
	<span class="edit_btn2"></span><span>: Sửa tin đăng</span> 
	<span style="padding-left: 10px;"><img src="<?echo base_url();?>style/images/delete.png" style="width:15px;height:15px" class="icon16 fl-space2" alt="" title="Xóa"></span><span>: Xóa tin đăng</span>
	                   </div>
                       
                      <table class="list_items" style="width: 100%;">
		<tbody><tr class="r_header">
			<td width="30"><?php echo $this->lang->line('lable_matin');?></td>
			<td width="170"><?php echo $this->lang->line('lable_TieuDe');?></td> 
			<td width="130"><?php echo $this->lang->line('lable_muctien');?></td>
			<td width="100"><?php echo $this->lang->line('lable_date_creat');?></td>
			 <td width="90">Thao tác</td>
		</tr>
							<?	
                                if($lienhe){ 
                  foreach ($lienhe as $tintuc)
                  { 
                    $confirm="'".$this->lang->line('lable_confirm')."'";
                  echo '
                   
                    <tr class="r_item ">
			<td align="center">'.$tintuc['IDMaTin'].' 
			</td>
			<td style="color:red">
			
							 '.$tintuc['TieuDe'].'
													
				<span class="addimg_approved"></span>			
							<br>
				<!--  -->
				
			</td> 
			<td class="l_date" align="center">
			'.$tintuc['GiaTien'].'
						</td>
			<td align="center">'.date("d-m-Y", strtotime($tintuc['NgayDang'])).'</td>
			<td>
									<a title="Sửa tin" href="'.base_url().'sua-tin-mua-xe/'.$tintuc['IDMaTin'].' " onclick="not_edit();" class="edit_btn2 btn_enalbled">Sửa tin</a>
								
								 
								<a href="'.base_url().'xoa-tin-mua-xe/'.$tintuc['IDMaTin'].'" onclick="return confirm('.$confirm.')"><img src="'.base_url().'style/images/delete.png" style="width:15px;height:15px" class="icon16 fl-space2" alt="" title="Xóa"></a>
			
				
				
			</td>
		</tr>
                  ';
                  }
                  }
                  else
                  {
                   echo '<div class="note note-warning"><div class="warning-box">'.$this->lang->line('lable_no_rows').'</div></div>';
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