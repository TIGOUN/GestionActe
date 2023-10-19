<!-- Large modal -->
<div class="modal fade bd-example-modal-lg-edit-{{$demande->id}}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Réponse à la demande {{ $demande->code_demande }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 class="text-center">RÉPONSE À LA DEMANDE</h3>

                <div class="container mt-4">
                    @if($demande->reponse->acte_demande==null && $demande->reponse->motif_refus==null)
                    <form action="{{ route('demande.reponse',$demande->reponse_id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id_demande" value="{{$demande->id}}">

                        <div class="mb-3">
                            <label class="form-label">Status de la demande</label>
                            <select class="form-select form-control" name="status" id="typeElement"
                                onchange="afficherFormulaire()" required style="font-size: large;">
                                <option>Selectionner le statut de demande</option>
                                <option value="valider">Valider</option>
                                <option value="rejeter">Rejeter</option>
                            </select>
                        </div>

                        <div id="formContainer">

                        </div>

                        <button type="submit" class="btn"
                            style="background-color: #012970; color: white; font-weight:900;">Mettre à jour</button>
                    </form>
                    @elseif($demande->reponse->acte_demande!=null)
                    <h4 class="text-center">Télécharger ici la reponse à la demande {{ $demande->code_demande }}</h4>
                    <div class="justify-content-center">
                        @php
                        $acteDemandeArray = json_decode($demande->reponse->acte_demande, true);
                        @endphp

                        @if (is_array($acteDemandeArray))
                        @foreach ($acteDemandeArray as $fichier)
                        <a href="{{ asset('storage/' . $fichier) }}" target="_blank" download>{{ $fichier }}</a>
                        <br>
                        @endforeach

                        <div class="row">
                            Signature du demandeur :
                            <!-- <img src="{{ asset('storage/' . $demande->signature) }}" alt="Signature de l'utilisateur"> -->
                            <img src="{{$demande->signature}}" alt="Signature de l'utilisateur">
                        </div>
                        @else

                        <p>Acte de demande non disponible ou au format incorrect.</p>
                        @endif
                    </div>



                    @elseif($demande->reponse->motif_refus!=null)
                    <div class="alert alert-danger" role="alert">
                        Demande déjà traité et rejeté sous le motif de :
                        </strong>
                        <p>{{$demande->reponse->motif_refus}}</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function afficherFormulaire() {
    var typeElement = document.getElementById('typeElement').value;
    var formContainer = document.getElementById('formContainer');

    // Effacer le contenu précédent du conteneur
    formContainer.innerHTML = '';
    if (typeElement === "valider") {
        formContainer.innerHTML = `

                        <div class="mb-3">
                            <label class="form-label" style="font-size: large;">Fichier (en réponse à la demande)</label>
                            <input required type="file" multiple name="acte_demande[]" required class="form-control @error('acte_demande') is-invalid @enderror">
                            @error('acte_demande')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
        `;
    } else if (typeElement === "rejeter") {
        formContainer.innerHTML = `
                        <div class="mb-3">
                            <label class="form-label" style="font-size: large;">Motif (<span style="color : red;">Remplissez seulement dans le cas d'un rejet de la
                                demande</span>)</label>
                            <textarea required name="motif_refus" class="form-control @error('motif_refus') is-invalid @enderror" maxlength="500" rows="5"
                                placeholder="Le nombre de caractères maximum est de 500 caractères"></textarea>
                                @error('motif_refus')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
        `;
    }
}
</script>