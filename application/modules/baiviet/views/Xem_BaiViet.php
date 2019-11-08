        <div class="wr_page">
            
    <div class="index-page">

        <div class="content">
            
            <!-- Content Left -->
            <div class="content-left">
                <!-- News Break Cum -->
                
<? include 'breakcum.php';?>

                
<div class="news-detail">
    <h1>
        <? echo $users['TieuDe'];?>
    </h1>
    <div class="nd-time">
        <? echo date("d/m/Y", strtotime($users['NgayGui']));?> <small><? echo date("H:i", strtotime($users['NgayGui']));?></small>
    </div>
    <![if !IE]>  
    <div class="nd-share">
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-526b16ce15374888"></script>
        <div class="addthis_native_toolbox"></div>
        <div class="clear"></div>
    </div>
    <![endif]> 
    <!-- Cùng chủ đề -->
    
    

    <div class="clear"></div> 
    <h2><? echo html_entity_decode($users['Description']);?></h2>
    <div class="nd-content">
        <? echo html_entity_decode($users['NoiDung']);?>
    </div> 
</div>

        <div class="news-new">
            <div class="nn-title">
                <h3>Các tin khác</h3>
            </div>
            <div class="nn-content">
    <?
    $stt=0;
$tinlienquan=Modules::run('baiviet/tinlienquan');
foreach($tinlienquan as $news){$stt++;
    $link='/'.$this->uri->segment(1).'/'.stripUnicode($news['TieuDe']).'-'.$news['IDBaiViet'].'.html';
    $right_s=$stt%2==0?'nn-unit-r':'';
?>
<div class="nn-unit <? echo $right_s;?>">
            <div class="nn-unit-img">
                <a href="<? echo $link;?>" title='<? echo $news['TieuDe'];?>'>
                    <img src="<? echo img_thumb_blog($news['NoiDung'],'120x120');?>" title='<? echo $news['TieuDe'];?>' />
                </a>
            </div>
            <div class="nn-title-a">
                <a href="<? echo $link;?>" title='<? echo $news['TieuDe'];?>'><? echo $news['TieuDe'];?></a>
            </div>
        </div>
<?
}
?>
        
     
    
        </div>
                </div> 
    
<!-- Comment -->

<div class="comment">
    <div class="comment-title">
        <h3>bình luận</h3>
    </div>
    <div class="cm-tab">
        <div class="cm-fb cm-fb-active" id="CmtFaceBook" onclick="CmtFacebook();">Facebook</div>
        <div class="cm-gp " id="CmtGooglePlus" onclick="CmtGoogle();">Google +</div>
    </div>
    <div class="cm-content ">
        <!-- Facebook -->
        <div class="cm-content-fb">
            <div id="fb-root"></div>
            
            <div class="fb-comments" data-href="<?php echo "http://" . $_SERVER['HTTP_HOST']  . $_SERVER['REQUEST_URI']; ?>" data-width="660" data-numposts="2" data-colorscheme="light"></div>

        </div>
        <!-- Google Plus -->
        <div class="cm-content-gp positionfixed">
            <script src="https://apis.google.com/js/plusone.js">
            </script>
            <div class="g-comments"
                data-href="<?php echo "http://" . $_SERVER['HTTP_HOST']  . $_SERVER['REQUEST_URI']; ?>"
                data-width="660"
                data-first_party_property="BLOGGER"
                data-view_type="FILTERED_POSTMOD">
            </div>
        </div>
    </div>
</div>


                <div class="clear"></div>
            </div>
            <!-- Content Right -->
            <div class="content-right">
                <!-- Box search list -->
                
<? include  APPPATH.'modules/dangtin/views/div_search.php';?> 
                <!-- News hight light -->
   <? include 'tinnhieunguoidoc.php';?>
                <!-- Hot toppic -->
                
<? include  APPPATH.'modules/dangtin/views/xenoibat.php';?> 
                <!-- Feng shui --> 
                <!-- Utility -->
                
<? include  APPPATH.'modules/dangtin/views/div_tool.php';?>

                
<? include  APPPATH.'modules/dangtin/views/tukhoanoibat.php';?> 

                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <script type="text/javascript">
        if ($('.utility').offset().top - $('.comment').offset().top > -700) {
            $('.utility').hide();
        }
    </script>

            <div class="clear"></div>
        </div>