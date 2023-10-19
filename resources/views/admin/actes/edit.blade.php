<!-- Large modal -->
<div class="modal fade bd-example-modal-lg-edit-{{$acte->id}}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Modifier cet acte académique</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row text-lg-end">
                    <span style="text-align: end;">Champs obligatoires <span style="color: red;">*</span> </span>
                </div>

                <form action="{{route('acte.update',$acte->id)}}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Code<span style="color: red;">*</span></label>
                        <input type="text" name="code" readonly value="{{ old('code') ? old('code') : $acte->code }}"
                            class="form-control" data-toggle="input-mask">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nom<span style="color: red;">*</span></label>
                        <input type="text" name="nom" value="{{ old('nom') ? old('nom') : $acte->nom }}"
                            class="form-control" data-toggle="input-mask">
                    </div>


                    @if($acte->acte_parent_id!=null)
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Catégorie parent (optionnel)</label>
                        <select class="form-select select2" data-toggle="select2"
                            aria-placeholder="Sélectionner un acte parent" id="acte_parent_id" name="acte_parent_id">

                            <option value="0">Pas de sous-catégorie</option>
                            @forelse ($actes as $act)
                            @if ($act->acte_parent_id==null)
                            <option value="{{ $act->id }}" {{ $act->id == $acte->acte_parent_id ? 'selected' : '' }}>
                                {{ $act->nom }}</option>
                            @endif
                            @empty
                            Ajouter un acte parent
                            @endforelse
                        </select>
                    </div>
                    @endif

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </div>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>