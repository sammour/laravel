@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            {!! Form::model($tag, ['route' => ['tag.update', $tag], 'method' => 'put']) !!}
            <div class="form-group">
                {{ Form::text('name', null,['class' => 'form-control']) }}
            </div>
            {{Form::submit('Edite moi',['class' => 'form-control btn btn-primary'])}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection