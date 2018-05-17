
        <div id="page-wrapper">
            <?php if($this->session->flashdata('success')):?>
                &nbsp;<div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong><?php echo $this->session->flashdata('success'); ?></strong>
                </div>
            <?php elseif($this->session->flashdata('error')):?>
                &nbsp;<div class="alert alert-warning">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong><?php echo $this->session->flashdata('error'); ?></strong>
                </div>
            <?php endif;?>
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Dashboard</h3>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <a href="<?=base_url('admin/user_list')?>/" class="btn btn-lilac btn-lg" role="button"><i class="fa fa-user glyphsize"></i> <br/>User List</a>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <a href="<?=base_url('admin/activity_log')?>/" class="btn btn-lilac btn-lg" role="button"><i class="glyphicon glyphicon-user glyphsize"></i> <br/>Activity Log</a>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- wrapper -->




