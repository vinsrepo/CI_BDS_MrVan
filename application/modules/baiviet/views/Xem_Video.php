 <div class="breadcrumbs " style="margin-bottom: 10px;">
        <div class="center">
           <div class="list-content">
             <ul class="grid12-12">
                 <li><a href="/" title="<?php echo $this->lang->line('lable_home');?>"><span><?php echo $this->lang->line('lable_home');?></span></a> <span class="mpx-arr-thin-right"></span></li> 
                 <li><a href="/video-o-to" title="<?php echo $this->lang->line('lable_Video');?>"><span><? echo $this->lang->line('lable_Video');?></span></a> <span class="mpx-arr-thin-right"></span></li> 
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
<div class="videopage">
    <div class="mainvideo">
        <div class="videoleft">  
                <h1 class="title oswaldlarge-title" style="margin: 0px;padding: 0px;"><? echo $users['TieuDe'];?></h1>
                <div class="shortdescription"><? echo html_entity_decode($users['NoiDung']);?></div>
                <div class="social">
                    <div class="share-fbgg">
                        <script type="text/javascript" src="/Scripts/addthis_widget.js#pubid=ra-54476c2b7dc08351" async=""></script>
                    </div>
                </div>
                <div class="comment" tabindex="5000" style="overflow-y: hidden; outline: none;">
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
                </div>             

                <div class="relatevideo">
                    <div class="tit oswaldlarge-title">Video khác</div>
                     <?
$thongbao=Modules::run('baiviet/tinlienquan','Video');
$size='width="160" height="90"';
$grid=4;
?>
<?
include 'video_grid.php';
?>
                    <div class="viewmore">
                        <span>
                            <a href="/video-o-to">&gt;&gt; Xem thêm các video khác</a>
                        </span>
                    </div>
                </div>
        </div>

        <div class="videoright">
<? 
$arr_tops=array(0,1,2,3,4);
$thongbao2=Modules::run('trangchu/getList','baiviet',5,0,'NgayGui desc','IDBaiViet',array('Loai'=>'Video'));
include 'video_right.php';?>
        </div>
    </div>

</div>