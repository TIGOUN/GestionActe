<!-- Large modal -->
<div class="modal fade bd-example-modal-lg-show-{{$demande->id}}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Détails sur la demande {{ $demande->code_demande }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <h3 class="text-center">IDENTITÉ DU DEMANDEUR</h3>

                <div class="container mt-4">
                    @include('admin.demandes.show_details_etudiant',['demande' => $demande])
                </div>

                <h3 class="text-center mt-4">ACTES ET CURSUS ACADÉMIQUE</h3>

                <div class="container mt-4">
                    @include('admin.demandes.show_details_validation',['demande' => $demande])
                </div>

                <h3 class="text-center mt-4">PREUVE DE PAIEMENT</h3>

                <div class="container mt-4">
                    @include('admin.demandes.show_details_paiement',['demande' => $demande])
                </div>

                <h3 class="text-center mt-4">PIÈCES FOURNIR</h3>

                <div class="container mt-4">

                    @include('admin.demandes.show_details_piece',['demande' => $demande])

                </div>

            </div>
        </div>
    </div>
</div>