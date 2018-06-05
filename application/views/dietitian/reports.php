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
                    <div id="piechart" class="row"></div>

                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

                    <script type="text/javascript">
                      // Load google charts
                      google.charts.load('current', {'packages':['corechart']});
                      google.charts.setOnLoadCallback(drawChart);

                      // Draw the chart and set the chart values
                      function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                          ['Task', 'Hours per Day'],
                          ['Work', 8],
                          ['Eat', 2],
                          ['TV', 4],
                          ['Gym', 2],
                          ['Sleep', 8]
                        ]);

                        // Optional; add a title and set the width and height of the chart
                        var options = {'title':'My Average Day', 'width':550, 'height':400};

                        // Display the chart inside the <div> element with id="piechart"
                        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                        chart.draw(data, options);
                      }
                    </script>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>


<?php $this->load->view('template/footer_view')?>
