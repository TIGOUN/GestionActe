@extends('admin.layouts.master')

@section('content')
<div class="col-12">
    <div class="row align-items-center my-3">
        <div class="col">
            <h2 class="page-title">Posts</h2>
        </div>
        <div class="col-auto">
            Liste de tous les posts
        </div>
    </div>
</div>

<div class="col-12">
    <div class="row align-items-center">
        <div class="col">
        </div>
        <div class="col-auto">
            @include('admin.blogs.create')
            <button class="btn btn-primary mb-2" data-toggle="modal" data-target=".bd-example-modal-lg-create">
                Ajouter un nouveau post</button>
        </div>
    </div>
</div>




<div class="container-fluid">
    <div class="row justify-content-center">
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
                                        <th style="font-weight: 900; color:black;">Position</th>
                                        <th style="font-weight: 900; color:black;">Titre</th>
                                        <th style="font-weight: 900; color:black;">Date</th>
                                        <th style="font-weight: 900; color:black;">Image</th>
                                        <th style="font-weight: 900; color:black;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($posts as $post)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $post->titre }}</td>
                                        <td>{{ $post->created_at->format('d/m/y') }}</td>
                                        <td>
                                            @if($post->images)
                                            <img src="{{ asset('storage/'. $post->images) }}" width="60" height="40"
                                                alt="">
                                            @else
                                            Pas d'image
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.blog.show',$post->id) }}" class="btn btn-info">
                                                <i class="fe fe-eye" style="font-size: 20px;"></i></a>

                                            @include('admin.blogs.edit',['post' => $post])
                                            <a href="#" class="btn btn-light" data-toggle="modal"
                                                data-target=".bd-example-modal-lg-edit-{{$post->id}}">
                                                <i class="fe fe-edit" style="font-size: 20px;"></i></a>

                                            <a href="{{ route('admin.blog.delete', $post->id) }}"
                                                class="btn btn-danger">
                                                <i class="fe fe-trash-2" style="font-size: 20px;"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection