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
        <h2>Résultats Semestrielles</h2>
    </div>
</section>
<!-- End Breadcrumbs -->


















<!-- ======= F.A.Q Section ======= -->
<section id="faq" class="faq">

    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <p>Visualisez vos résultats semestrielle ici</p>
        </header>

        <div class="row">
            <table>
                <thead>
                    <tr>
                        <th style="font-weight: 900; color:black;">Année académique</th>
                        <th style="font-weight: 900; color:black;">Département</th>
                        <th style="font-weight: 900; color:black;">Niveau</th>
                        <th style="font-weight: 900; color:black;">Session</th>
                        <th style="font-weight: 900; color:black;">Fichier</th>
                        <th style="font-weight: 900; color:black;">Crée le</th>
                    </tr>
                </thead>

                <tbody class="mt-3">
                    @foreach($semestrielles as $semestrielle)
                    <tr>
                        <td>{{ $semestrielle->annee_academique }}</td>
                        <td>{{ $semestrielle->departement->nom }}</td>
                        <td>{{ $semestrielle->niveau }}</td>
                        <td>{{ $semestrielle->session }}</td>
                        <td> <a href="{{ asset('storage/' . $semestrielle->fichier) }}" target="_blank"
                                download>Télécharger</a>
                        </td>
                        <td>{{ $semestrielle->created_at->format('d/m/y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>

</section>

@endsection