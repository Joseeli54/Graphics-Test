@extends('layout.app')
@section('title', 'User Statistics')

@section('content')

    <html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Pago', 'Porcentaje de Pago'],
          ['Paypal',     11],
          ['Transferencia',      2],
          ['Uphold',  2],
          ['Caja', 2],
          ['Efectivo',    7]
        ]);

        var options = {
          title: 'Porcentaje de Pagos',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Year', 'Usuarios', { role: 'style' } ],
        ['2010', 10, 'color: gray'],
        ['2020', 14, 'color: #76A7FA'],
        ['2030', 16, 'opacity: 0.2'],
        ['2040', 22, 'stroke-color: #703593; stroke-width: 4; fill-color: #C5A5CF'],
        ['2050', 28, 'stroke-color: #871B47; stroke-opacity: 0.6; stroke-width: 8; fill-color: #BC5679; fill-opacity: 0.2']
      ]);

        var options = {
          title: 'My Daily Activities',
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('columnchart'));
        chart.draw(data, options);
      }
    </script>

  </head>
  <body>
    <br>

  	<div class="card text-center">
	 <div class="card-body">
       <div id="piechart_3d" style="width: 900px; height: 400px"></div>
    </div>
    </div>
    
    <br>
    
    <div class="card text-center">
	 <div class="card-body">
       <div id="columnchart" style="width: 900px; height: 400px"></div>
    </div>
    </div>
    
    <br>
  </body>
   </html>

@endsection