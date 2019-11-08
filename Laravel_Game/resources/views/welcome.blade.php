@extends ('layout')

@section ('h1')
    Laravel Game
@endsection

@section ('menu')
    <div id="menu">
        <ul>
            <li>
                <a href="/users/create" accesskey="1" title="">Inscription</a>
            </li>
            <li>
                <a href="/connexion" accesskey="2" title="">Connexion</a>
            </li>
        </ul>
    </div>
@endsection
