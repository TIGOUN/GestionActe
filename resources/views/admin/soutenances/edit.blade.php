<div class="modal fade bd-example-modal-lg-edit-{{$soutenance->id}}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-header w-100">
                    <h5 class="modal-title" id="defaultModalLabel">Modifier cette programmation de soutenance</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <div class="row justify-content-end mx-4">
                    <span style="text-align: end;">Champs obligatoires <span style="color: red;">*</span> </span>
                </div>

                <form action="{{route('soutenance.update', $soutenance->id)}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Session<span style="color:red;">*</span></label>
                        <input type="text" name="session" required
                            value="{{ old('session') ? old('session') : $soutenance->session }}"
                            class="form-control @error('session') is-invalid @enderror">
                        @error('session')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Date de début<span
                                style="color:red;">*</span></label>
                        <input type="date" name="date_debut" required
                            value="{{ old('date_debut') ? old('date_debut') : $soutenance->date_debut }}"
                            class="form-control @error('date_debut') is-invalid @enderror">
                        @error('date_debut')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Date de fin<span style="color:red;">*</span></label>
                        <input type="date" name="date_fin" required
                            value="{{ old('date_fin') ? old('date_fin') : $soutenance->date_fin }}"
                            class="form-control @error('date_fin') is-invalid @enderror">
                        @error('date_fin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" style="font-size: large;">Fichier<span
                                style="color:red;">*</span></label>
                        <input type="file" name="fichier" class="form-control @error('fichier') is-invalid @enderror">
                        @error('fichier')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>