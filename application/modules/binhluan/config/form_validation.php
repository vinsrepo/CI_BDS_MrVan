<?php
$config = array( 
      'formVietBinhLuan'      => array( 
                                    array( 
                                            'field' => 'ID', 
                                            'label' => 'lang:ID', 
                                            'rules' => 'trim|required|integer|xss_clean' 
                                         ),
                                    array( 
                                            'field' => 'Loai', 
                                            'label' => 'lang:Loai', 
                                            'rules' => 'trim|required|alpha|xss_clean' 
                                         ),
                                    array( 
                                            'field' => 'NoiDung', 
                                            'label' => 'lang:lable_NoiDung', 
                                            'rules' => 'required|xss_clean' 
                                         )
                                  )
     
               );