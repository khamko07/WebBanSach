<?php
include 'header.php';
date_default_timezone_set('Asia/Ho_Chi_Minh');

$currentYear = date('Y');

// Thống kê doanh thu theo tháng
$queryMonthly = "SELECT MONTH(created_time) AS month, SUM(total) AS monthly_revenue
                 FROM orders
                 WHERE YEAR(created_time) = $currentYear
                 GROUP BY MONTH(created_time)";
$resultsMonthly = mysqli_query($data, $queryMonthly);

// Thống kê doanh thu theo năm
$queryYearly = "SELECT YEAR(created_time) AS year, SUM(total) AS yearly_revenue
                FROM orders
                GROUP BY YEAR(created_time)";
$resultsYearly = mysqli_query($data, $queryYearly);

// Thống kê doanh thu theo quý
$queryQuarterly = "SELECT QUARTER(created_time) AS quarter, SUM(total) AS quarterly_revenue
                   FROM orders
                   WHERE YEAR(created_time) = $currentYear
                   GROUP BY QUARTER(created_time)";
$resultsQuarterly = mysqli_query($data, $queryQuarterly);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Thống kê doanh thu</title>
    <style>
        table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

/* Style cho tiêu đề cột */
table th {
    background-color: #f2f2f2;
    text-align: left;
    padding: 8px;
}

/* Style cho hàng lẻ */
table tbody tr:nth-child(odd) {
    background-color: #f9f9f9;
}

/* Style cho hàng chẵn */
table tbody tr:nth-child(even) {
    background-color: #ffffff;
}

/* Style cho cả bảng */
table td, table th {
    border: 1px solid #dddddd;
    padding: 8px;
}

/* Hover đối với hàng */
table tbody tr:hover {
    background-color: #f5f5f5;
}
    </style>
</head>

<body>
    <div class="main-content">
        <h1>Danh Sách Thống kê </h1>

        <!-- Bảng doanh thu theo tháng -->
        <h2>Doanh thu theo tháng</h2>
        <table>
            <thead>
                <tr>
                    <th>Tháng</th>
                    <th>Doanh thu</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($resultsMonthly)) { ?>
                    <tr>
                        <td><?= $row['month'] ?></td>
                        <td><?= $row['monthly_revenue'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Bảng doanh thu theo năm -->
        <h2>Doanh thu theo năm</h2>
        <table>
            <thead>
                <tr>
                    <th>Năm</th>
                    <th>Doanh thu</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($resultsYearly)) { ?>
                    <tr>
                        <td><?= $row['year'] ?></td>
                        <td><?= $row['yearly_revenue'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Bảng doanh thu theo quý -->
        <h2>Doanh thu theo quý</h2>
        <table>
            <thead>
                <tr>
                    <th>Quý</th>
                    <th>Doanh thu</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($resultsQuarterly)) { ?>
                    <tr>
                        <td><?= $row['quarter'] ?></td>
                        <td><?= $row['quarterly_revenue'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>
