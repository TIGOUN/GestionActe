<!-- Large modal -->
<div class="modal fade bd-example-modal-lg-rapport-{{$demande->id}}" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Rapport de la demande {{ $demande->code_demande }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 class="text-center">RAPPORT</h3>

                <div class="container mt-4">
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
                            {{ $demande->etudiant->email }}, {{ $demande->etudiant->contacts }}
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-4" style="font-size: large;">
                            Catégorie, nom de l'acte
                        </div>
                        <div class="col-md-6" style="font-size: large;">
                            {{ $demande->acte->parentCategory->nom }},
                            {{ $demande->acte->nom }}
                        </div>
                    </div>


                    <div class="row mt-2">
                        <div class="col-md-4" style="font-size: large;">
                            Réponse à la demande
                        </div>
                        <div class="col-md-6" style="font-size: large;">
                            @if($demande->reponse->motif_refus!=null && $demande->reponse->acte_demande==null)


                            @elseif()


                            @endif

                            @php
                            $acteDemandeArray = json_decode($demande->reponse->acte_demande, true);
                            @endphp

                            @if (is_array($acteDemandeArray))
                            @foreach ($acteDemandeArray as $fichier)
                            <a href="{{ asset('storage/' . $fichier) }}" target="_blank" download>{{ $fichier }}</a>
                            <br>
                            @endforeach
                            @else

                            <p>Acte de demande non disponible ou au format incorrect.</p>
                            @endif


                        </div>
                    </div>


                    <div class="row mt-2">
                        <div class="col-md-4" style="font-size: large;">
                            Signature
                        </div>
                        <div class="col-md-6" style="font-size: large;">

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>