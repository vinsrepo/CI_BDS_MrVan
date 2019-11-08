<?php $this->load->view("admin/statut_thongbao");?>
<!-- CONTENT BOXES -->
			<div class="content-box">
				<div class="box-header clear">
					<h2><?php echo $this->lang->line('title_ql_tinmuaxe');?></h2>
				</div>
				
				<div class="box-body clear">
					
				<!-- TABLE -->
					<div style="display: block;" id="table">
					
						<form method="post" action="<? echo base_url().'dangtin/quanlytinmua_admin';?>" id="formID">
                      <?php echo $this->lang->line('lable_Search');?> <?php echo $this->lang->line('title_ql_tinmuaxe');?>: <input type="text" class="text" name="search" style="width: 200px;" value="" /> theo
                       <select name="Loai">
                       <option value="IDBaiViet">ID</option>
                       <option value="TieuDe"><?php echo $this->lang->line('lable_TieuDe');?></option>
                       <option value="NoiDung"><?php echo $this->lang->line('lable_NoiDung');?></option>
                       </select>
                        <input type="submit" value="<?php echo $this->lang->line('lable_Search');?>" class="submit" style="height: 23px;"/>
						<table>
							<thead>
								<tr>
									<th><input class="checkbox select-all" type="checkbox"/></th>
									<th>ID</th>
                                <th><?php echo $this->lang->line('lable_NguoiGui');?></th>
                                <th><?php echo $this->lang->line('lable_TieuDe');?></th>
                                <th><?php echo $this->lang->line('lable_NoiDung');?></th>
                                <th><?php echo $this->lang->line('lable_muctien');?></th>
                                <th><?php echo $this->lang->line('lable_date_creat');?></th>
                                <th><?php echo $this->lang->line('lable_Edit');?></th>
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
                  <td>'.$member['username'].'</td>
                  <td><a target="_blank" href="'.base_url().'can-mua/'.$member['IDMaTin'].'/'.stripUnicode($member['TieuDe']).'.html">'.$member['TieuDe'].'</a></td>
                  <td>'.$member['NoiDung'].'</td>
                  <td>'.giaca($member['GiaTien']).'</td>
                  <td>'.date("H:i d-m-Y", strtotime($member['NgayDang'])).'</td>
                  <td style="width:20px"><a target="_blank" href="'.base_url().'sua-tin-mua-xe/'.$member['IDMaTin'].'"><img style="border: 0px;width:20px" src="'.base_url().'admincp/img/icons/edit.png" /></a></td>  
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