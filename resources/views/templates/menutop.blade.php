@section('menutop')
   <!-- Navbar -->
   <nav id="menu_top" name="menu_top" class="main-header navbar navbar-expand navbar-dark navbar-danger">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
  
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!--
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
      -->
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
      <li class="nav-item" style="width: 250px;">
        <div class="image" style="float: left">
          <img src="<?php //echo $foto_usuario;?>https://aasoruro.com/wp-content/uploads/2019/05/cropped-cabezaaguila2-1-32x32.png" class="img-circle elevation-2" style="width: 40px" alt="Usuario">
        </div>
        <div style="color:#fcfcfc; padding:8px 0px 0px 10px;"> &nbsp;&nbsp;{{session('Nombre_Persona')}} {{session('Ap_Paterno_Persona')}}</div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="salir.php" role="button"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();"><i
            class="fas fa-sign-out-alt"></i></a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

@endsection 

