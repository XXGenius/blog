@extends('layouts.app')
@section('content')
    <div class="container">
        {!! Form::model($article, [
           'method' => 'PATCH',
           'route' => ['article.update', $article->id]
       ]) !!}
        <div class="form-group">
            {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('text', 'Text:', ['class' => 'control-label']) !!}
            {!! Form::text('text', null, ['class' => 'form-control']) !!}
        </div>
        {!! Form::submit('Update Title', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>
@endsection