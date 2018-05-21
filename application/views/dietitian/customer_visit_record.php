

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><?=$title?></h3>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <?php if($this->session->flashdata('success')):?>
                <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong><?php echo $this->session->flashdata('success'); ?></strong>
                </div>
            <?php elseif($this->session->flashdata('error')):?>
                <div class="alert alert-warning">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong><?php echo $this->session->flashdata('error'); ?></strong>
                </div>
            <?php endif;?>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>First Name</label> &nbsp;&nbsp;
                        <label class="error" id="error_name"> field is required.</label>
                        <label class="error" id="error_name2"> first name must be alphanumeric.</label>
                        <input class="form-control" id="name" placeholder="First Name" name="name" type="text" autofocus>
                    </div> 
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Last Name</label> &nbsp;&nbsp;
                        <label class="error" id="error_lname"> field is required.</label>
                        <label class="error" id="error_lname2"> last name must be alphanumeric.</label>
                        <input class="form-control" id="lname" placeholder="Last Name" name="lname" type="text" autofocus>
                    </div> 
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Date of Birth</label> &nbsp;&nbsp;
                        <label class="error" id="error_dob"> field is required.</label>
                        <label class="error" id="error_dob2"> date of birth must be in dd/mm/yyyy.</label>
                        <label class="error" id="error_dob3"> invalid value for day.</label>
                        <label class="error" id="error_dob4"> invalid value for month.</label>
                        <input class="form-control" id="dob" placeholder="DOB" name="dob" type="text" autofocus>
                    </div> 
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Phone</label> &nbsp;&nbsp;
                        <label class="error" id="error_phone"> field is required.</label>
                        <label class="error" id="error_phone2"> phone must be alphanumeric.</label>
                        <input class="form-control" id="phone" placeholder="Phone" name="phone" type="text" autofocus>
                    </div> 
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Email</label> &nbsp;&nbsp;
                        <label class="error" id="error_email"> field is required.</label>
                        <label class="error" id="error_email2"> email has already exist.</label>
                        <label class="error" id="error_email3"> invalid email adress.</label>
                        <input class="form-control" id="email" placeholder="E-mail" name="email" type="email" autofocus>
                    </div> 
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label>Address</label> &nbsp;&nbsp;
                        <label class="error" id="error_address"> field is required.</label>
                        <label class="error" id="error_address2"> address must be alphanumeric.</label>
                        <input class="form-control" id="address" placeholder="Address" name="address" type="text" autofocus>
                    </div> 
                </div>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button id="newCustomerSubmit" type="button" class="btn btn-primary">Submit</button>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>



       
        <!-- /#page-wrapper -->
        <?php $this->load->view('template/footer_view')?>
        <script src="<?=base_url()?>assets/js/view/consumer_visit_record.js"></script>