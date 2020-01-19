@extends ('layouts.appGame')

@section('content')

    <div class="container text-justify lead">
        <h1 class="text-center mb-5">Présentation gameplay du site dont vous êtes le héros</h1>
        <div>
            Dans chacune des aventures que vous parcourerez, tous les choix que vous ferez auront une influence sur la suite de votre histoire et le déroulement des événements.
            <br>
            Vous serez amené à rencontrer différentes icônes:
            <br>
                <ul>
                    <li>
                        <i class="fas fa-book fa-2x mr-2 my-2"></i>
                        Cette icône représente un changement de page.
                    </li>
                    <li>
                        <i class="fas fa-gavel fa-2x mr-2 my-2"></i>
                        Cette icône représente la possibilité de récupérer une arme.
                    </li>
                    <li>
                        <i class="fas fa-gift fa-2x mr-2 my-2"></i>
                        Cette icône représente la possibilité de récupérer un équipement.
                    </li>
                </ul>
            <br>
            Il vous faudra cliquer dessus afin d'intéragir avec.
            <br>
            Concernant les combats, ils se feront automatiquement, en se basant sur vos stats et celles de votre ennemi et se dérouleront en tour par tour.
        </div>
    <br>
    </div>
        <a href="{{ route('introduction') }}" class="btn btn-primary btn-block my-4 mx-auto">Commencer votre aventure</a>
@endsection
