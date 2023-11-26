@extends('admin.layouts.master')

@section('content')

<div class="col-12">
    <div class="row align-items-center my-3">
        <div class="col">
            <h2 class="page-title">Départements</h2>
        </div>
        <div class="col-auto" style="font-size: 18px;">
            Liste de toutes les demandes
        </div>
    </div>
</div>

<div class="col-12">
    <div class="row align-items-center">
        <div class="col">
        </div>
        <div class="col-auto">
            <button class="btn btn-primary mb-2" data-toggle="modal" data-target=".bd-example-modal-lg-create">
                Ajouter un département</button>
            @include('admin.departements.create')
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
                                <!-- <th></th>
                                <th>#</th> -->
                                <th style="color:black; font-weight:900;">Code</th>
                                <th style="color:black; font-weight:900;">Nom</th>
                                <th style="color:black; font-weight:900;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($departements as $departement)
                            <tr>
                                <td>{{ $departement->code }}</td>
                                <td>{{ $departement->nom }}</td>
                                <td>
                                    <!-- Editer un département -->
                                    @include('admin.departements.edit',['departement' => $departement])
                                    <a href="#" class="btn btn-light" data-toggle="modal"
                                        data-target=".bd-example-modal-lg-edit-{{$departement->id}}">
                                        <i class="fe fe-edit" style="font-size: 20px;"></i></a>

                                    <a href="{{ route('departement.delete',$departement->id) }}"
                                        class="btn btn-danger"><i class="fe fe-trash-2"
                                            style="font-size: 20px;"></i></a>
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