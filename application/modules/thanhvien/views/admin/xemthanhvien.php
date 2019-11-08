<!-- START CONTENT -->
            <section id="main-content" class=" ">
                <section class="wrapper" style='margin-top:60px;display:inline-block;width:100%;padding:15px 0 0 15px;'>
 

                    <div class="col-lg-12">
                        <section class="box nobox">
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <div class="uprofile-image">
                                            <img src="<? echo show_img(str_replace('upload/images/avatar/','',$info_user['Avatar']),$thumb='400x250','/upload/images/avatar/');?>" class="img-responsive">
                                        </div>
                                        <div class="uprofile-name">
                                            <h3>
                                                <a href="#"><? echo $info_user['username'];?></a>
                                                <!-- Available statuses: online, idle, busy, away and offline -->
                                                <span class="uprofile-status online"></span>
                                            </h3>
                                            <p class="uprofile-title"><? echo $info_user['HoVaTen'];?></p>
                                            <?php 
       
                                              // if($info_user['level']=='free_user'||$info_user['level']==''){
                                              //   $Loai='<span style="color: orange;">Miễn phí</span>';
                                              // }
                                              // if($info_user['level']=='vip_user'){
                                              //   $Loai='<span style="color: red;">VIP</span>';
                                              // }
                                              // if($info_user['level']=='xsieuvip_user'){
                                              //   $Loai='<span style="color: red;">SIÊU VIP</span>';
                                              // } 
                                              ?>
                                                <!-- <p><span class="promotion-acc">
                                                        <span>Loại TK: </span>
                                                        <b>
                                                             <? echo $Loai;?>
                                                        </b>
                                                    </span>
                                                </p> -->
                                        </div>
                                        <div class="alert alert-success" style="padding: 10px;">
                                            <ul class="list-unstyled">
                                                <li><i class='fa fa-home'></i> <? echo $info_user['DiaChi'];?></li>
                                                <li><i class='fa fa-phone'></i> <? echo $info_user['DienThoai'];?></li>
                                                <li><i class='fa fa-envelope'></i> <? echo $info_user['Email'];?></li>
                                            </ul>
                                        </div>
                                        <style>
                                        .active{
                                             background: rgba(1,181,192, 0.6);
                                        }
                                        </style>
                                        <div class="uprofile-buttons">
                                            <!-- <a class="btn btn-md btn-primary <? //if($_GET['act']==1){echo 'active';} ?>" href="/thanhvien/xemthanhvien/<? //echo $info_user['userid'];?>?region=9-1&act=1">Xem lịch sử truy cập</a> -->
                                            <a class="btn btn-md btn-primary <? if($_GET['act']==2){echo 'active';} ?>" href="/thanhvien/xemthanhvien/<? echo $info_user['userid'];?>?region=6-2-3&act=2">Xem tất cả tin rao đã đăng</a>
                                        </div>
                                        <div class=" uprofile-social">

                                            <a href="#" class="btn btn-primary btn-md facebook"><i class="fa fa-facebook icon-xs"></i></a>
                                            <a href="#" class="btn btn-primary btn-md twitter"><i class="fa fa-twitter icon-xs"></i></a>
                                            <a href="#" class="btn btn-primary btn-md google-plus"><i class="fa fa-google-plus icon-xs"></i></a>
                                            <a href="#" class="btn btn-primary btn-md dribbble"><i class="fa fa-dribbble icon-xs"></i></a>

                                        </div> 

                                    </div>
                                    <div class="col-md-9 col-sm-8 col-xs-12"> 
                                    
                                    <? if($_GET['act']==2){ ?>
                                    <h1> Tin rao đăng bởi: <b style="color: blue;"><? echo $info_user['username'];?></b></h1>
                                        <div class="uprofile-content" style="padding: 10px;">
                                        
                                        <table class="table table-hover table-bordered">
                                            <thead> 
                                                    <tr>
									 
									<th style="text-align: center;">ID</th>
                                
                                <th>LoGo</th>
                                <th><?php echo $this->lang->line('lable_TieuDe');?></th> 
                                <th>Giá tiền</th>
                                <th>Diện tích</th>
                                <th>Vị trí</th>   
                                <th style="text-align: center;width:20px"><?php echo $this->lang->line('lable_Edit');?></th> 
								</tr> 
                                            </thead>
                                            <tbody>
                                                <?php  
                                                $data=Modules::run('trangchu/getList','tinban',111150,0,'IDMaTin desc','IDMaTin',array('NguoiDang'=>$info_user['userid']));
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
            echo '<tr>
                  <td>'.$member['IDMaTin'].'</td>
                  
                  <td style="width:20px"><a target="_blank" href="'.base_url().'dangtin/xemtinban/'.$member['IDMaTin'].'" ><img src="'.get_first_img($member['AlbumAnh'],'170x115').'" style="width:40px;height:40px" alt=""></a></td>  
                  <td><a target="_blank" href="'.base_url().'dangtin/xemtinban/'.$member['IDMaTin'].'">'.$member['TieuDe'].'</a></td> 
                  <td style="width: 85px;color:red;font-weight:bold">'.$member['GiaTien'].' '.$member['SoKM'].'</td>
                  <td style="width: 75px;color:blue;font-weight:bold">'.$member['NgoaiThat'].' m²</td>
                  <td style="width: 95px;">'.$member['NamSX'].' - '.$member['DoiXe'].'</td>  
                  <td style="width:20px"><a target="_blank" class="btn btn-warning  btn-sm" href="'.base_url().'sua-tin-rao/'.$member['IDMaTin'].'"><i class="fa fa-edit"></i> Sửa</a></td>     
                  </tr>';
        }
        }else{
            //echo '<tr><td></td><td></td><td style="color: red;font-weight: bold;">'.$this->lang->line('lable_no_rows').'</td><td></td><td></td><td></td><td></td><td></td></tr>';
        }
        ?> 
                                            </tbody>
                                        </table>

                                        </div>

