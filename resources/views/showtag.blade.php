@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1>{{$tag->name}}</h1>
            </div>
            <div class="col-sm-6">
                <p>{{$tag->description}}</p>
            </div>
        </div>
    </div>
@endsection