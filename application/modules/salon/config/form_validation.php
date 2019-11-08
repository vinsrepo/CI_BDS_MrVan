<?php
$config = array( 
      'formCaiDatSalon'      => array( 
                                    array( 
                                            'field' => 'TrangThai', 
                                            'label' => 'lang:lable_TrangThai', 
                                            'rules' => 'trim|required|xss_clean' 
                                         ),
                                    array( 
                                            'field' => 'TenSalon', 
                                            'label' => 'lang:lable_name_salon', 
                                            'rules' => 'trim|required|xss_clean' 
                                         ),
                                    array( 
                                            'field' => 'Domain', 
                                            'label' => 'lang:lable_domain_salon', 
                                            'rules' => 'trim|required|xss_clean' 
                                         ),
                                    array( 
                                            'field' => 'DienThoai', 
                                            'label' => 'lang:lable_mobile', 
                                            'rules' => 'trim|required|xss_clean' 
                                         ),
                                    array( 
                                            'field' => 'DiaChi', 
                                            'label' => 'lang:lable_add', 
                                            'rules' => 'trim|required|xss_clean' 
                                         ),
                                         array( 
                                            'field' => 'TinhThanh', 
                                            'label' => 'lang:lable_TinhThanh', 
                                            'rules' => 'trim|required|xss_clean' 
                                         ),
                                    array( 
                                            'field' => 'GioiThieu', 
                                            'label' => 'lang:lable_gioithieu', 
                                            'rules' => 'trim|required|xss_clean' 
                                         ),
                                  ),
      'formLienHe'      => array( 
                                    array( 
                                            'field' => 'HoVaTen', 
                                            'label' => 'lang:lable_name', 
                                            'rules' => 'trim|required|xss_clean' 
                                         ),
                                    array( 
                                            'field' => 'Email', 
                                            'label' => 'lang:lable_email', 
                                            'rules' => 'trim|required|xss_clean' 
                                         ),
                                    array( 
                                            'field' => 'DienThoai', 
                                            'label' => 'lang:lable_mobile', 
                                            'rules' => 'trim|required|xss_clean' 
                                         ),
                                    array( 
                                            'field' => 'DiaChi', 
                                            'label' => 'lang:lable_add', 
                                            'rules' => 'trim|required|xss_clean' 
                                         ),
                                    array( 
                                            'field' => 'NoiDung', 
                                            'label' => 'lang:lable_NoiDung', 
                                            'rules' => 'trim|required|xss_clean' 
                                         ),
                                    array( 
                                            'field' => 'Salon', 
                                            'rules' => 'trim|required|xss_clean' 
                                         ),
                                    array( 
                                            'field' => 'MaXacNhan', 
                                            'label' => 'lang:Mã xác nhận', 
                                            'rules' => 'trim|required|xss_clean' 
                                         ),
                                  )
     
               );