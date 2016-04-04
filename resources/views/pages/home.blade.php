@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center margin-top-none">Welcome to Octimine Beer Dashboard</h1>
            <br>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h5 class="margin-top-none">Favorite Style<span class="label label-success pull-right">Monthly</span></h5>
                            <h3 class="text-center">{{$styles['now']['name']}}</h3>
                            <p class="small text-muted text-center">Drinked by {{$styles['now']['total']}} clients</p>
                        </div>
                        <div class="panel-footer">Last Month <span class="text-info pull-right">{{$styles['past']['name']}}<i class="fa fa-fw fa-level-down"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h5 class="margin-top-none">Best Client<span class="label label-info pull-right">Monthly</span></h5>
                            <h3 class="text-center">{{$clients['now']['fullname']}}</h3>
                            <p class="small text-muted text-center">Drink {{$clients['now']['total']}} beers</p>
                        </div>
                        <div class="panel-footer">Last Month <span class="text-info pull-right">{{$clients['past']['fullname']}}<i class="fa fa-fw fa-level-down"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <p class="text-center">
                <a class="btn btn-lg btn-success" href="{{route('beers.index')}}" role="button">See the drink consumption</a>
            </p>
        </div>
    </div>
@stop