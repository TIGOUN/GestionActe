<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FASHS-UAC</title>
</head>

<body>

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <section class="mail-seccess section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-12">

                    <div class="success-inner">

                        <h1><i class="fa fa-envelope"></i><span>Informations de Connexion à la Plateforme de la
                                FASHS-UAC</span></h1>

                        <p>
                            Cher/Chère {{ $data['name'] }},
                            <br><br>

                            J'espère que ce message vous trouve bien. Nous sommes ravis de vous accueillir sur notre
                            plateforme de demande des actes académiques. Afin de faciliter votre accès, veuillez trouver
                            ci-dessous
                            vos informations de connexion :
                        </p>

                        <p>
                        <ul>
                            <li>
                                Nom d'utilisateur : {{ $data['email'] }}
                            </li>
                            <li>
                                Mot de passe : {{ $data['password'] }}
                            </li>
                        </ul>
                        </p>


                        <p class="p-4">
                            Nous vous recommandons de vous connecter dès que possible et de modifier votre mot de passe
                            pour
                            des raisons de sécurité. Si vous rencontrez le moindre problème lors de la connexion ou si
                            vous
                            avez des questions, n'hésitez pas à nous contacter à fashs.uac@uac.bj ou au
                            +229 67 65 65 90.
                        </p>


                        <p class="mt-4">
                            Nous sommes impatients de vous voir profiter pleinement de notre plateforme.
                        </p>

                        <p class="text-end">
                            Cordialement,
                        </p>



                        <div class="mt-4 mb-2">
                            <p class="text-end">
                                <i>Facultés des Sciences Humaines et Sociales d'Université d'Abomey-Calavi
                                </i>
                            </p>
                        </div>
                        <a href="https://fashs-uac.ecolebj.com" class="btn btn-primary btn-lg">Retourner à sur le site
                            de la FASHS-UAC</a>


                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>