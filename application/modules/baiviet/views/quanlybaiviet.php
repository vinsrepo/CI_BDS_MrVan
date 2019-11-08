<?
$region=$_GET["region"];
$exregion=explode('-',$region);
$exregion[end(array_keys($exregion))]=end($exregion)-1;
$exregion=implode('-',$exregion); 
?>
<form method="post" action="<? echo base_url().'baiviet/quanlybaiviet/true/'.$Loai;?>?region=<? echo $region;?>" id="formID">
<!-- START CONTENT -->
            <section id="main-content" class=" ">
                <section class="wrapper" style='margin-top:60px;display:inline-block;width:100%;padding:15px 0 0 15px;'>
 <div class="col-md-12 col-sm-12 col-xs-12">
<?php $this->load->view("admin/statut_thongbao");?>
                                    </div>
                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left"><?php echo $this->lang->line('title_'.$Loai.'');?></h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i> 
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 m-bot15">
                            <? if($Loai=='TinTuc'){ $cl='col-xs-3 '; ?>
                            <div class="col-xs-2 m-0 p-0">
                                       <select name="Loai" class="form-control m-bot15" onchange="location = this.options[this.selectedIndex].value;">
                                            <option value="IDBaiViet">Xem tất cả bài viết</option>
                      <?php 
                      $menu=Modules::run('trangchu/getList','baiviet',4000,0,'SapXep asc, NgayGui asc','IDBaiViet',"Loai IN('MenuHeader') and TrangThai=1");
                                        if(isset($menu))
                                                                                                                 
        $menu=catToTree($menu,0,' - - ',array('MenuCha','TieuDe')); 
 
                                        foreach ($menu as $cdata)
                                        {  
                                            if($cdata['MenuCha']!=455&&$cdata['IDBaiViet']!=455){ 
                                           if($cdata['IDBaiViet']==$this->session->userdata('cha')||$cdata['IDBaiViet']==$_GET['cha'])
                                           {
                                              $select='selected';
                                           }
                                           else
                                           {
                                              $select='';
                                           }
                                           echo '<option value="?region='.$region.'&cha='.$cdata['IDBaiViet'].'" '.$select.'>'.$cdata['TieuDe'].'</option>';
                                           }
                                        }
                                        ?>
                                        </select>
                                </div>
                            <?}else{$cl='col-xs-5 m-0 p-0';}?>
                                <div class="<?php echo $cl;?>">
                                       <input name="search" class="form-control col-md-8 col-sm-8 col-xs-8" type="text" placeholder="Nhập từ khóa <?php echo $this->lang->line('lable_Search');?> <?php echo $this->lang->line('lable_'.$Loai.'');?>...">
                                </div>
                                <div class="col-xs-2">
                                       <select name="Loai" class="form-control m-bot15">
                                            <option value="IDBaiViet">Tìm theo ID</option>
                       <option value="TieuDe">Tìm theo <?php echo $this->lang->line('lable_TieuDe');?></option>
                       <option value="NgayGui">Tìm theo <?php echo $this->lang->line('lable_date_creat');?></option>
                                        </select>
                                </div>
                                <div class="col-xs-2 m-0 p-0">
                                        <button class="btn btn-success btn-icon bottom15 right15" type="submit">
                                            <i class="fa fa-search"></i> &nbsp; <span>Tìm kiếm</span>
                                        </button>
                                </div>
                                <div class="col-xs-3 m-0 p-0  " style="padding-top: 7px;text-align: right;">
                                        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite"><? if(isset($start)){?>Hiển thị từ <?php echo $start;?> đến <?php echo $end;?> - <?}?>Tổng  <span class="label label-secondary"><?php echo $totalrow;?></span> bản ghi</div>
                                </div>
                                
                            </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
