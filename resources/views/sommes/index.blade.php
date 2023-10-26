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
            <li>Qui sommes-nous ?</li>
        </ol>
        <h2>Qui sommes-nous ?</h2>
    </div>
</section>

@include('apropos.apropos-de-nous')


@include('mot.unmotdudirecteur')

<!-- Nos statistiques -->
@include('statistiques.effectif')



<!-- Nos étudiants -->
@include('etudiants.etudiant_parlent')

<!-- Nos professeurs -->
@include('professeurs.professeur')

@endsection