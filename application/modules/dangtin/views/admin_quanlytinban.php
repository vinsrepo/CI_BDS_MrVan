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
              <h2 class="title pull-left" style="margin-right: 20px;"><?php echo $this->lang->line('title_ql_tinbanxe');?></h2>
              <div style="padding-top: 8px;">
                <div class="col-xs-4 m-0 p-0">
                     <input name="search" class="form-control col-md-8 col-sm-8 col-xs-8" type="text" placeholder="Nhập từ khóa <?php echo $this->lang->line('lable_Search');?> <?php echo $this->lang->line('title_ql_tinbanxe');?>...">
                </div>
                <div class="col-xs-2">
                     <select name="Loai" class="form-control ">
                          <option value="IDMaTin">Tìm theo ID</option> 
                          <option value="TieuDe">Tìm theo <?php echo $this->lang->line('lable_TieuDe');?></option>
                      </select>
              </div>
              <div class="col-xs-2 m-0 p-0">
                      <button class="btn btn-success btn-icon " type="submit">
                          <i class="fa fa-search"></i> &nbsp; <span>Tìm kiếm</span>
                      </button>
              </div>
              </div>
              <div class="actions panel_actions pull-right">
                  <i class="box_toggle fa fa-chevron-down"></i> 
                  <i class="box_close fa fa-times"></i>
              </div>
          </header>
          <div class="content-body">    <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12 m-bot15 bottom15"> 
              
          <div class="col-xs-2 m-0 p-0">
            <select id="hddECity" name="DoiXe" class="form-control ">
               <option value="">Tỉnh/Thành Phố</option>
             <?
              $arr = file_get_contents(APPPATH . 'includes/DSTinhThanhKey.txt');
              foreach(json_decode($arr,true) as $key=>$val){
                $select_ed=" ".set_select('DoiXe', $val['Text']);
                  if($this->session->userdata('DoiXe')==$val['Text']){
                      $select_ed=" selected='selected'"; 
                  }
                  echo '
                    <option value="'.$val['Text'].'" data-key="'.$val['Id'].'" '.$select_ed.'>'.$val['Text'].'</option>    ';
                  }
              ?>
            </select>
          </div>
          <div class="col-xs-2">
             <select id="hddEDist" name="NamSX" class="form-control " ><option value="">Quận/Huyện</option></select> 
          </div> 
          <div class="col-xs-2 m-0 p-0">
              <select id="ddlWard" name="XuatXu" class="form-control" >
                <option value="">Phường/Xã</option>
              </select> 
          </div> 
          <div class="col-xs-2">
            <select id="ddlStreets" name="PhanHang" class="form-control">
              <option value="">Đường/Phố</option>
            </select>  
          </div> 
          <div class="col-xs-2 m-0 p-0"> 
            <select id="hddEProject" name="TinhTrang" class="form-control " ><option value="">Chọn dự án</option></select>	 
          </div> 
          <div class="col-xs-2 " style="margin-right: 0px;padding-right: 0px;">
            <button class="btn btn-info btn-icon " type="submit" style="width: 100%;">
              <i class="fa fa-refresh"></i> &nbsp; <span>Lọc tin rao</span>
            </button>
          </div>
         <!-- <script src="/style/js/jquery-3.4.0.min.js"></script> -->
<script>
function GetArea(module,code,val,fill,text,set){
    $.ajax
    ({ 
       type: "POST",
       url: "/chon-mau-xe?module="+module+"&"+code+"="+val, 
       success: function(response)
       {
           $("#"+fill).html('<option value="">'+text+'</option>');
           $("#"+fill).append(response); 
            if(set!=''){  
              $("#"+fill).val(set);
              if(module=='GetDistrict'){
                changeD();
              } 
            } 
           $('#loading').hide();
       }            
    });
} 
</script>
  <?
   if($this->session->userdata('NamSX')!=''){
        $quan=$this->session->userdata('NamSX');
    } 
    if($this->session->userdata('DoiXe')!=''){  
         echo "<script>GetArea('GetDistrict','cityCode',$('#hddECity').find('option:selected').attr('data-key'),'hddEDist','Quận/Huyện','$quan');</script>";
    } 
     if($this->session->userdata('XuatXu')!=''){
        $phuong=$this->session->userdata('XuatXu');
    } 
    ?>
  <?
   if($this->session->userdata('PhanHang')!=''){
      $duong=$this->session->userdata('PhanHang');
  }  
  ?>
                                    
  <?
   if($this->session->userdata('TinhTrang')!=''){
      $duan=$this->session->userdata('TinhTrang');
  } 
  ?>
<script type="text/javascript">

  
    $('#hddECity').on('change', function () {  
        $('#loading').show();
        GetArea('GetDistrict','cityCode',$('option:selected', this).attr('data-key'),'hddEDist','Quận/Huyện',''); 
    });
    $('#hddEDist').on('change', function () {
        $('#loading').show();
        GetArea('GetWard','distId',$('option:selected', this).attr('data-key'),'ddlWard','Phường/Xã','<? echo $phuong;?>');   
        GetArea('GetStreet','distId',$('option:selected', this).attr('data-key'),'ddlStreets','Đường/Phố','<? echo $duong;?>'); 
        GetArea('GetProject','distId',$('option:selected', this).attr('data-key'),'hddEProject','Chọn Dự án','<? echo $duan;?>');  
    });   
    function changeD(){
        $('#loading').show();
        GetArea('GetWard','distId',$('#hddEDist').find('option:selected').attr('data-key'),'ddlWard','Phường/Xã','<? echo $phuong;?>');   
        GetArea('GetStreet','distId',$('#hddEDist').find('option:selected').attr('data-key'),'ddlStreets','Đường/Phố','<? echo $duong;?>'); 
        GetArea('GetProject','distId',$('#hddEDist').find('option:selected').attr('data-key'),'hddEProject','Chọn Dự án','<? echo $duan;?>');
    }
