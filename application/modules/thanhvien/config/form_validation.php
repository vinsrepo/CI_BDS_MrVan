<?php
//thong tin dang ky
$ThongTinDangKy = array( 
                  'username'  =>         array( 
                                            'field' => 'username', 
                                            'label' => 'lang: Tên đăng nhập', 
                                            'rules' => 'trim|required|min_length[4]|max_length[25]|xss_clean|alpha_dash' 
                                         ), 
                  'password'  =>         array( 
                                            'field' => 'password', 
                                            'label' => 'lang: Mật khẩu', 
                                            'rules' => 'trim|required|matches[repassword]|xss_clean|md5' 
                                         ),
                  'Email'  =>            array( 
                                            'field' => 'Email', 
                                            'label' => 'lang:lable_email', 
                                            'rules' => 'trim|valid_email|xss_clean' 
                                         ),
                  'HoVaTen'  =>          array( 
                                            'field' => 'HoVaTen', 
                                            'label' => 'lang:lable_HoVaTen', 
                                            'rules' => 'trim|xss_clean' 
                                         ),
                  'GioiTinh'  =>         array( 
                                            'field' => 'GioiTinh', 
                                            'label' => 'lang:lable_GioiTinh', 
                                            'rules' => 'trim|xss_clean' 
                                         ),
                  'TinhThanh'  =>        array( 
                                            'field' => 'TinhThanh', 
                                            'label' => 'lang:lable_TinhThanh', 
                                            'rules' => 'trim|xss_clean' 
                                         ),
                  'DienThoai'  =>         array( 
                                            'field' => 'DienThoai', 
                                            'label' => 'lang:Điện thoại', 
                                            'rules' => 'trim|required|xss_clean|min_length[10]|max_length[12]|numeric' 
                                         ),
                  'DiaChi'  =>        array( 
                                            'field' => 'DiaChi', 
                                            'label' => 'lang:Địa chỉ', 
                                            'rules' => 'trim|xss_clean' 
                                         ),
                  'MaXacNhan'  =>        array( 
                                            'field' => 'MaXacNhan', 
                                            'label' => 'lang:lable_captcha', 
                                            'rules' => 'trim|required|xss_clean' 
                                         )
                        );

$config = array( 
      'formDangKy'          => array( 
                                    $ThongTinDangKy['username'],
                                    $ThongTinDangKy['password'],
                                    $ThongTinDangKy['Email'],
                                    $ThongTinDangKy['HoVaTen'],
                                    $ThongTinDangKy['GioiTinh'],
                                    $ThongTinDangKy['DienThoai'],
                                    $ThongTinDangKy['DiaChi'],
                                    $ThongTinDangKy['TinhThanh'],
                                    $ThongTinDangKy['MaXacNhan']
                                  ),
     'formSuaThongTinCaNhan' => array( 
                                    $ThongTinDangKy['HoVaTen'],
                                    $ThongTinDangKy['GioiTinh'],
                                    $ThongTinDangKy['DienThoai'],
                                    $ThongTinDangKy['DiaChi'],
                                    $ThongTinDangKy['TinhThanh']
                                  ),
     'formSuaThanhVien'      => array( 
                                    array( 
                                            'field' => 'username', 
                                            'label' => 'Tên đăng nhập', 
                                            'rules' => 'trim|required|min_length[4]|max_length[25]|xss_clean|alpha_dash' 
                                         ),
                                    array( 
                                            'field' => 'password', 
                                            'label' => 'Mật khẩu', 
                                            'rules' => 'trim' 
                                         ),
                                    array( 
                                            'field' => 'Email', 
                                            'label' => 'lang:lable_email', 
                                            'rules' => 'trim|required|valid_email|xss_clean' 
                                         ),
                                    $ThongTinDangKy['HoVaTen'],
                                    $ThongTinDangKy['GioiTinh'],
                                    $ThongTinDangKy['DienThoai'],
                                    $ThongTinDangKy['DiaChi'],
                                    $ThongTinDangKy['TinhThanh']
                                  ),
     'formDangNhap'         => array( 
                                    array( 
                                            'field' => 'username', 
                                            'label' => 'Tên đăng nhập', 
                                            'rules' => 'required|xss_clean' 
                                         ), 
                                    array( 
                                            'field' => 'password', 
                                            'label' => 'Mật khẩu', 
                                            'rules' => 'required|xss_clean' 
                                         ) 
                                  ),
    'formDoiMatKhau'       => array( 
                                    array( 
                                            'field' => 'MatKhauCu', 
                                            'label' => 'Mật khẩu cũ', 
                                            'rules' => 'required|xss_clean' 
                                         ), 
                                    array( 
                                            'field' => 'MatKhauMoi', 
                                            'label' => 'Mật khẩu mới', 
                                            'rules' => 'required|matches[NhapLaiMatKhauMoi]|xss_clean' 
                                         ) 
                                  ),                            
    'formXacthuc'         => array(
                                  array(
                                    'field'=> 'MaXacThuc',
                                    'label' => 'Mã xác thực',
                                    'rules' => 'required|xss_clean'
                                  )
                              )
    );