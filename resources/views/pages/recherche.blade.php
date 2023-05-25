@extends('layouts.entete')
@section('content')
<div id="mains" class="mt-5">
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
                @foreach ($result as $liste)
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
</div>
@endsection
