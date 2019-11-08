<?php
$config = array( 
      'formTaoTaiKhoan'          => array( 
                                          array( 
                                            'field' => 'username', 
                                            'label' => 'lang:lable_username', 
                                            'rules' => 'trim|required|xss_clean|alpha_dash' 
                                         ),
                                          array( 
                                            'field' => 'password', 
                                            'label' => 'lang:lable_password', 
                                            'rules' => 'trim|required|xss_clean' 
                                          )
                                    ),
                             
      'formDongMoWebsite'          => array( 
                                          array( 
                                            'field' => 'TieuDe', 
                                            'label' => 'lang:lable_TieuDe', 
                                            'rules' => 'required|xss_clean' 
                                         ),
                                          array( 
                                            'field' => 'ThongBao', 
                                            'label' => 'lang:lable_ThongBao', 
                                            'rules' => 'required|xss_clean' 
                                          )
                                    ),
      'formCauHinhChung'    => array( 
                                          array( 
                                            'field' => 'TenTrangWeb', 
                                            'label' => 'lang:lable_TenTrangWeb', 
                                            'rules' => 'required|xss_clean' 
                                         ),
                                          array( 
                                            'field' => 'TieuDe', 
                                            'label' => 'lang:lable_TieuDe', 
                                            'rules' => 'required|xss_clean' 
                                          ),
                                          array( 
                                            'field' => 'MoTa', 
                                            'label' => 'lang:lable_MoTa', 
                                            'rules' => 'required|xss_clean' 
                                          ),
                                          array( 
                                            'field' => 'toado_x', 
                                            'label' => 'lang:lable_toado_x', 
                                            'rules' => 'required|xss_clean' 
                                          ),
                                          array( 
                                            'field' => 'toado_y', 
                                            'label' => 'lang:lable_toado_y', 
                                            'rules' => 'required|xss_clean' 
                                          )
                                    ),
      'formThanhToan'    => array( 
                                          array( 
                                            'field' => 'SoTaiKhoan', 
                                            'label' => 'lang:lable_SoTaiKhoan', 
                                            'rules' => 'required|xss_clean' 
                                         ), 
                                    ),
      'formBaoGia'    => array( 
                                          array( 
                                            'field' => 'TinRao', 
                                            'label' => 'lang:lable_TinRao', 
                                            'rules' => 'required|xss_clean' 
                                         ), 
                                    ),
      'formNapTien'    => array( 
                                          array( 
                                            'field' => 'merchant_id', 
                                            'label' => 'lang:lable_merchant_id', 
                                            'rules' => 'required|xss_clean' 
                                         ), 
                                    )
                             
               );