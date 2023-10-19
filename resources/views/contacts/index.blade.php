@extends('layouts.dashbord')

@section('content')

<!-- nav bar -->
@include('client.partials.header')

<div class="mt-4">
    &nbsp;
</div>

<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
    <div class="container">
        <ol>
            <li><a href="index.html">Acceuil</a></li>
            <li>Contactez-nous</li>
        </ol>
        <h2>CONTACTEZ-NOUS</h2>
    </div>
</section>
<!-- End Breadcrumbs -->
<!-- Nous contactez -->
@include('contacts.contactez-nous')

@endsection