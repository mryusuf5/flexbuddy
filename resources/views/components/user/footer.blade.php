<footer class="bg-dark" id="tempaltemo_footer">
    <div class="container">
        <div class="row">

            <div class="col-md pt-5">
                <h2 class="h2 text-success border-bottom pb-3 border-light logo">Prime Shop</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li>
                        <i class="fas fa-map-marker-alt fa-fw"></i>
                        Kaulil fabriekstraat
                    </li>
                    <li>
                        <i class="fa fa-phone fa-fw"></i>
                        <a class="text-decoration-none" href="tel:010-020-0340">+32 412 345 678</a>
                    </li>
                    <li>
                        <i class="fa fa-envelope fa-fw"></i>
                        <a class="text-decoration-none" href="mailto:info@company.com">info@primeshop.com</a>
                    </li>
                </ul>
            </div>

            <div class="col-md pt-5">
                <h2 class="h2 text-light border-bottom pb-3 border-light">Products</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li><a class="text-decoration-none" href="#">Prime drinks</a></li>
                    <li><a class="text-decoration-none" href="#">Prime vapes</a></li>
                </ul>
            </div>
        </div>

        <div class="row text-light">
            <div class="col-12 mb-3">
                <div class="w-100 my-3 border-top border-light"></div>
            </div>
            <div class="col-auto me-auto">
                <ul class="list-inline text-left footer-icons">
                    <li class="list-inline-item border border-light rounded-circle text-center">
                        <a class="text-light text-decoration-none" target="_blank" href="http://facebook.com/"><i class="fab fa-facebook-f fa-lg fa-fw"></i></a>
                    </li>
                    <li class="list-inline-item border border-light rounded-circle text-center">
                        <a class="text-light text-decoration-none" target="_blank" href="https://www.instagram.com/"><i class="fab fa-instagram fa-lg fa-fw"></i></a>
                    </li>
                    <li class="list-inline-item border border-light rounded-circle text-center">
                        <a class="text-light text-decoration-none" target="_blank" href="https://twitter.com/"><i class="fab fa-twitter fa-lg fa-fw"></i></a>
                    </li>
                    <li class="list-inline-item border border-light rounded-circle text-center">
                        <a class="text-light text-decoration-none" target="_blank" href="https://www.linkedin.com/"><i class="fab fa-linkedin fa-lg fa-fw"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<script src="{{asset('js/template/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/template/jquery-1.11.0.min.js')}}"></script>
<script src="{{asset('js/template/jquery-migrate-1.2.1.min.js')}}"></script>
<script src="{{asset('js/template/slick.min.js')}}"></script>
<script src="{{asset('js/template/templatemo.js')}}"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
@yield('userScripts')
<script>
    @if($message = Session::get('success'))
    Toastify({
        text: "{{$message}}",
        duration: 5000,
        newWindow: true,
        close: true,
        gravity: "top", // `top` or `bottom`
        position: "center", // `left`, `center` or `right`
        stopOnFocus: true, // Prevents dismissing of toast on hover
        style: {
            background: '#59AB6E'
        },
        onClick: function(){} // Callback after click
    }).showToast();
    @endif
</script>
</body>
</html>
