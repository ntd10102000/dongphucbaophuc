<?php $title = "Dashbroad"; ?>
<?php include './admin_header.php'; ?>
<?php include './admin_side-menu.php'; ?>
<?php

$dataPoints = getRevenue("day");
?>
<h2 class="text-center display-5 mb-4 font-weight-bold">THỐNG KÊ BÁN HÀNG THEO NGÀY</h2>
<div class="row">
    <div class="col-2  m-auto">
        <div class="d-flex justify-content-between flex-column">
            <a href="./admin_dashbroad.php?option=day" class="fw-bold btn btn-primary">Theo ngày</a>
            <a href="./admin_dashbroad.php?option=month" class="fw-bold btn btn-secondary">Theo tháng</a>
            <a href="./admin_dashbroad.php?option=quarter" class="fw-bold btn btn-warning">Theo quý</a>
            <a href="./admin_dashbroad.php?option=year" class="fw-bold btn btn-success">Theo năm</a>
        </div>
    </div>
    <div class="col-10">
        <div class=" mt-6">
            <div class="container w-75 my-auto mx-auto my-5" id="chartRevenue" style="height: 370px; width: 100%;"></div>
        </div>
    </div>
</div>

<script>
    window.onload = function() {

        var chart = new CanvasJS.Chart("chartRevenue", {
            animationEnabled: true,

            title: {
                text: "Doanh thu bán hàng"
            },
            axisX: {
                crosshair: {
                    enabled: true,
                    snapToDataPoint: true
                }
            },
            axisY: {
                includeZero: true,
                crosshair: {
                    enabled: true,
                    snapToDataPoint: true,

                },
                suffix: "VNĐ"
            },
            toolTip: {
                enabled: false
            },
            data: [{
                type: "area",
                xValueType: "dateTime",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();

    }
</script>
<?php include './admin_footer.php'; ?>