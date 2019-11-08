<?
if($sucess=="true"){
            $this->session->unset_userdata(array('tukhoa' => '','TimTheo' => ''));
        }        
        if(!isset($user['sucess'])){
        $user['sucess']="";
        }
        //luu sap xep
        $order=$this->input->post("SapXep");
        if(isset($order)&&$order!=""&&$this->input->post("XoaDuLieu")==""&&$this->input->post("search")==""){
        foreach( $order as $key => $n ) 
        {
        $this->default_model->updateDuLieu($this->_table,array("SapXep" => $n),array("$this->_id" => $key));
        }
        $user['sucess']=$this->lang->line('thongbao_doi_thongtin_thanhcong');
        }       
        //xoa du lieu
        $xoa=$this->input->post("XoaDuLieu");
        if(isset($xoa)&&$xoa!=""){
        $this->default_model->XoaDuLieu($xoa,$this->_table,$this->_id);
        $user['sucess']=$this->lang->line('thongbao_xoa_thanhcong');
        }
        //tim kiem
        $tukhoa=$this->input->post("search");
        $TimTheo=$this->input->post("Loai");                           
        if(isset($tukhoa)&&$tukhoa!=""){
        $this->session->set_userdata(array('tukhoa' => $tukhoa,'TimTheo' => $TimTheo));
        $loai=$this->default_model->TimKiem($this->_table,$tukhoa,$TimTheo,$dieukien);
        }else{
        if($this->session->userdata('tukhoa')==TRUE){ 
        $tukhoa=$this->session->userdata('tukhoa');
        $TimTheo=$this->session->userdata('TimTheo'); 
        $loai=$this->default_model->TimKiem($this->_table,$tukhoa,$TimTheo,$dieukien);   
        }else{
         $loai="";   
        }
        }   
        $user['tukhoa']=$tukhoa;    