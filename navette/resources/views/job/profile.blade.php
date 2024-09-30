<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>JobEntry - Job Portal Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
            <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                <h1 class="m-0 text-primary">Navette</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
            <!-- Links for USER role -->
            @if(Auth::check() && Auth::user()->role === 'USER')
                <a href="{{ route('home') }}" class="nav-item nav-link active">Accueil</a>
                <a href="{{ route('about') }}" class="nav-item nav-link">About</a>
                <a href="{{ route('navettes.reservations') }}" class="nav-item nav-link">Réservation</a>
                <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>
                <a href="{{ route('profile') }}"class="nav-item nav-link ">Profile</a>
            @endif

            <!-- Links for ADMIN role -->
            @if(Auth::check() && Auth::user()->role === 'ADMIN')
                <a href="{{ route('home') }}" class="nav-item nav-link ">Accueil</a>
                <a href="{{ route('profile') }}"class="nav-item nav-link active ">Profile</a>
                
            @endif
            
            <!-- Links for AGENCE role -->
            @if(Auth::check() && Auth::user()->role === 'AGENCE')
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Agences</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="{{ route('create_navette') }}" class="dropdown-item">Créer navette</a>
                        <a href="{{ route('navettes.index') }}" class="dropdown-item">Gérer navette</a>
                        <a href="{{ route('404') }}" class="dropdown-item">404</a>
                    </div>
                </div>
            @endif
        </div>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

                <a href="#" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                   Log Out<i class="fa fa-arrow-right ms-3"></i>
                </a>
            </div>
        </nav>
        <!-- Navbar End -->

        <!-- Profile Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <!-- <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Profile</h1> -->
                <div class="row g-4">
                    <div class="col-12">
                        <div class="row gy-4">
                            <div class="col-md-4 wow fadeIn" data-wow-delay="0.1s">
                                <div class="d-flex align-items-center bg-light rounded p-4">
                                    <div class="bg-white border rounded d-flex flex-shrink-0 align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                                        <i class="fa fa-user text-primary"></i>
                                    </div>
                                    <span>Name: {{ $user->name }}</span>
                                </div>
                            </div>
                            <div class="col-md-4 wow fadeIn" data-wow-delay="0.3s">
                                <div class="d-flex align-items-center bg-light rounded p-4">
                                    <div class="bg-white border rounded d-flex flex-shrink-0 align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                                        <i class="fa fa-envelope-open text-primary"></i>
                                    </div>
                                    <span>Email: {{ $user->email }}</span>
                                </div>
                            </div>
                            <div class="col-md-4 wow fadeIn" data-wow-delay="0.5s">
                                <div class="d-flex align-items-center bg-light rounded p-4">
                                    <div class="bg-white border rounded d-flex flex-shrink-0 align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                                        <i class="fa fa-phone-alt text-primary"></i>
                                    </div>
                                    <span>Contact: {{ $user->contactdetails }}</span>
                                </div>
                            </div>
                            <!-- <div class="col-md-4 wow fadeIn" data-wow-delay="0.5s">
                                <div class="d-flex align-items-center bg-light rounded p-4">
                                    <div class="bg-white border rounded d-flex flex-shrink-0 align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                                        <i class="fa fa-map-marker-alt text-primary"></i>
                                    </div>
                                    <span>Place: {{ $user->place }}</span>
                                </div>
                            </div> -->
                            <div class="col-md-4 wow fadeIn" data-wow-delay="0.5s">
                                <div class="d-flex align-items-center bg-light rounded p-4">
                                    <div class="bg-white border rounded d-flex flex-shrink-0 align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                                        <i class="fa fa-user-shield text-primary"></i>
                                    </div>
                                    <span>Role: {{ $user->role }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Profile End -->
         <!-- Create agence -->
         <div class="col-md-4 wow fadeIn" data-wow-delay="0.5s">
    <div class="d-flex align-items-center bg-light rounded p-4">
        <div class="bg-white border rounded d-flex flex-shrink-0 align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
        <i class="fa fa-user text-primary"></i>
        </div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#contactModal">
        Créer Compte Agence 
        </button>
    </div>
</div>

        
<div class="container-xxl py-5">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Tous les navettes</h1>
        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
            <div class="tab-content">
                <div class="container-xxl py-5">
                    <div class="container">
                        
                        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                            <div id="tab-1" class="tab-pane fade show p-0 active">
                                @if ($navettes->isEmpty())
                                    <p>Aucune navette disponible pour le moment.</p>
                                @else
                                    @foreach($navettes as $navette)
                                        <div class="job-item p-4 mb-4">
                                            <div class="row g-4">
                                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                                    <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-{{ $loop->index + 1 }}.jpg" alt="" style="width: 80px; height: 80px;">
                                                    <div class="text-start ps-4">
                                                        <h5 class="mb-3">{{ $navette->destination }}</h5>
                                                        <span class="text-truncate me-3">
                                                            <i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $navette->departure }}
                                                        </span>
                                                        <span class="text-truncate me-3">
                                                            <i class="far fa-clock text-primary me-2"></i>{{ $navette->arrival }}
                                                        </span>
                                                        <span class="text-truncate me-0">
                                                            <i class="far fa-money-bill-alt text-primary me-2"></i>${{ $navette->price_per_person }} - ${{ $navette->vehicle_price }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                                    <div class="d-flex mb-3">
                                                        <button class="btn btn-success me-2">Accepter</button>
                                                        <button class="btn btn-danger">Rejeter</button>
                                                    </div>
                                                    <small class="text-truncate">
                                                        <i class="far fa-calendar-alt text-primary me-2"></i>Date Line: 01 Jan, 2045
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
</div>



<!-- Contact Modal -->
<div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="contactModalLabel">Créer Compte Agence</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('registerAgence') }}" class="register-form" id="register-form">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nom de l'agence</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Nom de l'agence" required />
                    </div>
                    <div class="form-group">
                        <label for="lieu">Lieu de l'agence</label>
                        <input type="text" name="lieu" id="lieu" class="form-control" placeholder="Lieu de l'agence" required />
                    </div>
                    <div class="form-group">
                        <label for="email">Adresse email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Adresse email" required />
                    </div>
                    <div class="form-group">
                        <label for="contact">contact details</label>
                        <input type="text" name="contactdetails" id="contactdetails" class="form-control" placeholder="contact details" required />
                    </div>
                    <div class="form-group">
                        <label for="pass">Mot de passe</label>
                        <input type="password" name="password" id="pass" class="form-control" placeholder="Password" required />
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirmer le mot de passe</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirmer le mot de passe" required />
                    </div>
                    <button type="submit" class="btn btn-primary">Créer agence</button>
                </form>
            </div>
        </div>
    </div>
</div>


</div>


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
