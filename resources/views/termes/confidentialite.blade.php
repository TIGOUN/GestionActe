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
            <li>Confidentialités</li>
        </ol>
        <h2>Termes de
            confidentialités</h2>
    </div>
</section>



<div class="container">
    <div class="row mt-4 mb-4 justify-content-center">

        <h1>Politique de Confidentialité pour la Plateforme de Demandes d'Actes Académiques</h1>

        <p><em>Date d'entrée en vigueur : 11 Décembre 2023</em></p>

        <h2>1. Informations Collectées :</h2>

        <p>
            <strong>1.1. Informations Personnelles :</strong> Nous collectons des informations essentielles pour le
            traitement des
            demandes d'actes académiques. Cela peut inclure le nom complet, l'adresse électronique, l'adresse postale,
            le numéro de téléphone, la date de naissance, et d'autres détails nécessaires à l'identification des
            utilisateurs.
        </p>

        <p>
            <strong>1.2. Informations d'Identification :</strong> Pour satisfaire aux exigences des institutions
            académiques, nous pouvons collecter des données d'identification telles que les numéros d'identification
            nationaux, les matricules étudiants, et d'autres informations similaires.
        </p>

        <p>
            <strong>1.3. Données de Connexion :</strong> Nous enregistrons des informations relatives à l'accès à la
            plateforme, y compris les adresses IP, les types de navigateurs utilisés, les horaires d'accès, et les pages
            consultées. Ces données sont utilisées à des fins d'analyse statistique, d'amélioration de la plateforme, et
            de détection d'activités suspectes.
        </p>

        <h2>2. Utilisation des Informations :</h2>

        <p>
            <strong>2.1. </strong>Nous utilisons les informations collectées pour traiter efficacement les demandes
            d'actes académiques. Cela comprend la vérification de l'identité de l'utilisateur, la communication
            concernant le statut des demandes, et la fourniture de services personnalisés.
        </p>

        <p>
            <strong>2.2. </strong>Les données d'identification sont strictement utilisées aux fins de vérification et de
            conformité avec les politiques des institutions académiques partenaires. Elles ne seront en aucun cas
            utilisées à d'autres fins que celles expressément spécifiées.
        </p>

        <p>
            <strong>2.3. </strong>Les données de connexion sont exploitées de manière agrégée pour des analyses
            statistiques visant à améliorer l'expérience utilisateur, à optimiser les performances de la plateforme, et
            à renforcer la sécurité.
        </p>

        <h2>3. Stockage et Sécurité :</h2>

        <p>
            <strong>3.1. </strong>Les informations personnelles sont stockées de manière sécurisée sur nos serveurs.
            L'accès à ces informations est strictement limité aux employés autorisés nécessitant ces données pour
            effectuer leurs fonctions.
        </p>

        <p>
            <strong>3.2. </strong>Nous avons mis en place des mesures de sécurité techniques et organisationnelles,
            telles que le cryptage des données, les pare-feu, et les protocoles de sécurité standard de l'industrie,
            pour protéger les informations contre tout accès non autorisé, divulgation, altération, et destruction.
        </p>

        <h2>4. Partage d'Informations :</h2>

        <p>
            <strong>4.1. </strong>Les informations personnelles des utilisateurs ne seront pas partagées avec des tiers
            sans leur consentement explicite, sauf si cela est requis par la loi.
        </p>

        <p>
            <strong>4.2. </strong>Les informations peuvent être partagées avec des partenaires de confiance, tels que
            les institutions académiques, uniquement dans le cadre du processus de traitement des demandes d'actes
            académiques.
        </p>

        <h2>5. Droits des Utilisateurs :</h2>

        <p>
            <strong>5.1. </strong>Les utilisateurs ont le droit d'accéder à leurs informations personnelles, de les
            corriger et de les supprimer. Ils peuvent exercer ces droits en nous contactant via les coordonnées fournies
            dans la section 6.
        </p>

        <p>
            <strong>5.2. </strong>Les utilisateurs ont également le droit de retirer leur consentement au traitement de
            leurs données à tout moment, sans que cela n'affecte la légalité du traitement basé sur le consentement
            avant le retrait.
        </p>

        <h2>6. Modifications de la Politique :</h2>

        <p>
            <strong>6.1. </strong>Cette politique de confidentialité peut être mise à jour périodiquement pour refléter
            les changements dans nos pratiques de collecte et de protection des informations. Les utilisateurs seront
            informés de tout changement substantiel par le biais de notifications sur la plateforme ou par d'autres
            moyens appropriés.
        </p>

        <p>
            En utilisant notre plateforme, les utilisateurs reconnaissent et acceptent les termes de cette politique de
            confidentialité. Pour toute question ou préoccupation concernant cette politique, veuillez nous contacter à
            <a href="mailto:fashs.uac@uac.bj">fashs.uac@uac.bj</a>.
        </p>

    </div>
</div>
@endsection