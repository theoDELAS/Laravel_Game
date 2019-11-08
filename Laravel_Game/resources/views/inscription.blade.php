@extends ('layout')

@section('h1')
    Inscription
@endsection

@section('form')
    <form>
        <div class="form-group">
            <label for="email">Adresse Email</label>
            <input type="email" class="form-control" id="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="identifiant">Identifiant</label>
            <input type="text" class="form-control" id="identifiant" placeholder="Identifiant">
        </div>
        <div class="form-group">
            <label for="password">Mot de Passe</label>
            <input type="password" class="form-control" id="password" placeholder="Mot de Passe">
        </div>

        <a href="/miseEnPlace" title="">Inscription</a>
    </form>
@endsection
