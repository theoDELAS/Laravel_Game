@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('admin.users.index') }}">
            <button type="button" class="btn btn-primary">Retour</button>
        </a>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header h3 text-center">Modifier l'item <span class="font-weight-bold">{{ $item->name }}</span></div>

                    <div class="card-body">
                        <form action="{{ route('admin.items.update', $item) }}" method="POST">
                            <ul class="list-group list-group-flush" style="list-style-type:none">
                                <li class="list-group-item text-center">
                                    <input id="name" name="name" class="form-control text-center mx-auto w-50" value="{{ $item->name }}">
                                </li>
                                <li class="list-group-item text-center">
                                    <i class="fas fa-times fa-xs ml-3"></i>
                                    <input id="quantite" name="quantite" type="number" class="form-control text-center mx-auto w-25 d-inline" value="{{ $item->quantite }}">
                                </li>
                                <li class="list-group-item text-center">
                                    <i class="fas fa-heart fa-lg mr-2"></i>
                                    <input id="hp" name="hp" type="number" class="form-control text-center mx-auto w-25 d-inline" value="{{ $item->hp }}">
                                </li>
                                <li class="list-group-item text-center">
                                    <i class="fas fa-gavel fa-lg mr-2"></i>
                                    <input id="degats" name="degats" type="number" class="form-control text-center mx-auto w-25 d-inline" value="{{ $item->degats }}">
                                </li>
                                <li class="list-group-item text-center">
                                    <i class="fas fa-shield-alt fa-lg mr-2"></i>
                                    <input id="defense" name="defense" type="number" class="form-control text-center mx-auto w-25 d-inline" value="{{ $item->defense }}">
                                </li>
                                <li class="list-group-item text-center">
                                    <i class="fas fa-walking fa-lg mr-3"></i>
                                    <input id="esquive" name="esquive" type="number" class="form-control text-center mx-auto w-25 d-inline" value="{{ $item->esquive }}">
                                </li>
                            </ul>
                            @csrf
                            {{ method_field('PUT') }}
                            <button type="submit" class="btn btn-warning btn-block mt-3 mx-auto font-weight-bold">
                                Modifier
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
