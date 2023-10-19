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
            <li>Relevés de notes</li>
        </ol>
        <h2>Première année</h2>
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
                        <input type="number" minlength="6" maxlength="6"
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
                        <select class="form-select @error('acte_id') is-invalid @enderror" name="acte_id" required>
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
                        <input name="copie_acte_naissance" type="file" class="dropify" data-height="100" required />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Fiche de préinscription</label>
                        <input name="copie_fiche_preinscription" type="file" class="dropify" data-height="100"
                            required />
                    </div>
                </div>
            </div>

            <!-- Carte d'étudiant -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        <label class="form-label">Carte d'étudiant</label>
                        <input name="copie_carte_etudiant" type="file" class="dropify" data-height="100" required />
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
                        <input name="preuve_paiement" type="file" class="dropify" data-height="100" required />
                    </div>
                </div>
            </div>


            <div class="row py-4">
                <button type="submit" class="btn"
                    style="background-color: #012970; color: white; font-weight:900;">Faire la demande</button>
            </div>
        </form>
    </div>
</section>
<!-- Debut du code javascript qui va permettre de resoudre le probleme de plusieurs formulaire pour une meme page -->
<script>
function afficherFormulaire() {
    var typeElement = document.getElementById('typeElement').value;
    var formContainer = document.getElementById('formContainer');

    // Effacer le contenu précédent du conteneur
    formContainer.innerHTML = '';
    if (typeElement === '70bbc0') {
        formContainer.innerHTML = `
            
        `;
    }

}
</script>





























































































































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
@endsection