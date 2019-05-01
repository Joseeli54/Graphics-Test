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

			<div class="opciones" style="margin-top:2%"> 
      <button id="abrir" class="btn" onclick="mostrar()"> 
      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
        INTRODUCTION </button>
      <button id="cerrar" class="btn" style="display:none" onclick="ocultar()"> 
      <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
        INTRODUCTION </button>
      <tr>
      </div>
						
			<div id="intro" style="display:none"> 
			<p class="subreporte-info justify" 
						style="padding:1%; margin-top:-2px"> 
						In this page we can see two graphs, related to the 
						method of payment that users made in the shopping 
						system of stored products. To see them, touch the 
						word "graphics" below the image.<p>		
			</div>

			<div class="opciones" style="margin-top:2%"> 
      <button id="abrir1" class="btn" onclick="mostrar1()"> 
      <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
			  USED ​​FORMULAS </button>
      <button id="cerrar1" class="btn" style="display:none" onclick="ocultar1()"> 
      <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
		  	USED ​​FORMULAS </button>
      <tr>
			</div>
			
			<div id="formula" class="formula" style="width:100%; display:none">
			<p class="subreporte-info justify" 
						style="padding:1%; margin-top:-2px"> 
			<a href="/formulas"> Formulas used in the graphs </a>
			</p>
		  </div>

			<script type="text/javascript">
		    	
		    	      function ocultar(){
                	document.getElementById('intro').style.display = 'none';
                	document.getElementById('abrir').style.display = 'block';
                	document.getElementById('cerrar').style.display = 'none';
                }

                function mostrar(){
                    document.getElementById('intro').style.display = 'block';
                    document.getElementById('cerrar').style.display = 'block';
                	document.getElementById('abrir').style.display = 'none';
                }
								function ocultar1(){
                	document.getElementById('formula').style.display = 'none';
                	document.getElementById('abrir1').style.display = 'block';
                	document.getElementById('cerrar1').style.display = 'none';
                }

                function mostrar1(){
                    document.getElementById('formula').style.display = 'block';
                    document.getElementById('cerrar1').style.display = 'block';
                	document.getElementById('abrir1').style.display = 'none';
                }
		    </script>
		</div>
	</div>
</div>
<br>
@endsection