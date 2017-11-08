@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 style="margin-bottom: 40px">All the Articles</h1>

        @foreach($article as $key => $value)
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="panel-heading"><h5>{{ $value->title  }}</h5>
                        @foreach($users as $field => $val)
                        @if(  $val->id == $value->user_id )
                        <div>
                           Author:  {{ $val->name }}
                        </div>
                        @endif
                        @endforeach
                        @foreach($subscribes as $object => $property)
                            @if( !isset($subscribes))
                                @if($value->user_id == $property->author)
                                <a>
                                    {!! Form::open(['method' => 'GET','route' => ['subscription.destroy' , $value->user_id]]) !!}
                                    {!! Form::submit('Unsubscription', ['class' => 'btn btn-small ']) !!}
                                    {!! Form::close() !!}
                                </a>
                                    @endif
                            @endif
                                @if( !isset($subscribes))
                                    @if($value->user_id != $property->author )
                            <a>
                                {!! Form::open(['method' => 'GET','route' => ['subscription.update' , $value->id]]) !!}
                                {!! Form::submit('Subscribe', ['class' => 'btn btn-small ']) !!}
                                {!! Form::close() !!}
                            </a>
                            @endif
                        @endif
                        @endforeach
                       </div>
                    <p>{{ $value->text }}</p>
                    <a class="btn btn-small btn-success" href="{{ URL::to('article/' . $value->id) }}">Show</a></div>
            </div>
        @endforeach
    </div>
@endsection