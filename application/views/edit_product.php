 <div id="page-wrapper">
                
     <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Product</h1>
            
        </div>
            <ol class="breadcrumb">
                 <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.html">HOME</a>
                 </li>
                 <li>
                        <i class="fa fa-edit"></i>Edit Product
                 </li>
             </ol>
                <!-- /.col-lg-12 -->
        </div>
        <?php foreach ($product->result() as $row) { ?>

    <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url();?>productcontroll/save_edit_product/" method="post">
            <div class="form-group">
                <label class="col-sm-3 control-label">Ctegory</label>
                <div class="col-sm-3">
                        <input type="text" class="form-control" name="namaproduct" value="<?php echo $row->nama_kategori;?>" required readonly>
                        <input name="id_kategori" type="hidden" value="<?php echo $row->id_kategori; ?>">
                    </div>
                </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Product Name</label>
                <div class="col-sm-7">
                        <input type="text" class="form-control" name="nama_product" value="<?php echo $row->nama_product;?>" required>
                        <input name="id_product" type="hidden" value="<?php echo $row->id_product; ?>">
                </div>
            </div>
             <div class="form-group">
                <label class="col-sm-3 control-label">Previous Image</label>

                <div class="col-sm-7">
                    <img class="col-sm-4" src="<?php echo base_url();?>/upload/product/<?php echo $row->gambar;?>">
                </div>
            </div>
            <div class="form-group">
             <label class="col-sm-3 control-label">Picture</label>
             
                <div class="col-sm-7">
                   <div class="alert alert-info">  
                                        <a class="close" data-dismiss="alert">x</a>  
                                        <strong>Info! </strong><br/>
                                        Gambar optimal pada resolusi 800x400 px<br/>
                                        Ukuran Maksimum file 1 MB, (disarankan ukuran dibawah 100kb)<br/>
                                        File yang diizinkan untuk upload .jpg, .jpeg, .png, .gif
                                    </div>
                        <input type="file" name="gambar">
                         (Kosongkan jika tidak ingin mengganti gambar.)
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Rent Price</label>
                <div class="col-sm-4">
                        <input type="text" name="harga_product" pattern="[0-9].{3,11}" class="form-control" value="<?php echo $row->harga_sewa;?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Stock</label>
                <div class="col-sm-3">
                        <input type="number" class="form-control" name="jumlah_stok"  required value="<?php echo $row->stok;?>">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Description</label>
                <div class="col-sm-6">
                        <textarea class="form-control" name="deskripsi" > <?php echo $row->deskripsi;?></textarea>
                </div>
            </div>
            <?php 
        }?>
            <div class="form-group">
                <button class="btn btn-primary pull-right" style="margin-right:18%;">Save</button>
            </div>
    </form>
</div>