<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Menu Administrador | Inicio</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ URL::asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="adminlte/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('css/estilos.css') }}" />
  <link rel="stylesheet" href="{{ URL::asset('adminlte/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="{{ URL::asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet') }}">
  
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-light" style="background: linear-gradient(315deg, #48515f, #2b323a)">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/Inicio" class="nav-link">Inicio</a>
      </li>
    </ul>

    <!-- SEARCH FORM 
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
 
      <!-- Notifications Dropdown Menu -->
      <!-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">1</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">1 Notificacion</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 nuevos reportes
            <span class="float-right text-muted text-sm">2 dias</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">Ver todas las notificaciones</a>
        </div>
      </li> -->

      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
            class="fas fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-5" style="background: #343a40)">
    <!-- Brand Logo -->
    <a href="/Inicio" class="brand-link" style="border-bottom: 2px solid #c2c0c0d0"> 
      <img src="{{ URL::asset('/img/Copec_Logo.svg')}}" alt="Copec Logo" class="brand-image elevation-5"
           style="opacity: .9;">
      <span><br></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" >
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="border-bottom: 1px solid #c2c0c0">
        <div class="image" >
          <img src="{{ URL::asset('adminlte/img/default-user.png')}}" class="img-circle elevation-2" alt="Imagen usuario">
        </div>
        <div class="info">
          <a href="/Inicio" class="d-block font-weight-bold" style="font-size: 1.1em">{{session('usuario')}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a class="nav-link active pt-3 mb-3 elevation-3" style="background: rgba(158, 175, 252, 0.384); text-align:center"> 
              <h5>
                <i class="nav-icon fas fa-th pr-2"></i><b>Administración</b>
              </h5>
            </a>
          </li>
          <li class="nav-item">
            <a href="/listaratendedores" class="nav-link  mt-1 mb-2">
              <i class="fas fa-users-cog nav-icon"></i>
              <p>
                Ir a Atendedores
              </p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="/menuHorario" class="nav-link  mt-1 mb-2">
              <i class="far fa-calendar-minus nav-icon"></i>
              <p>Ir a Horarios y Turnos</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/verjornada" class="nav-link  mt-1 mb-2">
              <i class="far fa-clock nav-icon"></i>
              <p>
                Jornada
              </p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="/cargartransaccion" class="nav-link  mt-1 mb-2">
              <i class="fas fa-file-upload nav-icon"></i>
              <p>
                Cargar Transacciones
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/cerrar_sesion" id="cerrarsesion" name="cerrarsesion" class="nav-link  mt-1 mb-2">       
              <i class="fas fa-sign-out-alt nav-icon"></i>
              <p>Salir</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
   
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/Inicio">Inicio</a></li>
              <li class="breadcrumb-item active" id="nombrePag">Página principal</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      @yield('content')
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <!--<aside class="control-sidebar control-sidebar-dark">
   
    <div class="p-3">
      <h5>Informacion adicional</h5>
      <div class="date">
        <span id="weekDay" class="weekDay"></span>, 
        <span id="day" class="day"></span> de
        <span id="month" class="month"></span> del
        <span id="year" class="year"></span>
    </div>
    <div class="clock">
        <span id="hours" class="hours"></span> :
        <span id="minutes" class="minutes"></span> :
        <span id="seconds" class="seconds"></span>
    </div>
    </div>

    <div class="row m-3">
      <div class="col-sm-6">
        as
      </div>
      <div class="col-sm-6">
        as
      </div>
    </div>
  </aside>-->
  
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Página Web desarrollada por...
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2020 <a href="https://ww2.copec.cl/#/">Copec</a>.</strong> Todos los derechos reservados.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ URL::asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap 4 -->
<script src="{{ URL::asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ URL::asset('adminlte/js/adminlte.min.js') }}"></script>
<!-- SweetAlert -->
<script src="{{ URL::asset('//cdn.jsdelivr.net/npm/sweetalert2@10') }}"></script>

<!--Reloj js -->
<!-- <script>
  
  var udateTime = function() {
    let currentDate = new Date(),
      hours = currentDate.getHours(),
      minutes = currentDate.getMinutes(), 
      seconds = currentDate.getSeconds(),
      weekDay = currentDate.getDay(), 
      day = currentDate.getDay(), 
      month = currentDate.getMonth(), 
      year = currentDate.getFullYear();
 
    const weekDays = [
      'Domingo',
      'Lunes',
      'Martes',
      'Miércoles',
      'Jueves',
      'Viernes',
      'Sabado'
    ];
 
    document.getElementById('weekDay').textContent = weekDays[weekDay];
    document.getElementById('day').textContent = day;
 
    const months = [
      'Enero',
      'Febrero',
      'Marzo',
      'Abril',
      'Mayo',
      'Junio',
      'Julio',
      'Agosto',
      'Septiembre',
      'Octubre',
      'Noviembre',
      'Diciembre'
    ];
 
    document.getElementById('month').textContent = months[month];
    document.getElementById('year').textContent = year;
    document.getElementById('hours').textContent = hours;
 
    if (minutes < 10) {
      minutes = "0" + minutes
    }
 
    if (seconds < 10) {
      seconds = "0" + seconds
    }
 
    document.getElementById('minutes').textContent = minutes;
    document.getElementById('seconds').textContent = seconds;
  };
 
  udateTime();
  setInterval(udateTime, 1000);
</script> -->

<!-- dataTable -->
<script src="{{ URL::asset('https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js')}}"></script>
<script src="adminlte/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>


</body>
</html>

