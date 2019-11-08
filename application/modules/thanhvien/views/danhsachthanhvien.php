        <!-- *.Main Title.* -->
        <section class="main-title">
            <div class="container">
                <h1> <?php echo $this->lang->line('lable_memberlist');?> </h1>
            </div>
        </section>
        <!-- *.Main Title End.* -->
        
        <!-- *.Breadcrumb.* -->
        <section class="breadcrumb">
            <div class="container">
                <a href="<?php echo base_url();?>" title=""> <?php echo $this->lang->line('lable_home');?> </a>
                <span> <img style="border: 0px;" src="<?php echo base_url();?>style/images/dian.png" /> </span>
                <span class="current-crumb"> Thành viên </span>
            </div>
        </section>
        <!-- *.Breadcrumb End.* -->
        
        <!-- *.Main.* -->
        <section id="main" style="background: white;">
            <!-- *.Main Container.* -->
            <div class="container">
            
                   <?php 
                  if($data_user){ 
                  $stt=0;
                  foreach ($data_user as $user_data)
                  { 
                  $stt=$stt+1;
                  if($stt%3==0) 
                  {
                    $claser='last';
                  } 
                  else{
                    $claser='';
                  }
                  if($user_data["Avatar"]==''){
                    $user_data["Avatar"]='style/images/no_avatar_nam.jpg';
                  }
                  echo '
                  <div class="column one-third '.$claser.'">
                        <div class="team">
                            <a href="'.base_url().'thanh-vien/'.$user_data['userid'].'/'.$user_data['username'].'.html'.'">
                            <div class="image">
                                <img src="'.base_url().$user_data["Avatar"].'" alt="" title="">
                            </div>
                            <h5><span> '.$user_data["username"].' </span> </h5></a>
                            <p> '.$this->lang->line('lable_GioiTinh').': <b>'.$user_data['GioiTinh'].'</b>. </p>
                            <p> '.$this->lang->line('lable_TinhThanh').': <b>'.$user_data['TinhThanh'].'</b> </p>
                        </div>
                    </div>
                  ';
                  }
                  }
                  else
                  {
                  echo '<div class="column one-half"><div class="warning-box">'.$this->lang->line('lable_no_rows').'</div></div>';
                  }
                  ?> 
                    
                    <!-- Pagination -->
                    <?php echo $this->pagination->create_links();?>
                    <!-- Pagination End -->
            </div><!-- *.Main Container End.* -->
            
        </section><!-- *.Main End.* -->
                    
