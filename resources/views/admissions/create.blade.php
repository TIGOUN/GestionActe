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
                    <h1>Demande d'admission à FASHS-UAC</h1>
                </header>

                <div class="row gy-4">

                    <div class="col-lg-6">

                        <div class="row info-box">

                            <h5>Noté bien : </h5>
                            <p class="mt-4 mb-2">
                                Vous devez remplir tous ces champs afin que votre demande d'admission soit prise en
                                compte.
                            </p>
                            <p class="mt-2">
                                Toute les demandes d'admission en dehors du mois d'Aout jusqu'au Octobre ne seront pas
                                prise en compte pas notre administration (FASHS-UAC).
                                Tous les étudiants peuvent faire la demande d'admission (étudian béninois et
                                international).
                            </p>

                            <p class="mt-4">
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
                                    <input type="text" name="nom" class="form-control" placeholder="Nom" required>
                                </div>

                                <div class="col-md-6 ">
                                    <input type="text" class="form-control" name="prenoms" placeholder="Vos prénoms"
                                        required>
                                </div>

                                <div class="col-md-12">
                                    <input type="email" class="form-control" name="email"
                                        placeholder="example@gmail.com" required>
                                </div>

                                <div class="col-md-6">
                                    <input type="text" name="pays_provenance" class="form-control"
                                        placeholder="Pays de provenance" required>
                                </div>

                                <div class="col-md-6 ">
                                    <input type="text" class="form-control" name="pays_residence"
                                        placeholder="Pays de résidence" required>
                                </div>

                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="sujet" placeholder="Sujet" required>
                                </div>

                                <div class="col-md-12">
                                    <p>Importer<span style="color: red;">*</span>(CV,
                                        lettre de motivation, pièce d'identité, attestion du
                                        BAC) en un seul fichier</p>
                                    <input type="file" class="form-control" name="fichier" placeholder="Fichier"
                                        required>
                                </div>

                                <div class="col-md-12">
                                    <textarea class="form-control" name="message" rows="6" placeholder="Message"
                                        required></textarea>
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