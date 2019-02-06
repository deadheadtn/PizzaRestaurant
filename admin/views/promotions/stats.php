<?php 
require_once("connection.php");
$db = Db::getInstance();
$produit_in_promo=$db->query("select count(*) from produit where id_produit IN (SELECT id_prod FROM promotion)");
$produit=$db->query("select count(*) from produit where id_produit NOT IN (SELECT id_prod FROM promotion)");
?>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['produits en promotion',    <?php  while($var = $produit_in_promo->fetch())  {echo "".$var["count(*)"]."";}?>],
          ['autre produit',      <?php  while($var = $produit->fetch()) {echo "".$var["count(*)"]."";}?>]
          
        ]);

        var options = {
          title: 'Produits et promotions '
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

    <div id="piechart" style="width: 900px; height: 500px;"></div>