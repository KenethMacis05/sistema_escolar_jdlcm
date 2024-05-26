<div class="modal fade" id="modal_new_tutor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content bg-dark text-light">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo Tutor</h5>
                <button type="button" class="btn btn-danger btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/controllers/tutor.controller.php" method="POST">
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="priNombre" class="form-label">Primer Nombre</label>
                            <input type="text" class="form-control" id="priNombre" name="priNombre" required style="background-color: #E5E5E5;">
                        </div>
                        <div class="col-md-6">
                            <label for="segNombre" class="form-label">Segundo Nombre</label>
                            <input type="text" class="form-control" id="segNombre" name="segNombre" style="background-color: #E5E5E5;">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="priApellido" class="form-label">Primer Apellido</label>
                            <input type="text" class="form-control" id="priApellido" name="priApellido" required style="background-color: #E5E5E5;">
                        </div>
                        <div class="col-md-6">
                            <label for="segApellido" class="form-label">Segundo Apellido</label>
                            <input type="text" class="form-control" id="segApellido" name="segApellido" style="background-color: #E5E5E5;">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="cedula" class="form-label">Cédula</label>
                            <input type="text" class="form-control" id="cedula" name="cedula" required style="background-color: #E5E5E5;">
                        </div>
                        <div class="col-md-6">
                        <label for="telefono" class="form-label">Teléfono</label>
                            <input type="tel" class="form-control" id="telefono" name="telefono" required style="background-color: #E5E5E5;">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-12">
                            <label for="direccion" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" required style="background-color: #E5E5E5;">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="parentesco" class="form-label">Parentesco</label>
                            <select name="parentesco" id="parentesco" class="form-select" required style="background-color: #E5E5E5;">
                                <option value="">Parentesco</option>
                                <option value="1">Padré</option>
                                <option value="2">Madré</option>
                                <option value="3">Tutor Legal</option>
                            </select>                         
                        </div>
                        <div class="col-md-6">
                            <label for="correoElectronico" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="correo" name="correo" style="background-color: #E5E5E5;">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                            <i class="bi bi-x-lg"></i>
                            Cerrar
                        </button>
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-floppy-fill"></i>
                            Guardar cambios
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>