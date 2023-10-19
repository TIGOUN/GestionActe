@extends('admin.layouts.master')

@section('content')

<div class="col-12">
    <div class="row align-items-center my-3">
        <div class="col">
            <h2 class="page-title">Evaluations</h2>
        </div>
        <div class="col-auto" style="font-size: 18px;">
            Liste de tous les programmes d'évaluations
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
                                <th style="font-weight: 900; color:black;">Session</th>
                                <th style="font-weight: 900; color:black;">Date de début</th>
                                <th style="font-weight: 900; color:black;">Date de fin</th>
                                <th style="font-weight: 900; color:black;">Niveau</th>
                                <th style="font-weight: 900; color:black;">Fichier</th>
                                <th style="font-weight: 900; color:black;">Crée le</th>
                                <th style="color:black; font-weight:900;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($evaluations as $evaluation)
                            <tr>
                                <td>{{ $evaluation->session }}</td>
                                <td>{{ $evaluation->date_debut }}</td>
                                <td>{{ $evaluation->date_fin }}</td>
                                <td>{{ $evaluation->classe }}</td>
                                <td> <a href="{{ asset('storage/' . $evaluation->fichier) }}" target="_blank"
                                        download>Télécharger</a>
                                </td>
                                <td>{{ $evaluation->created_at->format('d/m/y') }}</td>
                                <td>
                                    @include('admin.evaluations.edit',['evaluation' => $evaluation])
                                    <a href="#" style="font-size: 15px;" class="btn btn-info" data-toggle="modal"
                                        data-target=".bd-example-modal-lg-edit-{{$evaluation->id}}">
                                        <i class="fe fe-edit"></i></a>


                                    <a href="{{ route('eval.destroy',$evaluation->id) }}" style="font-size: 15px;"
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