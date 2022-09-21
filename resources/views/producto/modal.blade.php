<div class="modal fade" id="modal-update-producto-{{$producto->id_producto}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-tittle">Actualizar producto</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>

            </div>
            <form action="update_producto" method="POST">
                {{ csrf_field()}}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Categoria</label>
                        <input type="text" name="nombre_categoria" class="form-control" id="producto" value="{{$producto->nombre_producto}}">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="" data-dismiss="model">Cerrar</button>
                    <button type="button" class="">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>