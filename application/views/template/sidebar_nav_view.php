            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <?php echo '<p class="welcome"><b> <text style="font-size:150%;">&#9786</text> <i>Welcome </i>' . $this->session->userdata('name') . "!</b></p>"; ?>
                        </li>
                        <li>
                            <a href="<?=base_url()?>"><i class="fa fa-home fa-fw"></i> Dashboard</a>
                        </li>
                        <?php if($this->session->userdata('role') == 'admin'): ?>
                            <li>
                                <a href="#"><i class="fa fa-user fa-fw"></i> Administrator<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li> <a href="<?=base_url('admin/user_list')?>">&raquo; User List</a> </li>
                                    <li> <a href="<?=base_url('admin/activity_log')?>">&raquo; Activity Log</a> </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> Record consumer data<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li> <a href="<?=base_url('customer/customer_list')?>">&raquo; Customer data</a> </li>
                                <li> <a href="<?=base_url('customer/customer_visit_record')?>">&raquo; Record of visit</a> </li>
                            </ul>
                        </li>
                        <li> 
                            <a href="<?=base_url('customer/customer_health_record')?>"><i class="fa fa-cutlery" aria-hidden="true"></i> Record of health data</a> </li>
                        <li>
                            <a href="<?=base_url('nutritionplan/nutrition_plan_view')?>"><i class="fa fa-cutlery fa-fw"></i> Nutrition plan</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> Exercise plan</a>
                        </li>
                        <li>
                            <a href="<?=base_url('customer/reports')?>"><i class="fa fa-user fa-fw"></i> Reports</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>