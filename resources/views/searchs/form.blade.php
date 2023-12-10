@extends('layouts.dashbord')

@section('content')

@include('client.partials.header')

<div class="mt-4">
    &nbsp;
</div>
<div class="mt-4">
    &nbsp;
</div>

<section class="breadcrumbs">
    <div class="container">
        <ol>
            <li><a href="index.html">Acceuil</a></li>
            <li>Rechercher</li>
        </ol>
        <h2>Rechercher une demande</h2>
    </div>
</section>



<div class="container">
    <div class="row justify-content-center">
        <!-- <div class="col-6"> -->
        <div class="row mt-4 mb-3">
            <h2 class="text-center">Rechercher une demande</h2>
        </div>
        <div class="row mb-5">
            <form action="{{ route('search.demande') }}" method="POST" class="d-flex w-50 mx-auto">
                @csrf
                <input type="text" class="form-control" name="search_demande" placeholder="Entrer votre code demande">
                <button type="submit" class="btn btn-primary mx-2">Rechercher</button>
            </form>
            <!-- </div> -->
        </div>
    </div>
</div>

@endsection