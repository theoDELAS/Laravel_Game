@extends('layouts.app')

@section('content')

    <div class="container">
        <a href="{{ route('admin.users.index') }}">
            <button type="button" class="btn btn-primary">Retour</button>
        </a>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card mb-3">
                    <div class="card-header">
                        <h2 class="text-center">{{ $classe->name }}</h2>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item text-center"><i class="fas fa-heart fa-lg mr-3"></i> {{ $classe->hp }}</li>
                            <li class="list-group-item text-center"><i class="fas fa-gavel fa-lg mr-3"></i>  {{ $classe->degats }}</li>
                            <li class="list-group-item text-center"><i class="fas fa-shield-alt fa-lg mr-3"></i> {{ $classe->defense }}</li>
                            <li class="list-group-item text-center"><i class="fas fa-walking fa-lg mr-3"></i> {{ $classe->esquive }}</li>
                            <li class="list-group-item text-center"><i class="fas fa-book-open fa-lg mr-3"></i><br> {{ $classe->histoire }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 lead">
                <div class="card mb-3">
                    <div class="card-header">
                        <h2 class="text-center">Liste des {{ $classe->name }}s</h2>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @foreach($classe->personnages as $personnages)
                                <li class="list-group-item text-center">{{ $personnages->pseudo }} créé par : <a href="{{ route('admin.users.show', $personnages->user()->get()->pluck('id')[0]) }}">{{ $personnages->user()->get()->pluck('name')[0] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
