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
            echo "</tr>";
            
            foreach ($usuario as $u) {
              echo "<tr style='border: #ffc107 0.5px solid;'>";
              echo "<td> " . $u->cod . "</td>";
              echo "<td> " . $u->ci . "</td>";
              echo "<td> " . $u->pnombre . "</td>";
              echo "<td> " . $u->snombre . "</td>";
              echo "<td> " . $u->papellido . "</td>";
              echo "<td> " . $u->sapellido . "</td>";
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
            echo "</tr>";
            
            foreach ($usuario as $u) {
              echo "<tr style='border: #ffc107 0.5px solid;'>";
              echo "<td> " . $u->cod . "</td>";
              echo "<td> " . $u->ci . "</td>";
              echo "<td> " . $u->pnombre . "</td>";
              echo "<td> " . $u->snombre . "</td>";
              echo "<td> " . $u->papellido . "</td>";
              echo "<td> " . $u->sapellido . "</td>";
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
            echo "</tr>";
            
            foreach ($usuario as $u) {
              echo "<tr style='border: #ffc107 0.5px solid;'>";
              echo "<td> " . $u->cod . "</td>";
              echo "<td> " . $u->ci . "</td>";
              echo "<td> " . $u->pnombre . "</td>";
              echo "<td> " . $u->snombre . "</td>";
              echo "<td> " . $u->papellido . "</td>";
              echo "<td> " . $u->sapellido . "</td>";
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
            echo "</tr>";
            
            foreach ($usuario as $u) {
              echo "<tr style='border: #ffc107 0.5px solid;'>";
              echo "<td> " . $u->cod . "</td>";
              echo "<td> " . $u->ci . "</td>";
              echo "<td> " . $u->pnombre . "</td>";
              echo "<td> " . $u->snombre . "</td>";
              echo "<td> " . $u->papellido . "</td>";
              echo "<td> " . $u->sapellido . "</td>";
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
                  echo "  <th> Tipo </th>";
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
   <div class="card-body" style = "padding: 0rem">
       <div id="columnchart" class="tamano-grafico"></div>
       <div class="opciones"> 
       <button id="btn1" class="btn" onclick="despertar()"> Proveedor </button>
       <button id="btn2" class="btn" style="display:none" onclick="dormir()"> Proveedor </button>
       <tr>
       <button id="btn3" class="btn" onclick="despertar1()"> Objeto </button>
       <button id="btn4" class="btn" style="display:none" onclick="dormir1()"> Objeto </button>
       <tr>
       <button id="btn5" class="btn" onclick="despertar2()"> Destino </button>
       <button id="btn6" class="btn" style="display:none" onclick="dormir2()"> Destino </button>
       <tr>
       </div>
    </div>
    </div>

        <div id="objeto" style="display:none" class="subpagina"> 
          <?php 
            $usuario =
            DB::select(DB::raw("SELECT DISTINCT u.pnombre,u.papellido,mp.tipo_pago, pa.monto, pa.fec_pago
            from usuario u, pago pa, pedido pe, metodo_pago mp
            where pa.fk_pedido = pe.id and
                  pe.fk_usuario = u.cod and
                pa.fk_metodo = mp.cod and
                pe.tipo = 'Objeto';"));
            
            echo "<table style='width: 100%;' class='text-center'>";
            echo "<tr style='border: #ffc107 0.5px solid;'>";
            echo "  <th> Nombre  </th>";
            echo "  <th> Apellido </th>";
            echo "  <th> Tipo de Pago  </th>";
            echo "  <th> Monto </th>";
            echo "  <th> Fecha de Pago </th>";
            echo "</tr>";
            
            foreach ($usuario as $u) {
              echo "<tr style='border: #ffc107 0.5px solid;'>";
              echo "<td> " . $u->pnombre . "</td>";
              echo "<td> " . $u->papellido . "</td>";
              echo "<td> " . $u->tipo_pago . "</td>";
              echo "<td> " . $u->monto . "</td>";
              echo "<td> " . $u->fec_pago . "</td>";
              echo "</tr>";
            }
            
            //echo "<tr>  <td>" . $arr[0] . "</td> <td>" . $arr[1] ."</td>  </tr>" ;
            echo "</table>";
            //echo $u->pnombre.' '.$u->snombre.' '.$u->papellido.' '.$u->sapellido.' '.$u->tipo.'<br>';
          ?>
        </div>

        <div id="proveedor" style="display:none" class="subpagina"> 
          <?php 
            $usuario =
            DB::select(DB::raw("SELECT DISTINCT u.pnombre,u.papellido,mp.tipo_pago, pa.monto, pa.fec_pago
            from usuario u, pago pa, pedido pe, metodo_pago mp
            where pa.fk_pedido = pe.id and
                  pe.fk_usuario = u.cod and
                pa.fk_metodo = mp.cod and
                pe.tipo = 'Proveedor';"));
            
            echo "<table style='width: 100%;' class='text-center'>";
            echo "<tr style='border: #ffc107 0.5px solid;'>";
            echo "  <th> Nombre  </th>";
            echo "  <th> Apellido </th>";
            echo "  <th> Tipo de Pago  </th>";
            echo "  <th> Monto </th>";
            echo "  <th> Fecha de Pago </th>";
            echo "</tr>";
            
            foreach ($usuario as $u) {
              echo "<tr style='border: #ffc107 0.5px solid;'>";
              echo "<td> " . $u->pnombre . "</td>";
              echo "<td> " . $u->papellido . "</td>";
              echo "<td> " . $u->tipo_pago . "</td>";
              echo "<td> " . $u->monto . "</td>";
              echo "<td> " . $u->fec_pago . "</td>";
              echo "</tr>";
            }
            
            //echo "<tr>  <td>" . $arr[0] . "</td> <td>" . $arr[1] ."</td>  </tr>" ;
            echo "</table>";
            //echo $u->pnombre.' '.$u->snombre.' '.$u->papellido.' '.$u->sapellido.' '.$u->tipo.'<br>';
          ?>
        </div>

        <div id="destino" style="display:none" class="subpagina"> 
          <?php 
            $usuario =
            DB::select(DB::raw("SELECT DISTINCT u.pnombre,u.papellido,mp.tipo_pago, pa.monto, pa.fec_pago
            from usuario u, pago pa, pedido pe, metodo_pago mp
            where pa.fk_pedido = pe.id and
                  pe.fk_usuario = u.cod and
                pa.fk_metodo = mp.cod and
                pe.tipo = 'Destino';"));
            
            echo "<table style='width: 100%;' class='text-center'>";
            echo "<tr style='border: #ffc107 0.5px solid;'>";
            echo "  <th> Nombre  </th>";
            echo "  <th> Apellido </th>";
            echo "  <th> Tipo de Pago  </th>";
            echo "  <th> Monto </th>";
            echo "  <th> Fecha de Pago </th>";
            echo "</tr>";
            
            foreach ($usuario as $u) {
              echo "<tr style='border: #ffc107 0.5px solid;'>";
              echo "<td> " . $u->pnombre . "</td>";
              echo "<td> " . $u->papellido . "</td>";
              echo "<td> " . $u->tipo_pago . "</td>";
              echo "<td> " . $u->monto . "</td>";
              echo "<td> " . $u->fec_pago . "</td>";
              echo "</tr>";
            }
            
            //echo "<tr>  <td>" . $arr[0] . "</td> <td>" . $arr[1] ."</td>  </tr>" ;
            echo "</table>";
            //echo $u->pnombre.' '.$u->snombre.' '.$u->papellido.' '.$u->sapellido.' '.$u->tipo.'<br>';
          ?>
        </div>

    
    <br>

    <script src="{{ asset('js/botones.js') }}"></script>

@endsection