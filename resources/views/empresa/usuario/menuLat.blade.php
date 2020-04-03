<!--      Nadvar y Shideshow-->
@section('HEADER')
PANEL DE USUARIO
@endsection



<!-- Exiten 4-->
@section('LinkTom1')
<a href="{{url('HomeB')}}"><i ><span class="glyphicon glyphicon-home"> Home</span></i> </a>
@endsection
<!--Peoo no petenecen a minguna capa -->




<!----------------Primera capa-------------->
@section('Titulo1')Ventas
@endsection

@section('Link1')
<a href="{{url('Costos')}}"><i><span class="glyphicon glyphicon-usd"> Costos</span></i></a>
@endsection

@section('Link2')
<a href="#"><i><span class="glyphicon glyphicon-shopping-cart"> Ventas</span></i></a>
@endsection




<!----------------Primera capa-------------->
<!-- ******* -->
<!-- ******* -->



<!----------------Segunda capa-------------->
@section('Titulo2')Gallineros
@endsection

@section('Tomyy1')
<a href="{{url('Metas')}}"><i><span class="glyphicon glyphicon-usd"> Metas</span></i></a>
@endsection

@section('Tomyy2')
<a href="{{url('Galpones')}}"><i><span class="glyphicon glyphicon-th"> Galpones</span></i></a>
@endsection

@section('Tomyy3')
<a href="#"><i><span class="glyphicon glyphicon-heart"> Vacunaciones</span></i></a>
@endsection

<!----------------Segunda capa-------------->
<!-- ******* -->
<!-- ******* -->





<!----------------Tercera capa-------------->
@section('Titulo3')Almacen
@endsection

@section('Sumer1')
<a href="{{url('Costos')}}"><i><span class="glyphicon glyphicon-usd"> Costos</span></i></a>
@endsection

@section('Sumer2')
<a href="{{url('Almacen')}}"><i><span class="glyphicon glyphicon-folder-open"> Almacen</span></i></a>
@endsection


@section('Sumer3')
<a href="#"><i><span class="glyphicon glyphicon-usd"> Item 03</span></i></a>
@endsection
<!----------------Tercera capa-------------->
<!-- ******* -->
<!-- ******* -->







<!--route('son para utilizar el index') 
	"url('son para utilizar funciones del controlador')"
	{{url('Ingresos')}}
-->