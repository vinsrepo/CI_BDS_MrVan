<div class="breadcrumbs " style="margin-bottom: 10px;">
        <div class="center">
           <div class="list-content">
             <ul class="grid12-12">
                 <li><a href="/" title="<?php echo $this->lang->line('lable_home');?>"><span><?php echo $this->lang->line('lable_home');?></span></a> <span class="mpx-arr-thin-right"></span></li> 
                 <li><a href=""><span class="last">Báo giá</span></a> <span class="mpx-arr-thin-right last"></span></li>
                              
                 </ul>
           </div>
                    </div>
    </div>
<div class="center">
     
    <div style="width:1000px;height:19px"></div>
    <div class="list-content">
    <?  
           $tt=Modules::run('trangchu/getInfo','cauhinh','Loai','BaoGia');
           $tt=json_decode($tt['GiaTri'],true);
           ?>
             
       
     <div class="baogianologin">
    <div class="baogialeft">       
        <div class="typebaogia">
            <div class="tit">Báo giá</div>
           <ul class="menuleft">
               <li class="active" id="bgtinrao">Báo giá tin rao</li>
               <li id="bgbanner" class="">Báo giá banner</li>
               <li id="bgpr" class="">Báo giá bài PR</li>
           </ul>
        </div>
    </div>
    <div class="baogiaright">
        <div class="content-baogia">
            <div class="bgtinrao box box-block">
             <div class="tab-bg">
                    <ul class="tabitem">
                        <li id="tinle" class="active">Báo giá tin lẻ</li>
                        <li id="goitin" class="">Báo giá gói tin</li>
                    </ul>
                </div>
                <div class="container">
                             <? echo $tt['TinRao'];?>
                </div>                             
            </div>
            <div class="bgbanner box box-none">
                <div class="tab-bg">
                    <ul class="tabitem">
                        <li id="tinle" class="">Báo giá banner</li>
                        <li id="goitin" class="">Vị trí banner trên website</li>
                    </ul>
                </div>
                <div class="container">
                     <? echo $tt['Banner'];?>
                </div>         
            </div>
            <div class="bgpr box box-none">
                <div class="titlebox">Báo giá bài pr</div>
                <div class="container">               
                         <? echo $tt['PR'];?>                 
                </div>    
            </div>
        </div>
    </div>
</div> 
        </div>
    </div>
    <style>
    .box-none{
        display: none;
    }
    .box-block{
        display: block;
            
    }  
    </style>
    <script>
    $(".typebaogia .rowitems input[type='radio']").click(function () {
        var id = $(this).attr("id");
        $(".content-baogia").find("img").attr("src", "/images/" + id + ".png");
    });
    $(document).ready(function () {
    $('#bgtinrao').click();
    });
    $(".typebaogia .menuleft>li").click(function () {
        var id = $(this).attr("id");
        $(this).parent().find(".active").removeClass('active');
        $(this).addClass("active");
        $(".content-baogia .box").hide();
        $(".content-baogia ." + id).show();
        $(".content-baogia ." + id + " .tabitem li").first().trigger("click");
    });

    $(".tabitem>li").click(function (e) {
        $(".tabitem .active").removeClass("active");
        $(this).addClass("active");
        $(".container .boxchild").hide();
        $(".container ." + e.target.id).show();
    });
</script>
