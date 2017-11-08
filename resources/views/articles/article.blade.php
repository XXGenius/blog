@extends('layouts.app')
@section('content')
<div class="container">
    <div class="jumbotron text-center">
        <h2>{{ $article->title }}</h2>
        <p>
            <strong>text:</strong> {{ $article->text }}<br>
        </p>
    </div>
    @if(!$subscribe && !$permissed)
    <a>
        {!! Form::open(['method' => 'GET','route' => ['subscription.update' , $article->id]]) !!}
        {!! Form::submit('Subscribe', ['class' => 'btn btn-small ']) !!}
        {!! Form::close() !!}
    </a>
    @endif
    @if($subscribe)
    <a>
        {!! Form::open(['method' => 'GET','route' => ['subscription.destroy' , $article->user_id]]) !!}
        {!! Form::submit('Unsubscription', ['class' => 'btn btn-small ']) !!}
        {!! Form::close() !!}
    </a>
    @endif
    @if($permissed)
    <a>
        {!! Form::open(['method' => 'DELETE','route' => ['article.destroy', $article->id]]) !!}
        {!! Form::submit('Delete', ['class' => 'btn btn-small btn-danger']) !!}
        {!! Form::close() !!}
    </a>
    <a class="btn btn-small btn-info" href="{{ URL::to('article/' . $article->id . '/edit') }}">Edit </a>
        @endif
</div>
@endsection