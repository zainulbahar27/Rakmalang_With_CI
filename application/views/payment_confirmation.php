<form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url();?>ConfirmPayment/sendconfirmpayment" method="post" style="margin-bottom: 7%;">
            <div class="text-center"style="
            MARGIN-TOP: 10;"> 
                        <h2>PAYMENT CONFIRMATION</h2>
           </div>
            <div class="form-group">
                    <label class="col-sm-3 control-label">BOOKING CODE</label>
                    <div class="col-sm-7">
                            <input type="text" class="form-control" name="id_bookinglist" value="<?php echo $id_bookinglist;?>" required readonly>
                    </div>
            </div>
            <div class="form-group">
                    <label class="col-sm-3 control-label">Account Name</label>
                    <div class="col-sm-7">
                            <input type="text" class="form-control" name="acc_name" required placeholder="Account Name">
                            <input type="hidden" name="id_member" value="<?php echo $id_member;?>">
                    </div>
            </div>

             <div class="form-group">
                    <label class="col-sm-3 control-label">From Bank</label>
                    <div class="col-sm-3">
                            <select name="bank_asal" class="form-control">
                              <option value="bni">BNI</option>
                              <option value="mandiri">Mandiri</option>
                              <option value="bri">BRI</option>
                              <option value="BCA">BCA</option>
                              <option value="BTN">BTN</option>
                            </select>
                    </div>
                    </div>
            

             <div class="form-group">
                    <label class="col-sm-3 control-label">Destination Bank</label>
                    <div class="col-sm-3">
                            <select name="bank_tar" class="form-control">
                              <option value="bni">BNI</option>
                              <option value="mandiri">Mandiri</option>
                              <option value="BCA">BCA</option>
                            </select>
                    </div>
            </div>
            
            <div class="form-group">
                    <label class="col-sm-3 control-label">Amount</label>
                    <div class="col-sm-4">
                           <input type="text" name="jumlah" pattern="[0-9]*" class="form-control" >
                    </div>
            </div>
            <div class="form-group">
                    <label class="col-sm-3 control-label">Payment Date</label>
                    <div class="col-sm-3">
                            <input type="date" class="form-control" name="paymentdate" required>
                    </div>
            </div>
            <div class="form-group">
                    <label class="col-sm-3 control-label">Upload Token</label>
                    <div class="col-sm-7">
                            <input type="file" name="gambar_token" required>
                            <p style="color:green; font-size: small; padding-top:10px"><i> Foto yang diupload tidak boleh lebih dari 2MB</i></p>
                    </div>
                </div>
            <div class="form-group" style="padding-right:10%;">
                    <div class="col-sm-offset-4 col-sm-7">
                            <button type="submit" class="btn btn-primary pull-right">Send</button>
                    </div>
            </div>
</form>

                     