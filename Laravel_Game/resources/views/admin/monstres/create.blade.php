@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('admin.users.index') }}">
            <button type="button" class="btn btn-primary">Retour</button>
        </a>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header h3 text-center">Créer un monstre</div>

                    <div class="card-body">
                        <form action="{{ route('admin.monstres.store') }}" method="POST">
                            @csrf
                            <ul class="list-group list-group-flush" style="list-style-type:none">
                                <li class="list-group-item text-center">
                                    <input id="name" name="name" class="form-control text-center mx-auto w-50" value="{{ old('name') }}" placeholder="Nom">
                                </li>
                                <li class="list-group-item text-center">
                                    <i class="fas fa-heart mr-2"></i>
                                    <input id="hp" name="hp" type="number" class="form-control text-center mx-auto w-25 d-inline" value="{{ old('hp') }}" placeholder="Vie">
                                </li>
                                <li class="list-group-item text-center">
                                    <i class="fas fa-gavel fa-lg mr-2"></i>
                                    <input id="degats" name="degats" type="number" class="form-control text-center mx-auto w-25 d-inline" value="{{ old('degats') }}" placeholder="Dégats">
                                </li>
                                <li class="list-group-item text-center">
                                    <i class="fas fa-shield-alt fa-lg mr-2"></i>
                                    <input id="defense" name="defense" type="number" class="form-control text-center mx-auto w-25 d-inline" value="{{ old('defense') }}" placeholder="Défense">
                                </li>
                                <li class="list-group-item text-center">
                                    <i class="fas fa-walking fa-lg mr-3"></i>
                                    <input id="esquive" name="esquive" type="number" class="form-control text-center mx-auto w-25 d-inline" value="{{ old('esquive') }}" placeholder="Esquive">
                                </li>
                            </ul>
                            <button type="submit" class="btn btn-success btn-block mt-3 mx-auto">
                                Créer
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
