<form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url();?>membercontroll/setProfilmember" method="post">
       <div class="text-center"style="
    MARGIN-TOP: 10;
    "> 
                <h2>Edit Profile</h2>
                <?php foreach ($profile->result() as $row) {?>
                    
                
       </div>
        <div class="form-group">
                <label class="col-sm-3 control-label">Full Name</label>
                <div class="col-sm-6">
                        <input type="text" value="<?php echo $row->nama;?>" class="form-control" name="nama" placeholder="Full Name" required >
                </div>
        </div>
        <div class="form-group">
                <label class="col-sm-3 control-label">E-mail</label>
                <div class="col-sm-6">
                        <input type="email" class="form-control" name="email" required placeholder="Enter a valid email address" value="<?php echo $row->email;?>" readonly>
            
                </div>
        </div>
        
        <div class="form-group">
                <label class="col-sm-3 control-label">Password</label>
                <div class="col-sm-4">
                        <input class="form-control" type="password" placeholder="Password" name="password" >
                </div>
        </div>
        <div class="form-group">
                <label class="col-sm-3 control-label">Confirm Password</label>
                <div class="col-sm-4">
                        <input class="form-control" type="password" placeholder="Confirm Password" >
                </div>
        </div>
        <div class="form-group">
                <label class="col-sm-3 control-label">Birthday Date</label>
                <div class="col-sm-3">
                        <input type="text" class="form-control" name="birthday" required value="<?php echo $row->tgl_lahir;?>" readonly>
                </div>
        </div>
         <div class="form-group">
                <label class="col-sm-3 control-label">Gender</label>
                <div class="col-sm-3">
                     <input type="text" class="form-control" name="gender" required readonly value="<?php echo $row->jenis_kelamin;?>">
                
                    </div>
                </div>
        </div>
        <div class="form-group">
                <label class="col-sm-3 control-label">Phone Number</label>
                <div class="col-sm-4">
                       <input type="text" name="nomor_telfon" pattern="[0-9]*" class="form-control" value="<?php echo $row->nomor_telfon;?>">
                </div>
        </div>
        <div class="form-group">
                <label class="col-sm-3 control-label">Zip Code</label>
                <div class="col-sm-4">
                       <input type="text" name="kode_pos" pattern="[0-9]*" class="form-control" value="<?php echo $row->kode_pos;?>">
                </div>
        </div>
        <div class="form-group">
                <label class="col-sm-3 control-label">Address</label>
                <div class="col-sm-5">
                       <input type="text" name="alamat"  class="form-control" value="<?php echo $row->alamat;?>">
                    <br>
                       
                </div>
        </div>
        <?php 
                }?>
        <div class="form-group" style="
            margin-right: 12%;
            padding-bottom:80px; ">
                <div class="col-sm-offset-4 col-sm-7">
                        <button type="submit" class="btn btn-primary pull-right">Save</button>
                </div>
        </div>
</form>   
                     