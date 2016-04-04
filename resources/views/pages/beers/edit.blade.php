@extends('layouts.main')

@section('content')
    <h1>Edit Beer</h1>
    <hr>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="form-horizontal" method="POST" action="{{route('beers.update', ['id' => $beer->id])}}" enctype="application/x-www-form-urlencoded">
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="name">Name</label>
            <div class="col-md-4">
                <input id="name" name="name" type="text" placeholder="Beer name" class="form-control input-md" value="{{old('name', $beer->name)}}">
            </div>
        </div>

        <!-- Textarea -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="description">Description</label>
            <div class="col-md-4">
                <textarea class="form-control" id="description" name="description">{{old('description', $beer->description)}}</textarea>
            </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="client_id">Client</label>
            <div class="col-md-4">
                <select id="client_id" name="client_id" class="form-control">
                    <option value="">Select a client</option>
                    @foreach ($clients as $client)
                        <option value="{{$client->id}}" @if($client->id==old('client_id', $beer->client_id)) selected @endif>{{$client->full_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="type_id">Beer Type</label>
            <div class="col-md-4">
                <select id="type_id" name="type_id" class="form-control">
                    <option value="">Select a beer type</option>
                    @foreach ($types as $type)
                        <option value="{{$type->id}}" @if($type->id==old('type_id', $beer->type_id)) selected @endif>{{$type->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="btnSubmit"></label>
            <div class="col-md-4">
                <button id="btnSubmit" class="btn btn-primary">Submit</button>
                <a href="{{route('beers.index')}}" class="btn btn-warning">Cancel</a>
            </div>
        </div>
    </form>

@stop