<?}?>


<? if($_GET['act']==1){ ?>
                                    <h1> Lịch sử truy cập của: <b style="color: blue;"><? echo $info_user['username'];?></b></h1>
                                        <div class="uprofile-content" style="padding: 10px;">
                                        
                                        <table class="table table-hover table-bordered">
                                            <thead> 
                                                   <tr> 
                                <th>Địa chỉ IP</th>
                                <th style="width: 20px;">Xem</th>
                                 <th style="width: 200px;">Nguồn</th>
                                <th>Trình duyệt</th>
                                <th>HĐH</th>
                                <th>Truy cập lúc</th> 
								</tr>
                                            </thead>
                                            <tbody>
                                                <?php 
   $data=Modules::run('trangchu/getList','truycap',500,0,'IDTruyCap desc','IDTruyCap',array('ThanhVien'=>$info_user['userid']));
                                                if($data){ 
        foreach ($data as $member)
        { 
            echo '<tr>  
                  <td>'.$member['IP'].'</td>     
                  <td>'.$member['Hits'].'</td>
                   <td style="width:20px"><a target="_blank" href="'.$member['Referrer'].'">'.$member['Referrer'].'</a></td>
                  <td>'.$member['TrinhDuyet'].'</td>
                  <td>'.$member['HeDieuHanh'].'</td>
                  <td>'.date("H:i d-m-Y", $member['Times']).'</td>   
                  </tr>';
        }
        }else{
            //echo '<tr><td></td><td></td><td style="color: red;font-weight: bold;">'.$this->lang->line('lable_no_rows').'</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
        }
        ?> 
                                            </tbody>
                                        </table>

                                        </div>

<?}?>





                                    </div>
                                </div>
                            </div>
                        </section></div>


                </section>
            </section>
            <!-- END CONTENT -->
