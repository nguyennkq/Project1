<div id="piechart"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">

google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Loại Phòng', 'Số lượng phòng'],
  <?php
        $tongloai=count($list_stastis);
        $i=1;
        foreach ($list_stastis as $stastis) {
            extract($stastis);
            if($i==$tongloai) $dauphay=""; else $dauphay=",";
            echo "['".$stastis['tenloai']."', ".$stastis['countphong']."]".$dauphay;
            $i+=1;
        }
  ?>
]);

  var options = {'title':'BIỂU ĐỒ THỐNG KÊ PHÒNG'};

  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>