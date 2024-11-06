<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ROYAL CARS - Car Rental HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
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
            margin-top: 3px;
            border-radius: 10px;
        }
        .bt>a{
            color: white;
        }
        .bt>a:hover{
            text-decoration: none;
        }
        .contact-form {
    overflow-x: auto;
}

.contact-form table {
    width: 100%;
    border-collapse: collapse;
}

.contact-form th, .contact-form td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

/* .contact-form th {
    background-color: #f0f0f0;
} */
@media only screen and (max-width: 768px) {
    .contact-form table {
        font-size: 14px;
    }
    .contact-form th, .contact-form td {
        padding: 4px;
    }
}
     
    </style>
</head>

<body>
    <!-- Topbar Start -->
    <div class="container-fluid bg-dark py-3 px-lg-5 d-none d-lg-block">
    </div>
    <!-- Topbar End -->

   <br><br>


    <!-- Page Header Start -->
    <div class="container-fluid page-header">
        <h1 class="display-3 text-uppercase text-white mb-3">Driver Booking Details</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase text-body m-0">Driver Booking Details</h6>
        </div>
    </div>
    <!-- Page Header Start -->


     <!-- Contact Start -->
     <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
        
            <h1 class="display-4 text-uppercase text-center mb-5">Driver Booking Details</h1>
            <div class="row">
                <!-- <div class="col-lg-12 "> -->
                    <div class="contact-form bg-light mb-4" style="padding: 20px;">
                      @if (isset($DBOOK))
                      <table class="table table-striped table-dark table-hover">
                       <tr>
                       <tr>
                            <th>DRIVER NAME</th>
                            <th>DRIVER EMAIL</th>
                            <th>DRIVER PHONE</th>
                            <th>USER NAME</th>
                            <th>USER EMAIL</th>
                            <th>USER PHONE</th>
                            <th>PICK-UP LOCATION</th>
                            <th>DESTINATION</th>
                            <th>PICK-UP DATE</th>
                            <th>DOCUMENT</th> 
                            <th>NUM-OF DAY</th>
                            <th>PAYMENT MODE</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>
                        @foreach ($DBOOK as $all )
                        <tr>
                            <td>{{$all->Driver_name}}</td>
                            <td>{{$all->Diver_email}}</td>
                            <td>{{$all->Driver_phone}}</td>
                            <td>{{$all->Customer_name}}</td>
                            <td>{{$all->Customer_email}}</td>
                            <td>{{$all->Customer_phone}}</td>
                            <td>{{$all->Pick_up_loc}}</td>
                            <td>{{$all->Destination}}</td>
                            <td>{{$all->Pick_date}}</td>
                            <td><img src="{{$all->Customer_doc}}" alt="" height="70px" width="70px"></td>
                            <td>{{$all->No_day}}</td>
                            <td>{{$all->Payment}}</td>
                            <td>{{$all->Status}}</td>
                            <td>@if ($all->Auth==3)
                            <b>User Cancel</b>
                            @elseif($all->Auth==4)
                            <b>Driver Cancel</b>
                            @elseif($all->Auth==5)
                            <b>Driver Confirm</b>
                            @elseif($all->Auth==1)
                            <b>Cancel</b>
                            @elseif($all->Auth==2)
                            <button class="bt btn-sm btn-danger"><a href="{{url('/canceldriver')}}{{$all->User_id}}">Cancel</a></button>
                            @else <button class="bt btn-sm btn-danger"><a href="{{url('/canceldriver')}}{{$all->User_id}}">Cancel</a></button> <button class="bt btn-sm btn-success"><a href="{{'/confirmdriver'}}{{$all->User_id}}">Confirm</a></button>
                        
                        @endif</td>
                        <td>@if ($all->Auth==0)
                            <b>Request</b>
                            @elseif($all->Auth==1)
                            <b>Cancel</b>
                            @elseif($all->Auth==3)
                            <b>User Cancel</b>
                            @elseif($all->Auth==4)
                            <b>Driver Cancel</b>
                            @elseif($all->Auth==5)
                            <b>Driver Confirm</b>
                            @else($all->Auth==2)
                            <b>Confirm</b>
                        
                        @endif</td>
                        </tr>
                        
                        @endforeach

                      </table>
                      
                      @endif
                      <center><a href="{{url('/adminpanel')}}">Back >></a></center>
                    </div>
                    
                <!-- </div> -->
                
            </div>
        </div>
    </div>s
    <!-- Contact End -->

   
   


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