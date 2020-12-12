@section('menu')
<?php 
$menu=array();
$menu= array (
  //Etiquetamenu;modulo;icono;comando_defecto;permisos
  "Portada;portada;fa-tachometer-alt;listar;1,2,3,4,5",
  "Usuarios;adm;fa-user;listar;1,2",
  "Cursos;fcurso;fa-home;listar;1,2",
  "Comunicados;comunicados;fa-user;listar;1,2",
  "Grupo4;grupo4;fa-user;listar;1,2",
  "Grupo1;grupo1;fa-user;listar;1,2",
  "Grupo2;grupo2;fa-user;listar;1,2",
);
?>
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="./" class="brand-link navbar-danger">
        <img src="https://aasoruro.com/wp-content/uploads/2019/05/cropped-cabezaaguila2-1-32x32.png" alt="Plataforma Digital" class="brand-image"
             style="opacity: .8">
        <span class="brand-text" style="color: white">AAS<?php //echo $logo_empresa_largo; ?></span>
      </a>
  
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?php //echo $foto_usuario;?> https://aasoruro.com/wp-content/uploads/2019/05/cropped-cabezaaguila2-1-32x32.png" class="img-circle elevation-2" alt="Usuario">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php //echo $_SESSION["Nombre_Usuario"];?></a>
            <small style="color: white">
                <i class="fa fa-circle text-success" style="font-size: 0.7em"></i> <?php //echo $_SESSION["Cargo_Nivel"];?>
            </small>
          </div>
        </div>
  
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li style="text-align: center; font-size:0.8em; color:#A0A1A2; background-color:#22293C; padding: 6px;border-radius: 5px;">MENÚ PRINCIPAL</li>
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <?php  
            foreach ($menu as $clave => $valor) { 
              $menu_items=explode(";", $valor);
  
              $menu_activo="";
              if (isset($modulo) and ($modulo==$menu_items[1])) {
                $menu_activo=" active";
              }
                $permisos=explode(",",$menu_items[4]);
                //if (in_array($_SESSION["Nivel_Usuario"], $permisos)) {
  
            ?>
                  <li class="nav-item">
                    <a href="<?php echo $menu_items[1]; ?>" class="nav-link <?php echo $menu_activo;?>">
                      <i class="nav-icon fas <?php echo $menu_items[2]; ?>"></i>
                      <p>
                        <?php echo $menu_items[0]; ?>
                      </p>
                    </a>
                  </li>
            <?php
               // } // de los permisos
            } 
            ?>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
@endsection