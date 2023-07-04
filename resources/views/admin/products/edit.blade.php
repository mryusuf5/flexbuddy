<x-admin.layout>
    <x-slot name="title">{{$product->name}}</x-slot>
    <x-slot name="backRoute">{{route('admin.productcategories.edit', $product->productcategories->id)}}</x-slot>
    <form action="{{route('admin.products.update', $product->id)}}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <input type="text" name="name" value="{{$product->name}}" class="form-control" placeholder="Naam">
        </div>
        <div class="form-group">
            <input type="text" name="price" placeholder="Prijs" class="form-control" value="{{$product->price}}">
        </div>
        <div class="form-group">
            <textarea name="description" cols="30" rows="10" class="form-control" placeholder="Beschrijving">{{$product->description}}</textarea>
        </div>
        <input type="submit" class="btn btn-primary" value="Opslaan">
    </form>
</x-admin.layout>
