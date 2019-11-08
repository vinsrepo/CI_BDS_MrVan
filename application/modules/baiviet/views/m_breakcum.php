<div class="news-cate tit">
            <h1 class="content-tit  longtit">
                <? if($cha_info['H1']!=''){echo $cha_info['H1'];} elseif(isset($cha_info)){echo $cha_info['TieuDe'];}elseif($current_info['H1']!=''){echo $current_info['H1'];}else{ echo $this->lang->line('lable_'.$Loai.'');}?></h1>
        </div>
        <div id="MainContent_news_search" class="news-search">
            <div class="news-search-left">
                <span class="spanOver spanDefault" id="spanOverNews">Tất cả các chuyên mục
                </span>
                <select id="slSub" onchange="selectSubChange(this.value)">
                    <?
    $active2='';
    if(isset($users)){
        $cha=Modules::run('trangchu/getInfo','baiviet','IDBaiViet',$users['MenuCha']); 
        $parent=Modules::run('trangchu/getInfo','baiviet','IDBaiViet',$cha['MenuCha']);
        
        $where=array('Loai'=>'MenuHeader','MenuCha'=>$cha['MenuCha']);
    }else{
        //$cha=Modules::run('trangchu/getInfo','baiviet','IDBaiViet',$users['MenuCha']); 
        if(isset($cha_info)&&$cha_info['MenuCha']!=0){
            $parent=Modules::run('trangchu/getInfo','baiviet','IDBaiViet',$cha_info['MenuCha']); 
            $where=array('Loai'=>'MenuHeader','MenuCha'=>$cha_info['MenuCha']);
        }else{
            //$parent=Modules::run('trangchu/getInfo','baiviet','Link',$u); 
            $parent=$cha_info;
            $where=array('Loai'=>'MenuHeader','MenuCha'=>$cha_info['IDBaiViet']);
            $active2='selected';
        }
    }
     echo '<option value="/'.stripUnicode($parent['TieuDe']).'" '.$active2.'>'.$parent['TieuDe'].'</option>';
     
                $datacats=Modules::run('trangchu/getList','baiviet',4000,0,'SapXep asc, NgayGui asc','IDBaiViet',$where);
                foreach($datacats as $submenu1){
                    $active=$submenu1['IDBaiViet']==$users['MenuCha']||$cha_info['IDBaiViet']==$submenu1['IDBaiViet']?'selected':'';
                    echo '<option value="/'.stripUnicode($submenu1['TieuDe']).'" '.$active.'>'.$submenu1['TieuDe'].'</option> ';
                }
                ?>
                </select>
            </div>
            
        </div>
        <div class="clear"></div> 

        <script src="/Scripts/Swiper/js/idangerous.swiper-2.1.min.js"></script>
            <script>
                var mySwiper = new Swiper('.swiper-container', {
                    loop: true,
                    grabCursor: true,
                    paginationClickable: true
                })
                $('.arrow-left').on('click', function (e) {
                    e.preventDefault()
                    mySwiper.swipePrev()
                })
                $('.arrow-right').on('click', function (e) {
                    e.preventDefault()
                    mySwiper.swipeNext()
                })
                      </script>
        <div class="clear"></div>