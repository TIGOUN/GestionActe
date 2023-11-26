@extends('layouts.dashbord')

@section('content')

@include('client.partials.header')

<div class="mt-4">
    &nbsp;
</div>
<div class="mt-4">
    &nbsp;
</div>


<section class="breadcrumbs">
    <div class="container">
        <ol>
            <li><a href="index.html">Acceuil</a></li>
            <li>La vie estudiantine</li>
        </ol>
        <h2>LA VIE ESTUDIANTINE</h2>
    </div>
</section>


<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <!-- .row -->
            <div class="row my-4">
                <div class="col-md-9">
                    <div class="card shadow mb-4">
                        <img src="{{asset('etu/es1.jpg')}}" alt="">
                    </div>
                    <div class="row mt-3 px-4 mt-4 pb-4 pb-3" style="font-size: 20px;">
                        La vie estudiantine au sein de la faculté des sciences humaines et sociales est une expérience
                        immersive qui va au-delà des simples cours académiques. Les étudiants se retrouvent plongés dans
                        un environnement intellectuellement dynamique, où chaque jour offre une opportunité de
                        découverte et de croissance personnelle. Les salles de classe deviennent des forums d'échange
                        d'idées, encourager la réflexion critique sur des sujets sociaux et humains complexes. Les
                        étudiants sont incités à participer à des projets de recherche innovants, collaborant avec des
                        enseignants passionnés et des pairs tout aussi motivés.
                    </div>


                    <div class="card shadow mt-4">
                        <img src="{{asset('etu/estudiantine.jpg')}}" alt="">
                    </div>
                    <div class="row mt-3 px-4 mt-4 pt-4" style="font-size: 20px;">
                        Au-delà de l'aspect académique, la vie estudiantine se teinte d'une richesse culturelle et
                        sociale. Des événements artistiques, des conférences captivantes et des activités communautaires
                        permettent aux étudiants d'explorer des perspectives diverses et de développer leur sensibilité
                        sociale. La faculté devient un véritable laboratoire d'idées où la créativité est encouragée,
                        nourrissant ainsi la formation d'individus bien informés, empathiques et prêts à relever les
                        défis du monde contemporain. La vie estudiantine dans la faculté des sciences humaines et
                        sociales va au-delà de l'apprentissage académique, créant une communauté où la curiosité
                        intellectuelle s'épanouit et où chaque étudiant trouve les ressources nécessaires pour façonner
                        son avenir et contribuer positivement à la société.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection