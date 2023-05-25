    @extends('layouts.entete')
@section('content')
    <main id="mainss" class="mt-5">
        <div class="mt-5">
            <a class="btn btn-primary" href="{{ url('/accueil') }}">Actualiser</a>
            <div class="card text-center mt-1">
                <div class="card-header">
                    <div class="row">
                        <form action="{{ route('dodo') }}" method="POST">
                            @csrf
                            <div class="row">
                            <div class="col-lg-2">
                                <select class="form-select " name="fonction" aria-label=".form-select-sm example">
                                    <option value="0">Fonction</option>
                                    @foreach ($fonction as $fonctions )
                                       <option value="{{ $fonctions->fonction }}">{{ $fonctions->fonction }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <select class="form-select " name="province" aria-label=".form-select-sm example">
                                    <option value="0">Province</option>
                                    @foreach ($province as $fonctions )
                                       <option value="{{ $fonctions->province }}">{{ $fonctions->province }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <select class="form-select " name="circonscription" aria-label=".form-select-sm example">
                                    <option value="0">Circonscription</option>
                                    @foreach ($circonscription as $fonctions )
                                       <option value="{{ $fonctions->circonscription }}">{{ $fonctions->circonscription }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <select class="form-select " name="sigle" aria-label=".form-select-sm example">
                                    <option value="0">Sigle</option>
                                    @foreach ($sigle as $fonctions )
                                       <option value="{{ $fonctions->sigle }}">{{ $fonctions->sigle }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <select class="form-select " name="sexe" aria-label=".form-select-sm example">
                                    <option value="0">Sexe</option>
                                    @foreach ($sexe as $fonctions )
                                       <option value="{{ $fonctions->sexe }}">{{ $fonctions->sexe }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-2">
                                <button class="btn btn-primary w-100">Valider</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordeed">
                        <thead>
                            <tr>
                                <th scope="col">N°</th>
                                <th scope="col">PROVINCE</th>
                                <th scope="col">CIRCONSCRIPTION</th>
                                <th scope="col">SIGLE</th>
                                <th scope="col">VOIX LISTE</th>
                                <th scope="col">NOM</th>
                                <th scope="col">POSTNOM</th>
                                <th scope="col">PRENOM</th>
                                <th scope="col">SEXE</th>
                                <th scope="col">FONCTION</th>
                                <th scope="col">AGE</th>
                                <th scope="col">VOIX CANDIDAT</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($resultfomction as $liste)
                            <tr>
                                <th scope="row">{{ $liste->id}}</th>
                                <td>{{ $liste->province }}</td>
                                <td>{{ $liste->circonscription }}</td>
                                <td>{{ $liste->sigle }}</td>
                                <td>{{ $liste->voix_liste }}</td>
                                <td>{{ $liste->nom }}</td>
                                <td>{{ $liste->postnom }}</td>
                                <td>{{ $liste->prenom }}</td>
                                <td>{{ $liste->sexe }}</td>
                                <td>{{ $liste->fonction }}</td>
                                <td>{{ $liste->age }}</td>
                                <td>{{ $liste->voix_candidat }}</td>
                            </tr>

                            @endforeach
                        </tbody>

                    </table>
                    <div>

                    </div>
                </div>
                {{ $resultfomction->withQueryString()->links() }}
            </div>

        </div>
    </main>
@endsection
<!--
     <div class="col-lg-6">
                    <form class="row g-3" action="{{ url('/search') }}">
                        <div class="col-auto col-md-2">
                            <a class="btn btn-primary mb-3" href="{{ url('/accueil') }}">Actualiser</a>
                        </div>
                        <div class="col-auto col-md-8">
                            <input name="query" type="search" class="form-control" id="inputRecherche" placeholder="Recherchez un député">
                        </div>
                        <div class="col-auto col-md-2">
                            <button type="submit" class="btn btn-primary mb-3">Rechercher</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-3"></div>
-->
