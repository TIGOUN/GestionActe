<!-- Large modal -->
<div class="modal fade bd-example-modal-lg-show-{{$admission->id}}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Plus de détails (mise à jour le
                    {{$admission->updated_at->format('d/m/y')}} )</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 class="text-center">RÉPONSE À L'ADMISSION</h3>

                <div class="container mt-4">
                    @if($admission->motif_refus==null && $admission->fichier_admission==null)
                    <form action="{{ route('admission.update',$admission->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Status de l'admission</label>
                            <select class="form-select form-control" name="status" id="typeElement"
                                onchange="afficherFormulaire()" required style="font-size: large;">
                                <option>Selectionner le statut pour cette demande d'admission</option>
                                <option value="valider">Valider</option>
                                <option value="rejeter">Rejeter</option>
                            </select>
                        </div>

                        <div id="formContainer">

                        </div>

                        <button type="submit" class="btn"
                            style="background-color: #012970; color: white; font-weight:900;">Mettre à jour</button>
                    </form>
                    @elseif($admission->fichier_admission!=null && $admission->motif_refus==null)
                    <h4 class="text-center">Télécharger ici la reponse à l'admission</h4>
                    <div class="justify-content-center">

                        <a href="{{ asset('storage/' . $admission->fichier_admission) }}" target="_blank"
                            download>Preuve d'admission</a>

                    </div>



                    @elseif($admission->motif_refus!=null && $admission->fichier_admission==null)
                    <div class="alert alert-danger" role="alert">
                        Demande déjà traité et rejeté sous le motif de :
                        </strong>
                        <p>{{$admission->motif_refus}}</p>
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
                            <label class="form-label" style="font-size: large;">Fichier (en réponse à l'admission)</label>
                            <input type="file" multiple name="fichier_admission" required class="form-control @error('fichier_admission') is-invalid @enderror">
                            @error('fichier_admission')
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