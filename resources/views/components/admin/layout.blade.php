<!DOCTYPE html>
<html lang="en">

<head>
    <title>Flat Able - Premium Admin Template by Phoenixcoded</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Yusuf Yildiz" />
    <script src="https://kit.fontawesome.com/e0462e4fee.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/template/style.css')}}">
</head>
<body class="">
    <nav class="pcoded-navbar  ">
        <div class="navbar-wrapper  ">
            <div class="navbar-content scroll-div " >
                <div class="">
                    <div class="main-menu-header">
                        <div class="user-details">
                            <span>{{Session::get('admin')->name}}</span>
                        </div>
                    </div>
                </div>
                <ul class="nav pcoded-inner-navbar ">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Navigatie</label>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('home')}}" class="nav-link ">
                            <span class="pcoded-micon"><i class="fa-solid fa-globe"></i></span>
                            <span class="pcoded-mtext">Website</span>
                        </a>
                    </li>
                    <li class="nav-item {{Route::is('admin.dashboard') ? 'active' : ''}}">
                        <a href="{{route('admin.dashboard')}}" class="nav-link">
                            <span class="pcoded-micon"><i class="fa-solid fa-house"></i></span>
                            <span class="pcoded-mtext">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item {{Route::is('admin.productcategories.index')
                                             || Route::is('admin.productcategories.edit')
                                             || Route::is('admin.products.edit') ? 'active' : ''}}">
                        <a href="{{route('admin.productcategories.index')}}" class="nav-link">
                            <span class="pcoded-micon"><i class="fa-solid fa-bottle-water"></i></span>
                            <span class="pcoded-mtext">Categorieën</span>
                        </a>
                    </li>
                    <li class="nav-item {{Route::is('admin.orders.index') ? 'active' : ''}}">
                        <a href="{{route('admin.orders.index')}}" class="nav-link">
                            <span class="pcoded-micon"><i class="fa-solid fa-cart-plus"></i></span>
                            <span class="pcoded-mtext">Bestellingen</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="pcoded-main-container">
        <div class="pcoded-content">
            <div class="m-header d-lg-none d-block">
                <a class="mobile-menu" id="mobile-collapse" href="#!"><i class="fa-solid fa-bars"></i></a>
            </div>
            <h3>{{$title ?? ''}}</h3>
            <hr>
            @isset($backRoute)
                <a href="{{$backRoute}}" class="text-primary"><i class="fa-solid fa-chevron-left mb-4"></i> Terug</a>
            @endisset
            @if($message = Session::get('success'))
                <div class="alert alert-primary">
                    <h3 class="text-primary">{{$message}}</h3>
                </div>
            @endif
            @isset($modalId)
                <a href="#" data-target="#{{$modalId}}" data-toggle="modal" class="btn btn-outline-primary mb-4">Nieuwe categorie</a>
            @endisset
            {{$slot}}
        </div>
    </div>


    <div class="modal fade" id="{{$modalId ?? ''}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="{{$route ?? ''}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{$modalTitle ?? ''}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{$modalSlot ?? ''}}
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Opslaan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="{{asset('js/template/vendor-all.js')}}"></script>
    <script src="{{asset('js/template/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/template/pcoded.js')}}"></script>
    <script src="{{asset('js/template/dashboard-main.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('js/admin/script.js')}}"></script>
</body>

</html>
