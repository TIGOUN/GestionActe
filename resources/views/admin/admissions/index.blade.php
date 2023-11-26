@extends('admin.layouts.master')

@section('content')

<div class="col-12">
    <div class="row align-items-center my-3">
        <div class="col">
            <h2 class="page-title">Admissions</h2>
        </div>
        <div class="col-auto" style="font-size: 18px;">
            Liste de tous les demandes d'admission
        </div>
    </div>
</div>

<div class="col-12">
    <div class="row align-items-center">
        <div class="col">
        </div>
        <div class="col-auto">

        </div>
    </div>
</div>








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
                                <th style="font-weight: 900; color:black;">Nom & prénoms</th>
                                <th style="font-weight: 900; color:black;">Email</th>
                                <th style="font-weight: 900; color:black;">Résidence</th>
                                <th style="font-weight: 900; color:black;">Provenance</th>
                                <th style="font-weight: 900; color:black;">Envoyée le</th>
                                <th style="font-weight: 900; color:black;">Status</th>
                                <th style="font-weight: 900; color:black;">Dossier</th>
                                <th style="color:black; font-weight:900;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($admissions as $admission)
                            <tr>
                                <td>{{ $admission->nom }} {{ $admission->prenoms }}</td>
                                <td><a href="mailto:{{ $admission->email }}">{{ $admission->email }}</a></td>
                                <td>{{ $admission->pays_residence }}</td>
                                <td>{{ $admission->pays_provenance }}</td>
                                <td>{{ $admission->created_at->format('d/m/y') }}</td>
                                <td>
                                    @if($admission->status=="En attente")
                                    <span class="badge badge-pill badge-info" style="font-size: 12px;">En
                                        attente</span>
                                    @elseif($admission->status=="Accepté")
                                    <span class="badge badge-pill badge-success" style="font-size: 12px;">Accepté</span>
                                    @elseif($admission->status=="Rejeté")
                                    <span class="badge badge-pill badge-danger" style="font-size: 12px;">Rejeté</span>
                                    @endif
                                </td>
                                <td> <a href="{{ asset('storage/' . $admission->fichier) }}" target="_blank"
                                        download>Télécharger</a>
                                </td>
                                <td>
                                    @include('admin.admissions.show',['admission' => $admission])
                                    <a href="#" class="btn btn-light" data-toggle="modal"
                                        data-target=".bd-example-modal-lg-show-{{$admission->id}}">
                                        <i class="fe fe-edit" style="font-size: 20px;"></i></a>


                                    <a href="{{ route('admission.destroy',$admission->id) }}" class="btn btn-danger"><i
                                            class="fe fe-trash-2" style="font-size: 20px;"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- simple table -->
    </div>
</div>


@endsection