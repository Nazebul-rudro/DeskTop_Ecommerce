<!DOCTYPE html>
<html lang="en">

<x-fontend.layouts.partials.head />

<body>
    <!-- Topbar Start -->
    <x-fontend.layouts.partials.topbar />
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <x-fontend.layouts.partials.header />

    <!-- Navbar End -->
    <!--main Contant start -->
    {{ $slot }}
    <!--main Contant end -->

    <!-- Footer Start -->
    <x-fontend.layouts.partials.fooder />

    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('ui/fontend') }}/lib/easing/easing.min.js"></script>
    <script src="{{ asset('ui/fontend') }}/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('ui/fontend') }}/mail/jqBootstrapValidation.min.js"></script>
    <script src="{{ asset('ui/fontend') }}/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('ui/fontend') }}/js/main.js"></script>
</body>

</html>
