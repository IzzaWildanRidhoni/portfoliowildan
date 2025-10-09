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
                    <li data-filter=".filter-company">Company</li>
                    <li data-filter=".filter-community">Community</li>
                    <li data-filter=".filter-education">Education</li>
                    <li data-filter=".filter-marketplace">Marketplace</li>
                </ul><!-- End Portfolio Filters -->

                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="300">

                    <!-- PT. Shoenary Javanesia Inc - APPS -->
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-company">
                        <div class="portfolio-card">
                            <div class="portfolio-img">
                                <img src="{{ asset('img/portfolio/portfolio-2.webp') }}" alt="Apps Project"
                                    class="img-fluid">
                                <div class="portfolio-overlay">
                                    <a href="{{ asset('img/portfolio/portfolio-2.webp') }}"
                                        class="glightbox portfolio-lightbox"><i class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" class="portfolio-details-link" title="More Details"><i
                                            class="bi bi-link-45deg"></i></a>
                                </div>
                            </div>
                            <div class="portfolio-info">
                                <h4>APPS</h4>
                                <p>Assets Management, CEISA EXIM, Shipment, Shipping Calculation</p>
                                <div class="portfolio-tags">
                                    <span>Laravel</span><span>CodeIgniter</span><span>API</span><span>SQL</span>
                                    <span>Company: PT. Shoenary Javanesia Inc</span>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- PT. Shoenary Javanesia Inc - ERP -->
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-company">
                        <div class="portfolio-card">
                            <div class="portfolio-img">
                                <img src="{{ asset('img/portfolio/portfolio-3.webp') }}" alt="ERP Project"
                                    class="img-fluid">
                                <div class="portfolio-overlay">
                                    <a href="{{ asset('img/portfolio/portfolio-3.webp') }}"
                                        class="glightbox portfolio-lightbox"><i class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" class="portfolio-details-link" title="More Details"><i
                                            class="bi bi-link-45deg"></i></a>
                                </div>
                            </div>
                            <div class="portfolio-info">
                                <h4>ERP</h4>
                                <p>Sales, Material & Purchase, Production Plan, Internal Control</p>
                                <div class="portfolio-tags">
                                    <span>ERP</span><span>Laravel</span><span>MS SQL</span>
                                    <span>Company: PT. Shoenary Javanesia Inc</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- PT. Shoenary Javanesia Inc - ESS -->
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-company">
                        <div class="portfolio-card">
                            <div class="portfolio-img">
                                <img src="{{ asset('img/portfolio/portfolio-4.webp') }}" alt="ESS Project"
                                    class="img-fluid">
                                <div class="portfolio-overlay">
                                    <a href="{{ asset('img/portfolio/portfolio-4.webp') }}"
                                        class="glightbox portfolio-lightbox"><i class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" class="portfolio-details-link" title="More Details"><i
                                            class="bi bi-link-45deg"></i></a>
                                </div>
                            </div>
                            <div class="portfolio-info">
                                <h4>ESS</h4>
                                <p>Approval Gateway (Service & View)</p>
                                <div class="portfolio-tags">
                                    <span>Web App</span><span>Laravel</span>
                                    <span>Company: PT. Shoenary Javanesia Inc</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- PT. Shoenary Javanesia Inc - IT Inventory -->
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-company">
                        <div class="portfolio-card">
                            <div class="portfolio-img">
                                <img src="{{ asset('img/portfolio/portfolio-5.webp') }}" alt="IT Inventory Project"
                                    class="img-fluid">
                                <div class="portfolio-overlay">
                                    <a href="{{ asset('img/portfolio/portfolio-5.webp') }}"
                                        class="glightbox portfolio-lightbox"><i class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" class="portfolio-details-link" title="More Details"><i
                                            class="bi bi-link-45deg"></i></a>
                                </div>
                            </div>
                            <div class="portfolio-info">
                                <h4>IT Inventory</h4>
                                <p>Laporan Barang, WIP, Scrap/Waste, Mutasi Produksi</p>
                                <div class="portfolio-tags">
                                    <span>Inventory</span><span>Laravel</span><span>SQL</span>
                                    <span>Company: PT. Shoenary Javanesia Inc</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Website Panitia Ramadhan Masjid Syuhada -->
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-community">
                        <div class="portfolio-card">
                            <div class="portfolio-img">
                                <img src="{{ asset('img/portfolio/portfolio-6.webp') }}" alt="Ramadhan Syuhada"
                                    class="img-fluid">
                                <div class="portfolio-overlay">
                                    <a href="{{ asset('img/portfolio/portfolio-6.webp') }}"
                                        class="glightbox portfolio-lightbox"><i class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" class="portfolio-details-link" title="More Details"><i
                                            class="bi bi-link-45deg"></i></a>
                                </div>
                            </div>
                            <div class="portfolio-info">
                                <h4>Website Ramadhan Masjid Syuhada</h4>
                                <p>Blog, Event, Donasi, Kepanitiaan</p>
                                <div class="portfolio-tags">
                                    <span>Laravel</span><span>Filament</span><span>Bootstrap</span>
                                    <span>Community: Masjid Syuhada</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Website CDMS Syuhada -->
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-community">
                        <div class="portfolio-card">
                            <div class="portfolio-img">
                                <img src="{{ asset('img/portfolio/portfolio-7.webp') }}" alt="CDMS Syuhada"
                                    class="img-fluid">
                                <div class="portfolio-overlay">
                                    <a href="{{ asset('img/portfolio/portfolio-7.webp') }}"
                                        class="glightbox portfolio-lightbox"><i class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" class="portfolio-details-link"
                                        title="More Details"><i class="bi bi-link-45deg"></i></a>
                                </div>
                            </div>
                            <div class="portfolio-info">
                                <h4>Website CDMS Syuhada</h4>
                                <p>Blog, Event, Struktur Organisasi, Keuangan, Surat</p>
                                <div class="portfolio-tags">
                                    <span>Laravel</span><span>Bootstrap</span>
                                    <span>Community: Corps Dakwah Masjid Syuhada</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Online Personal Assessment - ECC -->
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-education">
                        <div class="portfolio-card">
                            <div class="portfolio-img">
                                <img src="{{ asset('img/portfolio/portfolio-8.webp') }}" alt="OPA ECC"
                                    class="img-fluid">
                                <div class="portfolio-overlay">
                                    <a href="{{ asset('img/portfolio/portfolio-8.webp') }}"
                                        class="glightbox portfolio-lightbox"><i class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" class="portfolio-details-link"
                                        title="More Details"><i class="bi bi-link-45deg"></i></a>
                                </div>
                            </div>
                            <div class="portfolio-info">
                                <h4>Online Personal Assessment</h4>
                                <p>Career Readiness Test, Personality Mapping</p>
                                <div class="portfolio-tags">
                                    <span>Laravel</span><span>PostgreSQL</span><span>jQuery</span><span>Figma</span>
                                    <span>Education: ECC.co.id</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Catatan Bocah -->
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-education">
                        <div class="portfolio-card">
                            <div class="portfolio-img">
                                <img src="{{ asset('img/portfolio/portfolio-3.webp') }}" alt="Catatan Bocah"
                                    class="img-fluid">
                                <div class="portfolio-overlay">
                                    <a href="{{ asset('img/portfolio/portfolio-3.webp') }}"
                                        class="glightbox portfolio-lightbox"><i class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" class="portfolio-details-link"
                                        title="More Details"><i class="bi bi-link-45deg"></i></a>
                                </div>
                            </div>
                            <div class="portfolio-info">
                                <h4>Catatan Bocah</h4>
                                <p>Manajemen Keuangan & Tugas untuk Anak SD</p>
                                <div class="portfolio-tags">
                                    <span>PHP</span><span>Yii</span><span>MySQL</span><span>Bootstrap</span>
                                    <span>Education: Dicoding Project</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Website Jual Template -->
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-marketplace">
                        <div class="portfolio-card">
                            <div class="portfolio-img">
                                <img src="{{ asset('img/portfolio/portfolio-1.webp') }}" alt="Template Store"
                                    class="img-fluid">
                                <div class="portfolio-overlay">
                                    <a href="{{ asset('img/portfolio/portfolio-1.webp') }}"
                                        class="glightbox portfolio-lightbox"><i class="bi bi-plus"></i></a>
                                    <a href="portfolio-details.html" class="portfolio-details-link"
                                        title="More Details"><i class="bi bi-link-45deg"></i></a>
                                </div>
                            </div>
                            <div class="portfolio-info">
                                <h4>Website Jual Template</h4>
                                <p>Template Marketplace (Vue.js, Tailwind, Pinia)</p>
                                <div class="portfolio-tags">
                                    <span>Vue.js</span><span>TailwindCSS</span><span>Pinia</span><span>Netlify</span>
                                    <span>Marketplace Project</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div><!-- End Portfolio Items Container -->

            </div>

        </div>

    </section><!-- /Portfolio Section -->
@endsection
