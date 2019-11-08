<?php if($Loai=='MenuHeader'||$Loai=='MenuFooter'||$Loai=='MenuHuongDan'||$users['Loai']=='MenuHeader'||$Loai=='DanhMuc'||$Loai=='TinTuc'||$Loai=='TuVanXe'||$Loai=='DanhGiaXe'||$Loai=='SoSanhXe'||$Loai=='KinhNghiem'||$Loai=='Oto360'||$Loai=='Video'||$users['Loai']=='MenuFooter'||$users['Loai']=='MenuHuongDan'||$users['Loai']=='DanhMuc'||$users['Loai']=='TinTuc'||$users['Loai']=='TuVanXe'||$users['Loai']=='DanhGiaXe'||$users['Loai']=='SoSanhXe'||$users['Loai']=='KinhNghiem'||$users['Loai']=='Oto360'||$users['Loai']=='Video'){
    $SEO=true;
}else{
    $SEO=false;
}
?>
<script type="text/javascript" src="/asset/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/asset/ckfinder/ckfinder.js"></script>
<!-- START CONTENT -->
<form action="#" method="post" class="form">
            <section id="main-content" class=" ">
                <section class="wrapper" style='margin-top:60px;display:inline-block;width:100%;padding:15px 0 0 15px;'>
 <div class="col-md-12 col-sm-12 col-xs-12">
