<x-user.layout>
    <div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last d-flex justify-content-center">
                            <img class="img-fluid" src="{{asset('img/prime-tropical-punch.png')}}" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left align-self-center">
                                <h1 class="h1 text-success"><b>Prime drink</b></h1>
                                <p>Prime drink</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <div class="row p-5">
                        <div class="mx-auto col-md-8 col-lg-6 order-lg-last d-flex justify-content-center">
                            <img class="img-fluid" src="{{asset('img/prime-vapes.png')}}" alt="">
                        </div>
                        <div class="col-lg-6 mb-0 d-flex align-items-center">
                            <div class="text-align-left">
                                <h1 class="h1 text-success">Prime vape</h1>
                                <p>Prime vape</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
            <i class="fas fa-chevron-left"></i>
        </a>
        <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
            <i class="fas fa-chevron-right"></i>
        </a>
    </div>

    <section class="container py-5 position-relative">
        <img src="{{asset('img/prime-tropical-punch.png')}}" class="backgroundDrink1" alt="">
        <img src="{{asset('img/prime-vape-mrblue.png')}}" class="backgroundDrink2" alt="">
        <div class="row text-center pt-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Categories</h1>
                <p>
                    Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                    deserunt mollit anim id est laborum.
                </p>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach($productcategories as $productcategory)
            <div class="col-12 col-md-4 p-5 mt-3 d-flex flex-column justify-content-center align-items-center">
                <a href="{{route('productcategories.show', $productcategory->id)}}" style="height: 230px; width: 230px">
                    <img src="{{asset('img/category/' . $productcategory->image)}}" class="rounded-circle w-100 border" style="object-fit: contain; height: 100%">
                </a>
                <h5 class="text-center mt-3 mb-3">{{$productcategory->name}}</h5>
                <p class="text-center">
                    <a class="btn btn-success" href="{{route('productcategories.show', $productcategory->id)}}">View</a>
                </p>
            </div>
            @endforeach
        </div>
    </section>

    <section class="bg-light position-relative">
        <img src="{{asset('img/prime-vape-strawberry.png')}}" class="backgroundDrink3" />
        <img src="{{asset('img/prime-vape-tropical.png')}}" class="backgroundDrink4" />
        <div class="container py-5">
            <div class="row text-center py-3">
                <div class="col-lg-6 m-auto">
                    <h1 class="h1">Best sold products</h1>
                    <p>
                        Reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                        Excepteur sint occaecat cupidatat non proident.
                    </p>
                </div>
            </div>
            <div class="row">
                @foreach($topProducts as $product)
                    <div class="col-12 col-md-4 mb-4">
                        <div class="card h-100">
                            <a href="{{route('userSingleProduct', $product->id)}}" class="d-flex justify-content-center">
                                <img src="{{asset('img/product/' . $product->image)}}" class="card-img-top" style="object-fit: contain; width: 200px;">
                            </a>
                            <div class="card-body">
                                <ul class="list-unstyled d-flex justify-content-between">
                                    <li>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                        <i class="text-warning fa fa-star"></i>
                                    </li>
                                    <li class="text-muted text-right">&euro; {{number_format($product->price, 2, ',', '.')}}</li>
                                </ul>
                                <a href="{{route('userSingleProduct', $product->id)}}" class="h2 text-decoration-none text-dark">{{$product->name}}</a>
                                <p class="card-text">
                                    {{Str::limit($product->description, 25)}}
                                </p>
                                <p class="text-muted">Reviews (24)</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-user.layout>
