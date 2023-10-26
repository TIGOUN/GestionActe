@extends('layouts.dashbord')

@section('content')

<!-- nav bar -->
@include('client.partials.header')

<div class="mt-4">
    &nbsp;
</div>
<div class="mt-4">
    &nbsp;
</div>

<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="index.html">Demande</a></li>
            <li>Acte académique</li>
        </ol>
        <h2>Demande d'acte académique</h2>
    </div>
</section>
<!-- End Breadcrumbs -->

<section>
    <div class="container card shadow">
        <form action="{{ route('demande.store') }}" class="mx-2" method="POST" enctype="multipart/form-data"
            autocomplete="on">
            @csrf
            <h3 class="text-center py-4">1- IDENTITÉ</h3>

            <!-- Nom et Prénoms -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Nom</label>
                        <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror"
                            maxlength="20" value="{{ old('nom') }}" required>
                        @error('nom')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Prénoms</label>
                        <input type="text" name="prenoms" class="form-control @error('prenoms') is-invalid @enderror"
                            maxlength="60" value="{{ old('prenoms') }}" required>
                        @error('prenoms')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Matricule et option -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Matricule</label>
                        <input type="text" minlength="8" maxlength="8"
                            class="form-control @error('matricule') is-invalid @enderror" name="matricule"
                            value="{{ old('matricule') }}" required>
                        @error('matricule')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Option</label>
                        <input type="text" class="form-control @error('option') is-invalid @enderror" name="option"
                            value="{{ old('option') }}" required>
                        @error('option')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Date et lieu de naissance -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Date de naissance</label>
                        <input type="date" class="form-control @error('date_naissance') is-invalid @enderror"
                            name="date_naissance" value="{{ old('date_naissance') }}" required>
                        @error('date_naissance')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Lieu de naissance</label>
                        <input type="text" class="form-control @error('lieu_naissance') is-invalid @enderror"
                            name="lieu_naissance" value="{{ old('lieu_naissance') }}" required>
                        @error('lieu_naissance')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Email et contact -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Téléphone(s)</label>
                        <input type="text" class="form-control @error('contacts') is-invalid @enderror" name="contacts"
                            value="{{ old('contacts') }}" required>
                        @error('contacts')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Département -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label class="form-label">Département scolaire</label>
                        <select class="form-select @error('departement_id') is-invalid @enderror" name="departement_id"
                            required>
                            <option>Selectionner votre département</option>
                            @foreach($departements as $departement)
                            <option value="{{$departement->id}}">{{$departement->nom}}</option>
                            @endforeach
                        </select>
                        @error('departement_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <h3 class="text-center mt-2 py-2">2- TYPE D'ACTE</h3>

            <!-- Acte -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label class="form-label">Acte académique</label>
                        <select class="form-select @error('acte_id') is-invalid @enderror" name="acte_id"
                            id="typeElement" onchange="afficherFormulaire()" required>
                            <option>Selectionner l'acte académique</option>
                            @foreach($actes as $acte)
                            @if($acte->childCategories->isNotEmpty())
                            <optgroup label="{{$acte->nom}}">
                                @foreach ($acte->childCategories as $childCategory)
                                <option value="{{$childCategory->id}}">
                                    {{$childCategory->nom}}</option>
                                @endforeach
                            </optgroup>
                            @endif
                            @endforeach
                        </select>
                        @error('acte_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- la div dont le contenu change en fonction du formulaire choisir -->
            <div id="formContainer" class="form-group">

            </div>



            <div class="row py-4">
                <button type="submit" class="btn"
                    style="background-color: #012970; color: white; font-weight:900;">Faire la demande</button>
            </div>
        </form>
    </div>
</section>

<!-- Les script impoprté début -->
<script src="{{asset('client/dropfile/ajax.googleapis.com_ajax_libs_jquery_3.2.1_jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('client/dropfile/jeremyfagis.github.io_dropify_dist_js_dropify.min.js')}}">
</script>
<link rel="stylesheet" type="text/css"
    href="{{asset('client/dropfile/jeremyfagis.github.io_dropify_dist_css_dropify.min.css')}}">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
<script>
$('.dropify').dropify();
</script>
<!-- Scripts importer fin -->

<!-- Debut du code javascript qui va permettre de resoudre le probleme de plusieurs formulaire pour une meme page -->
<script>
function afficherFormulaire() {
    var typeElement = document.getElementById('typeElement').value;
    var formContainer = document.getElementById('formContainer');

    // Effacer le contenu précédent du conteneur
    formContainer.innerHTML = '';
    if (typeElement === '2') {
        formContainer.innerHTML = `
            <h3 class="text-center mt-2 py-2">3- CURSUS ACADÉMIQUE</h3>

            <!-- Première année -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label class="form-label">Première année</label>
                        <select class="form-select @error('licence_1') is-invalid @enderror" name="licence_1" required>
                            <option>Selectionner la dernière année de validation</option>
                            <?php $currentYear = date('Y'); $startYear = 1960; for ($year = $currentYear; $year >= $startYear; $year--) { echo '<option value="' . $year . ' - ' . ($year + 1) . '">' . $year . '-' . ($year + 1) . '</option>'; } ?>
                        </select>
                        @error('licence_1')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <h3 class="text-center mt-2 py-2">4- DOCUMENTS RÉQUIS</h3>

            <!-- Acte de naissance et fiche de préinscription -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Acte de naissance</label>
                        <input name="copie_acte_naissance" type="file" class="form-control @error('copie_acte_naissance') is-invalid @enderror dropify" data-height="100" required />
                        @error('copie_acte_naissance')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Fiche de préinscription</label>
                        <input name="copie_fiche_preinscription" type="file" class="form-control @error('copie_fiche_preinscription') is-invalid @enderror dropify" data-height="100"
                            required />
                        @error('copie_fiche_preinscription')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Carte d'étudiant -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label class="form-label">Carte d'étudiant</label>
                        <input name="copie_carte_etudiant" type="file" class="form-control @error('copie_carte_etudiant') is-invalid @enderror dropify" data-height="100" required />
                        @error('copie_carte_etudiant')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Intitulés des UE -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label class="form-label">Intitulés des UE(matières composées)</label>
                        <textarea name="intitules_eu"
                            placeholder="Intitulés des Unités d'Enseignements(matières composées)" id=""
                            class="form-control @error('intitules_eu') is-invalid @enderror" cols="30" rows="6"
                            required></textarea>
                        @error('intitules_eu')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <h3 class="text-center mt-2 py-2">5- INFORMATIONS SUR LE PAIEMENTS</h3>

            <!-- Numéro de paiement et preuve de paiement -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Numéro de paiement</label>
                        <input type="text" class="form-control @error('reference') is-invalid @enderror"
                            name="reference" value="{{ old('reference') }}" required>
                        @error('reference')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Preuve de paiement</label>
                        <input name="preuve_paiement" type="file" class="form-control @error('preuve_paiement') is-invalid @enderror dropify" data-height="100" required />
                         @error('preuve_paiement')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        `;
    } else if (typeElement === '4') {
        formContainer.innerHTML = `
            <!-- Releves de notes de la deuxième année -->

            <h3 class="text-center mt-2 py-2">3- CURSUS ACADÉMIQUE</h3>
            
            <!-- Deuxieme année -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Première année</label>
                        <select class="form-select @error('licence_1') is-invalid @enderror" name="licence_1" required>
                            <option>Selectionner la dernière année de validation</option>
                            <?php $currentYear = date('Y'); $startYear = 1960; for ($year = $currentYear; $year >= $startYear; $year--) { echo '<option value="' . $year . ' - ' . ($year + 1) . '">' . $year . '-' . ($year + 1) . '</option>'; } ?>
                        </select>
                        @error('licence_1')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Deuxième année</label>
                        <select class="form-select @error('licence_2') is-invalid @enderror" name="licence_2" required>
                            <option>Selectionner la dernière année de validation</option>
                            <?php $currentYear = date('Y'); $startYear = 1960; for ($year = $currentYear; $year >= $startYear; $year--) { echo '<option value="' . $year . ' - ' . ($year + 1) . '">' . $year . '-' . ($year + 1) . '</option>'; } ?>
                        </select>
                        @error('licence_2')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <h3 class="text-center mt-2 py-2">4- DOCUMENTS RÉQUIS</h3>

            <!-- Acte de naissance et fiche de préinscription -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Acte de naissance</label>
                        <input name="copie_acte_naissance" type="file" class="form-control @error('copie_acte_naissance') is-invalid @enderror dropify" data-height="100" required />
                        @error('copie_acte_naissance')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Fiche de préinscription</label>
                        <input name="copie_fiche_preinscription" type="file" class="form-control @error('copie_fiche_preinscription') is-invalid @enderror dropify" data-height="100"
                            required />
                        @error('copie_fiche_preinscription')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Carte d'étudiant -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Carte d'étudiant</label>
                        <input name="copie_carte_etudiant" type="file" class="form-control @error('copie_carte_etudiant') is-invalid @enderror dropify" data-height="100" required />
                        @error('copie_carte_etudiant')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Originale du relevé (1ère année)</label>
                        <input name="copie_releve_1" type="file" class="form-control @error('copie_releve_1') is-invalid @enderror dropify" data-height="100" required />
                        @error('copie_releve_1')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Intitulés des UE -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label class="form-label">Intitulés des UE(matières composées)</label>
                        <textarea name="intitules_eu"
                            placeholder="Intitulés des Unités d'Enseignements(matières composées)" id=""
                            class="form-control @error('intitules_eu') is-invalid @enderror" cols="30" rows="6"
                            required></textarea>
                        @error('intitules_eu')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <h3 class="text-center mt-2 py-2">5- INFORMATIONS SUR LE PAIEMENTS</h3>

            <!-- Numéro de paiement et preuve de paiement -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Numéro de paiement</label>
                        <input type="text" class="form-control @error('reference') is-invalid @enderror"
                            name="reference" value="{{ old('reference') }}" required>
                        @error('reference')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Preuve de paiement</label>
                        <input name="preuve_paiement" type="file" class="form-control @error('preuve_paiement') is-invalid @enderror dropify" data-height="100" required />
                         @error('preuve_paiement')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        `;

    } else if (typeElement === '5') {
        formContainer.innerHTML = `
            <!-- Releves de notes de la troisième année -->

            <h3 class="text-center mt-2 py-2">3- CURSUS ACADÉMIQUE</h3>
            
            <div class="row">
            <!-- Première année -->
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Première année</label>
                        <select class="form-select @error('licence_1') is-invalid @enderror" name="licence_1" required>
                            <option>Selectionner la dernière année de validation</option>
                            <?php $currentYear = date('Y'); $startYear = 1960; for ($year = $currentYear; $year >= $startYear; $year--) { echo '<option value="' . $year . ' - ' . ($year + 1) . '">' . $year . '-' . ($year + 1) . '</option>'; } ?>
                        </select>
                        @error('licence_1')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <!-- Deuxième année -->
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Deuxième année</label>
                        <select class="form-select @error('licence_2') is-invalid @enderror" name="licence_2" required>
                            <option>Selectionner la dernière année de validation</option>
                            <?php $currentYear = date('Y'); $startYear = 1960; for ($year = $currentYear; $year >= $startYear; $year--) { echo '<option value="' . $year . ' - ' . ($year + 1) . '">' . $year . '-' . ($year + 1) . '</option>'; } ?>
                        </select>
                        @error('licence_2')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Troisieme année -->
            <!-- Première année -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label class="form-label">Première année</label>
                        <select class="form-select @error('licence_2') is-invalid @enderror" name="licence_2" required>
                            <option>Selectionner la dernière année de validation</option>
                            <?php $currentYear = date('Y'); $startYear = 1960; for ($year = $currentYear; $year >= $startYear; $year--) { echo '<option value="' . $year . ' - ' . ($year + 1) . '">' . $year . '-' . ($year + 1) . '</option>'; } ?>
                        </select>
                        @error('licence_2')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <h3 class="text-center mt-2 py-2">4- DOCUMENTS RÉQUIS</h3>

            <!-- Acte de naissance et fiche de préinscription -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Acte de naissance</label>
                        <input name="copie_acte_naissance" type="file" class="form-control @error('copie_acte_naissance') is-invalid @enderror dropify" data-height="100" required />
                        @error('copie_acte_naissance')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Fiche de préinscription</label>
                        <input name="copie_fiche_preinscription" type="file" class="form-control @error('copie_fiche_preinscription') is-invalid @enderror dropify" data-height="100"
                            required />
                        @error('copie_fiche_preinscription')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Carte d'étudiant -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Carte d'étudiant</label>
                        <input name="copie_carte_etudiant" type="file" class="form-control @error('copie_carte_etudiant') is-invalid @enderror dropify" data-height="100" required />
                        @error('copie_carte_etudiant')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Originale du relevé (1ère année)</label>
                        <input name="copie_releve_1" type="file" class="form-control @error('copie_releve_1') is-invalid @enderror dropify" data-height="100" required />
                        @error('copie_releve_1')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Copie du relevé de la troisieme année -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label class="form-label">Originale du relevé (2ème année)</label>
                        <input name="copie_releve_2" type="file" class="form-control @error('copie_releve_2') is-invalid @enderror dropify" data-height="100" required />
                        @error('copie_releve_2')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Intitulés des UE -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label class="form-label">Intitulés des UE(matières composées)</label>
                        <textarea name="intitules_eu"
                            placeholder="Intitulés des Unités d'Enseignements(matières composées)" id=""
                            class="form-control @error('intitules_eu') is-invalid @enderror" cols="30" rows="6"
                            required></textarea>
                        @error('intitules_eu')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <h3 class="text-center mt-2 py-2">5- INFORMATIONS SUR LE PAIEMENTS</h3>

            <!-- Numéro de paiement et preuve de paiement -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Numéro de paiement</label>
                        <input type="text" class="form-control @error('reference') is-invalid @enderror"
                            name="reference" value="{{ old('reference') }}" required>
                        @error('reference')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Preuve de paiement</label>
                        <input name="preuve_paiement" type="file" class="form-control @error('preuve_paiement') is-invalid @enderror dropify" data-height="100" required />
                         @error('preuve_paiement')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        `;

    } else if (typeElement === '6') {
        formContainer.innerHTML = `
            <!-- Releves de notes du quatrième -->

            <h3 class="text-center mt-2 py-2">3- CURSUS ACADÉMIQUE</h3>

            <!-- Quatrième année -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label class="form-label">Quatrième 1</label>
                        <select class="form-select @error('master_1') is-invalid @enderror" name="master_1" required>
                            <option>Selectionner la dernière année de validation</option>
                            <?php $currentYear = date('Y'); $startYear = 1960; for ($year = $currentYear; $year >= $startYear; $year--) { echo '<option value="' . $year . ' - ' . ($year + 1) . '">' . $year . '-' . ($year + 1) . '</option>'; } ?>
                        </select>
                        @error('master_1')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <h3 class="text-center mt-2 py-2">4- DOCUMENTS RÉQUIS</h3>

            <!-- Acte de naissance et fiche de préinscription -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Acte de naissance</label>
                        <input name="copie_acte_naissance" type="file" class="form-control @error('copie_acte_naissance') is-invalid @enderror dropify" data-height="100" required />
                        @error('copie_acte_naissance')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Fiche de préinscription</label>
                        <input name="copie_fiche_preinscription" type="file" class="form-control @error('copie_fiche_preinscription') is-invalid @enderror dropify" data-height="100"
                            required />
                        @error('copie_fiche_preinscription')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Carte d'étudiant -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label class="form-label">Carte d'étudiant</label>
                        <input name="copie_carte_etudiant" type="file" class="form-control @error('copie_carte_etudiant') is-invalid @enderror dropify" data-height="100" required />
                        @error('copie_carte_etudiant')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Intitulés des UE -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label class="form-label">Intitulés des UE(matières composées)</label>
                        <textarea name="intitules_eu"
                            placeholder="Intitulés des Unités d'Enseignements(matières composées)" id=""
                            class="form-control @error('intitules_eu') is-invalid @enderror" cols="30" rows="6"
                            required></textarea>
                        @error('intitules_eu')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <h3 class="text-center mt-2 py-2">5- INFORMATIONS SUR LE PAIEMENTS</h3>

            <!-- Numéro de paiement et preuve de paiement -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Numéro de paiement</label>
                        <input type="text" class="form-control @error('reference') is-invalid @enderror"
                            name="reference" value="{{ old('reference') }}" required>
                        @error('reference')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Preuve de paiement</label>
                        <input name="preuve_paiement" type="file" class="form-control @error('preuve_paiement') is-invalid @enderror dropify" data-height="100" required />
                         @error('preuve_paiement')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        `;

    } else if (typeElement === '7') {
        formContainer.innerHTML = `
            <!-- Releves de notes de la cinquième année -->

            <h3 class="text-center mt-2 py-2">3- CURSUS ACADÉMIQUE</h3>
            
            <!-- Deuxieme année -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Quatrième année</label>
                        <select class="form-select @error('master_1') is-invalid @enderror" name="master_1" required>
                            <option>Selectionner la dernière année de validation</option>
                            <?php $currentYear = date('Y'); $startYear = 1960; for ($year = $currentYear; $year >= $startYear; $year--) { echo '<option value="' . $year . ' - ' . ($year + 1) . '">' . $year . '-' . ($year + 1) . '</option>'; } ?>
                        </select>
                        @error('master_1')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Cinquième année</label>
                        <select class="form-select @error('master_2') is-invalid @enderror" name="master_2" required>
                            <option>Selectionner la dernière année de validation</option>
                            <?php $currentYear = date('Y'); $startYear = 1960; for ($year = $currentYear; $year >= $startYear; $year--) { echo '<option value="' . $year . ' - ' . ($year + 1) . '">' . $year . '-' . ($year + 1) . '</option>'; } ?>
                        </select>
                        @error('master_2')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <h3 class="text-center mt-2 py-2">4- DOCUMENTS RÉQUIS</h3>

            <!-- Acte de naissance et fiche de préinscription -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Acte de naissance</label>
                        <input name="copie_acte_naissance" type="file" class="form-control @error('copie_acte_naissance') is-invalid @enderror dropify" data-height="100" required />
                        @error('copie_acte_naissance')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Fiche de préinscription</label>
                        <input name="copie_fiche_preinscription" type="file" class="form-control @error('copie_fiche_preinscription') is-invalid @enderror dropify" data-height="100"
                            required />
                        @error('copie_fiche_preinscription')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Carte d'étudiant -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Carte d'étudiant</label>
                        <input name="copie_carte_etudiant" type="file" class="form-control @error('copie_carte_etudiant') is-invalid @enderror dropify" data-height="100" required />
                        @error('copie_carte_etudiant')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Originale du relevé (4ième année)</label>
                        <input name="copie_releve_4" type="file" class="form-control @error('copie_releve_4') is-invalid @enderror dropify" data-height="100" required />
                        @error('copie_releve_4')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Intitulés des UE -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label class="form-label">Intitulés des UE(matières composées)</label>
                        <textarea name="intitules_eu"
                            placeholder="Intitulés des Unités d'Enseignements(matières composées)" id=""
                            class="form-control @error('intitules_eu') is-invalid @enderror" cols="30" rows="6"
                            required></textarea>
                        @error('intitules_eu')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <h3 class="text-center mt-2 py-2">5- INFORMATIONS SUR LE PAIEMENTS</h3>

            <!-- Numéro de paiement et preuve de paiement -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Numéro de paiement</label>
                        <input type="text" class="form-control @error('reference') is-invalid @enderror"
                            name="reference" value="{{ old('reference') }}" required>
                        @error('reference')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Preuve de paiement</label>
                        <input name="preuve_paiement" type="file" class="form-control @error('preuve_paiement') is-invalid @enderror dropify" data-height="100" required />
                         @error('preuve_paiement')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        `;

    } else if (typeElement === '4') {
        formContainer.innerHTML = `
        <!-- Duplicata des releves de notes -->
        <h3 class="text-center mt-2 py-2">3- CURSUS ACADÉMIQUE</h3>

            <h3 class="text-center mt-2 py-2">4- DOCUMENTS RÉQUIS</h3>

            <!-- Acte de naissance et fiche de préinscription -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Acte de naissance</label>
                        <input name="copie_acte_naissance" type="file" class="form-control @error('copie_acte_naissance') is-invalid @enderror dropify" data-height="100" required />
                        @error('copie_acte_naissance')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Fiche de préinscription</label>
                        <input name="copie_fiche_preinscription" type="file" class="form-control @error('copie_fiche_preinscription') is-invalid @enderror dropify" data-height="100"
                            required />
                        @error('copie_fiche_preinscription')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>


            <!-- Certificat et copie de l'acte perdu -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Certificat de perte</label>
                        <input name="certificat_de_perte" type="file" class="form-control @error('certificat_de_perte') is-invalid @enderror dropify" data-height="100" required />
                        @error('certificat_de_perte')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Copie de l'acte perdu</label>
                        <input name="copie_acte_perdu" type="file" class="form-control @error('copie_acte_perdu') is-invalid @enderror dropify" data-height="100"
                            required />
                        @error('copie_acte_perdu')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Carte d'étudiant -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label class="form-label">Carte d'étudiant</label>
                        <input name="copie_carte_etudiant" type="file" class="form-control @error('copie_carte_etudiant') is-invalid @enderror dropify" data-height="100" required />
                        @error('copie_carte_etudiant')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            
            <h3 class="text-center mt-2 py-2">5- INFORMATIONS SUR LE PAIEMENTS</h3>

            <!-- Numéro de paiement et preuve de paiement -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Numéro de paiement</label>
                        <input type="text" class="form-control @error('reference') is-invalid @enderror"
                            name="reference" value="{{ old('reference') }}" required>
                        @error('reference')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Preuve de paiement</label>
                        <input name="preuve_paiement" type="file" class="form-control @error('preuve_paiement') is-invalid @enderror dropify" data-height="100" required />
                         @error('preuve_paiement')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        `;
    } else if (typeElement === '8') {
        formContainer.innerHTML = `
        <!-- Attestations du DUEL2(CLASSIQUE) ou de SUCCES(LMD) -->

            <h3 class="text-center mt-2 py-2">4- DOCUMENTS RÉQUIS</h3>

            <!-- Acte de naissance et fiche de préinscription -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Acte de naissance</label>
                        <input name="copie_acte_naissance" type="file" class="form-control @error('copie_acte_naissance') is-invalid @enderror dropify" data-height="100" required />
                        @error('copie_acte_naissance')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Fiche de préinscription(plus récente)</label>
                        <input name="copie_fiche_preinscription" type="file" class="form-control @error('copie_fiche_preinscription') is-invalid @enderror dropify" data-height="100"
                            required />
                        @error('copie_fiche_preinscription')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                <div class="mb-3">
                        <label class="form-label">Originale du relevé (2ème année)</label>
                        <input name="copie_releve_2" type="file" class="form-control @error('copie_releve_2') is-invalid @enderror dropify" data-height="100" required />
                        @error('copie_releve_2')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Originale du relevé (1ère année)</label>
                        <input name="copie_releve_1" type="file" class="form-control @error('copie_releve_1') is-invalid @enderror dropify" data-height="100" required />
                        @error('copie_releve_1')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Carte d'étudiant -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label class="form-label">Carte d'étudiant</label>
                        <input name="copie_carte_etudiant" type="file" class="form-control @error('copie_carte_etudiant') is-invalid @enderror dropify" data-height="100" required />
                        @error('copie_carte_etudiant')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <h3 class="text-center mt-2 py-2">5- INFORMATIONS SUR LE PAIEMENTS</h3>

            <!-- Numéro de paiement et preuve de paiement -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Numéro de paiement</label>
                        <input type="text" class="form-control @error('reference') is-invalid @enderror"
                            name="reference" value="{{ old('reference') }}" required>
                        @error('reference')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Preuve de paiement</label>
                        <input name="preuve_paiement" type="file" class="form-control @error('preuve_paiement') is-invalid @enderror dropify" data-height="100" required />
                         @error('preuve_paiement')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        `;
    } else if (typeElement === '14') {
        formContainer.innerHTML = `
            <!-- LICENCE CLASSIQUE ou LMD -->

            <h3 class="text-center mt-2 py-2">4- DOCUMENTS RÉQUIS</h3>

            <!-- Acte de naissance et fiche de préinscription -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Acte de naissance</label>
                        <input name="copie_acte_naissance" type="file" class="form-control @error('copie_acte_naissance') is-invalid @enderror dropify" data-height="100" required />
                        @error('copie_acte_naissance')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Fiche de préinscription(plus récente)</label>
                        <input name="copie_fiche_preinscription" type="file" class="form-control @error('copie_fiche_preinscription') is-invalid @enderror dropify" data-height="100"
                            required />
                        @error('copie_fiche_preinscription')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Carte d'étudiant et releves de notes licence 1 -->
            <div class="row"> 
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Carte d'étudiant</label>
                        <input name="copie_carte_etudiant" type="file" class="form-control @error('copie_carte_etudiant') is-invalid @enderror dropify" data-height="100" required />
                        @error('copie_carte_etudiant')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Originale du relevé (1ère année)</label>
                        <input name="copie_releve_1" type="file" class="form-control @error('copie_releve_1') is-invalid @enderror dropify" data-height="100" required />
                        @error('copie_releve_1')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- releves de notes l1 et l3 -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                            <label class="form-label">Originale du relevé (2ème année)</label>
                            <input name="copie_releve_2" type="file" class="form-control @error('copie_releve_2') is-invalid @enderror dropify" data-height="100" required />
                            @error('copie_releve_2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                            <label class="form-label">Originale du relevé (3ème année)</label>
                            <input name="copie_releve_3" type="file" class="form-control @error('copie_releve_3') is-invalid @enderror dropify" data-height="100" required />
                            @error('copie_releve_3')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Programmation et Originale du quitus -->
            <div class="row"> 
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Programmation de la soutenance</label>
                        <input name="programmation_de_la_soutenance" type="file" class="form-control @error('programmation_de_la_soutenance') is-invalid @enderror dropify" data-height="100" required />
                        @error('programmation_de_la_soutenance')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Quittance de frais de soutenance</label>
                        <input name="copie_quittance_frais_soutenance" type="file" class="form-control @error('copie_quittance_frais_soutenance') is-invalid @enderror dropify" data-height="100" required />
                        @error('copie_quittance_frais_soutenance')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Originale du quitus -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                            <label class="form-label">Originale du quitus</label>
                            <input name="originale_quitus" type="file" class="form-control @error('originale_quitus') is-invalid @enderror dropify" data-height="100" required />
                            @error('originale_quitus')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <h3 class="text-center mt-2 py-2">5- INFORMATIONS SUR LE PAIEMENTS</h3>

            <!-- Numéro de paiement et preuve de paiement -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Numéro de paiement</label>
                        <input type="text" class="form-control @error('reference') is-invalid @enderror"
                            name="reference" value="{{ old('reference') }}" required>
                        @error('reference')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Preuve de paiement</label>
                        <input name="preuve_paiement" type="file" class="form-control @error('preuve_paiement') is-invalid @enderror dropify" data-height="100" required />
                         @error('preuve_paiement')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        `;
    } else if (typeElement === '11') {
        formContainer.innerHTML = `
            <!-- MASTER -->
            
            <h3 class="text-center mt-2 py-2">4- DOCUMENTS RÉQUIS</h3>

            <!-- Acte de naissance et fiche de préinscription -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Acte de naissance</label>
                        <input name="copie_acte_naissance" type="file" class="form-control @error('copie_acte_naissance') is-invalid @enderror dropify" data-height="100" required />
                        @error('copie_acte_naissance')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Fiche de préinscription(plus récente)</label>
                        <input name="copie_fiche_preinscription" type="file" class="form-control @error('copie_fiche_preinscription') is-invalid @enderror dropify" data-height="100"
                            required />
                        @error('copie_fiche_preinscription')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            
            <!-- releves de notes Master1 et Master2 -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                            <label class="form-label">Rélevés de notes (Quatrième année)</label>
                            <input name="copie_releve_4" type="file" class="form-control @error('copie_releve_4') is-invalid @enderror dropify" data-height="100" required />
                            @error('copie_releve_4')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                            <label class="form-label">Rélevés de notes (Cinquième année)</label>
                            <input name="copie_releve_5" type="file" class="form-control @error('copie_releve_5') is-invalid @enderror dropify" data-height="100" required />
                            @error('copie_releve_5')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Programmation -->
            <div class="row"> 
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label class="form-label">Programmation de la soutenance</label>
                        <input name="programmation_de_la_soutenance" type="file" class="form-control @error('programmation_de_la_soutenance') is-invalid @enderror dropify" data-height="100" required />
                        @error('programmation_de_la_soutenance')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <h3 class="text-center mt-2 py-2">5- INFORMATIONS SUR LE PAIEMENTS</h3>

            <!-- Numéro de paiement et preuve de paiement -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Numéro de paiement</label>
                        <input type="text" class="form-control @error('reference') is-invalid @enderror"
                            name="reference" value="{{ old('reference') }}" required>
                        @error('reference')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Preuve de paiement</label>
                        <input name="preuve_paiement" type="file" class="form-control @error('preuve_paiement') is-invalid @enderror dropify" data-height="100" required />
                         @error('preuve_paiement')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        `;

    } else if (typeElement === '10') {
        formContainer.innerHTML = `
        <!-- MAITRISE -->

            <h3 class="text-center mt-2 py-2">4- DOCUMENTS RÉQUIS</h3>

            <!-- Acte de naissance et fiche de préinscription -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Acte de naissance</label>
                        <input name="copie_acte_naissance" type="file" class="form-control @error('copie_acte_naissance') is-invalid @enderror dropify" data-height="100" required />
                        @error('copie_acte_naissance')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Fiche de préinscription(plus récente)</label>
                        <input name="copie_fiche_preinscription" type="file" class="form-control @error('copie_fiche_preinscription') is-invalid @enderror dropify" data-height="100"
                            required />
                        @error('copie_fiche_preinscription')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Carte d'étudiant et original du quitus -->
            <div class="row"> 
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Carte d'étudiant</label>
                        <input name="copie_carte_etudiant" type="file" class="form-control @error('copie_carte_etudiant') is-invalid @enderror dropify" data-height="100" required />
                        @error('copie_carte_etudiant')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Originale du quitus</label>
                        <input name="originale_quitus" type="file" class="form-control @error('originale_quitus') is-invalid @enderror dropify" data-height="100" required />
                        @error('originale_quitus')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Releves de notes licence 1 et 2 -->
            <div class="row"> 
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Originale du relevé (1ère année)</label>
                        <input name="copie_releve_1" type="file" class="form-control @error('copie_releve_1') is-invalid @enderror dropify" data-height="100" required />
                        @error('copie_releve_1')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                            <label class="form-label">Originale du relevé (2ème année)</label>
                            <input name="copie_releve_2" type="file" class="form-control @error('copie_releve_2') is-invalid @enderror dropify" data-height="100" required />
                            @error('copie_releve_2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- releves de notes l3 et l4 -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                            <label class="form-label">Originale du relevé (3ème année)</label>
                            <input name="copie_releve_3" type="file" class="form-control @error('copie_releve_3') is-invalid @enderror dropify" data-height="100" required />
                            @error('copie_releve_3')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                            <label class="form-label">Originale du relevé (4ème année)</label>
                            <input name="copie_releve_4" type="file" class="form-control @error('copie_releve_4') is-invalid @enderror dropify" data-height="100" required />
                            @error('copie_releve_4')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Programmation -->
            <div class="row"> 
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label class="form-label">Programmation de la soutenance</label>
                        <input name="programmation_de_la_soutenance" type="file" class="form-control @error('programmation_de_la_soutenance') is-invalid @enderror dropify" data-height="100" required />
                        @error('programmation_de_la_soutenance')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <h3 class="text-center mt-2 py-2">5- INFORMATIONS SUR LE PAIEMENTS</h3>

            <!-- Numéro de paiement et preuve de paiement -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Numéro de paiement</label>
                        <input type="text" class="form-control @error('reference') is-invalid @enderror"
                            name="reference" value="{{ old('reference') }}" required>
                        @error('reference')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Preuve de paiement</label>
                        <input name="preuve_paiement" type="file" class="form-control @error('preuve_paiement') is-invalid @enderror dropify" data-height="100" required />
                         @error('preuve_paiement')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        `;
    } else if (typeElement === '12') {
        formContainer.innerHTML = `
            <!-- DUPLICATA DES ATTESTATIONS -->

            <h3 class="text-center mt-2 py-2">4- DOCUMENTS RÉQUIS</h3>

            <!-- Acte de naissance et fiche de préinscription -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Acte de naissance</label>
                        <input name="copie_acte_naissance" type="file" class="form-control @error('copie_acte_naissance') is-invalid @enderror dropify" data-height="100" required />
                        @error('copie_acte_naissance')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Fiche de préinscription(plus récente)</label>
                        <input name="copie_fiche_preinscription" type="file" class="form-control @error('copie_fiche_preinscription') is-invalid @enderror dropify" data-height="100"
                            required />
                        @error('copie_fiche_preinscription')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Carte d'étudiant et pièces suscite -->
            <div class="row"> 
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Carte d'étudiant</label>
                        <input name="copie_carte_etudiant" type="file" class="form-control @error('copie_carte_etudiant') is-invalid @enderror dropify" data-height="100" required />
                        @error('copie_carte_etudiant')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Pièce suscitée</label>
                        <input name="piece_suscite" type="file" class="form-control @error('piece_suscite') is-invalid @enderror dropify" data-height="100" required />
                        @error('piece_suscite')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Certificat de perte et de l'acte perdu -->
            <div class="row"> 
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Certificat de l'acte perdu</label>
                        <input name="certificat_de_perte" type="file" class="form-control @error('certificat_de_perte') is-invalid @enderror dropify" data-height="100" required />
                        @error('certificat_de_perte')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                            <label class="form-label">Copie de l'acte perdu</label>
                            <input name="copie_acte_perdu" type="file" class="form-control @error('copie_acte_perdu') is-invalid @enderror dropify" data-height="100" required />
                            @error('copie_acte_perdu')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <h3 class="text-center mt-2 py-2">5- INFORMATIONS SUR LE PAIEMENTS</h3>

            <!-- Numéro de paiement et preuve de paiement -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Numéro de paiement</label>
                        <input type="text" class="form-control @error('reference') is-invalid @enderror"
                            name="reference" value="{{ old('reference') }}" required>
                        @error('reference')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Preuve de paiement</label>
                        <input name="preuve_paiement" type="file" class="form-control @error('preuve_paiement') is-invalid @enderror dropify" data-height="100" required />
                         @error('preuve_paiement')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        `;
    } else if (typeElement === '17') {
        formContainer.innerHTML = `
            <!-- Certification en langue anglaise -->

            <h3 class="text-center mt-2 py-2">4- DOCUMENTS RÉQUIS</h3>

            <!-- Acte de naissance et fiche de préinscription -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Acte de naissance</label>
                        <input name="copie_acte_naissance" type="file" class="form-control @error('copie_acte_naissance') is-invalid @enderror dropify" data-height="100" required />
                        @error('copie_acte_naissance')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Fiche de préinscription(plus récente)</label>
                        <input name="copie_fiche_preinscription" type="file" class="form-control @error('copie_fiche_preinscription') is-invalid @enderror dropify" data-height="100"
                            required />
                        @error('copie_fiche_preinscription')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Carte d'étudiant -->
            <div class="row"> 
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label class="form-label">Carte d'étudiant</label>
                        <input name="copie_carte_etudiant" type="file" class="form-control @error('copie_carte_etudiant') is-invalid @enderror dropify" data-height="100" required />
                        @error('copie_carte_etudiant')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <h3 class="text-center mt-2 py-2">5- INFORMATIONS SUR LE PAIEMENTS</h3>

            <!-- Numéro de paiement et preuve de paiement -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Numéro de paiement</label>
                        <input type="text" class="form-control @error('reference') is-invalid @enderror"
                            name="reference" value="{{ old('reference') }}" required>
                        @error('reference')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Preuve de paiement</label>
                        <input name="preuve_paiement" type="file" class="form-control @error('preuve_paiement') is-invalid @enderror dropify" data-height="100" required />
                         @error('preuve_paiement')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        `;
    } else if (typeElement === '16') {
        formContainer.innerHTML = `
            <!-- CERTIFICATION/AUTHENTICITE -->

            <h3 class="text-center mt-2 py-2">4- DOCUMENTS RÉQUIS</h3>

            <!-- Acte de naissance et fiche de préinscription -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Acte de naissance</label>
                        <input name="copie_acte_naissance" type="file" class="form-control @error('copie_acte_naissance') is-invalid @enderror dropify" data-height="100" required />
                        @error('copie_acte_naissance')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Fiche de préinscription(plus récente)</label>
                        <input name="copie_fiche_preinscription" type="file" class="form-control @error('copie_fiche_preinscription') is-invalid @enderror dropify" data-height="100"
                            required />
                        @error('copie_fiche_preinscription')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>


            <!-- Originale + copie de l'acte certifié -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Originale de l'acte certifié</label>
                        <input name="original_acte_certifie" type="file" class="form-control @error('original_acte_certifie') is-invalid @enderror dropify" data-height="100" required />
                        @error('original_acte_certifie')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Copie de l'acte certifié</label>
                        <input name="copie_acte_certifie" type="file" class="form-control @error('copie_acte_certifie') is-invalid @enderror dropify" data-height="100"
                            required />
                        @error('copie_acte_certifie')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Carte d'étudiant -->
            <div class="row"> 
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label class="form-label">Carte d'étudiant</label>
                        <input name="copie_carte_etudiant" type="file" class="form-control @error('copie_carte_etudiant') is-invalid @enderror dropify" data-height="100" required />
                        @error('copie_carte_etudiant')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <h3 class="text-center mt-2 py-2">5- INFORMATIONS SUR LE PAIEMENTS</h3>

            <!-- Numéro de paiement et preuve de paiement -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Numéro de paiement</label>
                        <input type="text" class="form-control @error('reference') is-invalid @enderror"
                            name="reference" value="{{ old('reference') }}" required>
                        @error('reference')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Preuve de paiement</label>
                        <input name="preuve_paiement" type="file" class="form-control @error('preuve_paiement') is-invalid @enderror dropify" data-height="100" required />
                         @error('preuve_paiement')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        `;
    } else if (typeElement === '14') {
        formContainer.innerHTML = `
            <!-- CERTIFICAT DE SCOLARITE -->

            <h3 class="text-center mt-2 py-2">4- DOCUMENTS RÉQUIS</h3>

            <!-- Acte de naissance et fiche de préinscription -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Acte de naissance</label>
                        <input name="copie_acte_naissance" type="file" class="form-control @error('copie_acte_naissance') is-invalid @enderror dropify" data-height="100" required />
                        @error('copie_acte_naissance')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Fiche de préinscription(plus récente)</label>
                        <input name="copie_fiche_preinscription" type="file" class="form-control @error('copie_fiche_preinscription') is-invalid @enderror dropify" data-height="100"
                            required />
                        @error('copie_fiche_preinscription')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>


            <!-- Carte d'étudiant -->
            <div class="row"> 
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label class="form-label">Carte d'étudiant</label>
                        <input name="copie_carte_etudiant" type="file" class="form-control @error('copie_carte_etudiant') is-invalid @enderror dropify" data-height="100" required />
                        @error('copie_carte_etudiant')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <h3 class="text-center mt-2 py-2">5- INFORMATIONS SUR LE PAIEMENTS</h3>

            <!-- Numéro de paiement et preuve de paiement -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Numéro de paiement</label>
                        <input type="text" class="form-control @error('reference') is-invalid @enderror"
                            name="reference" value="{{ old('reference') }}" required>
                        @error('reference')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Preuve de paiement</label>
                        <input name="preuve_paiement" type="file" class="form-control @error('preuve_paiement') is-invalid @enderror dropify" data-height="100" required />
                         @error('preuve_paiement')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        `;
    }
}
</script>






























































































































@endsection