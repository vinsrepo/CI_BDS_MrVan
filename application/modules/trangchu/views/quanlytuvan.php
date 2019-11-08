<?
$region=$_GET["region"];
$exregion=explode('-',$region);
$exregion[end(array_keys($exregion))]=end($exregion)-1;
$exregion=implode('-',$exregion);
?>

<form method="post" action="" id="formID">
  <!-- START CONTENT -->
  <section id="main-content" class="">
    <section class="wrapper" style='margin-top:60px;display:inline-block;width:100%;padding:15px 0 0 15px;'>
      <div class="col-md-12 col-sm-12 col-xs-12">
        <?php $this->load->view("admin/statut_thongbao");?>
      </div>
        <div class="col-lg-12">
          <section class="box ">
              <header class="panel_header">
                  <h2 class="title pull-left">Quản lý form tìm kiếm BĐS</h2>
                  <div class="actions panel_actions pull-right">
                      <i class="box_toggle fa fa-chevron-down"></i> 
                      <i class="box_close fa fa-times"></i>
                  </div>
              </header>
              <div class="content-body">    
              <div class="row"> 
              <!-- <div class="col-md-12 col-sm-12 col-xs-12 m-bot15">
                <div class="col-xs-4 m-0 p-0">
                  <input name="search" class="form-control col-md-8 col-sm-8 col-xs-8" type="text" placeholder="Nhập từ khóa">
                </div>
                <div class="col-xs-4">
                  <select name="Loai" class="form-control m-bot15">
                    <option value="IDContact">Tìm theo ID</option>
                    <option value="hddEName">Tìm theo tên người gửi</option>
                    <option value="hddEEmail">Tìm theo Email</option>
                    <option value="hddEPhone">Tìm theo số điện thoại</option>
                    <option value="TieuDe">Tìm theo loại BĐS</option>
                    <option value="hddECity">Tìm theo Tỉnh thành</option> 
                  </select>
                </div>
                <div class="col-xs-2 m-0 p-0">
                  <button class="btn btn-success btn-icon bottom15 right15" type="submit">
                    <i class="fa fa-search"></i> &nbsp; <span>Tìm kiếm</span>
                  </button>
                </div>
              </div> -->
              <div class="col-md-12 col-sm-12 col-xs-12"> 
                <table class="table table-hover table-bordered">
                  <thead> 
                    <tr>
                      <!-- <th style="width: 10px;padding-left:15px;padding-top:11px"><input class="  select-all skin-square-green" type="checkbox"/> -->
                      </th>
                      <th>ID</th>
                      <th>Họ tên</th>
                      <th>Email</th> 
                      <th>Số điện thoại</th> 
                      <th>Loại BĐS</th> 
                      <th>Tỉnh thành</th> 
                      <th>Quận/Huyện</th>   
                      <th>Diện tích</th>   
                      <th>Giá BĐS</th>   
                      <th>Ngày gửi</th>   
                      <th style="text-align: center;width:20px"><?php echo $this->lang->line('lable_Delete');?></th>
                    </tr> 
                  </thead>
                  <tbody>
                    <?php if($data){ 
                      foreach ($data as $item)
                      {            
                      echo '<tr>                            
                              <td>'.$item['IDContact'].'</td>
                              <td><b>'.$item['hddEName'].'</b></td> 
                              <td>'.$item['hddEEmail'].'</td>
                              <td>'.$item['hddEPhone'].'</td> 
                              <td>'.$item['TieuDe'].'</td> 
                              <td>'.$item['hddECity'].'</td> 
                              <td>'.$item['hddEDist'].'</td> 
                              <td>'.$item['hddEArea'].' m2</td> 
                              <td>'.$item['hddEPrice'].'</td> 
                              <td>'.$item['hddETime'].'</td> 
                              <td style="width:20px"><a href="'.base_url().'xoa-contact/'.$item['IDContact'].'" id="btn_conf" class="btn btn-danger btn-sm" onclick="return Delconfirm()"><i class="fa fa-remove"></i> Xóa</a></td>    
                            </tr>';
                      }
                    }
                    ?> 
                  </tbody>
                </table>
              <?php  
              if(!$data){ ?>
                <div class="alert alert-warning alert-dismissible fade in" style="margin-top: -20px;">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <? echo $this->lang->line('lable_no_rows');?>
                </div>
              <?}?>
              </div>
              <?php  
              if($data){ ?>
                      <div class="col-md-12 col-sm-12 col-xs-12 m-bot15">
                  <div class="col-xs-5 m-0 p-0">
                         <!-- <button class="btn btn-danger btn-icon bottom15 right15" onclick="return confirm ('<?php //echo $this->lang->line('btn_return_confirm_delete');?>');">
                              <i class="fa fa-trash"></i> &nbsp; <span>Xóa bản ghi đã chọn</span>
                          </button>  -->
                          
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
<script>
  function Delconfirm(){
    var result = confirm("Bạn có chắc chắn muốn xóa?");
      if (result==true) {
       return true;
      } else {
       return false;
      }
  }
</script>