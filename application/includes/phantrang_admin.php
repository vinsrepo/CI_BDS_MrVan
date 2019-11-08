<?php
        include 'timkiem_admin.php';
        
        //phan trang
        $cauhinh=$this->default_model->getInfoID('cauhinh',array('IDCauHinh'=>13));
        $cauhinh=json_decode($cauhinh['GiaTri'],true);
        $this->load->library('pagination');
        $config['base_url'] = $url_phantrang;
        $config['total_rows'] = $this->default_model->totalRows($this->_table,$loai,$this->_id,$dieukien,$noibang);
        $config['per_page'] = $cauhinh['PhanTrang'];
        $config['use_page_numbers'] = TRUE;
        
        $config['full_tag_open'] = '<ul class="pagination pull-right m-0 p-0">';
        $config['full_tag_close'] = '</ul> ';
        
        $config['first_link'] = '<i class="fa fa-angle-double-left"></i>';
        $config['first_tag_open'] = '<li class="first">';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link'] = '<i class="fa fa-angle-double-right"></i>';
        $config['last_tag_open'] = '<li class="last">';
        $config['last_tag_close'] = '</li>';
        
        $config['next_link'] = '<i class="fa fa-angle-right"></i>';
        $config['next_tag_open'] = '<li class="next">';
        $config['next_tag_close'] = '</li>';
        
        $config['prev_link'] = '<i class="fa fa-angle-left"></i>';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>'; 
        
        $this->pagination->initialize($config); 
        
        $start=($page-1)*$config['per_page'];
        $user['data']=$this->default_model->getTableRows($this->_table,$config['per_page'],$start,$bien_sapxep_hienthi,$loai,$this->_id,$noibang,$dieukien);
        if($sucess!=""&&$sucess!="true"&&$sucess!="action"){
            $user['sucess']=$this->lang->line('thongbao_doi_thongtin_thanhcong');
        }
        $user['start']=$start;
        $user['end']=$start+$config['per_page'];
        $user['totalrow']=$config['total_rows'];
        $this->load->view('admin/admin',$user);
    