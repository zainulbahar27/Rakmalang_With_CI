<div id="page-wrapper">
           
            <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Existing Products</h1>
            </div>
                <ol class="breadcrumb">
                     <li>
                            <i class="fa fa-dashboard"></i>  <a href="index.html">HOME</a>
                     </li>
                     <li>
                            <i class="fa fa-edit"></i> Existing Products
                     </li>
                 </ol>
                    <!-- /.col-lg-12 -->
            </div>
                        <?php if($this->session->flashdata('info')) { ?>
                            <div class="alert alert-info">  
                                    <a class="close" data-dismiss="alert">x</a>  
                                    <strong>Info! </strong><?php echo $this->session->flashdata('info'); ?>  
                            </div>
                        <?php } ?>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            RAK Malang's Items List
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Product Code</th>
                                            <th>Product Name</th>
                                            <th>Stock</th>
                                            <th>Description</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($product->result() as $row) {
                                          
                                        ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $row->nama_kategori;?></td>
                                            <td><?php echo $row->id_product;?></td>
                                            <td><?php echo $row->nama_product;?></td>
                                            <td class="center"><?php echo $row->stok;?>
                                            </td>
                                            <td class="center"><?php echo $row->deskripsi;?>
                                            </td>
                                            <td>
                                                <a href="<?php echo site_url();?>productcontroll/edit_product?id_product=<?php echo $row->id_product;?>"><button class="btn btn-primary">Edit</button>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="#" onClick="if(confirm('Anda yakin HAPUS data ini? ')){document.location='<?php echo base_url()?>productcontroll/hapus_product/<?php echo $row->id_product; ?>'}"><button class="btn btn-primary">Delete</button>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php 
                                        }?>
                                        
                                    </tbody>
                                </table>
                            </div>
                         
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <!-- /.row -->
            
        </div>