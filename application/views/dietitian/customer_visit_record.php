

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
                                <label>Name</label> &nbsp;&nbsp;
                                <label class="error" id="error_name"> field is required.</label>
                                <label class="error" id="error_name2"> name must be alphanumeric.</label>
                                <input class="form-control" id="name" placeholder="Name" name="name" type="text" autofocus>
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
                                <label>Age</label> &nbsp;&nbsp;
                               
                                <input class="form-control" id="email" placeholder="Age" name="email" type="email" autofocus>
                            </div> 
                </div>
                <div class="col-lg-6">
                            <div class="form-group">
                                <label>Height</label> &nbsp;&nbsp;
                     
                                <input class="form-control" id="email" placeholder="Height" name="email" type="email" autofocus>
                            </div> 
                </div>
                <button type="button" class="btn btn-default" data-dismiss="modal">Submit</button>
                        <button id="editUserSubmit" type="button" class="btn btn-primary">Cancel</button>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>



       
        <!-- /#page-wrapper -->
        <?php $this->load->view('template/footer_view')?>
        <script src="<?=base_url()?>assets/js/view/user_list.js"></script>