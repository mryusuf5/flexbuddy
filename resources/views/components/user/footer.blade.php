<footer class="bg-dark py-2" id="tempaltemo_footer">
    <div class="container">
        <div class="row">

            <div class="col-md pt-5">
                <img src="{{asset("img/socrates2.jpg")}}" height="250" width="250" style="object-fit: cover" alt="">
                <ul class="list-unstyled text-light footer-link-list">
                    <li>
                        <i class="fas fa-map-marker-alt fa-fw"></i>
                        Lage Witsiebaan 78-36 - 5042DB Tilburg
                    </li>
                    <li>
                        <i class="fa fa-envelope fa-fw"></i>
                        <a class="text-decoration-none" href="mailto:info@company.com">so-cratesmd@hotmail.com</a>
                    </li>
                </ul>
            </div>

            <div class="col-md pt-5">
                <h2 class="h2 text-light border-bottom pb-3 border-light">Links</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li>
                        <a class="text-decoration-none" href="{{route("antiSpam")}}">Anti spam beleid</a>
                    </li>
                    <li>
                        <a class="text-decoration-none" href="{{route("disclaimer")}}">Disclaimer</a>
                    </li>
                    <li>
                        <a class="text-decoration-none" href="{{route("terms")}}">Algemene voorwaarden</a>
                    </li>
                    <li>
                        <a class="text-decoration-none" href="{{route("faq")}}">FAQ (veel gestelde vragen)</a>
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
            background: '#000'
        },
        onClick: function(){} // Callback after click
    }).showToast();
    @endif
</script>
</body>
</html>
