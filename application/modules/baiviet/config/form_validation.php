<?php
$config = array( 
      'formTaoBaiViet'      => array( 
                                    array( 
                                            'field' => 'TieuDe', 
                                            'label' => 'lang:lable_TieuDe', 
                                            'rules' => 'trim|required' 
                                         ),
                                    array( 
                                            'field' => 'Loai', 
                                            'label' => 'lang:lable_type', 
                                            'rules' => 'trim|required|xss_clean' 
                                         ),
                                    array( 
                                            'field' => 'TrangThai', 
                                            'label' => 'lang:lable_TrangThai', 
                                            'rules' => 'trim|required|xss_clean' 
                                         ),
                                    array( 
                                            'field' => 'Link', 
                                            'label' => 'lang:lable_link', 
                                            'rules' => '' 
                                         ),
                                    array( 
                                            'field' => 'NoiDung', 
                                            'label' => 'lang:lable_NoiDung', 
                                            'rules' => '' 
                                         )
                                  )
     
               );