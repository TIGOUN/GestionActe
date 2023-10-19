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
        <h2>Programmations des évaluations</h2>
    </div>
</section>
<!-- End Breadcrumbs -->



















<section id="faq" class="faq">

    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <p>Visualisez la programmation des évalutions ici</p>
        </header>

        <div class="row">
            <table>
                <thead>
                    <tr>
                        <th style="font-weight: 900; color:black;">Session</th>
                        <th style="font-weight: 900; color:black;">Date de début</th>
                        <th style="font-weight: 900; color:black;">Date de fin</th>
                        <th style="font-weight: 900; color:black;">Niveau</th>
                        <th style="font-weight: 900; color:black;">Fichier</th>
                        <th style="font-weight: 900; color:black;">Crée le</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($evaluations as $evaluation)
                    <tr>
                        <td>{{ $evaluation->session }}</td>
                        <td>{{ $evaluation->date_debut }}</td>
                        <td>{{ $evaluation->date_fin }}</td>
                        <td>{{ $evaluation->classe }}</td>
                        <td> <a href="{{ asset('storage/' . $evaluation->fichier) }}" target="_blank"
                                download>Télécharger</a>
                        </td>
                        <td>{{ $evaluation->created_at->format('d/m/y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>

</section>

@endsection