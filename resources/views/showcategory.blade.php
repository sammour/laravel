@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1>{{$category->name}}</h1>
            </div>
            <div class="col-sm-6">
                <p>{{$category->description}}</p>
            </div>
        </div>
    </div>
@endsection