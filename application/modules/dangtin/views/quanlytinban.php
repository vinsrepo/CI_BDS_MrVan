<div class="wr_page">
 <link href="/style/css/my.css" rel="stylesheet" type="text/css" />    
  <div class="index-page" style="width: 1280px;padding-top: 82px;margin: 0 auto;clear:left;float: unset;">
    <div class="content">            
      <? include(APPPATH . 'includes/divLeft_thanhvien.php');?>         
      <div class="user-mright">
       <!-- Đăng tin -->
        <div id="ContentPlaceHolder1_pnMainContent">
          <div class="module-user">
            <div class="module-header-manage">
                Quản lý tin rao bán / cho thuê
            </div>
            <style type="text/css">

              .item {
                  color: #747d89;
                  min-height: 383px;
                  overflow: hidden;
                  padding-left: 15px;
              }
              .thumb-wrapper {
                  background: #fff;
                  position: relative;
                  box-shadow: 0 2px 3px rgba(0,0,0,0.2);
                  /*margin: 0 10px;*/
              }
              .item .img-box {
                  height: 180px;
                  margin-bottom: 12px;
                  width: 100%;
                  position: relative;
              }
              .item img {   
                  width: auto;
                  height: 100%;
                  display: inline-block;
                  position: absolute;
                  bottom: 0;
                  margin: 0 auto;
                  left: 0;
                  right: 0;
              }
              .item h4 {
                  font-size: 16px;
              }
            </style> 
            <div class="status-message" style="padding-top: 10px;"><?php $this->load->view('template/statut_thongbao');?></div>
            <div class="content-pageregister" id="divuserprofiles">
            <div class="row" style="width: 100%"> 
        			<?	  
                // $confirm_uptin='Bạn có chắc muốn up tin này lên đầu?';
                if($lienhe){ 
                  foreach ($lienhe as $tintuc) :
                    $HangXe=Modules::run('baiviet/getDanhMucCha',$tintuc['HangXe']);
                    $DoiXe=Modules::run('baiviet/getDanhMucCha',$tintuc['DoiXe']);
                    $NoiDung=strip_tags($tintuc['ThongTinMota']);
                    $NoiDung=''.substr($NoiDung,0,80).'';
                    $NoiDung=substr($NoiDung, 0, strrpos($NoiDung, ' ')).'...';                
                    $link=$base_url.'/'.stripUnicode($HangXe['TieuDe']).'-'.stripUnicode($tintuc['NamSX']).'-'.stripUnicode($tintuc['DoiXe']).'/'.stripUnicode($tintuc['TieuDe']).'-pr'.$tintuc['IDMaTin'].'.html';
                    ?>                
                    <div class="mb-2 col-sm-4 item">
                      <div class="thumb-wrapper">
                        <div class="img-box">
                            <a href="<? echo $link;?>">
                                <img id="ContentPlaceHolder1_ProductSearchResult1_rpProductList_imgAvatar_0" title="<? echo $tintuc['TieuDe'];?>" src="<?php echo get_first_img($tintuc['AlbumAnh'],'624x476');?>" class="img-responsive img-fluid" alt="<? echo $tintuc['TieuDe'];?>">
                            </a>
                        </div>
                        <div class="thumb-content">
                          <h4 class="text-dark ml-2" style="float: left; font-weight: 600">
                            <? echo ($tintuc['GiaTien']==0?'':$tintuc['GiaTien']);?> <i><small class="small"><? echo $tintuc['SoKM'];?></small></i>
                          </h4>
                          <h4 class="text-success mr-2" style="float: right; letter-spacing: -1px">
                            <? echo $tintuc['NamSX'];?> - <? echo $tintuc['DoiXe'];?>
                          </h4>
                          <div class="huu_desc" style="min-height: 150px">
                              <p style="clear:both; font-weight: 600"><? echo $tintuc['TieuDe'];?></p>                                 
                              <p>Mặt tiền: <? if($tintuc['HopSo']!=''){echo $tintuc['HopSo'].'m';} ?>, đường vào <? if($tintuc['DanDong']!=''){echo $tintuc['DanDong'].'m';} ?></p>                                 
                              <p>Diện tích nhà <? echo $tintuc['NgoaiThat'];?>m² x <? echo $tintuc['NhienLieu'];?> tầng</p>
                              <p>Hướng: <? echo $tintuc['NoiThat'];?></p>
                              <p style="text-align: center; font-style: italic;">
                                  <span style="float: left;"><i class="fas fa-bed"></i> <? echo $tintuc['HeThongNapNhienLieu'];?></span>
                                  <span style="clear: both;"><i class="fas fa-bath"></i> <? echo $tintuc['MucTieuThu'];?></span>
                                  <span style="float: right;"><i class="fas fa-location-arrow"></i> <? echo $tintuc['NoiThat'];?></span> 
                              </p>
                          </div>                                                               
                          <span class="date text-danger">
                              <i class="fas fa-clock"></i> <? echo date('d/m/Y',strtotime($tintuc['NgayDang']));?>
                              <?php 
                                if($tintuc['TrangThai'] == 0) :
                              ?>
                                <span class="mr-1" style="float:right">Tin rao chưa được phê duyệt <i style="color: #000;" class="fas fa-info-circle" data-toggle="tooltip" data-placement="top" title="Tin rao cần được xét duyệt trước khi đăng lên sàn"></i></span>
                              <?php else : ?> 
                                <span class="mr-1" style="float:right"><? echo $tintuc['LuotXem']?> <i class="fa fa-eye"></i></span>
                              <?php endif; ?>                                                                     
                          </span>
                          <div class="row" style="margin:0">
                            <!-- <div class="col-md-6" style="width: 50%; background: #e1e1e1; padding:2px 10px;text-align: center;"> -->
                              <a class="col-md-3 btn btn-warning btn-sm text-white" style="width: 15%; padding:2px 3px;text-align: center; text-decoration: none" href="<? echo base_url().'sua-tin-rao/'.$tintuc['IDMaTin']?>" onclick="not_edit();"> Sửa</a>
                              <?php if($tintuc['is_block']==1): ?>
                              <a class="col-md-3 btn btn-dark btn-sm text-white" style="width: 25%; padding:2px 3px;text-align: center; text-decoration: none" href="<? echo base_url().'an-tin/'.$tintuc['IDMaTin']?>" onclick="return confirm('Bạn có muốn ẩn tin này?')"></i> Ẩn</a>
                              <?php else : ?>
                              <a class="col-md-3 btn btn-info btn-sm text-white" style="width: 25%; padding:2px 3px;text-align: center; text-decoration: none" href="<? echo base_url().'hien-tin/'.$tintuc['IDMaTin']?>" onclick="return confirm('Bạn có muốn hiển thị tin này?')"> Hiện</a>
                              <?php endif ?>
                              <a class="col-md-3 btn btn-success btn-sm text-white" style="width: 35%; padding:2px 3px;text-align: center; text-decoration: none" href="<? echo base_url().'dangtin/uptin/'.$tintuc['IDMaTin']?>" onclick="return confirm('Bạn có muốn làm mới tin này?')">Làm mới</a>                            
                            <!-- </div> -->
                            <!-- <div class="col-md-6" style="width: 50%; background: #e8e8e8; padding:2px 10px;text-align: center;"> -->
                              <a class="col-md-3 btn btn-danger btn-sm text-white" style="width: 25%; padding:2px 3px;text-align: center; text-decoration: none" onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="<? echo base_url().'xoa-tin-bds/'.$tintuc['IDMaTin'] ?>" rel="nofollow">Xóa</a>
                            <!-- </div> -->
                          </div>
                          
                          
                        </div>  
                      </div>                      
                    </div>
                  <?
                  endforeach;
                }else{
                  echo '<div class="note note-warning" style="overflow: hidden;margin:0px;width:91.5%!important;"><div class="warning-box">Chưa có tin rao nào</div></div>';
                }
              ?>                                        
            </div> 
            <?php echo $this->pagination->create_links();?>     
          </div> 
        </div> 
      </div>
    </div>
  </div>   
  <div class="clear"></div>
</div>