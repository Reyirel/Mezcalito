<!-- Modal edita registro -->
<div class="modal fade" id="eliminaModal_S" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="eliminaModalLabel">Eliminar sugerencia de Cliente</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Desea eliminar la sugerencia?                
            </div>
            <div class="modal-footer">
            <form action="elimina.php" method="post">

                <input type="hidden" id="id_Sugerencias" name="id_Sugerencias">
                    <button type="button" class="btn btn-secondary me-1" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary ms-1"><i class="fa-solid fa-floppy-disk"></i> Eliminar </button>
                </form>


            </div>

        </div>
    </div>
</div>