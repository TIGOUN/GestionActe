a@extends('admin.layouts.master')

@section('content')

<div class="col-12">
    <div class="row align-items-center my-3">
        <div class="col">
            <h2 class="page-title">Con</h2>
        </div>
        <div class="col-auto">
            Liste de tous les messages de prise contact
        </div>
    </div>
</div>

<div class="col-12">
    <div class="row align-items-center">
        <div class="col">
        </div>
        <div class="col-auto">
            <button class="btn btn-primary mb-2" data-toggle="modal" data-target=".bd-example-modal-lg-create">
                Ajouter un programme d'évaluation</button>
            @include('admin.evaluations.create')
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
                                <th style="font-weight: 900; color:black;">Fichier</th>
                                <th style="color:black; font-weight:900;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($admissions as $admission)
                            <tr>
                                <td>{{ $admission->nom }} {{ $admission->prenoms }}</td>
                                <td>{{ $admission->email }}</td>
                                <td>{{ $admission->pays_residence }}</td>
                                <td>{{ $admission->pays_provenance }}</td>
                                <td>{{ $admission->created_at->format('d/m/y') }}</td>
                                <td> <a href="{{ asset('storage/' . $admission->fichier) }}" target="_blank"
                                        download>Télécharger</a>
                                </td>
                                <td>
                                    @include('admin.admissions.show',['admission' => $admission])
                                    <a href="#" style="font-size: 15px;" class="btn btn-info" data-toggle="modal"
                                        data-target=".bd-example-modal-lg-show-{{$admission->id}}">
                                        <i class="fe fe-edit"></i></a>


                                    <a href="{{ route('admission.destroy',$admission->id) }}" style="font-size: 15px;"
                                        class="btn btn-danger"><i class="fe fe-trash-2"></i></a>
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