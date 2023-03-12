<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="javascript:void(0);" class="brand-link">
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
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<?php
				foreach ($level1 as $level_1) {
					echo '<li class="nav-item" style="font-size: 12px;" id="liSecretaria'. $level_1->niv1_id.'">
					   <a href="#" class="nav-link"  id="link-'. $level_1->niv1_id.'"  onclick="displayLevel_1(' . $level_1->niv1_id . ',\'' . $level_1->niv1_nombre . '\',\'' . $level_1->niv1_sigla . '\')">
							<i class="nav-icon fas fa-sitemap fa-1x"></i>
							<p>
								' . $level_1->niv1_nombre . '   <i class="right fas fa-angle-left"></i>
							</p>
						</a>
					  <ul class="nav nav-treeview" id="ulDirecciones-'. $level_1->niv1_id.'" >
				        </ul>
				</li>';
				}
				?>
			</ul>


		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>