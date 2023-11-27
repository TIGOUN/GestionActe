<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     $posts = Post::latest()->limit(3)->get();
//     dd($posts);
//     return view('welcome',compact('posts'));
// });

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'welcome'])->name('welcome.index');

Route::get('/la-vie-estudiane', [App\Http\Controllers\EstudineController::class, 'show'])->name('estudiantine.show');


Auth::routes();


Route::middleware(['auth'])->group(function () {

    // User
Route::get('/users/index', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
Route::get('/user/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
Route::post('/user/store', [App\Http\Controllers\UserController::class, 'store'])->name('user.store');
Route::get('/user/edit/{user}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::get('/user/show/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('user.show');
Route::put('/user/update/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
Route::get('/user/delete/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.delete');


    // Role
Route::get('/roles/index', [App\Http\Controllers\RoleController::class, 'index'])->name('role.index');
Route::get('/role/create', [App\Http\Controllers\RoleController::class, 'create'])->name('role.create');
Route::post('/role/store', [App\Http\Controllers\RoleController::class, 'store'])->name('role.store');
Route::get('/role/show/{role}', [App\Http\Controllers\RoleController::class, 'show'])->name('role.show');
Route::get('/role/edit/{role}', [App\Http\Controllers\RoleController::class, 'edit'])->name('role.edit');
Route::put('/role/update/{role}', [App\Http\Controllers\RoleController::class, 'update'])->name('role.update');
Route::get('/role/delete/{role}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('role.delete');


    // Département
Route::get('/admin/departements/tous-les-départements', [App\Http\Controllers\DepartementController::class, 'index'])->name('departement.index');
Route::post('/admin/departements/store', [App\Http\Controllers\DepartementController::class, 'store'])->name('departement.store');
Route::put('/admin/departements/update/{departement}', [App\Http\Controllers\DepartementController::class, 'update'])->name('departement.update');
Route::get('/admin/departements/delete/{departement}', [App\Http\Controllers\DepartementController::class, 'destroy'])->name('departement.delete');


    // Actes
Route::get('/admin/actes/tous-les-actes', [App\Http\Controllers\ActeController::class, 'index'])->name('acte.index');
Route::post('/admin/actes/store', [App\Http\Controllers\ActeController::class, 'store'])->name('acte.store');
Route::put('/admin/actes/update/{acte}', [App\Http\Controllers\ActeController::class, 'update'])->name('acte.update');
Route::get('/admin/actes/delete/{acte}', [App\Http\Controllers\ActeController::class, 'destroy'])->name('acte.delete');


    // Demandes
Route::get('/admin/demandes/tous-les-demandes', [App\Http\Controllers\DemandeController::class, 'index'])->name('demande.index');
Route::put('/admin/demandes/update/{demande}', [App\Http\Controllers\DemandeController::class, 'update'])->name('demande.update');
Route::get('/admin/demandes/delete/{demande}', [App\Http\Controllers\DemandeController::class, 'destroy'])->name('demande.delete');
Route::put('/admin/demandes/reponse/demande/{reponse}', [App\Http\Controllers\DemandeController::class, 'reponse_demande'])->name('demande.reponse');
Route::get('/admin/demandes/en-attente', [App\Http\Controllers\DemandeController::class, 'enattente'])->name('demande.enattente');
Route::get('/admin/demandes/valider', [App\Http\Controllers\DemandeController::class, 'valider'])->name('demande.valider');
Route::get('/admin/demandes/rejeter', [App\Http\Controllers\DemandeController::class, 'rejeter'])->name('demande.rejeter');
Route::get('/admin/demandes/rapport/{demande}', [App\Http\Controllers\DemandeController::class, 'rapport'])->name('demande.rapport');

    
    // Posts
Route::get('/admin/posts', [App\Http\Controllers\PostController::class, 'index_admin'])->name('admin.blog.index');
Route::get('/admin/posts/{post}', [App\Http\Controllers\PostController::class, 'show_admin'])->name('admin.blog.show');
Route::post('/admin/posts/store', [App\Http\Controllers\PostController::class, 'store'])->name('admin.blog.store');
Route::put('/admin/posts/{post}', [App\Http\Controllers\PostController::class, 'update'])->name('admin.blog.update');
Route::get('/admin/posts/delete/{post}', [App\Http\Controllers\PostController::class, 'destroy'])->name('admin.blog.delete');


    // Evaluations
Route::get('/admin/evaluations', [App\Http\Controllers\ProgrammationEvaluationController::class, 'index'])->name('evaluation.index');
Route::get('/admin/evaluations/{evaluation}', [App\Http\Controllers\ProgrammationEvaluationController::class, 'show'])->name('evaluation.show');
Route::post('/admin/evaluations/store', [App\Http\Controllers\ProgrammationEvaluationController::class, 'store'])->name('evaluation.store');
Route::put('/admin/evaluations/{evaluation}', [App\Http\Controllers\ProgrammationEvaluationController::class, 'update'])->name('evaluation.update');
Route::get('/admin/evaluations/delete/{evaluation}', [App\Http\Controllers\ProgrammationEvaluationController::class, 'destroy'])->name('evaluation.delete');


    // soutenances
Route::get('/admin/soutenance', [App\Http\Controllers\ProgrammationSoutenanceController::class, 'index'])->name('soutenance.index');
Route::get('/admin/soutenance/{soutenance}', [App\Http\Controllers\ProgrammationSoutenanceController::class, 'show'])->name('soutenance.show');
Route::post('/admin/soutenance/store', [App\Http\Controllers\ProgrammationSoutenanceController::class, 'store'])->name('soutenance.store');
Route::put('/admin/soutenance/{soutenance}', [App\Http\Controllers\ProgrammationSoutenanceController::class, 'update'])->name('soutenance.update');
Route::get('/admin/soutenance/delete/{soutenance}', [App\Http\Controllers\ProgrammationSoutenanceController::class, 'destroy'])->name('soutenance.delete');


    // Resultat
Route::get('/admin/resulats-semestrielle', [App\Http\Controllers\ResultatSemestrielleController::class, 'index'])->name('resultat.index');
Route::get('/admin/resulats-semestrielle/{resultat}', [App\Http\Controllers\ResultatSemestrielleController::class, 'show'])->name('resultat.show');
Route::post('/admin/resulats-semestrielle/store', [App\Http\Controllers\ResultatSemestrielleController::class, 'store'])->name('resultat.store');
Route::put('/admin/resulats-semestrielle/{resultat}', [App\Http\Controllers\ResultatSemestrielleController::class, 'update'])->name('resultat.update');
Route::get('/admin/resulats-semestrielle/delete/{resultat}', [App\Http\Controllers\ResultatSemestrielleController::class, 'destroy'])->name('resultat.delete');

    // Suppression
Route::get('/programmations-des-evaluations/suppression/{evaluation}', [App\Http\Controllers\ProgrammationEvaluationController::class, 'destroy'])->name('eval.destroy');
Route::get('/programmations-des-soutenances/{soutenance}', [App\Http\Controllers\ProgrammationSoutenanceController::class, 'destroy'])->name('sout.destroy');

    // Admission
Route::get('/admission/toute-les-admissions', [App\Http\Controllers\AdmissionController::class, 'index'])->name('admission.index');
Route::get('/admission/delete', [App\Http\Controllers\AdmissionController::class, 'destroy'])->name('admission.destroy');
Route::put('/admission/update/{admission}', [App\Http\Controllers\AdmissionController::class, 'update'])->name('admission.update');
});

// Posts user
Route::get('/posts', [App\Http\Controllers\PostUserController::class, 'index'])->name('blog.index');
Route::get('/post/{post}', [App\Http\Controllers\PostUserController::class, 'show'])->name('blog.show');

// Search
Route::post('/demande/rechercher', [App\Http\Controllers\DemandeController::class, 'search'])->name('search.demande');
Route::put('/demande/signer/{demande}', [App\Http\Controllers\DemandeController::class, 'signer'])->name('signer.demande');
Route::get('/demande/formulaire/rechercher', [App\Http\Controllers\DemandeController::class, 'form'])->name('form.search');


// Admissions
Route::post('/admission', [App\Http\Controllers\AdmissionUserController::class, 'store'])->name('admission.store');
Route::get('/admission/formulaire/admission', [App\Http\Controllers\AdmissionUserController::class, 'create'])->name('admission.create');
// Route::get('/admissions', [App\Http\Controllers\AdmissionUserController::class, 'index'])->name('user.admission.index');


// Résultats semestrielle
Route::get('/resultat-semestrielle', [App\Http\Controllers\ServiceController::class, 'index_progResul'])->name('semestriel.index');
Route::get('/résultat-semestrielle/suppression{semestrielle}', [App\Http\Controllers\ResultatSemestrielleController::class, 'destroy'])->name('semestriel.destroy');


// Programmations des soutenances
Route::get('/programmations-des-evaluations', [App\Http\Controllers\ServiceController::class, 'index_progEva'])->name('eval.index');

// Programmations des résultats semestrielles
Route::get('/programmations-des-soutenances', [App\Http\Controllers\ServiceController::class, 'index_progSout'])->name('sout.index');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// contactez-nous  #012970
Route::get('/qui-sommes-nous', [App\Http\Controllers\ContactController::class, 'somme'])->name('qui.somme');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'contact'])->name('contact');
Route::post('/contacts', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');


// Afficher tous les services
Route::get('/tous-les-services', [App\Http\Controllers\ServiceController::class, 'index'])->name('service.index');

// Relevés de notes 
Route::get('/services/releves-de-notes/premiere-annee', [App\Http\Controllers\ReleverController::class, 'premiere'])->name('relever.premiere');
Route::get('/services/releves-de-notes/deuxieme-annee', [App\Http\Controllers\ReleverController::class, 'deuxieme'])->name('relever.deuxieme');
Route::get('/services/releves-de-notes/troisieme-annee', [App\Http\Controllers\ReleverController::class, 'troisieme'])->name('relever.troisieme');
Route::get('/services/releves-de-notes/quatrieme-annee', [App\Http\Controllers\ReleverController::class, 'quatrieme'])->name('relever.quatrieme');
Route::get('/services/releves-de-notes/cinquieme-annee', [App\Http\Controllers\ReleverController::class, 'cinquieme'])->name('relever.cinquieme');
Route::get('/services/releves-de-notes/doctorat', [App\Http\Controllers\ReleverController::class, 'doctorat'])->name('relever.doctorat');

// Demandes sauvegarder
Route::post('/demandes/store', [App\Http\Controllers\DemandeUserController::class, 'store'])->name('demande.store');