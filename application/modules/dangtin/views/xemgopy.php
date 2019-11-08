<div class="main"> <!-- *** mainpage layout *** -->
	<div class="main-wrap">
	 	<div class="page clear">
        <div class="content-box">
				<div class="box-header clear">
					<h2>Xem  thông báo lỗi</h2>
				</div>
				<div class="box-body clear">
					<form method="post" action="#">
				<table>
        
        <tr>
        <td class="title">Loại thông báo</td>
          <td>
          <?php echo $info['reportOption']; ?>
          </td>
        </tr>
        <tr>
        <td class="title">Nội dung</td>
          <td>
          <?php echo $info['content']; ?>
          </td>
        </tr>
        <tr>
        <td class="title">Link</td>
          <td>
         <?php echo $info['link']; ?>
          </td>
        </tr>
        <tr>
        <td class="title">Họ và tên</td>
          <td>
          <?php echo $info['HoVaTen']; ?>
          </td>
        </tr>
        <tr>
        <td class="title">Số điện thoại</td>
          <td>
          <?php echo $info['SDT']; ?>
          </td>
        </tr>
        <tr>
        <td class="title">Địa chỉ email</td>
          <td>
          <?php echo $info['Email']; ?>
          </td>
        </tr>
        <tr>
        <td class="title"><?php echo $this->lang->line('lable_date_creat');?></td>
          <td>
          <?php echo date("H:i d-m-Y", strtotime($info['NgayGui'])); ?>
          </td>
        </tr>
        
        <tr>
        <td class="title"> </td>
          <td>
          <input value="Trả lời" id="" class="submit" type="button" onclick="window.location='/email/guiemail/replymail/?addmail=<?php echo $info['Email']; ?>'"/>
          </td>
        </tr> 
        </table>
					 
					</form>
					
				</div> <!-- end of box-body -->
			</div></div><!-- end of page -->
		
		</div>
	</div>