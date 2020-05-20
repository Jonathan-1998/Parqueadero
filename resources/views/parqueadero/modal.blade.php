<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Parqueadero</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="#" method="post" id="formulario">
                @csrf
                <input type="hidden" name="id" id="id">
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Nombre del Parqueadero:</label>
                        <input type="text" class="form-control" name="nombre" id="nombre">
                    </div>
                </div>
            
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Puesto auto: </label>
                        <input type="text" class="form-control" name="puesto_auto" id="puesto_auto">
                    </div>
                </div>
            
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Puesto moto: </label>
                        <input type="text" class="form-control" name="puesto_moto" id="puesto_moto">
                    </div>
                </div>           
                
            
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" id="actualizar">Editar Parqueadero</button>
        </div>
      </div>
    </div>
  </div>