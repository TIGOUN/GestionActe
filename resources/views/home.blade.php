@extends('admin.layouts.master')

@section('content')

<div class="container-fluid">
    <div class="row mb-4">
        <h2 class="text-center">Récaputilatifs des statistiques</h2>
    </div>

    <div class="row">
        <div class="col mx-2 p-4 shadow p-2">
            <h3 class="text-center pt-2">Demandes({{ $all_posts }})</h3>
            <div class="mt-4 d-flex" style="font-size: 18px; justify-content : space-between;">
                <div>Valider <span class="dot dot-lg bg-success"> </span> ({{ $d_v }})</div>
                <div>Rejeter <span class="dot dot-lg bg-danger"> </span> ({{ $d_r }})</div>
                <div>En attente <span class="dot dot-lg bg-info"> </span> ({{ $d_en }})</div>
            </div>
        </div>

        <div class="col mx-2 p-4 shadow p-2" style="background-color: light;">
            <h3 class="text-center pt-2">Admissions({{ $all_admissions }})</h3>
            <div class="mt-4 d-flex" style="font-size: 18px; justify-content : space-between;">
                <div>Valider <span class="dot dot-lg bg-success"> </span> ({{ $a_v }})</div>
                <div>Rejeter <span class="dot dot-lg bg-danger"> </span> ({{ $a_r }})</div>
                <div>En attente <span class="dot dot-lg bg-info"> </span> ({{ $a_en }})</div>
            </div>
        </div>


    </div>

    <div class="row mt-4">
        <div class="col p-4 mx-1 shadow p-2">
            <h3 class="text-center pt-2">Utilisateurs</h3>
            <p class="text-center mt-4" style="font-size: 18px;">
                ({{ $all_users }})
            </p>
        </div>
        <div class="col p-4 mx-1 shadow p-2">
            <h3 class="text-center pt-2">Départements</h3>
            <p class="text-center mt-4" style="font-size: 18px;">
                ({{ $all_departements }})
            </p>
        </div>
        <div class="col p-4 mx-1 shadow p-2">
            <h3 class="text-center pt-2">Actes Académiques</h3>
            <p class="text-center mt-4" style="font-size: 18px;">
                ({{ $all_actes }})
            </p>
        </div>
        <div class="col p-4 mx-1 shadow p-2">
            <h3 class="text-center pt-2">Publier</h3>
            <div class="mt-4 d-flex" style="font-size: 18px; justify-content : space-between;">
                <div>Examens ({{ $all_evaluations }})</div>
                <div>Résultats ({{ $all_resultats }})</div>
            </div>
            <div class="d-flex" style="font-size: 18px; justify-content : space-between;">
                <div>Soutenances ({{ $all_soutenances }})</div>
                <div>Articles ({{ $all_articles }})</div>
            </div>
        </div>
    </div>
</div>













<div class="row mt-5">
    <div class="col-6">
        <canvas id="demandesParMoisChart" width="600" height="400"></canvas>
    </div>
    <div class="col-6">
        <canvas id="demandesParDepartementChart" width="600" height="400"></canvas>
    </div>
</div>


<div class="row mt-5">
    <div class="col-6">
        <canvas id="demandesParAnChart" width="600" height="400"></canvas>
    </div>
    <div class="col-6">
        <canvas id="admissionsParAnChart" width="600" height="400"></canvas>
    </div>
</div>
















<!-- Inclusion du lien CDN pour Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// Récupération des données depuis votre contrôleur Laravel
var demandesParMoisData = @json($demandesParMois);

// Récupération des mois et des nombres de demandes à partir des données JSON
var mois = demandesParMoisData.map(function(item) {
    return item.mois;
});
var nombreDemandes = demandesParMoisData.map(function(item) {
    return item.nombre_demandes;
});

// Obtention de l'élément canvas du graphique
var ctx = document.getElementById('demandesParMoisChart').getContext('2d');

// Création du graphique Chart.js
var chart = new Chart(ctx, {
    type: 'line', // Type de graphique (ligne dans ce cas)
    data: {
        labels: mois, // Mois en tant qu'étiquettes de l'axe des x
        datasets: [{
            label: 'Nombre de demandes par mois',
            data: nombreDemandes, // Données du nombre de demandes
            borderColor: 'rgb(75, 192, 192)', // Couleur de la ligne
            borderWidth: 2, // Largeur de la ligne
            fill: false // Ne pas remplir sous la ligne
        }]
    },
    options: {
        responsive: true, // Rendre le graphique réactif
        maintainAspectRatio: false, // Ne pas conserver le ratio d'aspect
        scales: {
            y: {
                beginAtZero: true // L'axe y commence à zéro
            }
        }
    }
});
</script>





