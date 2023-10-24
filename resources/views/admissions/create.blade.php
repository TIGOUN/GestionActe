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
            <li>Admission</li>
        </ol>
        <h2>Demande d'admission</h2>
    </div>
</section>



<div class="container">
    <div class="row justify-content-center">

        <section id="contact" class="contact">

            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h1>Demande d'admission à la FASHS-UAC</h1>
                </header>

                <div class="row gy-4">

                    <div class="col-lg-6">

                        <div class="row info-box">

                            <h5>Noté bien : </h5>
                            <p class="mt-4 fs-5">
                                Vous devez remplir tous ces champs afin que votre demande d'admission soit prise en
                                compte.
                            </p>

                            <p class="mt-4 fs-5">
                                Toute les demandes d'admission en dehors du mois d'Aout jusqu'au Octobre ne seront pas
                                prise en compte pas notre administration (FASHS-UAC).
                                Tous les étudiants peuvent faire la demande d'admission (étudiants béninois et
                                international).
                            </p>

                            <p class="mt-4 fs-5">Importer<span style="color: red;">*</span>(CV,
                                lettre de motivation, pièce d'identité, attestion du
                                BAC, preuve de paiement des frais de la demande d'admission) en un seul fichier (Taille
                                maximum<span style="color: red;">*</span> : 5Mo)</p>

                            <p class="mt-4 fs-5">
                                <span style="font-weight: 900;">La FASHS-UAC serait heureux de vous compter parmi ces
                                    futurs étudiants.
                            </p>
                        </div>

                    </div>

                    <div class="col-lg-6">
                        <form action="{{ route('admission.store') }}" method="post" enctype="multipart/form-data"
                            class="">
                            @csrf
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <input type="text" name="nom" value="{{old('nom')}}"
                                        class="form-control @error('nom') is-invalid @enderror" placeholder="Nom"
                                        required>
                                    @error('nom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 ">
                                    <input type="text" value="{{old('prenoms')}}"
                                        class="form-control @error('prenoms') is-invalid @enderror" name="prenoms"
                                        placeholder="Prénoms" required>
                                    @error('prenoms')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <input type="email" value="{{old('email')}}"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        placeholder="example@gmail.com" required>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <input type="text" name="pays_provenance" value="{{old('pays_provenance')}}"
                                        class="form-control @error('pays_provenance') is-invalid @enderror"
                                        placeholder="Pays de provenance" required>
                                    @error('pays_provenance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6 ">
                                    <input type="text"
                                        class="form-control @error('pays_residence') is-invalid @enderror"
                                        name="pays_residence" value="{{old('pays_residence')}}"
                                        placeholder="Pays de résidence" required>
                                    @error('pays_residence')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <input type="text" class="form-control @error('sujet') is-invalid @enderror"
                                        name="sujet" value="{{old('sujet')}}" placeholder="Sujet" required>
                                    @error('sujet')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <input type="file" class="form-control @error('fichier') is-invalid @enderror"
                                        name="fichier" placeholder="Fichier" required>
                                    @error('fichier')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <textarea class="form-control @error('message') is-invalid @enderror" name="message"
                                        rows="6" placeholder="Message">{{old('message')}}</textarea>
                                    @error('message')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn"
                                        style="background-color: #012970; color: white; font-weight:900;">Soumettre</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection