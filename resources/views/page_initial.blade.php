@extends('layout.app')
@section('title', 'Start')

@section('content')

<br>
<div class="container">
	<div class="row">         
		<div class="col-md-12 contenedor-tipo-usuario">
			<div id="cuadro" class="contenedor-usuario card">
                <img id="auto" style="width: 200px; height:200px;" 
                class="text-center" src="{{asset('img/dolar.png')}}">
			<a class="fa fa-user-circle-o" href="/graphics"> Graphics <br>
			<i class="" aria-hidden="true"></i></a>
			</div>

      <!-- Se escogieron dos botones, uno invisible y otro visible, 
			cada vez que se presione uno de los botones desaparecera y sera
			visible el otro, asi sucesivamente -->

			<div class="opciones" style="margin-top:2%"> 
      <button id="abrir" class="btn" onclick="mostrar()"> 
      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        INTRODUCTION </button>
      <button id="cerrar" class="btn" style="display:none" onclick="ocultar()"> 
      <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
        INTRODUCTION </button>
      <tr>
      </div>
						
			<!-- El presente bloque esta invisible, se pasara a visible 
			una vez se toque el boton con la funcion mostrar -->
			<div id="intro" style="display:none"> 
			<p class="subreporte-info justify" 
						style="padding:1%; margin-top:-2px"> 
						In this page we can see two graphs, related to the 
						method of payment that users made in the shopping 
						system of stored products. To see them, touch the 
						word "graphics" below the image.<p>		
			</div>

			<!-- Se escogieron dos botones, uno invisible y otro visible, 
			cada vez que se presione uno de los botones desaparecera y sera
			visible el otro, asi sucesivamente -->

			<div class="opciones" style="margin-top:2%"> 
      <button id="abrir1" class="btn" onclick="mostrar1()"> 
      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
			  USED ​​FORMULAS </button>
      <button id="cerrar1" class="btn" style="display:none" onclick="ocultar1()"> 
      <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
		  	USED ​​FORMULAS </button>
      <tr>
			</div>

			<!-- El presente bloque esta invisible, se pasara a visible 
			una vez se toque el boton con la funcion mostrar -->
			
			<div id="formula" class="formula" style="width:100%; display:none">
			<p class="subreporte-info justify" 
						style="padding:1%; margin-top:-2px"> 
			<!-- <a href="/formulas"> Formulas used in the graphs </a> -->
			      Percentage Formula -->
                <img id="auto" style="width: 380px; height:80px;" 
                class="text-center" src="{{asset('img/porcentaje.png')}}">
            <br> <br>
					  Average Formula -->  
                <img id="auto" style="width: 370px; height:80px;" 
                class="text-center" src="{{asset('img/promedio.png')}}">	
			</p>
		  </div>


			<!-- Se referencia el codigo en javascript que controla 
			la visibilidad e invisibilidad de los botones -->
			<script src="{{ asset('js/botones-inicio.js') }}"></script>

		</div>
	</div>
</div>
<br>
@endsection