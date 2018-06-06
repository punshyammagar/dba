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
                                <th>Exercise name</th>
                                <th>Frequency</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Description</th>        
                                <!-- <th>&nbsp;</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($exercise_plan  as $row): ?>
                            <tr>
                                <td><?php echo $row->first_name; ?></td>
                                <td><?php echo $row->last_name; ?></td>
                                <td><?php echo $row->dob; ?></td>
                                <td><?php echo $row->phone; ?></td>    
                                <td><?php echo $row->exercise_name; ?></td>
                                <td><?php echo $row->frequency; ?></td>  
                                <td><?php echo $row->start_date; ?></td>  
                                <td><?php echo $row->end_date; ?></td>  
                                <td><?php echo $row->description; ?></td>
                               <!--  <td>
                                    <a class="btn btn-primary" id="health-data-add"  onclick="edit_user_popup('<?=$row->email?>','<?=$row->customer_id?>','<?=$row->first_name?>');" data-toggle="modal" data-target="#newHealthDataSubmit"> Add Health Data </a>
                                    <a class="btn btn-primary" id="health-data-edit"  onclick="edit_user_popup('<?=$row->email?>','<?=$row->customer_id?>','<?=$row->first_name?>');" data-toggle="modal" data-target="#editHealthData"> Edit Health Data </a>
                                    
                                </td> -->

                            </tr>
                            <?php endforeach; ?>
                            
                        </tbody>
                    </table>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

</div>
 <script src="<?=base_url()?>assets/js/view/consumer_visit_record.js"></script>

