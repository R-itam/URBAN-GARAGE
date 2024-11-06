<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ROYAL CARS - Car Rental HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="car-rental-html-template/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="car-rental-html-template/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="car-rental-html-template/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="car-rental-html-template/css/style.css" rel="stylesheet">
    <style>
        .bt{
            height: 50px;
            margin-top: 20px;
            border-radius: 20px;
        }
        .bt>a{
            color: white;
        }
        .bt>a:hover{
            text-decoration: none;
        }
    </style>
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-dark py-3 px-lg-5 d-none d-lg-block">
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0">
        <div class="position-relative px-lg-5" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-secondary navbar-dark py-3 py-lg-0 pl-3 pl-lg-5">
                <a href="" class="navbar-brand">
                    <h1 class="text-uppercase text-primary mb-1"><img src="banner/cover/logo.jfif" alt="" class="logo"></h1>
                </a>
                @if (isset($Info))
                @foreach ($Info->all() as $all )
                
                <b>{{$all->Name}}</b>
                <img src="{{$all->Photo}}" alt="" height="50px" width="50px" style="border-radius:30px;">
                
                @endforeach
                
                @endif
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                    <a href="{{url('/userinfo')}}" class="nav-item nav-link">🖋️</a>
                    <a href="{{url('/adminpanel')}}" class="nav-item nav-link">AdminPanel</a>
                        <a href="{{url('/adminhome')}}" class="nav-item nav-link active">Home</a>
                        <a href="{{url('/adminabout')}}" class="nav-item nav-link">About</a>
                        <a href="{{url('/adminservies')}}" class="nav-item nav-link">Service</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Cars</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="car.html" class="dropdown-item">Sedan Car</a>
                                <a href="detail.html" class="dropdown-item">SUV Car</a>
                                <a href="booking.html" class="dropdown-item">Luxury Car</a>
                            </div>
                        </div>
                        <a href="{{url('/admincontact')}}" class="nav-item nav-link">Contact</a>
                        <button class="bt  btn-primary"><a href="{{url('/logout')}}">Log-Out</a></button>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


   <br><br>


    <!-- Page Header Start -->
    <div class="container-fluid page-header">
        <h1 class="display-3 text-uppercase text-white mb-3">Servies</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a class="text-white" href="{{url('/adminhome')}}">Home</a></h6>
            <h6 class="text-body m-0 px-3">/</h6>
            <h6 class="text-uppercase text-body m-0">Servies</h6>
        </div>
    </div>
    <!-- Page Header Start -->


    <!-- Services Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-1 text-primary text-center">02</h1>
            <h1 class="display-4 text-uppercase text-center mb-5">Our Services</h1>
            <div class="row">
                <div class="col-lg-6 col-md-6 mb-2">
                    <div class="service-item d-flex flex-column justify-content-center px-4 mb-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center justify-content-center bg-primary ml-n4" style="width: 80px; height: 80px;">
                                <i class="fa fa-2x fa-taxi text-secondary"></i>
                            </div>
                            <h1 class="display-2 text-white mt-n2 m-0">01</h1>
                        </div>
                        <h4 class="text-uppercase mb-3">Car Rental</h4>
                        <p class="m-0">You can rent your favourite car as your need and enjoy it like it's your own car</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 mb-2">
                    <div class="service-item d-flex flex-column justify-content-center px-4 mb-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="d-flex align-items-center justify-content-center bg-primary ml-n4" style="width: 80px; height: 80px;">
                                <i class="fa fa-2x fa-car text-secondary"></i>
                            </div>
                            <h1 class="display-2 text-white mt-n2 m-0">02</h1>
                        </div>
                        <h4 class="text-uppercase mb-3">Car Inspection</h4>
                        <p class="m-0">Check your car availability ,milage,performence,color and many more..</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services End -->


    <!-- Banner Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="bg-banner py-5 px-4 text-center">
                <div class="py-5">
                    <h1 class="display-1 text-uppercase text-primary mb-4">50% OFF</h1>
                    <h1 class="text-uppercase text-light mb-4">Special Offer For New Members</h1>
               
                    
                </div>
            </div>
        </div>
    </div>

   
   


    <!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="owl-carousel vendor-carousel">
                <div class="bg-light p-4">
                    <img src="banner/cover/audi.jfif" alt="" class="vn">
                </div>
                <div class="bg-light p-4">
                    <img src="banner/cover/bmw.png" alt="" class="vn">
                </div>
                <div class="bg-light p-4">
                    <img src="banner/cover/honda.png" alt="" class="vn">
                </div>
                <div class="bg-light p-4">
                    <img src="banner/cover/hyndai.jfif" alt="" class="vn">
                </div>
                <div class="bg-light p-4">
                    <img src="banner/cover/kia.jfif" alt="" class="vn">
                </div>
                <div class="bg-light p-4">
                    <img src="banner/cover/mercedes.jfif" alt="" class="vn">
                </div>
                <div class="bg-light p-4">
                    <img src="banner/cover/nissan.jfif" alt="" class="vn">
                </div>
                <div class="bg-light p-4">
                    <img src="banner/cover/toyota.png" alt="" class="vn">
                </div>
                <div class="bg-light p-4">
                    <img src="banner/cover/rr.png" alt="" class="vn">
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-secondary py-5 px-sm-3 px-md-5" style="margin-top: 90px;">
        <div class="row pt-5">
            <div class="col-lg-6 col-md-6 mb-5">
                <h4 class="text-uppercase text-light mb-4">Get In Touch</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-white mr-3"></i>GP Block, Sector V, Bidhannagar, Kolkata, West Bengal 700091
                </p>
                <p class="mb-2"><i class="fa fa-phone-alt text-white mr-3"></i>+91 6289025978</p>
                <p><i class="fa fa-envelope text-white mr-3"></i>urbangarage@service.com</p>
                <h6 class="text-uppercase text-white py-2">Follow Us</h6>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-lg btn-dark btn-lg-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-dark btn-lg-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-lg btn-dark btn-lg-square" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 mb-5">
                <h4 class="text-uppercase text-light mb-4">Usefull Links</h4>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-body mb-2" href="#"><i class="fa fa-angle-right text-white mr-2"></i>Private Policy</a>
                    <a class="text-body mb-2" href="#"><i class="fa fa-angle-right text-white mr-2"></i>Term & Conditions</a>
                    <a class="text-body mb-2" href="#"><i class="fa fa-angle-right text-white mr-2"></i>New Member Registration</a>
                    <a class="text-body" href="#"><i class="fa fa-angle-right text-white mr-2"></i>Help & FQAs</a>
                </div>
            </div> 
        </div>
    </div>
    <div class="container-fluid bg-dark py-4 px-sm-3 px-md-5">
        <p class="mb-2 text-center text-body">&copy; <a href="#">urbangarage</a>. All Rights Reserved.</p>
		
		<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->					
        <p class="m-0 text-center text-body">Designed by <a href="https://htmlcodex.com">Ritam Samanta</a></p>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="car-rental-html-template/lib/easing/easing.min.js"></script>
    <script src="car-rental-html-template/lib/waypoints/waypoints.min.js"></script>
    <script src="car-rental-html-template/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="car-rental-html-template/lib/tempusdominus/js/moment.min.js"></script>
    <script src="car-rental-html-template/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="car-rental-html-template/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="car-rental-html-template/js/main.js"></script>
</body>