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
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


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
                <a href="{{ route('home') }}" class="nav-item nav-link">Accueil</a>
                <a href="{{ route('about') }}" class="nav-item nav-link">About</a>
                <a href="{{ route('navettes.reservations') }}" class="nav-item nav-link">Réservation</a>
                <a href="{{ route('contact') }}" class="nav-item nav-link">Contact</a>
            @endif
            
            <!-- Links for AGENCE role -->
            @if(Auth::check() && Auth::user()->role === 'AGENCE')
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Agences</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        <a href="{{ route('create_navette') }}" class="dropdown-item ">Créer navette</a>
                        <a href="{{ route('navettes.index') }}" class="dropdown-item">Gérer navette</a>
                        <a href="{{ route('404') }}" class="dropdown-item">404</a>
                    </div>
                </div>
            @endif
        </div>

        <!-- Logout -->
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


        <!-- Header End -->
  
        <!-- Header End -->


        <!-- Job Detail Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="row gy-5 gx-4">
                    <div class="col-lg-8">
                        

                        
        
                        <div class="">
                            <h4 class="mb-4">Créer nouvelle navette</h4>
                            <form id="shuttle-form" action="{{ route('creetenav') }}" method="POST">
    @csrf

    <div class="row g-3">
        <div class="col-12 col-sm-6">
            <input type="text" id="destination" name="destination" class="form-control" placeholder="Destination" required>
        </div>
        <div class="col-12 col-sm-6">
            <input type="text" id="departure" name="departure" class="form-control" placeholder="Lieu de départ" required>
        </div>
        <div class="col-12 col-sm-6">
            <input type="text" id="arrival" name="arrival" class="form-control" placeholder="Lieu d'arrivée" required>
        </div>
        <div class="col-12 col-sm-6">
            <input type="text" id="vehicle-type" name="vehicle_type" class="form-control" placeholder="Type de véhicule" required>
        </div>
        <div class="col-12 col-sm-6">
            <select id="brand" name="brand" class="form-control" required>
                <option value="">Marque</option>
                <option value="100">Marque 1</option>
                <option value="150">Marque 2</option>
                <option value="200">Marque 3</option>
            </select>
        </div>
        <div class="col-12 col-sm-6">
            <input type="number" id="price-per-person" name="price_per_person" class="form-control" placeholder="Prix par personne" required>
        </div>
        <div class="col-12 col-sm-6">
            <input type="number" id="vehicle-price" name="vehicle_price" class="form-control" placeholder="Prix de type de véhicule" required>
        </div>
        <div class="col-12 col-sm-6">
            <input type="number" id="brand-price" name="brand_price" class="form-control" placeholder="Prix de la marque" required>
        </div>
        <div class="col-12">
            <button type="button" class="btn btn-danger w-100" onclick="calculateTotalPrice()">Calculer tarif</button>
        </div>
        <div class="col-12">
            <button class="btn btn-primary w-100" type="submit">create</button>
        </div>
        <div class="col-12">
            <p id="total-price" class="text-center mt-4"></p>
        </div>
    </div>
</form>

                        </div>
                        
                        <script>
                        function calculateTotalPrice() {
                            const pricePerPerson = parseFloat(document.getElementById('price-per-person').value) || 0;
                            const vehiclePrice = parseFloat(document.getElementById('vehicle-price').value) || 0;
                            const brandPrice = parseFloat(document.getElementById('brand').value) || 0;
                        
                            const totalPrice = pricePerPerson + vehiclePrice + brandPrice;
                        
                            // Display the total price
                            document.getElementById('total-price').textContent = `Tarif total: ${totalPrice.toFixed(2)} €`;
                        }
                        </script>
                        
                    </div>
        
                    <div class="col-lg-4">
                        <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                            <h4 class="mb-4">Navette Détails</h4>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Published On: 01 Jan, 2045</p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Vacancy: 123 Position</p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Job Nature: Full Time</p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Salary: $123 - $456</p>
                            <p><i class="fa fa-angle-right text-primary me-2"></i>Location: New York, USA</p>
                            <p class="m-0"><i class="fa fa-angle-right text-primary me-2"></i>Date Line: 01 Jan, 2045</p>
                        </div>
                        <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                            <h4 class="mb-4">Detail Agence</h4>
                            <p class="m-0">Ipsum dolor ipsum accusam stet et et diam dolores, sed rebum sadipscing elitr vero dolores. Lorem dolore elitr justo et no gubergren sadipscing, ipsum et takimata aliquyam et rebum est ipsum lorem diam. Et lorem magna eirmod est et et sanctus et, kasd clita labore.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Job Detail End -->


        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Company</h5>
                        <a class="btn btn-link text-white-50" href="">About Us</a>
                        <a class="btn btn-link text-white-50" href="">Contact Us</a>
                        <a class="btn btn-link text-white-50" href="">Our Services</a>
                        <a class="btn btn-link text-white-50" href="">Privacy Policy</a>
                        <a class="btn btn-link text-white-50" href="">Terms & Condition</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Quick Links</h5>
                        <a class="btn btn-link text-white-50" href="">About Us</a>
                        <a class="btn btn-link text-white-50" href="">Contact Us</a>
                        <a class="btn btn-link text-white-50" href="">Our Services</a>
                        <a class="btn btn-link text-white-50" href="">Privacy Policy</a>
                        <a class="btn btn-link text-white-50" href="">Terms & Condition</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Contact</h5>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Newsletter</h5>
                        <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                        <div class="position-relative mx-auto" style="max-width: 400px;">
                            <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                            <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved. 
							
							<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
							Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="">Home</a>
                                <a href="">Cookies</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <script>
async function calculateTotalPrice() {
    const destination = document.getElementById('destination').value;
    const departure = document.getElementById('departure').value;
    const arrival = document.getElementById('arrival').value;
    const vehicleType = document.getElementById('vehicle-type').value;
    const brand = document.getElementById('brand').value;
    const pricePerPerson = parseFloat(document.getElementById('price-per-person').value) || 0;
    const vehiclePrice = parseFloat(document.getElementById('vehicle-price').value) || 0;
    const brandPrice = parseFloat(document.getElementById('brand-price').value) || 0;

    const data = {
        destination,
        departure,
        arrival,
        vehicle_type: vehicleType,
        brand,
        price_per_person: pricePerPerson,
        vehicle_price: vehiclePrice,
        brand_price: brandPrice
    };
    console.log(data);
    const response = await fetch('/create/navette', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    });

    const result = await response.json();
    document.getElementById('total-price').textContent = `Tarif total: ${result.total_price.toFixed(2)} €`;
}
</script>

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

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>