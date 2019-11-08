<?php $this->load->view("admin/statut_thongbao");?>
<!-- CONTENT BOXES -->
			<div class="content-box">
				<div class="box-header clear">
					<h2>Quản lý góp ý thông báo lỗi</h2>
				</div>
				
				<div class="box-body clear">
					
				<!-- TABLE -->
					<div style="display: block;" id="table">
					
						<form method="post" action="" id="formID">
                      
						<table>
							<thead>
								<tr>
									<th><input class="checkbox select-all" type="checkbox"/></th>
									<th>ID</th>
                                <th>Loại thông báo</th> 
                                <th>Link</th> 
                                <th><?php echo $this->lang->line('lable_date_creat');?></th> 
                                <th style="width: 70px;"></th> 
                                <th><?php echo $this->lang->line('lable_Delete');?></th>
								</tr>
							</thead>
							
							<tbody>
							<?php if($data){ 
        foreach ($data as $member)
        { 
             
            echo '<tr>
                  <td><input type="checkbox" name="XoaDuLieu[]" value="'.$member['IDMaTin'].'" class="checkbox" id="Xoa'.$member['IDMaTin'].'"/></td>
                  <td>'.$member['IDMaTin'].'</td>
                  <td>'.$member['reportOption'].'</td>  
                  <td><a target="_blank" href="'.$member['link'].'">'.$member['link'].'</a></td>
                  <td>'.date("H:i d-m-Y", strtotime($member['NgayGui'])).'</td> 
                  <td style="width:20px"><a href="/dangtin/xemgopy/'.$member['IDMaTin'].'">Xem chi tiết</a></td>    
                  <td style="width:20px"><a href="javascript://" onclick="Delete('.$member['IDMaTin'].');"><img src="'.base_url().'admincp/images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="delete"></a></td>    
                  </tr>';
        }
        }else{
            echo '<tr><td></td><td></td><td style="color: red;font-weight: bold;">'.$this->lang->line('lable_no_rows').'</td><td></td><td></td><td></td><td></td><td></td></tr>';
        }
        ?> 
							</tbody>
						</table>
						
						<div class="tab-footer clear">
							<div class="fl">
							<input value="<?php echo $this->lang->line('lable_Delete');?>" id="submit2" class="submit fl-space" type="submit" onclick="return confirm ('<?php echo $this->lang->line('btn_return_confirm_delete');?>');"/>
							</div>
                            <?php echo $this->pagination->create_links();?>
							</div>
						</form>
					</div><!-- /#table -->	
					
				</div> <!-- end of box-body -->
			</div> <!-- end of content-box -->