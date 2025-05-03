@extends('master')
@section('menu')
    @parent
@endsection
@section('content')
<h2>Manuals List</h2>

@if($manuals->isEmpty())
<div class="alert alert-info mt-4">
    <h4 class="alert-heading">Empty List</h4>
</div>
@endif
<div class="list-group">
    @foreach ($manuals as $manual)
    <a href="{{ url('manual/'.$manual->id) }}" class="list-group-item list-group-item-action">
        {{ $manual->manualName }}
    </a>
@endforeach
</div>
@endsection