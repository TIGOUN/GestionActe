@extends('admin.layouts.master')

@section('content')

<div class="col-12">
    <div class="row align-items-center my-3">
        <div class="col">
            <h2 class="page-title">Roles</h2>
        </div>
        <div class="col-auto" style="font-size: 18px;">
            Editer un role
        </div>
    </div>
</div>

@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

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
                    {!! Form::model($role, ['method' => 'PUT','route' => ['role.update', $role->id]]) !!}
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Nom du role:</strong>
                                {!! Form::text('nom du role', null, array('placeholder' => 'Name','class' =>
                                'form-control'))
                                !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Permission:</strong>
                                <br />
                                @foreach($permission as $value)
                                <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                    {{ $value->name }}</label>
                                <br />
                                @endforeach
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Créer ce role</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                    <!-- Fin -->
                </div>
            </div>
        </div>
    </div>
</div>


@endsection