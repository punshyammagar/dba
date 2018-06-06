

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
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>DOB</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($customers  as $row): ?>
                            <tr>
                                <td><?php echo $row->first_name; ?></td>
                                <td><?php echo $row->last_name; ?></td>
                                <td><?php echo $row->dob; ?></td>
                                <td><?php echo $row->phone; ?></td>    
                                <td><?php echo $row->email; ?></td>
                                <td><?php echo $row->address; ?></td>  
                                <td>
                                    <a class="btn btn-primary" style="margin-bottom: 2px;" id="health-data-add" onclick="add_health_data_popup('<?=$row->customer_id?>');" data-toggle="modal" data-target="#addHealthData"> ADD HEALTH DATA </a>
                                    <a class="btn btn-primary" style="margin-bottom: 2px;" id="nutrition-plan-add" onclick="add_nutrition_plan_popup('<?=$row->customer_id?>');" data-toggle="modal" data-target="#addNutritionPlan"> ADD NUTRITION PLAN </a>
                                    <a class="btn btn-primary" id="exercise-plan-add" onclick="add_exercise_plan_popup('<?=$row->customer_id?>');" data-toggle="modal" data-target="#addExercisePlan"> ADD EXERCISE PLAN </a>
                                    <a class="btn btn-primary" id="customer-edit"  onclick="edit_customer_popup('<?=$row->customer_id?>','<?=$row->dietitian_id?>','<?=$row->first_name?>','<?=$row->last_name?>','<?=$row->dob?>','<?=$row->phone?>','<?=$row->email?>','<?=$row->address?>');" data-toggle="modal" data-target="#editCustomerData"> EDIT CUSTOMER DATA </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            
                        </tbody>
                    </table>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>


        <div class="modal fade" id="addHealthData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-blue">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">ADD HEALTH DATA</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden"  id="health-data_customer-id" value=""/>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Weight</label> &nbsp;&nbsp;
                                    <label class="error" id="error_weight"> field is required.</label>
                                    <label class="error" id="error_weight2"> weight must be numeric.</label>
                                    <input class="form-control" id="weight" placeholder="Weight" name="weight" type="text" autofocus>
                                </div> 
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Height</label> &nbsp;&nbsp;
                                    <label class="error" id="error_height"> field is required.</label>
                                    <label class="error" id="error_height2"> height must be numeric.</label>
                                    <input class="form-control" id="height" placeholder="Height" name="height" type="text" autofocus>
                                </div> 
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Age</label> &nbsp;&nbsp;
                                    <label class="error" id="error_age"> field is required.</label>
                                    <label class="error" id="error_age2"> age must be numeric.</label>
                                    <input class="form-control" id="age" placeholder="Age" name="age" type="text" autofocus>
                                </div> 
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Waist</label> &nbsp;&nbsp;
                                    <label class="error" id="error_waist"> field is required.</label>
                                    <label class="error" id="error_waist2"> waist must be numeric.</label>
                                    <input class="form-control" id="waist" placeholder="Waist" name="waist" type="text" autofocus>
                                </div> 
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Glucose Level</label> &nbsp;&nbsp;
                                    <label class="error" id="error_gl"> field is required.</label>
                                    <label class="error" id="error_gl2"> glucose level must be numeric.</label>
                                    <input class="form-control" id="gl" placeholder="Glucose Level" name="gl" type="text" autofocus>
                                </div> 
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Blood Pressure</label> &nbsp;&nbsp;
                                    <label class="error" id="error_bp"> field is required.</label>
                                    <label class="error" id="error_bp2"> blood pressure must be numeric.</label>
                                    <input class="form-control" id="bp" placeholder="Blood Pressure" name="bp" type="text" autofocus>
                                </div> 
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Dyslipidemia Level</label> &nbsp;&nbsp;
                                    <label class="error" id="error_dl"> field is required.</label>
                                    <label class="error" id="error_dl2"> dyslipidemia level must be numeric.</label>
                                    <input class="form-control" id="dl" placeholder="Dyslipidemia Level" name="dl" type="text" autofocus>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
                        <button id="newHealthDataSubmit" type="button" class="btn btn-primary">ADD</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


        <div class="modal fade" id="addNutritionPlan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-blue">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">ADD NUTRITION PLAN</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden"  id="nutrition-plan_customer-id" value=""/>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Food</label> &nbsp;&nbsp;
                                    <label class="error" id="error_food"> field is required.</label>
                                    <label class="error" id="error_food2"> food must be alphanumeric.</label>
                                    <input class="form-control" id="food" placeholder="Food" name="food" type="text" autofocus>
                                </div> 
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Amount</label> &nbsp;&nbsp;
                                    <label class="error" id="error_amount"> field is required.</label>
                                    <label class="error" id="error_amount2"> amount must be alphanumeric.</label>
                                    <input class="form-control" id="amount" placeholder="Amount" name="amount" type="text" autofocus>
                                </div> 
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Start Date</label> &nbsp;&nbsp;
                                    <label class="error" id="error_sd"> field is required.</label>
                                    <label class="error" id="error_sd2"> start date must be in dd/mm/yyyy.</label>
                                    <label class="error" id="error_sd3"> invalid value for day.</label>
                                    <label class="error" id="error_sd4"> invalid value for month.</label>
                                    <input class="form-control" id="sd" placeholder="Start Date" name="sd" type="text" autofocus>
                                </div> 
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>End Date</label> &nbsp;&nbsp;
                                    <label class="error" id="error_ed"> field is required.</label>
                                    <label class="error" id="error_ed2"> end date must be in dd/mm/yyyy.</label>
                                    <label class="error" id="error_ed3"> invalid value for day.</label>
                                    <label class="error" id="error_ed4"> invalid value for month.</label>
                                    <input class="form-control" id="ed" placeholder="End Date" name="ed" type="text" autofocus>
                                </div> 
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Description</label> &nbsp;&nbsp;
                                    <label class="error" id="error_description"> field is required.</label>
                                    <label class="error" id="error_description2"> description must be alphanumeric.</label>
                                    <input class="form-control" id="description" placeholder="Description" name="description" type="text" autofocus>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
                        <button id="newNutritionPlanSubmit" type="button" class="btn btn-primary">ADD</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


        <div class="modal fade" id="addExercisePlan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-blue">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">ADD EXERCISE PLAN</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden"  id="exercise-plan_customer-id" value=""/>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Exercise Name</label> &nbsp;&nbsp;
                                    <label class="error" id="error_ename"> field is required.</label>
                                    <label class="error" id="error_ename2"> exercise name must be alphanumeric.</label>
                                    <input class="form-control" id="ename" placeholder="Exercise Name" name="ename" type="text" autofocus>
                                </div> 
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Frequency</label> &nbsp;&nbsp;
                                    <label class="error" id="error_frequency"> field is required.</label>
                                    <label class="error" id="error_frequency2"> frequency must be alphanumeric.</label>
                                    <input class="form-control" id="frequency" placeholder="Frequency" name="frequency" type="text" autofocus>
                                </div> 
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Start Date</label> &nbsp;&nbsp;
                                    <label class="error" id="error_esd"> field is required.</label>
                                    <label class="error" id="error_esd2"> start date must be in dd/mm/yyyy.</label>
                                    <label class="error" id="error_esd3"> invalid value for day.</label>
                                    <label class="error" id="error_esd4"> invalid value for month.</label>
                                    <input class="form-control" id="esd" placeholder="Start Date" name="esd" type="text" autofocus>
                                </div> 
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>End Date</label> &nbsp;&nbsp;
                                    <label class="error" id="error_eed"> field is required.</label>
                                    <label class="error" id="error_eed2"> end date must be in dd/mm/yyyy.</label>
                                    <label class="error" id="error_eed3"> invalid value for day.</label>
                                    <label class="error" id="error_eed4"> invalid value for month.</label>
                                    <input class="form-control" id="eed" placeholder="End Date" name="eed" type="text" autofocus>
                                </div> 
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Description</label> &nbsp;&nbsp;
                                    <label class="error" id="error_edescription"> field is required.</label>
                                    <label class="error" id="error_edescription2"> description must be alphanumeric.</label>
                                    <input class="form-control" id="edescription" placeholder="Description" name="edescription" type="text" autofocus>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
                        <button id="newExercisePlanSubmit" type="button" class="btn btn-primary">ADD</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->


        <div class="modal fade" id="editCustomerData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-blue">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">UPDATE CUSTOMER DETAILS</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden"  id="edit-customer-id" value=""/>
                        <input type="hidden"  id="edit-dietitian-id" value=""/>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>First Name</label> &nbsp;&nbsp;
                                    <label class="error" id="error-edit_name"> field is required.</label>
                                    <label class="error" id="error-edit_name2"> first name must be alphanumeric.</label>
                                    <input class="form-control" id="edit-name" placeholder="First Name" name="name" type="text" autofocus>
                                </div> 
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Last Name</label> &nbsp;&nbsp;
                                    <label class="error" id="error-edit_lname"> field is required.</label>
                                    <label class="error" id="error-edit_lname2"> last name must be alphanumeric.</label>
                                    <input class="form-control" id="edit-lname" placeholder="Last Name" name="lname" type="text" autofocus>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Date of Birth</label> &nbsp;&nbsp;
                                    <label class="error" id="error-edit_dob"> field is required.</label>
                                    <label class="error" id="error-edit_dob2"> date of birth must be in dd/mm/yyyy.</label>
                                    <label class="error" id="error-edit_dob3"> invalid value for day.</label>
                                    <label class="error" id="error-edit_dob4"> invalid value for month.</label>
                                    <input class="form-control" id="edit-dob" placeholder="DOB" name="dob" type="text" autofocus>
                                </div> 
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Phone</label> &nbsp;&nbsp;
                                    <label class="error" id="error-edit_phone"> field is required.</label>
                                    <label class="error" id="error-edit_phone2"> phone must be alphanumeric.</label>
                                    <input class="form-control" id="edit-phone" placeholder="Phone" name="phone" type="text" autofocus>
                                </div> 
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Email</label> &nbsp;&nbsp;
                                    <label class="error" id="error-edit_email"> field is required.</label>
                                    <label class="error" id="error-edit_email2"> email has already exist.</label>
                                    <label class="error" id="error-edit_email3"> invalid email adress.</label>
                                    <input class="form-control" id="edit-email" placeholder="E-mail" name="email" type="email" autofocus>
                                </div> 
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Address</label> &nbsp;&nbsp;
                                    <label class="error" id="error-edit_address"> field is required.</label>
                                    <label class="error" id="error-edit_address2"> address must be alphanumeric.</label>
                                    <input class="form-control" id="edit-address" placeholder="Address" name="address" type="text" autofocus>
                                </div> 
                            </div>
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
                            <button id="editCustomerSubmit" type="button" class="btn btn-primary">UPDATE</button>
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
        <script src="<?=base_url()?>assets/js/view/health_data.js"></script>
        <script src="<?=base_url()?>assets/js/view/nutrition_plan.js"></script>
        <script src="<?=base_url()?>assets/js/view/exercise_plan.js"></script>