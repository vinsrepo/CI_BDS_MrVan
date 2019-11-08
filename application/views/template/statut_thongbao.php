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
    $start_div_statut='<div id="note_temp" class="note note-'.$style.'">';
         
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
<script type="text/javascript"> 
    $(document).ready( function() {
        $('#note_temp').delay(9000).fadeOut(800);
    });
</script>