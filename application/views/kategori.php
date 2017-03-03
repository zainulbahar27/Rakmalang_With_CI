<!-- Header Carousel -->
   
    <!-- Portfolio Grid Section -->
    <section id="portfolio" style="
    box-shadow: 1px 10px 5px #888888;
    padding-left:10%;
    padding-right:10%;
    ">
        <div class="container fix">
    <?php
        $i=0; 
        foreach ($product->result() as $row) { 
            $kategori_nama = $row->nama_kategori;
            if (++$i == 1){ 
            ?>
            <div class="row">
                <div class="col-lg-10 text-center">
                    <h2><?php echo $kategori_nama;?></h2>
                    <hr class="space fa fa-line">
                </div>
            </div>
            <div class="row">
            <?php      
             $i=0;
                foreach ($product->result() as $row) {
                  if (($kategori_nama==$row->nama_kategori)) {
                    if (++$i < 13){ 
                    ?>
                    
                        <div class="col-sm-4 portfolio-item">
                            <a href="#portfolioModal<?php echo $row->id_product;?>" class="portfolio-link" data-toggle="modal">
                                <div class="caption">
                                    <div class="caption-content">
                                        <i class="fa fa-search-plus fa-3x"></i>
                                    </div>
                                </div>
                                <center><img style="max-height:200px; max-width:293px" src="<?php echo base_url();?>upload/product/<?php echo $row->gambar;?>" class="img-responsive" alt=""></center>
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
                            }
                        }
                    }?>
                    </div>
                <?php 
                }
            }
                ?>
            </div>
      
    </section>

 
   
    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visible-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- Portfolio Modals -->
    
  <?php foreach ($kategori as $row) { 
            $kategori_id= $row->nama_kategori;      
             $i=0;
                foreach ($product->result() as $row) {
                  if (($kategori_id==$row->nama_kategori)) {
                    if (++$i < 13){ 
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
                                    <div class="col-lg-4 col-lg-offset-2"
                                         style="margin-left:10%; margin-top:10%">
                                        <div class="modal-body">
                                            
                                            <img src="<?php echo base_url();?>upload/product/<?php echo $row->gambar;?>" class="img-responsive img-centered" alt="">
                                            
                                        </div>
                                    </div>
                                    <div class="col-sm-4 box-chart" style="
                                    margin-top: 10%;
                                    background: #d6d1d7;
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
                                        <br><br>
                                            
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
