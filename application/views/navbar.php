

<body id="page-top" class="index">

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="container"  style="background:black; margin:0; padding:0; width:100%; ">
                <ul class="nav navbar-nav navbar-right" style="height:30px; padding-right:13%; padding-left:20px; max-width: none !important; padding-left;90px;">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li class="active ">
                      <a href="<?php echo site_url()?>"  style="
                        padding: 5px;
                        padding-right:30px;
                    ">
                        <div class="fa fa-home"></div>
                         HOME</a>
                    </li>
                    <li class="active">
                        <a href="#"  style="
                            padding: 5px;
                            padding-right:30px;
                        ">
                        Help</a>
                    </li>
                    <li class="active" >
                        <a href="#" style="
                            padding: 5px;
                            padding-right:30px;
                        ">
                        About Us</a>
                    </li>
                </ul>
            </div>
            <nav style="
        		    padding-top: 0;
                    background: #a07822;
                    padding-bottom:0;
                    margin-bottom:0;
        		" class="navbar navbar-default ">
                    <img src="<?php echo base_url();?>assets/foto/logo.png " class="navbar-brand-foto">
        	        <div class="  nav-menu">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header page-scroll">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>

                        </button>
                        

                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
                        <ul class="nav navbar-nav navbar-right">
                            <li class="hidden">
                                <a href="#page-top"></a>
                            </li>
                            <li class="page-scroll ">
                                <?php if($this->session->flashdata('info')) { ?>
                                <div class="alert alert-info">  
                                        <a class="close" data-dismiss="alert">x</a>  
                                        <strong>Info! </strong><?php echo $this->session->flashdata('info'); ?>  
                                </div>
                                <?php } ?>
                            </li>
                            <?php if ($id_member  =='') {?>
                            <li class="page-scroll ">
                                <a href="#login" class="portfolio-link white" data-toggle="modal">
                                <div class="fa fa-user white"></div>
                                 LOGIN</a>
                            </li>
                            
                            <?php } 
                            else {?>
                            <li class="page-scroll ">
                                <a href="<?php echo site_url()?>memberControll/getEditMember">
                                <div class="fa fa-user white"></div>
                                EDIT PROFILE</a>
                            </li>
                            
                            <?php
                            }?>
                            
                            <?php if ($id_member !='') {?>
                              <li class="page-scroll">
                                <a href="<?php echo site_url();?>bookingcontroll/my_order" class="">
                                <div class="fa fa-list-alt white"></div>
                                MY ORDER</a>
                            </li>
                            <li class="page-scroll">
                                <a href="<?php echo site_url()?>bookingcontroll/bookinglist">
                                <div class="fa fa-shopping-cart white"></div>
                                BOOKING LIST</a>
                            </li>
                            <li class="page-scroll">
                                <a href="<?php echo site_url(); ?>register/logout" class="portfolio-link white" data-toggle="modal">
                                <div class="fa fa-sign-out white"></div>
                                 LOGOUT</a>
                            </li>  
                            <?php
                            }?>
                            
                        </ul>
                    </div>
                    <div class="line"></div>
                    <div style="
                        background-color: #a07822;
                        padding-left:0

                    " class="container-fluid ">
                    <div class=" navbar-collapse" style="background: #a07822; float: left; padding-left:0;">
                
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories <b class="caret"></b></a>
                              <ul class="dropdown-menu">
                              <?php foreach ($kategori as $row) { ?>
                                  <li><a href="<?php echo site_url();?>productcontroll/kategori/<?php echo $row->id_kategori;?>"><?php echo $row->nama_kategori;?></a></li>
                              <?php }?>
                                
                              </ul>
                            </li>
                        </ul>
                        
                        
                    </div>
                      <form class="navbar-nav navbar-left" role="search" style="width: 40%; padding-top:8px" action="<?php echo site_url();?>productcontroll/search">
                        <div type="submit" class="fa fa-search white" style=" float:left; padding:3%;"></div>
                        
                        <div class="form-group" style=" float:left;">
                          <input type="text" name="search" class="form-control" placeholder="Search what your need ..." style="
                            border: none;
                            padding: none;
                            padding: 0;
                            margin: 0;
                            border-radius: 0;
                            background: #a07822;
                            width: 100%;
                            box-shadow: 0px 20px 25px -20px ;
                            color:white;
                        "  tabindex="-1">
                        </div>

                      </form>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </nav>

    <div class="portfolio-modal modal fade" id="login" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-login">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 ">
                        <div class="modal-body">
                        <div class="close-modal clo1" data-dismiss="modal">
                            <div class="lr r">
                                <div class="rl r">
                                </div>
                            </div>
                        </div>
                        <div class="login-form-1 login-fix">
                            <form method="post" id="login-form " class="text-left" action="<?php echo site_url();?>register/login">
                                <div class="login-form-main-message"></div>
                                <div class="main-login-form">
                                    <div class="login-group">
                                        <div class="form-group">
                                            <label for="lg_username" class="sr-only">Username</label>
                                            <input type="text" class="form-control" name="email" placeholder="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="lg_password" class="sr-only">Password</label>
                                            <input type="password" class="form-control"  name="password" placeholder="password">
                                        </div>
                                        <div class="form-group login-group-checkbox">
                                            <div style="height: 10px;"></div>
                                        </div>
                                    </div>
                                    <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
                                </div>
                                <div class="etc-login-form white">
                                    <p >forgot your password? <a style="color:red;" href="#">click here</a></p>
                                    <p >new user? <a style=" color: #037B0D;" href="<?php echo site_url();?>register/register">create new account</a></p>
                                </div>
                            </form>
                        </div>
                        <!-- end:Main Form -->
                    </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<SCRIPT TYPE="text/javascript"> 
 function submitenter(myfield,e) { var keycode; 
    if (window.event) keycode = window.event.keyCode; 
    else if (e) keycode = e.which; 
    else return true; 
    if (keycode == 13) { myfield.form.submit(); 
        return false; } else return true; } 
 </SCRIPT>
   