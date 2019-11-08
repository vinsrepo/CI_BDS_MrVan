<?php $this->load->view("statut_thongbao");?>
<script type="text/javascript" src="<?php echo base_url();?>/asset/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/asset/ckfinder/ckfinder.js"></script>
<div class="content-box">
				<div class="box-header clear">
					<h2>Cấu hình Báo giá:</h2>
				</div>
				<div class="box-body clear">
				<!-- Custom Forms -->
					<div id="forms">
						<form action="#" method="post" class="form">
                        <table>
                   <?php
                   $data=json_decode($info['GiaTri'],true);
                   ?>
                    
                   <tr style="">
                   <td class="title">Báo giá tin rao </td><td><?php
         
        if(isset($data['TinRao'])){
            $NoiDung=$data['TinRao'];
        }else{
            $NoiDung=set_value('TinRao');
        }
        echo $this->ckeditor->editor("TinRao",$NoiDung); 
        
         
        ?></td>
                   </tr>
                   
                   <tr style="">
                   <td class="title">Báo giá banner </td><td><?php
         
        if(isset($data['Banner'])){
            $NoiDung=$data['Banner'];
        }else{
            $NoiDung=set_value('Banner');
        }
        echo $this->ckeditor->editor("Banner",$NoiDung); 
        
         
        ?></td>
                   </tr>
                   
                   <tr style="">
                   <td class="title">Báo giá bài PR </td><td><?php
         
        if(isset($data['PR'])){
            $NoiDung=$data['PR'];
        }else{
            $NoiDung=set_value('PR');
        }
        echo $this->ckeditor->editor("PR",$NoiDung); 
        
         
        ?></td>
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