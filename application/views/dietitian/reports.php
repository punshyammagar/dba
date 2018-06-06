

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
                            <?php foreach($latest_health_record  as $row): ?>
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
                                    <a class="btn btn-primary" id="health-data-edit"  onclick="edit_health_data_popup('<?=$row->healthdata_id?>','<?=$row->customer_id?>','<?=$row->weight?>','<?=$row->height?>','<?=$row->age?>','<?=$row->waist?>','<?=$row->glucose_level?>','<?=$row->blood_pressure?>','<?=$row->dyslipidemia_level?>');" data-toggle="modal" data-target="#analyzeHealthData"> Analyze Data </a>
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


        <div class="modal fade" id="analyzeHealthData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-blue">
                        <button type="button" id="analyseclose" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">ANALYSIS OF HEALTH RECORD</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden"  id="edit-healthdata-id" value=""/>
                        <input type="hidden"  id="edit-customer-id" value=""/>
                        <div class="row">
                          <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Current Smoker?</label> &nbsp;&nbsp;
                                    <label class="error" id="error_smoker"> field is required.</label>
                                    <label class="error" id="error_smoker2"> weight must be numeric.</label>
                                    <input class="form-control" id="smoker" placeholder="Yes/No" name="smoker" type="text" autofocus>
                                </div> 
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Physical Activity?</label> &nbsp;&nbsp;
                                    <label class="error" id="error_pa"> field is required.</label>
                                    <label class="error" id="error_pa2"> weight must be numeric.</label>
                                    <input class="form-control" id="pa" placeholder="Yes/No" name="pa" type="text" autofocus>
                                </div> 
                            </div>
                            <div class="modal-footer">
                              <button id="additionalHealthDataSubmit" type="button" class="btn btn-primary">ANALYZE</button>
                            </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label>Variable</label>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label></label>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label></label>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label>Points</label>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label>Age</label>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label id="agec1">25-34</label><br>
                            <label id="agec2">35-44</label><br>
                            <label id="agec3">45-54</label><br>
                            <label id="agec4">55-64</label><br>
                            <label id="agec5">>=65</label>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label id="agesc0">0</label><br>
                            <label id="agesc2">2</label><br>
                            <label id="agesc4">4</label><br>
                            <label id="agesc6">6</label><br>
                            <label id="agesc8">8</label>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label id="ages0">0</label><br>
                            <label id="ages2">2</label><br>
                            <label id="ages4">4</label><br>
                            <label id="ages6">6</label><br>
                            <label id="ages8">8</label>
                          </div>
                        </div>
                      </div>
                      <!-- <hr>
                      <div class="row">
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label>Sex</label>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label>Female</label><br>
                            <label>Male</label>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label>0</label><br>
                            <label>3</label>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label>0</label><br>
                            <label>3</label>
                          </div>
                        </div>
                      </div> -->
                      <hr>
                      <div class="row">
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label>Current Smoker</label>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label id="csNo">No</label><br>
                            <label id="csYes">Yes</label>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label id="cssc0">0</label><br>
                            <label id="cssc2">2</label>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label id="css0">0</label><br>
                            <label id="css2">2</label>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label>Physical Activity</label>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label id="paNo">No</label><br>
                            <label id="paYes">Yes</label>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label id="pasc2">2</label><br>
                            <label id="pasc0">0</label>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label id="pas2">2</label><br>
                            <label id="pas0">0</label>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label>High Glucose Level</label>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label id="glNo">No</label><br>
                            <label id="glYes">Yes</label>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label id="glsc0">0</label><br>
                            <label id="glsc2">2</label>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label id="gls0">0</label><br>
                            <label id="gls2">2</label>
                          </div>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label>Waist</label>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label id="waistc1"><40</label><br>
                            <label id="waistc2">>=40 & 43>=</label><br>
                            <label id="waistc3">>43</label>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label id="waistsc0">0</label><br>
                            <label id="waistsc4">4</label><br>
                            <label id="waistsc7">7</label>
                          </div>
                        </div>
                        <div class="col-lg-3">
                          <div class="form-group">
                            <label id="waists0">0</label><br>
                            <label id="waists4">4</label><br>
                            <label id="waists7">7</label>
                          </div>
                        </div>
                      </div>
                      <hr>

                      <!-- Result Suggestions -->

                      <div class="row">
                        <div class="col-lg-4" id="low_medium" style="visibility: hidden;">
                          <div class="form-group">
                            <label>You have scored <label id="num6">6</label> points, which means you are at low risk of developing type 2 diabetes within 5 years. It is important you continue to maintain a healthy lifestyle.</label>
                          </div>
                        </div>
                        <div class="col-lg-4" id="medium_high" style="visibility: hidden;">
                          <div class="form-group">
                            <label>You have scored <label id="num11">11</label> points which is putting you at an increased risk of diabetes. Improving your lifestyle may help reduce your risk of developing type 2 diabetes.</label>
                          </div>
                        </div>
                        <div class="col-lg-4" id="high_very_high" style="visibility: hidden;">
                          <div class="form-group">
                            <label>You have scored <label id="num22">22</label> points putting you at high risk of developing diabetes. See your doctor about having a fasting blood glucose test. Act now to prevent type 2 diabetes.</label>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-4" id="rp1">
                          <div class="form-group">
                            <label>Risk Profile</label>
                          </div>
                        </div>
                        <div class="col-lg-4" id="rp2">
                          <div class="form-group">
                            <label>Risk Profile</label>
                          </div>
                        </div>
                        <div class="col-lg-4" id="rp3">
                          <div class="form-group">
                            <label>Risk Profile</label>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-2" id="rplm">
                          <div class="form-group">
                            <label>Low</label>
                          </div>
                        </div>
                        <div class="col-lg-2" id="rpml">
                          <div class="form-group">
                            <label>Moderate</label>
                          </div>
                        </div>
                        <div class="col-lg-2" id="rpmh">
                          <div class="form-group">
                            <label>Moderate</label>
                          </div>
                        </div>
                        <div class="col-lg-2" id="rphm">
                          <div class="form-group">
                            <label>High</label>
                          </div>
                        </div>
                        <div class="col-lg-2" id="rphh">
                          <div class="form-group">
                            <label>High</label>
                          </div>
                        </div>
                        <div class="col-lg-2" id="rpvh">
                          <div class="form-group">
                            <label>Very High</label>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-lg-2" id="rp05">
                          <div class="form-group">
                            <label>0 - 5 Approx one person in every 100 will develop diabetes.</label>
                          </div>
                        </div>
                        <div class="col-lg-2" id="rp68">
                          <div class="form-group">
                            <label>6 - 8 Approx one person in every 50 will develop diabetes.</label>
                          </div>
                        </div>
                        <div class="col-lg-2" id="rp911">
                          <div class="form-group">
                            <label>9 - 11 Approx one person in every 30 will develop diabetes.</label>
                          </div>
                        </div>
                        <div class="col-lg-2" id="rp1215">
                          <div class="form-group">
                            <label>12 - 15 Approx one person in every 14 will develop diabetes.</label>
                          </div>
                        </div>
                        <div class="col-lg-2" id="rp1619">
                          <div class="form-group">
                            <label>16 - 19 Approx one person in every 7 will develop diabetes.</label>
                          </div>
                        </div>
                        <div class="col-lg-2" id="rp20">
                          <div class="form-group">
                            <label>20+ Approx one person in every 3 will develop diabetes.</label>
                          </div>
                        </div>
                      </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" id="analysecancel" class="btn btn-default" data-dismiss="modal">CANCEL</button>
                        <button id="printReportSubmit" type="button" class="btn btn-primary">PRINT</button>
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
        <script src="<?=base_url()?>assets/js/view/reports.js"></script>