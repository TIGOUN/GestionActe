<!-- Large modal -->
<div class="modal fade bd-example-modal-lg-edit-{{$departement->id}}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Modifier ce département</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row text-lg-end">
                    <span style="text-align: end;">Champs obligatoires <span style="color: red;">*</span> </span>
                </div>

                <form action="{{route('departement.update',$departement->id)}}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Code du département<span style="color: red;">*</span></label>
                        <input type="text" name="code" readonly
                            value="{{ old('code') ? old('code') : $departement->code }}" class="form-control"
                            data-toggle="input-mask">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nom du département<span style="color: red;">*</span></label>
                        <input type="text" name="nom" value="{{ old('nom') ? old('nom') : $departement->nom }}"
                            class="form-control" data-toggle="input-mask">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </div>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>