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
          title: 'Porcentajes de la Cantidad de Pagos con Respecto a su Metodo',
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
          title: 'Promedio de Pagos con Respecto al Tipo de Pedido',
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('columnchart'));
        chart.draw(data, options);
      }
    </script>

    <br>
    <div class="card text-center">
   <div class="card-body" style = "padding: 0rem">
       <div id="piechart_3d" class="tamano-grafico"> </div>
       <div class="opciones"> 
       <button id="boton1" class="btn" onclick="mostrar()"> Debito </button>
       <button id="boton2" class="btn" style="display:none" onclick="ocultar()"> Debito</button>
       <tr>
       <button id="boton3" class="btn" onclick="mostrar1()"> Credito </button>
       <button id="boton4" class="btn" style="display:none" onclick="ocultar1()"> Credito </button>
       <tr>
       <button id="boton5" class="btn" onclick="mostrar2()"> Paypal </button>
       <button id="boton6" class="btn" style="display:none" onclick="ocultar2()"> Paypal </button>
       <tr>
       <button id="boton7" class="btn" onclick="mostrar3()"> Efectivo </button>
       <button id="boton8" class="btn" style="display:none" onclick="ocultar3()"> Efectivo </button>
       <tr>           
       <button id="boton9" class="btn" onclick="mostrar4()"> Digital </button>      
       <button id="boton10" class="btn" style="display:none" onclick="ocultar4()"> Digital </button>       
       <tr>

       </div>

        <div id="debito" style="display:none" class="subpagina"> 
          <?php 
            $usuario =
            DB::select(DB::raw("SELECT DISTINCT u.cod, u.ci, u.pnombre, u.snombre, u.papellido, u.sapellido, mp.tipo
            from pedido pe, pago pa, usuario u, metodo_pago mp
            where pe.fk_usuario = u.cod and
                  pa.fk_pedido = pe.id and
                  pa.fk_metodo = mp.cod and
                  mp.tipo_pago = 'Debito';"));
            
            echo "<table style='width: 100%;' class='text-center'>";
            echo "<tr style='border: #ffc107 0.5px solid;'>";
            echo "  <th> Numero  </th>";
            echo "  <th> Cedula </th>";
            echo "  <th> Primer Nombre  </th>";
            echo "  <th> Segundo Nombre </th>";
            echo "  <th> Primer Apellido </th>";
            echo "  <th> Segundo Apellido </th>";
            echo "  <th> Tipo (Solo digital) </th>";
            echo "</tr>";
            
            foreach ($usuario as $u) {
              echo "<tr style='border: #ffc107 0.5px solid;'>";
              echo "<td> " . $u->cod . "</td>";
              echo "<td> " . $u->ci . "</td>";
              echo "<td> " . $u->pnombre . "</td>";
              echo "<td> " . $u->snombre . "</td>";
              echo "<td> " . $u->papellido . "</td>";
              echo "<td> " . $u->sapellido . "</td>";
              echo "<td> " . $u->tipo . "</td>";
              echo "</tr>";
            }
            
            //echo "<tr>  <td>" . $arr[0] . "</td> <td>" . $arr[1] ."</td>  </tr>" ;
            echo "</table>";
            //echo $u->pnombre.' '.$u->snombre.' '.$u->papellido.' '.$u->sapellido.' '.$u->tipo.'<br>';
          ?>
        </div>

          <div id="credito" style="display:none" class="subpagina"> 
          <?php 
            $usuario =
            DB::select(DB::raw("SELECT DISTINCT u.cod, u.ci,u.pnombre, u.snombre, u.papellido, u.sapellido, mp.tipo
            from pedido pe, pago pa, usuario u, metodo_pago mp
            where pe.fk_usuario = u.cod and
                  pa.fk_pedido = pe.id and
                  pa.fk_metodo = mp.cod and
                  mp.tipo_pago = 'Credito';"));
            
            echo "<table style='width: 100%;' class='text-center'>";
            echo "<tr style='border: #ffc107 0.5px solid;'>";
            echo "  <th> Numero  </th>";
            echo "  <th> Cedula </th>";
            echo "  <th> Primer Nombre  </th>";
            echo "  <th> Segundo Nombre </th>";
            echo "  <th> Primer Apellido </th>";
            echo "  <th> Segundo Apellido </th>";
            echo "  <th> Tipo (Solo digital) </th>";
            echo "</tr>";
            
            foreach ($usuario as $u) {
              echo "<tr style='border: #ffc107 0.5px solid;'>";
              echo "<td> " . $u->cod . "</td>";
              echo "<td> " . $u->ci . "</td>";
              echo "<td> " . $u->pnombre . "</td>";
              echo "<td> " . $u->snombre . "</td>";
              echo "<td> " . $u->papellido . "</td>";
              echo "<td> " . $u->sapellido . "</td>";
              echo "<td> " . $u->tipo . "</td>";
              echo "</tr>";
            }
            
            //echo "<tr>  <td>" . $arr[0] . "</td> <td>" . $arr[1] ."</td>  </tr>" ;
            echo "</table>";
            //echo $u->pnombre.' '.$u->snombre.' '.$u->papellido.' '.$u->sapellido.' '.$u->tipo.'<br>';
          ?>
          </div>
          <div id="paypal" style="display:none" class="subpagina"> 
          <?php 
            $usuario =
            DB::select(DB::raw("SELECT DISTINCT u.cod, u.ci,u.pnombre, u.snombre, u.papellido, u.sapellido, mp.tipo
            from pedido pe, pago pa, usuario u, metodo_pago mp
            where pe.fk_usuario = u.cod and
                  pa.fk_pedido = pe.id and
                  pa.fk_metodo = mp.cod and
                  mp.tipo_pago = 'Paypal';"));
            
            echo "<table style='width: 100%;' class='text-center'>";
            echo "<tr style='border: #ffc107 0.5px solid;'>";
            echo "  <th> Numero  </th>";
            echo "  <th> Cedula </th>";
            echo "  <th> Primer Nombre  </th>";
            echo "  <th> Segundo Nombre </th>";
            echo "  <th> Primer Apellido </th>";
            echo "  <th> Segundo Apellido </th>";
            echo "  <th> Tipo (Solo digital) </th>";
            echo "</tr>";
            
            foreach ($usuario as $u) {
              echo "<tr style='border: #ffc107 0.5px solid;'>";
              echo "<td> " . $u->cod . "</td>";
              echo "<td> " . $u->ci . "</td>";
              echo "<td> " . $u->pnombre . "</td>";
              echo "<td> " . $u->snombre . "</td>";
              echo "<td> " . $u->papellido . "</td>";
              echo "<td> " . $u->sapellido . "</td>";
              echo "<td> " . $u->tipo . "</td>";
              echo "</tr>";
            }
            
            //echo "<tr>  <td>" . $arr[0] . "</td> <td>" . $arr[1] ."</td>  </tr>" ;
            echo "</table>";
            //echo $u->pnombre.' '.$u->snombre.' '.$u->papellido.' '.$u->sapellido.' '.$u->tipo.'<br>';
          ?>
          </div>
          <div id="efectivo" style="display:none" class="subpagina"> 
          <?php 
            $usuario =
            DB::select(DB::raw("SELECT DISTINCT u.cod, u.ci,u.pnombre, u.snombre, u.papellido, u.sapellido, mp.tipo
            from pedido pe, pago pa, usuario u, metodo_pago mp
            where pe.fk_usuario = u.cod and
                  pa.fk_pedido = pe.id and
                  pa.fk_metodo = mp.cod and
                  mp.tipo_pago = 'Efectivo';"));
            
            echo "<table style='width: 100%;' class='text-center'>";
            echo "<tr style='border: #ffc107 0.5px solid;'>";
            echo "  <th> Numero  </th>";
            echo "  <th> Cedula </th>";
            echo "  <th> Primer Nombre  </th>";
            echo "  <th> Segundo Nombre </th>";
            echo "  <th> Primer Apellido </th>";
            echo "  <th> Segundo Apellido </th>";
            echo "  <th> Tipo (Solo digital) </th>";
            echo "</tr>";
            
            foreach ($usuario as $u) {
              echo "<tr style='border: #ffc107 0.5px solid;'>";
              echo "<td> " . $u->cod . "</td>";
              echo "<td> " . $u->ci . "</td>";
              echo "<td> " . $u->pnombre . "</td>";
              echo "<td> " . $u->snombre . "</td>";
              echo "<td> " . $u->papellido . "</td>";
              echo "<td> " . $u->sapellido . "</td>";
              echo "<td> " . $u->tipo . "</td>";
              echo "</tr>";
            }
            
            //echo "<tr>  <td>" . $arr[0] . "</td> <td>" . $arr[1] ."</td>  </tr>" ;
            echo "</table>";
            //echo $u->pnombre.' '.$u->snombre.' '.$u->papellido.' '.$u->sapellido.' '.$u->tipo.'<br>';
          ?>
          </div>
          <div id="digital" style="display:none" class="subpagina"> 
          <?php 
            $usuario =
            DB::select(DB::raw("SELECT DISTINCT u.cod, u.ci,u.pnombre, u.snombre, u.papellido, u.sapellido, mp.tipo
            from pedido pe, pago pa, usuario u, metodo_pago mp
            where pe.fk_usuario = u.cod and
                  pa.fk_pedido = pe.id and
                  pa.fk_metodo = mp.cod and
                  mp.tipo_pago = 'Digital';"));

                  echo "<table style='width: 100%;' class='text-center'>";
                  echo "<tr style='border: #ffc107 0.5px solid;'>";
                  echo "  <th> Numero  </th>";
                  echo "  <th> Cedula </th>";
                  echo "  <th> Primer Nombre  </th>";
                  echo "  <th> Segundo Nombre </th>";
                  echo "  <th> Primer Apellido </th>";
                  echo "  <th> Segundo Apellido </th>";
                  echo "  <th> Tipo (Solo digital) </th>";
                  echo "</tr>";

                  foreach ($usuario as $u) {
                    echo "<tr style='border: #ffc107 0.5px solid;'>";
                    echo "<td> " . $u->cod . "</td>";
                    echo "<td> " . $u->ci . "</td>";
                    echo "<td> " . $u->pnombre . "</td>";
                    echo "<td> " . $u->snombre . "</td>";
                    echo "<td> " . $u->papellido . "</td>";
                    echo "<td> " . $u->sapellido . "</td>";
                    echo "<td> " . $u->tipo . "</td>";
                    echo "</tr>";
                  }

            //echo "<tr>  <td>" . $arr[0] . "</td> <td>" . $arr[1] ."</td>  </tr>" ;
            echo "</table>";
            //echo $u->pnombre.' '.$u->snombre.' '.$u->papellido.' '.$u->sapellido.' '.$u->tipo.'<br>';
          ?>
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

    <script src="{{ asset('js/botones.js') }}"></script>

@endsection