<form method="post" action="<? echo base_url().'baiviet/quanlybaiviet/true/'.$Loai;?>" id="formID">
                                        <table class="table table-hover table-bordered">
                                            <thead> 
                                                    <tr>
									<th style="width: 10px;padding-left:15px;padding-top:11px"><input class="  select-all skin-square-green" type="checkbox"/></th>
									<th style="text-align: center;">ID</th>
                                <th><?php echo $this->lang->line('lable_TieuDe');?></th>
                                <th><?php echo $this->lang->line('lable_TrangThai');?></th>
                                <?
                                if($Loai!='TinTuc'&&$Loai!='TuVanXe'&&$Loai!='SoSanhXe'&&$Loai!='DanhGiaXe'&&$Loai!='KinhNghiem'){
                                    echo '<th>Link</th>';
                                }?>
                                <?
                                if($Loai=='Banner'){
                                    echo '<th>V.trí</th>';
                                }?>
                                <th><?php echo $this->lang->line('lable_date_creat');?></th>
                                <th style="text-align: center;">TT</th>
                                
                                <th style="text-align: center;width:20px"><?php echo $this->lang->line('lable_Edit');?></th>
                                <th style="text-align: center;width:20px"><?php echo $this->lang->line('lable_Delete');?></th>
								</tr> 
                                            </thead>
                                            <tbody>
                                                <?php if($data){
    if(($Loai=='MenuHeader'||$Loai=='MenuFooter'||$Loai=='MenuHuongDan'||$Loai=='DanhMuc')&&$tukhoa==''){                                                                               
        $data=catToTree($data,0,' - - ',array('MenuCha','TieuDe')); 
    }
        
        foreach ($data as $member)
        { 
            if($member['TrangThai']==1){
                $TrangThai='<span class="text-success"><i class="fa fa-check"></i> '.$this->lang->line('lable_DaKichHoat').'</span>';
            }
            if($member['TrangThai']==0){
                $TrangThai='<span class="text-danger"><i class="fa fa-warning "></i> '.$this->lang->line('lable_ChuaKichHoat').'</span>';
            }
            include(APPPATH . 'includes/getUrlBaiViet.php');
            
            $cap='-';
                                           if($member['CapMenu']>1&&$Loai!='TinTuc'&&$Loai!='TuVanXe'&&$Loai!='SoSanhXe'&&$Loai!='DanhGiaXe'&&$Loai!='KinhNghiem')
                                           {
                                                for($i=1;$i<$member['CapMenu'];$i++){
                                                $cap=$cap.'-';
                                                }
                                           }
                                           else
                                           {
                                                $cap='';
                                           }
            echo '<tr>
                  <td style="width: 10px;text-align: center;padding-left:15px;padding-top:11px"><input type="checkbox" name="XoaDuLieu[]" value="'.$member['IDBaiViet'].'" class="checkbox skin-square-green" id="Xoa'.$member['IDBaiViet'].'"/></td>
                  <td style="width: 30px;"><span class="bg-muted">'.$member['IDBaiViet'].'</span></td>
                  <td style="width: 335px;"><a target="_blank" href="'.($member['Link']!=''?$member['Link']:'/'.stripUnicode($member['TieuDe'])).'">'.$cap.' '.$member['TieuDe'].'</a></td>
                  <td style="width: 145px;">'.$TrangThai.'</td>
                   ';
                  if($Loai!='TinTuc'&&$Loai!='TuVanXe'&&$Loai!='SoSanhXe'&&$Loai!='DanhGiaXe'&&$Loai!='KinhNghiem'){
                                    echo '<td style="width: 130px;"><input class="form-control input-sm" name="Link" style="width: 130px;" value="'.$member['Link'].'" type="text"></td> ';
                   }
                  if($Loai=='Banner'){
                                    echo '<td><b>'.$member['ViTri'].'</b></td>';
                   }   
             echo ' <td style="width: 95px;"><span class="bg-muteds">'.date("d-m-Y", strtotime($member['NgayGui'])).'</span></td>
                  <td style="width: 40px;"><input class="form-control input-sm" name="SapXep['.$member['IDBaiViet'].']" style="width: 40px;" value="'.$member['SapXep'].'" type="text"></td>
                  
             <td style="width:20px">
             <a href="/baiviet/taobaiviet/'.$member['IDBaiViet'].'?region='.$exregion.'" class="btn btn-warning  btn-sm"><i class="fa fa-edit"></i> Sửa</a>
             </td>
                  <td style="width:20px">
                  <button type="button" onclick="Delete('.$member['IDBaiViet'].');" class="btn btn-danger btn-sm"><i class="fa fa-remove"></i> Xóa</button>
                  </td>        
                  </tr>';
        }
        }else{
            //echo '<tr><td></td><td></td><td style="color: red;font-weight: bold;">'.$this->lang->line('lable_no_rows').'</td><td></td><td></td><td></td><td></td><td></td></tr>';
        }
        ?> 
                                            </tbody>
                                        </table>
</form>
                                    </div>
                                    
                                    <div class="col-md-12 col-sm-12 col-xs-12 m-bot15">
                                <div class="col-xs-5 m-0 p-0">
                                       <button class="btn btn-danger btn-icon bottom15 right15" onclick="return confirm ('<?php echo $this->lang->line('btn_return_confirm_delete');?>');">
                                            <i class="fa fa-trash"></i> &nbsp; <span>Xóa bản ghi đã chọn</span>
                                        </button>
                                        <button type="submit" class="btn btn-primary btn-icon bottom15 right15">
                                            <i class="fa fa-save"></i> &nbsp; <span><?php echo $this->lang->line('lable_save_order');?></span>
                                        </button>
                                </div> 
                                <? if(isset($start)){?>
                                <div class="col-xs-7 m-0 p-0">
                                        <?php 
                                        $paginator_content = preg_replace('/href="(.*?)"/', 'href="$1?region='.$region.'"', $this->pagination->create_links());
                                        echo $paginator_content;?>
                                </div>
                                <?}?>
                            </div>
                                    
                                </div>
                            </div>
                        </section></div>
                </section>
            </section>
            <!-- END CONTENT -->
            </form>