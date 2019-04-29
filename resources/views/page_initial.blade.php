@extends('layout.app')
@section('title', 'Inicio')

@section('content')

<br>
<div class="container">
	<div class="row">         
		<div class="col-md-12 contenedor-tipo-usuario">
			<div id="cuadro" class="contenedor-usuario card">
                <img id="auto" style="width: 200px; height:200px;" 
                class="text-center" src="{{asset('img/dolar.png')}}">
				<a class="fa fa-user-circle-o" href="/graphics"> Graficas <br>
				<i class="" aria-hidden="true"></i></a>
            </div>
            <div> <br> <p class="text-center"> En la presente pagina se apreciaran dos graficas, relacionadas 
              con el metodo de pago que realizaron los usuarios en el sistema 
              de compras de productos almacenados. <p></div>
						<a href="/formulas"> Formulas utilizadas en las graficas </a>
		</div>
	</div>
</div>

@endsection