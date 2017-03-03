 <div id="page-wrapper">
                
     <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add New Product</h1>
        </div>
            <ol class="breadcrumb">
                 <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.html">HOME</a>
                 </li>
                 <li>
                        <i class="fa fa-edit"></i>Add New Product
                 </li>
             </ol>
                <!-- /.col-lg-12 -->
        </div>

    <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url();?>productcontroll/addnewproduct/" method="post">
            <div class="form-group">
                <label class="col-sm-3 control-label">Category </label>
                <div class="col-sm-3">
                        <select name="id_kategori" class="form-control">
                        <?php foreach ($kategori as $row) {?>
                            <option value="<?php echo $row->id_kategori?>"><?php echo $row->nama_kategori?></option>
                        <?php 

                        }
                        ?>
                          
                        </select>
                    </div>
                </div>
        
            <div class="form-group">
                <label class="col-sm-3 control-label">Product Name</label>
                <div class="col-sm-7">
                        <input type="text" class="form-control" name="nama_product" placeholder="Nama Barang" required>
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
                        <input type="file" name="gambar_product" required>
                        <span class="help-inline"><?php echo $error; ?></span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Rent Price</label>
                <div class="col-sm-4">
                        <input type="text" name="harga_product" pattern="[0-9].{3,11}" class="form-control" placeholder="Harga"  required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Stock</label>
                <div class="col-sm-3">
                        <input type="number" class="form-control" name="jumlah_stok" placeholder="Jumlah Stok" required>
                        
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Description</label>
                <div class="col-sm-6">
                        <textarea class="form-control" name="deskripsi" placeholder="Deskripsi Alat"  required> </textarea>
                </div>
            </div>

            <div class="form-group">
                <button class="btn btn-primary pull-right" style="margin-right:18%;">Save</button>
            </div>
    </form>
</div>