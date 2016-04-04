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

    @include('templates.beers.form', ['beer' => $beer, 'types' => $types, 'clients' => $clients])
@stop