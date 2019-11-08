@extends ('layout')

@section('h1')
    Connnexion
@endsection

@section('form')
    <form>
        <div class="form-group">
            <label for="email">Identifiant</label>
            <input type="email" class="form-control" id="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" id="password" placeholder="Mot de Passe">
        </div>
        <button type="submit" class="btn btn-primary">Connexion</button>
    </form>
@endsection
