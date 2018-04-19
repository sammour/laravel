@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        {!! Form::model($article) !!}
        <div class="form-group">
            {{ Form::text('title', null,['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::text('excrept', null,['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::text('content',null,['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{ Form::text('slug',null,['class' => 'form-control']) }}
        </div>
        <div class="form-group">
            {{Form::select('categories_id', $categories)}}
        </div>
        <div class="form-group">
            @foreach($tags as $key => $tag)
                <?php $tag_id = 'tags[' . $key . ']';
                $value = 0;
                foreach ($article->tags->toArray() as $tagArray) {
                    if (in_array($tag, $tagArray)) {
                        $value = 1;
                    }
                }
                ?>
                <span class="col-sm-2">
                    {{Form::checkbox($tag_id, $key, $value)}}<span>{{$tag}}</span>
                </span>
            @endforeach
        </div>
        {{Form::submit('Edite moi',['class' => 'form-control btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
</div>
@endsection