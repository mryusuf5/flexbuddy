<x-user.layout>
    <div class="container my-5">
        <form action="{{route('orders.store')}}" method="post" class="row g-4 justify-content-center">
            @csrf
            @method('POST')
            <div class="col-lg-10 col-12 alert alert-dark">
                <h4>Controleer of u alle velden ingevuld heeft</h4>
            </div>

            <div class="form-group col-lg-5 col-12">
                <input type="text" value="{{@old('firstname')}}" name="firstname" placeholder="Voornaam" class="form-control">
                @error('firstname')<span class="text-danger">{{$message}}</span>@enderror
            </div>

            <div class="form-group col-lg-5 col-12">
                <input type="text" value="{{@old('lastname')}}" name="lastname" placeholder="Achternaam" class="form-control">
                @error('lastname')<span class="text-danger">{{$message}}</span>@enderror
            </div>

            <div class="form-group col-lg-5 col-12">
                <input type="email" value="{{@old('email')}}" name="email" placeholder="Email adres" class="form-control">
                @error('email')<span class="text-danger">{{$message}}</span>@enderror
            </div>

            <div class="form-group col-lg-5 col-12">
                <input type="email" name="confirm_email" placeholder="Email adres herhalen" class="form-control">
                @error('confirm_email')<span class="text-danger">{{$message}}</span>@enderror
            </div>

            <div class="form-group col-lg-5 col-12">
                <input type="number" value="{{@old('phone_number')}}" name="phone_number" placeholder="Telefoonnummer" class="form-control">
                @error('phone_number')<span class="text-danger">{{$message}}</span>@enderror
            </div>

            <div class="form-group col-lg-5 col-12">
                <select name="country" disabled class="form-select">
                    <option selected value="Nederland">Nederland</option>
                </select>
                @error('country')<span class="text-danger">{{$message}}</span>@enderror
            </div>

            <div class="form-group col-lg-5 col-12">
                <input type="text" value="{{@old('address')}}" name="address" placeholder="Adres" class="form-control">
                @error('address')<span class="text-danger">{{$message}}</span>@enderror
            </div>

            <div class="form-group col-lg-5 col-12">
                <input type="text" value="{{@old('house_number')}}" name="house_number" placeholder="Huisnummer" class="form-control">
                @error('house_number')<span class="text-danger">{{$message}}</span>@enderror
            </div>

            <div class="form-group col-lg-5 col-12">
                <input type="text" value="{{@old('zipcode')}}" name="zipcode" placeholder="Postcode" class="form-control">
                @error('zipcode')<span class="text-danger">{{$message}}</span>@enderror
            </div>

            <div class="form-group col-lg-5 col-12">
                <input type="text" value="{{@old('city')}}" name="city" placeholder="Stad" class="form-control">
                @error('city')<span class="text-danger">{{$message}}</span>@enderror
            </div>

            <div class="form-group col-md-5 col-10">
                <input type="checkbox" class="form-check-input" name="over18">
                <label class="form-check-label" for="">Ik ben 18+, ik ga akkoord met de <a href="{{route("disclaimer")}}">Disclaimer</a> en de <a href="{{route("terms")}}">Algemene voorwaarden.</a></label>
                <p class="text-danger">@error("over18"){{$message}}@enderror</p>
            </div>

            <div class="form-group col-md-5 col-10">
                <label for="">Betalen met ideal:</label>
                <select name="bank" id="" class="form-control">
                    {{readfile("https://transaction.digiwallet.nl/ideal/getissuers?ver=4&format=html")}}
                </select>
            </div>

            <div class="form-group col-lg-5 col-12">
                <input type="submit" class="btn btn-success w-100" value="Checkout">
            </div>
        </form>
    </div>
</x-user.layout>
