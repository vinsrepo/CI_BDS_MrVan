 <div class="breadcrumbs ">
        <div class="center">
           <div class="list-content">
             <ul class="grid12-12">
                 <li><a href="<? echo base_url();?>" title="<?php echo $this->lang->line('lable_home');?>"><span><?php echo $this->lang->line('lable_home');?></span></a> <span class="mpx-arr-thin-right"></span></li> 
                 <? if($TinhThanh!='') : ?>
           <li><a href="/mua-xe" title="<?php echo $this->lang->line('title_tinmuaxe');?>"><span><? echo $this->lang->line('title_tinmuaxe');?></span></a> <span class="mpx-arr-thin-right"></span></li> 
           <li><a href=""><span class="last"><?php echo $TinhThanh;?></span></a> <span class="mpx-arr-thin-right last"></span></li>
           <? else:?>
           <li><a href=""><span class="last"><? echo $this->lang->line('title_tinmuaxe');?></span></a> <span class="mpx-arr-thin-right last"></span></li>
           <? endif;?>
                              
                 </ul>
           </div>
                    </div>
    </div>
 <div class="center">
 <div class="list-content"> 
 <style>
 .city_div{
     
 }
 </style>
 <div class="salonfilter">
    <div class="search"> 
        <div class="saloncity" style="padding: 10px;overflow: hidden;height: auto;text-align: justify;width: 100%;padding-top: 0px;"> 
            <a href="/mua-xe<? if($GiaTien!=''){ echo '-'.strtolower(stripUnicode($GiaTien));}?>"<? if($TinhThanh=='Toàn quốc'||$TinhThanh=='')
                { 
                    echo ' class=" city_div active"';
                }else{echo ' class=" city_div "';}?>>Toàn quốc</a>
            <a>|</a>
            <?php 
             $arr = file(APPPATH . 'includes/DSTinhThanh.txt');
             foreach($arr as $row) { 
                if($TinhThanh==trim($row))
                { 
                    $select='active';
                }else{
                    $select='';
                }
                if($GiaTien!=''&&$GiaTien!='Toàn quốc'){
                        $link_money='-'.strtolower(stripUnicode($GiaTien));
                    }else{
                        $link_money='';
                    }
                
                echo '
                <a href="'.base_url().'mua-xe-'.stripUnicode($row).''.$link_money.'" class="'.$select.' city_div">'.trim($row).'</a>
                <a>|</a> 
                     ';
             }
             ?>
                       
        </div> 
    </div>
</div>
 
                
                
<link href="<? echo base_url();?>style/css/tinban.css" rel="stylesheet" type="text/css" />
<!-- begin city diaglog-->
	 
	<div class="list_buy_cars">
		<div class="bcar_header">
		<div id="pricerange_group" class="bcar_listprice" style="font-size: 12px;">
			<span><b>Mức giá: </b> &nbsp;</span>
             
			<a id="pricerange_0" href="/mua-xe<? if($TinhThanh!=''){echo '-'.strtolower(stripUnicode($TinhThanh));} ?>" onclick="javascript:do_filter(this);" <? if($GiaTien=='Toàn quốc')
                { 
                    echo 'class="priceactive"';
                }?>>Tất cả</a>
			<?php 
            
             $arr = file(APPPATH . 'includes/muctien.txt');
             foreach($arr as $row) { 
                
                
                if(strpos(trim($row),'<')!==false){
                    $stt='Dưới ';
                    $money=giaca(str_replace('<','',trim($row)).'000000');
                }else{
                   if(strpos(trim($row),'>')!==false){
                    $stt='Trên ';
                    $money=giaca(str_replace('>','',trim($row).'000000'));
                   }else{
                    $stt='Từ ';
                    $khoang1=preg_replace('/([0-9]+)-([0-9]+)/',"$1",trim($row));
                    $khoang2=preg_replace('/([0-9]+)-([0-9]+)/',"$2",trim($row));
                    $money=giaca($khoang1.'000000').' đến '.giaca($khoang2.'000000');
                   } 
                }
                if($GiaTien==trim($stt.$money)){
                    $select=' class="priceactive"';
                    }else{
                    $select='';
                    }
                    if($TinhThanh!=''&&$TinhThanh!='Toàn quốc'){
                        $link_city='-'.stripUnicode($TinhThanh);
                    }else{
                        $link_city='';
                    }
                echo '
                     <a href="/mua-xe'.$link_city.'-'.strtolower(stripUnicode(trim($stt.$money))).'" onclick="javascript:do_filter(this);"'.$select.'>'.trim($stt.$money).'</a>
                     ';
             }
             ?>
		</div>
		
		</div>
<div id="search_content">		
			
	              <?	
                  if($salon_data){ 
                  foreach ($salon_data as $tintuc)
                  {
                   $NoiDung=strip_tags($tintuc['NoiDung']);
                                    $NoiDung=''.substr($NoiDung,0,300).'';
                                    $NoiDung=substr($NoiDung, 0, strrpos($NoiDung, ' ')).'...';
                  echo '
              <!-- begin buy car item 1-->
			  <div class="buy_car_item bcrow1">
				<div class="bcar_code">Mã tin:<br> '.$tintuc['IDMaTin'].'
</div>
				<div class="bcar_content">
				<a href="'.base_url().'mua-xe/'.stripUnicode($tintuc['TieuDe']).'-'.$tintuc['IDMaTin'].'.html" title="'.$tintuc['TieuDe'].'"><span class="bcar_title">'.$tintuc['TieuDe'].' &nbsp;&nbsp;<font style="font-size:13">['.$tintuc['GiaTien'].']</font></span></a>
				'.$NoiDung.'
			
				</div>
				<div class="bcar_contact">
					<b>Liên hệ</b>: '.$tintuc['HoVaTen'].'- ĐT: '.$tintuc['DienThoai'].'.<br>
					Địa chỉ:  '.$tintuc['DiaChi'].'
				</div>
				<div class="bcar_city">
					'.$tintuc['TinhThanh'].'
					<br><br>
					<span style="font-weight:normal;color:#666;font-style:italic">Ngày: '.date("d/m/Y",strtotime($tintuc['NgayDang'])).'</span>
					
				</div>
			</div>
			<!-- end buy car item 1-->
                   ';
                  }
                   
                  }else{
                    echo '<div class="note note-warning" style="margin-top:20px;"><div class="warning-box">'.$this->lang->line('lable_no_rows').'</div></div>';
                  }
                   
                  ?>
     
													 
					
			
			<div class="pagging" style="padding-bottom: 20px;">
			<div class="cpage"> </div>
			
			<div class="navpage">
				<div class="navpage"> 
                 <?php echo $this->pagination->create_links();?> 
                </div>	
			</div>
			<div style="float:right;margin:5px 10px 0px 0px;;"> </div>
		
			</div>
	
</div>			
	</div>
    	</div>
        	</div>
    	</div>