
<!-- START CONTENT -->
            <section id="main-content" class=" ">
                <section class="wrapper" style='margin-top:60px;display:inline-block;width:100%;padding:15px 0 0 15px;'>

                     

                    <div class="col-lg-12">
                        <section class="box nobox">
                            <div class="content-body">    <div class="row">

                                    <div class="col-md-3 col-sm-4 col-xs-12">

<? include APPPATH.'modules/lienhe/views/left_tab.php'; ?>

                                    </div>

                                    <div class="col-md-9 col-sm-8 col-xs-12">
                                        <div class="mail_content">

                                            <div class="row" style="margin-bottom: 10px;">
                                                <div class="col-md-7 col-sm-7 col-xs-7">

                                                    <h3 class="mail_head">Quản lý tin nhắn<sup><?php echo ($totalrow!=''||$totalrow!=0?"($totalrow)":'');?></sup></h3>
                                                     

                                                </div>

                                                <div class="col-md-5 col-sm-5 col-xs-5">
 
                                                    <div class="dataTables_info pull-right" id="example2_info" role="status" aria-live="polite">Hiển thị từ <?php echo $start;?> đến <?php echo $end;?> - Tổng  <strong><?php echo $totalrow;?></strong> tin</div>

                                                </div>
                                          </div>
                                         <div class="row">

                                                <div class="col-md-12 col-sm-12 col-xs-12 mail_list">
                                                    <table class="table table-striped table-hover">
                                                        <?php if($data){ 
        foreach ($data as $member)
        { 
            if(strlen($member['content'])>70){
                $NoiDung=strip_tags(html_entity_decode($member['content']));
                  $NoiDung=''.substr($NoiDung,0,70).'';
                  $NoiDung=substr($NoiDung, 0, strrpos($NoiDung, ' ')).'...';
            }else{
                $NoiDung=$member['content'];
            }
             
            echo ' <tr class="unread" data-id="'.$member['IDMaTin'].'">
                                                            <td class=""><input class=" skin-square-green" type="checkbox" name="XoaDuLieu[]" value="'.$member['IDMaTin'].'" id="Xoa'.$member['IDMaTin'].'"></td>
                                                            <td class=""><div class="star"><i class="fa fa-star icon-xs icon-orange"></i></div></td>
                                                            <td class="open-view2">'.$member['fullname'].'</td>
                                                            <td class="open-view2"><span class="msgtext">'.$NoiDung.'</span></td>
                                                            <td class="open-view2"><span class="msg_time">'.date("H:i d-m-Y", strtotime($member['NgayGui'])).'</span></td>
                                                            <td style="width:20px"><a href="javascript://" class="btn btn-danger btn-sm" onclick="Delete('.$member['IDMaTin'].');"><i class="fa fa-trash-o"></i> Xóa</a></td>   
                                                        </tr> 
            ';
        }
        }else{
            //echo '<tr><td></td><td></td><td style="color: red;font-weight: bold;">'.$this->lang->line('lable_no_rows').'</td><td></td><td></td><td></td><td></td><td></td></tr>';
        }
        ?> 
                                                       
                                                    </table>
                                                </div>
                                                <?php  
                            if($data){ ?>
                                    <div class="col-md-12 col-sm-12 col-xs-12 m-bot15">
                                <div class="col-xs-6 m-0 p-0">
                                <button class="btn btn- btn-icon bottom15 right15 btn_all" >
                                            <i class="fa fa-check-square-o"></i> &nbsp; <span>Chọn tất cả</span>
                                        </button> 
                                <button class="btn btn- btn-icon bottom15 right15 btn_remove" style="display: none;" >
                                            <i class="fa fa-remove"></i> &nbsp; <span>Bỏ chọn</span>
                                        </button> 
                                      <button class="btn btn-danger btn-icon bottom15 right15" onclick="return confirm ('<?php echo $this->lang->line('btn_return_confirm_delete');?>');">
                                            <i class="fa fa-trash"></i> &nbsp; <span>Xóa bản ghi đã chọn</span>
                                        </button> 
                                        
                                </div>   
                                <div class="col-xs-6 m-0 p-0">
                                        <?php  
                                        $paginator_content = preg_replace('/href="(.*?)"/', 'href="$1?region='.$region.'"', $this->pagination->create_links());
                                        echo $paginator_content;?>
                                </div>
                                
                            </div>
                                  <?}?>   
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </section></div>


                </section>
            </section>
            <!-- END CONTENT -->
