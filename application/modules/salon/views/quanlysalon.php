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
                        <h2 class="title pull-left"><?php echo $this->lang->line('lable_quanlysalon');?></h2>
                        <div class="actions panel_actions pull-right">
                            <i class="box_toggle fa fa-chevron-down"></i> 
                            <i class="box_close fa fa-times"></i>
                        </div>
                    </header>
                    <div class="content-body">    <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 m-bot15">
                        <div class="col-xs-4 m-0 p-0">
                                <input name="search" class="form-control col-md-8 col-sm-8 col-xs-8" type="text" placeholder="Nhập từ khóa <?php echo $this->lang->line('lable_Search');?> ...">
                        </div>
                        <div class="col-xs-3">
                            <select name="Loai" class="form-control m-bot15">
                                <option value="IDSalon">Tìm theo ID</option>
                                <option value="username">Tìm theo <?php echo $this->lang->line('lable_name_salon');?></option>
                                <option value="Email">Tìm theo Email</option> 
                                <option value="TinhThanh">Tìm theo Tỉnh thành</option> 
                            </select>
                        </div>
                        <div class="col-xs-2 m-0 p-0">
                            <button class="btn btn-success btn-icon bottom15 right15" type="submit">
                                <i class="fa fa-search"></i> &nbsp; <span>Tìm kiếm</span>
                            </button>
                        </div>
                        <div class="col-xs-3 m-0 p-0  " style="padding-top: 7px;text-align: right;">
                            <a href="/salon/taosalon/0/?region=4-1" class="btn btn-info btn-icon bottom15 right15">
                                <i class="fa fa-plus"></i> &nbsp; <span>Tạo dự án</span>
                            </a>
                        </div>                                
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12"> 
                        <table class="table table-hover table-bordered">
                            <thead> 
                                <tr>
    						        <th style="width: 10px;padding-left:15px;padding-top:11px"><input class="  select-all skin-square-green" type="checkbox"/></th>
    						        <th>ID</th>
                                    <th>LOGO</th>
                                    <th><?php echo $this->lang->line('lable_name_salon');?></th> 
                                    <th>Danh mục</th> 
                                    <th>Tỉnh thành</th> 
                                    <th>Quận/Huyện</th>   
                                    <th style="text-align: center;width:20px"><?php echo $this->lang->line('lable_Edit');?></th>
                                    <th style="text-align: center;width:20px"><?php echo $this->lang->line('lable_Delete');?></th>
    							</tr> 
                            </thead>
                            <tbody>
                                <?php if($data){ 
                                foreach ($data as $member)
                                { 
                                     
                                    if($member['TrangThai']==1){
                                        $TrangThai='<b style="color:red">'.$this->lang->line('title_taikhoanbikhoa').'</b>';
                                    }
                                    if($member['TrangThai']==0){
                                        $TrangThai='<b style="color:blue">'.$this->lang->line('lable_DaKichHoat').'</b>';
                                    }
                                    if($member['TrangThai']==2){
                                        $TrangThai='<b>'.$this->lang->line('lable_ChuaKichHoat').'</b>';
                                    }
                                    echo '<tr>
                                          <td style="width: 10px;text-align: center;padding-left:15px;padding-top:11px"><input type="checkbox" name="XoaDuLieu[]" value="'.$member['IDSalon'].'" class="checkbox skin-square-green" id="Xoa'.$member['IDSalon'].'"/></td>
                                          <td>'.$member['IDSalon'].'</td>
                                          <td style="width:20px"><a target="_blank" href="/'.stripUnicode($member['TenSalon']).'-pj'.$member['IDSalon'].'.html" ><img src="'.get_first_img($member['LoGo'],'170x115').'" style="width:40px;height:40px" alt=""></a></td>
                                          <td><a target="_blank" href="/'.stripUnicode($member['TenSalon']).'-pj'.$member['IDSalon'].'.html"><b>'.$member['TenSalon'].'</b></a></td> 
                                          <td>'.$member['TieuDe'].'</td>
                                          <td>'.$member['TinhThanh'].'</td> 
                                          <td>'.$member['QuanHuyen'].'</td> 
                                          
                                          <td style="width:20px"><a class="btn btn-warning  btn-sm" href="/salon/taosalon/'.$member['IDSalon'].'/?region='.$exregion.'"><i class="fa fa-edit"></i> Sửa</a></td>              
                                         <td style="width:20px"><a href="javascript://" class="btn btn-danger btn-sm" onclick="Delete('.$member['IDSalon'].');"><i class="fa fa-remove"></i> Xóa</a></td>    
                                          </tr>';
                                }
                                }else{
                                    //echo '<tr><td></td><td></td><td style="color: red;font-weight: bold;">'.$this->lang->line('lable_no_rows').'</td><td></td><td></td><td></td><td></td><td></td></tr>';
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
                                <div class="col-xs-3 m-0 p-0">
                                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Hiển thị từ <?php echo $start;?> đến <?php echo $end;?> - Tổng  <strong><?php echo $totalrow;?></strong> tin</div>
                                </div>
                                <div class="col-xs-4 m-0 p-0">
                                    <?php  
                                    $paginator_content = preg_replace('/href="(.*?)"/', 'href="$1?region='.$region.'"', $this->pagination->create_links());
                                    echo $paginator_content;?>
                                </div>   
                            </div>
                        <?}?>   
                        </div>
                    </div>
                </section>
            </div>
        </section>
    </section>
    <!-- END CONTENT -->
</form>