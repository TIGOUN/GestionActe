<div class="row mt-2" style="font-size: large;">
    <div class="col-md-4">
        Numéro de paiement
    </div>
    <div class="col-md-6">
        {{ $demande->paiement->reference }}
    </div>
</div>

<div class="row mt-2" style="font-size: large;">
    <div class="col-12">
        <div class="">Facture de paiement</div>
        <embed src="{{asset('storage/'. $demande->paiement->preuve_paiement)}}" width="700" height="400"
            type="application/pdf">
    </div>
</div>