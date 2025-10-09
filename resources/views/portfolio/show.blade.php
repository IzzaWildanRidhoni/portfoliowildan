@extends('layouts.app')

@section('content')
    <!-- Portfolio Details Section -->
    <section id="portfolio-details" class="portfolio-details section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Portfolio Details</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit. Sed ut perspiciatis unde
                omnis iste natus error sit voluptatem accusantium doloremque laudantium totam rem aperiam</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="portfolio-details-media">
                        <div class="main-image">
                            <div class="portfolio-details-slider swiper init-swiper" data-aos="zoom-in">
                                <script type="application/json" class="swiper-config">
                                    {
                                    "loop": true,
                                    "speed": 1000,
                                    "autoplay": {
                                        "delay": 6000
                                    },
                                    "effect": "creative",
                                    "creativeEffect": {
                                        "prev": {
                                        "shadow": true,
                                        "translate": [0, 0, -400]
                                        },
                                        "next": {
                                        "translate": ["100%", 0, 0]
                                        }
                                    },
                                    "slidesPerView": 1,
                                    "navigation": {
                                        "nextEl": ".swiper-button-next",
                                        "prevEl": ".swiper-button-prev"
                                    }
                                    }
                                </script>
                                @php
                                    $gallery = json_decode($portfolio->gallery);
                                @endphp
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <img src="{{ asset('storage/' . $portfolio->image) }}" alt="Portfolio Image"
                                            class="img-fluid">
                                    </div>
                                    @foreach ($gallery as $image)
                                        <div class="swiper-slide">
                                            <img src="{{ asset('storage/' . $image) }}" alt="Portfolio Image"
                                                class="img-fluid">
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-button-next"></div>
                            </div>
                        </div>

                        <div class="thumbnail-grid" data-aos="fade-up" data-aos-delay="200">

                            <div class="row g-2 mt-3">
                                <div class="col-3">
                                    <img src="{{ asset('storage/' . $portfolio->image) }}" alt="Portfolio Image"
                                        class="img-fluid glightbox">
                                </div>
                                @foreach ($gallery as $image)
                                    <div class="col-3">
                                        <img src="{{ asset('storage/' . $image) }}" alt="Gallery Image"
                                            class="img-fluid glightbox">
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        @php
                            $technologies = json_decode($portfolio->technologies);

                        @endphp
                        <div class="tech-stack-badges" data-aos="fade-up" data-aos-delay="300">
                            @foreach ($technologies as $technology)
                                <span>{{ $technology }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-lg-6" data-aos="fade-left">
                    <div class="portfolio-details-content">
                        <div class="project-meta">
                            <div class="badge-wrapper">
                                <span class="project-badge">{{ $portfolio->category }}</span>
                            </div>
                            <div class="date-client">
                                <div class="meta-item">
                                    <i class="bi bi-calendar-check"></i>
                                    <span>{{ $portfolio->project_date ? $portfolio->project_date : 'N/A' }}</span>
                                </div>
                                <div class="meta-item">
                                    <i class="bi bi-buildings"></i>
                                    <span>{{ $portfolio->client }}</span>
                                </div>
                            </div>
                        </div>

                        <h2 class="project-title">{{ $portfolio->title }}</h2>

                        @if ($portfolio->project_url)
                            <div class="project-website">
                                <i class="bi bi-link-45deg"></i>
                                <a href="{{ $portfolio->project_url }}" target="_blank">{{ $portfolio->project_url }}</a>
                            </div>
                        @endif

                        <div class="project-overview">
                            <p class="lead">
                                {!! $portfolio->description !!}
                            </p>

                            <div class="accordion project-accordion" id="portfolio-details-projectAccordion">
                                <div class="accordion-item" data-aos="fade-up">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#portfolio-details-collapse-1" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            <i class="bi bi-clipboard-data me-2"></i> Project Overview
                                        </button>
                                    </h2>
                                    <div id="portfolio-details-collapse-1" class="accordion-collapse collapse show"
                                        data-bs-parent="#portfolio-details-projectAccordion">
                                        <div class="accordion-body">
                                            {!! $portfolio->description !!}
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="project-features" data-aos="fade-up" data-aos-delay="300">
                            <h3><i class="bi bi-stars"></i> Key Features</h3>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <ul class="feature-list">
                                        <li><i class="bi bi-check2-circle"></i> Real-time Data Visualization</li>
                                        <li><i class="bi bi-check2-circle"></i> User Role Management</li>
                                        <li><i class="bi bi-check2-circle"></i> Secure Authentication</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="feature-list">
                                        <li><i class="bi bi-check2-circle"></i> Customizable Dashboards</li>
                                        <li><i class="bi bi-check2-circle"></i> Data Export Options</li>
                                        <li><i class="bi bi-check2-circle"></i> Multi-device Support</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="cta-buttons" data-aos="fade-up" data-aos-delay="400">
                            @if ($portfolio->project_url)
                                <a href="{{ $portfolio->project_url }}" class="btn-view-project" target="_blank">View
                                    Live Project</a>
                            @endif
                            @if ($nextproject)
                                <a href="{{ route('portfolio.show', $nextproject->slug) }}" class="btn-next-project">Next
                                    Project <i class="bi bi-arrow-right"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section><!-- /Portfolio Details Section -->
@endsection
