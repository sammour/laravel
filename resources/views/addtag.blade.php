@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            {!! Form::open(['route' => 'tag.store']) !!}
            <div class="form-group">
                {{ Form::text('name','',['class' => 'form-control', 'placeholder' => 'Le nom']) }}
            </div>
            {{Form::submit('Ajoute moi',['class' => 'btn btn-primary'])}}
            {!! Form::close() !!}
        </div>
    </div>

@endsection