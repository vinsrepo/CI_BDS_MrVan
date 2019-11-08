        <!-- *.Main Title.* -->
        <section class="main-title">
            <div class="container">
                <h1> <?php echo $this->lang->line('lable_ThongBao');?> </h1>
            </div>
        </section>
        <!-- *.Main Title End.* -->
        
        <!-- *.Breadcrumb.* -->
        <section class="breadcrumb">
            <div class="container">
                <a href="<?php echo base_url();?>" title=""> <?php echo $this->lang->line('lable_home');?> </a>
                <span> <img style="border: 0px;" src="<?php echo base_url();?>style/images/dian.png" /> </span>
                <a href="<?php echo base_url();?>tin-tuc" title=""> <?php echo $this->lang->line('lable_news');?> </a>
                <span> <img style="border: 0px;" src="<?php echo base_url();?>style/images/dian.png" /> </span>
                <span class="current-crumb"> <?php echo $this->lang->line('lable_ThongBao');?> </span>
            </div>
        </section>
        <!-- *.Breadcrumb End.* -->
        
        <!-- *.Main.* -->
        <section id="main" style="background: white;">
            <!-- *.Main Container.* -->
            <div class="container">
            
                <!-- *.Content.* -->
                <div class="content">   
                  <?php 
                  if($thongbao){ 
                  foreach ($thongbao as $tintuc)
                  { 
                  $NoiDung=strip_tags($tintuc['NoiDung']);
                  $NoiDung=''.substr($NoiDung,0,700).'';
                  $NoiDung=substr($NoiDung, 0, strrpos($NoiDung, ' ')).'...';
                  echo '
                  <!-- Blog item -->
                    <article class="blog-item blog-full-view">
                        
                         
                        <!-- Date - Comment Wrapper -->
                        <div class="date-comment-wrapper" style="float: right;left: 0px;">
                            <div class="date">
                                <span class="arrow"> </span>
                                <span class="day"> '.date("d-m", strtotime($tintuc['NgayGui'])).' </span>
                                <span class="month"> '.date("Y", strtotime($tintuc['NgayGui'])).' </span>
                            </div>
                            <div class="comment">
                                <a href="'.base_url().'thong-bao/'.$tintuc['IDBaiViet'].'/'.stripUnicode($tintuc['TieuDe']).'.html#BinhLuan" title=""> 12 <br /> <span> '.$this->lang->line('lable_comment').' </span> </a>
                            </div>
                        </div><!-- Date - Comment Wrapper End -->
                        
                        <!-- Blog Content Wrapper -->
                        <div class="blog-content-wrapper" style="padding-left: 20%;width: 80%;">
                            <h2 class="blog-title"> <a href="'.base_url().'thong-bao/'.$tintuc['IDBaiViet'].'/'.stripUnicode($tintuc['TieuDe']).'.html" title=""> '.$tintuc['TieuDe'].' </a> </h2>
                            <div class="blog-content">
                                <p> '.$NoiDung.'   </p>
                                <a href="'.base_url().'thong-bao/'.$tintuc['IDBaiViet'].'/'.stripUnicode($tintuc['TieuDe']).'.html" title="" class="read-more"> '.$this->lang->line('lable_more').' </a>
                            </div>
                        </div><!-- Blog Content Wrapper -->
                        
                    </article><!-- Blog item End -->  
                    <div class="hr"> </div>
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
                              
                
                </div><!-- *.Content End.* -->
                
                <!-- *.Sidebar.* -->
                <div class="sidebar right-sidebar">
                    <aside class="widget widget_categories">
                        <h2 class="widgettitle"> Categories <span> </span> </h2>
                        <ul>      
                            <li> <a href="" title=""> Lorem ipsum dolor sit amet </a> </li>
                            <li> <a href="" title="">  Vivamus a ligula metus in vulputate  </a> </li>
                            <li> <a href="" title=""> Praesent volutpat elit  </a> </li>
                            <li> <a href="" title=""> Etiam ac eros tellus, ac semper </a> </li>
                            <li> <a href="" title=""> Duis scelerisque mauris id nisl  </a> </li>
                            <li> <a href="" title=""> Aenean commodo mi sed urna </a> </li>
                        </ul>                	
                    </aside> 
                    
                    <aside class="widget widget_recent_entries">
                        <h2 class="widgettitle"> Recent Posts <span> </span> </h2>
                        <ul>      
                            <li>
                                <div class="thumb"> <a href="" title=""> <img src="images/post-images/recent-posts1.jpg" alt="" title="" /> </a> </div>
                                <p> Nunc diam tellus, vestibum ut gravida in... </p>
                                <span class="date"> Dec 10, 2012 </span>
                            </li>
                            <li>
                                <div class="thumb"> <a href="" title=""> <img src="images/post-images/recent-posts2.jpg" alt="" title="" /> </a> </div>
                                <p> Nunc diam tellus, vestibum ut gravida in... </p>
                                <span class="date"> Dec 10, 2012 </span>
                            </li>
                            <li>
                                <div class="thumb"> <a href="" title=""> <img src="images/post-images/recent-posts3.jpg" alt="" title="" /> </a> </div>
                                <p> Nunc diam tellus, vestibum ut gravida in... </p>
                                <span class="date"> Dec 10, 2012 </span>
                            </li>
                        </ul>                	
                    </aside> 
                    
                    <aside class="widget widget-tag-cloud">
                        <h2 class="widgettitle"> Tag cloud <span> </span> </h2>
                        <div class="clouds">
                            <a href="" title=""> Design </a>
                            <a href="" title=""> Responsive </a>
                            <a href="" title=""> Portfolio </a>
                            <a href="" title=""> Wordpress </a>
                            <a href="" title=""> Simple </a>
                            <a href="" title=""> Clean </a>
                            <a href="" title=""> Modern </a>
                            <a href="" title=""> Style </a>
                        </div>
                    </aside>  
                    
                    <aside class="widget widget_text">
                        <h2 class="widgettitle"> Text Widget <span> </span> </h2>
                        <div class="textwidget">
                            <p> Vestibulum id feugiat enim. Suspendisse odio enim, convallis ut fermentum et, dignissim eget libero. Maecenas dignissim adipiscing adipiscing. Aliquam diam ante, mollis vel cursus. </p>
                        </div>
                    </aside>                 
                    
                    <aside class="widget widget_archive">
                        <h2 class="widgettitle"> Archives <span> </span> </h2>
                        <ul>
                            <li> <a href="" title=""> December 2012 </a> </li>
                            <li> <a href="" title=""> November 2012 </a> </li>
                            <li> <a href="" title=""> October 2012 </a> </li>
                            <li> <a href="" title=""> September 2012 </a> </li>
                        </ul>
                    </aside>  
                     
                </div><!-- *.Sidebar End.* -->
                
            
            </div><!-- *.Main Container End.* -->
            
        </section><!-- *.Main End.* -->
                    
