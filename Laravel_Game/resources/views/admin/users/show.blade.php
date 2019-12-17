@extends('layouts.app')

@section('content')

    <div class="container">
        <a href="{{ route('admin.users.index') }}">
            <button type="button" class="btn btn-primary">Retour</button>
        </a>
        <h1 class="text-center mb-5">{{ $user->name }}</h1>
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
                                    <li class="list-group-item text-center"><i class="fas fa-heart"></i> {{ $personnage->hp_current }}/{{ $personnage->hp_max }}</li>
                                    <li class="list-group-item text-center"><i class="fas fa-gavel"></i>  {{ $personnage->degats_current }}</li>
                                    <li class="list-group-item text-center"><i class="fas fa-shield-alt"></i> {{ $personnage->defense_current }}</li>
                                    <li class="list-group-item text-center"><i class="fas fa-walking"></i> {{ $personnage->esquive_current }}</li>
                                </ul>
                            </div>

                            <div class="card-footer">
                                <form  class="d-inline" action="{{ route('personnage.destroy', $personnage->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return myFunction();" class="btn btn-danger btn-block">Supprimer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach




        </div>
    </div>
@endsection
