@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-5">{{ $user->name }}</h1>
    <div class="row justify-content-center">
        @foreach($user->$personnages as $personnage )
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">{{ $personnage->pseudo }}</h2>
                </div>

                <div class="card-body">
                    You are logged in!
                </div>

                <div class="card-footer">
                    <button class="btn btn-primary btn-block" type="button">Sélectionner</button>
                </div>
            </div>
        </div>
        @endforeach


    </div>
</div>
@endsection
