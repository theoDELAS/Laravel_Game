@extends ('layout')

@section('h1')
    Inscription
@endsection

@section('form')
    <form method="POST" action="/users">
        @csrf

        <div class="form-group">
            <label for="email">Adresse Email</label>
            <input type="email" class="form-control @error('email') is-danger @enderror" id="email" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="password">Mot de Passe</label>
            <input type="password" class="form-control @error('password') is-danger @enderror" id="password" name="password" placeholder="Mot de Passe">
        </div>
        <div class="form-group">
            <label for="pseudo">Pseudo</label>
            <input type="pseudo" class="form-control @error('pseudo') is-danger @enderror" id="pseudo" name="pseudo" placeholder="Pseudo">
        </div>

        <div class="field is-grouped">
            <div class="control">
                <button class="button is-link" type="submit">Submit</button>
            </div>
        </div>
    </form>
@endsection
