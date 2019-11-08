<div class="saloninfo shadowbox2" style="padding-bottom: 0px;margin-bottom: 0px;padding-left: 15px;">
     
        <div class="inforsalon">            
            <div class="titsalon" style="width: 99%;padding-bottom: 5px;margin-bottom: 10px;padding-top: 10px;">
                            <?// if($this->uri->segment(1)=='gioi-thieu'){ echo 'Giới thiệu về';}else{echo 'Tổng quan về';}?>  <h1><? echo $salon_info['TenSalon'];?></h1>
                        </div>
            <? if($this->uri->segment(1)=='gioi-thieu'){?>
            <div class="shortdescription" style="margin-top: 10px;margin-bottom: 10px;"><? echo nl2br($salon_info['GioiThieu']);?></div>
            <?}?>
             <div class="shortdescription" style="width: 100%;line-height: 18px;">
				<div class="salonaddress"><b style="color: black;"><?php echo $this->lang->line('lable_add');?></b>: <? echo $salon_info['DiaChi'];?></div>
                <div class="salonmobile"><b style="color: black;"><?php echo $this->lang->line('lable_mobile');?></b>: <? echo $salon_info['DienThoai'];?> </div>
                <div class="salonemail"><b style="color: black;"><?php echo $this->lang->line('lable_email');?></b>: <? echo $salon_info['Email'];?><br /></div>
                <div class="salonaddress"><b style="color: black;">Website</b>: <a href="http://<? echo $_SERVER['HTTP_HOST'];?>"> <? echo $_SERVER['HTTP_HOST'];?></a> </div>
             </div> 
             <? if($this->uri->segment(1)!='gioi-thieu'){?>
            <div class="shortdescription" style="margin-top: 10px;margin-bottom: 10px;"><? 
               $NoiDung=strip_tags($salon_info['GioiThieu']);
                  $NoiDung=''.substr($NoiDung,0,1000).'';
                  $NoiDung=substr($NoiDung, 0, strrpos($NoiDung, ' ')).'...';
               echo $NoiDung;?><a href="/gioi-thieu"> Xem thêm</a></div>
             <?}?>
             
            <div class="salonsocial">
                <script type="text/javascript" src="/Scripts/addthis_widget.js#pubid=ra-54476c2b7dc08351" async=""></script>
                <div class="addthis_native_toolbox" data-url="http://banxehoi.com/salons/chevrolet-giai-phong-24371-233/contact" data-title="Liên hệ Chevrolet Giải Phóng"><div id="atstbx" class="at-share-tbx-element addthis_default_style addthis_20x20_style addthis-smartlayers addthis-animated at4-show"><a class="addthis_button_facebook_like at300b" fb:like:layout="button_count"><div class="fb-like fb_iframe_widget" data-ref=".VfZ3EO_aWJA.like" data-layout="button_count" data-show_faces="false" data-action="like" data-width="90" data-font="arial" data-href="http://banxehoi.com/salons/chevrolet-giai-phong-24371-233/contact" data-send="false" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=172525162793917&amp;container_width=0&amp;font=arial&amp;href=http%3A%2F%2Fbanxehoi.com%2Fsalons%2Fchevrolet-giai-phong-24371-233%2Fcontact&amp;layout=button_count&amp;locale=vi_VN&amp;ref=.VfZ3EO_aWJA.like&amp;sdk=joey&amp;send=false&amp;show_faces=false&amp;width=90"><span style="vertical-align: bottom; width: 84px; height: 20px;"><iframe name="f139dfd93" width="90px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:like Facebook Social Plugin" src="http://www.facebook.com/plugins/like.php?action=like&amp;app_id=172525162793917&amp;channel=http%3A%2F%2Fstatic.ak.facebook.com%2Fconnect%2Fxd_arbiter%2F44OwK74u0Ie.js%3Fversion%3D41%23cb%3Df1f056cff%26domain%3Dbanxehoi.com%26origin%3Dhttp%253A%252F%252Fbanxehoi.com%252Ff37fc5d4d8%26relation%3Dparent.parent&amp;container_width=0&amp;font=arial&amp;href=http%3A%2F%2Fbanxehoi.com%2Fsalons%2Fchevrolet-giai-phong-24371-233%2Fcontact&amp;layout=button_count&amp;locale=vi_VN&amp;ref=.VfZ3EO_aWJA.like&amp;sdk=joey&amp;send=false&amp;show_faces=false&amp;width=90" style="border: none; visibility: visible; width: 84px; height: 20px;" class=""></iframe></span></div></a><a class="addthis_button_google_plusone at300b" g:plusone:size="medium"><div id="___plusone_1" style="text-indent: 0px; margin: 0px; padding: 0px; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 90px; height: 20px; background: transparent;"><iframe frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 90px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 20px;" tabindex="0" vspace="0" width="100%" id="I0_1442215701234" name="I0_1442215701234" src="https://apis.google.com/se/0/_/+1/fastbutton?usegapi=1&amp;size=medium&amp;hl=en-US&amp;origin=http%3A%2F%2Fbanxehoi.com&amp;url=http%3A%2F%2Fbanxehoi.com%2Fsalons%2Fchevrolet-giai-phong-24371-233%2Fcontact&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.vi.pV6657RFy6w.O%2Fm%3D__features__%2Fam%3DAQ%2Frt%3Dj%2Fd%3D1%2Ft%3Dzcms%2Frs%3DAGLTcCMY4pqTM6vNE85x1_hsSzzVViVYrQ#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh&amp;id=I0_1442215701234&amp;parent=http%3A%2F%2Fbanxehoi.com&amp;pfname=&amp;rpctoken=41560732" data-gapiattached="true" title="+1"></iframe></div></a><a class="addthis_counter addthis_pill_style" href="#" style="display: inline-block;"><a class="atc_s addthis_button_compact"><span></span></a><a class="addthis_button_expanded" target="_blank" title="Thêm..." href="#"></a></a><div class="atclear"></div></div></div>
            </div>
        </div>
        <div class="contactsalon">
            <h2 class="supportol">Một số hình ảnh <? echo $salon_info['TenSalon'];?> </h2>
            <div>
                <div class="slidesalon">
                        <div class="images">
                                <div class="imageslide">
                                    <link rel="stylesheet" href="/style/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
                                    <script src="/style/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
                                    <div class="gallery clearfix" id="osgslide">
                                    <?php
                                    $slide=explode('|',$salon_info['AlbumAnh']);
                            $stt=-1;
                            foreach($slide as $img){
                                if($img!=''&&$img!='undefined'){ 
                                    $stt++; 
                                echo '
                            <a id="osgslide-display-none-index-'.$stt.'" style="display:none" href="'.show_img($img).'" rel="prettyPhoto[gallery1]">
                                                <img src="'.show_img($img,$thumb='400x250').'" alt="'.$salon_info['TenSalon'].'" title="'.$salon_info['TenSalon'].'" />
                                            </a>
                                            <img class="osgslideimg" src="'.show_img($img,$thumb='150x150').'" rel="osgslide-display-none-index-'.$stt.'" alt="'.$salon_info['TenSalon'].'" title="'.$salon_info['TenSalon'].'" />
                            '; 
                            }
                            }
                            ?>
                                             
                                        <input type="hidden" id="maxtab" value="7" />
                                    </div>
                                </div>

                        </div>

                    </div> 
                    <script>
    $(document).ready(function () {
        $('#osgslide').osgslide('150x150', '400x250', 139);
        $('.sellcar-item .line').last().remove();
    });
</script>

            </div>
                    </div>
    </div>