<?php $this->load->view("admin/statut_thongbao");?>
<!-- CONTENT BOXES -->
			<div class="content-box">
				<div class="box-header clear">
					<h2><?php echo $this->lang->line('title_'.$Loai.'');?></h2>
				</div>
				
				<div class="box-body clear">
					
				<!-- TABLE -->
					<div style="display: block;" id="table">
					
						<form method="post" action="<? echo base_url().'binhluan/quanlybinhluan/true/'.$Loai;?>" id="formID">
                      <?php echo $this->lang->line('lable_Search');?> <?php echo $this->lang->line('lable_binhluan');?>: <input type="text" class="text" name="search" style="width: 200px;" value="" /> theo
                       <select name="Loai">
                       <option value="IDBinhLuan">ID</option>
                       <option value="NoiDung_BinhLuan"><?php echo $this->lang->line('lable_NoiDung');?></option>
                       <option value="ID">ID<?php echo $Loai;?></option>
                       <option value="GuiLuc"><?php echo $this->lang->line('lable_date_creat');?></option>
                       </select>
                        <input type="submit" value="<?php echo $this->lang->line('lable_Search');?>" class="submit" style="height: 23px;"/>
						<table>
							<thead>
								<tr>
									<th><input class="checkbox select-all" type="checkbox"/></th>
									<th>ID</th>
                                <th><?php echo $this->lang->line('lable_user');?></th>
                                <th><?php echo $this->lang->line('lable_NoiDung');?></th>
                                <th><?php echo $this->lang->line('lable_noibinhluan');?></th>
                                <th><?php echo $this->lang->line('lable_date_creat');?></th>
                                <th style="width:20px"><?php echo $this->lang->line('lable_Edit');?></th>
                                <th style="width:20px"><?php echo $this->lang->line('lable_Delete');?></th>
								</tr>
							</thead>
							
							<tbody>
	    <?php if($data){ 
        foreach ($data as $member)
        { 
            
                 if($Loai=="ThongBao"){
                  $catory='thong-bao';
                 }elseif($Loai=="MenuHeader"){
                  $catory='kenh';
                 }elseif($Loai=="MenuFooter"){
                  $catory='bai-viet';
                 }
                $Link=base_url().$catory.'/'.$member['IDBaiViet'].'/'.stripUnicode($member['TieuDe']).'.html';
             
            echo '<tr>
                  <td><input type="checkbox" name="XoaDuLieu[]" value="'.$member['IDBinhLuan'].'" class="checkbox" id="Xoa'.$member['IDBinhLuan'].'"/></td>
                  <td>'.$member['IDBinhLuan'].'</td>
                  <td><a target="_blank" href="'.base_url().'thanh-vien/'.$member['NguoiGui'].'/'.stripUnicode($member['username']).'.html">'.$member['username'].'</a></td>
                  <td>'.$member['NoiDung_BinhLuan'].'</td>
                  <td><a target="_blank" href="'.$Link.'">'.$member['TieuDe'].'</a></td>
                  <td>'.date("H:i d-m-Y", strtotime($member['GuiLuc'])).'</td>
                  <td style="width:20px"><a href="'.base_url().'binhluan/suabinhluan/'.$member['IDBinhLuan'].'"><img style="border: 0px;width:20px" src="'.base_url().'admincp/img/icons/edit.png"/></a></td>
                  <td style="width:20px"><a href="javascript://" onclick="Delete('.$member['IDBinhLuan'].');"><img src="'.base_url().'admincp/images/ico_delete_16.png" class="icon16 fl-space2" alt="" title="delete"></a></td>        
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