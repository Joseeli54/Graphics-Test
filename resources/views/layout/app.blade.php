<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Graphics - @yield('title')</title>
	<link rel="icon" href="{{asset('img/dolar.png')}}" type="image/png">
	
	<link rel="stylesheet" href="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css')}}" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>

<body>
	<nav class="navbar navbar-dark" style = "background-color: #FFA52D">
	<a href="#" class="navbar-brand"> <b> GRAPHICS <b></a>
    </nav>
	<div class="container">
		@yield('content')
	</div>

    <footer>
		<div style="background-color: #FFA52D; padding-top: 5px">
			<div class="row">
				<div class="col-md-12 text-center">
					<p id="texto-footer">GRAPHICS - Pagina de Graficas de Pagos y Pedidos - 
						<script type="text/javascript">
							var fecha = new Date();
							var anio = fecha.getFullYear();
							var texto = document.getElementById('texto-footer');
							texto.innerText += ' ' + anio;
						</script>
					
					</p>
				</div>
			</div>
		</div>
	</footer>
</body>
</html>