<x-admin.layout>
    <x-slot name="title">Product categorieën</x-slot>
    <x-slot name="modalId">newCategorie</x-slot>
    <x-slot name="modalTitle">Nieuwe categorie</x-slot>
    <x-slot name="route">{{route('admin.productcategories.store')}}</x-slot>
    <x-slot name="modalSlot">
        <h4 class="text-dark">Velden met een <span class="text-danger">*</span> zijn verplicht</h4>
        <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Naam*">
        </div>
        <div class="form-group">
            <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Beschrijving"></textarea>
        </div>
        <div class="form-group">
            <input type="file" class="form-control" name="image">
        </div>
    </x-slot>

    <div class="row justify-content-md-start justify-content-center">
        @foreach($productcategories as $productcategory)
            <div class="card col-md-3 col-10 mx-2 d-flex flex-column align-items-center justify-content-between w-100" style="height: 100%">
                <img class="card-img-top w-50" src="{{asset('img/category/' . $productcategory->image)}}">
                <div class="card-body d-flex flex-column justify-content-center w-100">
                    <h5 class="card-title">{{$productcategory->name}}</h5>
                    <p class="card-text">{{Str::limit($productcategory->description, 25)}}</p>
                    <a href="{{route('admin.productcategories.edit', $productcategory->id)}}" class="btn btn-primary">Aanpassen</a>
                </div>
            </div>
        @endforeach
    </div>
</x-admin.layout>
