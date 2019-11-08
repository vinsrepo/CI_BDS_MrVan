 <script src="/style/js/jquery.sticky.js"></script>
<script src="/style/js/jquery.prettyPhoto.js"></script>
<link href="/style/css/prettyPhoto.css" rel="stylesheet" />
<script>
    $(document).ready(function () { 
        $(".container-tabsitem img").prettyPhotos();  
    });
</script> <div class="breadcrumbs " style="margin-bottom: 10px;">
        <div class="center">
           <div class="list-content">
             <ul class="grid12-12">
                 <li><a href="/" title="<?php echo $this->lang->line('lable_home');?>"><span><?php echo $this->lang->line('lable_home');?></span></a> <span class="mpx-arr-thin-right"></span></li> 
                 <li><a href="/kinh-nghiem" title="<?php echo $this->lang->line('lable_KinhNghiem');?>"><span><? echo $this->lang->line('lable_KinhNghiem');?></span></a> <span class="mpx-arr-thin-right"></span></li> 
                 <li><a href=""><span class="last"><? echo $users['TieuDe'];?></span></a> <span class="mpx-arr-thin-right last"></span></li>
                              
                 </ul>
           </div>
                    </div>
    </div>
 <div class="center">
 <div class="list-content">  
       
             <div class="pagecontent"> 
<style>
    #boxProductSaved {
        display: none !important;
    }
</style>

<div style="width:1000px;height:19px"></div>
<div class="content-newsdetail">
    <div class="newsmain"> 
        
        <h1 class="oswaldlarge-title"><? echo $users['TieuDe'];?></h1>
        <div class="date-newsmain"><? echo date("H:i d-m-Y", strtotime($users['NgayGui']));?></div>
        
        <div class="content-newsmain">
            <? echo html_entity_decode($users['NoiDung']);?>
            <div class="social">
                <div class="share-fbgg">
                    <script type="text/javascript" src="/Scripts/addthis_widget.js#pubid=ra-54476c2b7dc08351" async=""></script>
                   
                </div>
            </div>
            
        </div>
        <script>
    $(document).ready(function () {      
        $(".titletabcomment li").tabextendcomment();
    });
</script>

<div class="extendcomment"> 
    <div class="container-comment"> 
        <div class="cmfacebook box">
            <fb:comments href="<?php

echo "http://" . $_SERVER['HTTP_HOST']  . $_SERVER['REQUEST_URI'];

?>" width="657"></fb:comments>
        </div>
    </div>
</div>
        


<div class="newssame">
    <h2>Các tin khác</h2>
    <div class="content-newssame">
        <ul>
        <?
$tinlienquan=Modules::run('baiviet/tinlienquan','KinhNghiem');
foreach($tinlienquan as $news){
?>
<li>
                    <a href="<? echo base_url();?>kinh-nghiem/<? echo $news['IDBaiViet'];?>/<? echo stripUnicode($news['TieuDe']);?>.html" title="<? echo $news['TieuDe'];?>"><? echo $news['TieuDe'];?> <i>(<? echo date('d/m/Y', strtotime($news['NgayGui']));?>)</i> </a>
                </li>
<?
}
?>
                 
        </ul>
    </div>
</div>
    </div>
</div>
        
    
    <div class="right-newslist">      

        
 
<? include APPPATH.'modules/dangtin/views/div_search.php';?>


<? include 'tinnhieunguoidoc.php';?>
        
 
<? include 'KinhNghiem.php';?>


<? include 'KinhNghiem.php';?>

        
<? include APPPATH.'modules/dangtin/views/xenoibat.php';?> 

        
<? include APPPATH.'modules/dangtin/views/div_tool.php';?>
        
    </div>
</div>   
                
    	</div>
        	</div>
    	</div>