 <div id="page-wrapper">
                
     <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Add New Category</h1>
        </div>
            <ol class="breadcrumb">
                 <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.html">HOME</a>
                 </li>
                 <li>
                        <i class="fa fa-edit"></i> New Categories
                 </li>
             </ol>
                <!-- /.col-lg-12 -->
        </div>

    <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url();?>/productcontroll/submit_kategori" method="post">
            <div class="form-group">
                <label class="col-sm-3 control-label">Nama Kategori</label>
                <div class="col-sm-7">
                        <input type="text"  class="form-control" name="nama_kategori" placeholder="Nama Kategori" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Deskripsi</label>
                <div class="col-sm-7">
                        <textarea type="text" class="form-control" name="deskripsi" placeholder="Deskripsi">
                        </textarea>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary pull-right" style="margin-right:18%;">Save</button>
            </div>
    </form>