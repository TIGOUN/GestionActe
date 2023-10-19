@extends('admin.layouts.master')

@section('content')

<div class="col-12">
    <div class="row align-items-center my-3">
        <div class="col">
            <h2 class="page-title">Roles</h2>
        </div>
        <div class="col-auto" style="font-size: 18px;">
            Détail sur un role
        </div>
    </div>
</div>


<div class="col-12">
    <div class="row align-items-center">
        <div class="col">
        </div>
        <div class="col-auto">
            <a class="btn btn-primary mb-2" href="{{ route('role.index') }}">
                Tous les roles</a>
        </div>
    </div>
</div>


<div class="col-12">
    <div class="row my-4">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body">
                    <!-- Début -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                {{ $role->name }}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Permissions:</strong>
                                @if(!empty($rolePermissions))
                                @foreach($rolePermissions as $v)
                                <label class="label label-success">{{ $v->name }},</label>
                                @endforeach
                                @endif
                            </div>
                        </div>
                        <!-- Fin -->
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endsection