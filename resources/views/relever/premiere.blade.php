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
            <li><a href="index.html">Demande</a></li>
            <li>Relevés de notes</li>
        </ol>
        <h2>Première année</h2>
    </div>
</section>
<!-- End Breadcrumbs -->

<section>
    <div class="container card shadow">
        <form action="" method="POST" autocomplete="on">
            @csrf

            <h3 class="text-center py-2">1-IDENTITÉ</h3>

            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Nom</label>
                        <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror"
                            data-provide="typeahead" id="the-basics" placeholder="" value="{{ old('nom') }}" required>
                        @error('nom')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>


                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Prénoms</label>
                        <input type="text" name="prenoms" class="form-control @error('prenoms') is-invalid @enderror"
                            data-provide="typeahead" id="the-basics" placeholder="" value="{{ old('prenoms') }}"
                            required>
                        @error('prenoms')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Date de naissance</label>
                        <input type="text" class="form-control @error('date_naissance') is-invalid @enderror"
                            data-toggle="input-mask" data-mask-format="00/00/0000" name="date_naissance"
                            value="{{ old('date_naissance') }}" required>
                        <span class="font-13 text-muted">e.g "DD/MM/YYYY"</span>
                        @error('date_naissance')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>


                <div class="col-lg-6">
                    <div class="mb-3">
                        <label class="form-label">Lieu de naissance</label>
                        <input type="text" class="form-control @error('lieu_naissance') is-invalid @enderror"
                            data-provide="typeahead" id="the-basics" placeholder="" name="lieu_naissance"
                            value="{{ old('lieu_naissance') }}" required>
                        @error('lieu_naissance')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

        </form>
    </div>
</section>
@endsection