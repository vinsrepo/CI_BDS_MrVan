<?php
            if($member['Link']!=""){
                $Link=$member['Link'];
            }else{
                
                 if($Loai=="ThongBao"){
                  $catory='thong-bao';
                 }elseif($Loai=="MenuHeader"){
                  $catory='kenh';
                 }elseif($Loai=="MenuFooter"){
                  $catory='bai-viet';
                 }elseif($Loai=="DanhMuc"){
                  $catory='danh-muc';
                 }elseif($Loai=="HuongDan"){
                  $catory='huong-dan';
                 }elseif($Loai=="TinTuc"){
                  $catory='tin-tuc';
                 }elseif($Loai=="MenuHuongDan"){
                  $catory='huong-dan';
                 }
                 
                $Link=base_url().$catory.'/'.$member['IDBaiViet'].'/'.stripUnicode($member['TieuDe']).'.html';
            }
                 