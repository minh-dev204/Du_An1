<?php
include "header.php";
?>

<div class="tieuDe">
    <h1>Biểu Đồ Thống Kê</h1>
</div>

<div id="piechart_3d" style="width:988px; height:500px; margin-left:35px"></div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load("current",{packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Loại', 'Số Lượng'],
            <?php 
            foreach ($list_thongke as $item) {
                echo "['$item[tendm]', $item[so_luong]],";
            }
            ?>
        ]);

        var options = {
            title: 'Tỷ lệ hàng hóa',
            is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
    }
</script>


</aside>


<?php
include "footer.php";
?>