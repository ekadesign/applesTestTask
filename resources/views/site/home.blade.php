@extends('app')

@section('content')


    <div class="navbar navbar-default ">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><b>SITE</b></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                </ul>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="col-md-6">

            <h3>Users</h3>
            <ul class="list-group">
                @foreach( $users as $user )
                    <li class="list-group-item">
                        {{ $user->name }} has {{ $user->getApplesCount() }} apples
                        <a class="btn btn-xs btn-danger pull-right" href="{{ url('/take-apple/'.$user->id) }}">Grab apple</a>
                    </li>
                @endforeach
            </ul>

            <div class="centered">
                <a class="btn btn-lg btn-success text-center" href="{{ url('/free-apples') }}">Free Apples</a>
            </div>

        </div>


        <div class="col-md-6">

            <h3>Basket</h3>
            <ul class="list-group">
                @foreach( $basketApples as $apple )
                    <li class="list-group-item">
                        {{$apple->id}}
                        Apple
                    </li>
                @endforeach
            </ul>

        </div>

    </div>


@endsection


