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

                        <h1><i class="fa fa-envelope"></i><span>{{ $data['sujet'] }}</span></h1>


                        <p>
                            {{ $data['message'] }}
                        </p>

                        <div class="row">
                            <p class="text-end">
                                {{ $data['nom_prenoms'] }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>