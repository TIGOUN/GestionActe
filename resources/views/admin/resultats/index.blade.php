@extends('admin.layouts.master')

@section('content')

<div class="col-12">
    <div class="row align-items-center my-3">
        <div class="col">
            <h2 class="page-title">Résultats semestrielle</h2>
        </div>
        <div class="col-auto" style="font-size: 18px;">
            Liste de toute les résultats semestrielle
        </div>
    </div>
</div>

<div class="col-12">
    <div class="row align-items-center">
        <div class="col">
        </div>
        <div class="col-auto">
            <button class="btn btn-primary mb-2" data-toggle="modal" data-target=".bd-example-modal-lg-create">
                Ajouter un résultat semestrielle</button>
            @include('admin.resultats.create')
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
                                <th style="font-weight: 900; color:black;">Année académique</th>
                                <th style="font-weight: 900; color:black;">Département</th>
                                <th style="font-weight: 900; color:black;">Niveau</th>
                                <th style="font-weight: 900; color:black;">Session</th>
                                <th style="font-weight: 900; color:black;">Fichier</th>
                                <th style="font-weight: 900; color:black;">Crée le</th>
                                <th style="color:black; font-weight:900;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($semestrielles as $semestrielle)
                            <tr>
                                <td>{{ $semestrielle->annee_academique }}</td>
                                <td>{{ $semestrielle->departement->nom }}</td>
                                <td>{{ $semestrielle->niveau }}</td>
                                <td>{{ $semestrielle->session }}</td>
                                <td> <a href="{{ asset('storage/' . $semestrielle->fichier) }}" target="_blank"
                                        download>Télécharger</a>
                                </td>
                                <td>{{ $semestrielle->created_at->format('d/m/y') }}</td>
                                <td>
                                    @include('admin.resultats.edit',['semestrielle' => $semestrielle])
                                    <a href="#" class="btn btn-light" data-toggle="modal"
                                        data-target=".bd-example-modal-lg-edit-{{$semestrielle->id}}">
                                        <i class="fe fe-edit" style="font-size: 20px;"></i></a>


                                    <a href="{{ route('sout.destroy',$semestrielle->id) }}" class="btn btn-danger"><i
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