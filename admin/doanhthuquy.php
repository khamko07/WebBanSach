<?php
include 'header.php';
date_default_timezone_set('Asia/Ho_Chi_Minh');

$currentYear = date('Y');
$selectedYear = isset($_GET['year']) ? $_GET['year'] : $currentYear;

// Lấy doanh thu theo từng quý của năm được chọn
$revenues = array();

for ($quarter = 1; $quarter <= 4; $quarter++) {
    $startMonth = ($quarter - 1) * 3 + 1;
    $endMonth = $startMonth + 2;

    $query = "SELECT SUM(total) AS quarterly_revenue
              FROM orders
              WHERE MONTH(created_time) BETWEEN $startMonth AND $endMonth AND YEAR(created_time) = $selectedYear";

    $result = mysqli_query($data, $query);
    $row = mysqli_fetch_assoc($result);

    // Lưu tổng doanh thu vào mảng theo từng quý
    $revenues["Quarter $quarter"] = $row['quarterly_revenue'] ?? 0;}




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
        <form action="" method="GET">
    <label for="year">Chọn năm:</label>
    <select name="year" id="year">
        <?php
        // Tạo danh sách các năm từ 2010 đến năm hiện tại
        $startYear = 2010;
        $currentYear = date('Y');
        for ($year = $startYear; $year <= $currentYear; $year++) {
            echo "<option value='$year' " . ($selectedYear == $year ? 'selected' : '') . ">$year</option>";
        }
        ?>
    </select>
    <input type="submit" value="Xem">
</form><br>


                <div id="chart_div" style="width: 900px; height: 500px;"></div>
  <script type="text/javascript">
      google.charts.load('current', { packages: ['corechart', 'bar'] });
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
          var data = google.visualization.arrayToDataTable([
              ['Quý', 'Doanh thu'],
              ['Quý 1', <?= $revenues['Quarter 1'] ?>],
              ['Quý 2', <?= $revenues['Quarter 2'] ?>],
              ['Quý 3', <?= $revenues['Quarter 3'] ?>],
              ['Quý 4', <?= $revenues['Quarter 4'] ?>]
          ]);
          var options = {
              title: 'Doanh thu theo từng quý trong năm <?= $selectedYear ?>',
              legend: { position: 'none' },
              chart: { title: 'Doanh thu theo từng quý trong năm <?= $selectedYear ?>' },
              bars: 'vertical',
              vAxis: { format: 'decimal' }
          };
          var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
          chart.draw(data, options);
      }
  </script>






            </div>
        </div>
    </div>
</body>
</html>