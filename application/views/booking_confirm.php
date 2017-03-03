<div class="panel-body"><div class="text-center" style="
    MARGIN-TOP: 10;
"> 
    <h2>BOOKING CONFIRMATION</h2>
</div>
<form method="post"  action="<?php echo site_url();?>bookingcontroll/bookingAlat">
    <div class="col-sm-4">
        <div class="form-group">
        <label>Pickup Date</label>
        <input class="form-control" type="date" name="tgl_ambil" required>
        </div>
        <div class="form-group">
        <label>Return Date</label>
        <input class="form-control" type="date" name="tgl_kembali" required>
        </div>
    </div>

<div class="dataTable_wrapper">
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
            <tr>
                <th>Picture</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
        <?php 
        $i=0;
        foreach ($product->result() as $row) { 
            foreach ($this->cart->contents() as $key) {
                if (($row->id_product)== ($key['id'])) {
            ?>
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
                    <?php echo $key['qty'];?> 
                </td>
                <td>
                    Rp. <?php echo $row->harga_sewa;?>
                </td>
                <td>
                   Rp. <?php  echo $key['subtotal'];
                   $i=$i+$key['subtotal'];?>
                </td>
            </tr> 
            <?php 
                    }
                }
            }
            ?>                        
        </tbody>

     </table>

     

     <div style="height:50px;     margin-top: 40px;">
         <br><button class="btn btn-primary pull-left">Back</button>

         <button type="submit" class="btn btn-primary pull-right" <?php if ($i==0) {
             echo "disabled";
         }?>>Proceed</button>
     </div>
     <div class="pull-center" style="
    margin-top: 7%;
    margin-left: 0%;
    margin-bottom: 4%;
">
         <h3>CARA MENGKONFIRMASI PEMESANAN ADALAH SEBAGAI BERIKUT :</h3> 
            
        1. Tentukan tanggal pengambilan dan pengembalian barang</br>
        2. Tekan tombol Proceed</br>
            3. Transfer sesuai dengan nominal yang harus dibayarkan ke rekening RAK Malang (pilih salah satu) :</br>
                BNI : 0260788409</br>
                BCA : 6565068744<br>
                Mandiri : 0051-03-008674-58-6<br>
            4. Lakukan konfirmasi pembayaran dengan mengklik tombol Confirm pada halaman My Order<br>
            5. Tunggu hingga konfirmasi pembayaran yang dilakukan telah diterima oleh administrator RAK Malang<br>
            <br>
            <nr>
            Remember :<br>
            Jika tidak melakukan pembayaran hingga sampai waktu yang telah ditentukan maka pemesanan dianggap batal.<br>
     </div>
     </form>
</div>
</div>
