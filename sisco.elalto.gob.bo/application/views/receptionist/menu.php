<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="<?= site_url("SecretaryControl"); ?>" class="brand-link">
		<img src="<?php echo base_url(); ?>assets/dist/img/plantilla/logo.png" alt="LOGO GAMEA" class="brand-image img-circle elevation-3" style="opacity: .8">
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
		<nav class="mt-2 ">
			<ul class="nav nav-pills nav-sidebar flex-column text-sm" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
					 with font-awesome or any other icon font library -->
				<li class="nav-item">
					<a href="<?= site_url("SecretaryControl/"); ?>" class="nav-link <?= $active[0]; ?>">
						<i class="nav-icon fas fa-envelope-square"></i>
						<span class="badge badge-danger" id="spancontador"></span>
						<p>
							Bandeja Hoja de Ruta
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= site_url("SecretaryControl/crearHojaRuta"); ?>" class="nav-link <?= $active[1]; ?>">
						<i class="nav-icon fas fa-file-signature"></i>
						<p>
							Crear Hojas de Ruta
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= site_url("SecretaryControl/AdministrarHojas"); ?>" class="nav-link <?= $active[2]; ?>">
						<i class="nav-icon fas fa-network-wired"></i>
						<p>
							Control Hojas Ruta
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link <?= $active[3]; ?>">
						<i class="nav-icon fas fa-file-invoice"></i>
						<p>
							Reportes <i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= site_url("SecretaryControl/reportes"); ?>" class="nav-link ">
								<i class="nav-icon far fa-circle text-warning"></i>
								<p>
									Externo
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= site_url("SecretaryControl/reportesInterno"); ?>" class="nav-link">
								<i class="nav-icon far fa-circle text-warning"></i>
								<p>
									Interno
								</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<a href="<?= site_url("SecretaryControl/contactos"); ?>" class="nav-link <?= $active[4]; ?>">
						<i class="nav-icon fas fa-phone-alt"></i>
						<p>
							Contactos GAMEA
							<span class="badge badge-info right">Nuevo</span>
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= site_url("SecretaryControl/adminUser"); ?>" class="nav-link <?= $active[5]; ?>">
						<i class="nav-icon fas fa-user-friends"></i>
						<p>
							Mis Tecnicos(as)
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="<?= site_url("SecretaryControl/searchHojaRuta"); ?>" class="nav-link <?= $active[6]; ?>">
						<i class="nav-icon fas fa-search-location"></i>
						<p>
							Buscar Hoja de Ruta
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="<?= site_url("SecretaryControl/tutoriales"); ?>" class="nav-link <?= $active[7]; ?>">
						<i class="nav-icon fab fa-youtube"></i>
						<p>
							Tutoriales
						</p>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>