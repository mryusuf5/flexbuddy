<x-user.layout>
    <div class="container py-5" style="min-height: 80vh;">
        <div class="row">
            <div class="col-lg-3">
                <a href="{{route('productcategories.index')}}" class="text-decoration-none
                {{Route::is('productcategories.index') ? 'text-success' : 'text-dark'}}">
{{--                    <h1 class="h2 pb-4">Categories</h1>--}}
                </a>
                <x-user.categories :productcategories="$productcategories"></x-user.categories>
            </div>

            <div class="col-lg-9">
                <div class="row">
                    @foreach($products as $product)
                        <x-user.product-card>
                            <x-slot name="image">{{$product->image}}</x-slot>
                            <x-slot name="name">{{$product->name}}</x-slot>
                            <x-slot name="routeId">{{$product->id}}</x-slot>
                        </x-user.product-card>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</x-user.layout>
