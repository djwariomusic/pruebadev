@extends('layouts.app')

@section('style')
<!-- Estilos Formulario de Registro-->
<style>
  input[type=text],input[type=number],input[type=email], select {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
  }

  input[type=submit] {
      width: 60%;
      background-color: #4CAF50;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
  }

  input[type=submit]:hover {
      background-color: #45a049;
  }
</style>
@endsection

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
    <img src="img/banners-02.jpg" class="img-responsive"/>

    <div class="jumbotron" style="background-image: url('img/backgroundform.jpg');">
    <!-- Formulario de Registro-->
          <form action="{{url('/registrar')}}" method="post" name="form">
            {{ csrf_field() }}
          <div class="col md-12">
            <table width="60%" align="center">
              <tr>
                <td><h2><b><i class="fas fa-address-card" style="color: #00BFFF;"></i> FORMULARIO DE REGISTRO</b></h2></td>
              </tr>
              <tr>
                <td><b>Nombres:</b></td>
              </tr>
              <tr>
                <td><input type="text" name="name" placeholder="  Ingresar Nombres" pattern="[A-Z]{3-20}" maxlength="50" required></td>
              </tr>
              <tr>
                <td><b>Apellidos:</b></td>
              </tr>
              <tr>
                <td><input type="text" name="lastname"  placeholder="  Ingresar Apellidos" pattern="[A-Z]{3-20}" maxlength="50" required></td>
              </tr>
              <tr>
                <td><b>No Documento Identificación:</b></td>
              </tr>
              <tr>
                <td><input type="number" name="cc"  placeholder="  Ingresar Cedula"  maxlength="15" required></td>
              </tr>
              <tr>
                <td><b>Departamento de Nacimiento:</b></td>
              </tr>
              <tr>
                <td>
                <select name="depa_nac" id="depa_nac"  required title="Seleccione Departamento de Nacimiento">
    								<option disabled selected value> -- Seleccionar Opción -- </option>
    								<option value="Amazonas"> Amazonas </option>
    								<option value="Antioquia"> Antioquia </option>
    								<option value="Arauca"> Arauca </option>
    								<option value="Atlántico"> Atlántico </option>
    								<option value="Bogota D.C"> Bogota D.C </option>
    								<option value="Bolívar"> Bolívar </option>
    								<option value="Boyacá"> Boyacá </option>
    								<option value="Caldas"> Caldas </option>
    								<option value="Caquetá"> Caquetá </option>
    								<option value="Casanare"> Casanare </option>
    								<option value="Cauca"> Cauca </option>
    								<option value="Cesar"> Cesar </option>
    								<option value="Chocó"> Chocó </option>
    								<option value="Córdoba"> Córdoba </option>
    								<option value="Cundinamarca"> Cundinamarca </option>
    								<option value="Guainía"> Guainía </option>
    								<option value="Guaviare"> Guaviare </option>
    								<option value="Huila"> Huila </option>
    								<option value="La Guajira"> La Guajira </option>
    								<option value="Magdalena"> Magdalena </option>
    								<option value="Meta"> Meta </option>
    								<option value="Nariño"> Nariño </option>
    								<option value="Norte de Santander"> Norte de Santander </option>
    								<option value="Putumayo"> Putumayo </option>
    								<option value="Quindio"> Quindio </option>
    								<option value="Risaralda"> Risaralda </option>
    								<option value="San Andres y Providencia"> San Andres </option>
    								<option value="Santander"> Santander </option>
    								<option value="Sucre"> Sucre </option>
    								<option value="Tolima"> Tolima </option>
    								<option value="Valle del Cauca"> Valle del Cauca </option>
    								<option value="Vaupés"> Vaupés </option>
    								<option value="Vichada"> Vichada </option>
								</select>
                </td>
              </tr>
              <tr>
                  <td><b>Ciudad de Nacimiento:</b></td>
              </tr>
              <tr>
                <td>
                <select name="ciud_nac" id="ciud_nac" required title="Seleccione Ciudad de Nacimiento">
    								<option disabled selected value> -- Seleccionar Opción -- </option>
    								<option value="Leticia"> Leticia </option>
    								<option value="El Encanto"> El Encanto </option>
    								<option value="La Chorrera"> La Chorrera </option>
    								<option value="La Pedrera"> La Pedrera </option>
    								<option value="La Victoria"> La Victoria </option>
    								<option value="Miriti - Parana"> Miriti - Parana </option>
    								<option value="Puerto Alegria"> Puerto Alegria </option>
    								<option value="Puerto Arica"> Puerto Arica </option>
    								<option value="Puerto Nariño"> Puerto Nariño </option>
    								<option value="Puerto Santander"> Puerto Santander </option>
    								<option value="Tarapaca"> Tarapaca </option>
								</select>
                </td>
              </tr>
              <tr>
                <td><b>No Celular</b></td>
              </tr>
              <tr>
                <td><input type="number" name="cellphone"  placeholder="  Ingresar Numero"  maxlength="15" required></td>
              </tr>
                <td><b>Email:</b></td>
              </tr>
              <tr>
                <td><input type="email" name="email" placeholder="  Ingresar Correo Electronico" maxlength="50"  required>
                <!-- Dato Clave Oculto-->
                <input type="hidden" name="password" value="2017">
                </td>
              </tr>
              <tr>
                <td><b>Proteccion de Datos:</b></td>
              </tr>
              <tr>
                <td width="60%" style="text-align:justify">Con la aceptación de envio del presente formulario manifiesto que he sido informado por EDWINBELTRANDEV de que:
                  Actuarán como Responsables del Tratamiento de datos personales de los cuales soy titular y que, conjunta o separadamente
                  podrán recolectar, usar y tratar mis datos personales conforme la Política de Tratamiento de Datos de acuerdo a la Normatividad
                  Ley 1581 de 2012 de Colombia. Si esta de acuerdo con la Política de Tratamiento de Datos, seleccionar aceptar y finalizar con el registro.
                </td>
              </tr>
              <tr>
                <td>
                  <input type="radio" name="accepthd" value="1" required/> Acepto
                  <input type="radio" name="accepthd" value="0" required/> No Acepto<br>
                </td>
              </tr>
            </table>
          </div>
          <br><br><br><br>
          <p align="center">
            <input class="btn btn-lg btn-success" type="submit" value="FINALIZAR">
          </p>
          </form>
  </div>
@endsection
@section('scripts')
<!-- Script AJAX Depa Ciudad-->
<script type="text/javascript">
    $(document).ready(function(){
      $("#depa_nac").change(function () {
         $("#depa_nac option:selected").each(function () {
          elegido=$(this).val();
          $.post("{{url('js/modelos.php')}}", { elegido: elegido }, function(data){
          $("#ciud_nac").html(data);
          });
      });
    })
  });
</script>
@endsection
