<? echo Modules::run("trangchu/header",$title,$description,'xxx');?>
 
<!-- *.Content.* -->
                <div class="wr_page">
            
    <div id="ContentPlaceHolder1_pnNewsContent">
	
<div class="index-page">
        <div class="content">
            <div class="login" style="margin-top: 30px; width: 884px;line-height:24px;">
                <div class="login-title" style="width:850px"><?php echo $site['TieuDe'];?></div>
                <div class="login-content" style="padding: 20px;width:842px; color: #7a7a7a;text-align: justify;">
                  <h3> <span style="font-size: 15pt;color: red;"><?php echo $site['GiaTri'];?></span>  </h3>
                </div>

            </div>
        </div>
    </div>
</div>

            <div class="clear"></div>
        </div>
                <? echo Modules::run("trangchu/footer");?>