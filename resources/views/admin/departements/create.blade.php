<div class="modal fade bd-example-modal-lg-create" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Ajouter un département</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <span style="text-align: end;">Champs obligatoires <span style="color: red;">*</span> </span>
                </div>
                <form action="{{route('departement.store')}}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Code du département<span style="color: red;">*</span></label>
                        <input type="text" readonly name="code" class="form-control"
                            value="<?php echo substr(md5(rand(0, 1000000)), 0, 4); ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nom du département<span style="color: red;">*</span></label>
                        <input type="text" name="nom" class="form-control" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Ajouter un nouveau département</button>
                    </div>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->