<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="<?=site_url("TechnicalControl");?>" class="brand-link">
		<img src="<?php echo base_url(); ?>assets/dist/img/plantilla/logo.png" alt="LOGO GAMEA"
			 class="brand-image img-circle elevation-3" style="opacity: .8">
		<span class="brand-text font-weight-light"></span>SISCO</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<?php
				if (strcmp($this->session->userdata('usu_genero'), "1") == 0)
					echo '<img src="' . base_url() . '/assets/dist/img/plantilla/hombre-de-negocios.svg" class="img-circle elevation-2" alt="User Image">';
				else
					echo '<img src="' . base_url() . '/assets/dist/img/plantilla/mujer.svg" class="img-circle elevation-2" alt="User Image">';
				?>
			</div>
			<div class="info">
				<a href="#" class="d-block"><?= $this->session->userdata('usu_nombres') ?></a>
			</div>
		</div>


		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
					 with font-awesome or any other icon font library -->
				<li class="nav-item">
					<a href="<?=site_url("TechnicalControl/");?>" class="nav-link <?=$active[0];?>">
						<i class="nav-icon fas fa-envelope-square"></i>
						<span class="badge badge-danger" id="spancontador"></span>
						<p>
							Bandeja Hoja de Ruta
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?=site_url("TechnicalControl/crearHojaRuta");?>" class="nav-link <?=$active[1];?>">
						<i class="nav-icon fas fa-file-signature"></i>
						<p>
							Crear Hoja de Ruta
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= site_url("TechnicalControl/contactos");?>" class="nav-link <?=$active[2];?>">
					<i class="nav-icon fas fa-phone-alt"></i>
						<p>
							Contactos GAMEA
							<span class="badge badge-info right">Nuevo</span>
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?=site_url("TechnicalControl/searchHojaRuta");?>" class="nav-link <?=$active[3];?>">
						<i class="nav-icon fas fa-search-location"></i>
						<p>
							Buscar Hoja de Ruta
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?=site_url("TechnicalControl/tutoriales");?>" class="nav-link <?=$active[4];?>">
						<i class="nav-icon fab fa-youtube"></i>
						<p>
						Tutoriales
						</p>
					</a>
				</li>
				<!-- <li class="nav-item">
					<a href="<?php // site_url("Welcome/close_session") ?>" class="nav-link">
						<i class="nav-icon fas fa-power-off"></i>

						<p>Cerrar Sesion</p>
					</a>
				</li> -->
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
