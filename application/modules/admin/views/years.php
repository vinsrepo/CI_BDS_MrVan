<?php $this->load->view("statut_thongbao");?>
<div class="content-box">
				<div class="box-header clear">
					<h2>Cấu hình năm sản xuất:</h2>
				</div>
				<div class="box-body clear">
				<!-- Custom Forms -->
					<div id="forms">
						<form action="#" method="post" class="form">
                        <table>
                   <?php
                   $data=file_get_contents(APPPATH . 'includes/namsx.txt');
                   ?>
                   
                   <tr style="">
                   <td class="title"> </td><td><textarea style="width: 54%;height: 400px;" name="namsx"><?php echo $data;?></textarea></td>
                   </tr>
                   
                </table>
                   	    <div class="tab-footer clear">
						<div class="fr">
                            <input value="<?php echo $this->lang->line('lable_btnCapNhap');?>" id="apply" class="submit" type="submit"/>
						</div>
					</div>
						</form>
					</div><!-- /#forms -->
					
				</div> <!-- end of box-body -->
			</div>