<?php $this->load->view("admin/statut_thongbao");?>
                                    </div>
                                    <div class="<? if($SEO==true){echo 'col-lg-7 col-md-7 col-xs-12 col-sm-12';}else{echo 'col-lg-12 col-md-12 col-xs-12 col-sm-12';}?>">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left"><?php if(isset($users['TieuDe'])):?>
                         <?php echo $this->lang->line('lable_Edit');?>
                         <?php else:?>
                         <?php echo $this->lang->line('lable_creat');?> 
                         <? endif?>
                         <?php echo $this->lang->line('lable_'.$Loai.$users['Loai'].'');?></h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i> 
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">
                                <div class="row">
                                <? if($Loai=='DuAn'||$users['Loai']=='DuAn'){?>
 
                                                <div class="col-md-12 col-sm-12 col-xs-12 m-bot15" style="margin-bottom: 15px;">
                                <div class="col-xs-4 m-0 p-0">
                                       <select id="hddECity" class="form-control  input-lg m-bot15">
                                            <option value="">Tỉnh/Thành Phố</option>
                       <?
$arr = file_get_contents(APPPATH . 'includes/DSTinhThanhKey.txt');
foreach(json_decode($arr,true) as $key=>$val){
    $select_ed=" ".set_select('DoiXe', $val['Text']);
                                        if($tinban['DoiXe']==$val['Text']){
                                            $select_ed=" selected='selected'";
                                        }
    echo '
    <option value="'.$val['Text'].'" data-key="'.$val['Id'].'" '.$select_ed.'>'.$val['Text'].'</option>    ';
}
?>
                                        </select>
                                </div>
                                <div class="col-xs-4">
                                       <select id="hddEDist" class="form-control  input-lg m-bot15" ><option value="">Quận/Huyện</option></select> 
                                </div> 
                                <div class="col-xs-4"> 
                                       <select id="hddEProject" class="form-control  input-lg m-bot15" ><option value="">Chọn dự án</option></select>	 
                                </div> 
                            </div>
                            <script src="/style/js/jquery-1.7.1.min.js"></script>
     <script type="text/javascript">
function GetArea(module,code,val,fill,text,set){
    $.ajax
    ({ 
       type: "POST",
       url: "/chon-mau-xe?module="+module+"&"+code+"="+val, 
       success: function(response)
       {
           $("#"+fill).html('<option value="">'+text+'</option>')
           $("#"+fill).append(response); 
           $('#loading').hide();
       }            
    });
} 
  
    $('#hddECity').on('change', function () {  
        $('#loading').show();
        GetArea('GetDistrict','cityCode',$('option:selected', this).attr('data-key'),'hddEDist','Quận/Huyện',''); 
    });
    $('#hddEDist').on('change', function () {
        $('#loading').show();
        GetArea('GetProject','distId',$('option:selected', this).attr('data-key'),'hddEProject','Chọn Dự án','');  
    }); 
    $('#hddEProject').on('change', function () {
        $('#loading').show();
        $.ajax
    ({ 
       type: "POST",
       url: "/trangchu/addpr?id="+$('option:selected', this).attr('data-key'), 
       success: function(response)
       {
           fill=JSON.parse(response);
           $("#TieuDe").val(fill['projectName']);
           $("#DiaChi").val(fill['addName']);
           $("#Link").val(fill['Link']);
           CKEDITOR.instances['NoiDung'].setData('<img alt="" src="'+fill['IMG']+'"/>');
           $('#TrangThai').iCheck('check');
            $('#loading').hide();
       }            
    });
    });   
</script>                                        
<?}?>
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <div class="form-group">
                                            <label class="form-label" for="TieuDe"><?php echo $this->lang->line('lable_TieuDe');?> </label> 
                                            <div class="controls">
                                                <input type="text" class="form-control input-lg" name="TieuDe" id="TieuDe" value="<?php if(isset($users['TieuDe'])){echo $users['TieuDe'];}else{echo set_value('TieuDe');}?>">
                                            </div>
                                        </div>
                                        
                                        <? if($Loai=='DuAn'||$users['Loai']=='DuAn'){?>
                                        
                                        
                                        
                                        <div class="form-group">
                                            <label class="form-label" for="DiaChi">Địa chỉ</label> 
                                            <div class="controls">
                                                <input type="text" class="form-control input-lg" name="Description" id="DiaChi" value="<?php if(isset($users['Description'])){echo $users['Description'];}else{echo set_value('Description');}?>">
                                            </div>
                                        </div>
                                        <?}?>
                                        
                                        
                                        <?php if($Loai=='Banner'||$users['Loai']=='Banner'):?>
                                        <div class="form-group">
                                            <label class="form-label" for="ViTri">Vị trí</label> 
                                            <div class="controls">
                                                <select id="ViTri" class="form-control input-lg m-bot15" name="ViTri" >
                                        <option value=""></option>
							        	 <?php 
                                        $vitris=array('TOP','A1','A2','B1','B2','C','D','E1','E2','E3');
                                        foreach ($vitris as $pos)
                                        {   
                                           if($pos==$users['ViTri'])
                                           {
                                              $select='selected';
                                           }
                                           else
                                           {
                                              $select='';
                                           }
                                           echo '<option value="'.$pos.'" '.$select.'>'.$pos.'</option>';
                                        }
                                        ?>
										 
								</select>
                                            </div>
                                        </div>
                                        <? endif?>
                                        <?php if($Loai=='MenuHeader'||$Loai=='MenuFooter'||$Loai=='MenuHuongDan'||$users['Loai']=='MenuHeader'||$Loai=='DanhMuc'||$Loai=='TinTuc'||$Loai=='TuVanXe'||$Loai=='SoSanhXe'||$Loai=='DanhGiaXe'||$Loai=='KinhNghiem'||$users['Loai']=='MenuFooter'||$users['Loai']=='MenuHuongDan'||$users['Loai']=='DanhMuc'||$users['Loai']=='TinTuc'||$users['Loai']=='TuVanXe'):?>
                                        <div class="form-group">
                                            <label class="form-label" for="MenuCha"><?php echo $this->lang->line('lable_MenuParent');?></label> 
                                            <div class="controls">
                                                <select id="MenuCha" class="form-control input-lg m-bot15" name="MenuCha" >
                                        <option value="0"></option>
							        	 <?php 
                                        if(isset($menu))
                                                                                                                 
        $menu=catToTree($menu,0,' - - ',array('MenuCha','TieuDe')); 
 
                                        foreach ($menu as $data)
                                        {
                                           if($data['MenuCha']!=455&&$data['IDBaiViet']!=455||($Loai=='MenuHeader'||$users['Loai']=='MenuHeader')){ 
                                           
                                           if($data['IDBaiViet']==$users['MenuCha'])
                                           {
                                              $select='selected';
                                           }
                                           else
                                           {
                                              $select='';
                                           }
                                           echo '<option value="'.$data['IDBaiViet'].'" '.$select.'> '.$data['TieuDe'].'</option>';
                                        }
                                        }
                                        ?>
										 
								</select>
                                            </div>
                                        </div>
                                        <? endif?>
                                        <div class="form-field clear hidden" >
								<label for="select" class="form-label fl-space2"><b><?php echo $this->lang->line('lable_type');?>:</b></label>
                                <?php if(isset($users['Loai']))
                                {
                                    $Loai=$users['Loai'];
                                } 
                                 ?>  
                                
                                <b style="color: blue;"><?php echo $this->lang->line('lable_'.$Loai.'');?></b>
                                <input style="display: none;" type="text" name="Loai" value="<?php echo $Loai;?>" />
								 
							</div><!-- /.form-field -->	
                                        
                                        <?php if($Loai=='MenuHeader'||$Loai=='MenuFooter'||$Loai=='Banner'||$users['Loai']=='MenuHeader'||$Loai=='DanhMuc'||$users['Loai']=='MenuFooter'||$users['Loai']=='DanhMuc'||$users['Loai']=='Banner'||$Loai=='DuAn'||$users['Loai']=='DuAn'):?>	
                                        <div class="form-group">
                                            <label class="form-label" for="Link"><?php echo $this->lang->line('lable_link');?> </label> 
                                            <div class="controls">
                                                <input type="text" class="form-control input-lg" name="Link" id="Link" value="<?php if(isset($users['Link'])){echo $users['Link'];}else{echo set_value('Link');}?>">
                                            </div>
                                        </div>
                                        <? endif?>
                                        
                                        <?php if($Loai!='DanhMuc'||(isset($users['Loai'])&&$users['Loai']!='DanhMuc')):?>  
                                        <div class="form-group">
                                            <label class="form-label" for="NoiDung">Nội dung</label> 
                                            <div class="controls">
                                                <?php
         
        if(isset($users['TieuDe'])){
            $NoiDung=$users['NoiDung'];
        }else{
            $NoiDung=set_value('NoiDung');
        }
        echo $this->ckeditor->editor("NoiDung",html_entity_decode($NoiDung)); 
        
         
        ?>
                                            </div>
                                        </div>
                                        <? endif?>

                                        <div class="form-group pull-left">
                                            <label class="form-label" for="TrangThai"><?php //echo $this->lang->line('lable_TrangThai');?> </label> 
                                            <div class="controls" style="float: right;">
                                                <input tabindex="5" type="radio" name="TrangThai" id="TrangThai" value="1" class="skin-square-green" <?php if(isset($users['TrangThai'])&&($users['TrangThai']=='1')){ echo "checked";}else{echo set_radio('TrangThai', '1');} ?>/> <label class="iradio-label form-label" for="TrangThai" style="margin-right: 20px;"><?php echo $this->lang->line('lable_KichHoat');?> </label>
                                                <input tabindex="5" type="radio" name="TrangThai" value="0" id="square-radio-3" class="skin-square-green" <?php if(isset($users['TrangThai'])&&($users['TrangThai']=='0')){ echo "checked";}else{echo set_radio('TrangThai', '0');} ?>/> <label class="iradio-label form-label" for="square-radio-3"><?php echo $this->lang->line('lable_ChuaKichHoat');?> </label>

                                            </div>
                                        </div>
                                        
                                        <button class="btn btn-success btn-icon bottom15 pull-right" type="submit">
                                            <i class="fa fa-save"></i> &nbsp; <span><?php echo $this->lang->line('lable_btnCapNhap');?></span>
                                        </button>

                                    </div>
                                </div>

                            </div>
                        </section></div>
                        <? if($SEO==true){?>
                                    <div class="col-lg-5 col-md-5 col-xs-12 col-sm-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">THÔNG TIN SEO</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i> 
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <div class="content-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                    
                                    <div class="form-group">
                                            <label class="form-label" for="Title">Tiêu đề SEO</label> 
                                            <div class="controls">
                                                <input type="text" name="Title" class="form-control input-lg" id="Title" value="<?php if(isset($users['Title'])){echo $users['Title'];}else{echo set_value('Title');}?>">
                                            </div>
                                        </div>
                                    <div class="form-group">
                                            <label class="form-label" for="H1">Thẻ H1</label> 
                                            <div class="controls">
                                                <input type="text" name="H1" class="form-control input-lg" id="H1" value="<?php if(isset($users['H1'])){echo $users['H1'];}else{echo set_value('H1');}?>">
                                            </div>
                                        </div>
                                    <div class="form-group">
                                            <label class="form-label" for="H2">Thẻ H2</label> 
                                            <div class="controls">
                                                <input type="text" name="H2" class="form-control input-lg" id="H2" value="<?php if(isset($users['H2'])){echo $users['H2'];}else{echo set_value('H2');}?>">
                                            </div>
                                        </div>
                                    <div class="form-group">
                                            <label class="form-label" for="tagsinput-1">Meta Keyword</label> 
                                            <div class="controls">
                                                <input type="text" name="Keyword" class="form-control input-lg" id="tagsinput-1" data-role="tagsinput" value="<?php if(isset($users['Keyword'])){echo $users['Keyword'];}else{echo set_value('Keyword');}?>">
                                            </div>
                                        </div>
                                    <div class="form-group">
                                            <label class="form-label" for="Description">Meta Description</label> 
                                            <div class="controls">
                                                <textarea name="Description" id="Description" class="form-control input-lg" style="height: 100px;"><?php if(isset($users['Description'])){echo $users['Description'];}else{echo set_value('Description');}?></textarea>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </section></div> 
                        <?}?>
                </section>
            </section>
</form>
            <!-- END CONTENT -->