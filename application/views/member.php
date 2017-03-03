<div id="page-wrapper">
           
            <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">RAK Malang Member</h1>
            </div>
                <ol class="breadcrumb">
                     <li>
                            <i class="fa fa-dashboard"></i>  <a href="index.html">HOME</a>
                     </li>
                     <li>
                            <i class="fa fa-edit"></i> Member
                     </li>
                 </ol>
                    <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
                        <?php if($this->session->flashdata('info')) { ?>
                            <div class="alert alert-info">  
                                    <a class="close" data-dismiss="alert">x</a>  
                                    <strong>Info! </strong><?php echo $this->session->flashdata('info'); ?>  
                            </div>
                        <?php } ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            RAK Malang Member List
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Birthday Date</th>
                                            <th>Gender</th>
                                            <th>Phone number</th>
                                            <th>Address</th>
                                            <th>Zip Code</th>
                                            <th>Last Login</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($listmember->result() as $row) {?>
                                          

                                        <tr class="odd gradeX">
                                            <td><?php echo $row->nama ?></td>
                                            <td><?php echo $row->email?></td>
                                            <td><?php echo $row->tgl_lahir?></td>
                                            <td><?php echo  $row->jenis_kelamin?></td>
                                            <td class="center">
                                            <?php $row->nomor_telfon ?>
                                            </td>
                                            <td class="center">
                                            <?php echo $row->alamat?>
                                            </td>
                                            <td>
                                               <?php echo $row->kode_pos?>
                                             </td>
                                             <td>
                                               <?php echo $row->last_login?>
                                             </td>
                                            <td>
                                                <a href="#" onClick="if(confirm('Anda yakin ingin HAPUS user ini? ')){document.location='<?php echo site_url();?>membercontroll/deletemember/<?php echo $row->id_member;?>'}"><button class="btn btn-primary">Delete</button>
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