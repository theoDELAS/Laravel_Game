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
                        <h2 class="text-center">{{ $item->name }}</h2>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item text-center"><i class="fas fa-times fa-xs ml-3"></i> {{ $item->quantite }}</li>
                            <li class="list-group-item text-center"><i class="fas fa-heart fa-lg mr-3"></i> {{ $item->hp }}</li>
                            <li class="list-group-item text-center"><i class="fas fa-gavel fa-lg mr-3"></i>  {{ $item->degats }}</li>
                            <li class="list-group-item text-center"><i class="fas fa-shield-alt fa-lg mr-3"></i> {{ $item->defense }}</li>
                            <li class="list-group-item text-center"><i class="fas fa-walking fa-lg mr-3"></i> {{ $item->esquive }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
