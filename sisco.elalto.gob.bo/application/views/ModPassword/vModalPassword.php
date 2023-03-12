<div class="modal fade" id="modal_cambiarpass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
          <h5 class="modal-title"><b><i class="fas fa-user"></i> Cambiar Password <b></h5>
            <div class="card-tools mr-2">
              </span>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
          <form id="form_cambiarpass" class="mb-0" method="post">
            <div class="modal-body">
              <div id="load_cambiarpass" class="row align-items-center justify-content-center">
                <div class="fa-3x">
                  <i class="fas fa-circle-notch fa-spin"></i> Procesando...
                </div>
              </div>
              <div class="col-md-12 font-13">
                <div class="form-group">
                  <fieldset class="fieldset_Content_tema">
                    <legend class="legend_tema">Bienvenido&nbsp;</legend>
                    <div class="form-row">
                      <div class="form-group col-md-5">
                      <label for="inputPassword4"> <i class="fas fa-key"></i><i class="fas fa-lock"></i> Nueva Contraseña</label>
                        <input type="password" class="form-control form-control-sm" id="Newpassword" name="Newpassword" placeholder="Nueva Contraseña" required>
                      </div>
                      <div class="form-group col-md-5">
                      <label for="inputPassword4"> <i class="fas fa-key"></i><i class="fas fa-lock"></i> Repetir Contraseña</label>
                        <input type="password" class="form-control form-control-sm" id="Newpassword2" name="Newpassword2" placeholder="Repetir Nueva Contraseña" required>
                      </div>
                    </div>
                  </fieldset>
                  <div class="modal-footer">
                    <button type="button" class="btn  btn-sm btn-danger" data-dismiss="modal"><i class="far fa-times-circle"></i> Cancelar</button>
                    <button type="submit" class="btn btn-sm btn-primary float-right" id="ButtonModificarPass"><i class="fas fa-check"></i> Cambiar </button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>