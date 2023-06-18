@extends('layouts.entete')
@section('content')
    <main id="mainss" class="mt-5">
        <div class="mt-5">
            <a class="btn btn-primary" href="{{ url('/accueil') }}">Actualiser</a>
            <div class="card text-center mt-1">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <form action="{{ route('recherchernom') }}" method="GET">
                                @csrf
                                <div class="input-group ">
                                    <input id="nom" name="nom" type="search" class="form-control" placeholder="Rechercher un sénateur" aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn btn-primary" id="button-addon2"><i class="bi bi-search"></i></button>
                                </div>
                           </form>
                        </div>
                        <div class="col-lg-3"></div>
                        <form action="{{ route('dodo') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-2">
                                    <select class="form-select" name="province" id="province-pp" aria-label=".form-select-sm example">
                                        <option value="0">Province</option>
                                        @foreach ($province as $fonctions )
                                        <option value="{{$fonctions->nom_prov}}">{{ $fonctions->nom_prov }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <select class="form-select" name="circonscription" id="circons-pp" aria-label=".form-select-sm example">

                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <select class="form-select" name="sigle" aria-label=".form-select-sm example">
                                        <option value="0">Sigle</option>
                                        @foreach ($sigle as $fonctions )
                                        <option value="{{ $fonctions->nom_sigle }}">{{ $fonctions->nom_sigle }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <select class="form-select" name="sexe" aria-label=".form-select-sm example">
                                        <option value="0">Sexe</option>
                                        @foreach ($sexe as $fonctions )
                                        <option value="{{ $fonctions->sexe }}">{{ $fonctions->sexe }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <button class="btn btn-primary w-100" id="valider">Valider</button>
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
                                <th scope="row">{{ $liste->uti_id}}</th>
                                <td>{{ $liste->nom_prov }}</td>
                                <td>{{ $liste->nom_circons }}</td>
                                <td>{{ $liste->nom_sigle }}</td>
                                <td>{{ $liste->voix_liste }}</td>
                                <td>{{ $liste->nom_uti }}</td>
                                <td>{{ $liste->postnom_uti }}</td>
                                <td>{{ $liste->prenom_uti }}</td>
                                <td>{{ $liste->sexe }}</td>
                                <td>{{ $liste->nom_fonc }}</td>
                                <td>{{ $liste->age }}</td>
                                <td>{{ $liste->voix_candidat }}</td>
                            </tr>

                            @endforeach
                        </tbody>

                    </table>
                    <div>

                    </div>
                </div>
                <div class="container-fluid">
                    {{ $resultfomction->withQueryString()->links() }}
                </div>
            </div>

        </div>
    </main>
@endsection
<script src=""></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#provinc-dd').change(function(event){
            var idCountry = this.value;
            $('#circons-dd').html('');

            $.ajax({
                url: "api/fetch-state",
                type: 'POST',
                dataType: "json",
                data: {province_id: idCountry,_token:"{{ csrf_token() }}"},
                success:function(response){
                    $('#circons-dd').html('<option value="">Select Circonscription</option>');
                    $.each(response.circonscription,function(index, val){
                    $('#circons-dd').append('<option value="'+val.id+'"> '+val.nom+' </option>')
                    });
                }
            })
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#province-pp').change(function(event){
            var nom_prov = this.value;
            //alert(idProvince);
            $('#circons-pp').html('');
            $.ajax({
                url: "api/fetch-province",
                type: 'POST',
                dataType: "json",
                data: {
                    nom_prov: nom_prov,
                    _token:"{{ csrf_token() }}"
                },
                success:function(response){
                    $('#circons-pp').append('<option value="0">Circonscription</option>');
                    $.each(response.circons,function(index, val){
                        $('#circons-pp').append('<option value="'+val.nom_circons+'" > '+val.nom_circons+'</option>')
                    });
                }
            })
        })
    })
</script>


