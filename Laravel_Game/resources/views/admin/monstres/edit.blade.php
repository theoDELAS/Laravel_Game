@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('admin.users.index') }}">
            <button type="button" class="btn btn-primary">Retour</button>
        </a>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header h3 text-center">Modifier le monstre <span class="font-weight-bold">{{ $monstre->name }}</span></div>

                    <div class="card-body">
                        <form action="{{ route('admin.monstres.update', $monstre) }}" method="POST">
                            <ul class="list-group list-group-flush" style="list-style-type:none">
                                <li class="list-group-item text-center">
                                    <input id="name" name="name" class="form-control text-center mx-auto w-50" value="{{ $monstre->name }}">
                                </li>
                                <li class="list-group-item text-center">
                                    <i class="fas fa-heart fa-lg mr-2"></i>
                                    <input id="hp" name="hp" type="number" class="form-control text-center mx-auto w-25 d-inline" value="{{ $monstre->hp }}">
                                </li>
                                <li class="list-group-item text-center">
                                    <i class="fas fa-gavel fa-lg mr-2"></i>
                                    <input id="degats" name="degats" type="number" class="form-control text-center mx-auto w-25 d-inline" value="{{ $monstre->degats }}">
                                </li>
                                <li class="list-group-item text-center">
                                    <i class="fas fa-shield-alt fa-lg mr-2"></i>
                                    <input id="defense" name="defense" type="number" class="form-control text-center mx-auto w-25 d-inline" value="{{ $monstre->defense }}">
                                </li>
                                <li class="list-group-item text-center">
                                    <i class="fas fa-walking fa-lg mr-3"></i>
                                    <input id="esquive" name="esquive" type="number" class="form-control text-center mx-auto w-25 d-inline" value="{{ $monstre->esquive }}">
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
