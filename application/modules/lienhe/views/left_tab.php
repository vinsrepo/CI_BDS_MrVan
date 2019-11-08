

                                        <a class="btn btn-primary btn-block" href='/email/guiemail?region=10-1'>Gửi thư mới</a>

                                        <ul class="list-unstyled mail_tabs">
                                        
                                            <li class="<? echo ($_GET["region"]=='12-1'?'active':'');?>">
                                                <a href="/lienhe/quanlylienhe/true/1?region=12-1">
                                                    <i class="fa fa-envelope"></i> Liên hệ <?
                                        $show_total_lienhe=Modules::run('trangchu/totalRows','baiviet',array('Loai'=>'LienHe'));
                                        if($show_total_lienhe){echo '<span class="badge badge-orange pull-right">'.$show_total_lienhe.'</span>';}
                                        ?>
                                                </a>
                                            </li>
                                            <li class="<? echo ($_GET["region"]=='12-2'?'active':'');?>">
                                                <a href="/dangtin/quanlytinnhan/true/1?region=12-2">
                                                    <i class="fa fa-comments"></i> Tin nhắn <?
                                        $show_total_tinnhan=Modules::run('trangchu/totalRows','tinnhan',array());
                                        if($show_total_tinnhan){echo '<span class="badge badge-orange pull-right">'.$show_total_tinnhan.'</span>';}
                                        ?>
                                                </a>
                                            </li> 
                                            <li class="<? echo ($_GET["region"]=='12-3'?'active':'');?>">
                                                <a href="/trangchu/quanlydangky/true/1?region=12-3">
                                                    <i class="fa fa-edit"></i> Email đăng ký  <?
                                        $show_total_dangky=Modules::run('trangchu/totalRows','dangky',array());
                                        if($show_total_dangky){echo '<span class="badge badge-orange pull-right">'.$show_total_dangky.'</span>';}
                                        ?>
                                                </a>
                                            </li> 
                                            <li class="<? echo ($_GET["region"]=='10-1'?'active':'');?>">
                                                <a href="/email/guiemail?region=10-1">
                                                    <i class="fa fa-send-o"></i> Gửi thư mới <span class="label label-danger pull-right">Mới</span>
                                                </a>
                                            </li>
                                            
                                        </ul>