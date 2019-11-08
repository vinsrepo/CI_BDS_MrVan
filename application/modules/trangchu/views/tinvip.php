<script language="javascript" type="text/javascript" src="<? echo base_url();?>style/js/ja.script.js"></script>
<link rel="stylesheet" href="<? echo base_url();?>style/css/ja.vm.css" type="text/css" />

<script type="text/javascript" src="<? echo base_url();?>style/js/ja.vmproductslide.js"></script>
	<script type="text/javascript">
		var options={
		    w: 518,
		    h: 350,
		    num_elem: 1,
		    mode: 'horizontal', //horizontal or virtical
		    direction: 'horizontal', //horizontal: left or right; virtical: up or down
			total: 5,
			url: '',
		    wrapper: 'ja-slider-center',
		    duration: 2000,
		    interval: 4000,
			running: false,
		    auto: 1		};
		
		var jsslider = null;
	</script>
	
	<script type="text/javascript">
	//<!--[CDATA[
	function sliderInit (){
		jsslider = new JS_Slider(options);
		elems = $('ja-slider-center').getElementsByClassName ('vm_element');
		for(i=0;i<elems.length;i++){
			jsslider.update (elems[i].innerHTML, i);
		}
		jsslider.setPos(null);
		if(jsslider.options.auto){
			jsslider.nextRun();
		}
	}
	
	jaAddEvent(window, 'load', sliderInit);
	
	function setDirection(direction,ret){
		jsslider.options.direction = direction;
		if(jsslider.options.auto){
			if(ret){
				if(direction == 'right'){
					$('ja-slide-left-img').src = '<? echo base_url();?>style/images/re-left.gif';
				}else  {
					$('ja-slide-right-img').src = '<? echo base_url();?>style/images/re-right.gif';
				}
				jsslider.options.interval = 3000;
				jsslider.options.duration = 2000;
			}
			else{
				if(direction == 'right'){
					$('ja-slide-left-img').src = '<? echo base_url();?>style/images/re-left-hover.gif';
				}else  {
					$('ja-slide-right-img').src = '<? echo base_url();?>style/images/re-right-hover.gif';
				}
				jsslider.options.interval = 800;
				jsslider.options.duration = 500;
				jsslider.nextRun();
			}
		}
		else{
			if(ret){
				if(direction == 'right'){
					$('ja-slide-left-img').src = '<? echo base_url();?>style/images/re-left.gif';
				}else  {
					$('ja-slide-right-img').src = '<? echo base_url();?>style/images/re-right.gif';
				}
				jsslider.options.auto = 1;
			}
			else{
				if(direction == 'right'){
					$('ja-slide-left-img').src = '<? echo base_url();?>style/images/re-left-hover.gif';
				}else  {
					$('ja-slide-right-img').src = '<? echo base_url();?>style/images/re-right-hover.gif';
				}
				jsslider.options.interval = 500;
				jsslider.options.duration = 500;
				jsslider.options.auto = 1;
				jsslider.nextRun();
			}		
		}
	}
	
	
	function pause_slide()
	{
		jsslider.options.auto = false;
		clearTimeout(jsslider.timeOut);
	}
	
	function continue_slide()
	{
		jsslider.options.auto = true;
		jsslider.nextRun();
	}
	//]]-->
	</script>

