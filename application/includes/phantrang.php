
<?php
        //phan trang
        if(!isset($noibang)){
            $noibang='';
        }
        $cauhinh=$this->default_model->getInfoID('cauhinh',array('IDCauHinh'=>13));
        $cauhinh=json_decode($cauhinh['GiaTri'],true);
        $this->load->library('pagination');
        $config['base_url'] = $url_phantrang;
        $config['total_rows'] = $this->default_model->totalRows($this->_table,"",$this->_id,$dieukien,$noibang);
        if(isset($PhanTrang)){
            $config['per_page'] = $PhanTrang;
        }else{
            $config['per_page'] = $cauhinh['PhanTrang'];
        }
        
        $config['use_page_numbers'] = TRUE;
        
        $config['first_link'] = 'Trang đầu';
        $config['next_link'] = 'Trang sau';
        $config['prev_link'] = 'Trang trước';
        $config['last_link'] = 'Trang cuối';
        
        $config['full_tag_open'] = '<div class="pager_controls">';
        $config['full_tag_close'] = '</div>';
        
        $config['cur_tag_open'] = '<span class="style-pager-row-selected" align="center">';
        $config['cur_tag_close'] = '</span>';
        
        $config['num_tag_open'] = ' <span class="style-pager-row" align="center">';
        $config['num_tag_close'] = '</span>'; 
        
        $this->pagination->initialize($config); 
        
        $start=($page-1)*$config['per_page'];
         
    