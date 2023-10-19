<div class="row mt-2">
    <div class="col-md-4" style="font-size: large;">
        Nom
    </div>
    <div class="col-md-6" style="font-size: large;">
        {{ $demande->etudiant->nom }}
    </div>
</div>

<div class="row mt-2">
    <div class="col-4" style="font-size: large;">
        Prénoms
    </div>
    <div class="col-6" style="font-size: large;">
        {{ $demande->etudiant->prenoms }}
    </div>
</div>

<div class="row mt-2">
    <div class="col-4" style="font-size: large;">
        Matricule
    </div>
    <div class="col-6" style="font-size: large;">
        {{ $demande->etudiant->matricule }}
    </div>
</div>

<div class="row mt-2">
    <div class="col-4" style="font-size: large;">
        Date, lieu de naissance
    </div>
    <div class="col-6" style="font-size: large;">
        {{ $demande->etudiant->date_naissance }},
        {{ $demande->etudiant->lieu_naissance }}
    </div>
</div>

<div class="row mt-2">
    <div class="col-4" style="font-size: large;">
        Département, option
    </div>
    <div class="col-6" style="font-size: large;">
        {{ $demande->etudiant->departement->nom }},
        {{ $demande->etudiant->option }}
    </div>
</div>

<div class="row mt-2">
    <div class="col-4" style="font-size: large;">
        Email, téléphone
    </div>
    <div class="col-6" style="font-size: large;">
        <a href="mailto:{{ $demande->etudiant->email }}">{{ $demande->etudiant->email }}</a>,
        {{ $demande->etudiant->contacts }}
    </div>
</div>