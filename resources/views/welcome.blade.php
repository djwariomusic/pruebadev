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
              <li class="active"><a href="{{url('/')}}">Inicio</a></li>
              <!-- Menú Dinámico cuando Usuario esta Autenticado-->
              @guest
              @else
              <li><a href="{{url('/home')}}">Mi Cuenta</a></li>
              @endguest
            </ul>
          </div>
        </div>
      </nav>
<br><br>
<div class="panel panel-default">
  <div class="panel-heading"><h1> <i class="far fa-file-alt"></i> - Requerimiento General</h1></div>
  <div class="panel-body">
    <p>Desarrollar una Pagina Web tipo Landing Page que permita a los usuarios conocer sobre la marca, brindando la
      posibilidad de participar en un Sorteo a través de un registro. Para iniciar el Sorteo es necesario mínimo de
      5 usuarios registrados, valida el concursante del Día.<br> Buena Suerte!
    </p>
    <!-- Valiación Registro o Duplicidad de Usuarios-->
      @if(isset($alerts))
        @if ($alerts=="error")
          <div class="alert alert-danger">
            <strong> <i class="fas fa-exclamation-circle"></i> Mensaje de Advertencia</strong><br>
            Los datos ingresados como email o Documento de Identidad ya se encuentran registrados en el sistema.<br>
            Favor Verificar e Intentar de Nuevo.
          </div>
        @elseif ($alerts=="ok")
          <div class="alert alert-info">
            <strong> <i class="fas fa-info-circle"></i> Mensaje Informativo</strong><br> Los datos ingresados fueron
            registrados exitosamente.<br> Gracias por Participar.
          </div>
        @endif
      @endif
    </p>
    <center>
    <div class="col-md-4">
      <a href="" class="btn btn-primary" id="btnmodalopen" style="width:200px" data-toggle="modal" data-target="#myModal">
        Mas Info
      </a>
    </div>
    <div class="col-md-4">
      <a href="" class="btn btn-danger" id="btnmodalopen2" style="width:200px"data-toggle="modal" data-target="#myModal2">
        Req. Mínimos
      </a>
    </div>
    <div class="col-md-4">
      <a href="{{url('/winner')}}" style="width:200px" onclick="winner()" class="btn btn-success">
        Ver Ganador del Día
      </a>
    </div>
  </center>
    <br><br><br>
    <!-- DIV Addthis.com Share Website-->
    <div class="addthis_inline_share_toolbox"></div>
    <br>
    <!-- Valiación de Cantidad Usuarios para Sorteo-->
    @if(isset($result))
      @if ($result=="falta")
        <div class="alert alert-warning">
          <strong><img src="img/share.png"><br>Comparte este WebSite</strong><br>
          Recomienda esta pagina a un amigo. Ayudanos a completar el monto mínimo de participantes para el sorteo.
        </div>
      @elseif ($result=="listo")
        <div class="alert alert-info">
          <strong><img src="img/winner.png"><br>Tenemos a un Ganador!</strong><br>
          Esta es la Cedula de Ciudadanía GANADORA. Gracias por Participar.<i class="fal fa-smile"></i>
          <br>
        </div>
        <div id="numwin" style="visibility:hidden;">
        <center>
          <font size="12px">
            <div id="shiva"><span class="count">
              @if(isset($cc))
                {{$cc}}
              @endif
            </span></div>
          </font>
        </center>
      </div>
        @if(isset($winner))
        <div class="alert alert-info" id="nomwin" style="visibility:hidden;">
            <h4><b>Datos Personales del Ganador</b></h4><br>
            <b>Apellidos y Nombres:</b> {{$winner->lastname}} {{$winner->name}}<br>
            <b>Correo Electrónico : </b> {{$winner->email}}<br>
            <b>Fecha Hora Registro:</b> {{$winner->created_at}}<br>
        </div>
        @endif
      @endif
    @endif

  </div>
</div>

<!-- Banner Bootstrap-->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <!-- Images Sliders -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="img/banners.jpg" style="width:100%;">
      </div>

      <div class="item">
        <img src="img/car.jpg" style="width:100%;">
      </div>

      <div class="item">
        <img src="img/car2.jpg" style="width:100%;">
      </div>
    </div>

    <!-- Control Sliders -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Anterior</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Siguiente</span>
    </a>
  </div>
  <br><br>
<!-- HTML Services -->
<div class="container">
  <div class="col-lg-4">
    <h4>Subheading</h4>
    <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

    <h4>Subheading</h4>
    <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

    <h4>Subheading</h4>
    <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
  </div>
  <div class="col-lg-4">
    <h4>Subheading</h4>
    <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

    <h4>Subheading</h4>
    <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

    <h4>Subheading</h4>
    <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
  </div>
  <div class="col-lg-4">
    <h4>Subheading</h4>
    <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

    <h4>Subheading</h4>
    <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

    <h4>Subheading</h4>
    <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
  </div>
</div>
<br><br>
<!-- Images Landing Page -->
    <a href="{{url('/form')}}"><img src="img/banners-02.jpg" class="img-responsive"/></a>
