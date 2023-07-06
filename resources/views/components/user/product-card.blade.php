<div class="col-md-4">
    <div class="card mb-4 product-wap rounded-0">
        <div class="card rounded-0">
            <img class="card-img rounded-0 img-fluid" style="height: 200px; object-fit: cover"
                 src="{{asset('img/product/' . $image)}}">
        </div>
        <div class="card-body">
            <a href="shop-single.html" class="text-decoration-none d-flex justify-content-between">
                <span>{{$name}}</span>
            </a>
            <hr>
            <a href="{{route('userSingleProduct', $routeId)}}"
               class="btn btn-success text-white w-100 mt-2">Bekijken</a>
        </div>
    </div>
</div>
