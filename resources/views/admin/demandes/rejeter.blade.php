@extends('admin.layouts.master')

@section('content')
<div class="col-12">
    <div class="row align-items-center my-3">
        <div class="col">
            <h2 class="page-title">Demandes</h2>
        </div>
        <div class="col-auto">
            Liste des demandes (Rejeter)
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">

            <div class="row my-4">
                <!-- Small table -->
                <div class="col-md-12">
                    <div class="card shadow">
                        <div class="card-body">
                            <!-- table -->
                            <table class="table datatables" id="dataTable-1">
                                <thead>
                                    <tr>
                                        <th style="font-weight: 900; color:black;">Code</th>
                                        <th style="font-weight: 900; color:black;">Acte</th>
                                        <th style="font-weight: 900; color:black;">Date</th>
                                        <th style="font-weight: 900; color:black;">Status</th>
                                        <th style="font-weight: 900; color:black;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($demandes as $demande)
                                    <tr>
                                        <td>{{ $demande->code_demande }}</td>
                                        <td>
                                            <span>{{ $demande->acte->parentCategory->nom }}</span>
                                            {{ $demande->acte->nom }}

                                        </td>
                                        <td>{{ $demande->created_at->format('d/m/Y') }}</td>
                                        <td>
                                            @if($demande->statut_reponse=="En attente")
                                            <span
                                                class="badge badge-pill badge-info">{{ $demande->statut_reponse }}</span>
                                            @elseif($demande->statut_reponse=="Valider")
                                            <span
                                                class="badge badge-pill badge-success">{{ $demande->statut_reponse }}</span>
                                            @elseif($demande->statut_reponse=="Rejeter")
                                            <span
                                                class="badge badge-pill badge-danger">{{ $demande->statut_reponse }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @include('admin.demandes.show',['demande' => $demande])
                                            <a href="#" style="font-size: 15px;" class="btn btn-primary"
                                                data-toggle="modal"
                                                data-target=".bd-example-modal-lg-show-{{$demande->id}}">
                                                <i class="fe fe-eye"></i></a>

                                            @include('admin.demandes.edit',['demande' => $demande])
                                            <a href="#" style="font-size: 15px;" class="btn btn-info"
                                                data-toggle="modal"
                                                data-target=".bd-example-modal-lg-edit-{{$demande->id}}">
                                                <i class="fe fe-edit"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- simple table -->
            </div> <!-- end section -->
        </div> <!-- .col-12 -->
    </div> <!-- .row -->
</div>


@endsection