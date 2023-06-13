@extends('layouts.entete2')
@section('content')
    <div id="mains" class="container mt-5">
        <div class="row mt-5">
            <div class="col-lg-3 col-md-2 col-sm-1"></div>
            <div class="col-lg-6 col-md-8 col-sm-10">
                <div class="card-body">
                    <form class="p-4 p-md-8 border rounded-3 bg-light" action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="container text-center mb-3">
                            <div class="row align-items-start">
                                <div class="col"></div>
                                <div class="col">
                                    <img class="rounded-3" src="{{ asset('assets/images/Technologie_03@2x.png') }}" width="120px" height="120px" alt="" srcset="">
                                </div>
                                <div class="col"></div>
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            <input class="form-control" type="email" id="email" name="email" value="{{old('email')}}">
                            <label for="floatingInput">Adresse e-mail</label>
                            @error("email")
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" type="password" id="password" name="password">
                            <label for="floatingPassword">Mot de passe</label>
                            @error("password")
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <button class="w-100 btn btn-lg btn-primary" type="submit">Se connecter</button>
                            <hr class="my-4">
                            <small class="text-muted">En vous connectant vous acceptez les conditions d'utilisation</small>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-3 col-md-2 col-sm-1"></div>
        </div>
    </div>
@endsection
