@props(['productcategories' => []])

<ul class="list-unstyled templatemo-accordion">
    @foreach($productcategories as $category)
        <li class="pb-3">
            <a class="collapsed d-flex justify-content-between h3 text-decoration-none
                            @if(request()->route('id') == $category->id) text-success @endif"
               href="{{route('productcategories.show', $category->id)}}">
                {{$category->name}}
            </a>
        </li>
    @endforeach
</ul>
