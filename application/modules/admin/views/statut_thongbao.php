<?php
    if(!isset($sucess))
    { 
        $sucess='';
    }
    if(!isset($error))
    { 
        $error='';
    }
    
    if($sucess!="")
    {
        $ThongBao=$sucess;
        $style='success';
        $statut='';
    }
    else
    {
        $ThongBao=$error;
        $style='error';
        $statut=$this->lang->line('lable_Error').":";
    }
         $start_div_statut='
         <div class="alert alert-'.$style.' alert-dismissible fade in">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            '.$statut.'
  ';
         
         $end_div_statut='</div>';  
           
           if(validation_errors())
           {
                echo validation_errors($start_div_statut,$end_div_statut);
           }
           
           if($sucess!=""||$error!="")
           {
                echo $start_div_statut.$ThongBao.$end_div_statut;
           }
           ?>
           <style>
           .alert b, .alert button span{
              color: green!important;
           }
           .alert {
              margin-top: 10px;
              margin-bottom: 10px;
           }
           </style>