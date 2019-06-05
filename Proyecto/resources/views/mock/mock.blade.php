@extends('layout.general')
@section('content')
<p>
    {{$data}}
</p>


<p>
    Success
</p>
@foreach ($data as $item)
@php
$obj =array($item)
@endphp
@endforeach


@foreach ($item['questionsPA'] as $question)
    {{$question->questiontext}}
@endforeach

@endsection