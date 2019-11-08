<?php $this->load->view("admin/statut_thongbao");?>
<div class="content-box">
				<div class="box-header clear">
					<h2><?php echo $this->lang->line('lable_edit_binhluan');?>:</h2>
				</div>
				<div class="box-body clear">
				<!-- Custom Forms -->
					<div id="forms">
						<form action="#" method="post" class="form">
                        <table>
                   <tr>
                   <td class="title"><?php echo $this->lang->line('lable_user');?></td><td><input class="text" style="width: 200px;" type="text" name="NguoiGui" value="<?php if(isset($users['NguoiGui'])){echo $users['NguoiGui'];}else{set_value('NguoiGui');} ?>" /></td>
                   </tr>
                   <tr>
                   <td class="title"><?php echo $this->lang->line('lable_NoiDung');?></td><td><textarea class="text" name="NoiDung" style="width:600px;height:180px"><?php if(isset($users['NoiDung_BinhLuan'])){echo $users['NoiDung_BinhLuan'];}else{set_value('NoiDung');} ?></textarea></td>
                   </tr>
                   <tr>
                   <td class="title"><?php echo $this->lang->line('lable_noibinhluan');?></td><td><input class="text" style="width: 200px;" type="text" name="ID" value="<?php if(isset($users['ID'])){echo $users['ID'];}else{set_value('ID');} ?>" /></td>
                   </tr>
                </table>
                   	    <div class="tab-footer clear">
						<div class="fr">
                            <input type="hidden" name="Loai" value="<?php echo $users['Loai'];?>" />
							<input value="<?php echo $this->lang->line('lable_btnCapNhap');?>" id="apply" class="submit" type="submit"/>
						</div>
					</div>
						</form>
					</div><!-- /#forms -->
					
				</div> <!-- end of box-body -->
			</div>