<script>
// Récupération des données depuis votre contrôleur Laravel
var demandesParDepartementData = @json($demandesParDepartement);

// Extraction des noms de département et du nombre de demandes
var departements = demandesParDepartementData.map(function(item) {
    return item.departement;
});
var nombreDemandes = demandesParDepartementData.map(function(item) {
    return item.nombre_demandes;
});

// Obtention de l'élément canvas du graphique
var ctx = document.getElementById('demandesParDepartementChart').getContext('2d');

// Création du graphique Chart.js
var chart = new Chart(ctx, {
    type: 'bar', // Type de graphique (barres dans ce cas)
    data: {
        labels: departements, // Noms des départements en tant qu'étiquettes de l'axe des x
        datasets: [{
            label: 'Nombre de demandes par département',
            data: nombreDemandes, // Données du nombre de demandes
            backgroundColor: 'rgba(75, 192, 192, 0.6)', // Couleur de remplissage des barres
            borderColor: 'rgba(75, 192, 192, 1)', // Couleur de bordure des barres
            borderWidth: 1 // Largeur de la bordure des barres
        }]
    },
    options: {
        responsive: true, // Rendre le graphique réactif
        maintainAspectRatio: false, // Ne pas conserver le ratio d'aspect
        scales: {
            y: {
                beginAtZero: true // L'axe y commence à zéro
            }
        }
    }
});
</script>





<script>
// Récupération des données depuis votre contrôleur Laravel
var demandesParAnData = @json($demandesParAn);

// Extraction des années et du nombre de demandes
var annees = demandesParAnData.map(function(item) {
    return item.annee;
});
var nombreDemandes = demandesParAnData.map(function(item) {
    return item.nombre_demandes;
});

// Obtention de l'élément canvas du graphique
var ctx = document.getElementById('demandesParAnChart').getContext('2d');

// Création du graphique Chart.js
var chart = new Chart(ctx, {
    type: 'doughnut', // Type de graphique (ligne dans ce cas)
    data: {
        labels: annees, // Années en tant qu'étiquettes de l'axe des x
        datasets: [{
            label: 'Nombre de demandes par année',
            data: nombreDemandes, // Données du nombre de demandes
            fill: false, // Ne pas remplir sous la ligne
            borderColor: 'rgba(75, 192, 192, 1)', // Couleur de la ligne
            borderWidth: 2 // Largeur de la ligne
        }]
    },
    options: {
        responsive: true, // Rendre le graphique réactif
        maintainAspectRatio: false, // Ne pas conserver le ratio d'aspect
        scales: {
            y: {
                beginAtZero: true // L'axe y commence à zéro
            }
        }
    }
});
</script>




<script>
// Récupération des données depuis votre contrôleur Laravel
var admissionsParAnData = @json($admissionsParAn);

// Extraction des années et du nombre d'admissions
var annees = admissionsParAnData.map(function(item) {
    return item.annee;
});
var nombreAdmissions = admissionsParAnData.map(function(item) {
    return item.nombre_admissions;
});

// Obtention de l'élément canvas du graphique
var ctx = document.getElementById('admissionsParAnChart').getContext('2d');

// Création du graphique Chart.js
var chart = new Chart(ctx, {
    type: 'polarArea', // Type de graphique (ligne dans ce cas)
    data: {
        labels: annees, // Années en tant qu'étiquettes de l'axe des x
        datasets: [{
            label: 'Nombre d\'admissions par année',
            data: nombreAdmissions, // Données du nombre d'admissions
            fill: false, // Ne pas remplir sous la ligne
            borderColor: 'rgba(75, 192, 192, 1)', // Couleur de la ligne
            borderWidth: 2 // Largeur de la ligne
        }]
    },
    options: {
        responsive: true, // Rendre le graphique réactif
        maintainAspectRatio: false, // Ne pas conserver le ratio d'aspect
        scales: {
            y: {
                beginAtZero: true // L'axe y commence à zéro
            }
        }
    }
});
</script>

@endsection