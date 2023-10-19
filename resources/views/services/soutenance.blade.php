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
        <h2>Programmations des soutenances</h2>
    </div>
</section>
<!-- End Breadcrumbs -->


















<!-- ======= F.A.Q Section ======= -->
<section id="faq" class="faq">

    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <p>Visualisez la programmation des soutenances ici</p>
        </header>

        <div class="row">
            <table>
                <thead>
                    <tr>
                        <th style="font-weight: 900; color:black;">Session</th>
                        <th style="font-weight: 900; color:black;">Date de début</th>
                        <th style="font-weight: 900; color:black;">Date de fin</th>
                        <th style="font-weight: 900; color:black;">Fichier</th>
                        <th style="font-weight: 900; color:black;">Crée le</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($soutenances as $soutenance)
                    <tr>
                        <td>{{ $soutenance->session }}</td>
                        <td>{{ $soutenance->date_debut }}</td>
                        <td>{{ $soutenance->date_fin }}</td>
                        <td> <a href="{{ asset('storage/' . $soutenance->fichier) }}" target="_blank"
                                download>Télécharger</a>
                        </td>
                        <td>{{ $soutenance->created_at->format('d/m/y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>

</section>

@endsection