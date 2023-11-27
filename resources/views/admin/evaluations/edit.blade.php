<div class="modal fade bd-example-modal-lg-edit-{{$evaluation->id}}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-header w-100">
                    <h5 class="modal-title" id="defaultModalLabel">Modifier cette programmation d'évaluations</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <div class="row justify-content-end mx-4">
                    <span style="text-align: end;">Champs obligatoires <span style="color: red;">*</span> </span>
                </div>

                <form action="{{route('evaluation.update', $evaluation->id)}}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Session<span style="color:red;">*</span></label>
                        <input type="text" name="session" required
                            value="{{ old('session') ? old('session') : $evaluation->session }}"
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
                            value="{{ old('date_debut') ? old('date_debut') : $evaluation->date_debut }}"
                            class="form-control @error('date_debut') is-invalid @enderror">
                        @error('date_debut')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>



                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Niveau scolaire<span
                                style="color:red;">*</span></label>
                        <select type="date" name="classe" required
                            class="form-select form-control @error('classe') is-invalid @enderror">
                            <option>Selectionner le niveau scolaire</option>
                            <option value="Première année"
                                {{ $evaluation->classe =="Première année" ? 'selected' : ""}}>Premième année</option>
                            <option value="Deuxième année"
                                {{ $evaluation->classe =="Deuxième année" ? 'selected' : ""}}>Deuxième année</option>
                            <option value="Troisième année"
                                {{ $evaluation->classe =="Troisième année" ? 'selected' : ""}}>Troisième année
                            </option>
                            <option value="Master 1 année"
                                {{ $evaluation->classe =="Master 1 année" ? 'selected' : ""}}>Master 1</option>
                            <option value="Master 2 année"
                                {{ $evaluation->classe =="Master 2 année" ? 'selected' : ""}}>Master 2</option>
                        </select>
                        @error('classe')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Date de fin<span style="color:red;">*</span></label>
                        <input type="date" name="date_fin" required
                            value="{{ old('date_fin') ? old('date_fin') : $evaluation->date_fin }}"
                            class="form-control @error('date_fin') is-invalid @enderror">
                        @error('date_fin')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label class="form-label" style="font-size: large;">Fichier</label>
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


<!-- <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.ckeditor').ckeditor();
});
</script> -->