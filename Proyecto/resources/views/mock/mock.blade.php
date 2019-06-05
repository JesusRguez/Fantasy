@extends('layout.general')
@section('content')
<p>
    {{$data}}
</p>

@if($data['questionsPA'])
<p>
    Success
</p>
@foreach ($data['questionsPA'] as $question)
    {{$question->questiontext}}
@endforeach
@endif
@endsection