@extends('layouts.app')
@section('content')
<div class="container">
        <h1 style="margin-bottom: 40px">Articles by your authors</h1>
    @foreach($article as $key => $value)
        @foreach($value as $object=>$property)
            <div class=" col-2 col-sm-2 col-lg-2">
                <h5>{{ $property->title  }}</h5>
                <a class="btn btn-small btn-success" href="{{ URL::to('article/' . $property->id) }}">Show </a>
            </div><!--/span-->
        @endforeach
    @endforeach
</div>
@endsection