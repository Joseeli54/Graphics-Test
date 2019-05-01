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
   <?php 

      $usuario =
      DB::select(DB::raw("SELECT count(us.*)
      from (select distinct u.pnombre, u.snombre, pa.tipo_pago
      from pago p, pedido pe, usuario u, metodo_pago pa
      where pe.fk_usuario = u.cod and
            p.fk_pedido = pe.id and
          p.fk_metodo = pa.cod) us;"));
      foreach ($usuario as $u) {
        $numero = $u->count;
      }

      ?>

      <div class="label-cantidad" style ="font-family:initial"> Number of payments made: {{$numero}} </div>

       <div id="piechart_3d" class="tamano-grafico"> </div>
       <div class="opciones"> 
       <button id="boton1" class="btn" onclick="mostrar()"> 
       <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        Debito </button>
       <button id="boton2" class="btn" style="display:none" onclick="ocultar()"> 
       <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
        Debito</button>
       <tr>
       <button id="boton3" class="btn" onclick="mostrar1()"> 
       <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        Credito </button>
       <button id="boton4" class="btn" style="display:none" onclick="ocultar1()">
       <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
        Credito </button>
       <tr>
       <button id="boton5" class="btn" onclick="mostrar2()"> 
       <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        Paypal </button>
       <button id="boton6" class="btn" style="display:none" onclick="ocultar2()">
       <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
        Paypal </button>
       <tr>
       <button id="boton7" class="btn" onclick="mostrar3()">
       <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        Efectivo </button>
       <button id="boton8" class="btn" style="display:none" onclick="ocultar3()">
       <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
        Efectivo </button>
       <tr>           
       <button id="boton9" class="btn" onclick="mostrar4()"> 
       <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        Digital </button>      
       <button id="boton10" class="btn" style="display:none" onclick="ocultar4()">
       <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
        Digital </button>       
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
            
            echo "<table class='subreporte-tabla text-center'>";
            echo "<tr class = 'subreporte-titulo-color'>";
            echo "  <th> Number  </th>";
            echo "  <th> Cedula </th>";
            echo "  <th> First Name  </th>";
            echo "  <th> Segundo Nombre </th>";
            echo "  <th> Primer Apellido </th>";
            echo "  <th> Segundo Apellido </th>";
            echo "</tr>";
            
            foreach ($usuario as $u) {
              echo "<tr class = 'subreporte-info'>";
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
            
            echo "<table class='subreporte-tabla text-center' >";
            echo "<tr class = 'subreporte-titulo-color'>";
            echo "  <th> Number  </th>";
            echo "  <th> Cedula </th>";
            echo "  <th> First Name  </th>";
            echo "  <th> Segundo Nombre </th>";
            echo "  <th> Primer Apellido </th>";
            echo "  <th> Segundo Apellido </th>";
            echo "</tr>";
            
            foreach ($usuario as $u) {
              echo "<tr class = 'subreporte-info'>";
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
            DB::select(DB::raw("SELECT DISTINCT u.cod, u.ci,u.pnombre, u.snombre, u.papellido, 
            u.sapellido, mp.tipo
            from pedido pe, pago pa, usuario u, metodo_pago mp
            where pe.fk_usuario = u.cod and
                  pa.fk_pedido = pe.id and
                  pa.fk_metodo = mp.cod and
                  mp.tipo_pago = 'Paypal';"));
            
            echo "<table class='subreporte-tabla text-center'>";
            echo "<tr class = 'subreporte-titulo-color'>";
            echo "  <th> Number  </th>";
            echo "  <th> Cedula </th>";
            echo "  <th> First Name  </th>";
            echo "  <th> Segundo Nombre </th>";
            echo "  <th> Primer Apellido </th>";
            echo "  <th> Segundo Apellido </th>";
            echo "</tr>";
            
            foreach ($usuario as $u) {
              echo "<tr class = 'subreporte-info'>";
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
            DB::select(DB::raw("SELECT DISTINCT u.cod, u.ci,u.pnombre, u.snombre, u.papellido, 
            u.sapellido, mp.tipo
            from pedido pe, pago pa, usuario u, metodo_pago mp
            where pe.fk_usuario = u.cod and
                  pa.fk_pedido = pe.id and
                  pa.fk_metodo = mp.cod and
                  mp.tipo_pago = 'Efectivo';"));
            
            echo "<table class='subreporte-tabla text-center'>";
            echo "<tr class = 'subreporte-titulo-color'>";
            echo "  <th> Number  </th>";
            echo "  <th> Cedula </th>";
            echo "  <th> First Name  </th>";
            echo "  <th> Segundo Nombre </th>";
            echo "  <th> Primer Apellido </th>";
            echo "  <th> Segundo Apellido </th>";
            echo "</tr>";
            
            foreach ($usuario as $u) {
              echo "<tr class = 'subreporte-info'>";
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
            DB::select(DB::raw("SELECT DISTINCT u.cod, u.ci,u.pnombre, u.snombre, u.papellido, 
            u.sapellido, mp.tipo
            from pedido pe, pago pa, usuario u, metodo_pago mp
            where pe.fk_usuario = u.cod and
                  pa.fk_pedido = pe.id and
                  pa.fk_metodo = mp.cod and
                  mp.tipo_pago = 'Digital';"));

                  echo "<table class='subreporte-tabla text-center'>";
                  echo "<tr class = 'subreporte-titulo-color'>";
                  echo "  <th> Number  </th>";
                  echo "  <th> Cedula </th>";
                  echo "  <th> First Name  </th>";
                  echo "  <th> Segundo Nombre </th>";
                  echo "  <th> Primer Apellido </th>";
                  echo "  <th> Segundo Apellido </th>";
                  echo "  <th> Tipo </th>";
                  echo "</tr>";

                  foreach ($usuario as $u) {
                    echo "<tr class = 'subreporte-info'>";
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
    <?php 

        $usuario =
        DB::select(DB::raw("SELECT count(*)
        from pago pa, pedido pe
        where pa.fk_pedido = pe.id;"));
        foreach ($usuario as $u) {
          $numero = $u->count;
        }
    
    ?>

   <div class="label-cantidad" style ="font-family:initial"> Number of orders made: {{$numero}} </div>
       <div id="columnchart" class="tamano-grafico"></div>
       <div class="opciones"> 
       <button id="btn1" class="btn" onclick="despertar()">
       <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        Proveedor </button>
       <button id="btn2" class="btn" style="display:none" onclick="dormir()">
       <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
        Proveedor </button>
       <tr>
       <button id="btn3" class="btn" onclick="despertar1()">
       <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        Objeto </button>
       <button id="btn4" class="btn" style="display:none" onclick="dormir1()">
       <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
        Objeto </button>
       <tr>
       <button id="btn5" class="btn" onclick="despertar2()">
       <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        Destino </button>
       <button id="btn6" class="btn" style="display:none" onclick="dormir2()">
       <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
        Destino </button>
       <tr>
       </div>
    </div>
    </div>

        <div id="objeto" style="display:none" class="subpagina"> 
          <?php 
            $usuario =
            DB::select(DB::raw("SELECT DISTINCT u.pnombre,u.papellido,mp.tipo_pago, 
            pa.monto, pa.fec_pago, pe.nombre
            from usuario u, pago pa, pedido pe, metodo_pago mp
            where pa.fk_pedido = pe.id and
                  pe.fk_usuario = u.cod and
                pa.fk_metodo = mp.cod and
                pe.tipo = 'Objeto';"));
            
            echo "<table class='subreporte-tabla text-center'>";
            echo "<tr class = 'subreporte-titulo-color'>";
            echo "  <th> Nombre  </th>";
            echo "  <th> Apellido </th>";
            echo "  <th> Tipo de Pago  </th>";
            echo "  <th> Nombre del Producto </th>";
            echo "  <th> Monto </th>";
            echo "  <th> Fecha de Pago </th>";
            echo "</tr>";
            
            foreach ($usuario as $u) {
              echo "<tr class = 'subreporte-info'>";
              echo "<td> " . $u->pnombre . "</td>";
              echo "<td> " . $u->papellido . "</td>";
              echo "<td> " . $u->tipo_pago . "</td>";
              echo "<td> " . $u->nombre . "</td>";
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
            DB::select(DB::raw("SELECT DISTINCT u.pnombre,u.papellido,mp.tipo_pago, 
            pa.monto, pa.fec_pago, pe.nombre
            from usuario u, pago pa, pedido pe, metodo_pago mp
            where pa.fk_pedido = pe.id and
                  pe.fk_usuario = u.cod and
                pa.fk_metodo = mp.cod and
                pe.tipo = 'Proveedor';"));
            
            echo "<table class='subreporte-tabla text-center'>";
            echo "<tr class = 'subreporte-titulo-color'>";
            echo "  <th> Nombre  </th>";
            echo "  <th> Apellido </th>";
            echo "  <th> Tipo de Pago  </th>";
            echo "  <th> Nombre del Producto </th>";
            echo "  <th> Monto </th>";
            echo "  <th> Fecha de Pago </th>";
            echo "</tr>";
            
            foreach ($usuario as $u) {
              echo "<tr class = 'subreporte-info'>";
              echo "<td> " . $u->pnombre . "</td>";
              echo "<td> " . $u->papellido . "</td>";
              echo "<td> " . $u->tipo_pago . "</td>";
              echo "<td> " . $u->nombre . "</td>";
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
            DB::select(DB::raw("SELECT DISTINCT u.pnombre,u.papellido,mp.tipo_pago, 
            pa.monto, pa.fec_pago, pe.nombre
            from usuario u, pago pa, pedido pe, metodo_pago mp
            where pa.fk_pedido = pe.id and
                  pe.fk_usuario = u.cod and
                pa.fk_metodo = mp.cod and
                pe.tipo = 'Destino';"));
            
            echo "<table class='subreporte-tabla text-center'>";
            echo "<tr class = 'subreporte-titulo-color'>";
            echo "  <th> Nombre  </th>";
            echo "  <th> Apellido </th>";
            echo "  <th> Tipo de Pago  </th>";
            echo "  <th> Nombre del Producto  </th>";
            echo "  <th> Monto </th>";
            echo "  <th> Fecha de Pago </th>";
            echo "</tr>";
            
            foreach ($usuario as $u) {
              echo "<tr class = 'subreporte-info'>";
              echo "<td> " . $u->pnombre . "</td>";
              echo "<td> " . $u->papellido . "</td>";
              echo "<td> " . $u->tipo_pago . "</td>";
              echo "<td> " . $u->nombre . "</td>";
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