<?php
$this->load->library('ckeditor/ckeditor');
$this->load->library('ckeditor/ckfinder');
//Thu muc asset chua ckeditor và ckfinder
$this->ckeditor->basePath = base_url() . 'asset/ckeditor/';
//Thiet lap các tool icon ckeditor
        
// Thiet lap ngôn ngu hien thi en => english, vi => Viet Nam , fr => Phap
$this->ckeditor->config['language'] = 'vi';

$this->ckeditor->config['width'] = '100%';
$this->ckeditor->config['height'] = '300px';

//Them ckfinder vao 
$this->ckfinder->SetupCKEditor($this->ckeditor, '../../../../asset/ckfinder/');