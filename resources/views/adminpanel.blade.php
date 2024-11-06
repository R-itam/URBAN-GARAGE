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
                        <a href="{{url('/adminhome')}}" class="nav-item nav-link ">Home</a>
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


    <!-- Carousel Start -->
    <div class="container-fluid p-0" style="margin-bottom: 90px;">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="banner/cover/cover1.jpg" alt="Image"height="600px">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Rent A Car</h4>
                            <h1 class="display-1 text-white mb-md-4">Best Rental Cars In Your Location</h1>
                            
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="banner/cover/cover2.jpg" alt="Image"height="600px">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3">Rent A Car</h4>
                            <h1 class="display-1 text-white mb-md-4">Quality Cars with Unlimited Miles</h1>
                          
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n2"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n2"></span>
                </div>
            </a>
        </div>
    </div>
    <!-- Carousel End -->
     <h1 align="center" class="display-3 text-grey mb-md-3">ADMIN PANEL</h1>
    <div class="jumbotron">
        <h1 align="center" class="display-5 text-grey mb-md-3">All Details</h1><br>
        <div class="row">
            <div class="col-lg-4">
                <div class="card" style="width: 18rem;">
  <img src="banner/cover/cover2.jpg" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Sedan Details</h5>
    <p class="card-text">Add,Update,Delete sedan Details</p>
    <a href="{{url('/sedansection')}}" class="btn btn-primary">Full Details >></a>
  </div>
</div>
            </div>
            <div class="col-lg-4">
                <div class="card" style="width: 18rem;">
  <img src="banner/cover/cover5.jpg" class="card-img-top" alt="..." height="165px">
  <div class="card-body">
    <h5 class="card-title">Luxury Details</h5>
    <p class="card-text">Add,Update,Delete Luxury </p>
    <a href="{{url('/luxurysection')}}" class="btn btn-primary">Full Details >></a>
  </div>
</div>
            </div>
            <div class="col-lg-4">
                <div class="card" style="width: 18rem;">
  <img src="banner/cover/taisor.webp" class="card-img-top" alt="..." height="165px">
  <div class="card-body">
    <h5 class="card-title">SUV Details</h5>
    <p class="card-text">Add,Update,Delete SUV Details</p>
    <a href="{{url('/suvsection')}}" class="btn btn-primary">Full Details >></a>
  </div>
</div>
            </div>
        </div><br><br>
        <div class="row">
            <div class="col-lg-4">
                <div class="card" style="width: 18rem;">
  <img src="banner/cover/avtar.avif" class="card-img-top" alt="..." height="165px">
  <div class="card-body">
    <h5 class="card-title">Register User</h5>
    <p class="card-text">All register user details</p>
    <a href="{{url('/userdetails')}}" class="btn btn-primary">Full Details >></a>
  </div>
</div>
            </div>
            <div class="col-lg-4">
                <div class="card" style="width: 18rem;">
  <img src="banner/cover/book.png" class="card-img-top" alt="..." height="165px">
  <div class="card-body">
    <h5 class="card-title">Booking Information</h5>
    <p class="card-text">See all booking details</p>
    <a href="{{url('/adminbookdetail')}}" class="btn btn-primary">Full Details >></a>
  </div>
</div>
            </div>
            <div class="col-lg-4">
                <div class="card" style="width: 18rem;">
  <img src="banner/cover/message.png" class="card-img-top" alt="..." height="165px">
  <div class="card-body">
    <h5 class="card-title">All User Feedback</h5>
    <p class="card-text">See all Customer feedback</p>
    <a href="{{url('/feedbackview')}}" class="btn btn-primary">Full Details >></a>
  </div>
</div>
            </div>
        </div><br><br>
        <div class="row">
            <div class="col-4">
            <div class="card" style="width: 18rem;">
  <img src="banner/cover/download.png" class="card-img-top" alt="..." height="165px">
  <div class="card-body">
    <h5 class="card-title">Driver Section</h5>
    <p class="card-text"> All driver details</p>
    <a href="{{url('/driversection')}}" class="btn btn-primary">Full Details >></a>
  </div>
</div>
            </div>
            <div class="col-4">
            <div class="card" style="width: 18rem;">
  <img src="banner/cover/dr-down.png" class="card-img-top" alt="..." height="165px">
  <div class="card-body">
    <h5 class="card-title">Driver Booking Details</h5>
    <p class="card-text"> All driver booking details</p>
    <a href="{{url('/admindriverbook')}}" class="btn btn-primary">Full Details >></a>
  </div>
</div>
            </div>
            <div class="col-lg-4">
                <div class="card" style="width: 18rem;">
  <img src="banner/cover/drfeed.png" class="card-img-top" alt="..." height="165px">
  <div class="card-body">
    <h5 class="card-title">All Driver Feedback</h5>
    <p class="card-text">See all driver feedback</p>
    <a href="{{url('/driverfeedbackview')}}" class="btn btn-primary">Full Details >></a>
  </div>
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

</html>