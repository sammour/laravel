@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h1>{{$article->title}}</h1>
            </div>
            <div class="col-sm-6">
                <p>{{$article->created_at}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6"></div>
            <div class="col-sm-2">
                <p>{{$article->category->name}}</p>
            </div>
            <div class="col-sm-4">
                <p>{{$article->category->description}}</p>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-6">
                <p>{{$article->content}}</p>
            </div>
        </div>
    </div>
@endsection