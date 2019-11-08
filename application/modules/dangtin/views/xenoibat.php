            
<div class="product-relate" id="productrelate">
    <div class="pr-title">
        <h3>Tin rao liên quan</h3>
    </div>
    <div class="pr-content">
        <div class="bs-tab">
            <div class="tab-sell bs-tab-active" id="product-relate-sale" onclick="ProductRelateSale();">BĐS bán</div>
            <div class="tab-sell " id="product-relate-rent" onclick="ProductRelateRent();">BĐS cho thuê</div>
        </div>
        <input type="hidden" name="ctl00$ContentPlaceHolder1$ProductRelated1$hddNoSale" id="hddNoSale" value="0" />
        <input type="hidden" name="ctl00$ContentPlaceHolder1$ProductRelated1$hddNoRent" id="hddNoRent" value="0" />
        <div class="productrelate-content" id="ProductRelatedSale">
            <ul>
                <?
            $MenuChaID=449;
         $childs=Modules::run('trangchu/getList','baiviet',4,0,'IDBaiViet asc','IDBaiViet',array('MenuCha'=>$MenuChaID));
         $dieukien=array('TrangThai'=>1);
         include  APPPATH.'modules/dangtin/controllers/HangXe.php'; 
         if($xemtinban['DoiXe']!=''){
            $dieukien['DoiXe']=$xemtinban['DoiXe'];  
            $dulieu=Modules::run('trangchu/getList','tinban',4,0,'NgayDang desc','IDMaTin',$dieukien);
            if(!$dulieu){
                unset($dieukien['DoiXe']); 
            }
         }
         if($distID!=''){ 
            $dieukien['NamSX']=$distID; 
            $dulieu=Modules::run('trangchu/getList','tinban',4,0,'NgayDang desc','IDMaTin',$dieukien);
            if(!$dulieu){ 
                unset($dieukien['NamSX']); 
            }
         }  
         if($projectID!=''&&$projectID!='-1'){
            $dieukien['TinhTrang']=$projectName.'|'.$projectID;
            $dulieu=Modules::run('trangchu/getList','tinban',4,0,'NgayDang desc','IDMaTin',$dieukien);
            if(!$dulieu){
                unset($dieukien['TinhTrang']);
            }
         }
$dulieu=Modules::run('trangchu/getList','tinban',4,0,'NgayDang desc','IDMaTin',$dieukien);
include 'item_right.php';
?>
                        
                <li id="ContentPlaceHolder1_ProductRelated1_moreProductSale">
                    <div class="pc-extra"> 
                        <a title="Xem tất cả" href="/nha-dat-ban"><img src='/style/images/xemtatca.png' /></a>
                    </div>
                </li>
            </ul>
        </div>

        <div class="productrelate-content" id="ProductRelatedRent" style="display: none;">
            <ul>
                 <?
            $MenuChaID=451; 
         $childs=Modules::run('trangchu/getList','baiviet',4,0,'IDBaiViet asc','IDBaiViet',array('MenuCha'=>$MenuChaID));
         $dieukien=array('TrangThai'=>1);
         include  APPPATH.'modules/dangtin/controllers/HangXe.php';   
         if($xemtinban['DoiXe']!=''){
            $dieukien['DoiXe']=$xemtinban['DoiXe'];  
            $dulieu=Modules::run('trangchu/getList','tinban',4,0,'NgayDang desc','IDMaTin',$dieukien);
            if(!$dulieu){
                unset($dieukien['DoiXe']); 
            }
         }
         if($distID!=''){ 
            $dieukien['NamSX']=$distID; 
            $dulieu=Modules::run('trangchu/getList','tinban',4,0,'NgayDang desc','IDMaTin',$dieukien);
            if(!$dulieu){ 
                unset($dieukien['NamSX']); 
            }
         }  
         
         if($projectID!=''&&$projectID!='-1'){
            $dieukien['TinhTrang']=$projectName.'|'.$projectID;
            $dulieu=Modules::run('trangchu/getList','tinban',4,0,'NgayDang desc','IDMaTin',$dieukien);
            if(!$dulieu){
                unset($dieukien['TinhTrang']); 
            }
         } 
$dulieu=Modules::run('trangchu/getList','tinban',4,0,'NgayDang desc','IDMaTin',$dieukien); 
include 'item_right.php';
?>
                    
                <li id="ContentPlaceHolder1_ProductRelated1_moreProductRent">
                    <div class="pc-extra"> 
                        <a title="Xem tất cả" href="/nha-dat-cho-thue"><img src='/style/images/xemtatca.png' /></a>
                    </div>
                </li>
            </ul>

        </div>

    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        var hddNoSale = $("#hddNoSale").val();
        var hddNoRent = $("#hddNoRent").val();
        if (hddNoRent == 1 && hddNoSale == 1) {
            $("#productrelate").hide();
        } else {
            if (hddNoSale == 1) {
                $("#product-relate-sale").hide();
                $("#ProductRelatedSale").hide();
                $("#ProductRelatedRent").show();
                $("div#product-relate-rent").toggleClass("bs-tab-active");
            }
            if (hddNoRent == 1) {
                $("#product-relate-rent").hide();
                $("#ProductRelatedRent").hide();
            }
        }
    });
</script>