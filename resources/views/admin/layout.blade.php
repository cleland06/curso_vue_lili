
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{config('app.name')}}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta  name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" href="/img/logo-geekstore.png">
  <link rel="stylesheet" href="/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/adminlte/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/adminlte/dist/css//adminlte.min.css">
 
  <link rel="stylesheet" href="/adminlte/bower_components/select2/dist/css/select2.min.css">
  
  <link rel="stylesheet" href="/adminlte/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.css">

  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

  <link rel="stylesheet" href="css/flexGrids.css">
  <link rel="stylesheet" href="/adminlte/bower_components/cheecktree/css/checktree.css">


  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="fixed sidebar-mini sidebar-mini-expand-feature skin-blue-light sidebar-collapse">
  <div id="app">


    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>Curso Vue</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>{{config('app.name')}}</span>
        </a>
        
        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->

                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs">{{auth()->user()->email}}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">


                    <p>
                      {{auth()->user()->email }}
                      <small>Desde {{ auth()->user()->created_at->format('d/M/Y') }}</small>
                    </p>
                  </li>
                 
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <form action="{{ route('logout') }}" method="post">
                      {{ csrf_field() }}
                      <button type="submit" class="btn btn-default btn-flat btn-block">Cerrar Sesión</button>
                    </form>
                  </li>
                </ul>
              </li>

            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">

              <p>{{auth()->user()->name}} 
              </p>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>

          </div>

          <!-- Sidebar Menu -->
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">NAVEGACIÓN</li>
            <!-- Optionally, you can add icons to the links -->
            <li ><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> <span>Inicio</span></a></li>            

            <router-link tag="li" :to="{name:'productos'}"><a href="#"><i class="fa fa-building"></i>Productos</a></router-link>

            <router-link tag="li" :to="{name:'ventas.create'}"><a href="#"><i class="fa  fa-shopping-cart"></i>Ventas</a></router-link>
     
        </ul>
          <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        

        <!-- Main content -->
        <section class="content container-fluid">          
          <!--------------------------
            | Your Page Content Here |
            -------------------------->
            @if(session()->has('flash'))
            <div class="alert alert-success">{{session('flash')}}</div>
            @endif
            <div style="min-height: 100vh">              
              <transition name="slide-fade">             
                
                <router-view ></router-view>
                
              </transition>
            </div>
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
            Curso Vue
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2018 <a href="#">GeekSors</a>.</strong> Todos los derechos reservados.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        
      </aside>
      <!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
      immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div>
<!-- ./wrapper -->


  <div id="modal-form" class="modal fade in" >
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">IMPRESIONES</h4>
        </div>
        <div class="modal-body" >
          <div id="loaderImprimir" style="text-align: center" class="center">
            <img src="/img/spinner.gif" alt="loader">
            <h3>Cargando...</h3>
          </div>
            
            <div id="contentImprimir" style="min-height: 300px"></div>
            
        </div>
        <div id="footer-modal-print" class="modal-footer">
          <div id="btnImprimir"><button onclick="$('div#contentImprimir').printArea();" class="btn btn-block btn-warning">Imprimir</button></div>
        </div>
      </div>

    </div>
  </div>

<!-- REQUIRED JS SCRIPTS -->

  </div> {{-- fin del id app --}}
<!-- jQuery 3 -->

{{-- esto es para agregar el archivo app js que guarda en  --}}
  <script src="{{ mix('js/app.js') }}"></script>
<script src="/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/adminlte/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="/adminlte/bower_components/cheecktree/js/checktree.js"></script>
<script src="/adminlte/bower_components/printArea/jquery.PrintArea.js"></script>
<script src="/adminlte/bower_components/jqPrint.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script  src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script  src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script  src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="/js/funciones.js"></script>


<!-- /adminlte App -->
<script src="/adminlte/dist/js//adminlte.min.js"></script>


</body>
</html>