
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

                <div class="col-lg-6">
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <div id="donutchart"></div>
                    <script type="text/javascript">
                      google.charts.load("current", {packages:["corechart"]});
                      google.charts.setOnLoadCallback(drawChart);
                      function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                          ['User Group', 'No of User'],
                          ['Administrator', 8],
                          ['Dietitian', 4],
                        ]);


                        var options = {
                          title: 'User Group',
                          pieHole: 0.4,
                          backgroundColor: '#f1f8e9',
                                width:550,
                                height:400
                        };

                        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                        chart.draw(data, options);
                      }
                    </script>
                 </div>    

                <!-- <div class="col-lg-6">
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <div id="piechart"></div>
                    <script type="text/javascript">
                      // Load google charts
                      google.charts.load('current', {'packages':['corechart']});
                      google.charts.setOnLoadCallback(drawChart);

                      // Draw the chart and set the chart values
                      function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                          ['User Group', 'No of User'],
                          ['Administrator', 8],
                          ['Dietitian', 4],
                        ]);

                        // Optional; add a title and set the width and height of the chart
                        var options = {'title':'User Group',backgroundColor: '#f1f8e9', 'width':550, 'height':400};

                        // Display the chart inside the <div> element with id="piechart"
                        var chart = new google.visualization.BarChart(document.getElementById('piechart'));
                        chart.draw(data, options);
                      }
                    </script>
                </div> -->
                <div class="col-lg-6">
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <div id="chart_div"></div>

                    <script type="text/javascript">
                        google.charts.load('current', {packages: ['corechart', 'line']});
                        google.charts.setOnLoadCallback(drawBackgroundColor);

                        function drawBackgroundColor() {
                              var data = new google.visualization.DataTable();
                              data.addColumn('number', 'X');
                              data.addColumn('number', 'Activity');

                              data.addRows([
                                [0, 0],   [1, 10],  [2, 23],  [3, 17],  [4, 18],  [5, 9],
                                [6, 11],  [7, 27],  [8, 33],  [9, 40],  [10, 32], [11, 35],
                                [12, 30], [13, 40], [14, 42], [15, 47], [16, 44], [17, 48],
                                [18, 52], [19, 54], [20, 42], [21, 55], [22, 56], [23, 57],
                                [24, 60], [25, 50], [26, 52], [27, 51], [28, 49], [29, 53],
                                [30, 55]
                              ]);

                              var options = {
                                hAxis: {
                                  title: 'Day'
                                },
                                vAxis: {
                                  title: 'Activity'
                                },
                                backgroundColor: '#f1f8e9',
                                width:550,
                                height:400
                              };

                              var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
                              chart.draw(data, options);
                            }
                    </script>


                </div>

                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- wrapper -->




