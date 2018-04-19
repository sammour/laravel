@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        {!! Form::open() !!}
        <div class="form-group">
            {{ Form::text('title','',['class' => 'form-control', 'placeholder' => 'Le titre']) }}
        </div>
        <div class="form-group">
            {{ Form::text('excrept','',['class' => 'form-control', 'placeholder' => 'L\'extrait']) }}
        </div>
        <div class="form-group">
            {{ Form::text('content','',['class' => 'form-control', 'placeholder' => 'Mon contenu']) }}
        </div>
        <div class="form-group">
            {{Form::select('categories_id', $categories)}}
        </div>
        <div class="form-group">
            @foreach($tags as $key => $tag)
                <?php $tag_id = 'tags[' . $key . ']'?>
                <span class="col-sm-2">
                    {{Form::checkbox($tag_id, $key)}}<span>{{$tag}}</span>
                </span>
            @endforeach
        </div>
        {{Form::submit('Ajoute moi',['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
</div>

@endsection