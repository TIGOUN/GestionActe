@extends('layouts.dashbord')

@section('content')

@include('client.partials.header')

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
        <div class="col-6">

            <div class="row mt-4">
                <p class="text-center">Rechercher une demande</p>
            </div>
            <div class="row mb-5">
                <form action="{{ route('search.demande') }}" method="POST" class="d-flex">
                    @csrf
                    <input type="text" class="form-control" name="search_demande"
                        placeholder="Entrer votre code demande">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection