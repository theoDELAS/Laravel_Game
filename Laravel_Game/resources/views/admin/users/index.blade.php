@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header h3 text-center">
                        Utilisateurs
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">#</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach($users as $user)
                                    <tr>
                                        <th scope="row">{{ $user->id }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
                                        <td>
                                            @can('admin-users')
                                                <a href="{{ route('admin.users.show', $user->id) }}">
                                                    <button type="button" class="btn btn-primary">Voir</button>
                                                </a>
                                                <a href="{{ route('admin.users.edit', $user->id) }}">
                                                    <button type="button" class="btn btn-warning">Modifier</button>
                                                </a>
                                                <form  class="d-inline" action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                                    @csrf
                                                    {{ method_field('DELETE') }}
                                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header h3 text-center">
                        Classes
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">#</th>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                            @foreach($classes as $classe)
                                <tr>
                                    <th scope="row">{{ $classe->id }}</th>
                                    <td>{{ $classe->name }}</td>
                                    <td>
                                        @can('admin-users')
                                            <a href="{{ route('admin.classe.show', $classe->id) }}">
                                                <button type="button" class="btn btn-primary">Voir</button>
                                            </a>
                                            <a href="{{ route('admin.classe.edit', $classe->id) }}">
                                                <button type="button" class="btn btn-warning">Modifier</button>
                                            </a>
                                            <form  class="d-inline" action="{{ route('admin.classe.destroy', $classe) }}" method="POST">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