<br><br>

<!-- Modal Bootstrap 1 -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Skills Utilizados</h4>
      </div>

      <div class="modal-body">
        <p align="justify">
          El presente desarrollo esta implementado en un Arquitectura Modelo - Vista - Controlador (MVC), el cual permite
          segmentar de forma segura y estructurada el FrontEnd del Backend.
          Se utilizarón diferentes tecnologías las cuales se mencionaran a continuación:
        </p>

        <h4>Listado de Tecnologías</h4>
        <ol>
          <li>Frontend - HTML5, CSS3, Bootstrap 3.3.7, FontAwesome- Addthis.com.</li>
          <li>Backend - PHP 7, Javascript, JQuery.</li>
          <li>Framework - Laravel 5.5. Blade - Migration - DompPDF - </li>
          <li>SGBD - 10.1.25-MariaDB OpenSource Antes MySQL.</li>
        </ol>
        <p align="justify">
          El uso del Framework Laravel 5.5 LTS proporcionará un entorno de forma profesional,
          adicionando un sin número de componentes de la comunidad de Open Source como son: Trello, Python. SQL. Postgres,
          Vagrant, Composer, Bootstrap, PHPUnit, Sonarqube, Jquery y demás que sean necesarias con la finalidad de
          optimizar el desarrollo web manteniendo estándares de calidad.
          <br>
          No siendo la única herramienta se aconseja el uso de un sistema de control de versionamiento
          o repositorio que permita ser una evidencia real del desarrollo en tiempo. Aunque parezca
          abrumadora la cantidad de herramientas mencionadas, su uso es práctico y su utilidad aporta a la
          calidad en diferentes aspectos de forma transversal, permitiendo que el uso de estas herramientas
          no solo sea una ventaja competitiva si no apalanque las etapas del diseño ingeniero generando un
          valor agregado a todo el grupo de trabajo.
          <br>
          Pese a que las Bases de Datos relacionales son una alternativa robusta de acuerdo con las
          necesidades de nuestro usuario final, la generación masiva de información cada vez menos
          estructurada, ha evidenciado nuevas oportunidades de mejora, las cuales estoy fortaleciendo mediante
          una certificación en BigData para adquirir habilidades en Analítica sobre sistemas Base de Datos no Relacionales.
        </p>
        <p align="center">
          <a href="https://www.edwinbeltrandev.wordpress.com" target="_blank">
            Acá encontraras mas información relevante sobre mis competencias laborales.
          </a>
        </p>
      </div>

      <div class="modal-footer">
        <button type="button" id="btnmodalclose" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal Bootstrap 2 -->
<div class="modal fade" id="myModal2" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Requisitos Mínimos</h4>
      </div>

      <div class="modal-body">
        <p align="justify">
          El desarrollo actual utiliza diferentes CDN suministraos por la Internet para su Frontend, si tiene novedades con la
          visualización. Favor verificar su conexión de Internet.
        </p>
        <h4>Requisitos Mínimos de Usuario</h4>
        <ol>
          <li>Conexión a Internet.</li>
          <li>Navegador de Internet. (Google Chrome 62.x, Internet Explorer 9)</li>
          <li>Microsoft Excel</li>
          <li>Lector de PDF</li>
        </ol>
        <h4>Requisitos Mínimos Técnicos</h4>
        <ol>
          <li>Servidor Web Xampp 3.2.2 o Similares</li>
          <li>MySQL o MariaDB</li>
          <li>PHP 7 en Adelante</li>
          <li>Composer</li>
          <li>Editor de Código (Atom)</li>
        </ol>
        <h4>CDN Utilizados</h4>
        <ol>
          <li>Bootstrap</li>
          <li>Jquery</li>
          <li>Addthis.com</li>
          <li>Fontawesome</li>
        </ol>
        <p align="justify">
          Si se presenta alguna duda, inquietud o sugerencia no dude contactar vía email al siguiente correo electrónico:
          mario-edwin@hotmail.com
        </p>
        <p align="center">
        <a class="btn btn-warning" href="{{url('pdf/manualt.pdf')}}" target="_blank">Descargar Manual Técnico!</a> <a class="btn btn-warning" href="{{url('pdf/manualu.pdf')}}" target="_blank">Descargar Manual Usuario!</a>
        </p>
      </div>

      <div class="modal-footer">
        <button type="button" id="btnmodalclose" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
  <!-- Script Animación NUmber Winner -->
  <script>
  setTimeout(function(){ var divwin = document.getElementById('numwin'); divwin.style.visibility="visible"; }, 500);
  setTimeout(function(){ var divnwin = document.getElementById('nomwin'); divnwin.style.visibility="visible"; }, 4200);
  $('.count').each(function () {
      $(this).prop('Counter',0).animate({
          Counter: $(this).text()
      }, {
          duration: 4000,
          easing: 'swing',
          step: function (now) {
              $(this).text(Math.ceil(now));
          }
      });
  });
  </script>
@endsection
