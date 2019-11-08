<?
$region=$_GET["region"];
$exregion=explode('-',$region);
$exregion[end(array_keys($exregion))]=end($exregion)-1;
$exregion=implode('-',$exregion); 
?>
<form method="post" action="" id="formID">
<!-- START CONTENT -->
            <section id="main-content" class=" ">
                <section class="wrapper" style='margin-top:60px;display:inline-block;width:100%;padding:15px 0 0 15px;'>
 <div class="col-md-12 col-sm-12 col-xs-12">
<?php $this->load->view("admin/statut_thongbao");?>
                                    </div>
                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left"><?php if($Loai=='quanlytruycap'){ echo $this->lang->line('title_truycap');}else{echo $this->lang->line('title_online'); echo '<meta http-equiv="refresh" content="30" >';}?></h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i> 
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 m-bot15">
                                <div class="col-xs-5 m-0 p-0">
                                       <input name="search" class="form-control col-md-8 col-sm-8 col-xs-8" type="text" placeholder="Nhập từ khóa <?php echo $this->lang->line('lable_Search');?> ...">
                                </div>
                                <div class="col-xs-2">
                                       <select name="Loai" class="form-control m-bot15">
                                            <option value="IDTruyCap">Tìm theo ID</option>
                       <option value="ThanhVien">Tìm theo userid</option>
                       <option value="IP">Tìm theo <?php echo $this->lang->line('lable_IP');?></option>
                       <option value="TrinhDuyet">Tìm theo <?php echo $this->lang->line('lable_browser');?></option>
                       <option value="HeDieuHanh">Tìm theo <?php echo $this->lang->line('lable_HeDieuHanh');?></option>
                                        </select>
                                </div>
                                <div class="col-xs-2 m-0 p-0">
                                        <button class="btn btn-success btn-icon bottom15 right15" type="submit">
                                            <i class="fa fa-search"></i> &nbsp; <span>Tìm kiếm</span>
                                        </button>
                                </div>
                                <div class="col-xs-3 m-0 p-0  " style="padding-top: 7px;text-align: right;">
                                        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Hiển thị từ <?php echo $start;?> đến <?php echo $end;?> - Tổng  <strong><?php echo $totalrow;?></strong> tin</div>
                                </div>
                                
                            </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12"> 
                                        <table class="table table-hover table-bordered">
                                            <thead> 
                                                    <tr>
									<th style="width: 10px;padding-left:15px;padding-top:11px"><input class="  select-all skin-square-green" type="checkbox"/></th>
									<th style="text-align: center;">ID</th>
                                <th><?php echo $this->lang->line('lable_user');?></th>
                                <th><?php echo $this->lang->line('lable_IP');?></th>
                                <th style="width: 20px;"><?php echo $this->lang->line('lable_Hits');?></th>
                                 <th style="width: 200px;"><?php echo $this->lang->line('lable_Referrer');?></th>
                                <th><?php echo $this->lang->line('lable_browser');?></th>
                                <th><?php echo $this->lang->line('lable_HeDieuHanh');?></th>
                                <th><?php echo $this->lang->line('lable_time_online');?></th>
                                <th style="text-align: center;width:20px"><?php echo $this->lang->line('lable_Delete');?></th>
								</tr> 
                                            </thead>
                                            <tbody>
                                                <?php if($data){ 
        foreach ($data as $member)
        { 
            echo '<tr>
                  <td style="width: 10px;text-align: center;padding-left:15px;padding-top:11px"><input type="checkbox" name="XoaDuLieu[]" value="'.$member['IDTruyCap'].'" class="checkbox skin-square-green" id="Xoa'.$member['IDTruyCap'].'"/></td>
                  <td>'.$member['IDTruyCap'].'</td>
                  <td><a target="_blank" href="'.base_url().'thanh-vien/'.$member['ThanhVien'].'/'.stripUnicode($member['username']).'.html">'.$member['username'].'</a></td>
                  <td>'.$member['IP'].'</td>     
                  <td>'.$member['Hits'].'</td>
                   <td style="width:20px"><a target="_blank" href="'.$member['Referrer'].'">'.$member['Referrer'].'</a></td>
                  <td>'.$member['TrinhDuyet'].'</td>
                  <td>'.$member['HeDieuHanh'].'</td>
                  <td>'.date("H:i d-m-Y", $member['Times']).'</td>  
                  <td style="width:20px"><a href="javascript://" class="btn btn-danger btn-sm" onclick="Delete('.$member['IDTruyCap'].');"><i class="fa fa-remove"></i> Xóa</a></td>    
                  </tr>';
        }
        }else{
            //echo '<tr><td></td><td></td><td style="color: red;font-weight: bold;">'.$this->lang->line('lable_no_rows').'</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
        }
        ?> 
                                            </tbody>
                                        </table>
                                        <?php  
                            if(!$data){ ?>
                                        <div class="alert alert-warning alert-dismissible fade in" style="margin-top: -20px;">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <? echo $this->lang->line('lable_no_rows');?>
                                            .</div>
 <?}?>
                                    </div>
                                    <?php  
                            if($data){ ?>
                                    <div class="col-md-12 col-sm-12 col-xs-12 m-bot15">
                                <div class="col-xs-5 m-0 p-0">
                                       <button class="btn btn-danger btn-icon bottom15 right15" onclick="return confirm ('<?php echo $this->lang->line('btn_return_confirm_delete');?>');">
                                            <i class="fa fa-trash"></i> &nbsp; <span>Xóa bản ghi đã chọn</span>
                                        </button> 
                                </div>  
                                <div class="col-xs-7 m-0 p-0">
                                        <?php  
                                        $paginator_content = preg_replace('/href="(.*?)"/', 'href="$1?region='.$region.'"', $this->pagination->create_links());
                                        echo $paginator_content;?>
                                </div>
                                
                            </div>
                                  <?}?>   
                                </div>
                            </div>
                        </section></div>
                </section>
            </section>
            <!-- END CONTENT -->
            </form>