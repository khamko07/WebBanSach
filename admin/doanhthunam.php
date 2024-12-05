<?php
include 'header.php';
date_default_timezone_set('Asia/Ho_Chi_Minh');

$currentYear = date('Y');
$startYear = $currentYear - 5; // Bắt đầu từ 5 năm trước
$endYear = $currentYear;

$revenues = array();

for ($year = $startYear; $year <= $endYear; $year++) {
    $totalRevenue = 0;

    for ($quarter = 1; $quarter <= 4; $quarter++) {
        $startMonth = ($quarter - 1) * 3 + 1;
        $endMonth = $startMonth + 2;

        $query = "SELECT SUM(total) AS quarterly_revenue
                  FROM orders
                  WHERE MONTH(created_time) BETWEEN $startMonth AND $endMonth AND YEAR(created_time) = $year";

        $result = mysqli_query($data, $query);
        $row = mysqli_fetch_assoc($result);

        $totalRevenue += $row['quarterly_revenue'] ?? 0;
    }

    $revenues["Year $year"] = $totalRevenue;
}





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
        <h1>Danh Sách Thống kê </h1><br>
    <div id="chart_div" style="width: 900px; height: 500px;"></div>

    <script type="text/javascript">
        google.charts.load('current', { packages: ['corechart', 'bar'] });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Năm', 'Doanh thu'],
                <?php foreach ($revenues as $year => $revenue) { ?>
                    ['<?= $year ?>', <?= $revenue ?>],
                <?php } ?>
            ]);

            var options = {
                title: 'Doanh thu qua các năm',
                legend: { position: 'none' },
                chart: { title: 'Doanh thu qua các năm' },
                bars: 'vertical',
                vAxis: { format: 'decimal' }
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
</body>

</html>
