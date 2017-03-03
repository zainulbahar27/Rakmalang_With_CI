<div id="page-wrapper">
           
            <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Existing Categories</h1>
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
                            RAK Malang's Categories List
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Id Kategori</th>
                                            <th>Nama Kategori</th>
                                            <th>Deskripsi</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($kategori->result() as $row) {
                                          
                                        ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $row->id_kategori;?></td>
                                            <td><?php echo $row->nama_kategori;?></td>
                                            <td><?php echo $row->deskripsi;?></td>
                                           
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