<div class="sgd_top">
  <div class="bds_vip_top">
	<div class="sgd_topl_title"><? echo $this->lang->line('lable_tinbanxe');?> VIP</div>
    <div class="sgd_topl_title_more" style="width:87px;">
		
		
		<div id="ja-slider-left" >
		 <img  class="ja-slide-left-img" id="ja-slide-left-img" src="<? echo base_url();?>style/images/re-left.gif" alt="Left direction" onmouseover="javascript: setDirection('right',0);" onmouseout="javascript: setDirection('right',1);" title="Left direction" /></div>
		 
		 <div class="phanngang_buttonscroll">|</div>
		 
		 <div id="ja-slider-right">
		<img class="ja-slide-right-img" id="ja-slide-right-img" src="<? echo base_url();?>style/images/re-right.gif" alt="Right direction" onmouseover="javascript: setDirection('left',0);" onmouseout="javascript: setDirection('left',1);" title="Right direction" /></div>
		 
		 <div class="all_bds_vip">
		 	<a  href="<? echo base_url();?>o-to">[tất cả]</a>
		 </div>
	</div>
  </div>
  
  
  <div id="ja-slider" class="bdsvip_center1">
  		<div id="ja-slider-center" >
				
				
				
						
     
                  <?	
                  if($vip){ 
                  $sothutu=0;
                  foreach ($vip as $tintuc)
                  { 
                    $sothutu=$sothutu+1;
                    if($sothutu%6==1||$sothutu==1){
                        echo '<div class="vm_element" >';
                    }
                     $logo='';
                    $HangXe=Modules::run('baiviet/getDanhMucCha',$tintuc['HangXe']);
                    $DoiXe=Modules::run('baiviet/getDanhMucCha',$tintuc['DoiXe']);
                    $slide=explode('|',$tintuc['AlbumAnh']);
                            $stt=0;
                            foreach($slide as $img){
                            if($img!=''&&$img!='undefined'){
                            $stt=$stt+1;
                             if($stt==1){
                                 $logo=''.base_url().'upload/photo/'.$img.'';
                                }
                             }
                            }
                    if($sothutu%2==0){
                        $colum='_r';
                    }else{
                        $colum='';
                    }
                    if($logo==''){$logo=''.base_url().'upload/photo/noimage.gif';}
                  echo '
            <div class="bdsvip_box'.$colum.'" title="'.$HangXe['TieuDe'].' '.$DoiXe['TieuDe'].' '.$tintuc['PhanHang'].' '.$tintuc['NamSX'].'"  onmouseover="pause_slide();" onmouseout="continue_slide();">    	
	  <div class="bdsvip_left">
		<div class="bdsvip_img">         	
			<div class="icon_tinvip_home"></div>
		<a href="'.base_url().'xe-'.$tintuc['IDMaTin'].'/'.stripUnicode($HangXe['TieuDe']).'-'.stripUnicode($DoiXe['TieuDe']).'.html" title="'.$HangXe['TieuDe'].' '.$DoiXe['TieuDe'].' '.$tintuc['PhanHang'].' '.$tintuc['NamSX'].'">
			<img src="'.$logo.'"  alt="'.$HangXe['TieuDe'].' '.$DoiXe['TieuDe'].' '.$tintuc['PhanHang'].' '.$tintuc['NamSX'].'" style="width:82px;height:67px"/>
			</a>
		</div>
        

        	<div class="bdsvip_star">
            	<img width="12" height="12" src="'.base_url().'style/images/star.gif"> <img width="12" height="12" src="'.base_url().'style/images/star.gif"> <img width="12" height="12" src="'.base_url().'style/images/star.gif"> <img width="12" height="12" src="'.base_url().'style/images/star.gif"> <img width="12" height="12" src="'.base_url().'style/images/star.gif">
            </div>

	  </div>
	  <div class="bdsvip_right"> 
      <div class="bdsvip_title"><a href="'.base_url().'xe-'.$tintuc['IDMaTin'].'/'.stripUnicode($HangXe['TieuDe']).'-'.stripUnicode($DoiXe['TieuDe']).'.html" title="'.$HangXe['TieuDe'].' '.$DoiXe['TieuDe'].' '.$tintuc['PhanHang'].' '.$tintuc['NamSX'].'"> '.$HangXe['TieuDe'].' '.$DoiXe['TieuDe'].' '.$tintuc['PhanHang'].' '.$tintuc['NamSX'].'</a></div>
       <div class="vip_price">
	  <a class="xanh">
	  <span id="priceText0">
      	'.giaca($tintuc['GiaTien']).'      </span>
	
								
	  </a> </div>
	  <br />
		<span>Tỉnh:
        
        '.$tintuc['TinhThanh'].'	</span><br />
		<span>Năm sản xuất: '.$tintuc['NamSX'].'</span> </div>
	</div>
                  ';
                  
                  if($sothutu%6==0){
                        echo '</div>';
                    }
                  if($sothutu==count($vip)&&$sothutu%6!=0){
                        echo '</div>';
                    }
                  }
                  
                  
                  }
                   
                  ?>

	
	<?
    $xx=floor(count($vip)/6);
    $cc='
       <div class="vm_element" >		
	 
	
	   </div>
       ';
    for($i=0;$i<(4-$xx);$i++){
        echo $cc; 
    }
    ?>
    							
	 
				
				
		</div>
	</div>
  
  
  
</div>
