    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="{{ asset('landing') }}/" class="text-decoration-none">
                    <h1 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border border-white px-3 mr-1">E</span>Katalog</h1>
                </a>
                
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        
                    </div>
                    <div class="col-md-4 mb-5">
                        
                    </div>
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Newsletter</h5>
                        <form action="">
                            <div class="form-group">
                                <input type="text" class="form-control border-0 py-4" placeholder="Your Name" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control border-0 py-4" placeholder="Your Email"
                                    required="required" />
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block border-0 py-3" type="submit">Subscribe Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top border-light mx-xl-5 py-4">
            
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="{{ asset('landing') }}/#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('landing') }}/lib/easing/easing.min.js"></script>
    <script src="{{ asset('landing') }}/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('landing') }}/mail/jqBootstrapValidation.min.js"></script>
    <script src="{{ asset('landing') }}/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('landing') }}/js/main.js"></script>
</body>

</html>

<script>
    $(document).ready(function() {
        // Fungsi untuk memperbarui badge keranjang
        function updateCartCount() {
            $.ajax({
                url: "{{ route('cart.count') }}",
                method: "GET",
                success: function(response) {
                    $('.cart-count').text(response.count);
                }
            });
        }

        // Panggil saat halaman pertama kali dimuat
        updateCartCount();
    });
</script>