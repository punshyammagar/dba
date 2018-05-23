

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
                <div class="col-lg-12">      
                    <table class="table table-striped table-bordered table-hover" id="dataTables-customer-list">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>DOB</th>
                                <th>Phone</th>
                                <th>Age</th>
                                <th>Weight</th>
                                <th>Height</th>
                                <th>Waist</th>
                                <th>Glucose</th>
                                <th>BP</th>
                                <th>Dyslipidemia</th>
                                <th>Recorded</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- <?php foreach($customers  as $row): ?> -->
                            <tr>
                                <td><?php echo $row->first_name; ?></td>
                                <td><?php echo $row->last_name; ?></td>
                                <td><?php echo $row->dob; ?></td>
                                <td><?php echo $row->phone; ?></td>    
                                <td><?php echo $row->age; ?></td>
                                <td><?php echo $row->address; ?></td>  
                                <td>
                                    <a class="btn btn-primary" id="health-data-add"  onclick="edit_user_popup('<?=$row->email?>','<?=$row->customer_id?>','<?=$row->first_name?>');" data-toggle="modal" data-target="#newHealthDataSubmit"> Add Health Data </a>
                                    <a class="btn btn-primary" id="health-data-edit"  onclick="edit_user_popup('<?=$row->email?>','<?=$row->customer_id?>','<?=$row->first_name?>');" data-toggle="modal" data-target="#editHealthData"> Edit Health Data </a>
                                    
                                </td>

                            </tr>
                            <!-- <?php endforeach; ?> -->
                            
                        </tbody>
                    </table>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>



        <!-- Modal -->
        <div class="modal fade" id="deactivateConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-red">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">DELETE CONFIRMATION</h4>
                    </div>
                    <div class="modal-body">
                        <label>You are going to delete user <label id="user-email" style="color:blue;"></label>.</label><br/>
                        <label>Click <b>Yes</b> to continue.</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <a id="deactivateYesButton" class="btn btn-danger" >Yes</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        <!-- Modal -->
        <div class="modal fade" id="resetConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-red">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">RESET CONFIRMATION</h4>
                    </div>
                    <div class="modal-body">
                        <label>You are going to reset user <label id="reset-user-email" style="color:blue;"></label>'s password.</label><br/>
                        <label>Tempolary password will be sent to this email.</label><br/>
                        <label>Click <b>Yes</b> to continue.</label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <a id="resetYesButton" class="btn btn-warning" >Yes</a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->




        <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-blue">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">CREATE NEW USER</h4>
                    </div>
                    <div class="modal-body">
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
                      </div>
                      <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Role</label>&nbsp;&nbsp;
                                    <label class="error" id="error_role"> field is required.</label>
                                    <select name="role" id="role" class="form-control" >
                                        <option value="0" selected="selected">-- SELECT ROLE --</option>
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                    </select> 
                                </div>
                            </div>
                      </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
                        <button id="newUserSubmit" type="button" class="btn btn-primary">CREATE</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


        <div class="modal fade" id="editHealthData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-blue">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">UPDATE HEALTH DATA</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden"  id="edit-health-data" value=""/>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Weight</label> &nbsp;&nbsp;
                                    <label class="error" id="edit-error_weight"> field is required.</label>
                                    <label class="error" id="edit-error_weight2"> weight must be numeric.</label>
                                    <input class="form-control" id="edit-weight" placeholder="Weight" name="edit-weight" type="text" autofocus>
                                </div> 
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Height</label> &nbsp;&nbsp;
                                    <label class="error" id="edit-error_height"> field is required.</label>
                                    <label class="error" id="edit-error_height2"> height must be numeric.</label>
                                    <input class="form-control" id="edit-height" placeholder="Height" name="edit-height" type="text" autofocus>
                                </div> 
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Age</label> &nbsp;&nbsp;
                                    <label class="error" id="edit-error_age"> field is required.</label>
                                    <label class="error" id="edit-error_age2"> age must be numeric.</label>
                                    <input class="form-control" id="edit-age" placeholder="Age" name="edit-age" type="text" autofocus>
                                </div> 
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Waist</label> &nbsp;&nbsp;
                                    <label class="error" id="edit-error_waist"> field is required.</label>
                                    <label class="error" id="edit-error_waist2"> waist must be numeric.</label>
                                    <input class="form-control" id="edit-waist" placeholder="Waist" name="edit-waist" type="text" autofocus>
                                </div> 
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Glucose Level</label> &nbsp;&nbsp;
                                    <label class="error" id="edit-error_gl"> field is required.</label>
                                    <label class="error" id="edit-error_gl2"> glucose level must be numeric.</label>
                                    <input class="form-control" id="edit-gl" placeholder="Glucose Level" name="edit-gl" type="text" autofocus>
                                </div> 
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Blood Pressure</label> &nbsp;&nbsp;
                                    <label class="error" id="edit-error_bp"> field is required.</label>
                                    <label class="error" id="edit-error_bp2"> blood pressure must be numeric.</label>
                                    <input class="form-control" id="edit-bp" placeholder="Blood Pressure" name="edit-bp" type="text" autofocus>
                                </div> 
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Dyslipidemia Level</label> &nbsp;&nbsp;
                                    <label class="error" id="edit-error_dl"> field is required.</label>
                                    <label class="error" id="edit-error_dl2"> dyslipidemia level must be numeric.</label>
                                    <input class="form-control" id="edit-dl" placeholder="Dyslipidemia Level" name="edit-dl" type="text" autofocus>
                                </div> 
                            </div>
                      </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
                        <button id="editHealthDataSubmit" type="button" class="btn btn-primary">UPDATE</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
       
        <!-- /#page-wrapper -->
        <?php $this->load->view('template/footer_view')?>
        <script src="<?=base_url()?>assets/js/view/consumer_visit_record.js"></script>