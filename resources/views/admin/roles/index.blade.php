@extends('admin.layouts.master')

@section('content')

<div class="col-12">
    <div class="row align-items-center my-3">
        <div class="col">
            <h2 class="page-title">Roles</h2>
        </div>
        <div class="col-auto" style="font-size: 18px;">
            Liste de tous les roles
        </div>
    </div>
</div>

<div class="col-12">
    <div class="row align-items-center">
        <div class="col">
        </div>
        <div class="col-auto">
            @can('role-create')
            <a class="btn btn-primary mb-2" href="{{ route('role.create') }}">
                Ajouter un role</a>
            @endcan
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div class="col-12">
    <div class="row my-4">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body">
                    <table class="table datatables" id="dataTable-1">
                        <thead>
                            <tr>
                                <!-- <th style="font-weight: 900; color:black;">Position</th> -->
                                <th style="font-weight: 900; color:black;">Nom</th>
                                <th style="color:black; font-weight:900;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $key => $role)
                            <tr>
                                <!-- <td>{{ ++$i }}</td> -->
                                <td>{{ $role->name }}</td>
                                <td>
                                    @can('role-list')
                                    <a class="btn btn-primary" href="{{ route('role.show',$role->id) }}"><i
                                            class="fe fe-eye" style="font-size: 20px;"></i></a>
                                    @endcan

                                    @can('role-edit')
                                    <a class="btn btn-light" href="{{ route('role.edit',$role->id) }}"><i
                                            class="fe fe-edit" style="font-size: 20px;"></i></a>
                                    @endcan

                                    @can('role-delete')
                                    <a href="{{ route('role.delete',$role->id) }}" onclick="return confirmation(event)"
                                        class="btn btn-danger"><i class="fe fe-trash-2"
                                            style="font-size: 20px;"></i></a>
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $roles->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection