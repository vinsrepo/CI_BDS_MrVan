<?php
$config = array( 
      'formLienHe'      => array( 
                                    array( 
                                            'field' => 'name', 
                                            'label' => 'lang:lable_name', 
                                            'rules' => 'trim|required|xss_clean' 
                                         ),
                                    array( 
                                            'field' => 'email', 
                                            'label' => 'lang:lable_email', 
                                            'rules' => 'trim|required|xss_clean|valid_email' 
                                         ),
                                    array( 
                                            'field' => 'message', 
                                            'label' => 'lang:lable_NoiDung', 
                                            'rules' => 'trim|required|xss_clean' 
                                         ),
                                    array( 
                                            'field' => 'DiaChi', 
                                            'label' => 'lang:lable_add', 
                                            'rules' => 'trim|xss_clean' 
                                         ),
                                    array( 
                                            'field' => 'DienThoai', 
                                            'label' => 'lang:lable_mobile', 
                                            'rules' => 'trim|xss_clean' 
                                         )
                                  )
     
               );