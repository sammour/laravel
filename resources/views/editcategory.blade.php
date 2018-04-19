@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            {!! Form::model($category, ['route' => ['category.update', $category], 'method' => 'put']) !!}
            <div class="form-group">
                {{ Form::text('name', null,['class' => 'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::text('description', null,['class' => 'form-control']) }}
            </div>
            {{Form::submit('Edite moi',['class' => 'form-control btn btn-primary'])}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection