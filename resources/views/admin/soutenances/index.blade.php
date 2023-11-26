@extends('admin.layouts.master')

@section('content')

<div class="col-12">
    <div class="row align-items-center my-3">
        <div class="col">
            <h2 class="page-title">Soutenances</h2>
        </div>
        <div class="col-auto" style="font-size: 18px;">
            Liste de toutes les programmes de soutenance
        </div>
    </div>
</div>

<div class="col-12">
    <div class="row align-items-center">
        <div class="col">
        </div>
        <div class="col-auto">
            <button class="btn btn-primary mb-2" data-toggle="modal" data-target=".bd-example-modal-lg-create">
                Ajouter un programme de soutenance</button>
            @include('admin.soutenances.create')
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
                                <th style="font-weight: 900; color:black;">Fichier</th>
                                <th style="font-weight: 900; color:black;">Crée le</th>
                                <th style="color:black; font-weight:900;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($soutenances as $soutenance)
                            <tr>
                                <td>{{ $soutenance->session }}</td>
                                <td>{{ $soutenance->date_debut }}</td>
                                <td>{{ $soutenance->date_fin }}</td>
                                <td> <a href="{{ asset('storage/' . $soutenance->fichier) }}" target="_blank"
                                        download>Télécharger</a>
                                </td>
                                <td>{{ $soutenance->created_at->format('d/m/y') }}</td>
                                <td>
                                    @include('admin.soutenances.edit',['soutenance' => $soutenance])
                                    <a href="#" class="btn btn-light" data-toggle="modal"
                                        data-target=".bd-example-modal-lg-edit-{{$soutenance->id}}">
                                        <i class="fe fe-edit" style="font-size: 20px;"></i></a>


                                    <a href="{{ route('sout.destroy',$soutenance->id) }}" class="btn btn-danger"><i
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