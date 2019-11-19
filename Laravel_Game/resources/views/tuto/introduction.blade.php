@extends ('layouts.app')


@section('content')
    <div class="container">
        <h1 class="text-center">Introduction</h1>
        <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis commodi consequatur deleniti distinctio
            dolore eaque eos est, facere in ipsa iusto mollitia, numquam officiis porro quasi recusandae similique ullam
            voluptates.
        </div>
        <div>Alias blanditiis deserunt dolorem et fuga illo nesciunt, veritatis voluptatibus! Est fugiat nulla porro
            praesentium quisquam! Ad nisi pariatur porro quae quam sunt veniam. Et maiores quisquam repellat rerum ut!
        </div>
        <div>Aliquid cumque pariatur recusandae velit, veniam voluptatum. A assumenda aut autem debitis eius est harum
            itaque iusto magnam magni molestias provident quia quisquam recusandae repellendus, temporibus veniam veritatis
            vero voluptatum.
        </div>
        <div>Autem consectetur ipsam mollitia nam, odio officiis quam. Aliquam autem eos illo illum non perferendis porro
            possimus quam, quasi voluptates. Blanditiis culpa, cumque dolor eius enim et nostrum quo quod.
        </div>
        <div>Facilis id maxime omnis provident voluptates! Aliquid dolore dolorem in iure laborum minus nobis sapiente unde
            veritatis, vitae. Aspernatur culpa cumque eligendi neque nobis obcaecati quae quas quis rerum tenetur!
        </div>
        <div>Alias aliquam deleniti dolorum, eum minus molestias mollitia non temporibus ullam. Accusantium amet animi
            commodi dolor dolorum earum eos fugiat, illum incidunt, ipsa itaque natus possimus, quia quidem temporibus
            totam!
        </div>
        <div>Ea facilis magnam necessitatibus quibusdam vero. At cumque dolor dolores hic ipsam laborum porro vel? At eaque
            exercitationem magnam, nemo nesciunt repellat ullam! Aliquam, animi incidunt magni perferendis tenetur
            voluptatibus?
        </div>
        <div>Asperiores delectus eum impedit modi nihil obcaecati qui, quo tenetur. Consequuntur fuga harum illum inventore
            iusto laudantium nobis pariatur porro quod reprehenderit, sed sit voluptatem! Beatae earum necessitatibus
            tenetur voluptas?
        </div>
        <div>Consequatur consequuntur delectus esse, impedit modi necessitatibus sapiente sunt. Alias at beatae blanditiis
            consequuntur deserunt eveniet exercitationem facilis harum iusto quam quis quod repellendus reprehenderit saepe
            sapiente suscipit, tenetur unde?
        </div>
        <div>Accusamus accusantium beatae consequatur culpa dolor doloribus ea eligendi fugiat illo molestiae nobis
            praesentium provident quas quasi, quidem ratione, unde? Aliquam cupiditate earum excepturi magnam natus non
            obcaecati quos vero?
        </div>

        <div>
            <a href="#">Choisir un personnage</a>
        </div>

        <div>
            <a href="{{ route('passer', ['user'=> auth()->user()->id]) }}">Passer le tuto</a>
        </div>


{{--        {{$role = auth()->user()->roles()->get()->pluck('name') }}--}}
{{--        @if ($role->contains('admin'))--}}
{{--            <h1>oookkkkkk</h1>--}}
{{--        @endif--}}
    </div>
@stop
