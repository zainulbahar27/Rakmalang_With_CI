        <div class="panel-body"><div class="text-center"style="MARGIN-TOP: 10;">  
                <h2>MY ORDER</h2>
        </div>
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Booking Code</th>
                                            <th>Pickup Date</th>
                                            <th>Return Date</th>
                                            <th>Amount</th>
                                            <th>Payment Due</th>
                                            <th>Payment Status</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($order->result() as $row) {?>
                                       <tr class="even gradeC">
                                            <td><?php echo $row->id_bookinglist;?></td>
                                            <td><?php echo date("d/m/Y", strtotime($row->tgl_pemesanan));?></td>
                                            <td><?php echo date("d/m/Y", strtotime($row->tgl_pengembalian));?></td>
                                            <td><?php echo $row->total_pembayaran?></td>
                                            
                                            <td><?php echo date("d/m/Y", strtotime($row->batas_pembayaran));?></td>
                                            <td><?php echo $row->status_order?></td>
                                            <td class="center">

                                                <a href="<?php echo site_url();?>bookingcontroll/payment_confirmation/<?php echo $row->id_bookinglist;?>">
                                                    <button type="button" class="btn btn-primary" <?php if ($row->status_order=='Pending') {
                                                    echo "";
                                                } else{echo "disabled";
                                                    }?>>Confirm</button>
                                                </a>
                                                
                                            </td>
                                            <td class="center">
                                            <a href="";>
                                                <button type="button" class="btn btn-primary" >Detail</button>
                                            </a>
                                            </td>
                                        </tr>
                                        <?php 
                                    }?>
                                        
                                        
                                    </tbody>


                                </table>
                            
                            </div>

                        </div>