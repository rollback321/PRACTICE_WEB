<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content" style="padding-top: 10px;">
    <div class="container-fluid">
      <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
          <div class="card card-secondary card-tabs">
            <div class="card-header p-0 pt-1">
              <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link active" href="#activity" id="TabHojaInicio" data-toggle="tab"><img src="<?= base_url() ?>assets/dist/img/svg/noticias.svg" class="mb-1 " alt="proceso" style="margin-right: 3px;" width="15px"> Hojas de Ruta Creadas</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#timeline" id="TabHojaProceso" data-toggle="tab"><img src="<?= base_url() ?>assets/dist/img/svg/ajustes.svg" class="mb-1 " alt="proceso" style="margin-right: 3px;" width="18px">Hojas de Ruta En Proceso</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#settings" id="TabHojaSalida" data-toggle="tab"><img src="<?= base_url() ?>assets/dist/img/svg/carpeta.svg" class="mb-1 " alt="concluido" style="margin-right: 3px;" width="18px">Hojas de Ruta Concluidas</a>
                </li>
              </ul>
            </div>

            <div class="card-body p-2">
              <div class="tab-content">
                <div class="active tab-pane" id="activity">
                  <div class="container-fluid">
                    <figure class="highcharts-figure">
                      <div id="container"></div>
                      <p class="highcharts-description">
                        Chart demonstrating the use of a 3D pie layout.
                        The "Chrome" slice has been selected, and is offset from the pie.
                        Click on slices to select and unselect them.
                        Note that 3D pies, while decorative, can be hard to read, and the
                        viewing angles can make slices close to the user appear larger than they
                        are.
                      </p>
                    </figure>
                  </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="timeline">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-12">
                        <div class="card" style="margin-bottom: 6px;">
                          <div class="card-body p-2 table-responsive" style="width: auto;overflow-x: auto;">
                            <table id="example2" class="table  table-sm table-hover table-striped  table-bordered font-12 ">
                              <thead>
                                <tr>
                                  <th>ACCIONES</th>
                                  <th>CODIGO</th>
                                  <th>ESTADO<br>HOJA RUTA</th>
                                  <th>TIPO<br>CORRESP.</th>
                                  <th>REFERENCIA</th>
                                  <th>DESCRIPCION</th>
                                  <th>CATEGORIA</th>
                                  <th>HISTORIAL</th>
                                  <th>MAS DETALLES</th>
                                </tr>
                              </thead>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="settings">
                  <div class="container-fluid">
                    <figure class="highcharts-figure">
                      <div id="container"></div>
                      <p class="highcharts-description">
                        Chart demonstrating the use of a 3D pie layout.
                        The "Chrome" slice has been selected, and is offset from the pie.
                        Click on slices to select and unselect them.
                        Note that 3D pies, while decorative, can be hard to read, and the
                        viewing angles can make slices close to the user appear larger than they
                        are.
                      </p>
                    </figure>
                  </div>
                </div>
                <!-- /.tab-pane -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<!-- /.---------MODALES--------- -->