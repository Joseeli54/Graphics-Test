@extends('layout.app')
@section('title', 'User Statistics')

@section('content')

    
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Pago', 'Porcentaje'],
          @foreach($porc_pago as $porc)
          ['{{$porc->tipo_pago}}', {{$porc->count}}],
          @endforeach
        ]);

        var options = {
          title: 'Porcentaje de Metodos de Pago',
          is3D: true,
        };

        var chart = 
        new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Pedido', 'Pago', { role: 'style' } ],
        @foreach($prom_monto_pedido as $prom)
        ['{{$prom->tipo}}', {{$prom->sum}}, 'color: lightskyblue'],
        @endforeach
      ]);

        var options = {
          title: 'Pedidos por año',
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('columnchart'));
        chart.draw(data, options);
      }
    </script>

    <br>
    <div class="card text-center">
   <div class="card-body">
       <div id="piechart_3d" class="tamano-grafico"> </div>
       <div class=""> 
         
           @foreach($porc_pago as $porc)
           | <a href="#"> {{$porc->tipo_pago}}  </a> | <tr>
           @endforeach
        
        </div>
    </div>
    </div>
    
    <br>
    
    <div class="card text-center">
   <div class="card-body">
       <div id="columnchart" class="tamano-grafico"></div>
    </div>
    </div>
    
    <br>

@endsection