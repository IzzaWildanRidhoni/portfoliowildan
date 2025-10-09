@extends('layouts.app')

@section('content')
    <!-- Contact Section -->
    <section id="contact" class="contact section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Contact</h2>
            <p>Feel free to reach out via WhatsApp, email, or social media. I’m open to discussions, collaborations, and new
                opportunities.</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row g-4 g-lg-5">
                <div class="col-lg-5">
                    <div class="info-box" data-aos="fade-up" data-aos-delay="200">
                        <h3>Contact Info</h3>
                        <p>Silakan hubungi saya melalui kontak berikut:</p>

                        <div class="info-item" data-aos="fade-up" data-aos-delay="300">
                            <div class="icon-box">
                                <i class="bi bi-whatsapp"></i>
                            </div>
                            <div class="content">
                                <h4>WhatsApp</h4>
                                <p><a href="https://wa.me/6285643301453" target="_blank">+62 856 4330 1453</a></p>
                            </div>
                        </div>

                        <div class="info-item" data-aos="fade-up" data-aos-delay="400">
                            <div class="icon-box">
                                <i class="bi bi-linkedin"></i>
                            </div>
                            <div class="content">
                                <h4>LinkedIn</h4>
                                <p><a href="https://www.linkedin.com/in/izzawildan/"
                                        target="_blank">linkedin.com/in/izzawildan</a></p>
                            </div>
                        </div>

                        <div class="info-item" data-aos="fade-up" data-aos-delay="500">
                            <div class="icon-box">
                                <i class="bi bi-globe"></i>
                            </div>
                            <div class="content">
                                <h4>Website</h4>
                                <p><a href="https://izzawildan.my.id" target="_blank">izzawildan.my.id</a></p>
                            </div>
                        </div>

                        <div class="info-item" data-aos="fade-up" data-aos-delay="600">
                            <div class="icon-box">
                                <i class="bi bi-envelope"></i>
                            </div>
                            <div class="content">
                                <h4>Email</h4>
                                <p><a href="mailto:me@izzawildan.my.id">me@izzawildan.my.id</a></p>
                            </div>
                        </div>

                        <div class="info-item" data-aos="fade-up" data-aos-delay="700">
                            <div class="icon-box">
                                <i class="bi bi-instagram"></i>
                            </div>
                            <div class="content">
                                <h4>Instagram</h4>
                                <p><a href="https://instagram.com/izza.wildan" target="_blank">@izza.wildan</a></p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-7">
                    <div class="contact-form" data-aos="fade-up" data-aos-delay="300">
                        <h3>Get In Touch</h3>
                        <p>Have a question, project idea, or collaboration in mind? Feel free to send me a message and I’ll
                            get back to you as soon as possible.</p>


                        <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                            data-aos-delay="200">
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name"
                                        required="">
                                </div>

                                <div class="col-md-6 ">
                                    <input type="email" class="form-control" name="email" placeholder="Your Email"
                                        required="">
                                </div>

                                <div class="col-12">
                                    <input type="text" class="form-control" name="subject" placeholder="Subject"
                                        required="">
                                </div>

                                <div class="col-12">
                                    <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                                </div>

                                <div class="col-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>

                                    <button type="submit" class="btn">Send Message</button>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>

            </div>

        </div>

    </section><!-- /Contact Section -->
@endsection
