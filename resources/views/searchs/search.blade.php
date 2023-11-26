@extends('layouts.dashbord')

@section('content')

@include('client.partials.header')

<div class="mt-4">
    &nbsp;
</div>
<div class="mt-4">
    &nbsp;
</div>


<section class="breadcrumbs">
    <div class="container">
        <ol>
            <li><a href="index.html">Acceuil</a></li>
            <li>Résultat(s) des recherches</li>
        </ol>
        <h2>Demande : #{{ $demande->code_demande }}</h2>
    </div>
</section>
<!-- End Breadcrumbs -->


<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <!-- .row -->
            <div class="row my-4">
                <div class="col-md-9">
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong class="card-title">Détails sur votre demande</strong>
                            <span class="float-right"><i class="fe fe-flag mr-2"></i><span
                                    class="badge badge-pill badge-success text-black">{{ $demande->code_demande }}</span></span>
                        </div>
                        <div class="card-body">
                            <dl class="row align-items-center mb-0">

                                <dt class="col-sm-2 mb-3 text-muted">Nom & prénoms : </dt>
                                <dd class="col-sm-4 mb-3">
                                    {{ $demande->etudiant->nom }} {{ $demande->etudiant->prenoms }}
                                </dd>

                                <dt class="col-sm-2 mb-3 text-muted">Email : </dt>
                                <dd class="col-sm-4 mb-3">
                                    {{ $demande->etudiant->email }}
                                </dd>

                            </dl>
                            <dl class="row mb-0">

                                <dt class="col-sm-2 mb-3 text-muted">Matricule : </dt>
                                <dd class="col-sm-4 mb-3">{{ $demande->etudiant->matricule }}</dd>

                                <dt class="col-sm-2 mb-3 text-muted">Contact(s) : </dt>
                                <dd class="col-sm-4 mb-3">
                                    {{ $demande->etudiant->contacts }}
                                </dd>

                                <dt class="col-sm-2 mb-3 text-muted">Département : </dt>
                                <dd class="col-sm-4 mb-3">
                                    {{ $demande->etudiant->departement->nom }}
                                </dd>

                                <dt class="col-sm-2 mb-3 text-muted">Option : </dt>
                                <dd class="col-sm-4 mb-3">{{ $demande->etudiant->option }}</dd>


                                <dt class="col-sm-2 mb-3 text-muted">Acte demandé : </dt>
                                <dd class="col-sm-4 mb-3">
                                    {{ $demande->acte->parentCategory->nom }},
                                    {{ $demande->acte->nom }}
                                </dd>



                                <dt class="col-sm-2 mb-3 text-muted">Status : </dt>
                                <dd class="col-sm-4 mb-3 text-muted">
                                    @if($demande->statut_reponse=="En attente")
                                    <span class="btn btn-info">{{ $demande->statut_reponse }}</span>
                                    @elseif($demande->statut_reponse=="Valider")
                                    <span class="btn btn-success">{{ $demande->statut_reponse }}</span>
                                    @elseif($demande->statut_reponse=="Rejeter")
                                    <span class="btn btn-danger">{{ $demande->statut_reponse }}</span>
                                    @endif
                                </dd>

                            </dl>
                        </div>
                    </div>
                </div>

                @if($demande->reponse->motif_refus!=null && $demande->reponse->acte_demande==null)
                <div class="col-md-3">
                    <div class="card shadow mb-4 alert alert-danger">
                        <div class="card-body">
                            <h3 class="h5 mb-1">Motif du refus</h3>
                            <p class="text-muted mb-4">{{$demande->reponse->motif_refus}}</p>
                        </div>
                    </div>
                </div>
                @elseif($demande->reponse->motif_refus==null && $demande->reponse->acte_demande!=null)
                <div class="col-md-3 ">
                    <div class="card shadow mb-4 alert alert-success">
                        <div class="card-body">
                            @if($demande->signature==null)
                            <h3 class="h5 mb-1">Signé ici pour retiré votre demande</h3>

                            <form action="{{ route('signer.demande',$demande->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- <input type="hidden" name="dmd" value="{{ $demande->id }}" id=""> -->

                                <div id="sig"></div>

                                <br><br>
                                <button id="clear" class="btn btn-danger">Effacer</button>
                                <button class="btn btn-success" type="submit">Enregistrer</button>
                                <textarea id="signature" name="signature" style="display: none"></textarea>
                            </form>
                            @else
                            <h3 class="h5 mb-1">Cliquer pour télécharger</h3>



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



                            @endif
                        </div>
                    </div>
                </div>
                @elseif($demande->reponse->motif_refus==null && $demande->reponse->acte_demande==null)
                <div class="col-md-3">
                    <div class="card shadow mb-4 alert alert-info">
                        <div class="card-body">
                            <h3 class="h5 mb-1">Votre demande enregistrer sous le numéro #{{ $demande->code_demande }}
                                est en cours de traitement...</h3>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>






<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
    integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
<script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>
<script type="text/javascript">
var sig = $('#sig').signature({
    syncField: '#signature',
    syncFormat: 'PNG'
});
$('#clear').click(function(e) {
    e.preventDefault();
    sig.signature('clear');
    $("#signature").val('');
});
</script>
@endsection