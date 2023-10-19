<div class="row mt-2">
    <div class="col-md-4" style="font-size: large;">
        Catégorie, nom de l'acte
    </div>
    <div class="col-md-6" style="font-size: large;">
        {{ $demande->acte->parentCategory->nom }},
        {{ $demande->acte->nom }}
    </div>
</div>

@if($demande->validation->licence_1!=null)
<p class="text-center mt-2 mb-2" style="font-weight: 900;">Année scolaire de validation des classes
</p>
<div class="row" style="font-size: large;">
    <div class="col-md-4">
        Première année
    </div>
    <div class="col-md-6">
        {{ $demande->validation->licence_1 }}
    </div>
</div>
@endif

@if($demande->validation->licence_2!=null)
<div class="row" style="font-size: large;">
    <div class="col-md-4">
        Deuxième année
    </div>
    <div class="col-md-6">
        {{ $demande->validation->licence_2 }}
    </div>
</div>
@endif

@if($demande->validation->licence_3!=null)
<div class="row" style="font-size: large;">
    <div class="col-md-4">
        Troisième année
    </div>
    <div class="col-md-6">
        {{ $demande->validation->licence_3 }}
    </div>
</div>
@endif

@if($demande->validation->master_1!=null)
<div class="row" style="font-size: large;">
    <div class="col-md-4">
        Master
    </div>
    <div class="col-md-6">
        {{ $demande->validation->master_1 }}
    </div>
</div>
@endif

@if($demande->validation->master_2!=null)
<div class="row" style="font-size: large;">
    <div class="col-md-4">
        Master
    </div>
    <div class="col-md-6">
        {{ $demande->validation->master_2 }}
    </div>
</div>
@endif


@if($demande->matiere->intitules_eu!=null)
<p class="text-center mt-2 mb-2" style="font-weight: 900;">Intitulés des Unités d'enseignements
    composés
</p>

<div class="row" style="font-size: large;">
    <div class="col-md-4">
        Unités d'enseignements composées
    </div>
    <div class="col-md-6">
        {{ $demande->matiere->intitules_eu }}
    </div>
</div>
@endif