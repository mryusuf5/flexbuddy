<x-admin.layout>
    <x-slot name="title">Welkom</x-slot>
    <div class="row justify-content-center">

        <a href="#" class="col-md-4 col-12 text-center">
            <div class="card p-5">
                <h3><i class="fa-solid fa-bottle-water fs-md-2 fs-5 text-primary"></i></h3>
                <h5>Producten: {{count($products)}}</h5>
            </div>
        </a>

        <a href="{{route("admin.productcategories.index")}}" class="col-md-4 col-12 text-center">
            <div class="card p-5">
                <h3><i class="fa-solid fa-list fs-md-2 fs-5 text-primary"></i></h3>
                <h5>Categorieën: {{count($productCategories)}}</h5>
            </div>
        </a>

        <a href="{{route("admin.orders.index")}}" class="col-md-4 col-12 text-center">
            <div class="card p-5">
                <h3><i class="fa-solid fa-cart-plus fs-md-2 fs-5 text-primary"></i></h3>
                <h5>Bestellingen: {{count($orders)}}</h5>
            </div>
        </a>

    </div>
</x-admin.layout>
