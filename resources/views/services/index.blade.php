@extends('layouts.dashbord')

@section('content')

<!-- nav bar -->
@include('client.partials.header')

<div class="mt-4">
    &nbsp;
</div>
<div class="mt-4">
    &nbsp;
</div>

<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="index.html">Acceuil</a></li>
            <li>Services</li>
        </ol>
        <h2>SERVICES</h2>
    </div>
</section>
<!-- End Breadcrumbs -->
@include('services.liste')

@endsection