@extends('admin.layouts.master')

@section('content')

<div class="col-12">
    <div class="row align-items-center my-3">
        <div class="col">
            <h2 class="page-title">Utilisateurs</h2>
        </div>
        <div class="col-auto" style="font-size: 18px;">
            Liste de toutes les utilisateurs
        </div>
    </div>
</div>

<div class="col-12">
    <div class="row align-items-center">
        <div class="col">
        </div>
        <div class="col-auto">
            <!-- <button class="btn btn-primary mb-2" data-toggle="modal" data-target=".bd-example-modal-lg-create">
                Ajouter un utilisateur</button> -->
            <a class="btn btn-primary mb-2" href="{{ route('user.create') }}">
                Ajouter un utilisateur</a>
        </div>
    </div>
</div>


<div class="col-12">
    <div class="row my-4">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body">
                    <table class="table datatables" id="dataTable-1">
                        <thead>
                            <tr>
                                <!-- <th style="font-weight: 900; color:black;">Position</th> -->
                                <th style="font-weight: 900; color:black;">Name</th>
                                <th style="font-weight: 900; color:black;">Email</th>
                                <th style="font-weight: 900; color:black;">Roles</th>
                                <th style="color:black; font-weight:900;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $key => $user)
                            <tr>
                                <!-- <td>{{ ++$i }}</td> -->
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if(!empty($user->getRoleNames()))
                                    @foreach($user->getRoleNames() as $v)
                                    <label class="badge badge-success">{{ $v }}</label>
                                    @endforeach
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('user.show',$user->id) }}"><i
                                            class="fe fe-eye" style="font-size: 20px;"></i></a>

                                    <a class="btn btn-light" href="{{ route('user.edit',$user->id) }}"><i
                                            class="fe fe-edit" style="font-size: 20px;"></i></a>

                                    <a href="{{ route('user.delete',$user->id) }}" class="btn btn-danger"
                                        onclick="return confirmation(event)"><i class="fe fe-trash-2"
                                            style="font-size: 20px;"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $data->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection