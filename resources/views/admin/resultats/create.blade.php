<div class="modal fade bd-example-modal-lg-create" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-header w-100">
                    <h5 class="modal-title" id="defaultModalLabel">Ajouter un nouveau programme de soutenance</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <div class="row justify-content-end mx-4">
                    <span style="text-align: end;">Champs obligatoires <span style="color: red;">*</span> </span>
                </div>

                <form action="{{route('resultat.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf


                    <div class="mb-3">
                        <label class="form-label" style="font-size: large;">Année académique<span
                                style="color:red;">*</span></label>
                        <select class="form-select form-control @error('annee_academique') is-invalid @enderror"
                            name="annee_academique" required>
                            <option>Selectionner l'année académique</option>
                            <?php $currentYear = date('Y'); $startYear = 1960; for ($year = $currentYear; $year >= $startYear; $year--) { echo '<option value="' . $year . ' - ' . ($year + 1) . '">' . $year . '-' . ($year + 1) . '</option>'; } ?>
                        </select>
                        @error('annee_academique')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" style="font-size: large;">Selectionner un département<span
                                style="color:red;">*</span></label>
                        <select class="form-select form-control @error('departement_id') is-invalid @enderror"
                            name="departement_id" required>
                            <option>Selectionner le département</option>
                            @foreach($departements as $departement)
                            <option value="{{ $departement->id }}">{{ $departement->nom }}</option>
                            @endforeach
                        </select>
                        @error('departement_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>



                    <div class="mb-3">
                        <label class="form-label" style="font-size: large;">Niveau scolaire<span
                                style="color:red;">*</span></label>
                        <select class="form-select form-control @error('niveau') is-invalid @enderror" name="niveau"
                            required>
                            <option>Selectionner le niveau scolaire</option>
                            <option value="Première année">Premième année</option>
                            <option value="Deuxième année">Deuxième année</option>
                            <option value="Troisième année">Troisième année</option>
                            <option value="Master 1 année">Master 1</option>
                            <option value="Master 2 année">Master 2</option>

                        </select>
                        @error('niveau')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>



                    <div class="mb-3">
                        <label for="simpleinput" style="font-size: large;" class="form-label">Session<span
                                style="color:red;">*</span></label>
                        <input type="text" name="session" required
                            class="form-control @error('session') is-invalid @enderror">
                        @error('session')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" style="font-size: large;">Fichier<span
                                style="color:red;">*</span></label>
                        <input type="file" required name="fichier"
                            class="form-control @error('fichier') is-invalid @enderror">
                        @error('fichier')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-primary">Ajouter un nouveau résultat</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>