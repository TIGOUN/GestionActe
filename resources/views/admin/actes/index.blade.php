@extends('admin.layouts.master')

@section('content')

<div class="col-12">
    <div class="row align-items-center my-3">
        <div class="col">
            <h2 class="page-title">Actes académiques</h2>
        </div>
        <div class="col-auto" style="font-size: 18px;">
            Liste de toutes les actes
        </div>
    </div>
</div>

<div class="col-12">
    <div class="row align-items-center">
        <div class="col">
        </div>
        <div class="col-auto">
            <button class="btn btn-primary mb-2" data-toggle="modal" data-target=".bd-example-modal-lg-create">
                Ajouter un acte académique</button>
            @include('admin.actes.create')
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
                                <!-- <th></th> -->
                                <th style="color:black; font-weight:900;">Position</th>
                                <th style="color:black; font-weight:900;">Code</th>
                                <th style="color:black; font-weight:900;">Catégories</th>
                                <th style="color:black; font-weight:900;">Sous-catégories</th>
                                <th style="color:black; font-weight:900;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($actes as $key => $acte)
                            @if($acte->acte_parent_id==null)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $acte->code }}</td>
                                <td>{{ $acte->nom }}</td>
                                <td>
                                    <!-- Affichage des catégories -->
                                    @if ($acte->childCategories->isNotEmpty())
                                    <ul>
                                        <!-- Affichage des sous-catégories -->
                                        @foreach ($acte->childCategories as $childCategory)
                                        <li><b>{{ $childCategory->code }} : </b>{{ $childCategory->nom }}
                                            @include('admin.actes.edit_sous',['childCategory' => $childCategory])
                                            <a href="javascript(0)" data-toggle="modal"
                                                data-target=".bd-example-modal-lg-edit-sous-{{$childCategory->id}}">
                                                <i class="fe fe-edit text-decoration-none"></i></a>

                                            <a href="{{ route('acte.delete',$childCategory->id) }}"><i
                                                    class="fe fe-trash-2 text-decoration-none"
                                                    style="color: red;"></i></a>
                                        </li>
                                        @endforeach
                                    </ul>
                                    @else
                                    <ul>
                                        <li>
                                            Aucun sous-catégorie
                                        </li>
                                    </ul>
                                    @endif
                                </td>
                                <td>
                                    <!-- Editer un département -->
                                    @include('admin.actes.edit',['acte' => $acte])
                                    <a href="#" class="btn btn-lignt" data-toggle="modal"
                                        data-target=".bd-example-modal-lg-edit-{{$acte->id}}">
                                        <i class="fe fe-edit" style="font-size: 20px;"></i></a>

                                    <a onclick="return confirmation(event)" href="{{ route('acte.delete',$acte->id) }}"
                                        class="btn btn-danger"><i class="fe fe-trash-2"
                                            style="font-size: 20px;"></i></a>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- simple table -->
    </div>
</div>


@endsection