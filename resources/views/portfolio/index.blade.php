@extends('layouts.app')

@section('content')
    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Portfolio</h2>
            <p>Here are some of my highlighted projects, ranging from enterprise applications to community websites and
                educational platforms.</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                <!-- Portfolio Filters -->
                <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="200">
                    <li data-filter="*" class="filter-active">All</li>
                    @foreach ($category as $item)
                        <li data-filter=".filter-{{ strtolower(str_replace(' ', '-', $item->category)) }}">
                            {{ $item->category }}</li>
                    @endforeach
                </ul><!-- End Portfolio Filters -->

                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="300">

                    @foreach ($portfolio as $item)
                        <!-- PT. Shoenary Javanesia Inc - APPS -->
                        <div
                            class="col-lg-4 col-md-6 portfolio-item isotope-item filter-{{ strtolower(str_replace(' ', '-', $item->category)) }}">
                            <div class="portfolio-card">
                                <div class="portfolio-img">
                                    <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('img/portfolio/portfolio-2.webp') }}"
                                        alt="Apps Project" class="img-fluid">
                                    <div class="portfolio-overlay">
                                        <a href="{{ $item->image ? asset('storage/' . $item->image) : asset('img/portfolio/portfolio-2.webp') }}"
                                            class="glightbox portfolio-lightbox"><i class="bi bi-plus"></i></a>
                                        <a href="{{ route('portfolio.show', $item->slug) }}" class="portfolio-details-link"
                                            title="More Details"><i class="bi bi-link-45deg"></i></a>
                                    </div>
                                </div>
                                <div class="portfolio-info">
                                    <h4>{{ $item->title }}</h4>
                                    <p>{{ $item->project_overview }}</p>
                                    <div class="portfolio-tags">
                                        @php
                                            $technologies = json_decode($item->technologies);
                                        @endphp
                                        @foreach ($technologies as $technology)
                                            <span>{{ $technology }}</span>
                                        @endforeach
                                        <span>Client: {{ $item->client }}</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div><!-- End Portfolio Items Container -->

            </div>

        </div>

    </section><!-- /Portfolio Section -->
@endsection
