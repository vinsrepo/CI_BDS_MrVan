<?php 
if($thongbao){ 
foreach ($thongbao as $tintuc)
{ 
        echo '<tr>
                  <td><a href="'.base_url().'thong-bao/'.$tintuc['IDBaiViet'].'/'.stripUnicode($tintuc['TieuDe']).'.html">'.$tintuc['TieuDe'].'</a></td>
                  <td>'.date("d-m-Y", strtotime($tintuc['NgayGui'])).'</td>
                  </tr>';
        }
        }else{
            echo '<tr><td></td><td></td><td style="color: red;font-weight: bold;">'.$this->lang->line('lable_no_rows').'</td><td></td><td></td><td></td><td></td><td></td></tr>';
}
?> 