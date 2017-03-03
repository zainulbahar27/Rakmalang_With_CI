<form class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url();?>register/setRegister" method="post">
       <div class="text-center"> 
                <h2>CREATE NEW ACCOUNT</h2>
                <?php if($this->session->flashdata('info_email')) { ?>
                            <div class="alert alert-info">  
                                    <a class="close" data-dismiss="alert">x</a>  
                                    <strong>Warning! </strong><?php echo $this->session->flashdata('info_email'); ?>  
                            </div>
                        <?php } ?>
       </div>
        <div class="form-group">
                <label class="col-sm-3 control-label">Full Name</label>
                <div class="col-sm-5">
                        <input type="text" class="form-control" name="name" placeholder="Full Name" required>
                </div>
        </div>
        <div class="form-group">
                <label class="col-sm-3 control-label">E-mail</label>
                <div class="col-sm-5">
                        <input type="email" class="form-control" name="email" required placeholder="Enter a valid email address">
                </div>
        </div>

        <div class="form-group">
                <label class="col-sm-3 control-label">Password</label>
                <div class="col-sm-4">
                        <input class="form-control" type="password" placeholder="Password" id="password" required name="password">
                </div>
        </div>
        <div class="form-group">
                <label class="col-sm-3 control-label">Confirm Password</label>
                <div class="col-sm-4">
                        <input class="form-control" type="password" placeholder="Confirm Password" id="confirm_password" required>
                </div>
        </div>
        <div class="form-group">
                <label class="col-sm-3 control-label">Birthday Date</label>
                <div class="col-sm-3">
                        <input type="date" class="form-control" name="birthday" required>
                </div>
        </div>
         <div class="form-group">
                <label class="col-sm-3 control-label">Gender</label>
                <div class="col-sm-2">
                        <select name="Gender" class="form-control">
                          <option value="male">Male</option>
                          <option value="female">Female</option>
                        </select>
                    </div>
                </div>
        </div>
        <div class="form-group">
                <label class="col-sm-3 control-label">Phone Number</label>
                <div class="col-sm-4">
                       <input type="text" name="phone" pattern="[0-9]*" class="form-control" >
                </div>
        </div>
        <div class="form-group">
                <label class="col-sm-3 control-label">Zip Code</label>
                <div class="col-sm-4">
                       <input type="text" name="poss" pattern="[0-9]*" class="form-control" >
                </div>
        </div>
        <div class="form-group">
                <label class="col-sm-3 control-label">Address</label>
                <div class="col-sm-5" >
                       <textarea type="text" name="alamat"  class="form-control" style="
                            min-height: 100px;
                        ">
                       </textarea>
                </div>
        </div>
        <div class="form-group" style="
    padding-bottom: 80px;
">
                <div class="col-sm-offset-5 col-sm-7">
                        <br><br><button type="submit" class="btn btn-primary pull-right" style="margin-right:30%;">Register</button>
                </div>
        </div>
</form>   
                     