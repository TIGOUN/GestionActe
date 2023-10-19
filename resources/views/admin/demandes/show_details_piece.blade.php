@if($demande->document->copie_acte_naissance)
<div class="row mt-2" style="font-size: large;">
    <div class="col-12">
        <div class="">Acte de naissance</div>
        <embed src="{{asset('storage/'. $demande->document->copie_acte_naissance)}}" width="700" height="400"
            type="application/pdf">
    </div>
</div>
@endif

@if($demande->document->copie_fiche_preinscription)
<div class="row mt-2" style="font-size: large;">
    <div class="col-12">
        <div class="">Fiche de préinscription</div>
        <embed src="{{asset('storage/'. $demande->document->copie_fiche_preinscription)}}" width="700" height="400"
            type="application/pdf">
    </div>
</div>
@endif

@if($demande->document->copie_carte_etudiant)
<div class="row mt-2" style="font-size: large;">
    <div class="col-12">
        <div class="">Carte d'étudiant</div>
        <embed src="{{asset('storage/'. $demande->document->copie_carte_etudiant)}}" width="700" height="400"
            type="application/pdf">
    </div>
</div>
@endif

@if($demande->document->certificat_de_perte)
<div class="row mt-2" style="font-size: large;">
    <div class="col-12">
        <div class="">Certificat de perte</div>
        <embed src="{{asset('storage/'. $demande->document->certificat_de_perte)}}" width="700" height="400"
            type="application/pdf">
    </div>
</div>
@endif


@if($demande->document->copie_acte_perdu)
<div class="row mt-2" style="font-size: large;">
    <div class="col-12">
        <div class="">Copie de l'acte perdu</div>
        <embed src="{{asset('storage/'. $demande->document->copie_acte_perdu)}}" width="700" height="400"
            type="application/pdf">
    </div>
</div>
@endif


@if($demande->document->copie_quittance_frais_soutenance)
<div class="row mt-2" style="font-size: large;">
    <div class="col-12">
        <div class="">Quittance des frais de soutenance</div>
        <embed src="{{asset('storage/'. $demande->document->copie_quittance_frais_soutenance)}}" width="700"
            height="400" type="application/pdf">
    </div>
</div>
@endif


@if($demande->document->originale_quitus)
<div class="row mt-2" style="font-size: large;">
    <div class="col-12">
        <div class="">Original du quitus</div>
        <embed src="{{asset('storage/'. $demande->document->originale_quitus)}}" width="700" height="400"
            type="application/pdf">
    </div>
</div>
@endif


@if($demande->document->programmation_de_la_soutenance)
<div class="row mt-2" style="font-size: large;">
    <div class="col-12">
        <div class="">Programmation de la soutenance</div>
        <embed src="{{asset('storage/'. $demande->document->programmation_de_la_soutenance)}}" width="700" height="400"
            type="application/pdf">
    </div>
</div>
@endif


@if($demande->document->piece_suscite)
<div class="row mt-2" style="font-size: large;">
    <div class="col-12">
        <div class="">Pièce suscité</div>
        <embed src="{{asset('storage/'. $demande->document->piece_suscite)}}" width="700" height="400"
            type="application/pdf">
    </div>
</div>
@endif


@if($demande->document->original_acte_certifie)
<div class="row mt-2" style="font-size: large;">
    <div class="col-12">
        <div class="">Original de l'acte certifé</div>
        <embed src="{{asset('storage/'. $demande->document->original_acte_certifie)}}" width="700" height="400"
            type="application/pdf">
    </div>
</div>
@endif


@if($demande->document->copie_acte_certifie)
<div class="row mt-2" style="font-size: large;">
    <div class="col-12">
        <div class="">Copie de l'acte certifié</div>
        <embed src="{{asset('storage/'. $demande->document->copie_acte_certifie)}}" width="700" height="400"
            type="application/pdf">
    </div>
</div>
@endif


@if($demande->document->copie_photo_identite)
<div class="row mt-2" style="font-size: large;">
    <div class="col-12">
        <div class="">Photo d'identité</div>
        <embed src="{{asset('storage/'. $demande->document->copie_photo_identite)}}" width="700" height="400"
            type="application/pdf">
    </div>
</div>
@endif


@if($demande->document->originale_attestation)
<div class="row mt-2" style="font-size: large;">
    <div class="col-12">
        <div class="">Originale de l'attestation</div>
        <embed src="{{asset('storage/'. $demande->document->originale_attestation)}}" width="700" height="400"
            type="application/pdf">
    </div>
</div>
@endif

@if($demande->document->copie_releve_1)
<div class="row mt-2" style="font-size: large;">
    <div class="col-12">
        <div class="">Relevés de notes de la première année</div>
        <embed src="{{asset('storage/'. $demande->document->copie_fiche_preinscription)}}" width="700" height="400"
            type="application/pdf">
    </div>
</div>
@endif