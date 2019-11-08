<?php $this->load->view("statut_thongbao");?>
<div class="content-box">
				<div class="box-header clear">
					<h2><?php echo $this->lang->line('title_'.$Loai.'');?>:</h2>
				</div>
				<div class="box-body clear">
				<!-- Custom Forms -->
					<div id="forms">
						<form action="#" method="post" class="form">
                        <?php
                    if(isset($info['GiaTri'])){
                    $NoiDung=$info['GiaTri'];
                    }else{
                    $NoiDung=set_value('NoiDung');
                    }
                    echo $this->ckeditor->editor("NoiDung",$NoiDung); 
                    ?>
                   	    <div class="tab-footer clear">
						<div class="fr"><br />
                            <input value="<?php echo $this->lang->line('lable_btnCapNhap');?>" id="apply" class="submit" type="submit"/>
						</div>
					</div>
						</form>
					</div><!-- /#forms -->
					
				</div> <!-- end of box-body -->
			</div>