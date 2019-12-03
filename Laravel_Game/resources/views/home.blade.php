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
                    <h4 class="text-center">{{ $classe->name }}</h4>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-center"><i class="fas fa-heart fa-lg pr-3"></i> {{ $classe->hp_max }}</li>
                        <li class="list-group-item text-center"><i class="fas fa-gavel fa-lg pr-3"></i>  {{ $classe->degat_max }}</li>
                        <li class="list-group-item text-center"><i class="fas fa-shield-alt fa-lg pr-3"></i> {{ $classe->defense_max }}</li>
                        <li class="list-group-item text-center"><i class="fas fa-walking fa-lg pr-3"></i> {{ $classe->esquive_max }}</li>
                    </ul>
                </div>
            <div class="card-footer">


                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title h2" id="exampleModalCenterTitle">Suppression de personnage</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body lead">
                                    Voulez-vous vraiment supprimer ce personnage ?
                                </div>
                                <div class="modal-footer">
                                    <form  class="d-inline" action="{{ route('personnage.destroy', $personnage->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-block">Supprimer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#exampleModalCenter">
                            Supprimer
                        </button>
                        <button class="btn btn-primary btn-block" type="button">Sélectionner</button>
                </div>
            </div>
        </div>
            @endforeach
        @endforeach
    </div>
</div>

@endsection
