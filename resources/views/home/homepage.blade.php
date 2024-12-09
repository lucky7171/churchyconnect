<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grace Community Church</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('frontend/styles.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Grace Community</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#events">Events</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    @auth
                    <li class="nav-item dropdown pe-3">
                        <a class="nav-link nav-profile d-flex align-items-center pe-0" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                            <span class="d-block dropdown-toggle ps-2" style="color: blue;">Account</span>
                        </a>
                        <!-- Profile Dropdown -->
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                            <li class="dropdown-header">
                                <h6 style="color: rgb(0, 0, 255);">{{ Auth::user()->name }}</h6>
                                <span>Church Member</span>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <x-dropdown-link :href="route('profile.edit')">
                                        <i class="bi bi-person"></i>
                                        <span style="color: rgb(18, 18, 19);"> {{ __('My Profile') }}</span>
                                    </x-dropdown-link>
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <i class="bi bi-box-arrow-right"></i>
                                        <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                                      this.closest('form').submit();">
                                            <span style="color: rgb(18, 18, 19);">
                                                {{ __('Log Out') }}
                                            </span>
                                        </x-dropdown-link>
                                    </form>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-primary text-black ms-2" href="{{ route('register') }}">Register</a></li>
                    @endauth
                </ul>
            </div>
            
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <!-- Carousel Indicators -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
            </div>

            <!-- Carousel Items -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="carousel-image"
                        style="background-image: url('{{ asset('frontend/img/pexels-brett-sayles-1343325.jpg') }}')">
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-image"
                        style="background-image: url('{{ asset('frontend/img/pexels-pixabay-208277.jpg') }}')"></div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-image"
                        style="background-image: url('{{ asset('frontend/img/pexels-rquiros-2330141.jpg') }}')"></div>
                </div>
            </div>

            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
                <span class="visually-hidden">Next</span>
            </button>

            <!-- Hero Content Overlay -->
            <div class="hero-content">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12 text-center">
                            <h1>Welcome to Our Community</h1>
                            <p class="lead">Join us in worship every Sunday at 9:00 AM & 11:00 AM</p>
                            <a href="#about" class="btn btn-primary btn-lg">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2>About Our Church</h2>
                    <p>We are a welcoming community dedicated to spreading God's love and message of hope. Our doors are
                        open to everyone seeking spiritual growth and fellowship.</p>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('frontend/img/pexels-brett-sayles-1343325.jpg') }}" alt="Church"
                        class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Our Services</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-church fa-3x mb-3"></i>
                            <h5 class="card-title">Sunday Worship</h5>
                            <p class="card-text">Join us for worship services every Sunday morning.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-users fa-3x mb-3"></i>
                            <h5 class="card-title">Community Groups</h5>
                            <p class="card-text">Connect with others in small group settings.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-hands-helping fa-3x mb-3"></i>
                            <h5 class="card-title">Outreach</h5>
                            <p class="card-text">Serving our community through various programs.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Events Section -->
    <section id="events" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Upcoming Events & Announcements</h2>
            <div class="row">
                @foreach ($billboard as $item)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="event-card">
                            <div class="event-card-inner">
                                <!-- Image Section -->
                                <div class="event-image">
                                    <img src="/billboardimage/{{ $item->image }}" alt="{{ $item->title }}"
                                        class="img-fluid">

                                    <!-- Event Date -->
                                    <div class="event-date">
                                        <span class="day">{{ $item->created_at->format('d') }}</span>
                                        <span class="month">{{ strtoupper($item->created_at->format('M')) }}</span>
                                    </div>
                                </div>

                                <!-- Content Section -->
                                <div class="event-content">
                                    <h5>{{ $item->title }}</h5>
                                    <div class="event-details">
                                        <p><i class="fas fa-calendar-alt"></i>
                                            {{ $item->created_at->format('F j, Y') }}</p>
                                    </div>
                                    <p class="event-description">{{ $item->description }}</p>
                                    <a href="#" class="btn btn-primary btn-sm">New</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach



            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Contact Us</h2>
            <div class="row">
               
                <div class="col-lg-12">
                    <div class="contact-info">
                        <h4>Get in Touch</h4>
                        <p><i class="fas fa-map-marker-alt"></i> 123 Church Street, City, State 12345</p>
                        <p><i class="fas fa-phone"></i> (123) 456-7890</p>
                        <p><i class="fas fa-envelope"></i> info@gracecommunity.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-4 bg-dark text-white">
        <div class="container text-center">
            <p>&copy; 2024 Grace Community Church. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
