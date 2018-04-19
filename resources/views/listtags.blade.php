@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Editer</th>
                    <th scope="col">Supprimer</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($tags as $tag)
                    <tr scope="row">
                        <td><a href="{{route('tag.show', [ 'tag' => $tag])}}">{{$tag->name}}</a></td>
                        <td><a class="btn btn-primary" href="{{route('tag.edit', [ 'tag' => $tag])}}">Editer</a></td>
                        <td>
                            {!! Form::open(['method' => 'delete', 'route' => ['tag.destroy', $tag]]) !!}
                            {{ Form::submit('Supprimer', ['class' => 'btn btn-danger']) }}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div><a href="{{route('tag.create')}}" class="btn btn-primary">Ajouter un tag</a></div>
        </div>
    </div>
@endsection