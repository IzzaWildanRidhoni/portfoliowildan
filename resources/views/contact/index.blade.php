@extends('layouts.app')

@section('content')
    <!-- Contact Section -->
    <section id="contact" class="contact section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Contact</h2>
            <p>Feel free to reach out via WhatsApp, email, or social media. I'm open to discussions, collaborations, and new
                opportunities.</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row g-4 g-lg-5">
                <div class="col-lg-5">
                    <div class="info-box" data-aos="fade-up" data-aos-delay="200">
                        <h3>Contact Info</h3>
                        <p>Silakan hubungi saya melalui kontak berikut:</p>

                        @php
                            $socialMedia = \App\Models\SocialMedia::active()->get();
                        @endphp

                        @forelse($socialMedia as $index => $social)
                            <div class="info-item" data-aos="fade-up" data-aos-delay="{{ 300 + $index * 100 }}">
                                <div class="icon-box">
                                    <i class="{{ $social->icon }}"></i>
                                </div>
                                <div class="content">
                                    <h4>{{ $social->label ?? $social->platform }}</h4>
                                    <p><a href="{{ $social->full_url }}" target="_blank">{{ $social->value }}</a></p>
                                </div>
                            </div>
                        @empty
                            <!-- Fallback jika tidak ada data di database -->
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
                        @endforelse
                    </div>

                </div>

                <div class="col-lg-7">
                    <div class="contact-form" data-aos="fade-up" data-aos-delay="300">
                        <h3>Get In Touch</h3>
                        <p>Have a question, project idea, or collaboration in mind? Feel free to send me a message and I'll
                            get back to you as soon as possible.</p>

                        <form action="{{ route('contact.store') }}" method="POST" id="contactForm" data-aos="fade-up"
                            data-aos-delay="200">
                            @csrf
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror" placeholder="Your Name"
                                        value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" placeholder="Your Email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <input type="text" class="form-control @error('subject') is-invalid @enderror"
                                        name="subject" placeholder="Subject" value="{{ old('subject') }}" required>
                                    @error('subject')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <textarea class="form-control @error('message') is-invalid @enderror" name="message" rows="6"
                                        placeholder="Message" required>{{ old('message') }}</textarea>
                                    @error('message')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-primary" id="submitBtn">
                                        <span class="btn-text">Send Message</span>
                                        <span class="btn-loading d-none">
                                            <span class="spinner-border spinner-border-sm me-2" role="status"
                                                aria-hidden="true"></span>
                                            Sending...
                                        </span>
                                    </button>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>

            </div>

        </div>

    </section><!-- /Contact Section -->
@endsection

@push('styles')
    <style>
        .is-invalid {
            border-color: #dc3545 !important;
        }

        .invalid-feedback {
            display: block;
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        .btn-loading {
            display: inline-flex;
            align-items: center;
        }
    </style>
@endpush

@push('scripts')
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('contactForm');
            const submitBtn = document.getElementById('submitBtn');
            const btnText = submitBtn.querySelector('.btn-text');
            const btnLoading = submitBtn.querySelector('.btn-loading');

            form.addEventListener('submit', function(e) {
                e.preventDefault();

                // Disable button dan show loading
                submitBtn.disabled = true;
                btnText.classList.add('d-none');
                btnLoading.classList.remove('d-none');

                // Kirim form via fetch
                fetch(form.action, {
                        method: 'POST',
                        body: new FormData(form),
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Reset button
                        submitBtn.disabled = false;
                        btnText.classList.remove('d-none');
                        btnLoading.classList.add('d-none');

                        if (data.success) {
                            // Success alert
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: data.message,
                                confirmButtonText: 'OK',
                                confirmButtonColor: '#0d6efd'
                            });

                            // Reset form
                            form.reset();
                        } else {
                            // Error alert
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: data.message || 'Something went wrong!',
                                confirmButtonText: 'OK',
                                confirmButtonColor: '#dc3545'
                            });
                        }
                    })
                    .catch(error => {
                        // Reset button
                        submitBtn.disabled = false;
                        btnText.classList.remove('d-none');
                        btnLoading.classList.add('d-none');

                        // Error alert
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Failed to send message. Please try again.',
                            confirmButtonText: 'OK',
                            confirmButtonColor: '#dc3545'
                        });

                        console.error('Error:', error);
                    });
            });
        });

        // Show validation errors with SweetAlert
        @if ($errors->any())
            Swal.fire({
                icon: 'error',
                title: 'Validation Error',
                html: '<ul style="text-align: left;">' +
                    @foreach ($errors->all() as $error)
                        '<li>{{ $error }}</li>' +
                    @endforeach
                '</ul>',
                confirmButtonText: 'OK',
                confirmButtonColor: '#dc3545'
            });
        @endif

        // Show success message
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK',
                confirmButtonColor: '#0d6efd',
                timer: 3000,
                timerProgressBar: true
            });
        @endif

        // Show error message
        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '{{ session('error') }}',
                confirmButtonText: 'OK',
                confirmButtonColor: '#dc3545'
            });
        @endif
    </script>
@endpush
