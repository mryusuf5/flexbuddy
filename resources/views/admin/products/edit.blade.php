<x-admin.layout>
    <x-slot name="title">{{$product->name}}</x-slot>
    <x-slot name="backRoute">{{route('admin.productcategories.edit', $product->productcategories->id)}}</x-slot>
    <form action="{{route('admin.products.update', $product->id)}}" method="post" id="editForm" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <input type="text" name="name" value="{{$product->name}}" class="form-control" placeholder="Naam">
        </div>

        <div class="form-group">
            <img height="150" src="{{asset("img/product/" . $product->image)}}" alt="">
            <input type="file" class="form-control mt-2" name="image">
        </div>

        <div class="form-group">
            <div id="descriptionEditor">
                {!! $product->description !!}
            </div>
            <textarea hidden id="description" name="description" cols="30" rows="10" class="form-control">
                {{$product->description}}
            </textarea>
        </div>
        <input type="submit" class="btn btn-primary" value="Opslaan">
        <button id="test" hidden>asdasd</button>
    </form>

    <hr>
    <div class="d-flex flex-column gap-2">
        <h3>Product foto's:</h3>
        <div class="d-flex">
            @foreach($product->productimages as $image)
                <form action="{{route("admin.productimages.destroy", $image->id)}}" method="post" class="d-flex flex-column confirmForm">
                    @csrf
                    @method("DELETE")
                    <img height="150" style="object-fit: contain" src="{{asset("img/product/" . $image->image)}}" alt="">
                    <input type="submit" value="X" class="btn btn-danger">
                </form>
            @endforeach
        </div>
    </div>
    <form action="{{route("admin.productimages.store")}}" class="mt-2" method="post" enctype="multipart/form-data">
        @csrf
        @method("POST")
        <input type="text" hidden value="{{$product->id}}" name="product_id">
        <div class="form-group">
            <input type="file" name="image" class="form-control">
        </div>
        <input type="submit" value="Opslaan" class="btn btn-primary">
    </form>

    <hr>

    <div class="d-flex flex-column gap-2">
        <h3>Product opties:</h3>
        @foreach($product->productoptions as $option)
            <form action="{{route("admin.productoptions.destroy", $option->id)}}" method="post" class="confirmForm">
                @csrf
                @method("DELETE")
                <p>
                    {{$option->name}} &euro; {{number_format($option->price, 2, ",", ".")}}
                    <input type="submit" value="X" class="btn btn-danger">
                </p>
            </form>
        @endforeach
    </div>
    <form action="{{route("admin.productoptions.store")}}" method="post">
        @csrf
        @method("POST")
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Naam">
        </div>
        <div class="form-group">
            <input type="text" name="price" class="form-control" placeholder="Prijs">
        </div>
        <input type="text" hidden name="product_id" value="{{$product->id}}">
        <input type="submit" class="btn btn-primary" value="Opslaan">
    </form>

    @section("scripts")
        <script>
            var editor = new Quill('#descriptionEditor', {
                theme: "snow"
            });

            document.querySelector("#test").addEventListener("click", (e) => {
                e.preventDefault();
                console.log(editor.root.innerHTML);
            })

            document.querySelector("#editForm").addEventListener("submit", () => {
                document.querySelector("#description").value = editor.root.innerHTML;
            })
        </script>
    @endsection
</x-admin.layout>
