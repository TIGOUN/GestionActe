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
                    <!-- Error Inner -->
                    <div class="success-inner">
                        <h1><i class="fa fa-envelope"></i><span>Code de votre demande d'acte académique</span></h1>
                        <p>Mr/Mdme {{ $data['nom'] }}&nbsp;{{ $data['prenoms'] }}, votre demande d'acte académique a été
                            enregistrer sous le numéro <u><b>{{ $data['code_demande'] }}.</b></u></p>
                        <p>Suivez votre demande sur notre site avec votre code de demande.</p>

                        <div class="mt-2 mb-2">
                            <p>
                                <i>Au plaisir, de vous revoir !!!</i>
                            </p>
                        </div>
                        <a href="https://fashs-uac.ecolebj.com" class="btn btn-primary btn-lg">Retourner à sur le site
                            de la FASHS-UAC</a>
                    </div>
                    <!--/ End Error Inner -->
                </div>
            </div>
        </div>
    </section>

</body>

</html>