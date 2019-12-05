@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center mb-5">{{ $user->name }}</h1>
        <a href="{{ route('personnage.create') }}" class="btn btn-success btn-block mx-auto my-5"><i class="fas fa-plus"></i></a>
        <div class="row justify-content-center">
            @foreach($user->personnages as $personnage )
                @foreach($personnage->classe as $classe)
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h2 class="text-center">{{ $personnage->pseudo }}</h2>
                            </div>
                            <div class="card-body">
                                <h3 class="text-center">{{ $classe->name }}</h3>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item text-center"><i class="fas fa-heart"></i> {{ $classe->hp_max }}</li>
                                    <li class="list-group-item text-center"><i class="fas fa-gavel"></i>  {{ $classe->degat_max }}</li>
                                    <li class="list-group-item text-center"><i class="fas fa-shield-alt"></i> {{ $classe->defense_max }}</li>
                                    <li class="list-group-item text-center"><i class="fas fa-walking"></i> {{ $classe->esquive_max }}</li>
                                </ul>
                            </div>

                            <div class="card-footer">
                                <form  class="d-inline" action="{{ route('personnage.destroy', $personnage->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-primary btn-block" type="button">Sélectionner</button>
                                    <button type="submit" onclick="return myFunction();" class="btn btn-danger btn-block">Supprimer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach




        </div>
    </div>
    <script>
        function myFunction() {
            if(!confirm("Voulez-vous vraiment supprimer ce personnage?"))
                event.preventDefault();
        }
    </script>
@endsection
