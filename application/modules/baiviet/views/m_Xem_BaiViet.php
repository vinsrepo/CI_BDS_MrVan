 <div class="news">
        <?
        include 'm_breakcum.php';?>
        <div class="news-detail">
            <h1><? echo $users['TieuDe'];?></h1>
            <div class="news-date">
                <span><? echo date("d/m/Y", strtotime($users['NgayGui']));?> <small><? echo date("H:i", strtotime($users['NgayGui']));?></small></span>
                <div class="clear"></div>
            </div>
            
            <h2><? echo html_entity_decode($users['Description']);?></h2>
            <div class="news-content">
                <? echo html_entity_decode($users['NoiDung']);?>
            </div> 
            <div class="clear"></div>
            <div class="news-date">
                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-526b16ce15374888"></script>
                <div class="addthis_native_toolbox"></div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
        <div id="MainContent_ArticleCate" class="otherNews">
            <h3>Tin cùng chuyên mục</h3>
            <ul>
                <?
    $stt=0;
$tintucs=Modules::run('trangchu/getList','baiviet',6,0,'IDBaiViet desc','IDBaiViet',array('MenuCha'=>$users['MenuCha']));
foreach($tintucs as $news){$stt++;
    $link='/'.$this->uri->segment(1).'/'.stripUnicode($news['TieuDe']).'-'.$news['IDBaiViet'].'.html'; 
?>
                        <li><span class="bullet">■</span><a href='<? echo $link;?>' title='<? echo $news['TieuDe'];?>'><? echo $news['TieuDe'];?></a> <span>(<? echo date("d/m/Y", strtotime($news['NgayGui']));?>)</span></li>
                        <?
}
?>
                     
            </ul>
        </div>
    </div>
