
@section('HEADER')
PANEL DE ADMINISTRADOR
@endsection



<!-- Exiten 4-->
@section('LinkTom1')
<a href="{{url('HomeA')}}"><i ><span class="glyphicon glyphicon-home"> Home</span></i> </a>
@endsection
<!--Peoo no petenecen a minguna capa -->





<!----------------Primera capa-------------->
@section('Titulo1')Usuarios
@endsection

@section('Link1')
<a href="{{url('Usuarios')}}"><i><span class="glyphicon glyphicon-user"> Usuarios</span></i></a>
@endsection

@section('Link2')
<a href="{{url('Roles')}}"><i><span class="glyphicon glyphicon-list"> Roles</span></i></a>
@endsection

@section('Link3')
<a href="{{url('Empleados')}}"><i><span class="glyphicon glyphicon-user"> Empleados</span></i></a>
@endsection

@section('Link4')
<a href="{{url('Puestos')}}"><i><span class="glyphicon glyphicon-list"> Puestos</span></i></a>
@endsection

<!----------------Primera capa-------------->
<!-- ******* -->
<!-- ******* -->




<!----------------Segunda capa-------------->
@section('Titulo2')Galpones
@endsection

@section('Tomyy1')
<a href="{{url('Gallineros')}}"><i><span class="glyphicon glyphicon-th"> Gallineros</span></i></a>
@endsection

@section('Tomyy2')
<a href="{{url('Servicios')}}"><i><span class="glyphicon glyphicon-pushpin"> Serivicos</span></i></a>
@endsection

@section('Tomyy3')
<a href="#"><i><span class="glyphicon glyphicon-pushpin"> Bacio</span></i></a>
@endsection
<!----------------Segunda capa-------------->
<!-- ******* -->
<!-- ******* -->





<!----------------Tercera capa-------------->
@section('Titulo3') Almacen
@endsection

@section('Sumer1')
<a href="{{url('Producto')}}"><i><span class="glyphicon glyphicon-ok"> Productos</span></i></a>
@endsection

@section('Sumer2')
<a href="{{url('Categorias')}}"><i><span class="glyphicon glyphicon-tasks"> Categorias</span></i></a>
@endsection

@section('Sumer3')
<a href="{{url('Proveedores')}}"><i><span class="glyphicon glyphicon-shopping-cart"> Proveedores</span></i></a>
@endsection

@section('Sumer4')
<a href="{{url('Clientes')}}"><i><span class="glyphicon glyphicon-shopping-cart"> Clientes</span></i></a>
@endsection
<!----------------Tercera capa-------------->
<!-- ******* -->
<!-- ******* -->






