<div class="panel-body">
    <div class="text-center "style="
    MARGIN-TOP: 10;
    "> 
        <h2>BOOKING LIST</h2>
    </div>
<div class="dataTable_wrapper table-responsive">

    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th>Picture</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Sub Total</th>
                <td></td>
            </tr>
        </thead>
        <tbody>
        
        <?php foreach ($product->result() as $row) { 
            foreach ($this->cart->contents() as $key) {
                if (($row->id_product)== ($key['id'])) {
            ?>
            <form method="post" action="<?php echo base_url();?>bookingcontroll/updatebookinglist">
            <tr>
                <td>
                    <div class="col-2">
                    <img class="img-responsive max" src="<?php echo base_url();?>upload/product/<?php echo $row->gambar;?>">
                    </div>
                </td>
                <td>
                    <?php echo $row->nama_product;?>
                </td>
                    
                <td>
                    <input min="1" max="<?php echo $row->stok;?>" type="number" class="form-control" name="qty" required value="<?php echo $key['qty'];?>">
                    <input type="hidden" name="rowid" value="<?php echo $key['rowid'];?>">  
                </td>
                <td>
                    <?php echo $row->harga_sewa;?>
                </td>
                <td>
                    <?php  echo $key['subtotal'];?>
                </td>
                <td>
                    <button class="btn btn-danger pull-center">Delete</button>
                    <button type="submit" class="btn btn-primary fa fa-check"></button>
                </td>
            </tr> 
            </form>
            <?php 
                    }
                }
            }?>                        
        </tbody>
     </table>
         <br><a href="<?php echo site_url();?>bookingcontroll/bookingconfirm"><button class="btn btn-primary pull-right" type="submit">Check Out</button></a>
    
     </div>
</div>
</div>
