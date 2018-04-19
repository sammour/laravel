@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">description</th>
                    <th scope="col">Editer</th>
                    <th scope="col">Supprimer</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($categories as $category)
                    <tr scope="row">
                        <td><a href="{{route('category.show', [ 'category' => $category])}}">{{$category->name}}</a></td>
                        <td>{{$category->description}}</td>
                        <td><a class="btn btn-primary" href="{{route('category.edit', [ 'category' => $category])}}">Editer</a></td>
                        <td>
                            {!! Form::open(['method' => 'delete', 'route' => ['category.destroy', $category]]) !!}
                            {{ Form::submit('Supprimer', ['class' => 'btn btn-danger']) }}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div><a href="{{route('category.create')}}" class="btn btn-primary">Ajouter une catégorie</a></div>
        </div>
    </div>
@endsection