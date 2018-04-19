@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Nom de l'article</th>
            <th scope="col">Extrait</th>
            <th scope="col">Date de création</th>
            <th scope="col">Catégorie</th>
            <th scope="col">Tags</th>
            <th scope="col">Editer</thscope>
            <th scope="col">Supprimer</thscope>
        </tr>
    </thead>
    <tbody>
        @foreach ($articles as $article)
            <tr scope="row">
                <td><a href="{{route('ArticlesShow', [ 'id' => $article->id])}}">{{$article->title}}</a></td>
                <td>{{$article->excrept}}</td>
                <td>{{$article->created_at}}</td>
                <td>@if ($article->category)
                        {{$article->category->name}}
                @endif</td>
                <td>
                @foreach($article->tags as $tag)
                    {{$tag->name}}&nbsp;
                @endforeach
                </td>
                <td><a class="btn btn-primary" href="{{route('ArticlesEdit', [ 'id' => $article->id])}}">Editer</a></td>
                <td>
                    {!! Form::open(['method' => 'delete', 'route' => ['ArticlesDelete', $article->id]]) !!}
                    {{ Form::submit('Supprimer', ['class' => 'btn btn-danger']) }}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
        <div><a href="/laravel/public/articles/add" class="btn btn-primary">Ajouter un article</a></div>
    </div>
</div>
    @endsection