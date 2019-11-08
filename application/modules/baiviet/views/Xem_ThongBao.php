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
                <a href="<?php echo base_url();?>" title=""> Trang chủ </a>
                <span> <img style="border: 0px;" src="<?php echo base_url();?>style/images/dian.png" /> </span>
                <a href="<?php echo base_url();?>tin-tuc" title=""> Tin tức </a>
                <span> <img style="border: 0px;" src="<?php echo base_url();?>style/images/dian.png" /> </span>
                <span class="current-crumb"><a href="<?php echo base_url();?>tin-tuc/thong-bao"> <?php echo $this->lang->line('lable_ThongBao');?></a> </span>
            </div>
        </section>
        <!-- *.Breadcrumb End.* -->
        
        <!-- *.Main.* -->
        <section id="main" style="background: white;">
            <!-- *.Main Container.* -->
            <div class="container">
            
                <!-- *.Content.* -->
                <div class="content">   
                   
                <!-- Blog item -->
                    <article class="blog-item blog-full-view">
                        
                        
                        
                        <!-- Blog Content Wrapper -->
                        <div class="blog-content-wrapper">
                            <h2 class="blog-title"> <a href="#" title=""> <? echo $users['TieuDe'];?> </a> </h2>
                            <p class="blog-categories"> <?php echo $this->lang->line('creat_date');?>: <a href="#" title=""> <?php echo date("d-m-Y", strtotime($users['NgayGui']));?> </a> </p>
                            <div class="blog-content">
                                <? echo html_entity_decode($users['NoiDung']);?>
                            </div>
                            
                            <div class="blog-social-share"> 
                                <span> </span>
                                <img src="<?php echo base_url();?>style/images/post-images/blog-social-share.png" alt="" title="" />
                            </div>
                            
                        </div><!-- Blog Content Wrapper -->
                        
                        
                    </article><!-- Blog item End -->  
                    
                    <div class="hr"> </div>
                    
                    
                    <?php echo Modules::run("binhluan/vietbinhluan",$users['Loai'],$users['IDBaiViet']);?>            
                <br /><br />
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
    <script languate="javascript" type="text/javascript">
    url=window.location.href;
    var hash = url.substring(url.indexOf("#") + 1);
    $("html, body").animate({ scrollTop: $('#'+hash).offset().top }, 1000);
    </script>
 