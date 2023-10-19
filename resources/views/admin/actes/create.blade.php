<div class="modal fade bd-example-modal-lg-create" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-header w-100">
                    <h5 class="modal-title" id="defaultModalLabel">Ajouter un acte académique</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <div class="row justify-content-end mx-4">
                    <span style="text-align: end;">Champs obligatoires <span style="color: red;">*</span> </span>
                </div>
                <form action="{{route('acte.store')}}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Code<span style="color:red;">*</span></label>
                        <input type="text" name="code" class="form-control"
                            value="<?php echo substr(md5(rand(0, 1000000)), 0, 6); ?>" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Nom<span style="color:red;">*</span></label>
                        <input type="text" name="nom" class="form-control @error('nom_acte') is-invalid @enderror">
                        @error('nom')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="form-label">Catégorie parent (optionnel)</label>
                        <select class="form-select form-control"
                            placeholder="Sélectionner un acte académique parent parent" id="acte_parent_id"
                            name="acte_parent_id">
                            <option value="0">Pas de sous-catégorie</option>
                            @foreach ($actes as $acte)
                            @if ($acte->acte_parent_id==null)
                            <option value="{{ $acte->id }}">{{ $acte->nom }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Ajouter un nouvel acte académique</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>