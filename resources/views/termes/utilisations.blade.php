@extends('layouts.dashbord')

@section('content')

@include('client.partials.header')
<style>
h1,
h2 {
    color: #333;
}

strong {
    font-weight: bold;
}

em {
    font-style: italic;
}
</style>
<div class="mt-4">
    &nbsp;
</div>
<div class="mt-4">
    &nbsp;
</div>

<section class="breadcrumbs">
    <div class="container">
        <ol>
            <li><a href="{{ url('/') }}">Acceuil</a></li>
            <li>Utilisations</li>
        </ol>
        <h2>Utilisations des services</h2>
    </div>
</section>



<div class="container">
    <div class="row mt-4 mb-4 justify-content-center">

        <h1>Conditions d'Utilisation des Services</h1>

        <p><em>Date d'entrée en vigueur : 11 Décembre 2023</em></p>

        <p>
            Bienvenue sur la Plateforme de Demandes d'Actes Académiques. En utilisant nos services, vous acceptez les
            conditions
            énoncées ci-dessous. Veuillez les lire attentivement.
        </p>

        <h2>1. Utilisation du Service :</h2>

        <p>
            <strong>1.1. </strong>Vous acceptez d'utiliser notre service uniquement à des fins légales et conformément
            aux présentes Conditions d'Utilisation.
        </p>

        <p>
            <strong>1.2. </strong>Vous êtes responsable de maintenir la confidentialité de vos informations de compte, y
            compris le mot de passe, et de toute activité qui se produit dans le cadre de votre compte.
        </p>

        <h2>2. Responsabilités de l'Utilisateur :</h2>

        <p>
            <strong>2.1. </strong>Vous comprenez et acceptez que toutes les informations que vous soumettez via la
            plateforme sont exactes, complètes et à jour.
        </p>

        <p>
            <strong>2.2. </strong>Vous ne devez pas accéder illégalement à notre plateforme, interférer avec son
            fonctionnement ou tenter d'accéder à des zones protégées sans autorisation.
        </p>

        <h2>3. Politique de Confidentialité :</h2>

        <p>
            <strong>3.1. </strong>Votre utilisation de nos services est également régie par notre Politique de
            Confidentialité. Veuillez la consulter pour comprendre comment nous collectons, utilisons et protégeons vos
            informations.
        </p>

        <h2>4. Modifications des Conditions d'Utilisation :</h2>

        <p>
            <strong>4.1. </strong>Nous nous réservons le droit de modifier ces Conditions d'Utilisation à tout moment.
            Les modifications entrent en vigueur dès leur publication sur la plateforme. Il est de votre responsabilité
            de consulter régulièrement les Conditions d'Utilisation pour prendre connaissance des éventuelles
            modifications.
        </p>

        <h2>5. Résiliation :</h2>

        <p>
            <strong>5.1. </strong>Nous nous réservons le droit de résilier ou suspendre votre accès à nos services en
            cas de non-respect des présentes Conditions d'Utilisation.
        </p>

        <h2>6. Contact :</h2>

        <p>
            <strong>6.1. </strong>Si vous avez des questions ou des préoccupations concernant ces Conditions
            d'Utilisation, veuillez nous contacter à <a
                href="mailto:contact@votreplateforme.com">contact@votreplateforme.com</a>.
        </p>
    </div>
</div>
@endsection