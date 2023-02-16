

            <div class="col-md-3 left_col menu_fixed"> 
                <div class="left_col scroll-view"> 

                    <div class="navbar nav_title" style="border: 0;">
                        <p class="site_title"><i class="fa fa-key" ></i> <span>Geekseat</span></p>
                    </div>

                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            <img src="<?php $img = "images/53.jpg"; echo base_url($img) ;?>" class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2></h2>
                        </div>
                        
                    </div>
                     <!--/menu prile quick info -->

                    <br />

                    <!-- sidebar menu -->                   
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <ul class="nav side-menu" style="text-align: center;">
                                <li><p><i class="fa fa-user"></i> <?php echo $id['username']; ?> </p>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo site_url('auth/logout'); ?>">
                                            Logout</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>


                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li><a href="<?php echo site_url('test'); ?>"><i class="fa fa-newspaper-o"></i> Test GeekSeat </a></li>
                            </ul>
                        </div>

                        <div class="menu_section">
                            <h3>Admin Master</h3>
                            <ul class="nav side-menu">
                                <li><a href="<?php echo site_url('user')?>"><i class="fa fa-users"></i> Users </a></li>                       
                                
                            </ul>
                        </div>
                        
                    </div>
                    <!-- /sidebar menu -->

                    
                </div>
            </div>