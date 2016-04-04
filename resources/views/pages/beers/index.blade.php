@extends('layouts.main')

@section('content')
    <h1>Beers Consumption List <a href="{{route('beers.create')}}" class="btn btn-default pull-right">Add</a></h1>
    <hr>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th>Name</th>
                <th>Type</th>
                <th>Description</th>
                <th>Client</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
        @foreach($beers as $row)
            <tr>
                <td class="text-center">{{$row->id}}</td>
                <td>{{$row->name}}</td>
                <td>{{$row->type->name}}</td>
                <td>{{str_limit($row->description, 30)}}</td>
                <td>{{$row->client->full_name}}</td>
                <td class="text-center">
                    <div class="btn-group">
                        <div class="inline-block">
                            <a href="{{route('beers.edit', ['id' => $row->id])}}" class="btn btn-default">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </a>
                        </div>
                        <div class="inline-block">
                            <form action="{{route('beers.destroy', ['id' => $row->id])}}" method="POST" enctype="application/x-www-form-urlencoded">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-default">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="text-center">
        {{$beers->links()}}
    </div>
@stop