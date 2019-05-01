@extends('layout.app')
@section('title', 'Formulas')
@section('content')

<br>
<div class="container">
	<div class="row">         
		<div class="col-md-12 contenedor-tipo-usuario">
			<div id="cuadro" class="contenedor-usuario card" style="width:auto; padding: 1.25rem">
            Percentage Formula
                <img id="auto" style="width: 600px; height:200px;" 
                class="text-center" src="{{asset('img/porcentaje.png')}}">
            Average Formula
                <img id="auto" style="width: 600px; height:200px;" 
                class="text-center" src="{{asset('img/promedio.png')}}">	
            </div>
		</div>
	</div>
</div>

<br>


@endsection