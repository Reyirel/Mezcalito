<!-- Modal edita registro -->
<div class="modal fade" id="editaModal" tabindex="-1" aria-labelledby="editaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editaModalLabel">Editar Estatus</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="actualiza.php" method="post" enctype="multipart/form-data">

                    <input type="hidden" id="id_Reservacion" name="id_Reservacion">
                    <input type="hidden" id="id_Cliente" name="id_Cliente">
                    <input type="hidden" id="id_Asignar" name="id_Asignar">
                    <input type="hidden" id="hora_Programada" name="hora_Programada">
                    <input type="hidden" id="fecha_Programada" name="fecha_Programada">
                    <input type="hidden" id="no_Invitados" name="no_Invitados">
                    

                    <div class="mb-1">
                        <label for="estado_Reservacion" class="form-label">Estatus:</label>
                        <select name="estado_Reservacion" id="estado_Reservacion" class="form-select  form-select-sm" required>
                            <option value="Aceptada">Aceptada</option>
                            <option value="Finalizada">Finalizada</option>
                            <option value="Cancelada">Cancelada</option>
                            
                        </select>
                    </div>

                    <div class="d-flex justify-content-end pt2">
                        <button type="button" class="btn btn-secondary me-1" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary ms-1"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>