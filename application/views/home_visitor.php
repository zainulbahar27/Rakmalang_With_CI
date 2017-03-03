








   <!-- Header Carousel -->
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            
            
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" style="
                max-height: 500px;
          ">
            <div class="item active">
                <div class="fill">
                    <img style="width:130%;" src="<?php echo base_url();?>assets/foto/iklan2.png">
                </div>
                <div class="carousel-caption">
                   
                </div>
            </div>
            <div class="item">
                <div class="fill">
                    <img style="width:130%;" src="<?php echo base_url();?>assets/foto/iklan3.png">
                </div>

                <div class="carousel-caption">
                    
                </div>
            </div>
            <div class="item">
                <div class="fill" >
                    <img style="width:130%;" src="<?php echo base_url();?>assets/foto/iklan4.png">
                </div>
                <div class="carousel-caption">
                   
                </div>
            </div>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>
    <!-- Portfolio Grid Section -->
    <section id="portfolio" style="
    box-shadow: 1px 10px 5px #888888;
    padding-left:10%;
    padding-right:10%;
    ">
        <div class="container fix">
        <?php foreach ($kategori as $row) { ?>
        
            <div class="row">
                <div class="col-lg-10 text-center">
                    <a href="<?php echo site_url();?>productcontroll/kategori/<?php echo $row->id_kategori;?>"><h2><?php
                     $kategori_id= $row->nama_kategori;
                     echo $row->nama_kategori?></h2>
                     </a>
                </div>
            </div>
            <div class="row">
            <?php $i=0;
            
            foreach ($product->result() as $row) {
             ?>
             <?php if (($kategori_id==$row->nama_kategori)) {
                if (++$i < 4){
                   
                ?>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal<?php echo $row->id_product;?>" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <i class="fa fa-search-plus fa-3x"></i>
                            </div>
                        </div>
                        <center><img style="max-height:200px;" src="<?php echo base_url();?>upload/product/<?php echo $row->gambar?>" class="img-responsive" alt=""></center>
                    </a>
                        <div class="text-center">
                            <h4><?php echo $row->nama_product?></h4>
                                    
                                

                                <?php if ($row->stok==0) {?>
                                   <h6 style="color:red;"> OUT OF STOCK </h6> 
                                <?php 
                                } else {?>
                                <h6 style="color:green;"> AVAILABLE </h6><?php 
                                    
                                }?>

                                 <?php  
                                    foreach ($this->cart->contents() as $key) {
                                         if (($key['id']==$row->id_product)) {
                                             ?>
                                                 <h6 style="    background: #9F9FE2;
                                                            padding: 0;
                                                            margin: 0;
                                                            /* height: 20px; */
                                                            /* margin-top: 10px; */
                                                            padding-top: 10px;
                                                            padding-bottom: 10px;"> BOOKED </h6> 
                                                
                                                <?php 
                                    }
                                }?>
                                 <i>Rp. <?php echo $row->harga_sewa;?>/hari</i> 
                        
                        </div>


                               

                </div>  
            
                    <?php
                        }//filter 3
                    }//filter kategori
                     
                     }//filter produk
                      ?>
            </div>
            <?php 
            }//foreach kategori
                ?> 
        </div>
    </section>


    <!-- Contact Section -->
    <section id="contact" style="
    background: #2C3E50;
    padding-bottom: 50px;
    padding-right: 10%;
    padding-left: 10%;
    padding-top: 0px;
    ">

        <div class="container fix">
            <div class="row">
                <div class="col-lg-10 text-center">
                    <h2 style="color: white;">Contact Us
                     </h2>
                    <hr class="fa fa-line">
                </div>

            </div>
            <div class="col-md-8">
                <!-- Embedded Google Map -->
                <iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll=-7.96453, 112.61086&amp;spn=-7.96453, 112.61086&amp;t=m&amp;z=4&amp;output=embed"></iframe>
            </div>
            <div class="col-md-4" style="color: white;">
                <h3>Contact Details</h3>
                <p>
                    Kompleks Wocil<br>Lowokwaru, Malang<br>
                </p>
                <p><i class="fa fa-phone"></i> 
                    <abbr title="Phone">P</abbr>: (123) 456-7890</p>
                <p><i class="fa fa-envelope-o"></i> 
                    <abbr title="Email">E</abbr>: <a href="mail tp :admin@RakMalang.com">admin@RakMalang.com</a>
                </p>
                <p><i class="fa fa-clock-o"></i> 
                    <abbr title="Hours">H</abbr>: Monday - Friday: 9:00 AM to 5:00 PM</p>
            </div>
        </div>
    </section>

   
    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visible-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>
        <?php foreach ($kategori as $row) { 
            $kategori_id= $row->nama_kategori;      
             $i=0;
                foreach ($product->result() as $row) {
                  if (($kategori_id==$row->nama_kategori)) {
                    if (++$i < 4){ 
                    ?>
                <div class="portfolio-modal modal fade" id="portfolioModal<?php echo $row->id_product;?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-content">
                            <h2 style=""><?php echo $row->nama_product;?></h2>
                            <div class="close-modal" data-dismiss="modal">
                                <div class="lr">
                                    <div class="rl">
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4 col-lg-offset-2" style="margin-left:10%; margin-top:10%">
                                        <div class="modal-body">
                                            
                                            <img src="<?php echo base_url();?>upload/product/<?php echo $row->gambar;?>" class="img-responsive img-centered" alt="">
                                            
                                        </div>
                                    </div>
                                    <div class="col-sm-4 box-chart" style="
                                    margin-top: 10%;
                                    background: #A8A8A8;
                                    border-radius: 10px;
                                    padding-bottom: 10px;
                                    margin:10%;
                                    margin-top: 13%;">
                                        <div>
                                            <h3>
                                                Rp. <?php echo $row->harga_sewa;?>/hari
                                            </h3>
                                            <p style="color:green;">
                                            <?php if ($row->stok==0) {?>
                                           <h6 style="color:red;"> OUT OF STOCK </h6> 
                                            <?php 
                                            } else {?>
                                                <h6 style="color:green;"> AVAILABLE </h6><?php 
                                            }?>
                                            </p>
                                            <p>
                                                sisa stok
                                            </p>
                                            <h4><?php echo $row->stok; ?></h4>
                                        </div>
                                        <div>
                                            <?php if (($row->stok)==0) {?>
                                                <button class="btn btn-primary" disabled>ADD TO BOOKING LIST</button> 
                                            <?php 
                                            }else{?>
                                            <a href="<?php echo site_url();?>bookingcontroll/addtobookinglistcart/<?php echo $row->id_product;?>">
                                            <button class="btn btn-primary">ADD TO BOOKING LIST</button> 
                                            </a>
                                            <?php
                                            }?>     
                                        </div>      
                                    </div>
                                </div>
                                
                                    <div class="col-sm-12">
                                        <h3 style="text-align:left;">Product Info</h3>
                                        <p style="text-align: left;">
                                            <?php echo $row->deskripsi?>
                                        </p>
                                            
                                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                    </div>

                            </div>
                        </div>
                </div>
        <?php 
                    }
                }
            }
        }?> 
   

  
