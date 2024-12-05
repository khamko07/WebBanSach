<?php
include 'header.php';
date_default_timezone_set('Asia/Ho_Chi_Minh');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="thongke.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body>
    <div class="main-content">
        <h1>Danh Sách Thống kê </h1>

                <div id="chart_div" style="width: 100%; height: 500px;"></div>
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script type="text/javascript">
                    google.charts.load('current', {
                        'packages': ['corechart']
                    });
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = new google.visualization.DataTable();
                        data.addColumn('string', 'Month');
                        data.addColumn('number', 'Doanh thu');

                        // Đoạn mã PHP để lấy dữ liệu từ truy vấn SQL
                        <?php
                        // Truy vấn SQL để lấy doanh thu theo tháng
                        $currentMonth = date('m');
                        $currentYear = date('Y');
                        $query = "SELECT MONTH(created_time) AS month, SUM(total) AS monthly_revenue
                      FROM orders
                      WHERE YEAR(created_time) = $currentYear
                      GROUP BY MONTH(created_time)";

                        $results = mysqli_query($data, $query);
                        ?>

                        <?php while ($row = mysqli_fetch_array($results)) { ?>
                            data.addRow(['<?= $row['month'] ?>', <?= $row['monthly_revenue'] ?>]);
                        <?php } ?>

                        var options = {
                            title: 'DOANH THU THEO THÁNG',
                            curveType: 'function',
                            legend: {
                                position: 'bottom'
                            }
                        };

                        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
                        chart.draw(data, options);
                    }
                </script>

            </div>
        </div>
    </div>


























</body>

</html>