</script>    
</div>
  <div class="col-md-12 col-sm-12 col-xs-12"> 
      <table class="table table-hover table-bordered">
          <thead> 
          <tr>
						<th style="width: 10px;padding-left:15px;padding-top:11px"><input class="  select-all skin-square-green" type="checkbox"/></th>
						<th style="text-align: center;">ID</th>
            
            <th>LoGo</th>
            <th><?php echo $this->lang->line('lable_TieuDe');?></th>
            <th><?php echo $this->lang->line('lable_NguoiGui');?></th>
            <th><?php echo $this->lang->line('lable_thongso_batbuoc_GiaTien');?></th>
            <th>Diện tích</th>
            <th>Vị trí</th>   
            <!-- <th style="text-align: center;width:20px"><?php echo $this->lang->line('lable_Edit');?></th> -->
            <th style="text-align: center;width:155px">Hành động</th>
          </tr> 
        </thead>
        <tbody>
          <?php  
            if($data){ 
              foreach ($data as $member)
              { 
                  $HangXe=Modules::run('baiviet/getDanhMucCha',$member['HangXe']);
                          $DoiXe=Modules::run('baiviet/getDanhMucCha',$member['DoiXe']);
                    
                  if($member['Loai']=='salon'){
                              $base_url=Modules::run('trangchu/getInfo','salon','IDSalon',$member['Salon']);
                              $base_url='http://'.$base_url['Domain'].'.'.$name_site.'/xe-ban/';
                              $type='Salon';
                          }else{
                              $base_url=base_url().'xe-';
                              $type='Tin bán xe';
                          } 
                  // if($member['TrangThai']==0)){
                  //   $act_link = '<a target="_blank" class="btn btn-warning btn-sm" href="'.base_url().'sua-tin-rao/'.$member['IDMaTin'].'"><i class="fa fa-edit"></i> Sửa</a>'
                  // }else {
                  //   $act_link = '<a target="_blank" class="btn btn-warning btn-sm" href="'.base_url().'duyet-tin/'.$member['IDMaTin'].'"><i class="fa fa-upload"></i> Duyệt</a>'
                  // }         
                  echo '<tr>
                        <td style="width: 10px;text-align: center;padding-left:15px;padding-top:11px"><input type="checkbox" name="XoaDuLieu[]" value="'.$member['IDMaTin'].'" class="checkbox skin-square-green" id="Xoa'.$member['IDMaTin'].'"/></td>
                        <td>'.$member['IDMaTin'].'</td>
                        
                        <td style="width:20px"><a target="_blank" href="'.base_url().'dangtin/xemtinban/'.$member['IDMaTin'].'" ><img src="'.get_first_img($member['AlbumAnh'],'170x115').'" style="width:40px;height:40px" alt=""></a></td>  
                        <td><a target="_blank" href="'.base_url().'dangtin/xemtinban/'.$member['IDMaTin'].'">'.$member['TieuDe'].'</a></td>
                        <td>'.$member['username'].'</td>
                        <td style="width: 85px;color:red;font-weight:bold">'.($member['GiaTien']==0?'':$member['GiaTien']).' '.$member['SoKM'].'</td>
                        <td style="width: 75px;color:blue;font-weight:bold">'.$member['NgoaiThat'].' m²</td>
                        <td style="width: 95px;">'.$member['NamSX'].' - '.$member['DoiXe'].'</td>      
                        <td style="width:155px">
                          <a class="btn btn-warning btn-sm" href="'.base_url().$act_link.$member['IDMaTin'].'">'.$icon.$label.'</a>
                          <a href="javascript://" class="btn btn-danger btn-sm" onclick="Delete('.$member['IDMaTin'].');"><i class="fa fa-remove"></i> Xóa</a>
                        </td>    
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
              <div class="col-xs-4 m-0 p-0">
                     <button class="btn btn-danger btn-icon bottom15 right15" onclick="return confirm ('<?php echo $this->lang->line('btn_return_confirm_delete');?>');">
                          <i class="fa fa-trash"></i> &nbsp; <span>Xóa bản ghi đã chọn</span>
                      </button> 
              </div> 
              <div class="col-xs-4 m-0 p-0">
              <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Hiển thị từ <?php echo $start;?> đến <?php echo $end;?> - Tổng  <strong><?php echo $totalrow;?></strong> tin</div>
              </div>
              <div class="col-xs-4 m-0 p-0">
                <?php 
                $Ext2='';
                if($this->uri->segment(5)!=''){
                    $Ext2.="/".$this->uri->segment(5);
                }
                if($this->uri->segment(6)!=''){
                    $Ext2.="/".$this->uri->segment(6);
                }
                $paginator_content = preg_replace('/href="(.*?)"/', 'href="$1'.$Ext2.'?region='.$region.'"', $this->pagination->create_links());
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