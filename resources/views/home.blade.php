@extends('layouts.app')

@section('content')
<nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Prueba Desarrollo Laravel</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="/">Inicio</a></li>
              @guest
              @else
              <li><a href="{{url('/home')}}">Mi Cuenta</a></li>
              @endguest

            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <img src="{{url('img/login.png')}}"><br>
                    Estas dentro del Sistema. Eres un Usuario Registrado.
                </div>
            </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="thumbnail">
              <img src="{{url('img/avatar.png')}}">
              <div class="caption">
                <h3><b>Ficha Personal - <a href="{{url('/download-pdf')}}">Descargar PDF</a></b></h3><br>
                <p><b>CC:</b>  {{Auth::user()->cc}}</p>
                <p><b>Apellidos y Nombres:</b>  {{Auth::user()->lastname}} {{Auth::user()->name}}</p>
                <p><b>Celular:</b>  {{Auth::user()->cellphone}}</p>
                <p><b>Email:</b>  {{Auth::user()->email}}</p>
                <p><b>Departamento y Lugar de Nacimiento:</b>  {{Auth::user()->department}} - {{Auth::user()->city}}</p>

              </div>
            </div>
          </div>

          <div class="col-md-6">
          <div class="thumbnail">

                <img src="img/news.png">
                <h4 class="media-heading"><b>Noticias</b></h4>
                La tecnología y su impacto avanzan más rápido de lo que la sociedad está preparada para asimilar, y mientras miles de adolescentes siguen apostando a carreras tradicionales, Accenture pronostica que el 37% de las tareas que hoy son conocidas serán automatizadas en los próximos 15 años.<br> <a href="https://www.cronista.com/columnistas/Mama-papa-quiero-ser-programador-20180123-0101.html" target="_blank"> <i class="fas fa-link"></i> Ir a.</a>
                <img src="img/chat.png">
                <h4 class="media-heading"><b>Blogs</b></h4>
                Se ofrece 1 millón de dólares por cada uno de estos seis problemas matemáticos que llevan 18 años sin solución.<br><a href="https://es.gizmodo.com/se-ofrece-1-millon-de-dolares-por-cada-uno-de-estos-sei-1822863860" target="_blank"> <i class="fas fa-link"></i> Ir a.</a>
                <img src="img/gameboy.png">
                <h4 class="media-heading"><b>Juegos</b></h4>
                Disfruta de una magnífica réplica del clásico Super Mario Bros de Nintendo. Salta, recolecta monedas y power ups, destruye enemigos y completa con éxito todos los niveles junto s Mario.<br> <a href="http://emulator.online/gameboy/super-mario-land-2-6-golden-coins/" target="_blank"> <i class="fas fa-link"></i> Ir a.</a>

          </div>
          </div>
          <center>
            <a class="btn btn-primary" style="width:98%;" href="{{url('/xls')}}"><i class="fas fa-file-excel"></i> - Descargar Excel</a>
          </center>
    </div>
    <br><br>
<div class="row">
      <div class="col-md-12">

        <table class="table table-bordered">
          <tbody>
            <tr>
             <th> Cedula de Ciudadanía </th>
             <th> Apellidos </th>
             <th> Nombres </th>
             <th> Celular </th>
             <th> Email</th>
             <th> Lugar de Nacimiento</th>
            </tr>
        @if(isset($lists))
        @forelse($lists as $list)
    								<tr>
    									<td>{{ $list->cc }}</td>
    									<td>{{ $list->lastname }}</td>
    									<td>{{ $list->name }}</td>
    									<td>{{ $list->cellphone }}</td>
    									<td>{{ $list->email }}</td>
    									<td>{{ $list->department }} - {{ $list->city }}</td>
    								</tr>
        @empty
              <tr>
                <td colspan="6" scope="col">No Existen Usuarios Registrados</td>
              </tr>
        @endforelse
    			</tbody></table>

    			<!-- /.box-body -->
    			<div class="box-footer clearfix">

    				@if(count($lists))
    					<div class="mt-2 mx-auto">
    						{{ $lists->links('pagination::bootstrap-4') }}
    					</div>
    				@endif

          </div>
        @endif
    </div>
</div>
@endsection
