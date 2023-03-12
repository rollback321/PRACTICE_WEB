<style type="text/css">
  fieldset.scheduler-border {
    border: 1px groove #ddd !important;
    padding: 2px 2px 2px !important;
    margin: 0 0 0 0 !important;
    -webkit-box-shadow: 0px 0px 0px 0px #000;
    box-shadow: 0px 0px 0px 0px #000;

  }

  legend.scheduler-border {
    font-size: 12px !important;
    font-weight: bold !important;
    text-align: left !important;
    border: none;
    width: 100px;
  }
</style> <!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>
  <!-- Left navbar links -->
  <h4><?= $subTitle ?></h4>
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown user-menu dropdown-hover">
      <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        <?php

        if ($this->session->userdata('usu_genero') == 1) {
          echo '<img src="' . base_url() . 'assets/dist/img/plantilla/hombre-de-negocios.svg" class="user-image img-circle elevation-1" alt="User Image">';
        } else {
          echo '<img src="' . base_url() . 'assets/dist/img/plantilla/mujer.svg" class="user-image img-circle elevation-1" alt="User Image">';
        }

        ?>
        <span class="d-none d-md-inline"><?= $this->session->userdata('usu_nombres') . ' ' . $this->session->userdata('usu_apellidos') ?></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right text-break" style="left: inherit; right: 0px;">
        <li class="user-header bg-gray-dark">
          <?php

          if ($this->session->userdata('usu_genero') == 1) {
            echo '<img src="' . base_url() . 'assets/dist/img/plantilla/hombre-de-negocios.svg" class="img-circle elevation-2" alt="User Image">';
          } else {
            echo '<img src="' . base_url() . 'assets/dist/img/plantilla/mujer.svg" class="img-circle elevation-2" alt="User Image">';
          }

          ?>
          <p class="text-upercase">
            <?php
            if ($this->session->userdata('usu_nombres')) {
              $this->session->userdata('usu_nombres') . ' ' . $this->session->userdata('usu_apellidos');
            } else {
              echo 'Tiene que hacerse asignar un nombre';
            }
            ?>

            <?php
            if ($this->session->userdata('usu_nombres')) {
              echo '<div class="row text-center align-items-center justify-content-center p-1"><div class="col-auto"><i class="fas fa-circle text-success p-1 fa-sm"></i> ' . $this->session->userdata('usu_nombres') . ' ' . $this->session->userdata('usu_apellidos') . '</div></div>';
            } else {
              echo '<span class="bg-secondary  p-1">
                     Sin dependencia
                  </span>';
            }
            ?>

          </p>
        </li>
        <li class="user-body">
          <div class="row  ">
            <div class="col-12 ">
              <small>
                <p class="text-upercase text-capitalize ">
                <div class="row  align-items-center justify-content-center text-uppercase">
                  <div class="col-auto">
                    <div class="border-bottom pb-1">
                      <img src="<?php echo base_url(); ?>assets/dist/img/dependencia.svg" class="mb-2 " alt="dependencia" width="18px"><b class="px-1">DEPENDENCIA:</b>
                      <?php
                      if ($this->session->userdata('nameUnique')) {
                        echo $this->session->userdata('nameUnique');
                      } else {
                        echo '<span class="badge badge-secondary p-1">
                      Sin dependencia
                    </span>';
                      }
                      ?>
                    </div>
                    <div class="border-bottom pt-1">
                      <img src="<?php echo base_url(); ?>assets/dist/img/cargo.svg" class="mb-2 " alt="cargo" width="18px"><b class="px-1">CARGO:</b>
                      <?php
                      if ($this->session->userdata('rol_nombre')) {
                        echo $this->session->userdata('rol_nombre');
                      } else {
                        echo '<span class="badge badge-secondary p-1">
                      Sin Cargo
                    </span>';
                      }
                      ?>
                    </div>
                    <div class="border-bottom pt-1">
                      <img src="<?php echo base_url(); ?>assets/dist/img/luna.png" class="mb-2 " alt="cargo" width="18px"><b class="px-1">MODO OSCURO:</b>
                      <?php echo '<div class="form-group"> <div class="custom-control custom-switch">
                               <input type="checkbox" class="custom-control-input" id="' . $this->session->userdata('usu_rol_id') . '"  onclick="CambiarTema(' . $this->session->userdata('usu_rol_id') . ')" name="CheckTema" >
                               <label  id="LabelTema" class="custom-control-label" for="' . $this->session->userdata('usu_rol_id') . '"></label>
                               </div></div>';
                      ?>
                    </div>
                  </div>
                </div>
                </p>
              </small>
            </div>
          </div>
        </li>
        <li class="user-footer ">
          <a href="" class="btn btn-default btn-flat float-right bg-success" data-toggle="modal" data-target="#modal_cambiarpass" style=" margin-left:5px; font-size: .775rem!important; border-radius: 6px;padding: 0.15rem 0.2rem;"><i class="fas fa-lock"></i> Cambiar Password</a>
          <a href="<?= site_url("Welcome/close_session") ?>" class="btn btn-default btn-flat float-right bg-danger" style=" margin-left:2px; font-size: .775rem!important; border-radius: 6px;padding: 0.15rem 0.2rem;"><i class="fas fa-power-off px-1"></i>Cerrar sesión </a>
        </li>
      </ul>
    </li>



  </ul>
</nav>
<!-- /.navbar -->