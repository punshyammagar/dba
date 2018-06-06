

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
                            <?php foreach($healthrecord  as $row): ?>
                            <tr>
                                <td><?php echo $row->first_name; ?></td>
                                <td><?php echo $row->last_name; ?></td>
                                <td><?php echo $row->dob; ?></td>
                                <td><?php echo $row->phone; ?></td>    
                                <td><?php echo $row->age; ?></td>
                                <td><?php echo $row->weight; ?></td>  
                                <td><?php echo $row->height; ?></td>  
                                <td><?php echo $row->waist; ?></td>  
                                <td><?php echo $row->glucose_level; ?></td>  
                                <td><?php echo $row->blood_pressure; ?></td> 
                                <td><?php echo $row->dyslipidemia_level; ?></td>  
                                <td><?php echo $row->date; ?></td>  
                                <td>
                                    <a class="btn btn-primary" id="health-data-edit"  onclick="edit_health_data_popup('<?=$row->healthdata_id?>','<?=$row->customer_id?>','<?=$row->weight?>','<?=$row->height?>','<?=$row->age?>','<?=$row->waist?>','<?=$row->glucose_level?>','<?=$row->blood_pressure?>','<?=$row->dyslipidemia_level?>');" data-toggle="modal" data-target="#editHealthData"> Edit Health Data </a>
                                    
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
       


        <div class="modal fade" id="editHealthData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-blue">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">UPDATE HEALTH DATA</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden"  id="edit-healthdata-id" value=""/>
                        <input type="hidden"  id="edit-customer-id" value=""/>
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
        <!-- <?php $this->load->view('template/footer_view')?> -->
        <script src="<?=base_url()?>assets/js/view/health_data.js"></script>