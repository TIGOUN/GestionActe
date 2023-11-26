<section id="contact" class="contact">

    <div class="container" data-aos="fade-up">

        <header class="section-header">
            <h1>Ecrivez-nous ici</h1>
        </header>

        <div class="row gy-4">

            <div class="col-lg-6">

                <div class="row gy-4">
                    <div class="col-md-6">
                        <div class="info-box">
                            <i class="bi bi-geo-alt"></i>
                            <h3>Adresse</h3>
                            <p>A108 Adam Street,<br>New York, NY 535022</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box">
                            <i class="bi bi-telephone"></i>
                            <h3>Nos téléphones</h3>
                            <p>+229 00 00 00 00<br>+229 00 00 00 00</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box">
                            <i class="bi bi-envelope"></i>
                            <h3>Notre adresse electronique</h3>
                            <p>info@example.com<br>contact@example.com</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box">
                            <i class="bi bi-clock"></i>
                            <h3>Heure d'Ouverture</h3>
                            <p>Lundi - Vendredi<br>9:00AM - 18:00AM</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-6">
                <form action="{{ route('contact.store') }}" method="post">
                    @csrf
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <input type="text" name="nom_prenoms" class="form-control" placeholder="Nom et prénoms"
                                required>
                        </div>

                        <div class="col-md-6 ">
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>

                        <div class="col-md-12">
                            <input type="text" class="form-control" name="sujet" placeholder="Sujet" required>
                        </div>

                        <div class="col-md-12">
                            <textarea class="form-control" name="message" rows="6" placeholder="Message"
                                required></textarea>
                        </div>

                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn"
                                style="background-color: #012970; color: white; font-weight:900;">Soumettre</button>
                        </div>
                    </div>
                </form>

            </div>

        </div>

        <iframe width="100%" height="100"
            src="https://maps.google.com/maps?width=100%&height=50%&hl=en&q=6.3702928,2.3912362&ie=UTF8&t=&z=8&iwloc=B&output=embed&disableDefaultUI=true"
            id="IframeMap" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
    </div>

</section>