<div id="page-wrapper">
           
            <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Orders</h1>
            </div>
                <ol class="breadcrumb">
                     <li>
                            <i class="fa fa-dashboard"></i>  <a href="index.html">HOME</a>
                     </li>
                     <li>
                            <i class="fa fa-edit"></i> Orders
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
                            RAK Malang Order List
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Booking Code</th>
                                            <th>Details</th>
                                            <th>Payment Date</th>
                                            <th>Payment Due</th>
                                            <th>Amount</th>
                                            <th>Receipt Transfer</th>
                                            <th>Confirm</th>
                                            <th>Decline</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                
                                    <?php 

                                    foreach ($order->result() as $key) {?>
                                        
                                            <tr class="odd gradeX">
                                            <td><?php echo $id=$key->order_id_bookinglist;?></td>
                                            <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="">Detail</button>
                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="exampleModalLabel">Detail Barang</h4>
                                                      </div>
                                                      <div class="modal-body" id="recipient-name">
                                                      <label>nama_barang/ jumlah/ </label>
                                                      <br>
                                                      <?php foreach ($booking_list->result() as $row ) {
                                                        if ($row->order_id_bookinglist == $id) {
                                                           echo "   ".$row->nama_product. "  / ". $row->jumlah. "";
                                                        }
                                                          
                                                      }?>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div> 
                                            </td>
                                            <td class="center">
                                            <?php echo $key->payment_date;?></td>
                                            <td class="center">
                                            <?php echo $key->batas_pembayaran;?>
                                            </td>
                                            <td class="center">
                                            <?php echo $key->jumlah_transfer;?>
                                            </td>
                                            <td>
                                               <a href="#exampleModa2" data-toggle="modal" data-target="#exampleModa2" data-whatever=""><img class="col-sm-5" src="<?php echo base_url();?>upload/token/<?php echo $key->bukti_transfer;?>"></a>
                                            
                                                <div class="modal fade" id="exampleModa2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content col-sm-12">
                                                      <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="exampleModalLabel">Receipt Transfer</h4>
                                                      </div>
                                                      <div class="modal-body" id="recipient-name">
                                                      <img class="col-sm-12" src="<?php echo base_url();?>upload/token/<?php echo $key->bukti_transfer;?>">
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div> 
                                            </td>
                                            <td>
                                                <a href="<?php echo site_url();?>ConfirmPayment/confirmPayment/<?php echo $id?>/Confirmed"><button class="btn btn-primary" <?php if (($key->status_order == 'Confirmed')){
                                                    echo "disabled";
                                                }?>>Confirm</button>
                                                </a>
                                                
                                            </td>
                                            <td>
                                               <a href="<?php echo site_url();?>ConfirmPayment/declinePayment/<?php echo $id?>/Declined"><button class="btn btn-primary" <?php if (($key->status_order == 'Declined')) {
                                                    echo "disabled";
                                                }?>>Decline</button>
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